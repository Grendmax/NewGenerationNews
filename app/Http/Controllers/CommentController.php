<?php

namespace App\Http\Controllers;

use App\Comment;
use App\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $data=$this->validated($request);
        $comment=auth()->user()->comments();
        $data+=['news_id'=>$request->keys()[2]];

        if($old=Comment::where([['news_id','=',$data['news_id']],['user_id','=',auth()->id()]])->first())
        {
            $new=Comment::where('news_id',$data['news_id'])->where('user_id',auth()->id())->update(['body'=>$data['body']]);
            return redirect()->route('newses.show', ['newse'=>$old->news_id]);
        }
        else
        {
            $new=$comment->create($data);
            return redirect()->route('newses.show', ['newse'=>$new->news_id]);
        }

    }

    public function show(Comment $comment)
    {
        //
    }

    public function edit(Comment $comment)
    {
        //
    }

    public function update(Request $request, Comment $comment)
    {
        //
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('newses.index');
    }

    protected function validated(Request $request, Comment $comment=null){
        $rules=[
            'user_id'=>'nullable',
            'news_id'=>'nullable',
            'body'=>'required'
        ];

        return $request->validate($rules);
    }

}
