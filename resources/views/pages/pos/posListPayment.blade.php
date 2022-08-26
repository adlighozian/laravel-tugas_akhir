@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold">List Pembayaran</p>
    </div>
    <div class="p-4">
        <div class="bg-black bg-opacity-10 rounded-xl p-3 shadow-xl flex flex-col">
            <div class="justify-start w-full flex items-center pt-3">
                <form action="/listpayment" class="flex w-fit">
                    <input type="hidden" name="status" value="">
                    <button
                        class="{{ request('status') === null ? 'border-2' : '' }} bg-slate-500 text-white px-2 rounded-t-md font-medium hover:bg-opacity-80"
                        type="submit">Menunggu pembayaran</button>
                </form>
                <form action="/listpayment" class="flex w-fit">
                    <input type="hidden" name="status" value="1">
                    <button
                        class="{{ request('status') === '1' ? 'border-2' : '' }} bg-slate-500 text-white px-2 rounded-t-md font-medium hover:bg-opacity-80"
                        type="submit">Pembayaran berhasil</button>
                </form>
            </div>
            @if (request('status') === null)
                <table class="table mb-5">
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
                                <td class="font-medium">{{ $num }}</td>
                                <td>{{ $order['table_number'] }}</td>
                                <td> {{ $order['customer_name'] }} </td>
                                <td> Rp{{ number_format($order['total_price'], 2) }} </td>
                                <td class="text-kusatu">
                                    <div class="bg-kudua w-fit h-fit px-2 py-1 rounded-lg">
                                        {{ $order['status'] }}
                                    </div>
                                </td>
                                <td>
                                    <a href="/confirmOrder/{{ $order['table_number'] }}"><button
                                            class="btn btn-primary flex items-center">
                                            <i class='bx bx-search-alt-2 mr-1'></i>Detail</button></a>
                                </td>
                            </tr>
                            @php
                                $num++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            @else
                <table class="table">
                    <thead class="text-white bg-tabelsatu">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No. Meja</th>
                            <th scope="col">Nama Customer</th>
                            <th scope="col">Total pembayaran</th>
                            <th scope="col">Pembayaran</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="text-black bg-white">
                        @php
                            $num = 1;
                        @endphp
                        @foreach ($order_berhasil as $order)
                            <tr>
                                <td class="font-medium">{{ $num }}</td>
                                <td>{{ $order['table_number'] }}</td>
                                <td> {{ $order['customer_name'] }} </td>
                                <td> Rp{{ number_format($order['total_price'], 2) }} </td>
                                <td>
                                    {{ $order['status'] }}
                                </td>
                                <td>
                                    <div class="bg-kuempat w-fit h-fit px-2 py-1 rounded-lg">
                                        Success
                                    </div>
                                </td>
                                <td>{{ date('d F Y', strtotime($order['tanggal'])) }}</td>
                            </tr>
                            @php
                                $num++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    {{-- MAIN END --}}
@endsection
