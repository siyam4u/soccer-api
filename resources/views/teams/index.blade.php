@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Teams <a class="pull-right"  href="{{URL::to('teams/create')}}"><button type="button" class="btn btn-success">Create Team</button></a></div>
                    <div class="panel-body borders">
                        @foreach($teams as $team)
                        <div class="row">
                            <div class="col-md-3"><img class="img-circle" src="{{ url('/') }}/{{$team->image_path}}" /></div>
                            <div class="col-md-4 verticalAlignMiddle"><span><a  href="{{URL::to('teams/'.$team->id.'/players')}}">{{$team->name}}</a></span></div>
                            <div class="col-md-2 verticalAlignMiddle">
                                <a href="{{route('teams.edit',$team->id)}}" class="pull-right btn btn-warning btn-lg">Edit</a>
                            </div>
                            <div class="col-md-3 verticalAlignMiddle">
                                {{ Form::open(['method' => 'delete', 'route' => ['Teams.Delete', $team->id]]) }}
                                {{ Form::submit('Delete', ['class' => 'pull-left btn btn-danger btn-lg']) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
