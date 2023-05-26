@extends('layouts.admin.admin_app', ['body_class' => ''])
@section('title', __('messages.edit_product'))
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
    <li class="breadcrumb-item active"><a href="" class="text-muted text-hover-primary">{{  __('messages.edit_product') }}</a></li>
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
                                <h2>{{ __('messages.edit_product') }} => {{ $product->getProductName() }}</h2>
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
{{--                                                    {{ __('messages.general_information') }}--}}
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
{{--                                                    {{ __('messages.product_detail') }}--}}
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
                                                <span class="stepper-number">#</span>
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
                                @if($product->sale_type == "Auction")
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
                                                        {{ __('messages.timings') }}
                                                    </h3>
                                                    <div class="stepper-desc">
{{--                                                        {{ __('messages.product_variants') }}--}}
                                                    </div>
                                                </div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Step 4-->
                                @endif

                                    @if($product->type == "Group")
                                        <!--begin::Step 6-->
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
                                                            {{ __('messages.variants') }}
                                                        </h3>
                                                        <div class="stepper-desc">
{{--                                                            {{ __('messages.product_variants') }}--}}
                                                        </div>
                                                    </div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Step 6-->
                                    @endif

                                </div>
                                <!--end::Nav-->

                                <!--begin::Form-->
                                <form class="form  mx-auto" novalidate="novalidate" id="editProductForm">
                                    <input type="hidden" value="{{ $product_variant->id }}" name="id">
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
                                                        <select class="form-select" id="boutique" name="boutique" data-control="select2" data-placeholder="{{ __('messages.select_any') }}" data-allow-clear="true">
                                                            <option></option>
                                                            @foreach($user_boutiques as $user_boutique)
                                                                <option value="{{ $user_boutique->id }}" @if($product->user_boutique_id == $user_boutique->id) selected @endif>{{ $user_boutique->getName() }} || {{ $user_boutique->user->first_name }} {{ $user_boutique->user->last_name }}</option>
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
                                                            <option value="Simple" @if($product->type == "Simple") selected @endif>{{ __('messages.simple') }}</option>
                                                            <option value="Group" @if($product->type == "Group") selected @endif>{{ __('messages.group') }}</option>
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
                                                            <option value="Sale" @if($product->sale_type == 'Sale') selected @endif>{{ __('messages.sale') }}</option>
                                                            <option value="Auction" @if($product->sale_type == 'Auction') selected @endif>{{ __('messages.auction') }}</option>
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
                                                                <option value="{{ $attribute_set->id }}" @if($product->attribute_set_id == $attribute_set->id) selected @endif>{{ $attribute_set->getAttributeSetName() }}</option>
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
                                                        <div id="productVariantImageSection"></div>
                                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                        </div>
                                        <!--end::Step 4-->
                                        @if($product->sale_type == "Auction")
                                        <!--begin::Step 5-->
                                        <div class="flex-column" data-kt-stepper-element="content">
                                            <div class="modal-body py-10 px-lg-17">
                                                <div class="card">
                                                    <!--begin::Card header-->
                                                    <div class="card-header border-0 pt-6">
                                                        <!--begin::Card title-->
                                                        <div class="card-title">
                                                            <h2>{{ __('messages.auction_timings') }}</h2>
                                                        </div>
                                                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                                                            <a class="btn btn-icon btn-active-light-primary w-30px h-30px" onclick="auctionTimingAddForm({{$product->id}})" >
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
                                                        <table id="auctionTimingDataTable" class="table table-row-bordered gy-5">
                                                            <thead>
                                                            <tr class="fw-semibold fs-6 text-muted">
                                                                <th>#</th>
                                                                <th>{{ __('messages.bid_start_time') }}</th>
                                                                <th>{{ __('messages.bid_end_time') }}</th>
                                                                <th>{{ __('messages.auction_status') }}</th>
                                                                <th>{{ __('messages.action') }}</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                    <!--end::Card body-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Step 5-->
                                       @endif
                                    @if($product->type == "Group")
                                        <!--begin::Step 6-->
                                            <div class="flex-column" data-kt-stepper-element="content">
                                                <div class="modal-body py-10 px-lg-17">
                                                    <div class="card">
                                                        <!--begin::Card header-->
                                                        <div class="card-header border-0 pt-6">
                                                            <!--begin::Card title-->
                                                            <div class="card-title">
                                                                <h2>{{ __('messages.product_variant_lists') }}</h2>
                                                            </div>
                                                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                                                                <a class="btn btn-icon btn-active-light-primary w-30px h-30px" onclick="productVariantAddForm({{$product->id}})" >
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
                                                            <table id="productVariantDataTable" class="table table-row-bordered gy-5">
                                                                <thead>
                                                                <tr class="fw-semibold fs-6 text-muted">
                                                                    <th>#</th>
                                                                    <th>{{ __('messages.image') }}</th>
                                                                    <th>{{ __('messages.product_sku') }}</th>
                                                                    <th>{{ __('messages.categories') }}</th>
                                                                    <th>{{ __('messages.attributes') }}</th>
                                                                    @if($product->sale_type == 'Sale')
                                                                        <th>{{ __('messages.product_regular_price') }}</th>
                                                                        <th>{{ __('messages.product_final_price') }}</th>
                                                                    @elseif($product->sale_type == 'Auction')
                                                                        <th>{{ __('messages.bid_start_price') }}</th>
                                                                        <th>{{ __('messages.bid_value') }}</th>
                                                                    @endif
                                                                    <th>{{ __('messages.quantity') }}</th>
                                                                    <th>{{ __('messages.action') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody></tbody>
                                                            </table>
                                                        </div>
                                                        <!--end::Card body-->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Step 6-->
                                        @endif
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
                                            <button type="submit" id="editButton" class="btn btn-primary" data-kt-stepper-action="submit">
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

    <div class="modal fade " tabindex="-1" id="productCommonModalAddEdit">
        <div class="modal-dialog modal-dialog-scrollable mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEditTitle"></h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="{{ __('messages.close')}}">
                        <span class="svg-icon svg-icon-2x">
                             <i class="bi bi-x-circle-fill text-danger fs-1"></i>
                        </span>
                    </div>
                    <!--end::Close-->
            </div>
                <div class="modal-body" id="productCommonModalAddEditForm"></div>

            </div>
        </div>
    </div>

@endsection
@push('head-scripts')
    <link rel="stylesheet" href="{{ asset('assets/js_tree/jstree_style.min.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel=”stylesheet”>
@endpush
@push('footer-scripts')
    <script type="text/javascript">
        let assigned_category_ids = "{{ implode(',', $assigned_category_ids) }}";
        let boutique = "{{ $product->boutique->id }}";
        let attribute_set_id = "{{ $product->attribute_set_id }}";
        let product_variant_id = "{{ $product_variant->id }}";
        let sale_type = "{{ $product->sale_type }}";
        let stepper_index = 'first';
    </script>
    <!--end::Custom Javascript-->
    <script src="{{ asset('assets/js_tree/jstree.min.js') }}"></script>
    <script src="{{ asset('assets/js_tree/jstree.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"> </script>
    <script src="{{ asset('assets/js/admin/products/edit_products.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            var table = $('#productVariantDataTable').DataTable({
                language: {
                    url: "{{ asset('assets/js/custom_plugins/data_tables/'.app()->getLocale().'.json') }}",
                    sSearchPlaceholder: "{{ __('messages.search_here') }}",
                    sSearch: "",
                },
                dom:'rfltip',
                processing: true,
                serverSide: true,
                searchable:true,
                paging:true,
                responsive: true,
                ajax: "{{ url('admin/product_variants/?product_variant_id='.$product_variant->id) }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'image', name: 'image'},
                    {data: 'sku', name: 'sku'},
                    {data: 'category', name: 'category'},
                    {data: 'attribute_value', name: 'attribute_value'},
                    {data: 'regular_price_or_bid_start_price', name: 'regular_price_or_bid_start_price'},
                    {data: 'final_price_or_bid_value', name: 'final_price_or_bid_value'},
                    {data: 'quantity', name: 'quantity'},
                    {data: 'action', name: 'action'},
                ]
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            var table = $('#auctionTimingDataTable').DataTable({
                language: {
                    url: "{{ asset('assets/js/custom_plugins/data_tables/'.app()->getLocale().'.json') }}",
                    sSearchPlaceholder: "{{ __('messages.search_here') }}",
                    sSearch: "",
                },
                dom:'rfltip',
                processing: true,
                serverSide: true,
                searchable:true,
                paging:true,
                responsive: true,
                ajax: "{{ url('admin/auction_timings/?product_variant_id='.$product_variant->id) }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'bid_start_time', name: 'bid_start_time', render: function (data, type, row, meta) {
                            if(data) return moment.utc(data).local().format('DD-MM-YYYY hh:mm A'); else return '';
                        }},
                    {data: 'bid_end_time', name: 'bid_end_time', render: function (data, type, row, meta) {
                            if(data) return moment.utc(data).local().format('DD-MM-YYYY hh:mm A'); else return '';
                        }},
                    {data: 'auction_status', name: 'auction_status'},
                    {data: 'action', name: 'action'},
                ]
            });
        });
    </script>
        @if(Session::has('session_success_message'))
            <script type="text/javascript">
                @if($product->type == "Group")  stepper_index = 'last'; @endif
                 printSingleSuccessToast("{{ Session::get('session_success_message') }}")
            </script>
            @php Session::forget('session_success_message') @endphp
        @endif
    <div id="treeViewScript"></div>
@endpush
