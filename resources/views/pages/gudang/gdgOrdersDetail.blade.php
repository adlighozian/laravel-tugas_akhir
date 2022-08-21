@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold"><a href="/gdgorders">Orders</a> <i class='bx bxs-chevron-right'></i> Detail</p>
    </div>
    <div class="p-4">
        <div class="bg-black bg-opacity-10 rounded-xl p-3 shadow-xl md:flex md:justify-between">
            <div class="min-w-[300px] max-w-[300px] h-fit rounded-md bg-warnadua shadow-md mb-3 p-2 mr-4">
                <div class="h-[200px] overflow-hidden bg-white flex justify-center items-center">
                    @if ($order->menu->image)
                        <img src="{{ asset('storage/' . $order->menu->image) }}" alt="">
                    @else
                        <img src="{{ asset('assets/img/empty.png') }}" alt="">
                    @endif
                </div>
                <div class="w-full h-fit bg-white">
                    <p class="w-full font-medium text-center">{{ $order->menu->name }}</p>
                    <div class="overflow-auto p-2">
                        <p>Total: <span class="font-medium">{{ $order->total_order }}</span></p>
                        <p>Bahan-bahan: <span class="font-medium">{{ $order->menu->ingredients }}</span></p>
                    </div>
                </div>
                <div class="h-[50px] w-full flex items-center justify-center">
                    <form action="/gdgorders/update" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <button type="submit"
                            class="bg-boxtiga text-white p-2 rounded-md flex items-center font-medium hover:bg-opacity-80 duration-150 sm:text-base">Selesai</button>
                    </form>
                </div>
            </div>
            <div class="w-full">
                <div class="justify-center w-full flex items-center pb-3">
                    <form action="/gdgorders/{{ $id }}" class="flex w-full md:w-[300px]" role="search">
                        <input class="form-control rounded-l-md" type="search" placeholder="Search..." name="search"
                            value="{{ request('search') }}">
                        <button class="bg-slate-500 rounded-r-md text-white px-2 font-medium hover:bg-opacity-80"
                            type="submit">Search</button>
                    </form>
                </div>
                <div class="w-full h-[300px] sm:h-auto overflow-auto">
                    <table class="table">
                        <thead class="text-white bg-tabelsatu">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama barang</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        {{-- SEMUA_STOK START --}}
                        <tbody id="tball" class="text-black bg-white">
                            <div class="hidden">{{ $no = 1 }}</div>
                            @foreach ($gudang as $datas)
                                <tr>
                                    <th scope="row">{{ $no }}</th>
                                    <td>{{ $datas->nama }}</td>
                                    @if ($datas->jumlah === 0)
                                        <td class="text-kulima">
                                            <div class="bg-kuenam w-fit h-fit px-2 py-1 rounded-lg">
                                                {{ $datas->jumlah }} {{ $datas->kodebarang->satuan }}
                                            </div>
                                        </td>
                                    @elseif ($datas->jumlah <= $datas->kodebarang->min_stok)
                                        <td class="text-kusatu">
                                            <div class="bg-kudua w-fit h-fit px-2 py-1 rounded-lg">
                                                {{ $datas->jumlah }} {{ $datas->kodebarang->satuan }}
                                            </div>
                                        </td>
                                    @else
                                        <td class="text-warnatiga">
                                            <div class="bg-kuempat w-fit h-fit px-2 py-1 rounded-lg">
                                                {{ $datas->jumlah }} {{ $datas->kodebarang->satuan }}
                                            </div>
                                        </td>
                                    @endif
                                    <td>{{ $datas->kodebarang->jenis }}</td>
                                    <td>
                                        <div class="w-full flex justify-center">
                                            <form action="/gdgdetail/keluar" method="POST"
                                                class="w-full flex  items-center">
                                                @csrf
                                                <div
                                                    class="flex bg-white w-fit h-[40px] rounded-l-lg p-2 border-stone-900 border-2">
                                                    <input type="number" class="form-control border-none w-[100px]"
                                                        name="jumlah_keluar">
                                                    <div class="min-w-fit font-medium flex items-center">
                                                        {{ $datas->kodebarang->satuan }}</div>
                                                </div>
                                                <input type="hidden" name="nama" value="{{ $datas->nama }}">
                                                <input type="hidden" name="jumlah" value="{{ $datas->jumlah }}">
                                                <input type="hidden" name="id" value="{{ $datas->id }}">
                                                <input type="hidden" name="id_expired" value="{{ $datas->id }}">
                                                <input type="hidden" name="status" value="keluar">
                                                <input type="hidden" name="kodebarang_id"
                                                    value="{{ $datas->kodebarang->id }}">
                                                <button type="submit"
                                                    class="w-fit p-2 text-white font-medium rounded-r-lg bg-boxdua hover:bg-opacity-80 duration-150">Ambil
                                                    barang</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endforeach
                        </tbody>
                        {{-- SEMUA_STOK END --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- MAIN END --}}
@endsection
