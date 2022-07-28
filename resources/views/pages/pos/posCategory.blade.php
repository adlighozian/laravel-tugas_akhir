@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    {{-- ALERT_SUCCESS START --}}
    @include('components.alert')
    {{-- ALERT_SUCCESS END --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold"><a href="/menueditor">Menu Makanan</a> <i class='bx bxs-chevron-right'></i> Tambah
            category</p>
    </div>
    <div class="w-full p-4">
        <div class="w-full flex flex-col items-start py-3">
            <form class="sm:mb-0 flex w-fit mb-3" action="/categoryeditor/store" method="POST">
                @csrf
                <input class=" rounded-l-md" type="text" name="category_name" placeholder="Tambah Kategori"
                    aria-label="category_name">
                <button class="bg-slate-500 rounded-r-md text-white w-fit px-2 font-medium hover:bg-opacity-80"
                    type="submit">Tambah Kategori</button>
            </form>
        </div>
        <p class="mb-2 font-medium text-xl">Tabel Daftar Category</p>
        <table class="table table-hover">
            <thead class="text-white bg-tabelsatu">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-black bg-white">
                <div class="hidden">{{ $no = 1 }}</div>
                @foreach ($categories as $c)
                    <tr>
                        <th scope="row">{{ $no }}</th>
                        <td>{{ $c->category_name }}</td>
                        <td class="flex"><a href="/categoryeditor/hapus/{{ $c->id }}"><button
                                    class="btn btn-danger flex items-center ml-2">Hapus</button></a>

                        </td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- MAIN END --}}
@endsection
