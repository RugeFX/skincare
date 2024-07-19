@extends('layouts.admin')

@section('page_title', 'Ubah Kategori Kulit')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Ubah Data</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row row-gap-3">
                    <div class="col-12">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $category->name }}">
                    </div>
                    <div class="col-md-6">
                        <label for="tipe" class="form-label">Tipe</label>
                        <textarea name="tipe" id="tipe" rows="5" class="form-control">{{ $category->tipe }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="penyebab" class="form-label">Penyebab</label>
                        <textarea name="penyebab" id="penyebab" rows="5" class="form-control">{{ $category->penyebab }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="karakteristik" class="form-label">Karakteristik</label>
                        <div id="karakteristik-container">
                            @foreach ($category->karakteristik as $index => $karakteristik)
                                <div class="input-group mb-2">
                                    <input type="text" name="karakteristik[]" class="form-control"
                                        value="{{ $karakteristik }}">
                                    <button type="button" class="btn btn-sm btn-outline-danger btn-remove">&minus;</button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary btn-add-karakteristik">&plus;</button>
                    </div>
                    <div class="col-md-6">
                        <label for="skincare" class="form-label">Kandungan Skincare</label>
                        <div id="skincare-container">
                            @foreach ($category->skincare as $index => $skincare)
                                <div class="input-group mb-2">
                                    <input type="text" name="skincare[]" class="form-control"
                                        value="{{ $skincare }}">
                                    <button type="button" class="btn btn-sm btn-outline-danger btn-remove">&minus;</button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary btn-add-skincare">&plus;</button>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-5">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('page-script')
    <script>
        $(document).ready(function() {
            // Fungsi untuk menambahkan input Karakteristik
            $('.btn-add-karakteristik').click(function() {
                var newInputGroup = `<div class="input-group mb-2">
                                        <input type="text" name="karakteristik[]" class="form-control">
                                        <button type="button" class="btn btn-sm btn-outline-danger btn-remove">&minus;</button>
                                     </div>`;
                $('#karakteristik-container').append(newInputGroup);
            });

            // Fungsi untuk menambahkan input Skincare
            $('.btn-add-skincare').click(function() {
                var newInputGroup = `<div class="input-group mb-2">
                                        <input type="text" name="skincare[]" class="form-control">
                                        <button type="button" class="btn btn-sm btn-outline-danger btn-remove">&minus;</button>
                                     </div>`;
                $('#skincare-container').append(newInputGroup);
            });

            // Fungsi untuk menghapus input yang sudah ada
            $('.card-body').on('click', '.btn-remove', function() {
                $(this).closest('.input-group').remove();
            });
        });
    </script>
@endpush
