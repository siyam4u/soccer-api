@extends('layouts.app')
@section('content')
<div>
@foreach($players as $player)
    <div  style="float: left">
        <a href="{{route('players.edit',$player->id)}}">{{$player->first_name}}</a>
    </div>
    <div style="float: left">{{$player->team['name']}}</div>
    <div  style="float: left">{!! Form::select('team_id', $teams, $player->team['id']) !!}
    </div>
    <br>
@endforeach
</div>

<div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{route('players.store')}}" method="POST" enctype="multipart/form-data">
            <input type="text" name="first_name">
            <input type="text" name="last_name">
            <div>{!! Form::select('team_id', $teams) !!}
            </div>
            <input type="file" name="image_path">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit">Submit</button>
        </form>
</div>
@endsection
