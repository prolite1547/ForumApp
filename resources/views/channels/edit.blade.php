@extends('layouts.app')

@section('content')
<div class="container">
    
            <div class="card">
            <div class="card-header">Edit channel : [ {{$channel->title}} ]</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('channels.update', ['channel'=> $channel->id ]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text"  value='{{$channel->title}}' name='channelTitle' placeholder="Channel title" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">
                                    Update Channel
                                </button>
                            </div>
                        </div>
                    </form>
                     
                </div>
            </div>
      
</div>
@endsection
