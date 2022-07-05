@extends('main')

@section('main')
    <div class="flex">
        {{-- SIDEBAR START --}}
        @include('components.sidebar')
        {{-- SIDEBAR END --}}
        <div class="w-full h-[100vh] bg-warnasatu overflow-auto">
            @include('components.navbar')
            {{-- MAIN START --}}
            <div class="sm:h-[70px] w-full h-[50px] bg-white flex items-center px-4 justify-between duration-500">
                <p class="sm:text-xl text-xs font-bold">Menu Makanan</p>
                <div class="flex">
                    <a href="/createmenu" class="mr-3">
                        <button
                            class="sm:text-base p-2 text-xs bg-boxtiga text-white rounded-md flex items-center font-medium hover:bg-opacity-80 duration-150">
                            <i class='bx bx-plus-medical mr-2'></i>Pesan Makanan</button>
                    </a>
                    
                </div>
            </div>
            <div class="w-full p-4">
                <div class="p-2 bg-black bg-opacity-10 rounded-xl w-full flex items-center flex-col">
                    <div class="w-full flex flex-col items-start py-3">
                        <form class="sm:mb-0 flex w-full md:w-[300px] mb-3" role="search">
                            <input class="form-control rounded-l-md" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="bg-slate-500 rounded-r-md text-white px-2 font-medium hover:bg-opacity-80"
                                type="submit">Search</button>
                        </form>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link text-black" href="#">Makanan 1</a></li>
                                <li class="page-item"><a class="page-link text-black" href="#">Makanan 2</a></li>
                                <li class="page-item"><a class="page-link text-black" href="#">Makanan 3</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div
                        class="xl:grid-cols-4 sm:grid-cols-2 sm:grid grid-cols-1 gap-4 flex flex-col items-center w-full overflow-hidden">
                        <div class="w-[300px] rounded-md bg-warnadua shadow-md mb-3 p-2">
                            <div class="h-[200px] overflow-hidden bg-slate-500 flex justify-center items-center">
                            </div>
                            <div class="w-full h-[100px] bg-white">
                                <p class="w-full font-medium text-center">Nasi Goreng</p>
                                <div class="overflow-auto">
                                    <p class="">
                                        Deskripsi
                                    </p>
                                </div>
                            </div>
                            <div class="bg-white py-2 text-center w-full font-bold">Rp 10.000</div>
                            <div class="flex">
                            <button type="button" class="btn btn-secondary btn-number btn-pesan-number" data-type="Minus" disabled="disabled" data-field="">-</button>
                                </span>
                                <input type="text" name="total" class="form-control input-number my-2 text-center pesan-number" value="0" min="0" max="100">
                                <span class="input-group-btn mx-auto text-center">
                                    <button type="button" class="btn btn-secondary btn-number btn-pesan-number"  data-type="plus" data-field="total">+</button>
                            
                            </div>
                        </div>
                        <div class="w-[300px] rounded-md bg-warnadua shadow-md mb-3 p-2">
                            <div class="h-[200px] overflow-hidden bg-slate-500 flex justify-center items-center">
                            </div>
                            <div class="w-full h-[100px] bg-white">
                                <p class="w-full font-medium text-center">Nasi Goreng</p>
                                <div class="overflow-auto">
                                    <p class="">
                                        Deskripsi
                                    </p>
                                </div>
                            </div>
                            <div class="bg-white py-2 text-center w-full font-bold">Rp 10.000</div>
                            <div class="flex">
                            <span class="input-group-btn mx-auto text-center">
                                    <button type="button" class="btn btn-secondary btn-number btn-pesan-number" data-type="Minus" disabled="disabled" data-field="">-</button>
                                </span>
                                <input type="text" name="total" class="form-control input-number my-2 text-center pesan-number" value="0" min="0" max="100">
                                <span class="input-group-btn mx-auto text-center">
                                    <button type="button" class="btn btn-secondary btn-number btn-pesan-number"  data-type="plus" data-field="total">+</button>
                            </div>
                        </div>
                        <div class="w-[300px] rounded-md bg-warnadua shadow-md mb-3 p-2">
                            <div class="h-[200px] overflow-hidden bg-slate-500 flex justify-center items-center">
                            </div>
                            <div class="w-full h-[100px] bg-white">
                                <p class="w-full font-medium text-center">Nasi Goreng</p>
                                <div class="overflow-auto">
                                    <p class="">
                                        Deskripsi
                                    </p>
                                </div>
                            </div>
                            <div class="bg-white py-2 text-center w-full font-bold">Rp 10.000</div>
                            <div class="flex">
                            <button type="button" class="btn btn-secondary btn-number btn-pesan-number" data-type="Minus" disabled="disabled" data-field="">-</button>
                                </span>
                                <input type="text" name="total" class="form-control input-number my-2 text-center pesan-number" value="0" min="0" max="100">
                                <span class="input-group-btn mx-auto text-center">
                                    <button type="button" class="btn btn-secondary btn-number btn-pesan-number"  data-type="plus" data-field="total">+</button>
                            
                            </div>
                        </div>
                        <div class="w-[300px] rounded-md bg-warnadua shadow-md mb-3 p-2">
                            <div class="h-[200px] overflow-hidden bg-slate-500 flex justify-center items-center">
                            </div>
                            <div class="w-full h-[100px] bg-white">
                                <p class="w-full font-medium text-center">Nasi Goreng</p>
                                <div class="overflow-auto">
                                    <p class="">
                                        Deskripsi
                                    </p>
                                </div>
                            </div>
                            <div class="bg-white py-2 text-center w-full font-bold">Rp 10.000</div>
                            <div class="flex">
                            <button type="button" class="btn btn-secondary btn-number btn-pesan-number" data-type="Minus" disabled="disabled" data-field="">-</button>
                                </span>
                                <input type="text" name="total" class="form-control input-number my-2 text-center pesan-number" value="0" min="0" max="100">
                                <span class="input-group-btn mx-auto text-center">
                                    <button type="button" class="btn btn-secondary btn-number btn-pesan-number"  data-type="plus" data-field="total">+</button>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>












            {{-- <div class="row my-2">
                <div class="col d-flex justify-content-start">
                    <form class="d-flex" action="" method="GET">
                        <input class="form-control me-2 search-menu rounded" type="search" placeholder="Search"
                            aria-label="Search" name="query">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <a href="/categoryeditor" class="btn btn-success">Create Category</a>
                </div>
                <p> </p>

                <div class="col d-flex justify-content-start">
                    <a href="/createmenu" class="btn btn-success">Create Menu</a>
                </div>



                <div class="row">

                    <div class="card mb-3 w-100 h-100">
                        <div class="row g-0">
                            <div class="col-md-3 d-flex align-self-center">

                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Nasi Goreng </h5>

                                    <div class="row menu-desc">
                                        <div class="container">
                                            <div class="row">
                                                <p class="col-sm-2 lh-sm">Description :</p>
                                                <p class="col-sm-10 lh-sm">Aku adalah anak gembala</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 lh-sm">Ingredients :</p>
                                                <p class="col-sm-10 lh-sm">Nasi</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 lh-lg">Category :</p>
                                                <p class="col-sm-10 lh-lg">Main Course</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 lh-sm">Price :</p>
                                                <p class="col-sm-10 lh-sm">Rp. 10.000</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 text-center d-flex">
                                <div class="align-self-center d-grid gap-2">
                                    <a href="/updatemenu" class="btn btn-primary">Edit</a>
                                    <button type="button" class="btn btn-danger">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div> --}}

            {{-- MAIN END --}}
        </div>
    </div>
@endsection