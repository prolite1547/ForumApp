<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use Auth;



class ForumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $discussion = Discussion::orderBy('created_at','desc')->paginate(3);

        // Instead of using ->with() separate it with comma and put it into assoc array
        return view('forum', ['discussion'=>$discussion]);
    }


    public function filtered($channel){
        
        $discussion = Discussion::where('channel_id', $channel)->orderBy('created_at','desc')->paginate(3);
        return view('forum', ['discussion'=>$discussion]);
    }

  
    public function navigation($navigation){
        
        $myId = Auth::id();

        switch($navigation){
            
            case 1:
                $discussion = Discussion::where('user_id',$myId)->paginate(3);
                
            break;
                $discussion = new Discussion();
                $discussion = $discussion->replies->where('best_answer', 1)->where('user_id', $myId)->paginate(3);
            case 2:
                
            break;

            case 3:

            break;
        } 

        
      return view('forum', ['discussion'=>$discussion]);
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
    public function show($id)
    {
        //
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
