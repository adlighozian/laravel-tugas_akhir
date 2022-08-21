@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
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
                            <p class="mb-2">Jenis Barang</p>
                            <p class="mb-2">Jumlah</p>
                            <p class="mb-2">Catatan</p>
                        </div>
                        <div class="ml-3">
                            <p class="mb-2">: {{ $data->nama }}</p>
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
                <div class="w-full flex flex-col justify-center p-2 ">
                    <form action="/gdgdetail/masuk" method="POST" class="w-full flex flex-col items-center mb-4">
                        @csrf
                        <div class="flex bg-white rounded-t-lg px-2 w-full border-b-2">
                            <input type="date" class="form-control border-none" name="expired">
                        </div>
                        <div class="flex bg-white px-2 w-full">
                            <input type="number" class="form-control border-none" name="jumlah_keluar">
                            <div class="min-w-fit font-medium flex items-center">{{ $data->kodebarang->satuan }}</div>
                        </div>
                        <input type="hidden" name="barang_id" value="{{ $data->id }}">
                        <input type="hidden" name="nama" value="{{ $data->nama }}">
                        <input type="hidden" name="status" value="masuk">
                        <input type="hidden" name="is_true" value="1">
                        <input type="hidden" name="kodebarang_id" value="{{ $data->kodebarang->id }}">
                        <button type="submit"
                            class="w-full text-white font-medium rounded-b-lg h-10 bg-boxtiga hover:bg-opacity-80 duration-150">Tambah
                            barang</button>
                    </form>
                    <form action="/gdgdetail/keluar" method="POST" class="w-full flex flex-col items-center">
                        @csrf
                        <div class="flex bg-white px-2 w-full  rounded-t-lg">
                            <input type="number" class="form-control border-none" name="jumlah_keluar">
                            <div class="min-w-fit font-medium flex items-center">{{ $data->kodebarang->satuan }}</div>
                        </div>
                        <input type="hidden" name="nama" value="{{ $data->nama }}">
                        <input type="hidden" name="jumlah" value="{{ $data->jumlah }}">
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="id_expired" value="{{ $data->id }}">
                        <input type="hidden" name="status" value="keluar">
                        <input type="hidden" name="kodebarang_id" value="{{ $data->kodebarang->id }}">
                        <button type="submit"
                            class="w-full text-white font-medium rounded-b-lg h-10 bg-boxdua hover:bg-opacity-80 duration-150">Ambil
                            barang</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-full h-[300px] sm:h-auto overflow-auto">
            <table class="table">
                <thead class="text-white bg-tabelsatu">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Tangal masuk</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Expired</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="tball" class="text-black bg-white">
                    <div class="hidden">{{ $no = 1 }}</div>
                    @foreach ($expired as $datas)
                        <tr>
                            <th scope="row">{{ $no }}</th>
                            <td>{{ date('d F Y', strtotime($datas->tanggal)) }}</td>
                            <td>{{ $datas->jumlah }}</td>
                            <td>
                                @if ($datas->expired)
                                    @if (str_replace('-', '', $datas->expired) <= $date)
                                        <p class="mb-2"><span class="text-kulima font-medium">
                                                {{ date('d F Y', strtotime($datas->expired)) }}
                                            </span></p>
                                    @else
                                        <p class="mb-2"> <span class="text-warnatiga font-medium">
                                                {{ date('d F Y', strtotime($datas->expired)) }}
                                            </span></p>
                                    @endif
                                @else
                                    <p class="mb-2">-</p>
                                @endif
                            </td>
                            <td>
                                <form action="/gdgexpired/delete" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $datas->id }}">
                                    <button class="btn bg-red-600 text-white flex items-center ml-2"
                                        type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
    {{-- MAIN END --}}
@endsection
