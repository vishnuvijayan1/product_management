@extends('layouts.admin.admin_app', ['body_class' => ''])
@section('title', __('messages.products'))
@push('breadcrumbs')
    <!--begin::Item-->
    <li class="breadcrumb-item active"><a href="{{ route('admin.products.index') }}" class="text-muted text-hover-primary">{{ __('messages.products') }}</a></li>
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
                            <h2>{{ __('messages.product_lists') }}</h2>
                        </div>
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                                <a class="btn btn-icon btn-active-light-primary w-30px h-30px"  href="{{ route('admin.products.create') }}" >
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
                        <table id="productDataTable" class="table table-row-bordered gy-5">
                            <thead>
                            <tr class="fw-semibold fs-6 text-muted">
                                <th>#</th>
                                <th>{{ __('messages.image') }}</th>
                                <th>{{ __('messages.product_name') }}</th>
                                <th>{{ __('messages.categories') }}</th>
                                <th>{{ __('messages.attributes') }}</th>
                                <th>{{ __('messages.boutique') }}</th>
                                <th>{{ __('messages.product_regular_price') }} / {{ __('messages.bid_start_price') }}</th>
                                <th>{{ __('messages.product_final_price') }} / {{ __('messages.bid_value') }}</th>
                                <th>{{ __('messages.quantity') }}</th>
                                <th>{{ __('messages.sale_type') }}</th>
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
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection
@push('head-scripts')
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
    <script type="text/javascript">
        $(function () {
            var table = $('#productDataTable').DataTable({
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
                ajax: "{{ route('admin.products.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'image', name: 'image'},
                    {data: 'name', name: 'name'},
                    {data: 'category', name: 'category'},
                    {data: 'attribute_value', name: 'attribute_value'},
                    {data: 'boutique', name: 'boutique'},
                    {data: 'regular_price_or_bid_start_price', name: 'regular_price_or_bid_start_price'},
                    {data: 'final_price_or_bid_value', name: 'final_price_or_bid_value'},
                    {data: 'quantity', name: 'quantity'},
                    {data: 'sale_type', name: 'sale_type'},
                    {data: 'action', name: 'action'},
                ]
            });
        });
    </script>
@endpush
