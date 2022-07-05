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
                    <p class="font-medium text-lg">Kategori</p>
                    
                </div>
                <div class="w-full flex flex-col items-start py-3">
                        <form class="sm:mb-0 flex w-full md:w-[300px] mb-3"  action="/categoryeditor/store" method="POST">
                        {{ csrf_field() }}
                            <input class="form-control rounded-l-md" type="text" name="category_name" placeholder="Tambah Kategori"
                                aria-label="category_name">
                            <button class="bg-slate-500 rounded-r-md text-white px-2 font-medium hover:bg-opacity-80"
                                type="submit">Tambah Kategori</button>
                        </form>
                </div>
                <p class="mb-2 font-medium text-xl">Tabel Daftar User</p>
                <table class="table table-hover">
                    <thead class="text-white bg-tabelsatu">
                        <tr>
                            
                            <th scope="col">Kategori</th>
                            <th scope="col">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody class="text-black bg-white">
                    @foreach($categories as $c)
                            <tr>
                                
                                
                                <td>{{ $c-> category_name}}</td>
                               
                                <td > <a href="/categoryeditor/hapus/{{ $c->id }}">Hapus</a></td>
                                
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{-- MAIN END --}}
        </div>
    </div>
@endsection
