@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full px-3">
        <div class="w-full flex justify-between items-center h-[80px]">
            <p class="font-medium text-lg">List Pembayaran</p>

        </div>

        <table class="table table-hover">
            <thead class="text-white bg-tabelsatu">
                <tr>
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
                    <td>{{ $num++ }}</td>
                    <td> {{ $order['customer_name'] }} </td>
                    <td> Rp{{ number_format($order['total_price'], 2) }} </td>
                    <td> <a href="/listpayment/detailpayment"> Done</a> </td>
                    <td> <a href="/listpayment/detailpayment"> Detail </a> </td>
                </tr>
                @endforeach
                

            </tbody>
        </table>
    </div>
    {{-- MAIN END --}}
@endsection
