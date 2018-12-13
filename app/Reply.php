<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['user_id','discussion_id','content'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function discussion(){
        return $this->belongsTo('App\Discussion');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }
 
    public function is_authenticated_user(){
        
        $id = Auth::id();
        $likers = array();

        foreach ($this->likes as $liker){
             array_push($likers, $liker->user_Id);
        }

        if(in_array($id, $likers)){
            return true;
        }else{
            return false;
        }
     

  }

  


   
 
}
