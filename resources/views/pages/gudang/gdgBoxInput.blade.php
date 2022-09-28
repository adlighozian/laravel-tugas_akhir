@extends('main')

@section('css')
@endsection

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold">Tambah box penyimpanan</p>
    </div>
    <div class="sm:flex-row sm:items-start w-full flex flex-col justify-center items-center p-4">
        <form action="/gdginputbox/store" method="post"
            class="sm:mr-5 sm:mb-0 min-w-[350px] flex flex-col bg-black bg-opacity-10 rounded-xl p-3 shadow-xl mb-4">
            @csrf
            <div class="mb-3">
                <label for="kode_box" class="mb-1 font-medium">Kode box<span class="text-red-600">*</span></label>
                <input type="text" id="kode_box"
                    class="form-control rounded-2xl h-[48px] @error('kode_box') border-2 border-red-600 @enderror"
                    name="kode_box" value="{{ old('kode_box') }}">
                @error('kode_box')
                    <div class="text-xs font-medium text-red-900 mt-1 ml-2">Kode box harus diisi</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputCatatan" class="mb-1 font-medium">Keterangan</label>
                <textarea name="keterangan" class="w-full rounded-2xl border-none h-[100px]" placeholder="Tulis keterangan tempat..."></textarea>
            </div>
            <input type="hidden" name="total" value="0">
            <button type="submit"
                class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">Tambah
                box penyimpanan</button>
        </form>
        <div
            class="w-full sm:h-auto overflow-auto p-4 flex flex-col items-center bg-black bg-opacity-10 rounded-xl shadow-xl">
            <p class="font-medium text-xl mb-3">List Jenis Barang</p>
            <div class="justify-between w-full flex items-center pt-3 ">
                <form action="#" class="flex w-[200px]" role="search">
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
                        <th scope="col">kode box</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-black bg-white">
                    @foreach ($databox as $datas)
                        <tr>
                            <th scope="row">{{ $count }}</th>
                            <td>{{ $datas->kode_box }}</td>
                            @if ($datas->keterangan)
                                <td class="max-w-[300px] overflow-x-auto">{{ $datas->keterangan }}</td>
                            @else
                                <td>-</td>
                            @endif
                            <td>
                                <button class="btn btn-danger flex items-center deletekodebtn"
                                    value="{{ $datas->id }}">Delete</button>
                            </td>
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
                    <form action="/gdginputbox/delete" method="post">
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
