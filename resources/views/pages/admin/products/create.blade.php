@extends('layouts.admin.admin_app', ['body_class' => ''])
@section('title', __('messages.add_product'))
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
    <li class="breadcrumb-item active"><a href="" class="text-muted text-hover-primary">{{  __('messages.add_product') }}</a></li>
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
                                <h2>{{ __('messages.add_product') }}</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Stepper-->
                            <div class="stepper stepper-pills" id="productFormStepper">
                                <!--begin::Nav-->
                                <div class="stepper-nav flex-center flex-wrap mb-10">
                                    <!--begin::Step 1-->
                                    <div class="stepper-item mx-8 my-4 current" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                        <!--begin::Wrapper-->
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">#</span>
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Label-->
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">
                                                    {{ __('messages.basic') }}
                                                </h3>

                                                <div class="stepper-desc">
{{--                                                    {{ __('messages.basic') }}--}}
                                                </div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Line-->
                                        <div class="stepper-line h-40px"></div>
                                        <!--end::Line-->
                                    </div>
                                    <!--end::Step 1-->

                                    <!--begin::Step 2-->
                                    <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                        <!--begin::Wrapper-->
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">#</span>
                                            </div>
                                            <!--begin::Icon-->

                                            <!--begin::Label-->
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">
                                                    {{ __('messages.details') }}
                                                </h3>
                                                <div class="stepper-desc">
{{--                                                    {{ __('messages.details') }}--}}
                                                </div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Line-->
                                        <div class="stepper-line h-40px"></div>
                                        <!--end::Line-->
                                    </div>
                                    <!--end::Step 2-->

                                    <!--begin::Step 3-->
                                    <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                        <!--begin::Wrapper-->
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">3</span>
                                            </div>
                                            <!--begin::Icon-->

                                            <!--begin::Label-->
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">
                                                    {{ __('messages.category') }}
                                                </h3>
                                                <div class="stepper-desc">
{{--                                                    {{ __('messages.category') }}--}}
                                                </div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Line-->
                                        <div class="stepper-line h-40px"></div>
                                        <!--end::Line-->
                                    </div>
                                    <!--end::Step 3-->

                                    <!--begin::Step 4-->
                                    <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                                        <!--begin::Wrapper-->
                                        <div class="stepper-wrapper d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <div class="stepper-icon w-40px h-40px">
                                                <i class="stepper-check fas fa-check"></i>
                                                <span class="stepper-number">#</span>
                                            </div>
                                            <!--begin::Icon-->

                                            <!--begin::Label-->
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">
                                                    {{ __('messages.image') }}
                                                </h3>
                                                <div class="stepper-desc">
{{--                                                    {{ __('messages.image') }}--}}
                                                </div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Step 4-->
                                </div>
                                <!--end::Nav-->

                                <!--begin::Form-->
                                <form class="form  mx-auto" novalidate="novalidate" id="addProductForm">
                                    <!--begin::Group-->
                                    <div class="mb-5">
                                        <!--begin::Step 1-->
                                        <div class="flex-column current" data-kt-stepper-element="content">
                                            <div class="modal-body py-10 px-lg-17">
                                                <!--begin::Input group-->
                                                <div class="row g-9 mb-7">
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-semibold mb-2">{{ __('messages.boutique') }}</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <select class="form-select" id="boutique" name="boutique" data-control="select2" data-placeholder="{{ __('messages.select_any') }}">
                                                            <option></option>
                                                            @foreach($user_boutiques as $user_boutique)
                                                            <option value="{{ $user_boutique->id }}">{{ $user_boutique->getName() }} || {{ $user_boutique->user->first_name }} {{ $user_boutique->user->last_name }}</option>
                                                            @endforeach
                                                        </select>      <!--end::Input-->
                                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-semibold mb-2">{{ __('messages.product_type') }}</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <select class="form-select" id="productType" name="product_type" data-control="select2" data-placeholder="{{ __('messages.select_any') }}" data-allow-clear="true">
                                                            <option></option>
                                                            <option value="Simple">{{ __('messages.simple') }}</option>
                                                            <option value="Group">{{ __('messages.group') }}</option>
                                                        </select>      <!--end::Input-->
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
                                                        <label class="required fs-6 fw-semibold mb-2">{{ __('messages.sale_type') }}</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <select class="form-select" id="saleType" name="sale_type" data-control="select2" data-placeholder="{{ __('messages.select_any') }}">
                                                            <option></option>
                                                            <option value="Sale">{{ __('messages.sale') }}</option>
                                                            <option value="Auction">{{ __('messages.auction') }}</option>
{{--                                                            <option value="Live">{{ __('messages.live') }}</option>--}}
{{--                                                            <option value="Bulk">{{ __('messages.bulk') }}</option>--}}
                                                        </select>      <!--end::Input-->
                                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-semibold mb-2">{{ __('messages.attribute_set') }}</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <select class="form-select" id="attributeSet" name="attribute_set" data-control="select2" data-placeholder="{{ __('messages.select_any') }}">
                                                            <option></option>
                                                            @foreach($attribute_sets as $attribute_set)
                                                                <option value="{{ $attribute_set->id }}">{{ $attribute_set->getAttributeSetName() }}</option>
                                                            @endforeach
                                                        </select>      <!--end::Input-->
                                                        <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--end::Scroll-->
                                            </div>
                                         </div>
                                        <!--begin::Step 1-->
                                        <!--begin::Step 2-->
                                        <div class="flex-column" data-kt-stepper-element="content">
                                            <div class="modal-body py-10 px-lg-17">
                                                <div id="productAddForm"></div>
                                            </div>
                                        </div>
                                        <!--end::Step 2-->
                                        <!--begin::Step 3-->
                                        <div class="flex-column" data-kt-stepper-element="content">
                                            <div class="modal-body py-10 px-lg-17">
                                                <input id="search-input" placeholder="{{__('messages.search_here')}}" class="search-input form-control" />
                                                <div id="categoryTreeMain"> <div id="categoryTree"> </div> </div>
                                            </div>
                                        </div>
                                        <!--end::Step 3-->
                                        <!--begin::Step 4-->
                                        <div class="flex-column" data-kt-stepper-element="content">
                                            <div class="modal-body py-10 px-lg-17">
                                                <!--begin::Input group-->
                                                <div class="row g-9 mb-7">
                                                    <!--begin::Col-->
                                                    <div class="col-md-12 fv-row fv-plugins-icon-container">
                                                        <label class="required fs-6 fw-semibold mb-2">{{ __('messages.image') }}</label> <br>
                                                        <!--begin::Input-->
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
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                         </div>
                                          <!--end::Step 3-->
                                    </div>
                                    <!--end::Group-->

                                    <!--begin::Actions-->
                                    <div class="d-flex flex-stack">
                                       <!--begin::Wrapper-->
                                        <div class="me-2">
                                            <button type="button" class="btn btn-light btn-active-light-primary" data-kt-stepper-action="previous">
                                                Back
                                            </button>
                                        </div>
                                        <!--begin::Wrapper-->
                                        <div>
                                              <button type="submit" id="createButton" class="btn btn-primary" data-kt-stepper-action="submit">
                                                <span class="indicator-label">
                                                   {{__('messages.save')}}
                                                </span>
                                                <span class="indicator-progress">{{ __('messages.please_wait') }} <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                                </button>

                                                <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                                                    Continue
                                                </button>
                                         </div>
                                         <!--end::Wrapper-->
                                     </div>
                                    <!--end::Actions-->
                                 </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Stepper-->
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
@endpush
@push('footer-scripts')
    <!--end::Custom Javascript-->
    <script src="{{ asset('assets/js_tree/jstree.min.js') }}"></script>
    <script src="{{ asset('assets/js_tree/jstree.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/products/create_products.js') }}"></script>
    <div id="treeViewScript"></div>
@endpush
