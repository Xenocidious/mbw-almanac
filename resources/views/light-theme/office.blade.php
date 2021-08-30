@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content_office">
            <h1>Welcome to the office, {{Auth::user()->name}}</h1>
            <div class="office_roles_wrapper">
                <h2>promote/demote users</h2>
                <form action="{{ route('user.promote') }}" method="POST" class="office_roles_form">
                    @csrf
                    <label>search for user</label>
                    <input id='username' type="text" class="username" name='username' required>

                    <label for="role">Choose a role:</label>
                    <select id='role' id="role" name="role" required>
                        <option value="admin">admin</option>
                        <option value="moderator">moderator</option>
                        <option value="user" selected>user</option>
                    </select>

                    <input type='submit' name='submit' value='submit'
                           onclick='return confirm("are you sure that you want to promote/demote " + document.getElementById("username").value + " to " + document.getElementById("role").value + "?")'></input>
                </form>
            </div>
            <div class="office_statistics">
                <h3>Current amount of registered users: {{count($users)}}</h3>
            </div>
        </div>
    </div>

@endsection
