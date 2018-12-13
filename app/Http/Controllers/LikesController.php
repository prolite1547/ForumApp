<?php

namespace App\Http\Controllers;

use Auth;
use App\Like;
use Session;


use Illuminate\Http\Request;

class LikesController extends Controller
{

   public function like($id){
       
        Like::create([
            'user_id' => Auth::id(),
            'reply_id' => $id
        ]);

        Session::flash("Liked this reply");
        return redirect()->back();
   }

   public function unlike($id){

        $user_Id = Auth::id();
        $like = Like::where('user_Id', $user_Id)->where('reply_id',$id);
        $like->delete();

        Session::flash("Unliked this reply");
        return redirect()->back();


   }
}
