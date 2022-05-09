@extends('main')

@section('main')
    {{-- CSS START --}}
    <link rel="stylesheet" href="assets/css/login.css">
    {{-- CSS END --}}
    <div class="login d-flex flex-row ">
        {{-- LEFT_SIDE START --}}
        <div class="left_side"></div>
        {{-- LEFT_SIDE END --}}
        {{-- RIGHT_SIDE START --}}
        <div class="right_side d-flex align-items-center justify-content-center">
            {{-- FORM START --}}
            <div class="form d-flex align-item-center justify-content-between flex-column">
                <div class="logo"></div>
                <p>Welcome, Admin</p>
                <form class="d-flex flex-column justify-content-between">
                    <div>
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div>
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn">Sign In</button>
                </form>
            </div>
            {{-- FORM END --}}
        </div>
        {{-- RIGHT_SIDE END --}}
    </div>
@endsection
