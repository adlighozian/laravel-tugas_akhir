@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold">Pesan Makanan <i class='bx bxs-chevron-right'></i> Konfirmasi Pesanan</p>
        <a href="/pemesanan/{{ $kode_order }}">
            <button
                class="sm:text-base bg-boxtiga text-white p-2 rounded-md flex items-center font-medium hover:bg-opacity-80 duration-150">
                <i class='bx bx-plus-medical mr-2'></i>Tambah Pesanan</button>
        </a>
    </div>
    <div class="p-4">
        <div class="bg-black bg-opacity-10 rounded-xl p-3 shadow-xl flex flex-col">
            <table class="table table-hover mb-0">
                <div class="hidden">{{ $subtotal = 0 }}</div>
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
                        <div class="hidden">{{ $subtotal += $pesanan->total_price }}</div>
                    @endforeach
                </tbody>
                <thead class="text-white bg-tabelsatu">
                    <tr>
                        <th class="font-medium"> TOTAL HARGA</th>
                        <th> </th>
                        <th> </th>
                        <th class="font-medium"> Rp{{ number_format($subtotal, 2) }} </td>
                    </tr>
                </thead>
            </table>
            <div class="w-full h-fit bg-white p-2 flex justify-center">
                <div class="flex">
                    <a href="/listpayment/detailpayment/{{ $kode_order }}">
                        <button type="submit"
                            class="hover:bg-opacity-80 shadow-lg duration-150 w-[100px] h-[48px] bg-boxtiga rounded-2xl text-white font-medium mr-3 ">Bayar Sekarang
                        </button>
                    </a>
                    <a href="/deleteOrder/{{ $kode_order }}">
                        <button type="Delete"
                            class="hover:bg-opacity-80 shadow-lg duration-150 w-[100px] h-[48px] bg-boxdua rounded-2xl text-white font-medium mr-3">Batal
                        </button>
                    </a>
                    <a href="/pemesanan">
                        <button type="Delete"
                            class="hover:bg-opacity-80 shadow-lg duration-150 w-[100px] h-[48px] bg-boxsatu rounded-2xl text-white font-medium">Nanti
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
