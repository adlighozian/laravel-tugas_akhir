@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold"><a href="/kudashboard">Dashboard Keuangan</a> <i class='bx bxs-chevron-right'></i>
            Detail
        </p>
    </div>
    <div class="w-full p-4">
        <div class="p-2 bg-black bg-opacity-10 rounded-xl w-full flex items-center flex-col shadow-sm">
            <p class="font-medium text-xl">Dashboard Pemasukan/Pengeluaran</p>
            <div>
                <button onclick="filtersatu()" class="px-3 border-2 bg-slate-400">Pemasukan</button>
                <button onclick="filterdua()" class="px-3 border-2 bg-slate-400">Pengeluaran</button>
            </div>
            <div class="justify-between w-full flex items-center pt-3 ">
                <form action="/kusearch" method="POST" class="flex w-[200px]" role="search">
                    @csrf
                    <input class="form-control rounded-tl-md" type="month" name="month" placeholder="Search"
                        aria-label="Search">
                    <button class="bg-slate-500 rounded-tr-md text-white px-2 font-medium hover:bg-opacity-80"
                        type="submit"><i class='bx bx-search'></i></button>
                </form>
            </div>
            <div class="w-full h-[300px] sm:h-auto overflow-auto">
                <table class="table">
                    <thead id="thsatu" class="text-white bg-tabelsatu">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Pajak</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <thead id="thdua" class="text-white bg-tabelsatu hidden">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    {{-- TABLE START --}}
                    <tbody id="tsatu" class="text-black bg-white">
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($transin as $transaction => $item)
                            <tr>

                                <th scope="row">{{ $count }}</th>
                                <td>{{ date('F Y', strtotime($transaction)) }}</td>
                                <td>{{ date('d', strtotime($transaction)) }}</td>
                                <td>Rp{{ number_format($item->daysum, 2) }}</td>
                                <td>Rp{{ number_format($item->total_pajak, 2) }}</td>

                                <td>
                                    <a href="/kudayindexin/{{ strtotime($transaction) }}">
                                        <button class="btn btn-primary flex items-center">
                                            <i class='bx bx-search-alt-2 mr-1'></i>Detail
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @php
                                $count++;
                            @endphp
                        @endforeach
                    </tbody>
                    <tbody id="tdua" class="text-black bg-white hidden">
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($transout as $transaction => $item)
                            <tr>

                                <th scope="row">{{ $count }}</th>
                                <td>{{ date('F Y', strtotime($transaction)) }}</td>
                                <td>{{ date('d', strtotime($transaction)) }}</td>
                                <td>Rp{{ number_format($item->daysum, 2) }}</td>

                                <td>
                                    <a href="/kudayindexout/{{ strtotime($transaction) }}">
                                        <button class="btn btn-primary flex items-center">
                                            <i class='bx bx-search-alt-2 mr-1'></i>Detail
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @php
                                $count++;
                            @endphp
                        @endforeach
                    </tbody>
                    {{-- TABLE START --}}
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

@section('js')
    <script src="/assets/js/ku.js"></script>
@endsection
