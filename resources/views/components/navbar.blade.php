<nav class=" w-full h-[10vh] flex items-center justify-between bg-warnadua px-[20px]">
    <i id="sidebarbtn" onclick="sidebar()" class='sm:hidden bx bx-menu text-white text-[30px] cursor-pointer'></i>
    <i id="sidebarbtn" onclick="sidebar2()" class='sm:block hidden bx bx-menu text-white text-[30px] cursor-pointer'></i>
    <div class="flex">
        {{-- USENAME_PROFILE START --}}
        <div class="flex items-end flex-col justify-center text-white">
            <p>Admin siapa</p>
            <p class="text-xs">adli@haoo.com</p>
        </div>
        {{-- USENAME_PROFILE END --}}
        {{-- PROFILE_IMAGE START --}}
        <a href="#" class="w-[50px] h-[50px] bg-slate-500 rounded-full overflow-hidden ml-3">
            <img src="assets/img/profile.png" alt="profile">
        </a>
        {{-- PROFILE_IMAGE END --}}
    </div>
</nav>
