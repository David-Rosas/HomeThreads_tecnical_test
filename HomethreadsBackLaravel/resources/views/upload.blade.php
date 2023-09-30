@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload Excel File') }}</div>

                <div class="card-body">
                    <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                        @csrf
                        <div class="form-group">
                            <label for="excelFile">{{ __('Choose Excel File') }}</label>
                            <input type="file" class="form-control-file @error('excel_file') is-invalid @enderror" name="excel_file" id="excelFile" required>
                            @error('excel_file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary" id="uploadButton">
                                {{ __('Upload and Save') }}
                                <span class="spinner-border spinner-border-sm text-light ml-2 d-none" role="status" aria-hidden="true" id="loader"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('uploadForm').addEventListener('submit', function () {
        document.getElementById('uploadButton').setAttribute('disabled', 'disabled');
        document.getElementById('loader').classList.remove('d-none');
    });
</script>

@endsection
