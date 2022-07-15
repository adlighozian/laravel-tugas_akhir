@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold"><a href="/gdgdashboard">Gudang</a> <i class='bx bxs-chevron-right'></i> Detail</p>
    </div>
    <div class="p-4 ">
        <div class="bg-black bg-opacity-10 rounded-xl p-3 shadow-xl">
            <div class="w-full h-[200px] overflow-hidden flex items-center justify-center">
                <img src="{{ asset('storage/' . $data->gambar) }}" alt="">
            </div>
            <div class="flex">
                <div>
                    <p>Kode Barang</p>
                    <p>Nama</p>
                    <p>Tanggal expired</p>
                    <p>Jenis Barang</p>
                    <p>Catatan</p>
                    <p>Jumlah</p>
                </div>
                <div class="ml-3">
                    <p>: {{ $data->kodebarang->kode }}</p>
                    <p>: {{ $data->nama }}</p>
                    <p>: {{ $data->expired }}</p>
                    <p>: {{ $data->kodebarang->jenis }}</p>
                    <p>: {{ $data->catatan }}</p>
                    <p>: {{ $data->jumlah }}</p>
                </div>
            </div>
            <form action="">
                <label for="plus">tambah barang</label>
                <input type="number" class="form-control" name="plus" id="plus">
                <label for="minus">keluar barang</label>
                <input type="number" class="form-control" name="minus" id="minus">
            </form>
        </div>
    </div>
    {{-- MAIN END --}}
@endsection
