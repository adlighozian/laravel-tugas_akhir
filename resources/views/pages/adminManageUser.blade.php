@extends('main')

@section('main')
    <div class="flex">
        {{-- SIDEBAR START --}}
        @include('components.sidebar')
        {{-- SIDEBAR END --}}
        <div class="w-full h-[100vh] bg-warnasatu">
            @include('components.navbar')
            {{-- MAIN SATRT --}}
            <div class="w-full px-3">
                <div class="w-full flex justify-between items-center h-[80px]">
                    <p class="font-medium text-lg">Manage User</p>
                    <a href="/adminregister">
                        <button class="font-medium text-sm items-center text-white bg-warnadua p-[10px] flex rounded-xl">
                            <i class='bx bx-plus-medical items-center mr-1 mt-1'></i>Buat akun
                            baru</button>
                    </a>
                </div>
                <p class="mb-2 font-medium text-xl">Tabel Daftar User</p>
                <table class="table table-hover">
                    <thead class="text-white bg-tabelsatu">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-black bg-white">
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $counter }}</th>
                                <td>{{ $user->email; }}</td>
                                <td>{{ $user->role; }}</td>
                                <td><a href="/edit_user/{{ $user->id }}">Edit</a></td>
                            </tr>
                            @php
                                $counter++;
                            @endphp
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{-- MAIN END --}}
        </div>
    </div>
@endsection
