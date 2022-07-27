@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold">Logbook</p>
    </div>
    <div class="w-full p-4">
        <div class="p-2 bg-black bg-opacity-10 rounded-xl w-full flex items-center flex-col shadow-sm">
            <p class="font-medium text-xl">Logbook barang masuk dan keluar</p>
            <div class="justify-start w-full flex items-center pt-3 ">
                <form action="/gdghistory" class="flex w-[200px]" role="search">
                    <input class="form-control rounded-l-md" type="month" placeholder="Search..." name="search"
                        value="{{ request('search') }}">
                    <button class="bg-slate-500 rounded-tr-md text-white px-2 font-medium hover:bg-opacity-80"
                        type="submit"><i class='bx bx-search'></i></button>
                </form>
            </div>
            <div class="w-full h-[300px] sm:h-auto overflow-auto">
                <table class="table table-hover">
                    <thead class="text-white bg-tabelsatu">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Total transaksi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-black bg-white">
                        @foreach ($data as $datas)
                            <tr>
                                <th scope="row">{{ $count }}</th>
                                <td class="font-medium">
                                    {{ date('F Y', strtotime(substr($datas->tahun_bulan, 0, 4) . '-' . substr($datas->tahun_bulan, 4, 2) . '-01')) }}
                                </td>
                                <td><span class="font-medium">{{ $datas->jumlah_transaksi }}</span> Transaksi</td>
                                <td><a href="/gdghistory/detail/{{ $datas->tahun_bulan }}"><button
                                            class="btn btn-primary flex items-center">
                                            <i class='bx bx-search-alt-2'></i></button></a>
                                </td>
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
