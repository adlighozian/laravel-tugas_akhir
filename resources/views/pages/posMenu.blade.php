@extends('main')

@section('main')
    <div class="flex">
        {{-- SIDEBAR START --}}
        @include('components.sidebar')
        {{-- SIDEBAR END --}}
        <div class="w-full h-[100vh] bg-warnasatu overflow-auto">
            @include('components.navbar')
            {{-- MAIN START --}}
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
                        <form class="sm:mb-0 flex w-full md:w-[300px] mb-3" role="search">
                            <input class="form-control rounded-l-md" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="bg-slate-500 rounded-r-md text-white px-2 font-medium hover:bg-opacity-80"
                                type="submit">Search</button>
                        </form>
                        <nav>
                            <ul class="pagination">
                                @foreach ($categories as $c)
                                    <li class="page-item"><a class="page-link text-black"
                                            href="#">{{ $c->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <div
                        class="xl:grid-cols-4 sm:grid-cols-2 sm:grid grid-cols-1 gap-4 flex flex-col items-center w-full overflow-hidden">
                        @foreach ($menu as $m)
                            <div class="w-[300px] rounded-md bg-warnadua shadow-md mb-3 p-2">
                                <div class="h-[200px] overflow-hidden bg-slate-500 flex justify-center items-center">
                                </div>
                                <div class="w-full h-[100px] bg-white">
                                    <p class="w-full font-medium text-center">{{ $m->name }}</p>
                                    <div class="overflow-auto p-2">
                                        <p class="">
                                            {{ $m->description }}
                                        </p>
                                    </div>
                                </div>
                                <div class="bg-white py-2 text-center w-full font-bold">Rp. {{ $m->price }}</div>
                                <div class="flex">
                                    <a href="/menueditor/hapus/{{ $m->id }}"
                                        class="btn btn-danger rounded-none w-full font-medium">Delete</a>
                                    <a href="/updatemenu" class="btn btn-warning rounded-none w-full font-medium">Edit</a>

                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
