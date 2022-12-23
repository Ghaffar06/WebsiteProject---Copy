@extends('layouts.app')

@section('content')

<div class="container my-5">
    <h1 class="fs-5 fw-bold text-center">Groups</h1>
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
                    @foreach ($groups as $group)
                    <tr>
                        <th scope="row">{{ $group->id }}</th>
                        <td>{{ $group->group->name }}</td>
                        <td><button action="/viewGroup/{{$group->id}}">View</button></td>
                        </td>
                    </tr>
                    @endforeach
            </tbody>

        </table>

       
        <a href="/addGroup">Add new Group</a>
    </div>
</div>

@endsection