@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @guest
                <div class="card-header">{{ __('You are a guest') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h4 class="my-5">  {{ __(' Register and feel our MUSIC!!') }}</h4>
                    
                </div>
                @else
                <div class="row">
                    <div class="content m-4">
                        <h4 class="my-5"> Suggested Songs</h4>
                        <div class="row card-content m-4">

                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card p-1 mb-4">
                                    <div class="card-icons">
                                        <a href="watch.html">
                                            <img class="card-img-top" src="{{asset('img/thumbnail/restful.jpg')}}"
                                                alt="Card image cap">
                                            <time>9:20</time>
                                            <i class="fas fa-play fa-2x"></i>
                                        </a>
                                    </div>
                                    <a href="watch.html">
                                        <div class="card-body p-0">
                                            <p class="card-title"> Title
                                            </p>
                                        </div>
                                    </a>
                                    <div class="card-footer">
                                        <small class="text-muted">
                                            <span class="d-block"><i class="fas fa-film"></i> <span>5k</span></span>
                                            <i class="fas fa-clock"></i> <span>5 months</span>
                                        </small>
                                    </div>
                                    <a href="channel.html" class="channel-img">
                                        <img src="img/ch-logo.png" alt="" class="rounded-circle my-2 ml-3" width="30">
                                        <span class="card-text"> La La </span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card p-1 mb-4">
                                    <div class="card-icons">
                                        <a href="watch.html">
                                            <img class="card-img-top" src="{{asset('img/thumbnail/restful.jpg')}}"
                                                alt="Card image cap">
                                            <time>9:20</time>
                                            <i class="fas fa-play fa-2x"></i>
                                        </a>
                                    </div>
                                    <a href="watch.html">
                                        <div class="card-body p-0">
                                            <p class="card-title"> Title
                                            </p>
                                        </div>
                                    </a>
                                    <div class="card-footer">
                                        <small class="text-muted">
                                            <span class="d-block"><i class="fas fa-film"></i> <span>5k</span></span>
                                            <i class="fas fa-clock"></i> <span>5 months</span>
                                        </small>
                                    </div>
                                    <a href="channel.html" class="channel-img">
                                        <img src="{{asset('img/ch-logo.png')}}" alt="" class="rounded-circle my-2 ml-3" width="30">
                                        <span class="card-text"> La La </span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card p-1 mb-4">
                                    <div class="card-icons">
                                        <a href="watch.html">
                                            <img class="card-img-top" src="{{ asset('img/thumbnail/restful.jpg') }}"
                                                alt="Card image cap">
                                            <time>9:20</time>
                                            <i class="fas fa-play fa-2x"></i>
                                        </a>
                                    </div>
                                    <a href="watch.html">
                                        <div class="card-body p-0">
                                            <p class="card-title"> Title
                                            </p>
                                        </div>
                                    </a>
                                    <div class="card-footer">
                                        <small class="text-muted">
                                            <span class="d-block"><i class="fas fa-film"></i> <span>5k</span></span>
                                            <i class="fas fa-clock"></i> <span>5 months</span>
                                        </small>
                                    </div>
                                    <a href="channel.html" class="channel-img">
                                        <img src="img/ch-logo.png" alt="" class="rounded-circle my-2 ml-3" width="30">
                                        <span class="card-text"> La La </span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card p-1 mb-4">
                                    <div class="card-icons">
                                        <a href="watch.html">
                                            <img class="card-img-top" src="img/thumbnail/restful.jpg"
                                                alt="Card image cap">
                                            <time>9:20</time>
                                            <i class="fas fa-play fa-2x"></i>
                                        </a>
                                    </div>
                                    <a href="watch.html">
                                        <div class="card-body p-0">
                                            <p class="card-title"> Title
                                            </p>
                                        </div>
                                    </a>
                                    <div class="card-footer">
                                        <small class="text-muted">
                                            <span class="d-block"><i class="fas fa-film"></i> <span>5k</span></span>
                                            <i class="fas fa-clock"></i> <span>5 months</span>
                                        </small>
                                    </div>
                                    <a href="channel.html" class="channel-img">
                                        <img src="img/ch-logo.png" alt="" class="rounded-circle my-2 ml-3" width="30">
                                        <span class="card-text"> La La </span>
                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection