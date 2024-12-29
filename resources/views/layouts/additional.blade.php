<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
</head>
<body>
    <div id="a">
        <span>
            FLCC
        </span>
        <span id="a1">
            <a href="">Home</a>
            <a href="">About Us</a>
            <a href="">Events</a>
            <a href="">Ministry Dept</a>
            <a href="">Our Series</a>
        </span>
        <span id="a2">
            "search"
        </span>
        <span id="a3">
            Log In
        </span>
    </div>

    @yield('content')
    
    
    <div id="g">
        <span>
            <div>FLCC</div>
            <div>Location</div>
        </span>
        <span>
            Insta, Youtube
        </span>
    </div>
    <div id="h">
        &copy; 2024 Front Liner Campus Community
    </div>
</body>
</html>