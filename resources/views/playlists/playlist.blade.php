@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="fs-5 fw-bold text-center">Playlist: {{ $playlistSongs[0]->playlist->name }}</h1>

    <div class="row">
        
        @if (session('error'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (empty($playlistSongs))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ __('This play list is empty!') }}
        </div>
        @else
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Artist</th>
                    <th scope="col">Link</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($playlistSongs as $key => $item)
                <tr>
                    <th scope="row">{{ $key }}</th>
                    <td>{{ $item->song->name }}</td>
                    <td>{{ $item->song->user->name }}</td>
                    <td><button action="{{$song = $item;}}">Play</button></td>

                </tr>
                @endforeach
            </tbody>

        </table>

        
        @endif
    </div>
</div>




@endsection