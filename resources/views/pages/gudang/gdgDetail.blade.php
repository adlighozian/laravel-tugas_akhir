@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    {{-- ALERT START --}}
    @include('components.alert')
    {{-- ALERT END --}}
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
                    <p>: {{ $data->jumlah }} {{ $data->kodebarang->satuan }}</p>
                    <p>: {{ $data->created_at->isoFormat('D MMMM Y') }}</p>
                </div>
            </div>
            <div class="flex">
                <form action="/gdgdetail/masuk" method="POST" class="w-[200px] mt-5">
                    @csrf
                    <label for="plus">tambah barang</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah">
                    <input type="hidden" name="nama" id="nama" value="{{ $data->nama }}">
                    <input type="hidden" name="id" id="nama" value="{{ $data->id }}">
                    <input type="hidden" name="status" id="status" value="masuk">
                    <input type="hidden" name="status" id="status" value="masuk">
                    <button type="submit" class="btn btn-success">Tambah barang</button>
                </form>
                <form action="/gdgdetail/keluar" method="POST" class="w-[200px] mt-5">
                    @csrf
                    <label for="plus">Ambil barang</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah">
                    <input type="hidden" name="nama" id="nama" value="{{ $data->nama }}">
                    <input type="hidden" name="id" id="nama" value="{{ $data->id }}">
                    <input type="hidden" name="status" id="status" value="keluar">
                    <button type="submit" class="btn btn-success">Ambil barang</button>
                </form>
            </div>
        </div>
    </div>
    {{-- MAIN END --}}
@endsection
