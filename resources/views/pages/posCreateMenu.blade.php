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
                <p class="text-base font-bold mb-2">Membuat Menu</p>
                {{-- FORM_CREATE_MENU START --}}
                <form action="/createMenu" method="post" class="sm:w-[570px] w-[350px] flex flex-col">
                    @csrf
                    <div class="mb-3">
                        <label for="menuName" class="mb-1 font-medium">Nama Menu</label>
                        <input type="text" id="menuName" class="form-control rounded-2xl h-[48px] border-0"
                         name="menuName" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="mb-1 font-medium">Description</label>
                        <textarea id="description" class="form-control rounded-2xl h-[100px] border-0"
                         name="description" required> </textarea>
                    </div>

                    <div class="mb-3">
                        <label for="ingridient" class="mb-1 font-medium">Ingridient</label>
                        <input type="text" id="Ingridient" class="form-control rounded-2xl h-[48px] border-0"
                         name="Ingridient" required>
                    </div>
                    
                    <div class="mb-8 flex flex-col">
                        <label for="inputCategory" class="mb-1 font-medium">Category</label>
                        <select id="category" class="border-gray-300 rounded-2xl h-[48px] px-2" name="category" required>
                            <option value="null" hidden>
                                Pilih Category
                            </option>
                            <option value="maincourse">main course</option>
                            <option value="pos">Minuman</option>
                            <option value="snack">Snack </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="mb-1 font-medium">Foto</label>
                        <input type="file" id="gambar" name="gambar" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="mb-1 font-medium">Harga</label>
                        <input type="number" id="price" class="form-control rounded-2xl h-[48px] border-0"
                         name="price" required>
                    </div>

                    <button type="submit"
                        class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">Create Menu Makanan </button>
                </form>
                {{-- FORM_CREATE_MENU END --}}
            </div>
            {{-- MAIN END --}}
        </div>
    </div>
@endsection
