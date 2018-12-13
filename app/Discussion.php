<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
   protected $fillable=['title','content','user_id','channel_id','slug'];


  public function user(){
      return $this->belongsTo('App\User');
  }

   public function channel(){
       return $this->belongsTo('App\Channel');
   }

   public function replies(){
       return $this->hasMany('App\Reply')->orderBy('created_at','desc');
   }

   public function watchers(){
       return $this->hasMany('App\Watcher');
   } 

   
 
   
   
   public function is_watching(){
       $id = Auth::id();
       $ww = array();

       foreach($this->watchers as $w){
            array_push($ww, $w->user_Id);
        }

        if(in_array($id, $ww)){
            return true;
        }else{
            return false;
        }       
         
   }


   public function has_best_answer(){
    
        $replies = $this->replies->where('best_answer', 1);

        foreach($replies as $reply){
            return true;
        }

        return false;
   }

 
}
