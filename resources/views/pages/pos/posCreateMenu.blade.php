@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold"><a href="/menueditor">Menu Makanan</a> <i class='bx bxs-chevron-right'></i> Tambah
            menu</p>
    </div>
    <div class="w-full flex items-center flex-col py-8">
        {{-- FORM_CREATE_MENU START --}}
        <form action="/createmenu/store" method="post" enctype="multipart/form-data"
            class="lg:w-[800px]  sm:w-[570px] w-[350px] flex flex-col bg-black bg-opacity-10 rounded-xl p-3 shadow-xl">
            @csrf
            <div class="md:flex-row flex flex-col mb-2">
                <div class="w-full md:pr-2">
                    <div class="mb-3">
                        <label for="menuName" class="mb-1 font-medium">Nama Menu<span class="text-red-600">*</span></label>
                        <input type="text" id="menuName" class="form-control rounded-2xl h-[48px] border-0"
                            name="name" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="ingridient" class="mb-1 font-medium">Bahan-bahan<span
                                class="text-red-600">*</span></label>
                        <input type="text" id="Ingridient" class="form-control rounded-2xl h-[48px] border-0"
                            name="ingredients" value="{{ old('ingredients') }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="mb-1 font-medium">Catatan<span class="text-red-600">*</span></label>
                        <textarea id="description" class="form-control rounded-2xl h-[130px] border-0" name="description"
                            value="{{ old('description') }}"> </textarea>
                    </div>
                </div>
                <div class="w-full md:pl-2">
                    <div class="mb-3 flex flex-col">
                        <label for="inputCategory" class="mb-1 font-medium">Category<span
                                class="text-red-600">*</span></label>
                        <select id="category" class="border-gray-300 rounded-2xl h-[48px] px-2" name="category">
                            <option value="null" hidden>
                                Pilih Category
                            </option>
                            @foreach ($categories as $c)
                                <option value="{{ $c->category_name }}">{{ $c->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="mb-1 font-medium">Harga<span class="text-red-600">*</span></label>
                        <input type="number" id="price" class="form-control rounded-2xl h-[48px] border-0"
                            name="price" value="{{ old('price') }}">
                    </div>
                    <div class="mb-3">
                        <label for="inputgambar" class="mb-1 font-medium">Foto</label>
                        <div class="w-full h-[48px] flex items-center">
                            <input type="file" name="image" id="image"
                                class="form-control border-0 bg-white rounded-md"
                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="mb-3 w-full flex justify-center">
                            <img id="blah" class="border-0 w-[100px]" />
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit"
                class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">Create
                Menu </button>
        </form>
        {{-- FORM_CREATE_MENU END --}}
    </div>
    {{-- MAIN END --}}
@endsection
