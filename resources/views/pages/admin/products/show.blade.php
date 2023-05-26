@extends('layouts.admin.admin_app', ['body_class' => ''])
@section('title', __('messages.view_product'))
@php
    if(isset($_COOKIE["time_zone"])){ $time_zone = getLocalTimeZone($_COOKIE["time_zone"]); } else {$time_zone = getLocalTimeZone(); }
@endphp
@push('breadcrumbs')
    <!--begin::Item-->
    <li class="breadcrumb-item text-muted"><a href="{{ route('admin.products.index') }}" class="text-muted text-hover-primary">{{ __('messages.products') }}</a></li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-400 w-5px h-2px"></span>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item active"><a href="" class="text-muted text-hover-primary">{{  __('messages.view_product') }}</a></li>
    <!--end::Item-->
@endpush
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-md-5 mb-xl-10">
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{ __('messages.view_product') }} => {{ $product->getProductName() }}</h2>
                            </div>
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                                <a class="btn btn-icon btn-active-light-primary w-30px h-30px"  href="{{ route('admin.products.index') }}" >
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                    <span class="svg-icon svg-icon-3">
                                      <i class="bi bi-list-stars text-success fs-1"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <table class="table table-row-bordered gy-5">
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>#</td>
                                    <td>{{ $product_variant->id }}</td>
                                </tr>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>{{ __('messages.sale_type') }}</td>
                                    <td>
                                        @if($product->sale_type =='Sale')
                                            <span class="badge badge-info fw-bold px-4 py-3">{{ __('messages.sale') }}</span>
                                        @elseif($product->sale_type =='Auction')
                                            <span class="badge badge-primary fw-bold px-4 py-3">{{ __('messages.auction') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>{{ __('messages.product_name') }} ({{ __('messages.en') }})</td>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>{{ __('messages.product_name') }} ({{ __('messages.ar') }})</td>
                                    <td>{{ $product->name_ar }}</td>
                                </tr>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>{{ __('messages.categories') }}</td>
                                    <td>{{ $product->category_list }}</td>
                                </tr>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>{{ __('messages.attributes') }}</td>
                                    <td>{!! $product_variant->getAttributeValuePair() !!}</td>
                                </tr>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>{{ __('messages.boutique') }}</td>
                                    <td>{{ $product->boutique->getName() }}</td>
                                </tr>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>{{ __('messages.vendor') }}</td>
                                    <td>{{ $product->vendor->first_name }} {{ $product->vendor->last_name }}</td>
                                </tr>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>{{ __('messages.product_type') }}</td>
                                    <td>{{ $product->type }}</td>
                                </tr>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>{{ __('messages.sale_type') }}</td>
                                    <td>Sale</td>
                                </tr>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>{{ __('messages.quantity') }}</td>
                                    <td>{{ $product_variant->quantity }}</td>
                                </tr>
                                @if($product->sale_type == 'Sale')
                                    <tr class="fw-semibold fs-6 text-muted">
                                        <td>{{ __('messages.product_regular_price') }}</td>
                                        <td>{{ $product_variant->regular_price }} {{ __('messages.kwd') }}</td>
                                    </tr>
                                    <tr class="fw-semibold fs-6 text-muted">
                                        <td>{{ __('messages.product_final_price') }}</td>
                                        <td>{{ $product_variant->final_price }} {{ __('messages.kwd') }}</td>
                                    </tr>
                                @elseif($product->sale_type == 'Auction')
                                    <tr class="fw-semibold fs-6 text-muted">
                                        <td>{{ __('messages.bid_start_price') }}</td>
                                        <td>{{ $product_variant->bid_start_price }} {{ __('messages.kwd') }}</td>
                                    </tr>
                                    <tr class="fw-semibold fs-6 text-muted">
                                        <td>{{ __('messages.bid_value') }}</td>
                                        <td>{{ $product_variant->bid_value }}</td>
                                    </tr>
                                    <tr class="fw-semibold fs-6 text-muted">
                                        <td>{{ __('messages.estimate_start_price') }}</td>
                                        <td>{{ $product_variant->estimate_start_price }} {{ __('messages.kwd') }}</td>
                                    </tr>
                                    <tr class="fw-semibold fs-6 text-muted">
                                        <td>{{ __('messages.estimate_end_price') }}</td>
                                        <td>{{ $product_variant->estimate_end_price }} {{ __('messages.kwd') }}</td>
                                    </tr>
                                @endif
                                @if($product->vendor->beiaat_handled)
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>{{ __('messages.cost') }} ({{ __('messages.beiaat_handled') }})</td>
                                    <td>{{ $product_variant->cost }} {{ __('messages.kwd') }}</td>
                                </tr>
                                @endif
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>{{ __('messages.product_description') }} ({{ __('messages.en') }})</td>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>{{ __('messages.product_description') }} ({{ __('messages.ar') }})</td>
                                    <td>{{ $product->description_ar }}</td>
                                </tr>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>{{ __('messages.new_arrival_duration') }}</td>
                                    <td>@if($product->new_arrival_start_time && $product->new_arrival_end_time) {{ getReadableLocalTimeFromUtc($product->new_arrival_start_time, $time_zone) }} ~ {{ getReadableLocalTimeFromUtc($product->new_arrival_end_time, $time_zone) }} @endif</td>
                                </tr>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>{{ __('messages.status') }}</td>
                                    <td>
                                        @if($product_variant->status)
                                            <span class="badge badge-success fw-bold px-4 py-3">{{ __('messages.active') }}</span>
                                        @else
                                            <span class="badge badge-danger fw-bold px-4 py-3">{{ __('messages.inactive') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>{{ __('messages.most_selling_product') }}</td>
                                    <td>
                                        @if($product->most_selling_product)
                                            <span class="badge badge-success fw-bold px-4 py-3">{{ __('messages.active') }}</span>
                                        @else
                                            <span class="badge badge-danger fw-bold px-4 py-3">{{ __('messages.inactive') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <td>{{ __('messages.image') }}</td>
                                    <td>
                                        <div class="overflow-auto pb-5">
                                            <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
                                            @foreach($product_variant->images as $product_variant_image)
                                                <!--begin::Item-->
                                                    <div class="overlay me-10">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-150px" src="{{ asset('storage/uploads/product_variant_images/thumb/'.$product_variant_image->image) }}">
                                                        </div>
                                                        <!--end::Image-->
                                                    </div>
                                                    <!--end::Item-->
                                                @endforeach
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
            </div>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection
@push('head-scripts')
    <link rel="stylesheet" href="{{ asset('assets/js_tree/jstree_style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" />
@endpush
@push('footer-scripts')
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Custom Javascript-->
    <script src="{{ asset('assets/js_tree/jstree.min.js') }}"></script>
    <script src="{{ asset('assets/js_tree/jstree.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/products/products.js') }}"></script>
@endpush
