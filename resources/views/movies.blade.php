@extends('layouts.app')
@section('content')

    <div class="hero common-hero" style="height: 190px">
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="hero-ct">--}}
{{--                        <h1>Movie Listing - Grid Fullwidth</h1>--}}
{{--                        <ul class="breadcumb">--}}
{{--                            <li class="active"><a href="#">Home</a></li>--}}
{{--                            <li> <span class="ion-ios-arrow-right"></span> movie listing</li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
<div class="page-single" style="padding: 0 0 75px 0">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                {{ $movies->links() }}
                <div class="flex-wrap-movielist mv-grid-fw">
                    @if(count($movies) >= 1)
                        @foreach($movies as $movie)
                            <div class="movie-item-style-2 movie-item-style-1">
                                <img src="{{ asset('/'.$movie->poster_image.'.jpg' )  }}" alt="">
                                <div class="hvr-inner">
                                    <a  href="/movies/{{ $movie->id }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                </div>
                                <div class="mv-item-infor">
                                    <h6><a href="/movies/{{ $movie->id }}">{{ $movie->title.' - '.$movie->year }}</a></h6>
                                    <p class="rate"><i class="ion-android-star"></i><span>{{ $movie->ratings }}</span></p>
                                </div>
                            </div>
                        @endforeach
                            {{ $movies->links() }}

                    @else
                        <p>No movies found!</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
