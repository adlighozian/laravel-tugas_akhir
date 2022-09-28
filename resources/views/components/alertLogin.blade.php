@if (session()->has('error'))
    <div class="animate__animated animate__fadeInRight animate__delay-1s fixed bottom-10 right-10 bg-red-100 border-l-4 border-red-500 text-red-700 p-2 min-w-[200px] alert alert-success alert-dismissible fade show"
        role="alert">
        <div class="w-full flex justify-between mb-2">
            <p class="font-bold">Error</p>
            <button type="button" data-bs-dismiss="alert"><i class='bx bx-x font-bold text-xl'></i></button>
        </div>
        <p>{{ session('error') }}</p>
    </div>
@endif
@if (session()->has('success'))
    <div class="animate__animated animate__fadeInRight animate__delay-1s fixed bottom-10 right-10 bg-green-100 border-l-4 border-green-500 text-green-700 p-2 min-w-[200px] alert alert-success alert-dismissible fade show"
        role="alert">
        <div class="w-full flex justify-between mb-2">
            <p class="font-bold">Success</p>
            <button type="button" data-bs-dismiss="alert"><i class='bx bx-x font-bold text-xl'></i></button>
        </div>
        <p>{{ session('success') }}</p>
    </div>
@endif
