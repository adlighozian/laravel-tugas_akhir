@extends('main')

@section('main')
    <div class="flex">
        {{-- SIDEBAR START --}}
        @include('components.sidebar')
        {{-- SIDEBAR END --}}
        <div class="w-full h-[100vh] bg-warnasatu">
            @include('components.navbar')
            {{-- MAIN SATRT --}}
            <div class="w-full flex items-center flex-col p-3">
                <p class="text-base font-bold mb-2">Input Transaksi</p>
                {{-- FORM_REGISTER START --}}
                <form action="/kuinput/store" method="post" class="sm:w-[570px] w-[350px] flex flex-col">
                    @csrf
                    <div class="mb-8 flex flex-col">
                        <label for="inputJenis" class="mb-1 font-medium">Jenis</label>
                        <select id="jenis" class="border-gray-300 rounded-2xl h-[48px] px-2" name="jenis" required>
                            <option value="null" hidden>
                                Pilih Jenis
                            </option>
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputSumber" class="mb-1 font-medium">Sumber</label>
                        <input type="text" id="sumber" class="form-control rounded-2xl h-[48px] border-0"
                            placeholder="Cash / cashless / operasi / etc" name="sumber" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputTanggal" class="mb-1 font-medium">Tanggal</label>
                        <input type="date" id="tanggal" class="form-control rounded-2xl h-[48px] border-0"
                            placeholder="" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputNominal" class="mb-1 font-medium">Nominal</label>
                        <input type="number" id="nominal" class="form-control rounded-2xl h-[48px] border-0"
                            placeholder="500000" name="nominal" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputBukti" class="mb-1 font-medium">Bukti</label>
                        <input type="file" id="bukti" class="form-control" placeholder="" name="bukti">
                    </div>
                    <div class="mb-3">
                        <label for="inputKeterangan" class="mb-1 font-medium">Keterangan</label>
                        <input type="text" id="keterangan" class="form-control rounded-2xl h-[48px] border-0"
                            placeholder="Isi keterangan dari transaksi" name="keterangan" required>
                    </div>

                    <button type="submit"
                        class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">
                        Submit
                    </button>
                </form>
                {{-- FORM_REGISTER END --}}
            </div>
            {{-- MAIN END --}}
        </div>
    </div>
@endsection
