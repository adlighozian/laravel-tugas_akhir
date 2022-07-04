@extends('main')

@section('main')
    <div class="flex">
        {{-- SIDEBAR START --}}
        @include('components.sidebar')
        {{-- SIDEBAR END --}}
        <div class="w-full h-[100vh] bg-warnasatu">
            @include('components.navbar')
            {{-- MAIN SATRT --}}
            <div class="w-full px-3">
                <div class="w-full flex justify-between items-center h-[80px]">
                    <p class="font-medium text-lg">Admin</p>
                    <a href="/adminregister">
                        <button class="font-medium text-sm items-center text-white bg-warnadua p-[10px] flex rounded-xl">
                            <i class='bx bx-plus-medical items-center mr-1 mt-1'></i>Buat akun
                            baru</button>
                    </a>
                </div>
            </div>
            {{-- MAIN END --}}
        </div>
    </div>
@endsection
