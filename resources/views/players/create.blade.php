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
                    <div class="panel-heading">Create Player
                    </div>
                    <div class="panel-body borders">
                        <form action="{{route('players.store')}}" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group  col-md-10">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="first_name"  placeholder="Enter First Name">
                                </div>
                                <div class="form-group  col-md-10">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control" id="lname" name="last_name"  placeholder="Enter Last Name">
                                </div>

                                <div class="form-group  col-md-10">
                                    <label for="team_id">Team</label>
                                    <div>{!! Form::select('team_id', $teams) !!}</div>
                                </div>
                                <div class="form-group  col-md-10">
                                    <label for="file">Avatar</label>
                                    <br>
                                    <input type="file" name="image_path">
                                </div>
                            </div>
                            <div class="form-group  col-md-10">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input name="_method" type="hidden" value="POST">
                                <button type="submit" class="btn btn-primary">Save</button>
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

