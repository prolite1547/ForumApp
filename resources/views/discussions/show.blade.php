@extends('layouts.app')

@section('content')
<div class="container">
     
            <div class="card bg-light mb-3">
                <div class="card-header"> 
                    
                    @if ($discussion->is_watching())
                       <form action="{{ route('unwatch', ['id'=>$discussion->id ]) }}" method="get">
                            <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-info"><i class="far fa-eye"></i> Unwatch</button>&nbsp;
                            </div>
                        </form>
                    @else
                        <form action="{{ route('watch', ['id'=> $discussion->id]) }}" method="get">
                            <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-success"><i class="far fa-eye"></i> Watch</button>&nbsp;
                            </div>
                        </form>
                    @endif

                    <b>{{ $discussion->title }}</b> 
                    <span style="float:right;" >
                        {{ $discussion->created_at->diffForHumans() }}
                    </span>
                </div>

                <div class="card-body ">
                    <img src="{{ $discussion->user->avatar }}" style= "width:40px;height:40px;border-radius:50%;" alt="">
                    <span style="margin-left:20px">{{ $discussion->user->name }}</span><br><br>
                    <span>{{ $discussion->content }}</span><br><br>

                    @if ($discussion->has_best_answer())
                        
                            <div class="card text-white bg-success mb-3 text-center">
                                <div class="card-header ">
                                    <p>BEST ANSWER</p>
                                </div>
                                <div class="card-body">
                                    <img src="{{ $bestanswer->user->avatar }}" style= "width:40px;height:40px;border-radius:50%;" alt="">
                                    <span style="margin-left:20px">{{ $bestanswer->user->name }}</span><br><br>
                                    {{ $bestanswer->content }}
                                </div>
                                
                            </div>
                       
                @endif
                   
                </div>

                <div class="card-footer">
                    {{-- <a href="#" style="color: #3490dc"><i class="far fa-thumbs-up" ></i> LIKE</a> &nbsp;
                    <a href="#" style="color:black"><i class="far fa-thumbs-down" ></i> DISLIKE</a> --}}
                </div>
            </div>

            <hr>
            <h4> 
                <?php
                    $rCount = $discussion->replies->count();

                    if($rCount > 1){
                        echo $rCount." Replies";
                    }else{
                        echo $rCount." Reply";
                    }
                ?>

            </h4>
            <hr>

          @foreach($discussion->replies as $reply)
            <div class="card text-white bg-dark mb-4">
                    <div class="card-header">
                        
                     <img src="{{ $reply->user->avatar}}" style= "width:40px;height:40px;" alt="">
                     <span style="margin-left:20px">{{ $reply->user->name }}</span> <span style="float:right;" >
                            {{ $reply->created_at->diffForHumans() }}
                     </span> 

                    </div>

                    <div class="card-body">

                        <span>{{ $reply->content }}</span><br><br>
                        
                    </div>

            <div id="DLAction" class="card-footer">
                  {{-- style="color: #3490dc" --}}
                
            @if(!Auth::guest())    
                @if ($reply->is_authenticated_user())
                <span class="like-button">
                   <a style="color:#3490dc" href=" {{ route('unlike', ['id'=> $reply->id]) }} " title="Dislike this reply"><i style="font-size:18px;" class="far fa-thumbs-up"></i> Liked</a> 
                </span>
                @else
                <span class="like-button">
                    <a href=" {{ route('like', ['id'=> $reply->id]) }} "title="Like this reply"><i style="font-size:18px;" class="far fa-thumbs-up"></i> Like </a>
                </span>
                @endif
               
                
              @if ($discussion->user_id == Auth::id())
                    @if ($discussion->has_best_answer())
                            @if ($reply->best_answer)
                            &nbsp; | &nbsp;  
                            <span class="best-answer">
                                <span style="color: greenyellow;"> <i style="font-size:18px;"  class="fas fa-check"></i> Marked as best answer </span>
                            </span>  
                        
                            @endif
                    @else
                            &nbsp; | &nbsp;
                            <span class="best-answer">
                                <a href="{{ route('bestanswer', ['id'=> $reply->id]) }}"> <i style="font-size:18px;"  class="fas fa-check"></i> Mark as best answer</a>
                            </span>   
                    @endif                  
              @endif


            @endif
 

            <span style="color:gray;float:right;"> LIKES {{  count($reply->likes->where('reply_id', $reply->id)) }}  </span>
            </div>
            </div>
          @endforeach
        
       
        
          <div class="card bg-light mt-5">
              
                @if(!Auth::guest())
                    <div class="card-header">
                            <h4>Leave a reply</h4>
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('reply.store', ['discussion_id' => $discussion->id]) }}" method="post">
                                {{ csrf_field() }}
        
                                <div class="form-group">
                                    <textarea class="form-control" name="content"></textarea>
                                </div>
        
                                <div class="form-group">
                                    <button class="btn btn-primary" rows="30" cols="10" style="float:right" type="submit">Leave a reply</button>
                                </div>
                        </form>
                    </div>
                @else
                   <div class="card bg-light mt-5">
                       <div class="card-body">
                           <h3>Sign In to leave a reply ..</h3>
                       </div>
                   </div>
                @endif


          </div>
</div>
@endsection
