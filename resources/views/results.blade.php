 @extends('baselayout')
    @section('content')
        <div class="main-div">
        <form action="" method="POST">   
        @csrf
        <table>
        <thead><tr class='table-header'><td>ID</td><td>Name</td> <td>Email</td> <td>Favorite animal</td> <td>Favorite food</td><td>Secret</td><td>Delete</td></tr></thead>
            @foreach ($appforms as $appform)
            <tr>
                <td>{{$appform->id}}</td>
                <td>{{$appform->name}}</td>
                <td>{{$appform->email}}</td>
                <td>{{$appform->favorite_food}}</td>
                <td>{{$appform->favorite_animal}}</td>
                <td>{{$appform->secret}}</td>
                <td><button name="delete" value="{{$appform->id}}">-</button>
            <tr>
            @endforeach
        </table>
        </div>
        @endsection
