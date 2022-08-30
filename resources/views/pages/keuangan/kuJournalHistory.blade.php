@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold">Jurnal Keuangan</p> <a href="/kujournal"><button
                class="btn btn-primary">Rekap</button></a>
    </div>
    <div class="w-full p-4">
        <div class="p-2 bg-black bg-opacity-10 rounded-xl w-full flex items-center flex-col shadow-sm">
            <p class="font-medium text-xl">Jurnal Keuangan 2022</p>
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
                    <thead class="text-white bg-tabelsatu">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Account</th>
                            <th>Debit</th>
                            <th>Credit</th>
                        </tr>
                    </thead>
                    <tbody class="text-black bg-white">
                        @php
                            $count = 1;
                            $debitsum = 0;
                            $creditsum = 0;
                        @endphp
                        @foreach ($journals as $item => $journal)
                            <tr>
                                <th scope="row">{{ $count }}</th>
                                <td>{{ $journal->tanggal }}</td>
                                <td>{{ $journal['account'] }}</td>
                                <td>Rp{{ number_format($journal['debit'], 2) }}</td>
                                <td>Rp{{ number_format($journal['credit'], 2) }}</td>
                            </tr>
                            @php
                                $count++;
                                $debitsum = $debitsum + $journal['debit'];
                                $creditsum = $creditsum + $journal['credit'];
                            @endphp
                        @endforeach
                        <tr>
                            <th scope="row">TOTAL</th>
                            <td></td>
                            <td> </td>
                            <td>Rp{{ number_format($debitsum, 2) }}</td>
                            <td>Rp{{ number_format($creditsum, 2) }}</td>
                        </tr>
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
