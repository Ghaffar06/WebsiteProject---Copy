@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="fs-5 fw-bold text-center">All Groups</h1>

    <div class="row">
        
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
                    <th scope="col">Link</th>
                    <th scope="col">Join</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $key => $item)
                <tr>
                    <th scope="row">{{ $key }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td><button action="{{$song = $item;}}">Play</button></td>
                    <td>
                        <input type="range" id="points" name="song{{$item->id}}" min="0" max="5" step="1" value="0">
                    </td>
                    
                    <td>
                        <a href="" class="nav-link login" data-toggle="modal" data-target="#loginModal{{$key}}">
                            Add to Playlist
                        </a>
                        <div class="modal fade" id="loginModal{{$key}}">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> Add song to playlist</h5>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>

                                    <form method="GET" action="{{ route('add songw to playlist') }}">
                                        @csrf
                                        <div class="modal-body">
                                            @foreach($playlists as $playlist)
                                            <div class="form-group">
                                                <input type="checkbox" name="playlists[]" value="{{$playlist->id}}">
                                                {{$playlist->name}}
                                                <br />
                                            </div>
                                            @endforeach
                                            <input name="song" value="{{$item->id}}" hidden>
                                            <div class="row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Add') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

        @if(Route::is('search Songs') )
        <form action="../../searchSongs/{{$number == 1 ? 1:$number-1}}" method="GET" role="search">
            {{csrf_field()}}
            <input type="text" class="form-control" name="search" placeholder="Search for"
                value="{{isset($search)?$search:'';}}" hidden>
            <button type="submit" id="btnPrev">&larr;</button>
        </form>
        {{$number}}
        <form action="../../searchSongs/{{$number+1}}" method="GET" role="search">
            {{csrf_field()}}
            <input type="text" class="form-control" name="search" placeholder="Search for"
                value="{{isset($search)?$search:'';}}" hidden>
            <button type="submit" id="btnNext">&rarr;</button>
        </form>
        <a href="/searchSongs/{{$search}}/{{$number == 1 ? 1:$number-1}}" id="btnPrev">&larr;</a>
        @else
        <a href="/viewSongs/{{$number == 1 ? 1:$number-1}}" id="btnPrev">&larr;</a>
        {{$number}}
        <a href="/viewSongs/{{$number+1}}" id="btnNext">&rarr;</a>
        @endif
        </form>
        @endif
    </div>
</div>




@endsection