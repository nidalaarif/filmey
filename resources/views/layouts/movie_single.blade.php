
<!DOCTYPE html>

<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">
<head>
    <!-- Basic need -->
    <title>Open Pediatrics</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
    <!-- Mobile specific meta -->
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone-no">
    <style>
        #output video {
            width: 100%;
        }
        #progressBar {
            height: 5px;
            width: 0%;
            background-color: #35b44f;
            transition: width .4s ease-in-out;
        }
        body.is-seed .show-seed {
            display: inline;
        }
        body.is-seed .show-leech {
            display: none;
        }
        .show-seed {
            display: none;
        }
        #play_status code {
            font-size: 90%;
            font-weight: 700;
            margin-left: 3px;
            margin-right: 3px;
            border-bottom: 1px dashed rgba(255,255,255,0.3);
        }

        .is-seed #hero {
            background-color: #154820;
            transition: .5s .5s background-color ease-in-out;
        }
        #hero {
            background-color: #2a3749;
        }
        #play_status {
            color: #fff;
            font-size: 17px;
            padding: 5px;
        }
        a:link, a:visited {
            text-decoration: none;
        }
        .button {
            display: inline-block;
            margin: 0.75rem;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.1875rem;
            outline: none;
            background-color: tomato;
            color: white;
            font-family: inherit;
            font-size: 1.25em;
            font-weight: 400;
            line-height: 1.5rem;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            -webkit-transition: all 150ms ease-out;
            transition: all 150ms ease-out;
        }
        .button:focus, .button:hover {
            background-color: #ff7359;
            box-shadow: 0 0 0 0.1875rem white, 0 0 0 0.375rem #ff7359;
        }
        .button:active {
            background-color: #f25e43;
            box-shadow: 0 0 0 0.1875rem #f25e43, 0 0 0 0.375rem #f25e43;
            -webkit-transition-duration: 75ms;
            transition-duration: 75ms;
        }
        .button.is-outlined {
            border: 0.1875rem solid tomato;
            background-color: transparent;
            color: tomato;
        }
        .button.is-outlined:focus, .button.is-outlined:hover {
            border-color: #ff7359;
            color: #ff7359;
        }
        .button.is-outlined:active {
            border-color: #f25e43;
            color: #f25e43;
        }





    </style>
    <!-- CSS files -->
    <link rel="stylesheet" href="{{ asset('/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">




</head>
<body>
<!--preloading-->
<div id="preloader">
    <img class="logo" src="images/logo1.png" alt="" width="119" height="58">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>
<!--end of preloading-->
<!--login form popup-->
<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Login</h3>
        <form method="post" action="login.php">
            <div class="row">
                <label for="username">
                    Username:
                    <input type="text" name="username" id="username" placeholder="Hugh Jackman" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
            </div>

            <div class="row">
                <label for="password">
                    Password:
                    <input type="password" name="password" id="password" placeholder="******" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
            <div class="row">
                <div class="remember">
                    <div>
                        <input type="checkbox" name="remember" value="Remember me"><span>Remember me</span>
                    </div>
                    <a href="#">Forget password ?</a>
                </div>
            </div>
            <div class="row">
                <button type="submit">Login</button>
            </div>
        </form>
        <div class="row">
            <p>Or via social</p>
            <div class="social-btn-2">
                <a class="fb" href="#"><i class="ion-social-facebook"></i>Facebook</a>
                <a class="tw" href="#"><i class="ion-social-twitter"></i>twitter</a>
            </div>
        </div>
    </div>
</div>
<!--end of login form popup-->
<!--signup form popup-->
<div class="login-wrapper"  id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>sign up</h3>
        <form method="post" action="signup.php">
            <div class="row">
                <label for="username-2">
                    Username:
                    <input type="text" name="username" id="username-2" placeholder="Hugh Jackman" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
            </div>

            <div class="row">
                <label for="email-2">
                    your email:
                    <input type="password" name="email" id="email-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
            <div class="row">
                <label for="password-2">
                    Password:
                    <input type="password" name="password" id="password-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
            <div class="row">
                <label for="repassword-2">
                    re-type Password:
                    <input type="password" name="password" id="repassword-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
            <div class="row">
                <button type="submit">sign up</button>
            </div>
        </form>
    </div>
</div>
<!--end of signup form popup-->

