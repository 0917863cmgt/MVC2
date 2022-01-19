@extends('components.layout')
@section('content')
    <body id="user-details">
    <section id="user-section" class="container-fluid">
        {{--        <div class="row user-background">--}}
        {{--            <div class="col-12 p-0">--}}
        {{--                <div class="col"><img class="background-image" src="{{auth()->user()->profile_image}}"></div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="row bio">
            <div class="col-4 offset-3">
                <img class="profile-image" alt="avatar" src="{{auth()->user()->profile_image}}">
            </div>
            <div class="col-4 p-3 grey">
                <form class="edit-user-form" id="edit-user" method="POST" action="/user-details/update/{{auth()->user()->id}}">
                    @csrf
                    @method('PATCH')
                    <label for="username" style="margin-bottom: 0">Username:</label>
                    <input name="username" type="text" id="username" value="{{auth()->user()->username}}">

                    <label for="email" style="margin-bottom: 0">E-mail:</label>
                    <input name="email" type="email" id="email" value="{{auth()->user()->email}}">
                    <p>Member since: {{auth()->user()->created_at->format('d-m-Y')}}</p>
                    <input class="register-input-submit" type="submit" name="submit" id="submit" value="Submit">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </section>
    </body>
@endsection
