@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="fs-5 fw-bold text-center">Songs</h1>
    
    <div class="row">
    <form action="{{url('/search')}}" method="POST" role="search">
        {{csrf_field()}}
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search for"
                value="{{isset($search)?$search:'';}}">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-info">
                    <i class="fas fa-search fa-sm"></i> Search
                </button>
            </span>

        </div>
    </form>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Artist</th>
                    <th scope="col">Link</th>
                    <th scope="col">Rate</th>
                </tr>
            </thead>
            <tbody>
                <form>
                    @foreach ($songs as $key => $item)
                    <tr>
                        <th scope="row">{{ $key }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td><button action="{{$song = $item;}}">Play</button></td>
                        <td><input type="range" id="points" name="song{{$item->id}}" min="0" max="5" step="1" value="0">
                        </td>
                    </tr>
                    @endforeach
                </form>
            </tbody>

        </table>
        <a href="/viewSongs/{{$number == 1 ? 1:$number-1}}" id="btnPrev">&larr;</a>
        {{$number}}
        <a href="/viewSongs/{{$number+1}}" id="btnNext">&rarr;</a>
    </div>
</div>
@if($song != null)
<main>
    <div class="column add-bottom">
        <div id="mainwrap">
            <div id="nowPlay">
                <span id="npAction">Paused...</span><span id="npTitle"></span>
            </div>
            <div id="audiowrap">
                <div id="audio0">
                    <audio controls autoplay>
                        <source src="{{asset('mp3/audiomachine  - Guardians at the Gate.mp3')}}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
                <div id="tracks">
                    <!--<button id="btnPrev" onclick="previous()">&larr;</button>
                <button id="btnNext" onclick="next()">&rarr;</button>-->
                    <label>{{$song->name}}</label>
                </div>
            </div>
            <div id="plwrap">
                <ul id="plList"></ul>
            </div>
        </div>
    </div>
</main>
@endif
@endsection