<!-- BEGIN | Header -->
<header class="ht-header">
    <div class="container">
        <nav class="navbar navbar-default navbar-custom">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header logo">
                <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <div id="nav-icon1">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <a href="index.html"><img class="logo" src="images/logo1.png" alt="" width="119" height="58"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav flex-child-menu menu-left">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="dropdown first">
                        <a href="/" class="btn btn-default lv1">HOME</a>
{{--                        <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown">--}}
{{--                            Home <i class="fa fa-angle-down" aria-hidden="true"></i>--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu level1">--}}
{{--                            <li><a href="index.html">Home 01</a></li>--}}
{{--                            <li><a href="homev2.html">Home 02</a></li>--}}
{{--                            <li><a href="homev3.html">Home 03</a></li>--}}
{{--                        </ul>--}}
                    </li>
                    <li class="dropdown first">
                        <a href="/movies" class="btn btn-default lv1">Browse movies</a>
{{--                        <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">--}}
{{--                            movies<i class="fa fa-angle-down" aria-hidden="true"></i>--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu level1">--}}
{{--                            <li class="dropdown">--}}
{{--                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Movie grid<i class="ion-ios-arrow-forward"></i></a>--}}
{{--                                <ul class="dropdown-menu level2">--}}
{{--                                    <li><a href="moviegrid.html">Movie grid</a></li>--}}
{{--                                    <li><a href="moviegridfw.html">movie grid full width</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li><a href="movielist.html">Movie list</a></li>--}}
{{--                            <li><a href="moviesingle.html">Movie single</a></li>--}}
{{--                            <li class="it-last"><a href="seriessingle.html">Series single</a></li>--}}
{{--                        </ul>--}}
                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                            celebrities <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu level1">
                            <li><a href="celebritygrid01.html">celebrity grid 01</a></li>
                            <li><a href="celebritygrid02.html">celebrity grid 02 </a></li>
                            <li><a href="celebritylist.html">celebrity list</a></li>
                            <li class="it-last"><a href="celebritysingle.html">celebrity single</a></li>
                        </ul>
                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                            news <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu level1">
                            <li><a href="bloglist.html">blog List</a></li>
                            <li><a href="bloggrid.html">blog Grid</a></li>
                            <li class="it-last"><a href="blogdetail.html">blog Detail</a></li>
                        </ul>
                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                            community <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu level1">
                            <li><a href="userfavoritegrid.html">user favorite grid</a></li>
                            <li><a href="userfavoritelist.html">user favorite list</a></li>
                            <li><a href="userprofile.html">user profile</a></li>
                            <li class="it-last"><a href="userrate.html">user rate</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav flex-child-menu menu-right">
                    <li class="dropdown first">
                        <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                            pages <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu level1">
                            <li><a href="landing.html">Landing</a></li>
                            <li><a href="404.html">404 Page</a></li>
                            <li class="it-last"><a href="comingsoon.html">Coming soon</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Help</a></li>
                    <li class="loginLink"><a href="#">LOG In</a></li>
                    <li class="btn signupLink"><a href="#">sign up</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </div>
</header>
<!-- END | Header -->

<div class="hero mv-single-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <h1> movie listing - list</h1>
                <ul class="breadcumb">
                    <li class="active"><a href="#">Home</a></li>
                    <li> <span class="ion-ios-arrow-right"></span> movie listing</li>
                </ul> -->
            </div>
        </div>
    </div>
</div>
@yield('movie')
<!-- footer section-->
<footer class="ht-footer">
    <div class="container">
        <div class="flex-parent-ft">
            <div class="flex-child-ft item1">
                <a href="index.html"><img class="logo" src="images/logo1.png" alt=""></a>
                <p>5th Avenue st, manhattan<br>
                    New York, NY 10001</p>
                <p>Call us: <a href="#">(+01) 202 342 6789</a></p>
            </div>
            <div class="flex-child-ft item2">
                <h4>Resources</h4>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Blockbuster</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Forums</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Help Center</a></li>
                </ul>
            </div>
            <div class="flex-child-ft item3">
                <h4>Legal</h4>
                <ul>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Security</a></li>
                </ul>
            </div>
            <div class="flex-child-ft item4">
                <h4>Account</h4>
                <ul>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Watchlist</a></li>
                    <li><a href="#">Collections</a></li>
                    <li><a href="#">User Guide</a></li>
                </ul>
            </div>
            <div class="flex-child-ft item5">
                <h4>Newsletter</h4>
                <p>Subscribe to our newsletter system now <br> to get latest news from us.</p>
                <form action="#">
                    <input type="text" placeholder="Enter your email...">
                </form>
                <a href="#" class="btn">Subscribe now <i class="ion-ios-arrow-forward"></i></a>
            </div>
        </div>
    </div>
    <div class="ft-copyright">
        <div class="ft-left">
            <p>© 2017 Blockbuster. All Rights Reserved. Designed by leehari.</p>
        </div>
        <div class="backtotop">
            <p><a href="#" id="back-to-top">Back to top  <i class="ion-ios-arrow-thin-up"></i></a></p>
        </div>
    </div>
</footer>
<!-- end of footer section-->

<script src="{{ asset('/js/jquery.js') }}"></script>
<script src="{{ asset('/js/plugins.js') }}"></script>
<script src="{{ asset('/js/plugins2.js') }}"></script>
<script src="{{ asset('/js/custom.js') }}"></script>

<!-- Include the latest version of WebTorrent -->
<script src="https://cdn.jsdelivr.net/npm/webtorrent@latest/webtorrent.min.js"></script>

<!-- Moment is used to show a human-readable remaining time -->
<script src="http://momentjs.com/downloads/moment.min.js"></script>

<script>

    //TODO: fix repeating player and dirtoying the existing Webtorrent object
    function playIt(link,quality) {
        var $stream_info = document.querySelector('.stream_info')
        $stream_info.removeAttribute('hidden')
        var $t_link = $stream_info.querySelector('#torrentLink')
        $t_link.innerHTML += quality
        var torrentId = link;
        if (client){
            client.destroy()
        }
        var client = new WebTorrent();

        // HTML elements
        var $body = document.body
        var $progressBar = document.querySelector('#progressBar')
        var $numPeers = document.querySelector('#numPeers')
        var $downloaded = document.querySelector('#downloaded')
        var $total = document.querySelector('#total')
        var $remaining = document.querySelector('#remaining')
        var $uploadSpeed = document.querySelector('#uploadSpeed')
        var $downloadSpeed = document.querySelector('#downloadSpeed')
        var $out = document.querySelector('#output')
        $out.innerHTML = ''

        // Download the torrent
        client.add(torrentId, function (torrent) {

            // Torrents can contain many files. Let's use the .mp4 file
            var file = torrent.files.find(function (file) {
                return file.name.endsWith('.mp4')
            })

            // Stream the file in the browser
            file.appendTo('#output')

            // Trigger statistics refresh
            torrent.on('done', onDone)
            setInterval(onProgress, 500)
            onProgress()

            // Statistics
            function onProgress () {
                // Peers
                $numPeers.innerHTML = torrent.numPeers + (torrent.numPeers === 1 ? ' peer' : ' peers')

                // Progress
                var percent = Math.round(torrent.progress * 100 * 100) / 100
                $progressBar.style.width = percent + '%'
                $downloaded.innerHTML = prettyBytes(torrent.downloaded)
                $total.innerHTML = prettyBytes(torrent.length)

                // Remaining time
                var remaining
                if (torrent.done) {
                    remaining = 'Done.'
                } else {
                    remaining = moment.duration(torrent.timeRemaining / 1000, 'seconds').humanize()
                    remaining = remaining[0].toUpperCase() + remaining.substring(1) + ' remaining.'
                }
                $remaining.innerHTML = remaining

                // Speed rates
                $downloadSpeed.innerHTML = prettyBytes(torrent.downloadSpeed) + '/s'
                $uploadSpeed.innerHTML = prettyBytes(torrent.uploadSpeed) + '/s'
            }
            function onDone () {
                $body.className += ' is-seed'
                onProgress()
            }
        })

        // Human readable bytes util
        function prettyBytes(num) {
            var exponent, unit, neg = num < 0, units = ['B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB']
            if (neg) num = -num
            if (num < 1) return (neg ? '-' : '') + num + ' B'
            exponent = Math.min(Math.floor(Math.log(num) / Math.log(1000)), units.length - 1)
            num = Number((num / Math.pow(1000, exponent)).toFixed(2))
            unit = units[exponent]
            return (neg ? '-' : '') + num + ' ' + unit
        }
    }
    document.querySelector('.button').addEventListener('click', function (event) {
        event.preventDefault();
        this.innerHTML = 'movie playing...please wait';
        this.disabled = true;
    });

</script>
</body>
</html>
