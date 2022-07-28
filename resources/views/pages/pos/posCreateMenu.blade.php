@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    {{-- ALERT_SUCCESS START --}}
    @include('components.alert')
    {{-- ALERT_SUCCESS END --}}
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
                        <label for="menuName" class="mb-1 font-medium">Nama Menu</label>
                        <input type="text" id="menuName" class="form-control rounded-2xl h-[48px] border-0"
                            name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="ingridient" class="mb-1 font-medium">Ingredient</label>
                        <input type="text" id="Ingridient" class="form-control rounded-2xl h-[48px] border-0"
                            name="ingredients" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="mb-1 font-medium">Description</label>
                        <textarea id="description" class="form-control rounded-2xl h-[130px] border-0" name="description" required> </textarea>
                    </div>
                </div>
                <div class="w-full md:pl-2">
                    <div class="mb-3 flex flex-col">
                        <label for="inputCategory" class="mb-1 font-medium">Category</label>
                        <select id="category" class="border-gray-300 rounded-2xl h-[48px] px-2" name="category_id"
                            required>
                            <option value="null" hidden>
                                Pilih Category
                            </option>
                            @foreach ($categories as $c)
                                <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputgambar" class="mb-1 font-medium">Foto</label>
                        <div class="w-full h-[48px] flex items-center">
                            <input type="file" name="image" id="image"
                                class="form-control border-0 bg-white rounded-md">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="mb-1 font-medium">Harga</label>
                        <input type="number" id="price" class="form-control rounded-2xl h-[48px] border-0"
                            name="price" required>
                    </div>
                    <div class="input-form mx-auto">
                        <label for="price" class="mb-1 font-medium">Sembunyikan menu</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('is_hidden') is-invalid @enderror" type="radio"
                            name="is_hidden" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('is_hidden') is-invalid @enderror" type="radio"
                            name="is_hidden" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                </div>
            </div>
            <button type="submit"
                class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">Create
                Menu Makanan </button>
        </form>
        {{-- FORM_CREATE_MENU END --}}
    </div>
    {{-- MAIN END --}}
@endsection
