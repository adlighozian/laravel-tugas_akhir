@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold">List Pembayaran</p>
    </div>
    <div class="p-4">
        <div class="bg-black bg-opacity-10 rounded-xl p-3 shadow-xl flex flex-col">
            <table class="table table-hover">
                <thead class="text-white bg-tabelsatu">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No. Meja</th>
                        <th scope="col">Nama Customer</th>
                        <th scope="col">Total pembayaran</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-black bg-white">
                    @php
                        $num = 1;
                    @endphp
                    @foreach ($orders as $order)
                        <tr>
                            {{-- <td>1</td>
                    <td> Emilia </td>
                    <td> Rp. 40.000 </td>
                    <td> <a href="/listpayment/detailpayment"> Done</a> </td>
                    <td> <a href="/listpayment/detailpayment"> Detail </a> </td> --}}
                            <td>{{ $num }}</td>
                            <td>{{ $order['table_number'] }}</td>
                            <td> {{ $order['customer_name'] }} </td>
                            <td> Rp{{ number_format($order['total_price'], 2) }} </td>
                            <td> <a href="/listpayment/detailpayment"> {{ $order['status'] }}</a> </td>
                            <td> <a href="/confirmOrder/{{ $order['table_number'] }}"> Detail </a> </td>
                        </tr>
                        @php
                            $num++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- MAIN END --}}
@endsection
