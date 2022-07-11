@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full px-3">
        <div class="w-full flex justify-between items-center h-[80px]">


        </div>
        <p class="mb-2 font-medium text-xl">Konfirmasi Pesanan</p>
        <table class="table table-hover">
            @php
                $subtotal = 0;
            @endphp
            @foreach ($orders as $pesanan)
                <thead class="text-white bg-tabelsatu">
                    <tr>
                        <th scope="col">Nama Pesanan</th>
                        <th scope="col">Jumlah pesanan</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody class="text-black bg-white">

                    <tr>
                        <td>{{ $pesanan->menu_name }}</td>
                        <td> {{ $pesanan->total_order }} </td>
                        <td> Rp{{ number_format($pesanan->price_qty, 2) }} </td>
                    </tr>

                    <tr>
                        <td> TOTAL </td>
                        <td> {{ $pesanan->total_order }} </td>
                        <td> Rp{{ number_format($pesanan->total_price, 2) }} </td>
                    </tr>
                    @php
                        $subtotal += $pesanan->total_price;
                    @endphp
                </tbody>
            @endforeach
            {{-- //SUBTOTAL --}}
            <thead class="text-white bg-tabelsatu">
                <tr>
                    <th scope="col"> </th>
                    <th scope="col"> </th>
                    <th scope="col">TOTAL PRICE</th>
                </tr>
            </thead>
            <tbody class="text-black bg-white">

                <tr>
                    <td> </td>
                    <td> </td>
                    <td>  Rp{{ number_format($subtotal, 2) }} </td>
                </tr>

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
        <button type="submit"
            class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">Pesan
        </button>
    </div>
@endsection
