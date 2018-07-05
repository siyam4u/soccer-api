@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Players
                    <div class="pull-right"><a  href="{{URL::to('teams')}}"><button type="button" class="btn btn-dark fixed-top">Go Back</button></a>&nbsp;&nbsp;
                        <a class="pull-right"  href="{{URL::to('players/create')}}"><button type="button" class="btn btn-success">Create Player</button></a> </div>
                    </div>
                    <div class="panel-body borders">
                        @foreach($players->players as $player)
                            <div class="row">
                                <div class="col-md-3"><img class="img-circle" src="{{ url('/') }}/{{$player->image_path}}" /></div>
                                <div class="col-md-6 verticalAlignMiddle"><span>{{$player->first_name}} {{$player->last_name}}</span></div>
                                <div class="col-md-3 verticalAlignMiddle"><a href="{{route('players.edit',$player->id)}}" class="btn btn-warning btn-lg">Edit</a> <a href="#" class="btn btn-danger btn-lg">Delete</a></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
