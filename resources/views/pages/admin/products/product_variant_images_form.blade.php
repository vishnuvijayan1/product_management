<div class="overflow-auto pb-5">
    <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
    @foreach($product_variant_images as $product_variant_image)
        <!--begin::Item-->
            <div class="overlay me-10">
                <!--begin::Image-->
                <div class="overlay-wrapper">
                    <img alt="img" class="rounded w-150px" src="{{ asset('storage/uploads/product_variant_images/thumb/'.$product_variant_image->image) }}">
                </div>
                <!--end::Image-->
                <!--begin::Link-->
                <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                    @if($product_variant_images->count() == 1)
                        <a class="btn btn-icon btn-active-light-primary w-30px h-30px bg-white m-2">
                            <span class="svg-icon svg-icon-3">
                             <i class="bi bi-lock-fill text-danger fs-1"></i>
                            </span>
                        </a>
                    @else
                        <a class="btn btn-icon btn-active-light-primary w-30px h-30px bg-white m-2 tooltip_class" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('messages.delete') }}" onclick="deleteProductVariantImage({{ $product_variant_image->id }})">
                            <span class="svg-icon svg-icon-3">
                             <i class="bi bi-trash-fill text-danger fs-1"></i>
                            </span>
                        </a>
                    @endif
                    @if($product_variant_image->is_default)
                        <a class="btn btn-icon btn-active-light-primary w-30px h-30px bg-white m-2 tooltip_class">
                        <span class="svg-icon svg-icon-3">
                         <i class="bi bi-pin-angle-fill text-success fs-1"></i>
                        </span>
                        </a>
                    @else
                        <a class="btn btn-icon btn-active-light-primary w-30px h-30px bg-white m-2 tooltip_class" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('messages.make_default') }}" onclick="makeDefaultProductVariantImage({{ $product_variant_image->id }})">
                            <span class="svg-icon svg-icon-3">
                             <i class="bi bi-pin-angle-fill text-warning fs-1"></i>
                            </span>
                        </a>
                    @endif
                </div>
                <!--end::Link-->
            </div>
            <!--end::Item-->
        @endforeach
    </div>
</div>
