@extends('main')

@section('main')
    {{-- MAIN START --}}
    {{-- ALERT_SUCCESS START --}}
    @include('components.alert')
    {{-- ALERT_SUCCESS END --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold">Tambah barang</p>
        <a href="/gdginputkode">
            <button
                class="sm:text-base bg-boxtiga text-white p-2 rounded-md flex items-center font-medium hover:bg-opacity-80 duration-150">
                <i class='bx bx-plus-medical mr-2'></i>Tambah kode barang</button>
        </a>
    </div>
    <div class="w-full flex items-center flex-col py-8">
        {{-- ALERT START --}}
        @if (count($datakodes) == 0)
            <div
                class="lg:w-[800px] sm:w-[570px] bg-boxempat w-[350px] h-10 rounded-xl mb-4 font-medium flex items-center justify-center shadow-xl">
                <i class='bx bxs-x-square text-[30px] mr-2'></i>
                Anda belum memiliki kode barang.
            </div>
        @endif
        {{-- ALERT END --}}
        {{-- FORM_TAMBAH_BARANG START --}}
        <form action="/gdginput" method="post" enctype="multipart/form-data"
            class="lg:w-[800px] sm:w-[570px] w-[350px] flex flex-col bg-black bg-opacity-10 rounded-xl p-3 shadow-xl">
            @csrf
            <div class="md:flex-row flex flex-col">
                <div class="w-full md:pr-2">
                    <div class="mb-3 flex flex-col">
                        <label for="inputKode" class="mb-1 font-medium">Kode<span class="text-red-600">*</span></label>
                        <select id="kode"
                            class="rounded-2xl h-[48px] px-2  @error('kodebarang_id') border-2 border-red-600 @enderror"
                            name="kodebarang_id">
                            @if (count($datakodes) == 0)
                                <option hidden>
                                    Anda belum memiliki kode barang
                                </option>
                            @else
                                <option hidden value="">
                                    Pilih kode barang
                                </option>
                                @foreach ($datakode as $datas)
                                    <option value="{{ $datas->id }}">
                                        {{ $datas->kode }} | {{ $datas->jenis }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('kodebarang_id')
                            <div class="text-xs font-medium text-red-900 mt-1 ml-2">Kode barang harus diisi</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputNama_barang" class="mb-1 font-medium">Nama Barang<span
                                class="text-red-600">*</span></label>
                        <input type="text" id="nama_barang"
                            class="form-control rounded-2xl h-[48px] @error('nama') border-2 border-red-600 @enderror"
                            name="nama" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="text-xs font-medium text-red-900 mt-1 ml-2">Nama barang harus diisi</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="inputjumlah" class="mb-1 font-medium">Jumlah barang<span
                                class="text-red-600">*</span></label>
                        <input type="number" id="jumlah"
                            class="form-control rounded-2xl h-[48px] @error('jumlah') border-2 border-red-600 @enderror"
                            name="jumlah" value="{{ old('jumlah') }}">
                        @error('jumlah')
                            <div class="text-xs font-medium text-red-900 mt-1 ml-2">Jumlah barang harus diisi</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputExpired" class="mb-1 font-medium">Tanggal kadaluarsa (expired)</label>
                        <input type="date" id="expired"
                            class="form-control rounded-2xl h-[48px] @error('expired') border-2 border-red-600 @enderror"
                            name="expired" value="{{ old('expired') }}">
                        @error('expired')
                            <div class="text-xs font-medium text-red-900 mt-1 ml-2">Expired harus diisi</div>
                        @enderror
                    </div>
                </div>
                <div class="w-full md:pl-2">
                    <div class="mb-1">
                        <label for="inputgambar" class="mb-1 font-medium">Tambah foto</label>
                        <div class="w-full h-[48px] flex items-center">
                            <input type="file" name="gambar" id="gambar"
                                class="form-control border-0 bg-white rounded-md"
                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                    </div>
                    <div class="mb-3 w-full flex justify-center">
                        <img id="blah" class="border-0 w-[100px]" />
                    </div>
                    <div class="mb-3">
                        <label for="inputCatatan" class="mb-1 font-medium">Catatan</label>
                        <textarea name="catatan" class="w-full rounded-2xl border-none h-[140px]" placeholder="Tulis catatan..."
                            value="{{ old('catatan') }}"></textarea>
                    </div>
                </div>
            </div>
            @if (count($datakodes) == 0)
                <button disabled
                    class="cursor-not-allowed shadow-lg duration-150 w-full h-[48px] bg-gray-400 rounded-2xl text-white font-medium">Tambah
                    barang</button>
            @else
                <button type="submit"
                    class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">Tambah
                    barang</button>
            @endif
        </form>
        {{-- FORM_TAMBAH_BARANG END --}}
    </div>
    {{-- MAIN END --}}
@endsection
