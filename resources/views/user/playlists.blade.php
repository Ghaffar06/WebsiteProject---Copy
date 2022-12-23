@extends('layouts.app')

@section('content')

<div class="container my-5">
    <h1 class="fs-5 fw-bold text-center">Playlists</h1>
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
                </tr>
            </thead>
            <tbody>
                @foreach ($playlists as $playlist)
                <tr>
                    <th scope="row">{{ $playlist->id }}</th>
                    <td>{{ $playlist->name }}</td>
                    <td>
                    <a href="Playlist/play/{{$playlist->id}}" class="list-group-item list-group-item-action">
                        <i class="purple"></i> Play
                    </a></td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <a href="/createPlaylist">Create Playlist</a>
    </div>
</div>

@endsection