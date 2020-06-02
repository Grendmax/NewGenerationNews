<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class NewsController extends Controller
{

    public function index()
    {
        $news=News::all();
        return view('newses.index', compact('news'));
    }

    public function create()
    {
        return view('newses.form');
    }

    public function store(Request $request)
    {
        $data=$this->validated($request);

        $news=News::on()->create($data);
        //return redirect()->route('show', ['car'=>$car->id]);
        return redirect()->route('newses.index');
    }

    public function show(News $newse)
    {
        return view('newses.show', compact('newse'));
    }

    public function edit(News $newse)
    {
        return view('newses.form', compact('newse'));
    }

    public function update(Request $request, News $newse)
    {
        $data=$this->validated($request,$newse);

        $newse->update($data);
        return redirect()->route('newses.show', $newse);
    }

    public function destroy(News $newse)
    {
        $newse->delete();
        return redirect()->route('newses.index');
    }

    public function getNews(Request $request,int $id){
        $news = News::where('category', $id)->get();
        return view('newses.index', compact('news'));
    }

    protected function validated(Request $request, News $news=null){
        $rules=[
            'title'=>'required|min:5|max:100|unique:news',
            'description'=>'nullable',
            'imageURL'=>'nullable',
            'category'=>'category'
            //Добавил custom валидацию для status по имени status, который зареган в App\AppServiceProvider
        ];
        //Чтобы он не проверял самого себя по id
        if($news)
            $rules['title'] .=',title,' . $news->id;

        return $request->validate($rules, [
            //Ключ(status) относится к имени валидации
            'category.category'=>'Category doesn\'t match'
        ]);
    }

}
