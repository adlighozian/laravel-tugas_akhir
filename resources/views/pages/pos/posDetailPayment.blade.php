@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold">Pesan Makanan <i class='bx bxs-chevron-right'></i> Konfirmasi Pesanan <i
                class='bx bxs-chevron-right'></i> Detail Pembayaran</p>
    </div>
    <div class="p-4">
        <div class="bg-black bg-opacity-10 rounded-xl p-3 shadow-xl flex flex-col">
            <table class="table table-hover mb-0">
                @php
                    $subtotal = 0;
                @endphp

                <thead class="text-white bg-tabelsatu">
                    <tr>
                        <th scope="col">Nama Pesanan</th>
                        <th scope="col">Jumlah pesanan</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody class="text-black bg-white">
                    @foreach ($orders as $order => $item)
                        <tr>
                            <td>{{ $item['menu_name'] }}</td>
                            <td> {{ $item['total_order'] }} </td>
                            <td> Rp{{ number_format($item['price_qty'], 2) }} </td>
                            <td> Rp{{ number_format($item['total_price'], 2) }} </td>
                        </tr>
                        @php
                            $subtotal += $item['total_price'];
                        @endphp
                    @endforeach
                    <thead class="text-white bg-tabelsatu">
                        <tr>
                            <td class="font-medium"> TOTAL HARGA</td>
                            <td> </td>
                            <td> </td>

                            <td class="font-medium"> Rp{{ number_format($subtotal, 2) }} </td>
                        </tr>
                    </thead>
                </tbody>



                </tbody>

            </table>
            <div class="w-full h-fit bg-white p-2">
                <form action="/listpayment/actionpayment" method="POST" class="w-full flex flex-col items-center">
                    @csrf
                    <input type="hidden" value="{{ $table_number }}" name="table_number">
                    <input type="hidden" value="{{ $subtotal }}" name="subtotal">
                    <div class="input-form mx-auto">
                        <label class="form-label font-medium">Pilih Metode Pembayaran</label>
                    </div>
                    <div class="flex mb-3">
                        <div class="mr-3">
                            <input type="radio" class="btn-check" name="payment_type" id="inlineRadio1" value="Cash"
                                autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="inlineRadio1">Cash</label>
                        </div>
                        <div>
                            <input type="radio" class="btn-check" name="payment_type" id="inlineRadio2" value="Cashless"
                                autocomplete="off">
                            <label class="btn btn-outline-primary" for="inlineRadio2">QRIS</label>
                        </div>
                        {{-- <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment_type" id="inlineRadio1"
                                value="Cash">
                            <label class="form-check-label" for="inlineRadio1">Cash</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment_type" id="inlineRadio2"
                                value="Cashless">
                            <label class="form-check-label" for="inlineRadio2">QRIS </label>
                        </div> --}}
                    </div>
                    <button type="submit"
                        class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-boxtiga rounded-2xl text-white font-medium">Bayar
                    </button>
                </form>
            </div>
        </div>
    </div>
    {{-- MAIN END --}}
@endsection
