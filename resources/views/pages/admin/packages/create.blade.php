@extends('layouts.admin.admin_app', ['body_class' => ''])
@section('title', __('messages.add_package'))
@php
    if(isset($_COOKIE["time_zone"])){ $time_zone = getLocalTimeZone($_COOKIE["time_zone"]); } else {$time_zone = getLocalTimeZone(); }
@endphp
@push('breadcrumbs')
    <!--begin::Item-->
    <li class="breadcrumb-item text-muted"><a href="{{ route('admin.packages.index') }}" class="text-muted text-hover-primary">{{ __('messages.packages') }}</a></li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-400 w-5px h-2px"></span>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item active"><a href="" class="text-muted text-hover-primary">{{  __('messages.add_package') }}</a></li>
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
                                <h2>{{ __('messages.add_package') }}</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <form class="form" action="#" id="addPackageForm" enctype="multipart/form-data" method="POST">
                                <input type="hidden" name="time_zone" id="time_zone" value="Asia/Kuwait">
                                <!--begin::Modal body-->
                                <div class="modal-body py-10 px-lg-17">
                                        <!--begin::Input group-->
                                        <div class="row g-9 mb-7">
                                            <!--begin::Col-->
                                            <div class="col-md-5 fv-row fv-plugins-icon-container">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-semibold mb-2">{{ __('messages.package_title') }} ({{ __('messages.en') }})</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text"class="form-control" placeholder="{{ __('messages.package_title') }} ({{ __('messages.en') }})" name="title" dir="ltr">
                                                <!--end::Input-->
                                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-5 fv-row fv-plugins-icon-container">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-semibold mb-2">{{ __('messages.package_title') }} ({{ __('messages.ar') }})</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control" placeholder="{{ __('messages.package_title') }} ({{ __('messages.ar') }})" name="title_ar" dir="rtl">
                                                <!--end::Input-->
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-2 fv-row fv-plugins-icon-container">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-semibold mb-2">{{ __('messages.colour_palette') }}</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="color" class="form-control" name="colour" data-real-value="">
                                                <!--end::Input-->
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <!--end::Col-->

                                        </div>
                                        <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-7">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">{{ __('messages.package') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select" id="package" name="package" data-control="select2" data-placeholder="{{ __('messages.select_any') }}" data-allow-clear="true">
                                                <option></option>
                                                <option value="30">{{ __('messages.monthly') }}</option>
                                                <option value="90">{{ __('messages.quarterly') }}</option>
                                                <option value="180">{{ __('messages.half_yearly') }}</option>
                                                <option value="360">{{ __('messages.yearly') }}</option>
                                            </select>

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.package_price') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control" placeholder="{{ __('messages.package_price') }}" name="price">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="row g-9 mb-7">
                                        <!--begin::Col-->
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.features') }}</label>
                                            <!--end::Label-->
                                            <div class="form-check form-check-custom form-check-solid mb-5">
                                                <div class="row">
                                                    @foreach($features as $key => $feature)
                                                    <div class="col-md-4 mb-5">
                                                        <input class="form-check-input" type="checkbox" value="{{ $feature->id }}" name="features[]" id="feature_{{$key}}"/>
                                                        <label class="form-check-label" for="feature_{{$key}}">
                                                            {{ $feature->getTitle() }}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-7">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.image') }}</label> <br>
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url('{{ asset('assets/media/svg/files/blank-image.svg') }}')">
                                                <!--begin::Image preview wrapper-->
                                                <div class="image-input-wrapper w-125px h-125px"></div>
                                                <!--end::Image preview wrapper-->
                                                <!--begin::Edit button-->
                                                <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                       data-kt-image-input-action="change"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-dismiss="click"
                                                       title="{{__('messages.change')}}">
                                                    <i class="bi bi-pencil-fill fs-7"></i>

                                                    <!--begin::Inputs-->
                                                    <input type="file" name="image" accept="image/*" />
                                                    <input type="hidden" name="avatar_remove" />
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Edit button-->

                                                <!--begin::Cancel button-->
                                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                      data-kt-image-input-action="cancel"
                                                      data-bs-toggle="tooltip"
                                                      data-bs-dismiss="click"
                                                      title="{{__('messages.cancel')}}">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                <!--end::Cancel button-->

                                                <!--begin::Remove button-->
                                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                      data-kt-image-input-action="remove"
                                                      data-bs-toggle="tooltip"
                                                      data-bs-dismiss="click"
                                                      title="{{__('messages.remove')}}">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                                                <!--end::Remove button-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">{{ __('messages.status') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                                <input class="form-check-input" name="status" type="checkbox" checked value="1" id="status">
                                            </div>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Scroll-->
                                 </div>
                                <!--end::Modal body-->
                                <!--begin::Modal footer-->
                                <div class="modal-footer">
                                    <!--begin::Button-->
                                    <button type="submit" id="createButton" class="btn btn-primary">
                                        <span class="indicator-label">{{ __('messages.save') }}</span>
                                        <span class="indicator-progress">{{ __('messages.please_wait') }}
		                            	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Button-->
                                </div>
                                <!--end::Modal footer-->
                            </form>
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
    <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <!--end::Custom Javascript-->
    <script src="{{ asset('assets/js_tree/jstree.min.js') }}"></script>
    <script src="{{ asset('assets/js_tree/jstree.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/packages/create_packages.js') }}"></script>
@endpush
