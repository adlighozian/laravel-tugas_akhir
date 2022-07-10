@extends('main')

@section('main')
            {{-- MAIN SATRT --}}
            <div class="w-full px-3">
                <div class="w-full flex justify-between items-center h-[80px]">
                    

                </div>
                <p class="mb-2 font-medium text-xl">Detail Pembayaran</p>
                <table class="table table-hover">
                    <thead class="text-white bg-tabelsatu">
                        <tr>
                            <th scope="col">Nama Pesanan</th>
                            <th scope="col">Jumlah pesanan</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody class="text-black bg-white">
                        
                            <tr>
                                <td>Nasi Goreng</td>
                                <td> 2 </td>
                                <td> Rp. 40.000 </td>

                            </tr>

                            <tr>
                            <td> TOTAL </td>
                            <td> 2 </td>
                            <td> Rp. 40.000 </td>
                            </tr>   
                        
                    </tbody>
                </table>
                <div class="input-form mx-auto">
                        <label class="form-label">Pilih Metode Pembayaran</label>
                    </div>
                    <div class="form-check form-check-inline">
                            <input class="form-check-input @error('is_hidden') is-invalid @enderror" type="radio" name="is_hidden" id="inlineRadio1" value="cash">
                            <label class="form-check-label" for="inlineRadio1">Cash</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('is_hidden') is-invalid @enderror" type="radio" name="is_hidden" id="inlineRadio2" value="cashless">
                            <label class="form-check-label" for="inlineRadio2">Cashless </label>
                        </div>
                <button type="submit"
                        class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">Bayar 
                </button>
            </div>
            {{-- MAIN END --}}
@endsection
