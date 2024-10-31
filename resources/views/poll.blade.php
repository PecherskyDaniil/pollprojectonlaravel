@extends('statuslayout')
    @section('status')
        <div class="main-div">  
        <form method="POST">
            @csrf
            Name: <input type="text" name="name" value="{{ old('name') }}">@error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror<br>
            E-mail: <input type="text" name="email" value="{{ old('email') }}">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror<br>
            Your favorite animal: <input type="text" name="favoriteanimal" value="{{ old('favoriteanumal') }}">
            @error('favoriteanimal')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror<br>
            Your favorite food: <input type="text" name="favoritefood" value="{{ old('favoritefood') }}">
            @error('favoritefood')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror<br>
            <input type="submit">
        </form>
        </div>
    @endsection