@extends('main')

@section('main')
    <div class="flex">
        {{-- SIDEBAR START --}}
        @include('components.sidebar')
        {{-- SIDEBAR END --}}
        <div class="w-full h-[100vh] bg-warnasatu">
            @include('components.navbar')
            {{-- MAIN START --}}
            <p>CRUD Menu Makanan</p>

            <div class="row my-2">
        <div class="col d-flex justify-content-start">
            <form class="d-flex" action="" method="GET">
                <input class="form-control me-2 search-menu rounded" type="search" placeholder="Search" aria-label="Search" name="query">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a href="" class="btn btn-success">Category</a>
        </div>
        <p> </p>
        
        <div class="col d-flex justify-content-start">
            <a href="/createmenu" class="btn btn-success">Create Menu</a>
        </div>



            <div class="row">
        
        <div class="card mb-3 w-100 h-100">
            <div class="row g-0">
                <div class="col-md-3 d-flex align-self-center">
                    <img src="" class="img-menu">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title">Nasi </h4>
                        <div class="row menu-desc">
                            <div class="container">
                                <div class="row">
                                    <p class="col-sm-2 lh-sm">Description</p>
                                    <p class="col-sm-10 lh-sm">Aku adalah anak gembala</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 lh-sm">Ingredients</p>
                                    <p class="col-sm-10 lh-sm">Nasi Goreng</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 lh-lg">Category</p>
                                    <p class="col-sm-10 lh-lg">Main Course</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 lh-sm">Price</p>
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
        </div>

            {{-- MAIN END --}}
        </div>
    </div>
@endsection
