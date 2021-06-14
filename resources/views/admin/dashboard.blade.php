@extends('menu')

@section('head')
    
@endsection

@section('title')
    Dashboard
@endsection

@section('main_content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h4>Dashboard</h4><hr>
            <table class="table table-hover">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </thead>
                <tbody>
                    <td>{{ $LoggedUserInfo['name'] }}</td>
                    <td>{{ $LoggedUserInfo['email'] }}</td>
                    <td><a href="{{ route('auth.logout') }}">Logout</a></td>
                </tbody>
            </table>
        </div>
    </div>
@endsection