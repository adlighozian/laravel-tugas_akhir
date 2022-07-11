@extends('main')

@section('main')
            {{-- MAIN SATRT --}}
            <div class="w-full px-3">
                <div class="w-full flex justify-between items-center h-[80px]">
                    

                </div>
                <p class="mb-2 font-medium text-xl">Catatan Pesanan Dapur</p>
                <table class="table table-hover">
                    <thead class="text-white bg-tabelsatu">
                        <tr>
                            <th scope="col">Nomor Meja</th>
                            <th scope="col">Nama Pesanan</th>
                            <th scope="col">Jumlah Pesanan</th>
                        </tr>
                    </thead>
                    <tbody class="text-black bg-white">
                        
                            <tr>
                                <td>1</td>
                                <td> Nasi Goreng </td>
                                <td> 2 </td>

                            </tr>
 
                        
                    </tbody>
</table>
                <button type="submit"
                        class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">Done 
                </button>
            </div>
            {{-- MAIN END --}}
@endsection
