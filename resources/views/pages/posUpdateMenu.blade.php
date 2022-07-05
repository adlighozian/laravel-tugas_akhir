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
                <p class="text-base font-bold mb-2">Update Menu</p>
                {{-- FORM_CREATE_MENU START --}}
                <form action="/updatemenu/update" method="post" class="sm:w-[570px] w-[350px] flex flex-col">
                    @csrf
                    <div class="mb-3">
                        <label for="menuName" class="mb-1 font-medium">Nama Menu</label>
                        <input type="text" value="{{ $menu->name }}" id="menuName" class="form-control rounded-2xl h-[48px] border-0"
                         name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="mb-1 font-medium">Description</label>
                        <textarea id="description" value="{{ $menu->description }}" class="form-control rounded-2xl h-[100px] border-0"
                         name="description" required> </textarea>
                    </div>

                    <div class="mb-3">
                        <label for="ingridient" class="mb-1 font-medium">Ingredient</label>
                        <input type="text" value="{{ $menu->ingredients }}" id="Ingridient" class="form-control rounded-2xl h-[48px] border-0"
                         name="ingredients" required>
                    </div>

                    <div class="mb-8 flex flex-col">
                        <label for="inputCategory" class="mb-1 font-medium">Category</label>
                        <select id="category" class="border-gray-300 rounded-2xl h-[48px] px-2" name="category_id" required>
                            <option value="null" hidden>
                                Pilih Category
                            </option>
                            @foreach($categories as $c)
                            <option value="{{ $c->id}}">{{ $c->category_name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="mb-1 font-medium">Foto</label>
                        <input type="file" id="gambar" name="image" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="mb-1 font-medium">Harga</label>
                        <input type="number" id="price" class="form-control rounded-2xl h-[48px] border-0"
                         name="price" required>
                    </div>
                    <div class="input-form mx-auto">
                        <label class="form-label">Sembunyikan menu?</label>
                    </div>
                    <div class="form-check form-check-inline">
                            <input class="form-check-input @error('is_hidden') is-invalid @enderror" type="radio" name="is_hidden" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('is_hidden') is-invalid @enderror" type="radio" name="is_hidden" id="inlineRadio2" value="0">
                            <label class="form-check-label" for="inlineRadio2">No</label>
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
