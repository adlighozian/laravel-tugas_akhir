@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold"><a href="/gdghistory">Logbook</a> <i class='bx bxs-chevron-right'></i> Detail</p>
    </div>
    <div class="w-full p-4">
        <div class="p-2 bg-black bg-opacity-10 rounded-xl w-full flex items-center flex-col shadow-sm">
            <p class="font-medium text-xl">Logbook barang masuk dan keluar pada bulan
                <span class="text-white font-bold">{{ $date->created_at->isoFormat('MMMM Y') }}</span>
            </p>
            <div class="justify-start w-full flex pt-2">
                <form action="/gdghistory/detail/{{ $date->tahun_bulan }}" class="flex w-fit" role="search">
                    <input type="hidden" name="search" value="">
                    <button
                        class="{{ request('search') === null ? 'border-2' : '' }} bg-slate-500 text-white px-2 font-medium hover:bg-opacity-80 rounded-t-md"
                        type="submit">All</button>
                </form>
                <form action="/gdghistory/detail/{{ $date->tahun_bulan }}" class="flex w-fit" role="search">
                    <input type="hidden" name="search" value="masuk">
                    <button
                        class="{{ request('search') === 'masuk' ? 'border-2' : '' }} bg-slate-500 text-white px-2 font-medium hover:bg-opacity-80 rounded-t-md"
                        type="submit">Masuk</button>
                </form>
                <form action="/gdghistory/detail/{{ $date->tahun_bulan }}" class="flex w-fit" role="search">
                    <input type="hidden" name="search" value="keluar">
                    <button
                        class="{{ request('search') === 'keluar' ? 'border-2' : '' }} bg-slate-500 text-white px-2 font-medium hover:bg-opacity-80 rounded-t-md"
                        type="submit">Keluar</button>
                </form>
            </div>
            <div class="w-full h-[300px] sm:h-auto overflow-auto">
                <table class="table">
                    <thead class="text-white bg-tabelsatu">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jumlah Barang</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Status</th>
                            <th scope="col">Bulan/Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="text-black bg-white">
                        @foreach ($data as $datas)
                            <tr>
                                <th scope="row">{{ $count }}</th>
                                <td>{{ $datas->nama }}</td>
                                <td>{{ $datas->jumlah_keluar }} {{ $datas->kodebarang->satuan }}</td>
                                <td>{{ $datas->kodebarang->jenis }}</td>
                                @if ($datas->status === 'keluar')
                                    <td class="text-kulima">
                                        <div class="bg-kuenam w-fit h-fit px-2 py-1 rounded-lg">
                                            {{ $datas->status }}
                                        </div>
                                    </td>
                                @elseif ($datas->status === 'masuk')
                                    <td class="text-warnatiga">
                                        <div class="bg-kuempat w-fit h-fit px-2 py-1 rounded-lg">
                                            {{ $datas->status }}
                                        </div>
                                    </td>
                                @endif
                                {{-- <td>{{ $datas->status }}</td> --}}
                                <td>{{ $datas->created_at->isoFormat('dddd, D MMMM Y') }}</td>
                            </tr>
                            @php
                                $count++;
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
