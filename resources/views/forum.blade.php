@extends('layouts.app')

@section('content')
<div class="container">
     
            <div class="card">
            <div class="card-header">Discussions</div>

                <div class="card-body">
                    @foreach ($discussion as $d)
                                    
                        <div class="card bg-light mb-3">
                                <div class="card-header">
                                    <img src="{{ $d->user->avatar }}" style= "border-radius:50%;width:40px;height:40px" alt="">&nbsp;&nbsp;&nbsp;
                                    <span>{{ $d->user->name }}</span>
                                     
                                    <a href="{{ route('discussion.show',['id'=>$d->id,'slug'=>$d->slug]) }}" style="float:right; color:white;" class="btn btn-sm btn-info">View</a>
                                </div>
                
                                <div class="card-body">

                                    @if ($d->has_best_answer())
                                        <span class="badge badge-success">Solved</span>
                                    @else
                                        <span class="badge badge-danger">Unsolved</span>
                                    @endif

                                    <b>{{ $d->title }}</b>   

                                    <p>{{ str_limit($d->content , 200) }}</p>
                                    <span>Posted {{ $d->created_at->diffForHumans()}}</span>
                                </div>

                                <div class="card-footer">
                                    {{$d->replies->count()}} Replies
                                </div>
                        </div>
                    @endforeach
                     
                </div>

                <div class="text-center">
                    {{ $discussion->links() }}
                </div>
            </div>
       
</div>
@endsection
