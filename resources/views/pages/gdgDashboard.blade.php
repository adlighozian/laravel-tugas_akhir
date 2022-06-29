@extends('main')

@section('main')
    <div class="flex">
        {{-- SIDEBAR START --}}
        @include('components.sidebar')
        {{-- SIDEBAR END --}}
        <div class="w-full h-[100vh] overflow-auto bg-warnasatu">
            @include('components.navbar')
            {{-- MAIN SATRT --}}
            <div class="w-full h-[70px] bg-white flex items-center px-4 justify-between">
                <p class="text-xl font-bold">Gudang</p>
                <a href="/gdginput">
                    <button class="bg-boxtiga text-white p-1 rounded-md flex items-center font-medium">
                        <i class='bx bx-plus-medical mr-2'></i>Tambah Barang</button>
                </a>
            </div>
            <div class="w-full p-4">
                <div class="lg:flex-row lg:gap-10 flex flex-col duration-300 w-full mb-4">
                    {{-- BOX START --}}
                    <div class="w-full h-[80px] rounded-lg p-2 bg-warnatiga flex mb-3">
                        <div class="bg-boxtiga min-w-[70px] h-full rounded-lg flex justify-center items-center mr-3">
                            <i class='bx bx-package text-[40px] text-white'></i>
                        </div>
                        <div class="w-full h-full py-2 flex flex-col justify-between overflow-x-auto">
                            <p class="font-bold text-white">100 Buah</p>
                            <p class="text-white">Stok tersedia</p>
                        </div>
                    </div>
                    <div class="w-full h-[80px] rounded-lg p-2 bg-warnatiga flex mb-3">
                        <div class="bg-boxempat min-w-[70px] h-full rounded-lg flex justify-center items-center mr-3">
                            <i class='bx bx-package text-[40px] text-white'></i>
                        </div>
                        <div class="w-full h-full py-2 flex flex-col justify-between overflow-x-auto">
                            <p class="font-bold text-white">100 Buah</p>
                            <p class="text-white">Stok segera habis</p>
                        </div>
                    </div>
                    <div class="w-full h-[80px] rounded-lg p-2 bg-warnatiga flex mb-3">
                        <div class="bg-boxdua min-w-[70px] h-full rounded-lg flex justify-center items-center mr-3">
                            <i class='bx bx-package text-[40px] text-white'></i>
                        </div>
                        <div class="w-full h-full py-2 flex flex-col justify-between overflow-x-auto">
                            <p class="font-bold text-white">100 Buah</p>
                            <p class="text-white">Stok habis</p>
                        </div>
                    </div>
                    <div class="w-full h-[80px] rounded-lg p-2 bg-warnatiga flex mb-3">
                        <div class="bg-boxsatu min-w-[70px] h-full rounded-lg flex justify-center items-center mr-3">
                            <i class='bx bx-package text-[40px] text-white'></i>
                        </div>
                        <div class="w-full h-full py-2 flex flex-col justify-between overflow-x-auto">
                            <p class="font-bold text-white">100 Buah</p>
                            <p class="text-white">Stok expired</p>
                        </div>
                    </div>
                    {{-- BOX END --}}
                </div>
                <div class="p-2 bg-black bg-opacity-10 rounded-xl w-full flex items-center flex-col">
                    <p class="mb-2 font-medium text-xl">Tabel Daftar Barang</p>
                    <table class="table table-hover">
                        <thead class="text-white bg-tabelsatu">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama produk</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Expired</th>
                            </tr>
                        </thead>
                        <tbody class="text-black bg-white">
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>
                    <nav class="mt-3">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link text-black" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link text-black" href="#">1</a></li>
                            <li class="page-item"><a class="page-link text-black" href="#">2</a></li>
                            <li class="page-item"><a class="page-link text-black" href="#">3</a></li>
                            <li class="page-item"><a class="page-link text-black" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            {{-- MAIN END --}}
        </div>
    </div>
@endsection
