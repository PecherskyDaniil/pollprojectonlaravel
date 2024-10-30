
<html>
@include('head')
@include('header')
    <body>
        <div class="main-div">
        <form method="POST">
            @csrf
            Name: <input type="text" name="name" value="{{ $name }}"><div style="color:red;">{{$nameerror}}</div><br>
            E-mail: <input type="text" name="email" value="{{ $email }}"><div style="color:red;">{{$emailerror}}</div><br>
            Your favorite animal: <input type="text" name="favoriteanimal" value="{{ $favoriteanimal }}"><div style="color:red;">{{$favanimerror}}</div><br>
            Your favorite food: <input type="text" name="favoritefood" value="{{ $favoritefood }}"><div style="color:red;">{{$favfooderror}}</div><br>
            <input type="submit">
        </form>
        </div>
    </body>
    @include('footer')
</html>