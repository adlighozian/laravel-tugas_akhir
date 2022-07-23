@extends('main')

@section('main')
            {{-- MAIN SATRT --}}
            <div class="w-full px-3">
                <div class="w-full flex justify-between items-center h-[80px]">
                    <p class="font-medium text-lg">List Pembayaran</p>

                </div>

                <table class="table table-hover">
                    <thead class="text-white bg-tabelsatu">
                        <tr>
                            <th scope="col">No. Meja</th>
                            <th scope="col">Nama Customer</th>
                            <th scope="col">Total pembayaran</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-black bg-white">

                            <tr>
                                <td>1</td>
                                <td> Emilia </td>
                                <td> Rp. 40.000 </td>

                                <td> <a href="/listpayment/detailpayment"> Done</a> </td>
                                <td> <a href="/listpayment/detailpayment"> Detail  </a> </td>



                            </tr>

                    </tbody>
                </table>
            </div>
            {{-- MAIN END --}}
@endsection
