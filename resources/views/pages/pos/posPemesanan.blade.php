@extends('main')

@section('main')
    {{-- MAIN START --}}
    @php
    if (!isset($table_number)) {
        $table_number = '';
    }
    if (!isset($customer_name)) {
        $customer_name = '';
    }

    @endphp
    {{-- ALERT_SUCCESS START --}}
    @include('components.alert')
    {{-- ALERT_SUCCESS END --}}
    <div class="sm:h-[70px] w-full h-[50px] bg-white flex items-center px-4 justify-between duration-500">
        <p class="sm:text-xl text-xs font-bold">Pesan Makanan</p>
        <div class="flex">
            <button id="secondaryButton" onclick="document.getElementById('submitPesanan').click()"
                class="sm:text-base p-2 text-xs bg-boxtiga text-white rounded-md flex items-center font-medium hover:bg-opacity-80 duration-150">
                <i class='bx bx-plus-medical mr-2'></i>Pesan Makanan
            </button>
        </div>
    </div>
    <div class="w-full p-4">
        <div class="p-2 bg-black bg-opacity-10 rounded-xl w-full flex items-center flex-col">
            <div class="w-full flex flex-col items-start py-3">
                <div class="w-full flex justify-center">
                    <form action="/pemesanan" class="sm:mb-0 flex w-full md:w-[300px] mb-3" role="search">
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
                    <form action="/pemesanan" class="" role="search">
                        @if (request('search'))
                            <input type="hidden" value="{{ request('search') }}" name="search">
                        @endif
                        <input class="form-control rounded-l-md" type="hidden" name="category" value="">
                        <button class="page-link bg-gray-300 text-black" type="submit">All</button>
                    </form>
                    @foreach ($categories as $c)
                        <form action="/pemesanan" class="" role="search">
                            @if (request('search'))
                                <input type="hidden" value="{{ request('search') }}" name="search">
                            @endif
                            <input class="form-control rounded-l-md" type="hidden" name="category"
                                value="{{ $c->id }}">
                            <button class="page-link bg-gray-300 text-black" type="submit">{{ $c->category_name }}</button>
                        </form>
                    @endforeach
                </div>
            </div>
            <form action="/checkRequest" class="w-full" method="post">
                @csrf
                <button hidden id="submitPesanan"
                    class="sm:text-base p-2 text-xs bg-boxtiga text-white rounded-md flex items-center font-medium hover:bg-opacity-80 duration-150">
                    <i class='bx bx-plus-medical mr-2'></i>Pesan Makanan
                </button>
                <div class="sm:mb-0 flex w-full md:w-[300px] mb-3" role="tableNumber">
                    @if ($table_number != '')
                        <div class="mb-3 flex w-fit">
                            <div class="mr-2">
                                <label for="tableNumber" class="mb-1 font-medium">Nomor Meja</label>
                                <input type="number" id="tableNumber" class="form-control rounded-2xl h-[48px] border-0"
                                    name="tableNumber" required value="{{ $table_number }}" readonly>
                            </div>
                            <div>
                                <label for="customerName" class="mb-1 font-medium">Nama Pemesan</label>
                                <input type="text" id="customerName" class="form-control rounded-2xl h-[48px] border-0"
                                    name="customerName" required value="{{ $customer_name }}" readonly>
                            </div>
                        </div>
                    @else
                        <div class="mb-3 flex w-fit">
                            <div class="mr-2">
                                <label for="tableNumber" class="mb-1 font-medium">Nomor Meja</label>
                                <input type="number" id="tableNumber" class="form-control rounded-md h-[48px] border-0"
                                    name="tableNumber" required>
                            </div>
                            <div>
                                <label for="customerName" class="mb-1 font-medium">Nama Pemesan</label>
                                <input type="text" id="customerName" class="form-control rounded-md h-[48px] border-0"
                                    name="customerName" required>
                            </div>
                        </div>
                    @endif
                </div>
                <div
                    class="xl:grid-cols-4 sm:grid-cols-2 sm:grid grid-cols-1 gap-4 flex flex-col items-center w-full overflow-hidden">
                    @foreach ($menu as $m)
                        <div class="w-[300px] rounded-md bg-warnadua shadow-md mb-3 p-2">
                            <div class="col-md-1 d-flex align-self-center">
                                @if ($m->is_hidden === 0)
                                    <div class="form-check hidden">
                                        <input class="form-check-input mx-auto" type="checkbox" value="{{ $m->id }}"
                                            id="flexCheckDefault" hidden checked name="food_id[]">
                                    </div>
                                @endif
                            </div>
                            <div class="h-[200px] overflow-hidden bg-white flex justify-center items-center">
                                @if ($m->image)
                                    <img src="{{ asset('storage/' . $m->image) }}" alt="">
                                @else
                                    <img src="{{ asset('assets/img/empty.png') }}" alt="">
                                @endif
                            </div>
                            <div class="w-full h-[100px] bg-white">
                                <p class="w-full font-medium text-center">{{ $m->name }}</p>
                                <div class="overflow-auto p-2">
                                    <p class="">
                                        {{ $m->description }}
                                    </p>
                                </div>
                            </div>
                            <div class="bg-white py-2 text-center w-full font-bold">Rp.{{ number_format($m->price) }}
                            </div>
                            @if ($m->is_hidden === 1)
                                <div class="flex p-2">
                                    <button type="button" class="btn btn-secondary" disabled="disabled">-</button>
                                    <input type="text" name="total[{{ $m->id }}]"
                                        class="form-control text-center  font-medium " disabled value="Stok habis"
                                        min="0" max="100">
                                    <button type="button" class="btn btn-secondary" disabled="disabled">+</button>
                                </div>
                            @else
                                <div class="flex p-2">
                                    <button type="button" class="btn btn-secondary btn-number btn-pesan-number"
                                        disabled="disabled" data-type="minus"
                                        data-field="total[{{ $m->id }}]">-</button>
                                    <input type="text" name="total[{{ $m->id }}]"
                                        class="form-control input-number text-center pesan-number" value="0"
                                        min="0" max="100">
                                    <button type="button" class="btn btn-secondary btn-number btn-pesan-number"
                                        data-type="plus" data-field="total[{{ $m->id }}]">+</button>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>

    {{-- MAIN END --}}
@endsection
