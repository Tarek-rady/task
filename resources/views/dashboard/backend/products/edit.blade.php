@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.edit_product') }}
@endsection



@section('content')

<x-content add_module="{{ __('models.edit_product') }}" name_module="{{ __('models.products') }}" route="{{ route('admin.products.index') }}"/>


{{--  id="ckeditor-classic"  --}}
<form  class="row g-3 needs-validation" method="POST" action="{{ route('admin.products.update' , $product->id) }}" enctype="multipart/form-data" novalidate>
    @method('PUT')
    @csrf
      @include('dashboard.backend.products._inputs')

</form>

@endsection


@section('js')
<script src="{{ asset('dashboard/assets/js/preview-image.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/preview-multi-image.js') }}"></script>
@include('dashboard.backend.products.js')

@endsection
