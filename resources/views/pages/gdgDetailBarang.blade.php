@extends('main')

@section('main')
    <div class="flex">
        {{-- SIDEBAR START --}}
        @include('components.sidebar')
        {{-- SIDEBAR END --}}
        <div class="w-full h-[100vh] overflow-auto bg-warnasatu">
            @include('components.navbar')
            {{-- MAIN SATRT --}}
            <div class="w-full h-[70px] bg-white flex items-center px-4 justify-between">
                <p class="text-xl font-bold">Detail barang</p>
            </div>
            {{-- MAIN END --}}
        </div>
    </div>
@endsection
