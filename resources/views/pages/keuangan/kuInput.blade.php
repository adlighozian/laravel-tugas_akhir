@extends('main')

@section('main')
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold">Input Transaksi</p>
    </div>
    {{-- MAIN SATRT --}}
    <div class="w-full flex items-center flex-col py-8">
        {{-- FORM_TAMBAH_BARANG START --}}
        <form action="/kuinput/store" method="post" enctype="multipart/form-data"
            class="lg:w-[800px] sm:w-[570px] w-[350px] flex flex-col bg-black bg-opacity-10 rounded-xl p-3 shadow-xl">
            @csrf
            <div class="md:flex-row flex flex-col">
                <div class="w-full md:pr-2">
                    <div class="mb-3 flex flex-col">
                        <label for="inputKode" class="mb-1 font-medium">Jenis<span class="text-red-600">*</span></label>
                        <select id="kode" class="rounded-2xl h-[48px] px-2" name="jenis">
                            <option value="null" hidden>
                                Pilih Jenis
                            </option>
                            <option value="Pemasukan" rel="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran" rel="Pengeluaran">Pengeluaran</option>
                            <option value="Lainnya" rel="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="inputKode" class="mb-1 font-medium">Sumber<span class="text-red-600">*</span></label>
                        <select id="kode" class="rounded-2xl h-[48px] px-2" name="sumber" required>
                            <option value="null" hidden>
                                Pilih sumber
                            </option>
                            @foreach ($accounts as $account)
                                <option value="{{ $account->name }}" class="{{ $account->type }}">{{ $account->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputExpired" class="mb-1 font-medium">Tanggal</label>
                        <input type="date" id="tanggal" class="form-control rounded-2xl h-[48px]" name="tanggal"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="inputjumlah" class="mb-1 font-medium">Nominal<span class="text-red-600">*</span></label>
                        <input type="number" id="nominal" class="form-control rounded-2xl h-[48px]" placeholder="500000"
                            name="nominal" required>
                    </div>
                </div>
                <div class="w-full md:pl-2">
                    <div class="mb-1">
                        <label for="inputgambar" class="mb-1 font-medium">Bukti</label>
                        <div class="w-full h-[48px] flex items-center">
                            <input type="file" name="bukti" id="bukti"
                                class="form-control border-0 bg-white rounded-md"
                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                    </div>
                    <div class="mb-3 w-full flex justify-center">
                        <img id="blah" class="border-0 w-[100px]" />
                    </div>
                    <div class="mb-3">
                        <label for="inputCatatan" class="mb-1 font-medium">Keterangan</label>
                        <textarea class="w-full rounded-2xl border-none h-[140px]" placeholder="Isi keterangan dari transaksi" name="keterangan"
                            required></textarea>
                    </div>
                </div>
            </div>
            <button type="submit"
                class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">Submit</button>
        </form>
        {{-- FORM_TAMBAH_BARANG END --}}
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
