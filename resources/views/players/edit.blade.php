@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Player : {{$player->first_name}}  {{$player->last_name}}
                    </div>
                    <div class="panel-body borders">
                        <form action="{{route('players.update',$player->id)}}" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group  col-md-10">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="first_name"  placeholder="Enter First Name" value="{{$player->first_name}}">
                                </div>
                                <div class="form-group  col-md-10">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control" id="lname" name="last_name"  placeholder="Enter Last Name" value="{{$player->last_name}}">
                                </div>

                                <div class="form-group  col-md-10">
                                    <label for="team_id">Team</label>
                                    <div>{!! Form::select('team_id', $teams, $player->team['id']) !!}</div>
                                </div>
                                <div class="form-group  col-md-10">
                                    <label for="file">Avatar</label>
                                    <br>
                                    <img src="{{ url('/') }}/{{$player->image_path}}" />
                                    <input type="file" name="image_path">
                                </div>
                            </div>
                            <div class="form-group  col-md-10">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input name="_method" type="hidden" value="PATCH">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a  href="{{URL::to('teams')}}"><button type="button" class="btn btn-dark fixed-top">Cancel</button></a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

