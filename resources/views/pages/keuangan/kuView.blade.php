@extends('main')

@section('main')
    <div class="flex">
        {{-- MAIN SATRT --}}
        <div class="w-full flex items-center flex-col p-3">
            <p class="text-base font-bold mb-2">View Detail Transaksi</p>
            {{-- FORM_REGISTER START --}}
            <form>
                <div class="mb-3">
                    <label for="inputJenis" class="mb-1 font-medium">Jenis</label>
                    <input disabled type="text" id="jenis" class="form-control rounded-2xl h-[48px] border-0"
                        placeholder="Cash / cashless / operasi / etc" name="jenis" required
                        value="{{ $transaction->jenis }}">
                </div>
                <div class="mb-3">
                    <label for="inputSumber" class="mb-1 font-medium">Sumber</label>
                    <input disabled type="text" id="sumber" class="form-control rounded-2xl h-[48px] border-0"
                        placeholder="Cash / cashless / operasi / etc" name="sumber" required
                        value="{{ $transaction->sumber }}">
                </div>
                <div class="mb-3">
                    <label for="inputTanggal" class="mb-1 font-medium">Tanggal</label>
                    <input disabled type="text" id="tanggal" class="form-control rounded-2xl h-[48px] border-0"
                        placeholder="" name="tanggal" required value="{{ $transaction->tanggal->format('Y-m-d') }}">
                </div>
                <div class="mb-3">
                    <label for="inputNominal" class="mb-1 font-medium">Nominal</label>
                    <input disabled type="text" id="nominal" class="form-control rounded-2xl h-[48px] border-0"
                        placeholder="500000" name="nominal" required value="Rp{{ number_format($transaction->nominal, 2) }}">
                </div>
                {{-- Rp{{ number_format($transaction->jumlah, 2) }} --}}
                @if ($transaction->jenis == 'Pemasukan')
                    <div class="mb-3">
                        <label for="inputPajak" class="mb-1 font-medium">Pajak</label>
                        <input disabled type="text" id="pajak" class="form-control rounded-2xl h-[48px] border-0"
                            placeholder="500000" name="pajak" required value="Rp{{ number_format($transaction->pajak, 2) }}">
                    </div>
                    <div class="mb-3">
                        <label for="inputIncome" class="mb-1 font-medium">Income</label>
                        <input disabled type="text" id="income" class="form-control rounded-2xl h-[48px] border-0"
                            placeholder="500000" name="income" required value="Rp{{ number_format($transaction->income, 2) }}">
                    </div>
                @endif

                <div class="mb-3">
                    <label for="inputBukti" class="mb-1 font-medium">Bukti</label>
                    {{-- <input disabled type="file" id="bukti" class="form-control" placeholder="" name="bukti"> --}}
                    {{-- <img src="{{ URL::asset('storage') . "/" . $transaction->bukti }}" alt="saya ganteng miauw {{ URL::asset('storage/') . $transaction->bukti }}"> --}}
                    {{-- <p>{{ $transaction->bukt }} test</p> --}}
                    <div>
                    <img src="{{ asset('storage/' . $transaction->bukti) }}" alt="Image unavailable">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputKeterangan" class="mb-1 font-medium">Keterangan</label>
                    <input disabled type="text" id="keterangan" class="form-control rounded-2xl h-[48px] border-0"
                        placeholder="Isi keterangan dari transaksi" name="keterangan" required
                        value="{{ $transaction->keterangan }}">
                </div>

                {{-- <button type="submit"
                    class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">
                    Submit
                </button> --}}
                <a href="/kudashboard">
                    <button type="button"
                        class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">
                        Back
                    </button>
                </a>
            </form>
            {{-- FORM_REGISTER END --}}
        </div>
        {{-- MAIN END --}}
    @endsection
