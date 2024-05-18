@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.add_admin') }}
@endsection


@section('content')


<div class="col-xxl-12">
    <div class="card">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ __('models.add_admin') }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.admins.index') }}">{{ __('models.admins') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('models.add_admin') }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card-body">
            <div class="live-preview">

                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.admins.store') }}" enctype="multipart/form-data" novalidate>

                    @csrf

                    {{--  name  --}}
                    <div class="col-md-6">
                        <label for="name" class="form-label">{{ __('models.name') }}</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" aria-describedby="inputGroupPrepend"
                                required>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>

                    {{--  email  --}}
                    <div class="col-md-6">
                        <label for="email" class="form-label">{{ __('models.email') }}</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('email')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    {{--  password  --}}
                    <div class="col-md-6">
                        <label for="password" class="form-label">{{ __('models.password') }}</label>
                        <input type="password" class="form-control" name="password"  id="password"  required>
                         <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('password')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    {{--  role_id  --}}
                    <div class="col-md-6">
                        <label for="role_id" class="form-label text-muted">{{ __('models.roles') }}</label>
                        <select class="form-control js-example-basic-multiple" name="role_id" data-choices name="role_id" id="role_id">
                            <option value="" disabled>{{ __('models.roles') }}</option>
                            @foreach ($roles as $role)
                             <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach

                        </select>
                    </div>









                    <div class="col-md-6 col-12 mb-3">
                        <label for="formFile" class="form-label">{{ __('models.img') }}</label>
                        <input class="form-control image" type="file" id="formFile"
                            name="img" required>

                        @error('img')
                            <span class="text-danger">
                                <small class="errorTxt">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group prev">
                        <img src="" style="width: 100px" class="img-thumbnail preview-formFile" alt="">
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
<script src="{{ asset('dashboard/assets/js/preview-image.js') }}"></script>

@endsection
