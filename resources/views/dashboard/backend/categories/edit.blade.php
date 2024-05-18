@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.edit_category') }}
@endsection


@section('content')


<div class="col-xxl-12">
    <div class="card">

        <x-content add_module="{{ __('models.add_category') }}" name_module="{{ __('models.categories') }}" route="{{ route('admin.categories.index') }}"/>


        <div class="card-body">
            <div class="live-preview">

                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.categories.update' , $category->id) }}" enctype="multipart/form-data" novalidate>
                    @method('PUT')
                    @csrf
                    @include('dashboard.backend.categories._inputs')

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">{{ __('models.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
</div>



@endsection


@section('js')
<script src="{{ asset('dashboard/assets/js/preview-image.js') }}"></script>

@endsection
