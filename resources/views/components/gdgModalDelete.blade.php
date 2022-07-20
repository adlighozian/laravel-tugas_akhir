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
                            <input type="text" name="kode_delete_id" id="kode_id">
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
