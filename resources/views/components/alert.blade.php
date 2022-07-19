@if (session()->has('error'))
    <div class="w-full fixed top-[65px] left-0 flex items-center justify-center" role="alert">
        <div
            class="alert alert-danger alert-dismissible fade show animate__animated animate__fadeInDown py-2 px-3 w-fit h-fit">
            <div class="w-full flex justify-between mb-1">
                <p class="font-bold">ERROR</p>
                <button type="button" data-bs-dismiss="alert"><i class='bx bx-x font-bold text-xl'></i></button>
            </div>
            <p>{{ session('error') }}</p>
        </div>
    </div>
@endif
@if (session()->has('success'))
    <div class="w-full fixed top-[65px] left-0 flex items-center justify-center" role="alert">
        <div
            class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInDown py-2 px-3 w-fit h-fit">
            <div class="w-full flex justify-between mb-1">
                <p class="font-bold">SUCCESS</p>
                <button type="button" data-bs-dismiss="alert"><i class='bx bx-x font-bold text-xl'></i></button>
            </div>
            <p>{{ session('success') }}</p>
        </div>
    </div>
@endif
