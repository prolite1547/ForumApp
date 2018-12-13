@extends('layouts.app')

@section('content')
<div class="container">
   
            <div class="card">
                <div class="card-header">Create a new channel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('channels.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name='channelTitle' placeholder="Channel title" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">
                                    Add Channel
                                </button>
                            </div>
                        </div>
                    </form>
                     
                </div>
            </div>
        
</div>
@endsection
