<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Reply;
use App\Discussion;
use Session;
use Notification;
use App\User;




class RepliesController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($discussion_id ,Request $request)
    {
        Reply::create([
            'user_id'=> Auth::id(),
            'discussion_id' => $discussion_id,
            'content' => $request->content
        ]); 

        $discussion = Discussion::find($discussion_id);
        
        Session::flash('success','Replied to this discussion');
        
        $watchers = array();

        foreach($discussion->watchers as $watcher){
            array_push($watchers,User::find($watcher->user_Id));
        }

        Notification::send($watchers, new \App\Notifications\NewReplyAdded($discussion));

        return redirect()->route('discussion.show', ['id' => $discussion->id, 'slug' => $discussion->slug]);

    }


    public function best($id){    

        $reply = Reply::find($id);
        $reply->best_answer = 1;
        $reply->save();

        Session::flash('success', 'Marked this reply as best answer');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
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
