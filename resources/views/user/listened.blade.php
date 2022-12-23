@extends('layouts.app')

@section('content')

   <div class="container my-5">
       <h1 class="fs-5 fw-bold text-center">Songs</h1>
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
                    <th scope="col">Artist</th>
                    </tr>
                </thead>
                <tbody>
                
                @foreach ($listened as $key => $item)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $item->song }}</td>
                        <td>{{ $item->user }}</td>
                        <td>{{ $item->rating }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="/viewSongs/{{$number == 1 ? 1:$number-1}}" id="btnPrev">&larr;</a>
            {{$number}}
            <a href="/viewSongs/{{$number+1}}" id="btnNext">&rarr;</a>
       </div>
   </div>

   @endsection