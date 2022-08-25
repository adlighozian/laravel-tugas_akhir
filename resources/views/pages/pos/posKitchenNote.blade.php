@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold">Catatan Pesanan Dapur</p>
    </div>
    <div class="p-4">
        <div class="bg-black bg-opacity-10 rounded-xl p-3 shadow-xl flex flex-col">
            <table class="table table-hover">
                <thead class="text-white bg-tabelsatu">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nomor Meja</th>
                        <th scope="col">Nama Pesanan</th>
                        <th scope="col">Jumlah Pesanan</th>
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
                            <td>{{ $order->table_number }}</td>
                            <td> {{ $order['nama_menu'] }} </td>
                            <td> {{ $order->total_order }} </td>
                            <td>
                                <a href="/kitchenDone/{{ $order->id }}">
                                    <button type="hapus"
                                        class="sm:text-base p-2 text-xs bg-boxtiga text-white rounded-md flex items-center font-medium hover:bg-opacity-80 duration-150">Done</button>
                                </a>
                            </td>
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
