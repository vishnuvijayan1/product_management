@extends('layouts.admin.admin_app', ['body_class' => ''])
@section('title', __('messages.categories'))
@push('breadcrumbs')
    <!--begin::Item-->
    <li class="breadcrumb-item text-muted"><a href="{{ route('admin.categories.index') }}" class="text-muted text-hover-primary">{{ __('messages.categories') }}</a></li>
    <!--end::Item-->
@endpush
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-md-5 mb-xl-10">
                  <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>{{ __('messages.category_list') }}</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <input id="search-input" placeholder="{{__('messages.search_here')}}" class="search-input form-control" />
                            <div id="categoryTreeMain"> <div id="categoryTree"> </div> </div>

    {{--                    <div id="categoryTree">--}}
    {{--                        <ul>--}}
    {{--                            <li id="PHP">PHP--}}
    {{--                                <ul>--}}
    {{--                                    <li id="Word Press">Word Press</li>--}}
    {{--                                    <li id="CodeIgniter">CodeIgniter</li>--}}
    {{--                                    <li id="Laravel">Laravel--}}
    {{--                                        <ul>--}}
    {{--                                            <li id="Liju">Liju</li>--}}
    {{--                                            <li id="Safir">Safir</li>--}}
    {{--                                            <li id="Vishnu">Vishnu</li>--}}
    {{--                                        </ul>--}}
    {{--                                    </li>--}}
    {{--                                    <li id="YII">YII</li>--}}
    {{--                                </ul>--}}
    {{--                            </li>--}}
    {{--                            <li id="Python">Python </li>--}}
    {{--                        </ul>--}}
    {{--                    </div>--}}
                    </div>
                    <!--end::Card body-->
                </div>
               </div>
                <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 mb-md-5 mb-xl-10">
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{ __('messages.category_details') }}</h2>
                            </div>
                            <!--begin::Card title-->
                         </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="mb-5 hover-scroll-x">
                                <div class="d-grid">
                                    <ul class="nav nav-tabs flex-nowrap text-nowrap" id="categoryTabPanel">
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0 active" data-bs-toggle="tab" data-id="generalInformationTab" href="#generalInformationTab">General Information</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0" data-bs-toggle="tab" data-id="categoryProductsTab" href="#categoryProductsTab">Category Products</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="generalInformationTab" role="tabpanel">
                                </div>
                                <div class="tab-pane fade" id="categoryProductsTab" role="tabpanel">
                                    .....
                                </div>
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
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />--}}
@endpush
@push('footer-scripts')
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->
    <script src="{{ asset('assets/js_tree/jstree.min.js') }}"></script>
    <script src="{{ asset('assets/js_tree/jstree.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/categories/categories.js') }}"></script>
    <div id="treeViewScript"></div>
@endpush
