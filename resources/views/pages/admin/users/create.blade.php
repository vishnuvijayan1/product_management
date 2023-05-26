@extends('layouts.admin.admin_app', ['body_class' => ''])
@section('title', __('messages.add_user'))
@php
    if(isset($_COOKIE["time_zone"])){ $time_zone = getLocalTimeZone($_COOKIE["time_zone"]); } else {$time_zone = getLocalTimeZone(); }
@endphp
@push('breadcrumbs')
    <!--begin::Item-->
    <li class="breadcrumb-item text-muted"><a href="{{ route('admin.users.index') }}" class="text-muted text-hover-primary">{{ __('messages.users') }}</a></li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-400 w-5px h-2px"></span>
    </li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item active"><a href="" class="text-muted text-hover-primary">{{  __('messages.add_user') }}</a></li>
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
                                <h2>{{ __('messages.add_user') }}</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <form class="form" action="#" id="addUserForm" enctype="multipart/form-data" method="POST">
                                <input type="hidden" name="time_zone" id="time_zone" value="Asia/Kuwait">
                                <!--begin::Modal body-->
                                <div class="modal-body py-10 px-lg-17">
                                    <div class="row g-9 mb-7">
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.first_name') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text"class="form-control" placeholder="{{ __('messages.first_name') }}" name="first_name">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.last_name') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control" placeholder="{{ __('messages.last_name') }}" name="last_name">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.email') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text"class="form-control" placeholder="{{ __('messages.email') }}" name="email">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.mobile_number') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control" placeholder="{{ __('messages.mobile_number') }}" name="mobile_number">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.gender') }}</label>
                                            <!--end::Label-->
                                            <select class="form-select" id="gender" name="gender" data-control="select2" data-placeholder="{{ __('messages.select_any') }}">
                                                <option></option>
                                                <option value="Male">{{ __('messages.male') }}</option>
                                                <option value="Female">{{ __('messages.female') }}</option>
                                            </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.date_of_birth') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control" id="dateOfBirth" placeholder="{{ __('messages.date_of_birth') }}" name="date_of_birth">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.password') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="password"class="form-control" placeholder="{{ __('messages.password') }}" name="password">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.password_confirmation') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="password" class="form-control" placeholder="{{ __('messages.password_confirmation') }}" name="password_confirmation">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.type') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select" id="type" name="type" data-control="select2" data-placeholder="{{ __('messages.select_any') }}">
                                                <option></option>
                                                <option value="User">{{ __('messages.user') }}</option>
                                                <option value="Vendor">{{ __('messages.vendor') }}</option>
                                            </select>      <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">{{ __('messages.package') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select" id="package" name="package" data-control="select2" data-placeholder="{{ __('messages.select_any') }}" data-allow-clear="true">
                                                <option></option>
                                                @foreach($packages as $package)
                                                    <option value="{{ $package->id }}">{{ $package->getTitle() }} || {{ $package->price }} {{ __('messages.kwd') }} || {{ $package->package }}</option>
                                                @endforeach
                                            </select>

                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                        <!--end::Col-->
                                    </div>
{{--                                    <div id="packageSection"></div>--}}
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
                                        <div class="col-md-6 fv-row fv-plugins-icon-container" id="beiaatHandledSection" style="display: none;">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">{{ __('messages.beiaat_handled') }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                                <input class="form-check-input" name="beiaat_handled" type="checkbox"  value="1" id="status">
                                            </div>
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
    <script src="{{ asset('assets/js/admin/users/create_users.js') }}"></script>
@endpush
