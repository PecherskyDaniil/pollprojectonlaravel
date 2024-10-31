<html>  
    <head>
        <link rel="stylesheet" href="{{ asset('styles.css') }}"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
    <header> 
        
        <a href="/">
            <img class="logo" src="{{ asset('logo.png') }}" alt="logo"/>
        </a>
        <a href="/">
            <h1 class="sitename" >My new Laravel Project!</h1>
        </a>
        <a href="/poll">poll</a>
        <a href="/results">results</a>
        <a href="/hello/">hello</a>
    </header>
    <div class="goodstatus">{{$goodstatus}}</div>
    <div class="badstatus">{{$badstatus}}</div>
        @section('form')
        @show
    <footer style="margin-top: 20px;"> 
        <div>Just an info </div>
    </footer>
    </body>
</html>
