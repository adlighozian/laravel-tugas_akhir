@extends('main')

@section('main')
    <div class="flex">
        {{-- SIDEBAR START --}}
        @include('components.sidebar')
        {{-- SIDEBAR END --}}
        <div class="w-full h-[100vh] overflow-auto bg-warnasatu">
            @include('components.navbar')
            {{-- MAIN SATRT --}}
            <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
                <p class="sm:text-xl font-bold">Tambah kode barang</p>
            </div>
            <div class="w-full flex flex-row justify-center p-4">
                <form action="/adminregister" method="post"
                    class="min-w-[350px] flex flex-col bg-black bg-opacity-10 rounded-xl p-3 shadow-xl mr-5">
                    @csrf
                    <div class="mb-3">
                        <label for="inputNama_barang" class="mb-1 font-medium">Kode barang<span
                                class="text-red-600">*</span></label>
                        <input type="text" id="nama_barang" class="form-control rounded-2xl h-[48px] border-0"
                            name="nama_barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputNama_barang" class="mb-1 font-medium">Jenis barang<span
                                class="text-red-600">*</span></label>
                        <input type="text" id="nama_barang" class="form-control rounded-2xl h-[48px] border-0"
                            name="nama_barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputCatatan" class="mb-1 font-medium">Keterangan<span
                                class="text-red-600">*</span></label>
                        <textarea name="message" class="w-full rounded-2xl border-none h-[140px]" placeholder="Tulis catatan..."></textarea>
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
                            <tr>
                                <th scope="row">1</th>
                                <td>test</td>
                                <td>Otto</td>
                                <td>Otto</td>
                                <td><a href=""><button class="btn btn-danger flex items-center">Delete</button></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            {{-- MAIN END --}}
        </div>
    </div>
@endsection