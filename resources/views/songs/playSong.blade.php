@extends('songs.list')

@section('content')
<div class="column add-bottom">
    <div id="mainwrap">
        <div id="nowPlay">
            <span id="npAction">Paused...</span><span id="npTitle"></span>
        </div>
        <div id="audiowrap">
            <div id="audio0">
                <audio controls autoplay>
                    <source src="audiomachine  - Guardians at the Gate.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
            <div id="tracks">
                <button id="btnPrev" onclick="previous()">&larr;</button>
                <button id="btnNext" onclick="next()">&rarr;</button>
                <label>{{$song->name}}</label>
            </div>
        </div>
        <div id="plwrap">
            <ul id="plList"></ul>
        </div>
    </div>
</div>
@endsection