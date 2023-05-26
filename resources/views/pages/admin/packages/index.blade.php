@extends('layouts.admin.admin_app', ['body_class' => ''])
@section('title', __('messages.packages'))
@php
    if(isset($_COOKIE["time_zone"])){ $time_zone = getLocalTimeZone($_COOKIE["time_zone"]); } else {$time_zone = getLocalTimeZone(); }
@endphp
@push('breadcrumbs')
    <!--begin::Item-->
    <li class="breadcrumb-item active"><a href="" class="text-muted text-hover-primary">{{  __('messages.packages') }}</a></li>
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
                            <h2>{{ __('messages.package_lists') }}</h2>
                        </div>
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <a class="btn btn-icon btn-active-light-primary w-30px h-30px"  href="{{ route('admin.packages.create') }}" >
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                    <span class="svg-icon svg-icon-3">
                                      <i class="bi bi-plus-square text-success fs-1"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="row g-10">
                            @foreach($packages as $package)
                            <!--begin::Col-->
                            <div class="col-xl-4">
                                <div class="d-flex h-100 align-items-center">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                                        <!--begin::Heading-->
                                        <div class="mb-7 text-center">
                                            <img src="{{ asset('storage/uploads/packages/thumb/'.$package->image) }}" class="h-100px w-100px"> <br>
                                            <!--begin::Title-->
                                            <h1 class="text-dark mb-5 fw-bolder mt-10">{{ $package->getTitle() }}</h1>
                                            <!--end::Title-->
                                            <!--begin::Price-->
                                            <div class="text-center">
                                                <span class="mb-2" style="color: {{ $package->colour }}">{{ __('messages.kwd') }}</span>
                                                <span class="fs-3x fw-bold" style="color: {{ $package->colour }}" data-kt-plan-price-month="{{ $package->price }}">{{ $package->price }}</span>
                                                <span class="fs-7 fw-semibold opacity-50">/
												<span data-kt-element="period">{{ $package->package }}</span></span>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Features-->
                                        <div class="w-100 mb-10">
                                        @php
                                        $assigned_future_ids = $package->features()->pluck('features.id')->toArray();
                                        @endphp
                                        @foreach($features as $key => $feature)
                                            @if(in_array($feature->id, $assigned_future_ids))
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-5">
                                                <span class="fw-semibold fs-6 text-gray-800 flex-grow-1">{{ $feature->getTitle() }}</span>
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-success">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
																				<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor"></path>
																			</svg>
																		</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Item-->
                                            @else
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-5">
                                                    <span class="fw-semibold fs-6 text-gray-400 flex-grow-1">{{ $feature->getTitle() }}</span>
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                                    <span class="svg-icon svg-icon-1">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
																				<rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor"></rect>
																				<rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor"></rect>
																			</svg>
																		</span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Item-->
                                                @endif
                                            @endforeach
                                        </div>
                                        <!--end::Features-->
                                        <div class="d-flex flex-center">
                                        <a class="btn btn-icon btn-active-light-primary w-30px h-30px" href="{{ route('admin.packages.edit', $package->id) }}">
                                        <span class="svg-icon svg-icon-3">
                                         <i class="bi bi-pencil-square text-warning fs-1"></i>
		                                </span>
                                            </a><button class="btn btn-icon btn-active-light-primary w-30px h-30px" onclick="deletePackage({{ $package->id }})">
                                        <span class="svg-icon svg-icon-3">
                                         <i class="bi bi-trash-fill text-danger fs-1"></i>
		                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <!--end::Option-->

                                </div>
                            </div>
                            <!--end::Col-->
                            @endforeach
                        </div>
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
    <script src="{{ asset('assets/js/admin/packages/packages.js') }}"></script>

@endpush
