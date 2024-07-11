@extends('layouts.admin')

@section('page_title', 'Skin Category')

@section('actions')
    <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-sm">Tambah</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Tipe</th>
                            <th>Penyebab</th>
                            <th>Karakteristik</th>
                            <th>Skincare</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="text-capitalize">{{ $category->name }}</td>
                                <td>
                                    {{ Str::words($category->tipe, 10, '...') }}
                                </td>
                                <td>
                                    {{ Str::words($category->penyebab, 10, '...') }}
                                </td>
                                <td>
                                    @php
                                        $karakteristik = collect($category->karakteristik)->join(', ');
                                    @endphp
                                    {{ Str::words($karakteristik, 10, '...') }}
                                </td>
                                <td>
                                    @php
                                        $skincare = collect($category->skincare)->join(', ');
                                    @endphp
                                    {{ Str::words($skincare, 10, '...') }}
                                </td>
                                <td>
                                    <div class="flex gap-2 items-center">
                                        <a href="{{ route('admin.category.edit', $category->id) }}"
                                            class="btn btn-sm btn-warning">Ubah</a>
                                        <a href="#" role="button" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal-{{ $loop->iteration }}"
                                            class="btn btn-sm btn-danger">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    @foreach ($categories as $category)
        {{-- Delete Modal --}}
        <div class="modal fade" id="deleteModal-{{ $loop->iteration }}" tabindex="-1" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form class="modal-content" action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Hapus Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Apakah Anda yakin ingin menghapus data ini?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
