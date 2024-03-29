@extends('main')

@section('main')
    {{-- MAIN START --}}

    @include('components.alert')
    <div class="sm:h-[70px] w-full h-[50px] bg-white flex items-center px-4 justify-between duration-500">
        <p class="sm:text-xl text-xs font-bold">Menu Makanan</p>
        <div class="flex">
            <a href="/createmenu" class="mr-3">
                <button
                    class="sm:text-base p-2 text-xs bg-boxtiga text-white rounded-md flex items-center font-medium hover:bg-opacity-80 duration-150">
                    <i class='bx bx-plus-medical mr-2'></i>Tambah menu</button>
            </a>
            <a href="/categoryeditor">
                <button
                    class="sm:text-base bg-boxtiga text-xs text-white p-2 rounded-md flex items-center font-medium hover:bg-opacity-80 duration-150">
                    <i class='bx bx-plus-medical mr-2'></i>Tambah kategori</button>
            </a>
        </div>
    </div>
    <div class="w-full p-4">
        <div class="p-2 bg-black bg-opacity-10 rounded-xl w-full flex items-center flex-col">
            <div class="w-full flex flex-col items-start py-3">
                <div class="w-full flex justify-center">
                    <form action="/menueditor" class="sm:mb-0 flex w-full md:w-[300px] mb-3" role="search">
                        @if (request('category'))
                            <input type="hidden" value="{{ request('category') }}" name="category">
                        @endif
                        <input class="form-control rounded-l-md" type="search" value="{{ request('search') }}"
                            placeholder="Search" name="search">
                        <button class="bg-slate-500 rounded-r-md text-white px-2 font-medium hover:bg-opacity-80"
                            type="submit">Search</button>
                    </form>
                </div>
                <div class="flex">
                    <form action="/menueditor" class="" role="search">
                        @if (request('search'))
                            <input type="hidden" value="{{ request('search') }}" name="search">
                        @endif
                        <input class="form-control rounded-l-md" type="hidden" name="category" value="">
                        <button class="page-link bg-gray-300 text-black" type="submit">All</button>
                    </form>
                    @foreach ($categories as $c)
                        <form action="/menueditor" class="" role="search">
                            @if (request('search'))
                                <input type="hidden" value="{{ request('search') }}" name="search">
                            @endif
                            <input class="form-control rounded-l-md" type="hidden" name="category"
                                value="{{ $c->category_name }}">
                            <button class="page-link bg-gray-300 text-black" type="submit">{{ $c->category_name }}</button>
                        </form>
                    @endforeach
                </div>
            </div>
            <div
                class="xl:grid-cols-4 sm:grid-cols-2 sm:grid grid-cols-1 gap-4 flex flex-col items-center w-full overflow-hidden">
                @foreach ($menu as $m)
                    <div class="w-[300px] rounded-md bg-warnadua shadow-md mb-3 p-2">

                        <div class="w-full flex">
                            @if ($m->is_hidden == false)
                                <a href="/menueditor/{{ $m->id }}/hide">
                                    <button
                                        class="w-fit h-fit p-1 flex items-center justify-center bg-white rounded-lg font-medium mb-1">
                                        <i class='bx bx-show black text-[20px]'></i>
                                        Stok tersedia
                                    </button>
                                </a>
                            @else
                                <a href="/menueditor/{{ $m->id }}/unhide">
                                    <button
                                        class="w-fit h-fit p-1 flex items-center justify-center bg-white rounded-lg font-medium mb-1">
                                        <i class='bx bx-hide text-slate-600 text-[20px]'></i>
                                        Stok habis
                                    </button>
                                </a>
                            @endif
                        </div>
                        <div class="h-[200px] overflow-hidden bg-slate-600 flex justify-center items-center">
                            @if ($m->image)
                                {{-- <img src="{{ asset('storage/' . $m->image) }}" alt=""> --}}
                                <img src="{{ URL::asset('assets/img/' . $m->image) }}" alt="">
                            @else
                                <img src="{{ asset('assets/img/empty.png') }}" alt="">
                            @endif

                        </div>
                        <div class="w-full h-[100px] bg-white">
                            <p class="w-full font-medium text-center">{{ $m->name }} @php
                                if ( $m->updated_at > strtotime( '-3 day' ) ) {
                                    echo "(new!)";
                                }
                                @endphp</p>
                            <div class="overflow-auto p-2">
                                <p class="">
                                    {{ $m->description }}
                                </p>
                            </div>
                        </div>
                        <div class="bg-white py-2 text-center w-full font-bold">Rp.{{ number_format($m->price) }}</div>
                        <div class="flex">
                            <a href="/menueditor/hapus/{{ $m->id }}"
                                class="btn btn-danger rounded-none w-full font-medium">Delete</a>
                            <a href="/updatemenu/edit/{{ $m->id }}"
                                class="btn btn-warning rounded-none w-full font-medium">Edit</a>

                        </div>

                    </div>
                @endforeach
            </div>
        </div>

    </div>
    {{-- MAIN END --}}
@endsection
