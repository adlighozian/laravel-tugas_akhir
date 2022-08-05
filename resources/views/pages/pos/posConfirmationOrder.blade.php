@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full px-3">
        <div class="w-full flex justify-between items-center h-[80px]">


        </div>
        <p class="mb-2 font-medium text-xl">Konfirmasi Pesanan</p>
        <a href="/pemesanan/{{ $table_number }}">
            <button class="bg-slate-500 rounded-r-md text-white px-2 font-medium hover:bg-opacity-80">
                Tambah Pesanan
            </button>
        </a>
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
            {{-- <thead class="text-white bg-tabelsatu">
                <tr>
                    <th scope="col">Nama Pesanan</th>
                    <th scope="col">Jumlah pesanan</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody class="text-black bg-white">

                <tr>
                    <td>Nasi Goreng</td>
                    <td> 2 </td>
                    <td> Rp. 40.000 </td>

                </tr>

                <tr>
                    <td> TOTAL </td>
                    <td> 2 </td>
                    <td> Rp. 40.000 </td>
                </tr>

            </tbody> --}}
        </table>

        <div class="row">
            <a href="/listpayment/detailpayment/{{ $table_number }}">
                <button type="submit"
                    class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium mb-3">Pesan
                </button>
            </a>
            <a href="/deleteOrder/{{ $table_number }}">
                <button type="Delete"
                    class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnasatu rounded-2xl text-white font-medium">Hapus
                </button>
            </a>
        </div>
    </div>
@endsection
