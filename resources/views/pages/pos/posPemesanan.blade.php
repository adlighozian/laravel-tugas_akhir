@extends('main')

@section('main')
    {{-- MAIN START --}}
    <div class="sm:h-[70px] w-full h-[50px] bg-white flex items-center px-4 justify-between duration-500">
        <p class="sm:text-xl text-xs font-bold">Pesan Makanan</p>
        <div class="flex">
            {{-- <form action="/checkRequest" method="post">
                @csrf --}}
            <a href="/pemesanan/confirmation" class="mr-3">
                <button
                    class="sm:text-base p-2 text-xs bg-boxtiga text-white rounded-md flex items-center font-medium hover:bg-opacity-80 duration-150">
                    <i class='bx bx-plus-medical mr-2'></i>Pesan Makanan
                </button>
            </a>

        </div>
    </div>
    <div class="w-full p-4">
        <div class="p-2 bg-black bg-opacity-10 rounded-xl w-full flex items-center flex-col">
            <div class="w-full flex flex-col items-start py-3">
                <form class="sm:mb-0 flex w-full md:w-[300px] mb-3" role="search">
                    <input class="form-control rounded-l-md" type="search" placeholder="Search" aria-label="Search">
                    <button class="bg-slate-500 rounded-r-md text-white px-2 font-medium hover:bg-opacity-80"
                        type="submit">Search</button>
                </form>
                <form action="/checkRequest" method="post" class="sm:mb-0 flex w-full md:w-[300px] mb-3"
                    role="tableNumber">
                    @csrf
                    {{-- <button
                    class="sm:text-base p-2 text-xs bg-boxtiga text-white rounded-md flex items-center font-medium hover:bg-opacity-80 duration-150">
                    <i class='bx bx-plus-medical mr-2'></i>Pesan Makanan
                </button> --}}

                    <nav>
                        <ul class="pagination">
                            @foreach ($categories as $c)
                                <li class="page-item"><a class="page-link text-black"
                                        href="#">{{ $c->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </nav>

                    <div class="mb-3">
                        {{-- <button
                            class="sm:text-base p-2 text-xs bg-boxtiga text-white rounded-md flex items-center font-medium hover:bg-opacity-80 duration-150">
                            <i class='bx bx-plus-medical mr-2'></i>Pesan Makanan
                        </button> --}}
                        <label for="tableNumber" class="mb-1 font-medium">Nomor Meja</label>
                        <input type="number" id="tableNumber" class="form-control rounded-2xl h-[48px] border-0"
                            name="tableNumber" required>
                        <label for="customerName" class="mb-1 font-medium">Nama Pemesan</label>
                        <input type="text" id="customerName" class="form-control rounded-2xl h-[48px] border-0"
                            name="customerName" required>
                    </div>

            </div>

            <div
                class="xl:grid-cols-4 sm:grid-cols-2 sm:grid grid-cols-1 gap-4 flex flex-col items-center w-full overflow-hidden">
                @foreach ($menu as $m)
                    <div class="w-[300px] rounded-md bg-warnadua shadow-md mb-3 p-2">
                        <div class="col-md-1 d-flex align-self-center">
                            <div class="form-check">
                                <input class="form-check-input mx-auto" type="checkbox" value="{{ $m->id }}"
                                    id="flexCheckDefault" name="food_id[]">
                            </div>
                        </div>
                        <div class="h-[200px] overflow-hidden bg-slate-500 flex justify-center items-center">
                            <img src="{{ $m->image }}" class="img-menu">
                        </div>
                        <div class="w-full h-[100px] bg-white">
                            <p class="w-full font-medium text-center">{{ $m->name }}</p>
                            <div class="overflow-auto p-2">
                                <p class="">
                                    {{ $m->description }}
                                </p>
                            </div>
                        </div>
                        <div class="bg-white py-2 text-center w-full font-bold">Rp.{{ number_format($m->price) }}</div>
                        <div class="flex p-2">
                            <button type="button" class="btn btn-secondary btn-number btn-pesan-number" disabled="disabled"
                                data-type="minus" data-field="total[{{ $m->id }}]">-</button>
                            <input type="text" name="total[{{ $m->id }}]"
                                class="form-control input-number text-center pesan-number" value="0" min="0"
                                max="100">
                            <button type="button" class="btn btn-secondary btn-number btn-pesan-number" data-type="plus"
                                data-field="total[{{ $m->id }}]">+</button>
                        </div>
                    </div>
                @endforeach
            </div>
            </form>
        </div>
    </div>

    {{-- MAIN END --}}
@endsection
