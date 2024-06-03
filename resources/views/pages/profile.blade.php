@extends('layouts.app')

@section('title') profile @endsection

@section('content')

<style>
    body {
        background: #007bff;
        background: linear-gradient(to right, #0062E6, #33AEFF);
    }
</style>
<section class="vh-90">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-12 col-xl-4">

                <div class="card" style="border-radius: 15px;">
                    <div class="card-body text-center">

                        <div class="mt-3 mb-4">
                            @auth
                                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture"
                                    class="rounded-circle img-fluid" style="width: 100px;" />
                                class="rounded-circle img-fluid" style="width: 100px;" />
                            @endauth
                        </div>
                        <h4 class="mb-2">nour sallam</h4>
                        <p class="text-muted mb-4">@Programmer <span class="mx-2">|</span> <a
                                href="https://www.linkedin.com/in/nour-sallam-6342b2251/" target="_blank">linkedin</a>
                        </p>

                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-primary btn-rounded btn-lg">
                            blogs
                        </button>
                        <div class="d-flex justify-content-between text-center mt-5 mb-2">
                            <div>
                                <p class="mb-2 h5">2</p>
                                <p class="text-muted mb-0">blogs</p>
                            </div>
                            <div class="px-3">
                                <p class="mb-2 h5">4</p>
                                <p class="text-muted mb-0">followers</p>
                            </div>
                            <div>
                                <ver class="mb-2 h5">20</p>
                                    <p class="text-muted mb-0">rank</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection