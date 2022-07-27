@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full px-3">
        <div class="w-full flex justify-between items-center h-[80px]">


        </div>
        <p class="mb-2 font-medium text-xl">Detail Pembayaran</p>
        <table class="table table-hover">
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
                @foreach ($orders as $pesanan)
                    <tr>
                        <td>{{ $pesanan->menu_name }}</td>
                        <td> {{ $pesanan->total_order }} </td>
                        <td> Rp{{ number_format($pesanan->price_qty, 2) }} </td>
                        <td> Rp{{ number_format($pesanan->total_price, 2) }} </td>
                    </tr>
                    @php
                        $subtotal += $pesanan->total_price;
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
        <form action="/listpayment/actionpayment" method="POST">
            @csrf
            <input type="text" value="{{ $table_number }}" hidden name="table_number">
            <input type="text" value="{{ $subtotal }}" hidden name="subtotal">
            <div class="input-form mx-auto">
                <label class="form-label">Pilih Metode Pembayaran</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payment_type"
                    id="inlineRadio1" value="Cash">
                <label class="form-check-label" for="inlineRadio1">Cash</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payment_type"
                    id="inlineRadio2" value="Cashless">
                <label class="form-check-label" for="inlineRadio2">QRIS </label>
            </div>
            <button type="submit"
                class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">Bayar
            </button>
        </form>
    </div>
    {{-- MAIN END --}}
@endsection
