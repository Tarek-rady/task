<div class="row">
    <div class="col-lg-12">
        {{-- cart name  --}}
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <x-forms label="{{ __('models.name_ar') }}" name="name_ar" :value="$product ? $product->name_ar : ''"/>
                    <x-forms label="{{ __('models.name_en') }}" name="name_en" :value="$product ? $product->name_en : ''"/>
                    <x-forms type="number" label="{{ __('models.qty') }}" name="qty" :value="$product ? $product->qty : ''" span="true"/>
                    <x-forms type="number" label="{{ __('models.price') }}" name="price" :value="$product ? $product->price : ''" span="true"/>

                </div>
            </div>
        </div>
        {{--  end card  --}}


        {{-- cart select  --}}
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <x-select label="{{ __('models.categories') }}" name="category_id" :options="$categories->pluck('name' , 'id')" :value="$product ? $product->category : '' "/>
                </div>
            </div>
        </div>
        {{--  end card  --}}



        {{--  card images  --}}
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Product Gallery</h5>
            </div>
            <div class="card-body">
                <x-image label="{{ __('img') }}" name="img" :value="$product ? $product->img : '' "/>

                {{--  images  --}}
                <x-images label="{{ __('img') }}" name="images" :value="$product ? $product->img : '' "/>

        </div>
        {{--  end card  --}}






        {{--  card product details  --}}
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                    <x-item active="true" id="product-desc" label="{{ __('models.desc') }}"/>
                    <x-item  id="product-sizes" label="{{ __('models.sizes') }}"/>
                    <x-item  id="product-colors" label="{{ __('models.colors') }}"/>


                </ul>
            </div>
            <!-- end card header -->


            <div class="card-body">
                <div class="tab-content">

                    <x-pane active="true" id="product-desc" num="1">
                        <x-textarea label="{{ __('models.desc_ar') }}" name="desc_ar" :value="$product ? $product->desc_ar : '' " />
                        <x-textarea label="{{ __('models.desc_en') }}" name="desc_en" :value="$product ? $product->desc_en : '' " />
                    </x-pane>


                    <x-pane  id="product-sizes" num="2">
                        <x-button label="{{ __('models.add_sizes') }}" name="size" color="danger">

                            @if (isset($product->sizes))
                                @foreach ( $product->sizes as $size)

                                <div class="delete-row col-lg-12 row">

                                        <x-forms col="4" main="main-value-size" label="{{ __('models.size_ar') }}" name="size_ar[]" :value="$size->size_ar"/>
                                        <x-forms col="4" main="main-value-size" label="{{ __('models.size_en') }}" name="size_en[]" :value="$size->size_en"/>
                                        <x-forms col="2" main="main-value-size" label="{{ __('models.code_size') }}" name="code_size[]"  :value="$size->code_size"/>

                                        <div class="col-md-2 col-12 mb-3 mt-4">
                                            <div>
                                                <button class="btn btn-danger delelte-item-size"><i class="mdi mdi-trash-can-outline"></i><button>
                                            </div>
                                        </div>
                                </div>

                                @endforeach

                            @endif



                        </x-button>
                    </x-pane>



                    <x-pane  id="product-colors" num="3">
                        <x-button label="{{ __('models.add_colors') }}" name="color" color="primary">

                            @if (isset($product->colors))
                                @foreach ( $product->colors as $color)

                                <div class="delete-row col-lg-12 row">

                                        <x-forms col="4" main="main-value-color" label="{{ __('models.color_ar') }}" name="color_ar[]" :value="$color->color_ar"/>
                                        <x-forms col="4" main="main-value-color" label="{{ __('models.color_en') }}" name="color_en[]" :value="$color->color_en"/>
                                        <x-forms col="2" main="main-value-color" label="{{ __('models.code_color') }}" name="code_color[]"  :value="$color->code_color"/>

                                        <div class="col-md-2 col-12 mb-3 mt-4">
                                            <div>
                                                <button class="btn btn-danger delelte-item-color"><i class="mdi mdi-trash-can-outline"></i><button>
                                            </div>
                                        </div>
                                </div>

                                @endforeach

                            @endif



                        </x-button>


                    </x-pane>












                </div>






                    <!-- end tab pane -->
                </div>
                <!-- end tab content -->
            </div>
            <!-- end card body -->
        </div>
        {{--  end card  --}}
        <div class="text-end mb-3">
            <button type="submit" class="btn btn-success w-sm">Submit</button>
        </div>
    </div>
    <!-- end col -->


    <!-- end col -->
</div>
<!-- end row -->
