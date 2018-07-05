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
                    <div class="panel-heading">Create Team
                    </div>
                    <div class="panel-body borders">
                        <form action="{{route('teams.store')}}" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group  col-md-10">
                                    <label for="name">Team Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter Team Name">
                                </div>
                                <div class="form-group  col-md-10">
                                    <label for="file">Team Logo</label>
                                    <br>
                                    <input type="file" name="image_path">
                                </div>
                            </div>
                            <div class="form-group  col-md-10">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input name="_method" type="hidden" value="POST">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{URL::to('teams')}}">
                                    <button type="button" class="btn btn-dark fixed-top">Cancel</button>
                                </a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
