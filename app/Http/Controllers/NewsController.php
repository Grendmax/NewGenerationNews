<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class NewsController extends Controller
{

    public function index()
    {
        /**
         * @var News $news
         */
        $news=News::orderBy('updated_at', 'DESC')->paginate(5);
        return view('newses.index', compact('news'));
    }

    public function create()
    {
        $this->authorize('create', News::class);
        return view('newses.form');
    }

    public function store(Request $request)
    {
        $this->authorize('create', News::class);
        $data=$this->validated($request);

        $news=News::on()->create($data);
        //return redirect()->route('show', ['car'=>$car->id]);
        return redirect()->route('newses.index');
    }

    public function show(News $newse)
    {
        $comments=$newse->comments()->orderBy('updated_at', 'DESC')->get();
        return view('newses.show', compact('newse','comments'));
    }

    public function edit(News $newse)
    {
        $this->authorize('update', $newse);
        return view('newses.form', compact('newse'));
    }

    public function update(Request $request, News $newse)
    {
        $this->authorize('update', $newse);
        $data=$this->validated($request,$newse);

        $newse->update($data);
        return redirect()->route('newses.show', $newse);
    }

    public function destroy(News $newse)
    {
        $this->authorize('delete', $newse);
        $newse->delete();
        return redirect()->route('newses.index');
    }

    public function getNews(Request $request,int $id){
        $news = News::where('category', $id)->orderBy('updated_at', 'DESC')->paginate(5);
        return view('newses.index', compact('news'));
    }

    protected function validated(Request $request, News $news=null){
        $rules=[
            'title'=>'required|min:5|max:100|unique:news',
            'description'=>'nullable',
            'imageURL'=>'nullable',
            'category'=>'category'
        ];
        if($news)
            $rules['title'] .=',title,' . $news->id;

        return $request->validate($rules, [
            'category.category'=>'Category doesn\'t match'
        ]);
    }

}
