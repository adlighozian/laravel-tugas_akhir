<nav class=" w-full h-[70px] flex items-center justify-between bg-warnadua px-[20px]">
    <i id="sidebarbtn" onclick="sidebar()" class='sm:hidden bx bx-menu text-white text-[30px] cursor-pointer'></i>
    <i id="sidebarbtn" onclick="sidebar2()" class='sm:block hidden bx bx-menu text-white text-[30px] cursor-pointer'></i>
    <div class="flex">
        {{-- USENAME_PROFILE START --}}
        <div class="flex items-end flex-col justify-center text-white">
            <p>
                @if ($user->role == 'admin')
                    General Manager (Admin)
                @elseif ($user->role == 'pos')
                    Manager Point of Sales
                @elseif ($user->role == 'keuangan')
                    Manager Keuangan
                @elseif ($user->role == 'gudang')
                    Manager Gudang
                @endif
            </p>
            <p class="text-xs">{{ $user->email }}</p>
        </div>
        {{-- USENAME_PROFILE END --}}
        {{-- PROFILE_IMAGE START --}}
        <a href="#" class="w-[50px] h-[50px] bg-slate-500 rounded-full overflow-hidden ml-3">
            <img src="/assets/img/profile.png" alt="profile">
        </a>
        {{-- PROFILE_IMAGE END --}}
    </div>
</nav>
