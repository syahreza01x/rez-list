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
                    <p>Genre : {{ $user->genre }}</p>
                    <p>Studio : {{ $user->studio }}</p>
                    <p>{{ $user->sinopsis }}</p>
                </div>
                <div class="col-12 text-center mt-5">

                    <form action="{{ route('user.update', $user->id) }}" method="post">
                        @csrf
                        <select name="status" class="form-select">
                            <option value="Plan To Watch" {{ $user->status == 'Plan To Watch' ? 'selected' : '' }}>Plan To
                                Watch
                            </option>
                            <option value="Watching" {{ $user->status == 'Watching' ? 'selected' : '' }}>Watching</option>
                            <option value="Completed" {{ $user->status == 'Completed' ? 'selected' : '' }}>Completed
                            </option>
                            <option value="Dropped" {{ $user->status == 'Dropped' ? 'selected' : '' }}>Dropped</option>
                        </select>
                        <button class="d-block my-2 btn btn-primary" style="width: 25%" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </main>
@endsection





{{-- </x-app-layout> --}}
