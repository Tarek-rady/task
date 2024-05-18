@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.add_admin') }}
@endsection


@section('content')


<div class="col-xxl-12">
    <div class="card">

        <x-content add_module="{{ __('models.add_admin') }}" name_module="{{ __('models.admins') }}" route="{{ route('admin.admins.index') }}"/>

        <div class="card-body">
            <div class="live-preview">

                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.admins.store') }}" enctype="multipart/form-data" novalidate>

                    @csrf

                    @php
                        $admin = '' ;
                    @endphp

                     @include('dashboard.backend.admins._inputs')

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
