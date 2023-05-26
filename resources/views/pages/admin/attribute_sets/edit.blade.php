@extends('layouts.admin.admin_app', ['body_class' => ''])
@section('title', __('messages.edit_attribute_set'))
@push('breadcrumbs')
    <!--begin::Item-->
    <li class="breadcrumb-item text-muted"><a href="{{ route('admin.attribute_sets.index') }}" class="text-muted text-hover-primary">{{ __('messages.attribute_sets') }}</a></li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-400 w-5px h-2px"></span>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item active"><a href="" class="text-muted text-hover-primary">{{  __('messages.edit_attribute_set') }}</a></li>
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
                                <h2>{{ __('messages.edit_attribute') }}</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <form class="form" action="#" id="editAttributeSetForm" enctype="multipart/form-data" method="POST">
                                <input type="hidden" value="{{ $attribute_set->id }}" name="id">
                                <!--begin::Modal body-->
                                <div class="modal-body py-10 px-lg-17">
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-7">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.attribute_set_name') }} ({{ __('messages.en') }})</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text"class="form-control" placeholder="{{ __('messages.attribute_set_name') }} ({{ __('messages.en') }})" name="name" dir="ltr" value="{{ $attribute_set->name }}">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.attribute_set_name') }} ({{ __('messages.ar') }})</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control" placeholder="{{ __('messages.attribute_set_name') }} ({{ __('messages.ar') }})" name="name_ar" dir="rtl" value="{{ $attribute_set->name_ar }}">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--end::Input group-->
                                    <div class="row g-9 mb-7">
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">{{ __('messages.status') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                                <input class="form-check-input" name="status" type="checkbox" @if($attribute_set->status) checked @endif value="1" id="status">
                                            </div>
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                        <!--end::Col-->
                                    </div>
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-7">
                                        <!--begin::Col-->
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.attributes') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select" id="attributes" name="attribute_id[]" data-control="select2"  data-placeholder="{{ __('messages.select_any') }}" data-tags="true" data-maximum-selection-length="2" data-allow-clear="true"  multiple="multiple">
                                                <option value="">{{ __('messages.select_any') }}</option>
                                                @foreach($attributes as $attribute)
                                                    <option value="{{ $attribute->id }}" {{ (in_array($attribute->id, $assigned_attributes) ) ? 'selected ' : '' }}>{{ $attribute->getAttributeName() }}</option>
                                                @endforeach
                                            </select>

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--end::Scroll-->
                                </div>
                                <!--end::Modal body-->
                                <!--begin::Modal footer-->
                                <div class="modal-footer">
                                    <!--begin::Button-->
                                    <button type="submit" id="editButton" class="btn btn-primary">
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
    <script src="{{ asset('assets/js/admin/attribute_sets/edit_attribute_sets.js') }}"></script>
@endpush
