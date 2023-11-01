@extends('layouts.master1')
@extends('user.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="row mt-5">
                <div class="col-lg-12 margin-tb">
                    <div style="margin-left: 20px">
                        <div class="float-start">
                            <a class="btn btn-success" href="{{ route('user.create') }}" id="create">Tambah Data</a>
                        </div>
                    </div>
                    <div style="padding-bottom: 110px;">
                        <select id="status-filter" class="form-select" aria-label="Default select example"
                            style="width: 150px; margin-left: 800px">
                            <option value="All">All</option>
                            <option value="Plan To Watch">Plan To Watch</option>
                            <option value="Watching">Watching</option>
                            <option value="Dropped">Dropped</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <section class="content">
                <table class="table table-bordered">
                    <tr class="table-dark">
                        <th class="text-center">JUDUL</th>
                        <th class="text-center">SINOPSIS</th>
                        <th class="text-center">STUDIO</th>
                        <th class="text-center">GENRE</th>
                        <th class="text-center">GAMBAR</th>
                        <th class="text-center">STATUS</th>
                        <th width="280px" class="text-center">AKSI</th>
                    </tr>

                    @foreach ($data as $item)
                        @php
                            $dataID = App\Helpers\EncryptionHelpers::encrypt($item->id);
                        @endphp

                        <tr class="text-center status-row" data-status="{{ $item->status }}">
                            <td>{{ $item->judul }}</td>
                            <td style="max-height: 100px; overflow: hidden;">
                                <p style="max-height: 220px; overflow: hidden;">{{ $item->sinopsis }}</p>
                            </td>
                            <td>{{ $item->studio }}</td>
                            <td>{{ $item->genre }}</td>
                            <td class="gambar"><img src="{{ $item->gambar }}" alt="gambar" style="width: 150px"></td>
                            <td>
                                <span style="padding: 15px"
                                    class="{{ $item->status === 'Dropped'
                                        ? 'badge text-bg-danger'
                                        : ($item->status === 'Watching'
                                            ? 'badge text-bg-primary'
                                            : ($item->status === 'Plan To Watch'
                                                ? 'badge text-bg-warning'
                                                : 'badge text-bg-success')) }}">{{ $item->status }}
                                </span>
                            </td>
                            <td align="center">
                                <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('user.show', $dataID) }}"><i
                                            class="fa-solid fa-eye fs-5"></i></a>
                                    <a class="btn btn-warning" href="{{ route('user.edit', $dataID) }}"><i
                                            class="fa-solid fa-pen-to-square fs-4 me-1"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i
                                            class="fa-solid fa-trash fs-5 me-1"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </section>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusFilter = document.getElementById('status-filter');
            const statusRows = document.querySelectorAll('.status-row');

            statusFilter.addEventListener('change', function() {
                const selectedStatus = statusFilter.value;

                statusRows.forEach(function(row) {
                    const rowStatus = row.getAttribute('data-status');
                    if (selectedStatus === 'All' || selectedStatus === rowStatus) {
                        row.style.display = 'table-row';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
