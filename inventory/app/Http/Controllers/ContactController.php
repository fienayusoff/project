<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\comments;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts=Contact::all();
        return response()->json(['message'=>'Success','data'=>$contacts],200);

       //return view('contacts.index', compact('contacts','comments'));

      // untuk paparan testing mesage yg nk tahu berjaya atau tidak
       // return response()->json(['message'=>'Success','data'=>$contact],200)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contact $contact)

    {
         /* $request->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required'
            ]);

            $contact = new Contact([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'job_title' => $request->get('job_title'),
                'city' => $request->get('city'),
                'country' => $request->get('country')
            ]);
            $contact->save();
            return redirect('/contacts')->with('success', 'Contact saved!');
            */

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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {

        return response()->json(['message'=>'Success','data'=>$contact],200);


    }

    public function show_comments(Contact $contact){
        $comments = $contact->comments;
        if(count($comments) > 0){
            return response()->json(['message'=>'Success','data'=>$contact],200);
        }
            return response()->json(['message'=>'No Comment Found','data'=>null],200);
    }

    public function show_best_comment(Contact $contact){
        $comment = comments::find($contact->best_comment_id);
        return response()->json(['message'=>'Success','data'=>$comment],200);
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
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
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
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required'
        ]);

        $contact = Contact::find($id);
        $contact->first_name =  $request->get('first_name');
        $contact->last_name = $request->get('last_name');
        $contact->email = $request->get('email');
        $contact->job_title = $request->get('job_title');
        $contact->city = $request->get('city');
        $contact->country = $request->get('country');
        $contact->save();

        return redirect('/contacts')->with('success', 'Contact updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       /* $contact = Contact::find($id);
        $contact->delete();

        return redirect('/contacts')->with('success', 'Contact deleted!');*/
        if ($comment->delete()){

            return response()->json(['message'=>'Comment Deleted','data'=>null],200);
        }
        return response()->json(['message'=>'error Occured','data'=>null],400);
    }


    public function validateComment(){
        return Validator::make(request()->all(), [
            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:25',
            'email' => 'required|string|min:5|max:255',
        ]);
    }

}
