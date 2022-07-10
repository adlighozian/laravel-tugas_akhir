@extends('main')

@section('main')
    <div class="flex">
        {{-- SIDEBAR START --}}
        @include('components.sidebar')
        {{-- SIDEBAR END --}}
        <div class="w-full h-[100vh] overflow-auto bg-warnasatu">
            @include('components.navbar')
            {{-- MAIN SATRT --}}
            <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
                <p class="sm:text-xl font-bold">Transaksi Keuangan</p>
            </div>
            <div class="w-full p-4">
                <div class="p-2 bg-black bg-opacity-10 rounded-xl w-full flex items-center flex-col shadow-sm">
                    <p class="font-medium text-xl">Daftar Pemasukan/Pengeluaran</p>
                    <div class="justify-between w-full flex items-center pt-3 ">
                        <form class="flex w-[200px]" role="search">
                            <input class="form-control rounded-tl-md" type="month" placeholder="Search"
                                aria-label="Search">
                            <button class="bg-slate-500 rounded-tr-md text-white px-2 font-medium hover:bg-opacity-80"
                                type="submit"><i class='bx bx-search'></i></button>
                        </form>
                    </div>
                    <div class="w-full h-[300px] sm:h-auto overflow-auto">
                        <table class="table">
                            <thead class="text-white bg-tabelsatu">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Sumber</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-black bg-white">
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <th scope="row">{{ $count }}</th>
                                        <td>{{ $transaction->jenis }}</td>
                                        <td>{{ $transaction->sumber }}</td>
                                        <td>{{ $transaction->tanggal }}</td>
                                        <td>Rp{{ number_format($transaction->jumlah, 2) }}</td>

                                        @if ($transaction->status === 'waiting')
                                            <td class="text-kusatu">
                                                <div class="bg-kudua w-fit h-fit px-2 py-1 rounded-lg">
                                                    {{ $transaction->status }}
                                                </div>
                                            </td>
                                        @elseif ($transaction->status === 'approved')
                                            <td class="text-tiga">
                                                <div class="bg-kuempat w-fit h-fit px-2 py-1 rounded-lg">
                                                    {{ $transaction->status }}
                                                </div>
                                            </td>
                                        @elseif ($transaction->status === 'returned')
                                            <td class="text-kulima">
                                                <div class="bg-kuenam w-fit h-fit px-2 py-1 rounded-lg">
                                                    {{ $transaction->status }}
                                                </div>
                                            </td>
                                        @endif

                                        <td>
                                            <a href="">
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
        </div>
    </div>
@endsection
