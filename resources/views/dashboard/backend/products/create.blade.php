@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.add_product') }}
@endsection



@section('content')

<x-content add_module="{{ __('models.add_product') }}" name_module="{{ __('models.products') }}" route="{{ route('admin.products.index') }}"/>


{{--  id="ckeditor-classic"  --}}
<form  class="row g-3 needs-validation" method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" novalidate>
    @csrf

      @php
          $product = '' ;
      @endphp


      @include('dashboard.backend.products._inputs')



</form>

@endsection


@section('js')
<script src="{{ asset('dashboard/assets/js/pages/form-input-spin.init.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/pages/flag-input.init.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/preview-image.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/preview-multi-image.js') }}"></script>
@include('dashboard.backend.products.js')

@endsection
