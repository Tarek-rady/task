@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.home') }}
@endsection


@section('content')


<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-16 mb-1">{{ __('models.good_morning') }}, {{ auth('admin')->user()->name }}!</h4>
                            <p class="text-muted mb-0">{{ __('models.happening') }}.</p>
                        </div>

                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">



                <x-statics label="{{ __('models.roles') }}" color="primary" :value="$roles" route="{{ route('admin.roles.index') }}"/>
                <x-statics label="{{ __('models.admins') }}" color="success" :value="$admins" route="{{ route('admin.admins.index') }}"/>
                <x-statics label="{{ __('models.users') }}"   color="danger" :value="$users" route="{{ route('admin.users.index') }}"/>
                <x-statics label="{{ __('models.categories') }}" color="primary" :value="$categories" route="{{ route('admin.categories.index') }}"/>
                <x-statics label="{{ __('models.products') }}" color="primary" :value="$products" route="{{ route('admin.products.index') }}"/>
                <x-statics label="{{ __('models.orders') }}" color="primary" :value="$orders" route="{{ route('admin.orders.index') }}"/>








            </div> <!-- end row-->








        </div>

    </div> <!-- end col -->


</div>


@endsection
