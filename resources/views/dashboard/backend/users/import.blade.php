@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.import') }}
@endsection


@section('content')


<div class="col-xxl-12">
    <div class="card">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('models.import') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">{{ __('models.users') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('models.import') }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card-body">
            <div class="live-preview">

                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.import-users') }}" enctype="multipart/form-data" novalidate>

                    @csrf


                    <div class="col-md-6 col-12 mb-3">
                        <label for="formFile" class="form-label">{{ __('models.import') }}</label>
                        <input class="form-control image" type="file" id="formFile"
                            name="file" required>

                        @error('file')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">{{ __('models.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
</div>



@endsection


@section('js')

@endsection
