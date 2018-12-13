@extends('layouts.app')

@section('content')
<div class="container">
    
            <div class="card">
                <div class="card-header">Channels</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    <table class="table table-hover">
                         <thead>
                             <th>Name</th>
                             <th></th>
                             <th></th>
                         </thead>

                        <tbody>
                            <tr>
                                @foreach ($channels as $channel)
                                     <tr>
                                         <td>{{$channel->title}}</td>
                                         <td><a href="{{ route('channels.edit', ['channel' =>$channel->id]) }}" class="btn btn-xs btn-info">Edit</a></td>
                                         <td>
                                            <form action="{{ route('channels.destroy', ['channel' => $channel->id]) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-xs btn-danger">Delete</button>
                                            <form>
                                         </td>
                                    </tr>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                     
                </div>
        
    </div>
</div>
@endsection
