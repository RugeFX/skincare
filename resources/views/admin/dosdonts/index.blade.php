@extends('layouts.admin')

@section('page_title', "Do's & Don't's")

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
                            <th>Group</th>
                            <th>Skin Condition</th>
                            <th>Skin Dream</th>
                            <th>Todo</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosDonts as $item)
                            <tr>
                                <td class="text-capitalize">{{ $item->group }}</td>
                                <td>{{ $item->skin_condition }}</td>
                                <td>{{ $item->skin_dream }}</td>
                                <td>{{ $item->todo }}</td>
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
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" action="{{ route('admin.dos-donts.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label for="add.group" class="form-label">Group</label>
                        <select name="group" id="add.group" class="form-select">
                            <option value="dos">Do's</option>
                            <option value="donts">Don't's</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="add.sc" class="form-label">Skin Condition</label>
                        <select name="skin_condition" id="add.sc" class="form-select">
                            @foreach ($skin_conditions as $item)
                                <option value="{{ $item->label }}">{{ $item->label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="add.sd" class="form-label">Skin Dream</label>
                        <select name="skin_dream" id="add.sd" class="form-select">
                            @foreach ($skin_dreams as $item)
                                <option value="{{ $item->label }}">{{ $item->label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="add.todo" class="form-label">To do</label>
                        <input type="text" name="todo" id="add.todo" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    @foreach ($dosDonts as $item)
        {{-- Edit Modal --}}
        <div class="modal fade" id="editModal-{{ $loop->iteration }}" tabindex="-1" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form class="modal-content" action="{{ route('admin.dos-donts.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">Ubah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="add.group" class="form-label">Group</label>
                            <select name="group" id="edit.group{{ $loop->iteration }}" class="form-select">
                                <option value="dos" @selected($item->group == 'dos')>Do's</option>
                                <option value="donts" @selected($item->group == 'donts')>Don't's</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="edit.sc{{ $loop->iteration }}" class="form-label">Skin Condition</label>
                            <select name="skin_condition" id="edit.sc{{ $loop->iteration }}" class="form-select">
                                @foreach ($skin_conditions as $sc)
                                    <option value="{{ $sc->label }}" @selected($item->skin_condition == $sc->label)>{{ $sc->label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="edit.sd{{ $loop->iteration }}" class="form-label">Skin Dream</label>
                            <select name="skin_dream" id="edit.sd{{ $loop->iteration }}" class="form-select">
                                @foreach ($skin_dreams as $sd)
                                    <option value="{{ $sd->label }}" @selected($item->skin_dream == $sd->label)>{{ $sd->label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="edit.todo{{ $loop->iteration }}" class="form-label">To do</label>
                            <input type="text" name="todo" id="edit.todo{{ $loop->iteration }}"
                                class="form-control" value="{{ $item->todo }}">
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
                <form class="modal-content" action="{{ route('admin.dos-donts.destroy', $item->id) }}" method="POST">
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
