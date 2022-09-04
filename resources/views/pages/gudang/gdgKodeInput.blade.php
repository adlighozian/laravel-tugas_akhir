@extends('main')

@section('css')
@endsection

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold">Tambah jenis barang</p>
    </div>
    <div class="sm:flex-row sm:items-start w-full flex flex-col justify-center items-center p-4">
        <form action="/gdginputkode" method="post"
            class="sm:mr-5 sm:mb-0 min-w-[350px] flex flex-col bg-black bg-opacity-10 rounded-xl p-3 shadow-xl mb-4">
            @csrf
            <div class="mb-3">
                <label for="jenis" class="mb-1 font-medium">Jenis barang<span class="text-red-600">*</span></label>
                <input type="text" id="jenis"
                    class="form-control rounded-2xl h-[48px] @error('jenis') border-2 border-red-600 @enderror"
                    name="jenis" value="{{ old('jenis') }}">
                @error('jenis')
                    <div class="text-xs font-medium text-red-900 mt-1 ml-2">Jenis barang harus diisi</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="satuan" class="mb-1 font-medium">Satuan barang<span class="text-red-600">*</span></label>
                <input type="text" id="satuan"
                    class="form-control rounded-2xl h-[48px] @error('satuan') border-2 border-red-600 @enderror"
                    name="satuan">
                @error('satuan')
                    <div class="text-xs font-medium text-red-900 mt-1 ml-2">Satuan barang harus diisi</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="min_stok" class="mb-1 font-medium">Minimal stock<span class="text-red-600">*</span></label>
                <input type="number" id="min_stok"
                    class="form-control rounded-2xl h-[48px] @error('min_stok') border-2 border-red-600 @enderror"
                    name="min_stok">
                @error('min_stok')
                    <div class="text-xs font-medium text-red-900 mt-1 ml-2">Minimal stok barang harus diisi</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputCatatan" class="mb-1 font-medium">Keterangan</label>
                <textarea name="keterangan" class="w-full rounded-2xl border-none h-[100px]" placeholder="Tulis keterangan..."></textarea>
            </div>
            <button type="submit"
                class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">Tambah
                jenis barang</button>
        </form>
        <div
            class="w-full sm:h-auto overflow-auto p-4 flex flex-col items-center bg-black bg-opacity-10 rounded-xl shadow-xl">
            <p class="font-medium text-xl mb-3">List Jenis Barang</p>
            <div class="justify-between w-full flex items-center pt-3 ">
                <form action="/gdginputkode" class="flex w-[200px]" role="search">
                    <input class="form-control rounded-tl-md" type="search" placeholder="Cari jenis..." name="search"
                        value="{{ request('search') }}">
                    <button class="bg-slate-500 rounded-tr-md text-white px-2 font-medium hover:bg-opacity-80"
                        type="submit"><i class='bx bx-search'></i></button>
                </form>
            </div>
            <table class="table table-hover">
                <thead class="text-white bg-tabelsatu">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Minimal stok</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-black bg-white">
                    @foreach ($datakode as $datas)
                        <tr>
                            <th scope="row">{{ $count }}</th>
                            <td>{{ $datas->jenis }}</td>
                            <td>{{ $datas->min_stok }}</td>
                            <td>{{ $datas->satuan }}</td>
                            @if ($datas->keterangan)
                                <td class="max-w-[300px] overflow-x-auto">{{ $datas->keterangan }}</td>
                            @else
                                <td>-</td>
                            @endif
                            <td>
                                <button class="btn btn-danger flex items-center deletekodebtn"
                                    value="{{ $datas->id }}">Delete</button>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- MODAL START --}}
    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-transparent border-0">
                <div class="w-full flex flex-col items-center ">
                    <form action="/gdginputkode/delete" method="post">
                        @csrf
                        <div class="w-[387px] h-[333px] bg-white p-8 flex flex-col items-center justify-between rounded-xl">
                            <i class='bx bxs-trash text-[100px] text-red-500'></i>
                            <div class="flex flex-col items-center ">
                                <p class="font-bold text-base mb-2">Menghapus Kode Barang</p>
                                <p class="text-center mb-1">Setelah dihapus, data tidak dapat
                                    dikembalikan. Yakin ingin
                                    menghapus?</p>
                                <input type="hidden" name="kode_delete_id" id="kode_id">
                            </div>
                            <div class="grid gap-4 grid-cols-2">
                                <button type="button" class="cursor-pointer btn w-[80px] bg-gray-500 text-white"
                                    data-bs-dismiss="modal">Tidak</button>
                                <button type="submit" class="btn cursor-pointer bg-red-700 text-white w-[80px]">Ya</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL END --}}

    {{-- MAIN END --}}
@endsection

@section('js')
    <script src="/assets/js/gudang.js"></script>
@endsection
