@extends('layouts.admin')

@section('page_title', 'Tambah Skin Category')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Form data</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.category.store') }}" method="POST">
                @csrf
                <div class="row row-gap-3">
                    <div class="col-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="tipe" class="form-label">Tipe</label>
                        <textarea name="tipe" id="tipe" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="penyebab" class="form-label">Penyebab</label>
                        <textarea name="penyebab" id="penyebab" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="karakteristik" class="form-label">Karakteristik</label>
                        <div class="d-flex flex-column row-gap-2">
                            <div class="input-group">
                                <input type="text" name="karakteristik[]" id="karakteristik" class="form-control">
                                <button type="button" class="btn btn-outline-primary btn-add">&plus;</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="skincare" class="form-label">Kandungan Skincare</label>
                        <div class="d-flex flex-column row-gap-2">
                            <div class="input-group">
                                <input type="text" name="skincare[]" id="skincare" class="form-control">
                                <button type="button" class="btn btn-outline-primary btn-add">&plus;</button>
                            </div>
                        </div>
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
            // Event listener for adding new input fields
            $(document).on('click', '.btn-add', function() {
                var inputGroup = $(this).closest('.input-group');
                var newInputGroup = inputGroup.clone(); // Clone the current input group

                // Clear the value of the input
                newInputGroup.find('input').val('');

                // Change the plus button to a minus button
                newInputGroup.find('.btn-add')
                    .removeClass('btn-outline-primary btn-add')
                    .addClass('btn-outline-danger btn-remove')
                    .html('&minus;');

                // Insert the new input group before the button
                inputGroup.after(newInputGroup);
            });

            // Event listener for removing input fields
            $(document).on('click', '.btn-remove', function() {
                $(this).closest('.input-group').remove(); // Remove the current input group
            });
        });
    </script>
@endpush
