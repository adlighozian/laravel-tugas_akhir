@extends('main')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <style>
        /* .table-bordered.card {
                border: 0 !important;
            }

            .card thead {
                display: none;
            }

            .card tbody tr {
                float: left;
                width: 25em;
                margin: 0.5em;
                border: 1px solid #bfbfbf;
                border-radius: 0.5em;
                background-color: transparent !important;
                box-shadow: 0.25rem 0.25rem 0.5rem rgba(0, 0, 0, 0.25);
            }

            .card tbody tr td {
                display: block;
                border: 0;
            } */
        .tbody tr {
            float: left;
            width: 19rem;
            margin: 0.5rem;
            border: 0.0625rem solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
            box-shadow: 0.25rem 0.25rem 0.5rem rgba(0, 0, 0, 0.25);
        }

        .tbody td {
            display: block;
        }

        .thead {
            display: none;
        }

        .td:before {
            content: attr(data-label);
            position: relative;
            float: left;
            color: #808080;
            min-width: 4rem;
            margin-left: 0;
            margin-right: 1rem;
            text-align: left;
        }

        /* tr.selected td:before {
            color: #CCC;
        }

        .table .avatar {
            width: 50px;
        } */

        .cards .avatar {
            width: 150px;
            height: 150px;
            margin: 15px;
        }
    </style>
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
                            <input type="text" name="kode_order" value="{{ $kode_order }}">
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
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Checked</th>
                            <th>Nama Makanan</th>
                            <th>Deskripsi Makanan</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menu as $m)
                            <tr>
                                <td>
                                    @if ($m->is_hidden === 0)
                                        <div class="form-check hidden">
                                            <input class="form-check-input mx-auto" type="checkbox"
                                                value="{{ $m->id }}" id="flexCheckDefault" hidden checked
                                                name="food_id[]">
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $m->name }}</td>
                                <td>{{ $m->description }}</td>
                                <td>
                                    @if ($m->image)
                                        <img src="{{ asset('storage/' . $m->image) }}" alt="">
                                    @else
                                        <img src="{{ asset('assets/img/empty.png') }}" alt="">
                                    @endif
                                </td>
                                <td>Rp.{{ number_format($m->price) }}</td>
                                <td>
                                    @if ($m->is_hidden === 1)
                                        <div class="flex p-2">
                                            <button type="button" class="btn btn-secondary"
                                                disabled="disabled">-</button>
                                            <input type="text" name="total[{{ $m->id }}]"
                                                class="form-control text-center  font-medium " disabled value="Stok habis"
                                                min="0" max="100">
                                            <button type="button" class="btn btn-secondary"
                                                disabled="disabled">+</button>
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    {{-- MAIN END --}}
@endsection

@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            //Only needed for the filename of export files.
            //Normally set in the title tag of your page.
            document.title = "Card View DataTable";
            // DataTable initialisation
            $("#example").DataTable({

            });
        });
    </script>
@endsection
