@extends('layouts.admin.admin_app', ['body_class' => ''])
@section('title', __('messages.add_user_boutique'))
@php
    if(isset($_COOKIE["time_zone"])){ $time_zone = getLocalTimeZone($_COOKIE["time_zone"]); } else {$time_zone = getLocalTimeZone(); }
@endphp
@push('breadcrumbs')
    <!--begin::Item-->
    <li class="breadcrumb-item text-muted"><a href="{{ route('admin.user_boutiques.index') }}" class="text-muted text-hover-primary">{{ __('messages.user_boutiques') }}</a></li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-400 w-5px h-2px"></span>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item active"><a href="" class="text-muted text-hover-primary">{{  __('messages.add_user_boutique') }}</a></li>
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
                                <h2>{{ __('messages.add_user_boutique') }}</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <form class="form" action="#" id="addUserBoutiqueForm" enctype="multipart/form-data" method="POST">
                                <!--begin::Modal body-->
                                <div class="modal-body py-10 px-lg-17">
                                    <div class="row g-9 mb-7">
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.vendor') }} / {{ __('messages.user') }}   </label>
                                            <!--end::Label-->
                                            <select class="form-select" id="vendorOrUser" name="vendor_or_user" data-control="select2" data-placeholder="{{ __('messages.select_any') }}">
                                                <option></option>
                                                @foreach($vendors as $vendor)
                                                <option value="{{ $vendor->id }}">{{ $vendor->first_name }} {{ $vendor->last_name }} || {{ $vendor->getUserType() }}</option>
                                                 @endforeach
                                            </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="row g-9 mb-7">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.user_boutique_name') }} ({{ __('messages.en') }})</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text"class="form-control" placeholder="{{ __('messages.user_boutique_name') }} ({{ __('messages.en') }})" name="name" dir="ltr">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.user_boutique_name') }} ({{ __('messages.ar') }})</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control" placeholder="{{ __('messages.user_boutique_name') }} ({{ __('messages.ar') }})" name="name_ar" dir="rtl">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <div class="row g-9 mb-7">
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.delivery_handle') }}</label>
                                            <!--end::Label-->
                                            <select class="form-select" id="deliveryHandle" name="delivery_handle" data-control="select2" data-placeholder="{{ __('messages.select_any') }}">
                                                <option></option>
                                            </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.commission_percentage') }} (%)</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control" placeholder="{{ __('messages.commission_percentage') }} (%)" name="commission_percentage" >
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <div class="row g-9 mb-7">
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.user_boutique_description') }} ({{ __('messages.en') }})</label>
                                            <textarea class="form-control" placeholder="{{ __('messages.user_boutique_description') }} ({{ __('messages.en') }})" name="description" dir="ltr" rows="10"></textarea>
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.user_boutique_description') }} ({{ __('messages.ar') }})</label>
                                            <textarea class="form-control" placeholder="{{ __('messages.user_boutique_description') }} ({{ __('messages.ar') }})" name="description_ar" dir="rtl" rows="10"></textarea>
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                    </div>
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-7">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <label class="fs-6 fw-semibold mb-2">{{ __('messages.image') }}</label> <br>
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
                                            <label class="fs-6 fw-semibold mb-2">{{ __('messages.cover_image') }}</label> <br>
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
                                                    <input type="file" name="cover_image" accept="image/*" />
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
                                    </div>


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
    <script src="{{ asset('assets/js/admin/user_boutiques/create_user_boutiques.js') }}"></script>
@endpush
