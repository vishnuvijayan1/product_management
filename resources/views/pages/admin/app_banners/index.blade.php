@extends('layouts.admin.admin_app', ['body_class' => ''])
@section('title', __('messages.app_banners'))
@php
    if(isset($_COOKIE["time_zone"])){ $time_zone = getLocalTimeZone($_COOKIE["time_zone"]); } else {$time_zone = getLocalTimeZone(); }
@endphp
@push('breadcrumbs')
    <!--begin::Item-->
    <li class="breadcrumb-item active"><a href="" class="text-muted text-hover-primary">{{  __('messages.app_banners') }}</a></li>
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
                            <h2>{{ __('messages.app_banner_lists') }}</h2>
                        </div>
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                                <a class="btn btn-icon btn-active-light-primary w-30px h-30px"  href="{{ route('admin.app_banners.create') }}" >
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
                        <table id="appBannerDataTable" class="table table-row-bordered gy-5">
                            <thead>
                            <tr class="fw-semibold fs-6 text-muted">
                                <th>#</th>
                                <th>{{ __('messages.app_banner_title') }} ({{ __('messages.en') }})</th>
                                <th>{{ __('messages.app_banner_title') }} ({{ __('messages.ar') }})</th>
                                <th>{{ __('messages.start_date_time') }}</th>
                                <th>{{ __('messages.end_date_time') }}</th>
                                <th>{{ __('messages.status') }}</th>
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
    <script type="text/javascript">
        $(function () {
            var table = $('#appBannerDataTable').DataTable({
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
                ajax: "{{ route('admin.app_banners.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'title'},
                    {data: 'title_ar', name: 'title_ar'},
                    {data: 'start_time', name: 'start_time', render: function (data, type, row, meta) {
                            if(data) return moment.utc(data).local().format('DD-MM-YYYY hh:mm A'); else return '';
                        }},
                    {data: 'end_time', name: 'end_time', render: function (data, type, row, meta) {
                            if(data) return moment.utc(data).local().format('DD-MM-YYYY hh:mm A'); else return '';
                        }},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action'},
                ]
            });
        });
    </script>
@endpush
