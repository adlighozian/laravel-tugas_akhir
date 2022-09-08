@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold"><a href="/kutransaction">Transaksi Keuangan</a> <i class='bx bxs-chevron-right'></i>
            View Detail Transaksi</p>
    </div>
    <div class="p-4">
        <div class="bg-black bg-opacity-10 rounded-xl p-3 shadow-xl md:flex md:justify-between">
            <div class="bg-white w-full h-fit p-3 rounded-sm">
                <div class="w-full flex justify-center mb-2">
                    <p class="font-bold text-lg">Detail Transaksi</p>
                </div>
                <p class="font-medium mb-2">Jenis: <span class="font-bold">{{ $transaction->jenis }}</span></p>
                <p class="font-medium mb-2">Sumber: <span class="font-bold">{{ $transaction->sumber }}</span></p>
                <p class="font-medium mb-2">Tanggal: <span
                        class="font-bold">{{ date('d F Y', strtotime($transaction->tanggal)) }}</span></p>
                <p class="font-medium mb-4">Keterangan: <span class="font-bold">{{ $transaction->keterangan }}</span></p>
                <table class="table mb-10">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>Nominal</th>
                            <th>Pajak</th>
                            <th>Income</th>
                            <th>Expense</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>Rp{{ number_format($transaction->nominal, 2) }}</td>
                            <td>Rp{{ number_format($transaction->pajak, 2) }}</td>
                            <td class="font-bold">Rp{{ number_format($transaction->income, 2) }}</td>
                            <td class="font-bold">Rp{{ number_format($transaction->expense, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="w-full h-fit flex items-center flex-col">
                    <p class="font-bold mb-2">Bukti</p>
                    <div class="p-5 mb-2">
                        <img style="height: 300px" src="{{ asset('storage/' . $transaction->bukti) }}" alt="Image unavailable">
                    </div>
                    <a class="" download="bukti {{ $transaction->id }}" href="/storage/{{ $transaction->bukti }}"
                        title="ImageName">
                        <button type="button"
                            class="hover:bg-opacity-80 shadow-lg duration-150 px-5 h-[48px] bg-warnatiga rounded-2xl text-white font-medium">
                            Download bukti <i class='bx bxs-download'></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- MAIN END --}}
@endsection
