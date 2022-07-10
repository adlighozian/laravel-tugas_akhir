@extends('main')

@section('main')
    <div class="flex">
        {{-- SIDEBAR START --}}
        @include('components.sidebar')
        {{-- SIDEBAR END --}}
        <div class="w-full h-[100vh] overflow-auto bg-warnasatu">
            @include('components.navbar')
            {{-- MAIN SATRT --}}
            <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
                <p class="sm:text-xl font-bold">Gudang <i class='bx bxs-chevron-right'></i> Detail</p>
            </div>
            <p>{{ $data->nama }}</p>
            {{-- MAIN END --}}
        </div>
    </div>
@endsection
