
@props([
     'label' , 'value' , 'color' , 'route' => '' 
])




<div class="col-xl-4 col-md-6">
    <!-- card -->
    <div class="card card-animate">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 overflow-hidden">
                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> {{ $label }}</p>
                </div>

            </div>
            <div class="d-flex align-items-end justify-content-between mt-4">
                <div>
                    <h4 class="fs-22 fw-semibold ff-{{ $color }} mb-4"><span class="counter-value" data-target="{{ $value }}">0</span></h4>
                    <a href="$route" class="text-decoration-underline">{{ $label }}</a>
                </div>
                <div class="avatar-sm flex-shrink-0">
                    <span class="avatar-title bg-info rounded fs-3">
                        <i class=" bx bx-registered"></i>
                    </span>
                </div>
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->
</div>
