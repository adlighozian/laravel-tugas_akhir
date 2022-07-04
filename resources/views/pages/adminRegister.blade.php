@extends('main')

@section('main')
    <div class="flex">
        {{-- SIDEBAR START --}}
        @include('components.sidebar')
        {{-- SIDEBAR END --}}
        <div class="w-full h-[100vh] bg-warnasatu">
            @include('components.navbar')
            {{-- MAIN SATRT --}}
            <div class="w-full flex items-center flex-col p-3">
                <p class="text-base font-bold mb-2">Buat akun baru</p>
                {{-- FORM_REGISTER START --}}
                <form action="/adminregister" method="post" class="sm:w-[570px] w-[350px] flex flex-col">
                    @csrf
                    <div class="mb-3">
                        <label for="inputEmail" class="mb-1 font-medium">Email</label>
                        <input type="email" id="email" class="form-control rounded-2xl h-[48px] border-0"
                            placeholder="Example@gmail.com" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="inputPassword" class="mb-1 font-medium">Password</label>
                        <div class="flex justify-end items-center h-[48px] w-full">
                            <input type="password" id="password" class="form-control h-full w-full rounded-2xl border-0"
                                placeholder="Masukan Password" name="password" required>
                            {{-- HIDE_SHOW START --}}
                            <span onclick="hide()"
                                class="absolute h-[40px] w-[30px] mr-3 cursor-pointer flex items-center justify-center bg-white">
                                <i id="hide2" class='bx bx-show hidden text-slate-600 text-[20px]'></i>
                                <i id="hide1" class='bx bx-hide text-slate-600 text-[20px]'></i>
                            </span>
                            {{-- HIDE_SHOW END --}}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputTelp" class="mb-1 font-medium">Nomor Telephone</label>
                        <input type="text" id="telp" class="form-control rounded-2xl h-[48px] border-0"
                            placeholder="081223123" name="no_telp" required>
                    </div>

                    <div class="mb-8 flex flex-col">
                        <label for="inputRole" class="mb-1 font-medium">Role</label>
                        <select id="role" class="border-gray-300 rounded-2xl h-[48px] px-2" name="role" required>
                            <option value="null" hidden>
                                Pilih Role
                            </option>
                            <option value="gudang">gudang</option>
                            <option value="pos">pos</option>
                            <option value="keuangan">keuangan</option>
                        </select>
                    </div>

                    <input type="hidden" id="telp" value="img" name="profile_picture">

                    <button type="submit"
                        class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">Buat
                        akun</button>
                </form>
                {{-- FORM_REGISTER END --}}
            </div>
            {{-- MAIN END --}}
        </div>
    </div>
@endsection
