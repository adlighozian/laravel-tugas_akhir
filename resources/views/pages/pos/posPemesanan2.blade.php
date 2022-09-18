@extends('main')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="/assets/css/pos.css">
@endsection

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
                <i class='bx bx-plus-medical mr-2'></i>Pesan Menu
            </button>
        </div>
    </div>
    <div class="w-full px-[100px] py-4">
        <div class="p-2 bg-black bg-opacity-10 rounded-xl w-full flex items-center flex-col">
            {{-- <div class="w-full flex flex-col items-start py-3">
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
            </div> --}}
            <form action="/checkRequest" class="w-full" method="post">
                @csrf
                <button hidden id="submitPesanan"
                    class="sm:text-base p-2 text-xs bg-boxtiga text-white rounded-md flex items-center font-medium hover:bg-opacity-80 duration-150">
                    <i class='bx bx-plus-medical mr-2'></i>Pesan Makanan
                </button>
                <div class="sm:mb-0 flex w-full mb-3 justify-center" role="tableNumber">
                    @if ($table_number != '')
                        <div class="mb-3 flex w-fit">
                            <div class="mr-2">
                                <label for="tableNumber" class="mb-1 font-medium">Nomor Meja</label>
                                <input type="number" id="tableNumber" class="form-control rounded-2xl h-[30px] border-0"
                                    name="tableNumber" required value="{{ $table_number }}" readonly>
                            </div>
                            <div>
                                <label for="customerName" class="mb-1 font-medium">Nama Pemesan</label>
                                <input type="text" id="customerName" class="form-control rounded-2xl h-[30px] border-0"
                                    name="customerName" required value="{{ $customer_name }}" readonly>
                            </div>
                            <input type="text" name="kode_order" hidden value="{{ $kode_order }}">
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
                {{-- <div class="px-[100px]"> --}}
                <table id="example" class="table table-striped table-bordered w-fit" cellspacing="0" width="100%">
                    <thead class="text-white bg-tabelsatu mt-5">
                        <tr>
                            <th hidden>Checked</th>
                            <th hidden>Nama Makanan</th>
                            <th hidden>Deskripsi Makanan</th>
                            <th>Menu</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($menu as $m)
                            <tr>
                                <td hidden>
                                    @if ($m->is_hidden === 0)
                                        <div class="form-check hidden">
                                            <input class="form-check-input mx-auto" type="checkbox"
                                                value="{{ $m->id }}" id="flexCheckDefault" hidden checked
                                                name="food_id[]">
                                        </div>
                                    @endif
                                </td>
                                <td hidden>{{ $m->description }}</td>
                                <td hidden>{{ $m->name }}</td>
                                <td class="p-0">
                                    <div class="flex">
                                        <div
                                            class="mr-2 overflow-hidden w-[200px] h-[200px] flex justify-center items-center">
                                            @if ($m->image)
                                                {{-- <img src="{{ asset('storage/' . $m->image) }}" alt=""> --}}
                                                <img src="{{ URL::asset('assets/img/' . $m->image) }}" alt="">
                                                {{-- <img src="{{ URL::asset('storage/' . $m->image) }}" alt=""> --}}
                                                {{-- <img src="{{ Storage::url('' . $m->image) }}" alt=""> --}}
                                            @else
                                                <img class="border-2 border-black" src="{{ asset('assets/img/empty.png') }}"
                                                    alt="">
                                            @endif
                                        </div>
                                        <div>
                                            <div class="font-bold text-xl mb-3">
                                                {{ $m->name }}
                                            </div>
                                            <div class="w-[300px]">
                                                {{ $m->description }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center justify-center" style="vertical-align: middle;">{{ $m->category }}
                                </td>
                                <td class="text-center" style="vertical-align: middle;">
                                    Rp.{{ number_format($m->price) }}
                                </td>
                                <td style="vertical-align: middle;">
                                    @if ($m->is_hidden === 1)
                                        <div class="flex p-2">
                                            <button type="button" class="btn btn-secondary" disabled="disabled">+</button>
                                            <input type="text" name="total[{{ $m->id }}]"
                                                class="form-control text-center  font-medium " disabled value="Stok habis"
                                                min="0" max="100">
                                            <button type="button" class="btn btn-secondary" disabled="disabled">-</button>
                                        </div>
                                    @else
                                        <div class="flex p-2">
                                            <button type="button"
                                                class="btn btn-secondary text-black btn-number btn-pesan-number"
                                                disabled="disabled" data-type="minus"
                                                data-field="total[{{ $m->id }}]">-</button>
                                            <input type="text" name="total[{{ $m->id }}]"
                                                class="form-control input-number text-center pesan-number" value="0"
                                                min="0" max="100">
                                            <button type="button"
                                                class="btn btn-secondary text-black btn-number btn-pesan-number"
                                                data-type="plus" data-field="total[{{ $m->id }}]">+</button>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- </div> --}}
            </form>
        </div>
    </div>

    {{-- MAIN END --}}
@endsection

@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="/assets/js/pos.js"></script>
@endsection
