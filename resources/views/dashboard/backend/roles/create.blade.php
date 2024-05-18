@extends('dashboard.layouts.master')

@section('title')
  {{ __('models.add_role') }}
@endsection


@section('content')


<div class="col-xxl-12">
    <div class="card">

        <!-- start page title -->

          <x-content add_module="{{ __('models.add_role') }}" name_module="{{ __('models.roles') }}" route="{{ route('admin.roles.index') }}"/>


        <!-- end page title -->

        <div class="card-body">
            <div class="live-preview">

                <form class="row g-3 needs-validation" method="POST" action="{{ route('admin.roles.store') }}" enctype="multipart/form-data" novalidate>

                    @csrf


                    <x-forms label="{{ __('models.name') }}" name="name"/>


                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 50px;">

                                    </th>
                                    <th class="sort">{{ __('models.model') }}</th>
                                    <th class="sort">{{ __('models.permissions') }}</th></th>

                                </tr>
                            </thead>
                            <tbody class="list form-check-all">

                                @foreach (config('laratrust_seeder.roles_structure.owner') as $model=>$permissions)
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td>{{__('models.'. $model)}}</td>
                                        <td>
                                            <div class="permissions">


                                              @foreach (explode(',' ,$permissions) as $permission)


                                                  <input type="checkbox" value="{{$model}}-{{config('laratrust_seeder.permissions_map')[$permission]}}" name="permissions[]"  class="{{$model}}" >
                                                  <label>{{__('models.' . $permission)}}</label>

                                              @endforeach

                                            </div>
                                        </td>


                                    </tr>

                                @endforeach
                            </tbody>
                        </table>

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
