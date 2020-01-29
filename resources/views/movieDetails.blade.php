@extends('layouts.movie_single')
@section('movie')

<div class="page-single movie-single movie_single" style="padding: 0 0 75px 0">
    <div class="container">
        <div class="row ipad-width2">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="movie-img sticky-sb">
                    <img src="{{asset('/'.$data['details']->poster_image.'.jpg')}}" alt="">
                    <div class="movie-btn">
                        <div class="btn-transform transform-vertical red">
                            <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Watch Trailer</a></div>
                            <div><a href="{{ $data['details']->trailer_link }}" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
                        </div>
                        <div class="btn-transform transform-vertical">
                            <div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i> Buy ticket</a></div>
                            <div><a href="#" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="movie-single-ct main-content">
                    <h1 class="bd-hd">{{ $data['details']->title }} <span>{{ $data['details']->year }}</span></h1>
                    <div class="social-btn">
                        <a href="#" class="parent-btn"><i class="ion-heart"></i> Add to Favorite</a>
                        <div class="hover-bnt">
                            <a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>share</a>
                            <div class="hvr-item">
                                <a href="#" class="hvr-grow"><i class="ion-social-facebook"></i></a>
                                <a href="#" class="hvr-grow"><i class="ion-social-twitter"></i></a>
                                <a href="#" class="hvr-grow"><i class="ion-social-googleplus"></i></a>
                                <a href="#" class="hvr-grow"><i class="ion-social-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="movie-rate">
                        <div class="rate">
                            <i class="ion-android-star"></i>
                            <p><span>{{ $data['details']->ratings }}</span><br>
                                <span class="rv">56 Reviews</span>
                            </p>
                        </div>
                        <div class="rate-star movie_category cate">
                            <p>Genre: </p>
                            @foreach($data['genre'] as $cat)
                                <span class="blue" style="background-color: {{ $cat->category_color }};"><a href="/category/{{ $cat->category_name }}">{{ $cat->category_name }}</a></span>
                            @endforeach
                        </div>
                    </div>
                    <div class="movie-tabs">
                        <div class="tabs">
                            <ul class="tab-links tabs-mv">
                                <li class="active"><a href="#overview">Overview</a></li>
                                <li><a href="#reviews"> Play</a></li>
                                <li><a href="#cast">  Cast & Crew </a></li>
                                <li><a href="#media"> Media</a></li>
                                <li><a href="#moviesrelated"> Related Movies</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="overview" class="tab active">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <p>{{ $data['details']->synopsis }}</p>
                                            <!-- download links -->
                                            <h3 class="">Available in :</h3>
                                            @if($data['links'])
                                                <div class="download-links row">
                                                    @foreach($data['links'] as $link)
                                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                                            <a class="one-link"
                                                               href="{{ asset('/'.$link->link) }}">{{ $link->quality_type }}</a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <p>Sorry! there is no download links</p>
                                            @endif
                                            <div class="title-hd-sm">
                                                <h4>User reviews</h4>
                                                <a href="#" class="time">See All 56 Reviews <i class="ion-ios-arrow-right"></i></a>
                                            </div>
                                            <!-- movie user review -->
                                            <div class="mv-user-review-item">
                                                <h3>Best Marvel movie in my opinion</h3>
                                                <div class="no-star">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star last"></i>
                                                </div>
                                                <p class="time">
                                                    17 December 2016 by <a href="#"> hawaiipierson</a>
                                                </p>
                                                <p>This is by far one of my favorite movies from the MCU. The introduction of new Characters both good and bad also makes the movie more exciting. giving the characters more of a back story can also help audiences relate more to different characters better, and it connects a bond between the audience and actors or characters. Having seen the movie three times does not bother me here as it is as thrilling and exciting every time I am watching it. In other words, the movie is by far better than previous movies (and I do love everything Marvel), the plotting is splendid (they really do out do themselves in each film, there are no problems watching it more than once.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-sm-12">
                                            <div class="sb-it">
                                                <h6>Director: </h6>
                                                @if(count($data['directors']) >= 1)
                                                    <p><a href="#">{{ $data['directors'][0]->name }}</a></p>
                                                @endif
                                            </div>
                                            <div class="sb-it">
                                                <h6>Stars: </h6>
                                                <p>
                                                    @foreach($data['actors'] as $actor)

                                                        <a href="#">{{ $actor->name }}</a> ,
                                                    @endforeach
                                                </p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Genres:</h6>
                                                <p>{{ $data['details']->category }}</p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Release Date:</h6>
                                                <p>{{ $data['details']->year }}</p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>IMDB Rating:</h6>
                                                <p>{{ $data['details']->ratings }}</p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Plot Keywords:</h6>
                                                <p class="tags">
                                                    <span class="time"><a href="#">superhero</a></span>
                                                    <span class="time"><a href="#">marvel universe</a></span>
                                                    <span class="time"><a href="#">comic</a></span>
                                                    <span class="time"><a href="#">blockbuster</a></span>
                                                    <span class="time"><a href="#">final battle</a></span>
                                                </p>
                                            </div>
                                            <div class="ads">
                                                <img src="images/uploads/ads1.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="reviews" class="tab review">
                                    <div class="row">
                                        <div >
                                            @if(count($data['links']) > 0)
                                                @foreach($data['links'] as $link)
                                                    <button id="play_torrent" class="button" onclick="playIt('{{ asset('/'.$link->link) }}','{{ $link->quality_type }}')">Play {{ $link->quality_type }}</button>
                                                @endforeach
                                            @else
                                                <p> sorry no links</p>
                                            @endif


                                        </div>
                                        <div id="hero" class="stream_info" hidden>
                                            <div id="output">
                                                <div id="progressBar"></div>
                                                <!-- The video player will be added here -->
                                            </div>
                                            <!-- Statistics -->
                                            <div id="play_status">
                                                <div>
                                                    <span class="show-leech">Downloading </span>
                                                    <span class="show-seed">Seeding </span>
                                                    <code>
                                                        <!-- Informative link to the torrent file -->
                                                        <a id="torrentLink" href="#">{{ $data['details']->title }} </a>
                                                    </code>
                                                    <span class="show-leech"> from </span>
                                                    <span class="show-seed"> to </span>
                                                    <code id="numPeers">0 peers</code>.
                                                </div>
                                                <div>
                                                    <code id="downloaded"></code>
                                                    of <code id="total"></code>
                                                    — <span id="remaining"></span><br/>
                                                    &#x2198;<code id="downloadSpeed">0 b/s</code>
                                                    / &#x2197;<code id="uploadSpeed">0 b/s</code>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div id="cast" class="tab">
                                    <div class="row">
                                        <h3>Cast & Crew of</h3>
                                        <h2>{{ $data['details']->title }}</h2>
                                        <!-- //== -->
                                        <div class="title-hd-sm">
                                            <h4>Directors & Credit Writers</h4>
                                        </div>
                                        <div class="mvcast-item">
                                            @if(count($data['directors']) >= 1)
                                                <div class="cast-it">
                                                    <div class="cast-left">
                                                        <img src="{{ asset('/'.$data['directors'][0]->avatar) }}"/>
                                                        <a href="#">{{ $data['directors'][0]->name }}</a>
                                                    </div>
                                                    <p>... Director</p>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- //== -->
                                        <div class="title-hd-sm">
                                            <h4>Cast</h4>
                                        </div>
                                        @if(count($data['actors']) >= 1)
                                            @foreach($data['actors'] as $actor)
                                                <div class="mvcast-item">
                                                    <div class="cast-it">
                                                        <div class="cast-left">
                                                            <img src="{{ asset('/'.$actor->avatar) }}" alt="">
                                                            <a href="#">{{ $actor->name }}</a>
                                                        </div>
                                                        <p>{{ $actor->actor_role }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>Sorry no data found !</p>
                                        @endif
                                        <!-- //== -->
                                        <div class="title-hd-sm">
                                            <h4>Produced by</h4>
                                        </div>
                                        <div class="mvcast-item">
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>VA</h4>
                                                    <a href="#">Victoria Alonso</a>
                                                </div>
                                                <p>...  executive producer</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>MB</h4>
                                                    <a href="#">Mitchel Bell</a>
                                                </div>
                                                <p>...  co-producer (as Mitch Bell)</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>JC</h4>
                                                    <a href="#">Jamie Christopher</a>
                                                </div>
                                                <p>...  associate producer</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>LD</h4>
                                                    <a href="#">Louis D’Esposito</a>
                                                </div>
                                                <p>...  executive producer</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>JF</h4>
                                                    <a href="#">Jon Favreau</a>
                                                </div>
                                                <p>...  executive producer</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>KF</h4>
                                                    <a href="#">Kevin Feige</a>
                                                </div>
                                                <p>...  producer</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>AF</h4>
                                                    <a href="#">Alan Fine</a>
                                                </div>
                                                <p>...  executive producer</p>
                                            </div>
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <h4>JF</h4>
                                                    <a href="#">Jeffrey Ford</a>
                                                </div>
                                                <p>...  associate producer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="media" class="tab">
                                    <div class="row">
                                        <div class="rv-hd">
                                            <div>
                                                <h3>Videos & Photos of</h3>
                                                <h2>{{ $data['details']->title }}</h2>
                                            </div>
                                        </div>
                                        <div class="title-hd-sm">
                                            <h4>Photos <span>( {{ count($data['screenshots']) }} )</span></h4>
                                        </div>
                                        <div class="mvsingle-item">
                                            @if(count($data['screenshots']) >= 1)
                                                @foreach($data['screenshots'] as $image)
                                                    <a class="img-lightbox" data-fancybox-group="gallery"
                                                       href="{{ asset('/'.$image->link) }}"><img
                                                            src="{{ asset('/'.$image->link) }}" alt=""></a>
                                                @endforeach
                                            @else
                                                <p>No movies found!</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div id="moviesrelated" class="tab">
                                    <div class="row">
                                        <h3>Related Movies To</h3>
                                        <h2>{{ $data['details']->title }}</h2>
                                        @if(count($data['related']) > 0)
                                            @foreach($data['related'] as $related)
                                                <div class="movie-item-style-2 ">
                                                    <img src="{{ asset('/'.$related->poster_image.'.jpg') }}" alt="{{ $related->title }} poster">
                                                    <div class="mv-item-infor">
                                                        <h6><a href="/movies/{{ $related->id }}">{{ $related->title }} <span>({{ $related->year }})</span></a></h6>
                                                        <p class="rate"><i class="ion-android-star"></i><span>{{ $related->ratings }}</span></p>
                                                        <p class="describe">{{ substr($related->synopsis,0, 300) }} ...</p>
                                                        <p class="run-time"> Run Time: 2h21’    .     <span>MMPA: PG-13 </span>    .     <span>Release date: {{ $related->year }}</span></p>
                                                        <p>Director: <a href="#">Joss Whedon</a></p>
                                                        <p>Stars: <a href="#">Robert Downey Jr.,</a> <a href="#">Chris Evans,</a> <a href="#">  Chris Hemsworth</a></p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>Sorry there is no related movies !</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
