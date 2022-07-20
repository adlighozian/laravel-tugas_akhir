@extends('main')

@section('css')
@endsection

@section('main')
    {{-- MAIN SATRT --}}
    {{-- ALERT START --}}
    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-transparent border-0">
                <div class="w-full flex flex-col items-center ">
                    <form action="/gdgdashboard/delete/" method="post">
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

    {{-- ALERT END --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold">Gudang</p>
        <a href="/gdginput">
            <button
                class="bg-boxtiga text-white p-2 rounded-md flex items-center font-medium hover:bg-opacity-80 duration-150 sm:text-base">
                <i class='bx bx-plus-medical mr-2'></i>Tambah Barang</button>
        </a>
    </div>
    <div class="w-full p-4">
        {{-- BOX START --}}
        @include('components.gdgStokBox')
        {{-- BOX END --}}
        <div class="p-2 bg-black bg-opacity-10 rounded-xl w-full flex items-center flex-col">
            <p class="font-medium text-xl">Tabel Daftar Barang</p>
            <div class="justify-between w-full flex items-center py-3">
                <form action="/gdgdashboard" class="flex w-full md:w-[300px]" role="search">
                    <input class="form-control rounded-l-md" type="search" placeholder="Search..." name="search"
                        value="{{ request('search') }}">
                    <button class="bg-slate-500 rounded-r-md text-white px-2 font-medium hover:bg-opacity-80"
                        type="submit">Search</button>
                </form>
                <nav class="hidden md:block">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link text-black" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link text-black" href="#">1</a></li>
                        <li class="page-item"><a class="page-link text-black" href="#">2</a></li>
                        <li class="page-item"><a class="page-link text-black" href="#">3</a></li>
                        <li class="page-item"><a class="page-link text-black" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
            <div class="w-full h-[300px] sm:h-auto overflow-auto">
                <table class="table">
                    <thead class="text-white bg-tabelsatu">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Expired</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-black bg-white">
                        @foreach ($gudang as $datas)
                            <tr>
                                <th scope="row">{{ $count }}</th>
                                <td>{{ $datas->kodebarang->kode }}</td>
                                <td>{{ $datas->nama }}</td>
                                @if ($datas->jumlah === 0)
                                    <td class="text-kulima">
                                        <div class="bg-kuenam w-fit h-fit px-2 py-1 rounded-lg">
                                            {{ $datas->jumlah }} {{ $datas->kodebarang->satuan }}
                                        </div>
                                    </td>
                                @elseif ($datas->jumlah <= $datas->kodebarang->min_stok)
                                    <td class="text-kusatu">
                                        <div class="bg-kudua w-fit h-fit px-2 py-1 rounded-lg">
                                            {{ $datas->jumlah }} {{ $datas->kodebarang->satuan }}
                                        </div>
                                    </td>
                                @else
                                    <td class="text-warnatiga">
                                        <div class="bg-kuempat w-fit h-fit px-2 py-1 rounded-lg">
                                            {{ $datas->jumlah }} {{ $datas->kodebarang->satuan }}
                                        </div>
                                    </td>
                                @endif
                                <td>{{ $datas->kodebarang->jenis }}</td>
                                <td>{{ $datas->expired }}</td>
                                <td class="flex"><a href="/gdgdetail/{{ $datas->id }}"><button
                                            class="btn btn-primary flex items-center">
                                            <i class='bx bx-search-alt-2 mr-1'></i>Detail</button></a>
                                    <button class="btn btn-danger flex items-center deletekodebtn ml-2"
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
            <nav class="mt-3 md:hidden">
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
    {{-- MODAL START --}}
    @include('components.gdgModalDelete')
    {{-- MODAL END --}}
    {{-- MAIN END --}}
@endsection

@section('js')
    <script src="/assets/js/gudang.js"></script>
@endsection
