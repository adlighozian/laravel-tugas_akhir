<div id="sidebar_bg" onclick="sidebar()" class="fixed inset-0 bg-black opacity-50 hidden z-10"></div>
<div id="sidebar"
    class="sm:sticky sm:w-[70px] fixed -left-[100%] top-0 flex flex-col justify-between w-[250px] h-[100vh] bg-warnaempat duration-500 z-20">
    {{-- LOGO START --}}
    <a href="/">
        <div class="min-h-[70px] flex items-center justify-center">
            <i class='bx bxs-bank text-[30px]' style='color:#da5f5f'></i>
            <span id="sidebar_list" class="sm:hidden text-white ml-2 text-xl font-medium">Sirka</span>
        </div>
    </a>
    {{-- LOGO END --}}
    {{-- LIST_SIDEBAR START --}}
    <ul class="flex flex-col overflow-x-auto h-full">
        {{-- ADMIN START --}}
        <a href="/admindashboard">
            <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                <div id="sidebar_list2"
                    class="{{ Request::is('admindashboard') ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                    <i class='bx bxs-dashboard text-[28px] text-white'></i>
                    <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1">Dashboard</span>
                </div>
            </li>
        </a>
        <a href="/adminregister">
            <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                <div id="sidebar_list2"
                    class="{{ Request::is('adminregister') ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                    <i class='bx bx-user-plus text-[28px] text-white'></i>
                    <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1">Tambah akun</span>
                </div>
            </li>
        </a>
        {{-- ADMIN END --}}
        {{-- GUDANG START --}}
        <a href="/gdgdashboard">
            <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                <div id="sidebar_list2"
                    class="{{ Request::is('gdgdashboard') ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                    <i class='bx bxs-dashboard text-[28px] text-white'></i>
                    <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1">Input barang</span>
                </div>
            </li>
        </a>
        <a href="/gdginput">
            <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                <div id="sidebar_list2"
                    class="{{ Request::is('gdginput') ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                    <i class='bx bxs-file-plus text-[28px] text-white'></i>
                    <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1">Input barang</span>
                </div>
            </li>
        </a>
        {{-- GUDANG END --}}
    </ul>
    {{-- LIST_SIDEBAR END --}}
    {{-- LOGOUT START --}}
    <a href="/login" class="min-h-[50px] w-full flex items-center justify-center bg-rose-500">
        <i class='bx bx-log-out text-white text-[30px]'></i>
        <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1">Keluar</span>
    </a>
    {{-- LOGOUT END --}}
</div>