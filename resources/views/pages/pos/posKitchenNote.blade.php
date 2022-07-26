@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full px-3">
        <div class="w-full flex justify-between items-center h-[80px]">


        </div>
        <p class="mb-2 font-medium text-xl">Catatan Pesanan Dapur</p>
        <table class="table table-hover">
            <thead class="text-white bg-tabelsatu">
                <tr>
                    <th scope="col">Nomor Meja</th>
                    <th scope="col">Nama Pesanan</th>
                    <th scope="col">Jumlah Pesanan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-black bg-white">
                @foreach ($orders as $order)
                    <tr>
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
                @endforeach

            </tbody>
        </table>

    </div>
    {{-- MAIN END --}}
@endsection
