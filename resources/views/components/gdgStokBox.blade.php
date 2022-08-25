<div class="lg:flex-row lg:gap-10 flex flex-col duration-300 w-full mb-4">
    {{-- BOX START --}}
    <div onclick="stoktersedia()" class="w-full h-[80px] rounded-lg p-2 bg-warnatiga flex mb-3 cursor-pointer">
        <div class="bg-boxtiga min-w-[70px] h-full rounded-lg flex justify-center items-center mr-3">
            <i class='bx bx-package text-[40px] text-white'></i>
        </div>
        <div class="w-full h-full py-2 flex flex-col justify-between overflow-x-auto">
            <p class="font-bold text-white">{{ count($stok_tersedia) }} Buah</p>
            <p class="text-white">Stok tersedia</p>
        </div>
    </div>
    <div onclick="stoksegera()" class="w-full h-[80px] rounded-lg p-2 bg-warnatiga flex mb-3 cursor-pointer">
        <div class="bg-boxempat min-w-[70px] h-full rounded-lg flex justify-center items-center mr-3">
            <i class='bx bx-package text-[40px] text-white'></i>
        </div>
        <div class="w-full h-full py-2 flex flex-col justify-between overflow-x-auto">
            <p class="font-bold text-white">{{ count($stok_segera) }} Buah</p>
            <p class="text-white">Stok segera habis</p>
        </div>
    </div>
    <div onclick="stokhabis()" class="w-full h-[80px] rounded-lg p-2 bg-warnatiga flex mb-3 cursor-pointer">
        <div class="bg-boxdua min-w-[70px] h-full rounded-lg flex justify-center items-center mr-3">
            <i class='bx bx-package text-[40px] text-white'></i>
        </div>
        <div class="w-full h-full py-2 flex flex-col justify-between overflow-x-auto">
            <p class="font-bold text-white">{{ count($stok_habis) }} Buah</p>
            <p class="text-white">Stok habis</p>
        </div>
    </div>
    <a href="/" class="w-full h-[80px] rounded-lg p-2 bg-warnatiga flex mb-3 cursor-pointer">
        <div class="bg-boxsatu min-w-[70px] h-full rounded-lg flex justify-center items-center mr-3 ">
            <i class='bx bx-package text-[40px] text-white'></i>
        </div>
        <div class="w-full h-full py-2 flex flex-col justify-between overflow-x-auto">
            <p class="font-bold text-white">{{ count($stok_barang) }} Buah</p>
            <p class="text-white">Semua stok</p>
        </div>
    </a>
    {{-- BOX END --}}
</div>
