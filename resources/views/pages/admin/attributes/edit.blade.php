@extends('layouts.admin.admin_app', ['body_class' => ''])
@section('title', __('messages.edit_attribute'))
@push('breadcrumbs')
    <!--begin::Item-->
    <li class="breadcrumb-item text-muted"><a href="{{ route('admin.attributes.index') }}" class="text-muted text-hover-primary">{{ __('messages.attributes') }}</a></li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-400 w-5px h-2px"></span>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item active"><a href="" class="text-muted text-hover-primary">{{  __('messages.edit_attribute') }}</a></li>
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
                            <form class="form" action="#" id="editAttributeForm" enctype="multipart/form-data" method="POST">
                                <input type="hidden" name="id" value="{{ $attribute->id }}">
                                <!--begin::Modal body-->
                                <div class="modal-body py-10 px-lg-17">
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-7">
                                        <!--begin::Col-->
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.attribute_code') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text"class="form-control" placeholder="{{ __('messages.attribute_code') }}" name="code" dir="ltr" value="{{ $attribute->code }}">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-7">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.attribute_name') }} ({{ __('messages.en') }})</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text"class="form-control" placeholder="{{ __('messages.attribute_name') }} ({{ __('messages.en') }})" name="name" dir="ltr" value="{{ $attribute->name }}">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.attribute_name') }} ({{ __('messages.ar') }})</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control" placeholder="{{ __('messages.attribute_name') }} ({{ __('messages.ar') }})" name="name_ar" dir="rtl" value="{{ $attribute->name_ar }}">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <div class="row g-9 mb-7">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">{{ __('messages.colour_palette') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                                <input class="form-check-input" name="colour_palette" type="checkbox" @if($attribute->colour_palette) checked @endif value="1" id="colour_palette">
                                            </div>
                                         <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">{{ __('messages.status') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                                <input class="form-check-input" name="status" type="checkbox" @if($attribute->status) checked @endif value="1" id="status">
                                            </div>
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                        <!--end::Col-->
                                    </div>
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-7">
                                        <h4>{{ __('messages.attribute_values') }}</h4>
                                              @foreach($attribute->attribute_value_items as $key => $attribute_value)
                                                    <input type="hidden" name="attribute_value_id[]" value="{{ $attribute_value->id }}">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label class="form-label">{{ __('messages.attribute_value') }} ({{ __('messages.en') }})</label>
                                                        <input type="text" name="attribute_value_en[]" class="form-control" placeholder="{{ __('messages.attribute_value') }} ({{ __('messages.en') }})" dir="ltr" value="{{$attribute_value->name}}" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">{{ __('messages.attribute_value') }} ({{ __('messages.ar') }})</label>
                                                        <input type="text" name="attribute_value_ar[]"  class="form-control" placeholder="{{ __('messages.attribute_value') }} ({{ __('messages.ar') }})" dir="rtl" value="{{$attribute_value->name_ar}}" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">{{ __('messages.colour') }}</label>
                                                        <input type="color" name="attribute_colour[]"  class="form-control" placeholder="{{ __('messages.attribute_colour') }}" value="{{$attribute_value->colour}}" />
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a href="javascript:;" class="btn btn-sm btn-light-danger mt-3 mt-md-8" onclick="deleteAttributeValue({{ $attribute_value->id }})">
                                                            <i class="la la-trash-o"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                              @endforeach
                                        <!--begin::Repeater-->
                                        <div id="attribute_value">
                                            <!--begin::Form group-->
                                            <div class="form-group">
                                                <div data-repeater-list="attribute_value">
                                                    <div data-repeater-item class="mb-8">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label class="form-label">{{ __('messages.attribute_value') }} ({{ __('messages.en') }})</label>
                                                                <input type="text" name="attribute[value][]" class="form-control" placeholder="{{ __('messages.attribute_value') }} ({{ __('messages.en') }})" dir="ltr"/>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">{{ __('messages.attribute_value') }} ({{ __('messages.ar') }})</label>
                                                                <input type="text" name="attribute[value_ar][]"  class="form-control" placeholder="{{ __('messages.attribute_value') }} ({{ __('messages.ar') }})" dir="rtl" />
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="form-label">{{ __('messages.colour') }}</label>
                                                                <input type="color" name="attribute[colour][]"  class="form-control" placeholder="{{ __('messages.attribute_colour') }}" />
                                                            </div>
                                                            <div class="col-md-1">
                                                                <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                                    <i class="la la-trash-o"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Form group-->
                                            <!--begin::Form group-->
                                            <div class="form-group mt-5">
                                                <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                                    <i class="la la-plus"></i>
                                                </a>
                                            </div>
                                            <!--end::Form group-->
                                        </div>
                                        <!--end::Repeater-->
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
    <script src="{{ asset('assets/js/admin/attributes/edit_attributes.js') }}"></script>
    <div id="treeViewScript"></div>
@endpush
