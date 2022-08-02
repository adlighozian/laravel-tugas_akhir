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
                <div class="w-full h-full flex flex-col">
                    <div class="flex ">
                        <div class="font-medium">
                            <p class="mb-2">Nama</p>
                            <p class="mb-2">Tanggal Expired</p>
                            <p class="mb-2">Jenis Barang</p>
                            <p class="mb-2">Jumlah</p>
                            <p class="mb-2">Catatan</p>
                        </div>
                        <div class="ml-3">
                            <p class="mb-2">: {{ $data->nama }}</p>
                            @if ($data->expired)
                                @if (str_replace('-', '', $data->expired) <= $date)
                                    <p class="mb-2">: <span class="text-kulima font-medium">
                                            {{ date('d F Y', strtotime($data->expired)) }}
                                        </span></p>
                                @else
                                    <p class="mb-2">: <span class="text-warnatiga font-medium">
                                            {{ date('d F Y', strtotime($data->expired)) }}
                                        </span></p>
                                @endif
                            @else
                                <p class="mb-2">: -</p>
                            @endif
                            <p class="mb-2">: {{ $data->kodebarang->jenis }}</p>
                            @if ($data->jumlah == 0)
                                <p class="mb-2">: <span class="text-kulima font-medium">
                                        {{ $data->jumlah }} {{ $data->kodebarang->satuan }} <span class="text-black">(Stok
                                            habis)</span>
                                    </span></p>
                            @elseif ($data->jumlah <= $data->kodebarang->min_stok)
                                <p class="mb-2">: <span class="text-black font-medium">
                                        {{ $data->jumlah }} {{ $data->kodebarang->satuan }} (Stok mau habis)
                                    </span></p>
                            @else
                                <p class="mb-2">: <span class="text-black font-medium">
                                        {{ $data->jumlah }} {{ $data->kodebarang->satuan }}
                                    </span></p>
                            @endif
                            @if ($data->catatan)
                                <p class="mb-2">: {{ $data->catatan }}</p>
                            @else
                                <p class="mb-2">: -</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-col md:justify-center">
                <div class="w-full flex justify-center p-2 ">
                    <form action="/gdgdetail/expired" method="POST" class="w-full flex flex-col items-center">
                        @csrf
                        <div class="flex bg-white rounded-t-lg px-2 w-full">
                            <input type="date" class="form-control border-none" name="expired">
                            <input type="hidden" name="id" value="{{ $data->id }}">
                        </div>
                        <button type="submit"
                            class="w-full text-white font-medium rounded-b-lg h-10 bg-yellow-500 hover:bg-opacity-80 duration-150">Update
                            kadaluarsa</button>
                    </form>
                </div>
                <div class="w-full flex justify-center p-2 ">
                    <form action="/gdgdetail/masuk" method="POST" class="w-full flex flex-col items-center">
                        @csrf
                        <div class="flex bg-white rounded-t-lg px-2 w-full">
                            <input type="number" class="form-control border-none" name="jumlah">
                            <div class="min-w-fit font-medium flex items-center">{{ $data->kodebarang->satuan }}</div>
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
                            <div class="min-w-fit font-medium flex items-center">{{ $data->kodebarang->satuan }}</div>
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
