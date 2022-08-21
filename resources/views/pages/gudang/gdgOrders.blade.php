@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold">Orders</p>
    </div>
    <div class="w-full p-4">
        <div class="p-2 bg-black bg-opacity-10 rounded-xl w-full flex items-center flex-col shadow-sm">
            <p class="font-medium text-xl">Orders</p>
            <div class="justify-start w-full flex items-center pt-3">
                <form action="/gdgorders" class="flex w-fit" role="search">
                    <input type="hidden" name="search" value="">
                    <button
                        class="{{ request('search') === null ? 'border-2' : '' }} bg-slate-500 text-white px-2 rounded-t-md font-medium hover:bg-opacity-80"
                        type="submit">Barang
                        belum keluar</button>
                </form>
                <form action="/gdgorders" class="flex w-fit" role="search">
                    <input type="hidden" name="search" value="keluar">
                    <button
                        class="{{ request('search') === 'keluar' ? 'border-2' : '' }} bg-slate-500 text-white px-2 rounded-t-md font-medium hover:bg-opacity-80"
                        type="submit">Barang sudah
                        keluar</button>
                </form>
            </div>
            <div class="w-full h-[300px] sm:h-auto overflow-auto">
                <table class="table">
                    <thead class="text-white bg-tabelsatu">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Makanan</th>
                            <th scope="col">Total transaksi</th>
                            <th scope="col">Tanngal pemesanan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-black bg-white">
                        @foreach ($orders as $datas)
                            <tr>
                                <th scope="row">{{ $no }}</th>
                                <td class="font-medium">{{ $datas->menu->name }}</td>
                                <td class="font-medium">{{ $datas->total_order }}</td>
                                <td class="font-medium">{{ date('d F Y', strtotime($datas->tanggal)) }}</td>
                                @if ($datas->status === 0)
                                    <td class="text-kulima">
                                        <div class="bg-kuenam w-fit h-fit px-2 py-1 rounded-lg">
                                            Belum
                                        </div>
                                    </td>
                                @else
                                    <td class="text-warnatiga">
                                        <div class="bg-kuempat w-fit h-fit px-2 py-1 rounded-lg">
                                            Sudah
                                        </div>
                                    </td>
                                @endif
                                @if ($datas->status === 0)
                                    <td class="flex"><a href="/gdgorders/{{ $datas->id }}">
                                            <button class="btn btn-primary flex items-center">
                                                <i class='bx bx-search-alt-2 mr-1'></i>Keluarkan</button></a>
                                    </td>
                                @else
                                    <td class="flex">
                                        <button disabled class="btn bg-gray-400 flex items-center text-white">
                                            <i class='bx bx-search-alt-2 mr-1'></i>Keluarkan</button>
                                    </td>
                                @endif
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <nav class="mt-3 md:hidden">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link text-black" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link text-black" href="#">1</a></li>
                    <li class="page-item"><a class="page-link text-black" href="#">2</a></li>
                    <li class="page-item"><a class="page-link text-black" href="#">3</a></li>
                    <li class="page-item"><a class="page-link text-black" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
    {{-- MAIN END --}}
@endsection
