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
        @if ($user->role == 'admin')
            <a href="/admindashboard">
                <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                    <div id="sidebar_list2"
                        class="{{ Request::is('admindashboard') ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                        <i class='bx bxs-dashboard text-[28px] text-white'></i>
                        <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1">Dashboard</span>
                    </div>
                </li>
            </a>
            <a href="/menueditor">
                <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                    <div id="sidebar_list2"
                        class="{{ Request::is('menueditor') ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                        <i class='bx bxs-food-menu text-[28px] text-white'></i>
                        <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1"> Menu Editor </span>
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
            <a href="/manage_user">
                <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                    <div id="sidebar_list2"
                        class="{{ Request::is('adminregister') ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                        <i class='bx bxs-user-detail text-[28px] text-white'></i>
                        <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1">Manage User</span>
                    </div>
                </li>
            </a>
        @elseif ($user->role == 'pos')
            <a href="/menueditor">
                <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                    <div id="sidebar_list2"
                        class="{{ Request::is('menueditor') ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                        <i class='bx bxs-food-menu text-[28px] text-white'></i>
                        <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1"> Menu Editor </span>
                    </div>
                </li>
            </a>
            <a href="/pemesanan">
                <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                    <div id="sidebar_list2"
                        class="{{ Request::is('pemesanan') ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                        <i class='bx bxs-cart-add text-[28px] text-white'></i>
                        <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1"> Pemesanan </span>
                    </div>
                </li>
            </a>
            <a href="/listpayment">
                <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                    <div id="sidebar_list2"
                        class="{{ Request::is('listpayment') ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                        <i class='bx bx-wallet text-[28px] text-white'></i>
                        <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1"> pembayaran </span>
                    </div>
                </li>
            </a>
            <a href="/kitchenote">
                <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                    <div id="sidebar_list2"
                        class="{{ Request::is('listpayment') ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                        <i class='bx bx-wallet text-[28px] text-white'></i>
                        <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1"> pembayaran </span>
                    </div>
                </li>
            </a>
        @elseif ($user->role == 'keuangan')
            <a href="/kudashboard">
                <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                    <div id="sidebar_list2"
                        class="{{ Request::is('kudashboard') ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                        <i class='bx bxs-dashboard text-[28px] text-white'></i>
                        <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1">Dashboard
                            Keuangan</span>
                    </div>
                </li>
            </a>
            <a href="/kutransaction">
                <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                    <div id="sidebar_list2"
                        class="{{ Request::is('kutransaction') ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                        <i class='bx bx-list-ol text-[28px] text-white'></i>
                        <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1">Semua Transaksi</span>
                    </div>
                </li>
            </a>
            <a href="/kuinput">
                <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                    <div id="sidebar_list2"
                        class="{{ Request::is('kuregister') ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                        <i class='bx bx-list-plus text-[28px] text-white'></i>
                        <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1">Input Transaksi</span>
                    </div>
                </li>
            </a>
        @elseif ($user->role == 'gudang')
            <a href="/gdgdashboard">
                <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                    <div id="sidebar_list2"
                        class="{{ $sidebar === 'gdgdashboard' ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                        <i class='bx bxs-dashboard text-[28px] text-white'></i>
                        <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1">Dashboard</span>
                    </div>
                </li>
            </a>
            <a href="/gdginput">
                <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                    <div id="sidebar_list2"
                        class="{{ $sidebar === 'gdginput' ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                        <i class='bx bx-archive-in text-[28px] text-white'></i>
                        <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1">Tambah barang</span>
                    </div>
                </li>
            </a>
            <a href="/gdginputkode">
                <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                    <div id="sidebar_list2"
                        class="{{ $sidebar === 'gdginputkode' ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                        <i class='bx bxs-file-plus text-[28px] text-white'></i>
                        <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1">Tambah kode
                            barang</span>
                    </div>
                </li>
            </a>
            <a href="/gdghistory">
                <li class="h-[60px] flex items-center justify-center cursor-pointer p-[5px] ">
                    <div id="sidebar_list2"
                        class="{{ $sidebar === 'gdghistory' ? 'bg-white bg-opacity-50' : '' }} sm:justify-center sm:pl-0 w-full h-full flex items-center pl-3 hover:bg-white hover:bg-opacity-50 rounded-xl">
                        <i class='bx bx-time text-[28px] text-white'></i>
                        <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1">Logbook</span>
                    </div>
                </li>
            </a>
        @endif
    </ul>
    {{-- LOGOUT START --}}
    <a href="/logout" class="min-h-[50px] w-full flex items-center justify-center bg-rose-500">
        <i class='bx bx-log-out text-white text-[30px]'></i>
        <span id="sidebar_list" class="sm:hidden text-white font-medium ml-1">Keluar</span>
    </a>
    {{-- LOGOUT END --}}
</div>
