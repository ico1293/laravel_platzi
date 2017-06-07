<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// import the namespace
use App\Message;
use App\Http\Requests\CreateMessageRequest;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateMessageRequest $request)
    {
        /** Validate
        * firs parameter: the var request that is received
        * second parameter: rules array
        *   each key corresponds to a field of the request
        *   each value can be a string or a array of rules
        * third parameter: message array
        */
        //$this->validate($request,['message' => ['required', 'max:160'],], ['message.required' => 'Por favor, escribe tu mensaje.', 'message.max' => 'El mensaje no pude superar los 160 caracteres.',]);

        // Save this message in the DB:
        // key: column. Value: Value to be assigned
        $message = Message::create([
                'content' => $request->input('message'),
                'image' => 'http://lorempixel.com/600/338?'.mt_rand(0,1000)
            ]);

        return redirect('/messages/'.$message->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //Search a Message for ID (registro), if the show paramater is $id
        //$message = Message::find($id);

        //message's view
        return view('messages.show',[
                'message' => $message,
            ]);
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
    }
}
