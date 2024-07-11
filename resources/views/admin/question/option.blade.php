@extends('layouts.admin')

@section('page_title', 'List Pertanyaan Option')

@section('actions')
    <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary btn-sm">Tambah</button>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Label</th>
                            <th>Description</th>
                            <th width="250">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($options as $option)
                            <tr>
                                <td>{{ $option->label }}</td>
                                <td>{{ $option->description }}</td>
                                <td>
                                    <div class="flex gap-2 items-center">
                                        <a href="#" role="button" data-bs-toggle="modal"
                                            data-bs-target="#editModal-{{ $loop->iteration }}"
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
    {{-- Add Modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <form class="modal-content" action="{{ route('admin.question.option.store', $question) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label for="add.label" class="form-label">Label</label>
                        <input type="text" name="label" id="add.label" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="add.icon" class="form-label">Icon <span style="font-size: 8pt">(optional)</span></label>
                        <input type="file" name="icon" id="add.icon" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="add.description" class="form-label">Description <span
                                style="font-size: 8pt">(optional)</span></label>
                        <input type="text" name="description" id="add.description" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    @foreach ($options as $option)
        {{-- Edit Modal --}}
        <div class="modal fade" id="editModal-{{ $loop->iteration }}" tabindex="-1" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <form class="modal-content"
                    action="{{ route('admin.question.option.update', ['question' => $question, 'option' => $option->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">Ubah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="edit.label-{{ $loop->iteration }}" class="form-label">Label</label>
                            <input type="text" name="label" id="edit.label-{{ $loop->iteration }}" class="form-control"
                                value="{{ $option->label }}">
                        </div>
                        <div class="mb-4">
                            <label for="edit.icon-{{ $loop->iteration }}" class="form-label">Icon <span
                                    style="font-size: 8pt">(optional)</span></label>
                            <input type="file" name="icon" id="edit.icon-{{ $loop->iteration }}"
                                class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="edit.description-{{ $loop->iteration }}" class="form-label">Description <span
                                    style="font-size: 8pt">(optional)</span></label>
                            <input type="text" name="description" id="edit.description-{{ $loop->iteration }}"
                                class="form-control" value="{{ $option->description }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Delete Modal --}}
        <div class="modal fade" id="deleteModal-{{ $loop->iteration }}" tabindex="-1"
            aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form class="modal-content"
                    action="{{ route('admin.question.option.destroy', ['question' => $question, 'option' => $option->id]) }}"
                    method="POST">
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
