@props([

    'add_module' , 'name_module' , 'route'
])




<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ $add_module }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="$route">{{ $name_module }}</a></li>
                    <li class="breadcrumb-item active">{{ $add_module }}</li>
                </ol>
            </div>

        </div>
    </div>
</div>
