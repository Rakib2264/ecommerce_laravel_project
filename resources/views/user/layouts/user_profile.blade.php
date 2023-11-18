@extends('user.layouts.template')
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="box_main">
                <ul class="list-group navigation-menu">
                    <li class="list-group-item"><a href="{{route('userprofile')}}">Dashboard</a></li>
                    <li class="list-group-item"><a href="{{route('pendingorders')}}">Pending Orders</a></li>
                    <li class="list-group-item"><a href="{{route('history')}}">History</a></li>
                    <li class="list-group-item">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                   <button type="submit">Logout</button>
                </form>
            </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="box_main">
                        @yield('userprofile')
            </div>
        </div>
    </div>
</div>
@endsection
