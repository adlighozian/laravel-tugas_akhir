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
                        <form class="sm:mb-0 flex w-full md:w-[300px] mb-3" role="kategori">
                            <input class="form-control rounded-l-md" type="kategori" placeholder="Tambah Kategori"
                                aria-label="kategori">
                            <button class="bg-slate-500 rounded-r-md text-white px-2 font-medium hover:bg-opacity-80"
                                type="submit">Tambah Kategori</button>
                        </form>
                </div>
                <p class="mb-2 font-medium text-xl">Tabel Daftar User</p>
                <table class="table table-hover">
                    <thead class="text-white bg-tabelsatu">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody class="text-black bg-white">
                       
                            <tr>
                                <th scope="row"></th>
                                
                                <td>Main Course </td>
                               
                                <td><a href=" ">Edit</a> 
                                <button> Delete </button></td>
                            </tr>

                    </tbody>
                </table>
            </div>
            {{-- MAIN END --}}
        </div>
    </div>
@endsection
