@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Team : {{$team->name}}
                    </div>
                    <div class="panel-body borders">
                        <form action="{{route('teams.update',$team->id)}}" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                            <div class="form-group  col-md-10">

                                <label for="name">Team Name</label>
                                <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Team Name" value="{{$team->name}}">
                                </div>
                                <div class="form-group  col-md-10">

                                <label for="file">Team Logo</label>
                                    <br>
                                    <img src="{{ url('/') }}/{{$team->image_path}}" />
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
