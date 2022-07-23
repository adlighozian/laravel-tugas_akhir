@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    {{-- ALERT START --}}
    @include('components.alert')
    {{-- ALERT END --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold"><a href="/gdgdashboard">Gudang</a> <i class='bx bxs-chevron-right'></i> Detail</p>
    </div>
    <div class="p-4">
        <div class="bg-black bg-opacity-10 rounded-xl p-3 shadow-xl md:flex md:justify-between">
            <div class="md:w-full sm:flex-row sm:items-start flex items-center flex-col mb-0 sm:mb-3">
                <div
                    class="sm:mr-5 min-w-[200px] max-w-[300px] min-h-[200px] overflow-hidden flex items-center justify-center mb-3 sm:mb-0 bg-black bg-opacity-50">
                    @if ($data->gambar)
                        <img src="{{ asset('storage/' . $data->gambar) }}" alt="">
                    @else
                        <img src="{{ asset('assets/img/empty.png') }}" alt="">
                    @endif
                </div>
                <div class="w-full h-full">
                    <div class="flex ">
                        <div class="font-medium">
                            <p class="mb-1">Kode Barang</p>
                            <p class="mb-1">Nama</p>
                            <p class="mb-1">Tanggal expired</p>
                            <p class="mb-1">Jenis Barang</p>
                            <p class="mb-1">Jumlah</p>
                            <p class="mb-1">Catatan</p>
                        </div>
                        <div class="ml-3">
                            <p class="mb-1">: {{ $data->kodebarang->kode }}</p>
                            <p class="mb-1">: {{ $data->nama }}</p>
                            @if ($data->expired)
                                <p class="mb-1">: {{ $data->expired }}</p>
                            @else
                                <p class="mb-1">: -</p>
                            @endif
                            <p class="mb-1">: {{ $data->kodebarang->jenis }}</p>
                            <p class="mb-1">: <span class="font-medium">{{ $data->jumlah }}
                                    {{ $data->kodebarang->satuan }}</span></p>
                            @if ($data->expired)
                                <p class="mb-1">: {{ $data->catatan }}</p>
                            @else
                                <p class="mb-1">: -</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex md:flex-col md:justify-center">
                <div class="w-full flex justify-center p-2 ">
                    <form action="/gdgdetail/masuk" method="POST" class="w-full flex flex-col items-center">
                        @csrf
                        <div class="flex bg-white rounded-t-lg px-2 w-full">
                            <input type="number" class="form-control border-none" name="jumlah">
                            <div class="min-w-fit font-medium flex items-center">/{{ $data->kodebarang->satuan }}</div>
                        </div>
                        <input type="hidden" name="nama" value="{{ $data->nama }}">
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="status" value="masuk">
                        <input type="hidden" name="kodebarang_id" value="{{ $data->kodebarang->id }}">
                        <button type="submit"
                            class="w-full text-white font-medium rounded-b-lg h-10 bg-boxtiga hover:bg-opacity-80 duration-150">Tambah
                            barang</button>
                    </form>
                </div>
                <div class="w-full flex justify-center p-2">
                    <form action="/gdgdetail/keluar" method="POST" class="w-full flex flex-col items-center">
                        @csrf
                        <div class="flex bg-white w-full rounded-t-lg px-2">
                            <input type="number" class="form-control border-none" name="jumlah">
                            <div class="min-w-fit font-medium flex items-center">/{{ $data->kodebarang->satuan }}</div>
                        </div>
                        <input type="hidden" name="nama" value="{{ $data->nama }}">
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="status" value="keluar">
                        <input type="hidden" name="kodebarang_id" value="{{ $data->kodebarang->id }}">
                        <button type="submit"
                            class="w-full text-white font-medium rounded-b-lg h-10 bg-boxdua hover:bg-opacity-80 duration-150">Ambil
                            barang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- MAIN END --}}
@endsection
