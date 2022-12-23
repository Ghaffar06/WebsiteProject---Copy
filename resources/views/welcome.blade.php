<br />
<div class="container">
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
</div> <br /><br /> <br /><br /> <br /><br />
<div class="container">
    @if(isset($result))
    <table class="table table-striped ">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Artist</th>
            </tr>
        </thead>
        <tbody>
            @foreach($result as $song)
            <tr>
                <td>{{$song->name}}</td>
                <td>{{$song->user->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else{{$message}}
    @endif
</div>