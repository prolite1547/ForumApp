<?php

namespace App\Http\Controllers;

use Auth;
use App\Watcher;
use Session;

use Illuminate\Http\Request;


class WatchersController extends Controller
{

     public function watch($id){
        Watcher::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id
        ]);       
        
        Session::flash("Watched this discussion");

        return redirect()->back();
     }

    public function unwatch($id){
        
        $watch = Watcher::where('user_id', Auth::id())->where('discussion_id', $id);
        $watch->delete();

        Session::flash("Unwatched this discussion");
        
        return redirect()->back();


    }
}
