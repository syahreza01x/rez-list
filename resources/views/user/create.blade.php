@extends('layouts.master1')
@extends('user.layout')


@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div style="margin-left: 20px">
                        <h2>Add New List</h2>
                    </div>
                    <div style="margin-left: 20px">
                        <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
                    </div>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row" style="margin: 10px">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kode:</strong>
                        <input type="text" name="kode" class="form-control" placeholder="Kode" autocomplete="off">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Judul:</strong>
                        <input type="text" name="judul" class="form-control" placeholder="Judul" autocomplete="off">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Sinopsis:</strong>
                        <input type="text" name="sinopsis" class="form-control" placeholder="Sinopsis"
                            autocomplete="off">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Studio:</strong>
                        <input type="text" name="studio" class="form-control" placeholder="Studio" autocomplete="off">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>Genre:</strong>
                    <div class="form-check">


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Action" id="defaultCheck1"
                                name="genre[]">
                            <label class="form-check-label" for="defaultCheck1">
                                Action
                            </label>
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Romance" id="defaultCheck1"
                                name="genre[]">
                            <label class="form-check-label" for="defaultCheck1">
                                Romance
                            </label>
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Fantasy" id="defaultCheck1"
                                name="genre[]">
                            <label class="form-check-label" for="defaultCheck1">
                                Fantasy
                            </label>
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Adventure" id="defaultCheck1"
                                name="genre[]">
                            <label class="form-check-label" for="defaultCheck1">
                                Adventure
                            </label>
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Horror" id="defaultCheck1"
                                name="genre[]">
                            <label class="form-check-label" for="defaultCheck1">
                                Horror
                            </label>
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Thriller" id="defaultCheck1"
                                name="genre[]">
                            <label class="form-check-label" for="defaultCheck1">
                                Thriller
                            </label>
                        </div>



                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Magic" id="defaultCheck1"
                                name="genre[]">
                            <label class="form-check-label" for="defaultCheck1">
                                Magic
                            </label>
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Isekai" id="defaultCheck1"
                                name="genre[]">
                            <label class="form-check-label" for="defaultCheck1">
                                Isekai
                            </label>
                        </div>




                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status:</strong>


                        <select class="form-select form-select-padding-y :10px" aria-label=".form-select-sm"
                            name="status">
                            <option selected>Pilih Status</option>
                            <option value="Plan To Watch">Plan To Watch</option>
                            <option value="Watching">Watching</option>
                            <option value="Dropped">Dropped</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                </div>
                <br><br>
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar:</strong>
                        <input type="file" name="gambar" class="form-control" placeholder="gambar"
                            autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
@endsection
