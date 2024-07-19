@extends('layouts.admin')

@section('page_title', 'List Pertanyaan')

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
                            <th>Pertanyaan</th>
                            <th>Group</th>
                            <th>Tipe</th>
                            <th>Pilihan</th>
                            <th width="250">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <td>{{ $question->question }}</td>
                                <td class="text-capitalize">{{ $question->group }}</td>
                                <td class="text-capitalize">{{ $question->answer_type }}</td>
                                <td>{{ $question->options_count }}</td>
                                <td>
                                    <div class="flex gap-2 items-center">
                                        <a href="{{ route('admin.question.option.index', $question->id) }}"
                                            class="btn btn-sm btn-info">Options</a>
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
            <form class="modal-content" action="{{ route('admin.question.store') }}" method="POST"
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
                        <div class="form-text">
                            Harus unik dan tidak boleh ada spasi (Ganti spasi dengan simbol underscore "_")
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="add.icon" class="form-label">Ikon <span style="font-size: 8pt">(optional)</span></label>
                        <input type="file" name="icon" id="add.icon" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="add.question" class="form-label">Pertanyaan</label>
                        <input type="text" name="question" id="add.question" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="add.group" class="form-label">Group</label>
                        <select name="group" id="add.group" class="form-select">
                            <option value="kulit">Kulit</option>
                            <option value="gaya-hidup">Gaya Hidup</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="add.description" class="form-label">Deskripsi <span
                                style="font-size: 8pt">(optional)</span></label>
                        <input type="text" name="description" id="add.description" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="add.at" class="form-label">Tipe Jawaban</label>
                        <select name="answer_type" id="add.at" class="form-select">
                            <option value="single">Single</option>
                            <option value="multiple">Multiple</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="add.order" class="form-label">Urutan</label>
                        <input type="number" name="order" id="add.order" class="form-control">
                        <div class="form-text">
                            Tidak boleh sama dalam satu group
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    @foreach ($questions as $question)
        {{-- Edit Modal --}}
        <div class="modal fade" id="editModal-{{ $loop->iteration }}" tabindex="-1" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <form class="modal-content" action="{{ route('admin.question.update', $question->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">Ubah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="edit.label-{{ $loop->iteration }}" class="form-label">Label</label>
                            <input type="text" name="label" id="edit.label-{{ $loop->iteration }}"
                                class="form-control" value="{{ $question->label }}">
                            <div class="form-text">
                                Harus unik dan tidak boleh ada spasi (Ganti spasi dengan simbol underscore "_")
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="edit.icon-{{ $loop->iteration }}" class="form-label">Ikon <span
                                    style="font-size: 8pt">(optional)</span></label>
                            <input type="file" name="icon" id="edit.icon-{{ $loop->iteration }}"
                                class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="edit.question-{{ $loop->iteration }}" class="form-label">Pertanyaan</label>
                            <input type="text" name="question" id="edit.question-{{ $loop->iteration }}"
                                class="form-control" value="{{ $question->question }}">
                        </div>
                        <div class="mb-4">
                            <label for="edit.group-{{ $loop->iteration }}" class="form-label">Group</label>
                            <select name="group" id="edit.group-{{ $loop->iteration }}" class="form-select">
                                <option value="kulit" @selected($question->group == 'kulit')>Kulit</option>
                                <option value="gaya-hidup" @selected($question->group == 'gaya-hidup')>Gaya Hidup</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="edit.description-{{ $loop->iteration }}" class="form-label">Deskripsi <span
                                    style="font-size: 8pt">(optional)</span></label>
                            <input type="text" name="description" id="edit.description-{{ $loop->iteration }}"
                                class="form-control" value="{{ $question->description }}">
                        </div>
                        <div class="mb-4">
                            <label for="edit.at-{{ $loop->iteration }}" class="form-label">Tipe Jawaban</label>
                            <select name="answer_type" id="edit.at-{{ $loop->iteration }}" class="form-select">
                                <option value="single" @selected($question->answer_type == 'single')>Single</option>
                                <option value="multiple" @selected($question->answer_type == 'multiple')>Multiple</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="edit.order-{{ $loop->iteration }}" class="form-label">Urutan</label>
                            <input type="number" name="order" id="edit.order-{{ $loop->iteration }}"
                                class="form-control" value="{{ $question->order }}">
                            <div class="form-text">
                                Tidak boleh sama dalam satu group
                            </div>
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
                <form class="modal-content" action="{{ route('admin.question.destroy', $question->id) }}"
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
