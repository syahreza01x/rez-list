@extends('layouts.master')
@extends('user.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row mt-3 justify-content-center">
            <div class="col-md-8">
                <h1 class="font-serif">Search</h1>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Anime Title" aria-label="Recipient's username"
                        aria-describedby="button-addon2" id="search-input" />
                    <button class="btn btn-outline-secondary" type="button" id="search-button">Search</button>
                </div>
            </div>
        </div>

        <section class="container-fluid">
            <h1 class="text-capitalize px-5" id="pencarian"></h1>
            <div class="w-100 h-100 p-3 row gap-5 justify-content-center" id="root"></div>

        </section>






        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-xl">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">RezLis</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body container-fluid">

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

{{-- </x-app-layout> --}}
