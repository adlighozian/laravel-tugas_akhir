@extends('main')

@section('css')
@endsection

@section('main')
    {{-- MAIN SATRT --}}
    {{-- ALERT START --}}
    @if (session()->has('error'))
        <div class="w-full fixed top-[65px] left-0 flex items-center justify-center" role="alert">
            <div
                class="alert alert-danger alert-dismissible fade show animate__animated animate__fadeInDown py-2 px-3 w-fit h-fit">
                <div class="w-full flex justify-between mb-1">
                    <p class="font-bold">ERROR</p>
                    <button type="button" data-bs-dismiss="alert"><i class='bx bx-x font-bold text-xl'></i></button>
                </div>
                <p>{{ session('error') }}</p>
            </div>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="w-full fixed top-[65px] left-0 flex items-center justify-center" role="alert">
            <div
                class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInDown py-2 px-3 w-fit h-fit">
                <div class="w-full flex justify-between mb-1">
                    <p class="font-bold">SUCCESS</p>
                    <button type="button" data-bs-dismiss="alert"><i class='bx bx-x font-bold text-xl'></i></button>
                </div>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif
    {{-- ALERT END --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold">Tambah kode barang</p>
    </div>
    <div class="sm:flex-row sm:items-start w-full flex flex-col justify-center items-center p-4">
        <form action="/gdginputkode" method="post"
            class="sm:mr-5 sm:mb-0 min-w-[350px] flex flex-col bg-black bg-opacity-10 rounded-xl p-3 shadow-xl mb-4">
            @csrf
            <div class="mb-3">
                <label for="kode" class="mb-1 font-medium">Kode barang<span class="text-red-600">*</span></label>
                <input type="text" id="kode" class="form-control rounded-2xl h-[48px] border-0" name="kode"
                    required>
            </div>
            <div class="mb-3">
                <label for="jenis" class="mb-1 font-medium">Jenis barang<span class="text-red-600">*</span></label>
                <input type="text" id="jenis" class="form-control rounded-2xl h-[48px] border-0" name="jenis"
                    value="{{ old('jenis') }}" required>
            </div>
            <div class="mb-3">
                <label for="satuan" class="mb-1 font-medium">Satuan barang<span class="text-red-600">*</span></label>
                <input type="text" id="satuan" class="form-control rounded-2xl h-[48px] border-0" name="satuan"
                    required>
            </div>
            <div class="mb-3">
                <label for="min_stok" class="mb-1 font-medium">Minimal stock<span class="text-red-600">*</span></label>
                <input type="number" id="min_stok" class="form-control rounded-2xl h-[48px] border-0" name="min_stok"
                    required>
            </div>
            <div class="mb-3">
                <label for="inputCatatan" class="mb-1 font-medium">Keterangan<span class="text-red-600">*</span></label>
                <textarea name="keterangan" class="w-full rounded-2xl border-none h-[100px]" placeholder="Tulis keterangan..." required></textarea>
            </div>
            <button type="submit"
                class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium"
                required>Tambah
                kode barang</button>
        </form>
        <div
            class="w-full sm:h-auto overflow-auto p-4 flex flex-col items-center bg-black bg-opacity-10 rounded-xl shadow-xl">
            <p class="font-medium text-xl mb-3">List Kode Barang</p>
            <div class="justify-between w-full flex items-center pt-3 ">
                <form class="flex w-[200px]" role="search">
                    <input class="form-control rounded-tl-md" type="text" placeholder="Search kode barang"
                        aria-label="Search">
                    <button class="bg-slate-500 rounded-tr-md text-white px-2 font-medium hover:bg-opacity-80"
                        type="submit"><i class='bx bx-search'></i></button>
                </form>
            </div>
            <table class="table table-hover">
                <thead class="text-white bg-tabelsatu">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Kode</th>
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
                            <td>{{ $datas->kode }}</td>
                            <td>{{ $datas->jenis }}</td>
                            <td>{{ $datas->min_stok }}</td>
                            <td>{{ $datas->satuan }}</td>
                            <td class="max-w-[300px] overflow-x-auto">{{ $datas->keterangan }}</td>
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
    @include('components.gdgModalDelete')
    {{-- MODAL END --}}

    {{-- MAIN END --}}
@endsection

@section('js')
    <script src="/assets/js/gudang.js"></script>
@endsection
