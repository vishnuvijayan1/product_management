@extends('layouts.admin.admin_app', ['body_class' => ''])
@section('title', __('messages.view_app_banner'))
@php
    if(isset($_COOKIE["time_zone"])){ $time_zone = getLocalTimeZone($_COOKIE["time_zone"]); } else {$time_zone = getLocalTimeZone(); }
@endphp
@push('breadcrumbs')
    <!--begin::Item-->
    <li class="breadcrumb-item text-muted"><a href="{{ route('admin.app_banners.index') }}" class="text-muted text-hover-primary">{{ __('messages.app_banners') }}</a></li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-400 w-5px h-2px"></span>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item active"><a href="" class="text-muted text-hover-primary">{{  __('messages.view_app_banner') }}</a></li>
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
                            <h2>{{ __('messages.view_app_banner') }}</h2>
                        </div>
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                                <a class="btn btn-icon btn-active-light-primary w-30px h-30px"  href="{{ route('admin.app_banners.index') }}" >
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
                                <td>{{ $app_banner->id }}</td>
                            </tr>
                            <tr class="fw-semibold fs-6 text-muted">
                                <td>{{ __('messages.app_banner_title') }} ({{ __('messages.en') }})</td>
                                <td>{{ $app_banner->title }}</td>
                            </tr>
                            <tr class="fw-semibold fs-6 text-muted">
                                <td>{{ __('messages.app_banner_title') }} ({{ __('messages.ar') }})</td>
                                <td>{{ $app_banner->title_ar }}</td>
                            </tr>
                            <tr class="fw-semibold fs-6 text-muted">
                                <td>{{ __('messages.duration') }}</td>
                                <td>@if($app_banner->start_time && $app_banner->end_time) {{ getReadableLocalTimeFromUtc($app_banner->start_time, $time_zone) }} ~ {{ getReadableLocalTimeFromUtc($app_banner->end_time, $time_zone) }} @endif</td>
                            </tr>
                            <tr class="fw-semibold fs-6 text-muted">
                                <td>{{ __('messages.status') }}</td>
                                <td>
                                    @if($app_banner->status)
                                    <span class="badge badge-success fw-bold px-4 py-3">{{ __('messages.active') }}</span>
                                    @else
                                    <span class="badge badge-danger fw-bold px-4 py-3">{{ __('messages.inactive') }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr class="fw-semibold fs-6 text-muted">
                                <td>{{ __('messages.image') }}  ({{ __('messages.en') }})</td>
                                <td>
                                   <img src="{{ asset('storage/uploads/app_banners/original/'.$app_banner->image) }}" class="img-fluid">
                                </td>
                            </tr>
                            <tr class="fw-semibold fs-6 text-muted">
                                <td>{{ __('messages.image') }}  ({{ __('messages.ar') }})</td>
                                <td>
                                    <img src="{{ asset('storage/uploads/app_banners/original/'.$app_banner->image_ar) }}" class="img-fluid">
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
    <script src="{{ asset('assets/js/admin/app_banners/app_banners.js') }}"></script>
@endpush
