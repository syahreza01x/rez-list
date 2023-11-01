@extends('layouts.master1')
@extends('user.layout')


@section('content')
    <main class="   ml-auto " style="width: 80%">
        <div class="container-fluid">
            <div>
                <a href="{{ route('user.index') }}" class="btn btn-primary"
                    style="margin-bottom: 10px; margin-top:10px">Back</a>
            </div>
            <div class="row">
                <div class="col-4">
                    <img src="{{ $user->gambar }}" style="max-width: 200px; ">
                </div>
                <div class="col-8 pr-5">
                    <h1>{{ $user->judul }}</h1>
                    <p>genre : {{ $user->genre }}</p>
                    <p>studio : {{ $user->studio }}</p>
                    <p>{{ $user->sinopsis }}</p>
                </div>
                <div class="col-12 text-center mt-5">
                    <div style="padding: 15px"
                        class="{{ $user->status === 'Dropped'
                            ? 'badge text-bg-danger'
                            : ($user->status === 'Watching'
                                ? 'badge text-bg-primary'
                                : ($user->status === 'Plan To Watch'
                                    ? 'badge text-bg-warning'
                                    : 'badge text-bg-success')) }}">
                        {{ $user->status }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection





{{-- </x-app-layout> --}}
