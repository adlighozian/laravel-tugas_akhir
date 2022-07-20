<div class="lg:flex-row lg:gap-10 flex flex-col duration-300 w-full mb-4">
    {{-- BOX START --}}
    <a href="/gdgstoktersedia" class="w-full">
        <div class="w-full h-[80px] rounded-lg p-2 bg-warnatiga flex mb-3">
            <div class="bg-boxtiga min-w-[70px] h-full rounded-lg flex justify-center items-center mr-3">
                <i class='bx bx-package text-[40px] text-white'></i>
            </div>
            <div class="w-full h-full py-2 flex flex-col justify-between overflow-x-auto">
                <p class="font-bold text-white">{{ count($stok_barang) - count($stok_habis) }} Buah</p>
                <p class="text-white">Stok tersedia</p>
            </div>
        </div>
    </a>
    <a href="/gdgstoksegera" class="w-full">
        <div class="w-full h-[80px] rounded-lg p-2 bg-warnatiga flex mb-3">
            <div class="bg-boxempat min-w-[70px] h-full rounded-lg flex justify-center items-center mr-3">
                <i class='bx bx-package text-[40px] text-white'></i>
            </div>
            <div class="w-full h-full py-2 flex flex-col justify-between overflow-x-auto">
                <p class="font-bold text-white">{{ count($stok_segera) }} Buah</p>
                <p class="text-white">Stok segera habis</p>
            </div>
        </div>
    </a>
    <a href="/gdgstokhabis" class="w-full">
        <div class="w-full h-[80px] rounded-lg p-2 bg-warnatiga flex mb-3">
            <div class="bg-boxdua min-w-[70px] h-full rounded-lg flex justify-center items-center mr-3">
                <i class='bx bx-package text-[40px] text-white'></i>
            </div>
            <div class="w-full h-full py-2 flex flex-col justify-between overflow-x-auto">
                <p class="font-bold text-white">{{ count($stok_habis) }} Buah</p>
                <p class="text-white">Stok habis</p>
            </div>
        </div>
    </a>
    <a href="" class="w-full">
        <div class="w-full h-[80px] rounded-lg p-2 bg-warnatiga flex mb-3">
            <div class="bg-boxsatu min-w-[70px] h-full rounded-lg flex justify-center items-center mr-3">
                <i class='bx bx-package text-[40px] text-white'></i>
            </div>
            <div class="w-full h-full py-2 flex flex-col justify-between overflow-x-auto">
                <p class="font-bold text-white">100 Buah</p>
                <p class="text-white">Stok expired</p>
            </div>
        </div>
    </a>
    {{-- BOX END --}}
</div>
