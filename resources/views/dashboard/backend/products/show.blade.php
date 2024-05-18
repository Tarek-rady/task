@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.product_details') }}
@endsection

@section('css')

<!--Swiper slider css-->
<link href="{{ asset('dashboard/assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Layout config Js -->
@endsection

@section('content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ __('models.product_details') }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">{{ __('models.products') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('models.product_details') }}</li>
                </ol>
            </div>

        </div>
    </div>
</div>




<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row gx-lg-5">

                    <div class="col-xl-4 col-md-8 mx-auto">
                        <div class="product-img-slider sticky-side-div">
                            <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                {{--  images  --}}
                                <div class="swiper-wrapper">
                                    @if (isset($product->images))

                                        @foreach ( $product->images as $product_img)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/' . $product_img->img)}}" alt="" class="img-fluid d-block" />
                                            </div>

                                        @endforeach

                                    @endif


                                </div>

                                <div class="swiper-button-next bg-white shadow"></div>
                                <div class="swiper-button-prev bg-white shadow"></div>
                            </div>


                            <!-- end swiper thumbnail slide -->
                            {{--  images  --}}
                            <div class="swiper product-nav-slider mt-2">
                                <div class="swiper-wrapper">

                                    @if (isset($product->images))
                                        @foreach ( $product->images as $product_img)

                                            <div class="swiper-slide">
                                                <div class="nav-slide-item">
                                                    <img src="{{ asset('storage/' . $product_img->img)}}" alt="" class="img-fluid d-block" />
                                                </div>
                                            </div>

                                        @endforeach

                                    @endif

                                </div>
                            </div>
                            <!-- end swiper nav slide -->
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-8">
                        <div class="mt-xl-0 mt-5">

                            {{--  product  --}}
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h4>{{ $product->name }}</h4>
                                    <div class="hstack gap-3 flex-wrap">

                                        <div class="text-muted">{{ __('models.categories') }} : <span class="text-body fw-medium">{{ $product->category->name }}</span></div>
                                        <div class="vr"></div>

                                        <div class="vr"></div>
                                        <div class="text-muted">{{ __('models.price') }} : <span class="text-body fw-medium">{{ $product->price }}</span></div>
                                        <div class="vr"></div>

                                        <div class="vr"></div>
                                        <div class="text-muted">{{ __('models.qty') }} : <span class="text-body fw-medium">{{ $product->qty }}</span></div>
                                        <div class="vr"></div>

                                        <div class="vr"></div>
                                        <div class="text-muted">{{ __('models.viewer') }} : <span class="text-body fw-medium">{{ $product->viewer }}</span></div>
                                        <div class="vr"></div>

                                    </div>
                                </div>

                            </div>




                            {{--  product details  --}}
                            <div class="row mt-4">

                                <div class="col-lg-4 col-sm-6">
                                    <div class="p-2 border border-dashed rounded">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                    <i class="ri-money-dollar-circle-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1">{{ __('models.price') }} :</p>
                                                <h5 class="mb-0">${{ $product->price }}</h5>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6">
                                    <div class="p-2 border border-dashed rounded">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                    <i class="ri-money-dollar-circle-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1">{{ __('models.qty') }} :</p>
                                                <h5 class="mb-0">${{ $product->qty }}</h5>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="p-2 border border-dashed rounded">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                    <i class="ri-file-copy-2-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="text-muted mb-1"> {{ __('models.viewer') }} :</p>
                                                <h5 class="mb-0">{{ $product->viewer }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            {{--  size , colors  --}}
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="mt-4">
                                        <h5 class="fs-14">{{ __('models.sizes') }} :</h5>
                                        <div class="d-flex flex-wrap gap-2">
                                            @if (isset($product->sizes))

                                              @foreach ($product->sizes as $size)


                                              <button type="button" class="btn btn-primary waves-effect waves-light">{{ $size->size }}</button>
                                              <button type="button" class="btn btn-success waves-effect waves-light">{{ $size->code_size }}</button>




                                              @endforeach

                                            @endif


                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-xl-12">
                                    <div class=" mt-4">
                                        <h5 class="fs-14">{{ __('models.colors') }} :</h5>
                                        <div class="d-flex flex-wrap gap-2">
                                            @if (isset($product->colors))

                                                @foreach ( $product->colors as $color)
                                                   <button type="button" class="btn btn-primary waves-effect waves-light">{{ $color->color }}</button>
                                                   <button type="button" class="btn btn-success waves-effect waves-light">{{ $color->code_color }}</button><br>

                                                @endforeach

                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->


                            {{--  desc  --}}
                            <div class="mt-4 text-muted">
                                <h5 class="fs-14">{{ __('models.desc') }} :</h5>
                                <p>{{ $product->desc }}.</p>
                            </div>




                            <div class="product-content mt-5">
                                <h5 class="fs-14 mb-3">{{ __('models.product_details') }} :</h5>
                                <nav>
                                    <ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="nav-speci-tab" data-bs-toggle="tab" href="#nav-speci" role="tab" aria-controls="nav-speci" aria-selected="true">{{ __('models.product_details') }}</a>
                                        </li>

                                    </ul>
                                </nav>
                                <div class="tab-content border border-top-0 p-4" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-speci" role="tabpanel" aria-labelledby="nav-speci-tab">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" style="width: 200px;">{{ __('models.categories') }}</th>
                                                        <td>{{ $product->category->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">{{ __('models.price') }}</th>
                                                        <td>{{ $product->price }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">{{ __('models.qty') }}</th>
                                                        <td>{{ $product->qty }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">{{ __('models.viewer') }}</th>
                                                        <td>{{ $product->viewer }}</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>










                        </div>
                    </div>


                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end card body -->
        </div>

        
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->


@endsection


@section('js')
<!--Swiper slider js-->
<script src="{{ asset('dashboard/assets/libs/swiper/swiper-bundle.min.js')}}"></script>

<!-- ecommerce product details init -->
<script src="{{ asset('dashboard/assets/js/pages/ecommerce-product-details.init.js')}}"></script>
@endsection
