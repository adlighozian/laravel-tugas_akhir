@extends('main')

@section('main')
    <div class="flex">
        {{-- MAIN SATRT --}}
        <div class="w-full flex items-center flex-col p-3">
            <p class="text-base font-bold mb-2">Input Transaksi</p>
            {{-- FORM_REGISTER START --}}
            <form action="/kuinput/store" method="post" class="sm:w-[570px] w-[350px] flex flex-col"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-8 flex flex-col">
                    <label for="inputJenis" class="mb-1 font-medium">Jenis</label>
                    <select id="jenis" class="border-gray-300 rounded-2xl h-[48px] px-2" name="jenis" required>
                        <option value="null" hidden>
                            Pilih Jenis
                        </option>
                        <option value="Pemasukan" rel="Pemasukan">Pemasukan</option>
                        <option value="Pengeluaran" rel="Pengeluaran">Pengeluaran</option>
                        <option value="Lainnya" rel="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="mb-8 flex flex-col">
                    <label for="inputSumber" class="mb-1 font-medium">Sumber</label>
                    {{-- <input type="text" id="sumber" class="form-control rounded-2xl h-[48px] border-0"
                        placeholder="Cash / cashless / operasi / etc" name="sumber" required> --}}
                    <select id="sumber" class="border-gray-300 rounded-2xl h-[48px] px-2" name="sumber" required>
                        <option value="null" hidden>
                            Pilih sumber
                        </option>
                        @foreach ($accounts as $account)
                            <option value="{{ $account->name }}" class="{{ $account->type }}">{{ $account->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputTanggal" class="mb-1 font-medium">Tanggal</label>
                    <input type="date" id="tanggal" class="form-control rounded-2xl h-[48px] border-0" placeholder=""
                        name="tanggal" required>
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
    @endsection

    @section('js')
        <script>
            $(document).ready(function() {
                var $cat = $('select[name=jenis]'),
                    $items = $('select[name=sumber]');

                $cat.change(function() {

                    var $this = $(this).find(':selected'),
                        rel = $this.attr('rel');

                    // Hide all
                    $items.find("option").hide();

                    // Find all matching accessories
                    // Show all the correct accesories
                    // Select the first accesory
                    $set = $items.find('option.' + rel);
                    $set.show().first().prop('selected', true);

                });
            });
        </script>
    @endsection
