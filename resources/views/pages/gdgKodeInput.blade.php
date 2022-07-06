@extends('main')

@section('main')
    <div class="flex">
        {{-- SIDEBAR START --}}
        @include('components.sidebar')
        {{-- SIDEBAR END --}}
        <div class="w-full h-[100vh] overflow-auto bg-warnasatu">
            @include('components.navbar')
            {{-- ALERT START --}}
            @if (session()->has('error'))
                <div class="w-full fixed top-[65px] left-0 flex items-center justify-center" role="alert">
                    <div
                        class="alert alert-danger alert-dismissible fade show animate__animated animate__fadeInDown py-2 px-3 w-fit h-fit">
                        <div class="w-full flex justify-between mb-1">
                            <p class="font-bold">ERROR</p>
                            <button type="button" data-bs-dismiss="alert"><i class='bx bx-x font-bold text-xl'></i></button>
                        </div>
                        <p>kode ini suda ada</p>
                    </div>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="w-full fixed top-[65px] left-0 flex items-center justify-center" role="alert">
                    <div
                        class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInDown py-2 px-3 w-fit h-fit">
                        <div class="w-full flex justify-between mb-1">
                            <p class="font-bold">SUCCESS</p>
                            <button type="button" data-bs-dismiss="alert"><i
                                    class='bx bx-x font-bold text-xl'></i></button>
                        </div>
                        <p>data berhasil ditambahkan</p>
                    </div>
                </div>
            @endif
            @if (session()->has('delete'))
                <div class="w-full fixed top-[65px] left-0 flex items-center justify-center" role="alert">
                    <div
                        class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInDown py-2 px-3 w-fit h-fit">
                        <div class="w-full flex justify-between mb-1">
                            <p class="font-bold">SUCCESS</p>
                            <button type="button" data-bs-dismiss="alert"><i
                                    class='bx bx-x font-bold text-xl'></i></button>
                        </div>
                        <p>data berhasil dihapus</p>
                    </div>
                </div>
            @endif
            {{-- ALERT END --}}
            {{-- MAIN SATRT --}}
            <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
                <p class="sm:text-xl font-bold">Tambah kode barang</p>
            </div>
            <div class="sm:flex-row sm:items-start w-full flex flex-col justify-center items-center p-4">
                <form action="/gdginputkode" method="post"
                    class="sm:mr-5 sm:mb-0 min-w-[350px] flex flex-col bg-black bg-opacity-10 rounded-xl p-3 shadow-xl mb-4">
                    @csrf
                    <div class="mb-3">
                        <label for="kode" class="mb-1 font-medium">Kode barang<span
                                class="text-red-600">*</span></label>
                        <input type="text" id="kode" class="form-control rounded-2xl h-[48px] border-0"
                            name="kode" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="mb-1 font-medium">Jenis barang<span
                                class="text-red-600">*</span></label>
                        <input type="text" id="jenis" class="form-control rounded-2xl h-[48px] border-0"
                            name="jenis" value="{{ old('jenis') }}">
                    </div>
                    <div class="mb-3">
                        <label for="inputCatatan" class="mb-1 font-medium">Keterangan<span
                                class="text-red-600">*</span></label>
                        <textarea name="keterangan" class="w-full rounded-2xl border-none h-[140px]" placeholder="Tulis keterangan..."></textarea>
                    </div>
                    <button type="submit"
                        class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">Tambah
                        kode barang</button>
                </form>
                <div
                    class="w-full sm:h-auto overflow-auto p-4 flex flex-col items-center bg-black bg-opacity-10 rounded-xl shadow-xl">
                    <p class="font-medium text-xl mb-3">List Kode Barang</p>
                    <table class="table table-hover">
                        <thead class="text-white bg-tabelsatu">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Jenis</th>
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
                                    <td class="max-w-[300px] overflow-x-auto">{{ $datas->keterangan }}</td>
                                    <td><button class="btn btn-danger flex items-center" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">Delete</button>
                                    </td>
                                </tr>
                                @php
                                    $count++;
                                @endphp
                                {{-- MODAL START --}}
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content bg-transparent border-0">
                                            <div class="w-full flex flex-col items-center ">
                                                <div
                                                    class="w-[387px] h-[333px] bg-white p-8 flex flex-col items-center justify-between rounded-xl">
                                                    <i class='bx bxs-trash text-[100px] text-red-500'></i>
                                                    <div class="flex flex-col items-center ">
                                                        <p class="font-bold text-base mb-2">Menghapus Kode Barang</p>
                                                        <p class="text-center mb-1">Setelah dihapus, data mobil tidak dapat
                                                            dikembalikan. Yakin ingin
                                                            menghapus?</p>
                                                        <p class="font-medium">"{{ $datas->kode }} |
                                                            {{ $datas->jenis }}"
                                                        </p>
                                                    </div>
                                                    <div class="grid gap-4 grid-cols-2">
                                                        <button type="button"
                                                            class="cursor-pointer btn w-[80px] bg-gray-500 text-white"
                                                            data-bs-dismiss="modal">Tidak</button>
                                                        <a href="/gdginputkode/delete/{{ $datas->id }}">
                                                            <button type="button"
                                                                class="btn cursor-pointer bg-red-700 text-white w-[80px]">Ya</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- MODAL END --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- MAIN END --}}
        </div>
    </div>
@endsection
