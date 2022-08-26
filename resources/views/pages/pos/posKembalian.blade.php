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
                        <tr>
                            <td class="font-medium"> Uang yang dibayar</td>
                            <td> </td>
                            <td> </td>
                            <td class="font-medium">
                                <input class="text-black p-0" type="number" id="bayar" name="bayar">
                            </td>
                        </tr>
                    </thead>
                </tbody>



                </tbody>

            </table>
            <div class="w-full h-fit bg-white p-2">
                <form action="/listpayment/actionpayment" method="POST" class="w-full flex flex-col items-center">
                    @csrf
                    <input type="hidden" value="{{ $table_number }}" name="table_number">
                    <input type="hidden" value="{{ $subtotal }}" name="subtotal" id="subtotal">
                    <input type="hidden" value="Cash Payment" name="payment_type" id="payment_type">
                    <button class="btn btn-info" type="button" id="calculate" name="calculate" value="calculate"
                        onclick="calckembalian()">Hitung Kembalian</button>
                    <div class="input-form mx-auto">
                        <label class="form-label font-medium">Kembalian</label>
                    </div>
                    <div class="input-form mx-auto">
                        <div id="kembalian"></div>
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

@section('js')
    <script>
        var calckembalian = () => {
            var bayar = document.getElementById('bayar').value;
            var subtotal = parseInt(document.getElementById('subtotal').value);
            var kembalian = bayar - subtotal;
            console.log(bayar);
            console.log(subtotal);
            document.getElementById("kembalian").innerHTML = kembalian;
        }
    </script>
@endsection
