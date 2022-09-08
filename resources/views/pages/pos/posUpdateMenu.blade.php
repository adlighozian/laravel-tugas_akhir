@extends('main')

@section('main')
    {{-- MAIN SATRT --}}
    <div class="w-full sm:h-[70px] h-[50px] bg-white flex items-center px-4 justify-between text-sm">
        <p class="sm:text-xl font-bold">Update Menu</p>
    </div>

    <div class="w-full flex items-center flex-col py-8">
        {{-- FORM_UPDATE_MENU START --}}
        <form action="/updatemenu/edit/{{ $menu->id }}/update" method="post" enctype="multipart/form-data"
            class="lg:w-[800px]  sm:w-[570px] w-[350px] flex flex-col bg-black bg-opacity-10 rounded-xl p-3 shadow-xl">
            @csrf
            <div class="md:flex-row flex flex-col mb-2">
                <div class="w-full md:pr-2">
                    <div class="mb-3">
                        <label for="menuName" class="mb-1 font-medium">Nama Menu<span class="text-red-600">*</span></label>
                        <input type="text" id="menuName" class="form-control rounded-2xl h-[48px] border-0"
                            name="name" value="{{ $menu->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="ingridient" class="mb-1 font-medium">Bahan-bahan<span
                                class="text-red-600">*</span></label>
                        <input type="text" id="Ingridient" class="form-control rounded-2xl h-[48px] border-0"
                            name="ingredients" value="{{ $menu->ingredients }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="mb-1 font-medium">Catatan<span class="text-red-600">*</span></label>
                        <textarea id="description" class="form-control rounded-2xl h-[130px] border-0" name="description"
                            value="{{ $menu->description }}">{{ $menu->description }}</textarea>
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
                                <option @if ($menu->category == $c->category_name) selected @endif value="{{ $c->category_name }}">
                                    {{ $c->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="mb-1 font-medium">Harga<span class="text-red-600">*</span></label>
                        <input type="number" id="price" class="form-control rounded-2xl h-[48px] border-0"
                            name="price" value="{{ $menu->price }}">
                    </div>
                    <div class="mb-3">
                        <label for="inputgambar" class="mb-1 font-medium">Foto</label>
                        <div class="w-full h-[48px] flex items-center">
                            <input type="file" name="img" id="img"
                                class="form-control border-0 bg-white rounded-md" value="{{ $menu->image }}"
                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="w-full flex justify-center">
                            <div class="h-[100px] w-[100px] overflow-hidden flex justify-center items-center">
                                @if ($menu->image)
                                    <img id="blah" src="{{ asset('storage/' . $menu->image) }}" alt="">
                                @else
                                    <img src="{{ asset('assets/img/empty.png') }}" alt="">
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="image" value="{{ $menu->image }}">
                    </div>
                </div>
            </div>
            <button type="submit"
                class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">Update
                Menu</button>
        </form>
        {{-- FORM_UPDATE_MENU END --}}
    </div>

    {{-- <div class="w-full flex items-center flex-col p-3">
        <form action="/updatemenu/edit/{{ $menu->id }}/update" method="post"
            class="sm:w-[570px] w-[350px] flex flex-col">
            @csrf
            <div class="mb-3">
                <label for="menuName" class="mb-1 font-medium">Nama Menu</label>
                <input type="text" value="{{ $menu->name }}" id="menuName"
                    class="form-control rounded-2xl h-[48px] border-0" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="mb-1 font-medium">Description</label>
                <textarea id="description" value="{{ $menu->description }}" class="form-control rounded-2xl h-[100px] border-0"
                    name="description" required>{{ $menu->description }} </textarea>
            </div>

            <div class="mb-3">
                <label for="ingridient" class="mb-1 font-medium">Ingredient</label>
                <input type="text" value="{{ $menu->ingredients }}" id="Ingridient"
                    class="form-control rounded-2xl h-[48px] border-0" name="ingredients" required>
            </div>

            <div class="mb-8 flex flex-col">
                <label for="inputCategory" class="mb-1 font-medium">Category</label>
                <select id="category" class="border-gray-300 rounded-2xl h-[48px] px-2" name="category_id" required>

                    <option value="null" hidden>
                        Pilih Category
                    </option>
                    @foreach ($categories as $c)
                        <option @if ($menu->category_id == $c->id) selected @endif value="{{ $c->id }}">
                            {{ $c->category_name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label for="gambar" class="mb-1 font-medium">Foto</label>
                <input type="file" id="gambar" name="image" required>
            </div>

            <div class="mb-3">
                <label for="price" class="mb-1 font-medium">Harga</label>
                <input type="number" id="price" class="form-control rounded-2xl h-[48px] border-0" name="price"
                    value="{{ $menu->price }}" required>
            </div>
            <div class="input-form mb-1 font-medium">
                <label class="form-label">Sembunyikan menu?</label>
            </div>
            <div class="form-check form-check-inline">
                <input @if ($menu->is_hidden == true) checked @endif
                    class="form-check-input @error('is_hidden') is-invalid @enderror" type="radio" name="is_hidden"
                    id="inlineRadio1" value="1">
                <label class="form-check-label" for="inlineRadio1">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input @if ($menu->is_hidden == false) checked @endif
                    class="form-check-input @error('is_hidden') is-invalid @enderror" type="radio" name="is_hidden"
                    id="inlineRadio2" value="0">
                <label class="form-check-label" for="inlineRadio2">No</label>
            </div>

            <button type="submit"
                class="hover:bg-opacity-80 shadow-lg duration-150 w-full h-[48px] bg-warnatiga rounded-2xl text-white font-medium">Update
                Menu Makanan </button>
        </form>
    </div> --}}
    {{-- MAIN END --}}
@endsection
