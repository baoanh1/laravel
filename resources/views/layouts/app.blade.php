<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="urlorigin" content="{{ url('') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' =>  auth()->user()
        ]) !!};
        var fetchChatURL = null;
    </script>
    <style type="text/css">
    .ThreadSection {
            font-size: 12px;
    font-family: sans-serif;
    height: 100%;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    border-left: 1px solid #ececec;
    color: #000;
}
img.UserAvatar.media-object.img-circle {
    width: 50px;
}
.Chat .left {
    height: 100%;
}
.item-chat {
    border-bottom: solid 1px rgba(0, 0, 0, 0.075);
}
.ThreadSection .ChatMenu>li {
    width: 33.33%;
    text-align: center;
}
.nav-pills>li {
    float: left;
}
.nav>li {
    position: relative;
    display: block;
}
.ThreadSection .ThreadList .ThreadItem .ProductImageDiv {
    width: 50px;
    height: 50px;
    border-radius: 5px;
    background-size: cover!important;
    background-position: 50%;
    margin-right: 5px;
}

.ThreadSection .ThreadList .ThreadItem .ProductInfoDiv {
    width: 100%;
    padding-right: 5px;
    position: relative;
}
.ThreadSection .ThreadList .ThreadItem .ProductName, .ThreadSection .ThreadList .ThreadItem .UserNameTime {
    margin: 0 0 5px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
.ThreadSection .ThreadList .ThreadItem .ProductImageDiv {
    width: 50px;
    height: 50px;
    border-radius: 5px;
    background-size: cover!important;
    background-position: 50%;
    margin-right: 5px;
}
.ThreadSection .ThreadItemContent {
    margin-left: 10px;
    margin-right: 0;
    -ms-flex: 1;
    flex: 1;
    width: 100%;
    padding-right: 10px;
}
.ThreadSection .ThreadItemContent .Link-Message {
    width: 100%;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
}
.ThreadSection .ThreadList .ThreadItem .ProductInfoDiv {
    width: 100%;
    padding-right: 5px;
    position: relative;
}
.media-body {
    width: 100%;
}
.MessageSectionHeader, .MessageWrapper {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
}
.MessageHeader .ChatNameSection {
    border-bottom: 1px solid rgba(0,0,0,.1);
    padding: 0;
    margin: 0;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: row;
    flex-direction: row;
    font-weight: 700;
    text-align: center;
    font-size: 20px;
    position: relative;
    height: 49px;
}
.MessageHeader .ChatNameSection .NameWrapper {
    font-size: 14px;
    text-align: left;
    -ms-flex: 1;
    flex: 1;
    padding: 6px 12px;
    padding-left: 3px;
    cursor: pointer;
}
.MessageHeader .ChatNameSection .NameWrapper .PartnerAvatar {
    display: block;
    width: 30px;
    height: 30px;
    margin-left: 5px;
    margin-right: 10px;
    border-radius: 50%;
    float: left;
}

.MessageHeader .ChatNameSection .NameWrapper .ActiveTime {
    font-size: 11px;
    color: #aaa;
    font-weight: 400;
}
.MessageHeader .ChatNameSection .RightTopHeaderWrapper .item {
    cursor: pointer;
    color: #74bd4f;
}
.MessageHeader .ChatNameSection .RightTopHeaderWrapper .CallButton {
    -ms-flex: 4;
    flex: 4;
    padding: 0 14px;
    height: 100%;
    line-height: 49px;
    font-size: 14px;
    border-left: 1px solid rgba(0,0,0,.1);
}
.MessageHeader .ChatNameSection .RightTopHeaderWrapper .CallButton .headerIcon {
    width: 25px;
    height: 25px;
    margin-right: 10px;
}
.MessageHeader .ChatNameSection .RightTopHeaderWrapper .PrivacyBtn {
    -ms-flex: 1;
    flex: 1;
    height: 100%;
    border-left: 1px solid rgba(0,0,0,.1);
}
.ChatTitleSection .ProductImageDiv {
    width: 50px;
    height: 50px;
    border-radius: 5px;
    background-size: cover!important;
    background-position: 50%;
}
.MessageHeader .ChatNameSection .RightTopHeaderWrapper .PrivacyBtn {
    -ms-flex: 1;
    flex: 1;
    float: right;
    height: 100%;
    border-left: 1px solid rgba(0,0,0,.1);
}
.MessageHeader .ChatNameSection {
    border-bottom: 1px solid rgba(0,0,0,.1);
    padding: 0;
    margin: 0;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: row;
    flex-direction: row;
    font-weight: 700;
    text-align: center;
    font-size: 20px;
    position: relative;
    height: 49px;
}
.MessageHeader .ChatNameSection .RightTopHeaderWrapper .item {
    cursor: pointer;
    color: #74bd4f;
}
.EmptyChatRoom {
    background-color: rgba(0,0,0,.1);
    min-height: 1024px;
    padding: 10px;
    background: url({{url('Pront/images/chat.png')}}) #ececec;
    background-repeat: no-repeat;
    background-position: center 30vh;
    width:100%;
}
</style>
</head>
<body>
    
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script type="text/javascript">
    @yield('routes')
    </script>
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/notify.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @yield('script')
</body>
</html>
