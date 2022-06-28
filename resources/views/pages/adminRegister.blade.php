@extends('main')

@section('main')
    <div class="flex">
        {{-- SIDEBAR START --}}
        @include('components.sidebar')
        {{-- SIDEBAR END --}}
        <div class="w-full">
            @include('components.navbar')
            {{-- MAIN SATRT --}}
            <div class="w-full h-[90vh] bg-warnasatu flex items-center flex-col py-3">
                <p class="text-base font-bold mb-2">Buat akun baru</p>
                {{-- FORM_REGISTER START --}}
                <form action="" class="sm:w-[570px] w-[350px] flex flex-col">
                    <div class="mb-3">
                        <label for="inputEmail" class="mb-1 font-medium">Email</label>
                        <input type="text" id="email" class="form-control rounded-2xl h-[48px]"
                            placeholder="Example@gmail.com" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="mb-1 font-medium">Password</label>
                        <div class="flex justify-end items-center h-[48px] w-full">
                            <input type="password" id="password" class="form-control h-full w-full rounded-2xl"
                                placeholder="Masukan Password" name="password">
                            {{-- HIDE_SHOW START --}}
                            <span onclick="hide()"
                                class="absolute h-[40px] w-[30px] mr-3 cursor-pointer flex items-center justify-center bg-white">
                                <i id="hide2" class='bx bx-show hidden text-slate-600 text-[20px]'></i>
                                <i id="hide1" class='bx bx-hide text-slate-600 text-[20px]'></i>
                            </span>
                            {{-- HIDE_SHOW END --}}
                        </div>
                    </div>
                    <div class="mb-3 flex flex-col">
                        <label for="inputRole" class="mb-1 font-medium">Role</label>
                        <select id="role" class="border-gray-300 rounded-2xl h-[48px] px-2" name="role">
                            <option value="none" hidden>
                                Pilih Role
                            </option>
                            <option value="admin">Admin</option>
                            <option value="2">role 2</option>
                            <option value="3">role 3</option>
                        </select>
                    </div>
                </form>
                {{-- FORM_REGISTER END --}}
            </div>
            {{-- MAIN END --}}
        </div>
    </div>
@endsection
