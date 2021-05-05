<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comments;
use App\contacts;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments=Comment::all();
        return response()->json(['message'=>'Success',
        'data'=>$comments],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $contact = Contact::find($id);
        $comment = Comment::find($contact->contact_id);
        return view('comments.create', compact('contact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   /* public function store(Request $request)
    {
        //
       // json $validator=$this->ValidateComment();
        $request->validate([
            'contacts_id'=>'required',
            'text'=>'required',
            'star'=>'required'

        ]);

        $comment = new comments([
            'contacts_id'=>	$request->get('contacts_id'),
            'text' => $request->get('text'),
            'star' => $request->get('star')

        ]);
        $comment->save();
        return redirect('/contacts')->with('success', 'Commentsss saved!');
    } */
//test
    public function store(Request $request, Contact $contact)
    {
        $validator = $this->validateComment();
        if($validator->fails()){
            return response()->json(['message'=>$validator->messages(),'data'=>null],400);
        }

        $comment = new Comment($validator->validate());
        if($contact->comments()->save($comment)){
            return response()->json(['message'=>'Comment Saved','data'=>$comment],200);
        }

        return response()->json(['message'=>'Error Occured','data'=>null],400);
    }


    public function best_comment(Comment $comment){
        if($comment->contact->set_best_comment($comment)){
            return response()->json(['message'=>'Best Comment Saved','data'=>$comment],200);
        }
            return response()->json(['message'=>'Error Occurred','data'=>null],400);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $comment = Comment::find($id);
        return view('comments.edit', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'text'=>'required',
            'star'=>'required'
        ]);

        $comment = Comment::find($id);
        $comment->text =  $request->get('text');
        $comment->star = $request->get('star');

        $comment->save();

        return redirect('/contacts')->with('success', 'Commentssss updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function destroy($id)
    {
        //
        $comment = Comment::find($id);
        $comment->delete();

        return redirect('/contacts')->with('success', 'Comment deleted!');
    }
    */

    public function destroy(Comment $comment)
    {
        if($comment->delete()){
            return response()->json(['message'=>'Comment Deleted','data'=>null],200);
        }
        return response()->json(['message'=>'Error Occurred','data'=>null],400);
    }

    public function validateComment(){
        return Validator::make(request()->all(), [
            'text' => 'required|string|min:3|max:255',
            'star' => 'required|integer|min:0|max:5',
        ]);
    }

}
