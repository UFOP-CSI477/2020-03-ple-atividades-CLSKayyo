<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Adventure;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        if(isset($request->multiple)){

            if($request->multiple == '0'){

            } else{
                
            }

        } else{

            $mensagem = new Message;

            $mensagem->message = $request->message;

            if($request->response1 != ''){
                $mensagem->response1 = $request->response1;
                $mensagem->response2 = $request->response2;
            }
            
            $mensagem->save();

            $adventure = new Adventure;

            $adventure->advname = $request->advname;
            $adventure->sendername = $request->sendername;
            $adventure->image = 1;
            $adventure->start = $mensagem->id;

            $adventure->save();

            return redirect('messages/'.$mensagem->id);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message){
        return view('create.msg', ['message'=>$message]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
