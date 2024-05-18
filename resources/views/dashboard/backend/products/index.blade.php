@extends('dashboard.layouts.master')

@section('title')
   {{ __('models.products') }}
@endsection


@section('content')
<div class="loader-overlay" id="loader-overlay">
    <div class="loader"></div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
             <div class="card-header card-add-edit">
                <h4 class="card-title mb-0">{{ __('models.Add,edit') }}</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">


                        <x-permission name="products-create">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('admin.products.create') }}" class="btn btn-success add-btn" ><i class="ri-add-line align-bottom me-1"></i>{{ __('models.add_product') }}</a>
                                </div>
                            </div>
                        </x-permission>



                            @php
                                $product = '' ;
                            @endphp

                            <x-select col="4" name="category_id" label="{{ __('models.categories') }}" :options="$categories->pluck('name' , 'id')" type="true"/>

                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="products_table">
                            <thead class="table-light">
                                <tr>

                                    <th class="sort">{{ __('models.products') }}</th>
                                    <th class="sort">{{ __('models.img') }}</th>
                                    <th class="sort">{{ __('models.categories') }}</th>
                                    <th class="sort">{{ __('models.price') }}</th>
                                    <th class="sort">{{ __('models.qty') }}</th>
                                    <th class="sort">{{ __('models.viewer') }}</th>
                                    <th class="sort" >{{ __('models.action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">


                            </tbody>
                        </table>






                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection

@section('js')


    <script>

        $(document).ready(function() {


            var table = $('#products_table').DataTable({
                processing     : true,
                serverSide     : true ,
                ordering       : true ,
                iDisplayLength : 10 ,
                lengthMenu     : [
                        [10 , 50 , 100 ,  -1] ,
                        [10 , 50 , 100 ,  'All'] ,
                ] ,
                ajax: "{{ route('admin.get-products') }}",
                columns: [


                    {
                        data : 'name_ar' ,

                    } ,

                    {
                        data: 'img',
                        render: function (data, type, full, meta) {
                            return '<img src="' + '{{ asset("storage/") }}' + '/' + data + '" alt="Image" class="me-3 rounded-circle avatar-md p-2 bg-light" >';
                        } ,
                        searchable: false,
                    },

                    {
                        data : 'category' ,
                        render: function (data, type, full, meta) {
                            return '<span class="badge bg-primary">' + data +'</span>' ;
                        },
                    } ,

                    {
                        data : 'price' ,
                        render: function (data, type, full, meta) {
                            return  data;
                        },
                    } ,

                    {
                        data : 'qty' ,
                        render: function (data, type, full, meta) {
                            return  data ;
                        },
                    } ,

                    {
                        data : 'viewer' ,
                        render: function (data, type, full, meta) {
                            return  data  ;
                        },
                    } ,



                    {
                        data : 'action' ,
                        searchable: false,
                    } ,






                ]
            });




            $('#category_id').change(function(){
                table.column(2).search($(this).val()).draw();
            });

        });



    </script>


@endsection
