@extends('main')

@section('main')
    <div class="dashboard d-flex flex-row">
        <div class="box1 d-flex flex-row overflow-hidden">
            {{-- SIDEBAR_ICON START --}}
            @include('components.sidebarIcon')
            {{-- SIDEBAR_ICON END --}}
            {{-- SIDEBAR_MENU START --}}
            @include('components.sidebarMenu')
            {{-- SIDEBAR_MENU END --}}
        </div>
        <div class="box2 overflow-hidden">
            {{-- NAVBAR START --}}
            @include('components.navbar')
            {{-- NAVBAR END --}}
            {{-- MAIN START --}}
            <div class="body">
                @yield('body')
            </div>
            {{-- MAIN END --}}
        </div>
    </div>


@endsection
