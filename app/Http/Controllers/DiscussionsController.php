<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Discussion;
use Auth;
use Session;

class DiscussionsController extends Controller
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
       return view('discuss')->with('channel',Channel::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request,[
             'title'=>'required',
             'content'=>'required'
          ]);

          $discussion = Discussion::create([
              'user_id'=> Auth::id(),
              'channel_id'=> $request->channel_id,
              'title'=> $request->title,
              'content' => $request->content,
              'slug'=>str_slug($request->title)

          ]);

          

          Session::flash('success','Discussion created');
          return redirect()->route('discussion.show',['id'=>$discussion->id,'slug'=>$discussion->slug]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$slug)
    {
        $discussion =  Discussion::find($id);

        $bestanswer = $discussion->replies->where('best_answer',1)->first();
        
        return view('discussions.show')->with('discussion', $discussion)->with('bestanswer', $bestanswer);
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
