@extends('layouts.admin.admin_app', ['body_class' => ''])
@section('title', __('messages.dashboard'))
@push('breadcrumbs')
    <!--begin::Item-->
    <li class="breadcrumb-item active"><a href="{{ url('admin') }}" class="text-muted text-hover-primary">{{ __('messages.dashboard') }}</a></li>
    <!--end::Item-->
@endpush
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-xl-10">
                <!--begin::Col-->
                <div class="col-lg-4 col-md-4 col-xl-4 col-xxl-4 col-sm-12 mb-md-5 mb-xl-10">
                    <!--begin::Card widget 6-->
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Currency-->
                                    <span class="fs-8 fw-semibold text-gray-400 me-1 align-self-start">KWD</span>
                                    <!--end::Currency-->
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">2,420</span>
                                    <!--end::Amount-->
                                    <!--begin::Badge-->
                                    <span class="badge badge-light-success fs-base">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
															<span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
																	<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
																</svg>
															</span>
                                        <!--end::Svg Icon-->2.6%</span>
                                    <!--end::Badge-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">Average Monthly Sales</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end px-0 pb-0">
                            <!--begin::Chart-->
                            <div id="kt_card_widget_6_chart" class="w-100" style="height: 80px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 6-->
                    <!--begin::Card widget 7-->
                    <div class="card card-flush h-md-50 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">2458</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">New Customers This Month</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex flex-column justify-content-end pe-0">
                            <!--begin::Title-->
                            <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Today’s Sign Up</span>
                            <!--end::Title-->
                            <!--begin::Users group-->
                            <div class="symbol-group symbol-hover flex-nowrap">
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michael Eberon">
                                    <img alt="Pic" src="{{ asset('assets/media/avatars/300-11.jpg') }}" />
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
                                    <img alt="Pic" src="{{ asset('assets/media/avatars/300-2.jpg') }}" />
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Barry Walter">
                                    <img alt="Pic" src="{{ asset('assets/media/avatars/300-12.jpg') }}" />
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
                                    <img alt="Pic" src="{{ asset('assets/media/avatars/300-2.jpg') }}" />
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michael Eberon">
                                    <img alt="Pic" src="{{ asset('assets/media/avatars/300-11.jpg') }}" />
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
                                    <img alt="Pic" src="{{ asset('assets/media/avatars/300-2.jpg') }}" />
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
                                    <img alt="Pic" src="{{ asset('assets/media/avatars/300-2.jpg') }}" />
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Barry Walter">
                                    <img alt="Pic" src="{{ asset('assets/media/avatars/300-12.jpg') }}" />
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Barry Walter">
                                    <img alt="Pic" src="{{ asset('assets/media/avatars/300-12.jpg') }}" />
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
                                    <img alt="Pic" src="{{ asset('assets/media/avatars/300-2.jpg') }}" />
                                </div>
                                <a href="#" class="symbol symbol-35px symbol-circle">
                                    <span class="symbol-label bg-light text-gray-400 fs-8 fw-bold">+42</span>
                                </a>
                            </div>
                            <!--end::Users group-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card widget 7-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-lg-8 col-md-8 col-xl-8 col-xxl-8 col-sm-12 mb-5 mb-xl-0">
                    <!--begin::Chart widget 3-->
                    <div class="card card-flush overflow-hidden h-md-100">
                        <!--begin::Header-->
                        <div class="card-header py-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Sales This Year</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Sales from all Boutiques</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                            <!--begin::Statistics-->
                            <div class="px-9 mb-5">
                                <!--begin::Statistics-->
                                <div class="d-flex mb-2">
                                    <span class="fs-8 fw-semibold text-gray-400 me-1">KWD</span>
                                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">14,094</span>
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Statistics-->
                            <!--begin::Chart-->
                            <div id="kt_charts_widget_3" class="min-h-auto ps-4 pe-6" style="height: 300px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Chart widget 3-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!-- row begin -->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::Chart widget 18-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Users Statistics</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">2022</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-end px-0 pt-3 pb-5">
                            <!--begin::Chart-->
                            <div id="kt_charts_widget_18_chart" class="h-325px w-100 min-h-auto ps-4 pe-6"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Chart widget 18-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-8">
                    <!--begin::Table widget 13-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Most Popular Butiques</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Total 424,567 deliveries</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-3 pb-4">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                        <th class="p-0 w-200px w-xxl-450px"></th>
                                        <th class="p-0 min-w-150px"></th>
                                        <th class="p-0 min-w-125px"></th>
                                        <th class="p-0 min-w-125px"></th>
                                        <th class="p-0 w-100px"></th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>

                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol- symbol-40px me-3">
                                                    <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">CodeLab Boutique</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Code Lab Vendor</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bold d-block mb-1 fs-6">1,240</span>
                                            <span class="fw-semibold text-gray-400 d-block">Deliveries</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary d-block mb-1 fs-6">5,400 KWD</a>
                                            <span class="text-gray-400 fw-semibold d-block fs-7">Earnings</span>
                                        </td>
                                        <td class="float-end text-end border-0">
                                            <div class="rating">
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                            </div>
                                            <span class="text-gray-400 fw-semibold d-block fs-7 mt-1">Rating</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-25px h-25px">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                                <span class="svg-icon svg-icon-5 svg-icon-gray-700">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="currentColor"></path>
																					<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="currentColor"></path>
																				</svg>
																			</span>
                                                <!--end::Svg Icon-->
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol- symbol-40px me-3">
                                                    <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">CodeLab Boutique</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Code Lab Vendor</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bold d-block mb-1 fs-6">1,240</span>
                                            <span class="fw-semibold text-gray-400 d-block">Deliveries</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary d-block mb-1 fs-6">5,400 KWD</a>
                                            <span class="text-gray-400 fw-semibold d-block fs-7">Earnings</span>
                                        </td>
                                        <td class="float-end text-end border-0">
                                            <div class="rating">
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                            </div>
                                            <span class="text-gray-400 fw-semibold d-block fs-7 mt-1">Rating</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-25px h-25px">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                                <span class="svg-icon svg-icon-5 svg-icon-gray-700">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="currentColor"></path>
																					<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="currentColor"></path>
																				</svg>
																			</span>
                                                <!--end::Svg Icon-->
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol- symbol-40px me-3">
                                                    <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">CodeLab Boutique</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Code Lab Vendor</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bold d-block mb-1 fs-6">1,240</span>
                                            <span class="fw-semibold text-gray-400 d-block">Deliveries</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary d-block mb-1 fs-6">5,400 KWD</a>
                                            <span class="text-gray-400 fw-semibold d-block fs-7">Earnings</span>
                                        </td>
                                        <td class="float-end text-end border-0">
                                            <div class="rating">
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                            </div>
                                            <span class="text-gray-400 fw-semibold d-block fs-7 mt-1">Rating</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-25px h-25px">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                                <span class="svg-icon svg-icon-5 svg-icon-gray-700">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="currentColor"></path>
																					<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="currentColor"></path>
																				</svg>
																			</span>
                                                <!--end::Svg Icon-->
                                            </a>
                                        </td>
                                    </tr><tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol- symbol-40px me-3">
                                                    <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">CodeLab Boutique</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Code Lab Vendor</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bold d-block mb-1 fs-6">1,240</span>
                                            <span class="fw-semibold text-gray-400 d-block">Deliveries</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary d-block mb-1 fs-6">5,400 KWD</a>
                                            <span class="text-gray-400 fw-semibold d-block fs-7">Earnings</span>
                                        </td>
                                        <td class="float-end text-end border-0">
                                            <div class="rating">
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                            </div>
                                            <span class="text-gray-400 fw-semibold d-block fs-7 mt-1">Rating</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-25px h-25px">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                                <span class="svg-icon svg-icon-5 svg-icon-gray-700">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="currentColor"></path>
																					<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="currentColor"></path>
																				</svg>
																			</span>
                                                <!--end::Svg Icon-->
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol- symbol-40px me-3">
                                                    <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">CodeLab Boutique</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Code Lab Vendor</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bold d-block mb-1 fs-6">1,240</span>
                                            <span class="fw-semibold text-gray-400 d-block">Deliveries</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary d-block mb-1 fs-6">5,400 KWD</a>
                                            <span class="text-gray-400 fw-semibold d-block fs-7">Earnings</span>
                                        </td>
                                        <td class="float-end text-end border-0">
                                            <div class="rating">
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                                <div class="rating-label checked">
                                                    <i class="bi bi-star-fill fs-6s"></i>
                                                </div>
                                            </div>
                                            <span class="text-gray-400 fw-semibold d-block fs-7 mt-1">Rating</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-25px h-25px">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                                <span class="svg-icon svg-icon-5 svg-icon-gray-700">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="currentColor"></path>
																					<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="currentColor"></path>
																				</svg>
																			</span>
                                                <!--end::Svg Icon-->
                                            </a>
                                        </td>
                                    </tr>

                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--end: Card Body-->
                    </div>
                    <!--end::Table widget 13-->
                </div>
                <!--end::Col-->
            </div>
            <!-- row end -->
            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-8">
                    <!--begin::Table Widget 5-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Card header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Stock Report</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Total 2,356 Items in the Stock</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Actions-->
                            <div class="card-toolbar">
                                <!--begin::Filters-->
                                <div class="d-flex flex-stack flex-wrap gap-4">

                                    <!--begin::Search-->
                                    <a href="#" class="btn btn-light btn-sm">View Stock</a>
                                    <!--end::Search-->
                                </div>
                                <!--begin::Filters-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Table-->
                            <div id="kt_table_widget_5_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive"><table class="table align-middle table-row-dashed fs-6 gy-3 dataTable no-footer" id="kt_table_widget_5_table">
                                        <!--begin::Table head-->
                                        <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1" aria-label="Item: activate to sort column ascending" style="width: 100px;">Item</th>
                                            <th class="text-end pe-3 min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Product ID" style="width: 100px;">SKU</th>
                                            <th class="text-end pe-3 min-w-150px sorting" tabindex="0" aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1" aria-label="Date Added: activate to sort column ascending" style="width: 150px;">Date Added</th>
                                            <th class="text-end pe-3 min-w-100px sorting" tabindex="0" aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 100px;">Price</th>
                                            <th class="text-end pe-3 min-w-50px sorting" tabindex="0" aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 100.383px;">Status</th>
                                            <th class="text-end pe-0 min-w-25px sorting" tabindex="0" aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1" aria-label="Qty: activate to sort column ascending" style="width: 28.4609px;">Qty</th></tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fw-bold text-gray-600">
                                        <tr class="odd">
                                            <!--begin::Item-->
                                            <td>
                                                <a href="" class="text-dark text-hover-primary">Macbook Air M1</a>
                                            </td>
                                            <!--end::Item-->
                                            <!--begin::Product ID-->
                                            <td class="text-end">#XGY-356</td>
                                            <!--end::Product ID-->
                                            <!--begin::Date added-->
                                            <td class="text-end" data-order="2022-04-20T00:00:00+05:30">02 Apr, 2022</td>
                                            <!--end::Date added-->
                                            <!--begin::Price-->
                                            <td class="text-end">1,230 KWD</td>
                                            <!--end::Price-->
                                            <!--begin::Status-->
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                            </td>
                                            <!--end::Status-->
                                            <!--begin::Qty-->
                                            <td class="text-end" data-order="58">
                                                <span class="text-dark fw-bold">58 PCS</span>
                                            </td>
                                            <!--end::Qty-->
                                        </tr><tr class="even">
                                            <!--begin::Item-->
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">Surface Laptop 4</a>
                                            </td>
                                            <!--end::Item-->
                                            <!--begin::Product ID-->
                                            <td class="text-end">#YHD-047</td>
                                            <!--end::Product ID-->
                                            <!--begin::Date added-->
                                            <td class="text-end" data-order="2022-04-20T00:00:00+05:30">01 Apr, 2022</td>
                                            <!--end::Date added-->
                                            <!--begin::Price-->
                                            <td class="text-end">1,060 KWD</td>
                                            <!--end::Price-->
                                            <!--begin::Status-->
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-danger">Out of Stock</span>
                                            </td>
                                            <!--end::Status-->
                                            <!--begin::Qty-->
                                            <td class="text-end" data-order="0">
                                                <span class="text-dark fw-bold">0 PCS</span>
                                            </td>
                                            <!--end::Qty-->
                                        </tr><tr class="odd">
                                            <!--begin::Item-->
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">Logitech MX 250</a>
                                            </td>
                                            <!--end::Item-->
                                            <!--begin::Product ID-->
                                            <td class="text-end">#SRR-678</td>
                                            <!--end::Product ID-->
                                            <!--begin::Date added-->
                                            <td class="text-end" data-order="2022-03-20T00:00:00+05:30">24 Mar, 2022</td>
                                            <!--end::Date added-->
                                            <!--begin::Price-->
                                            <td class="text-end">64 KWD</td>
                                            <!--end::Price-->
                                            <!--begin::Status-->
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                            </td>
                                            <!--end::Status-->
                                            <!--begin::Qty-->
                                            <td class="text-end" data-order="290">
                                                <span class="text-dark fw-bold">290 PCS</span>
                                            </td>
                                            <!--end::Qty-->
                                        </tr><tr class="even">
                                            <!--begin::Item-->
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">AudioEngine HD3</a>
                                            </td>
                                            <!--end::Item-->
                                            <!--begin::Product ID-->
                                            <td class="text-end">#PXF-578</td>
                                            <!--end::Product ID-->
                                            <!--begin::Date added-->
                                            <td class="text-end" data-order="2022-03-20T00:00:00+05:30">24 Mar, 2022</td>
                                            <!--end::Date added-->
                                            <!--begin::Price-->
                                            <td class="text-end">1,060 KWD</td>
                                            <!--end::Price-->
                                            <!--begin::Status-->
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-danger">Out of Stock</span>
                                            </td>
                                            <!--end::Status-->
                                            <!--begin::Qty-->
                                            <td class="text-end" data-order="46">
                                                <span class="text-dark fw-bold">46 PCS</span>
                                            </td>
                                            <!--end::Qty-->
                                        </tr><tr class="odd">
                                            <!--begin::Item-->
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">HP Hyper LTR</a>
                                            </td>
                                            <!--end::Item-->
                                            <!--begin::Product ID-->
                                            <td class="text-end">#PXF-778</td>
                                            <!--end::Product ID-->
                                            <!--begin::Date added-->
                                            <td class="text-end" data-order="2022-01-20T00:00:00+05:30">16 Jan, 2022</td>
                                            <!--end::Date added-->
                                            <!--begin::Price-->
                                            <td class="text-end">4500 KWD</td>
                                            <!--end::Price-->
                                            <!--begin::Status-->
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                            </td>
                                            <!--end::Status-->
                                            <!--begin::Qty-->
                                            <td class="text-end" data-order="78">
                                                <span class="text-dark fw-bold">78 PCS</span>
                                            </td>
                                            <!--end::Qty-->
                                        </tr><tr class="even">
                                            <!--begin::Item-->
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">Dell 32 UltraSharp</a>
                                            </td>
                                            <!--end::Item-->
                                            <!--begin::Product ID-->
                                            <td class="text-end">#XGY-356</td>
                                            <!--end::Product ID-->
                                            <!--begin::Date added-->
                                            <td class="text-end" data-order="2022-12-20T00:00:00+05:30">22 Dec, 2022</td>
                                            <!--end::Date added-->
                                            <!--begin::Price-->
                                            <td class="text-end">1,060 KWD</td>
                                            <!--end::Price-->
                                            <!--begin::Status-->
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-warning">Low Stock</span>
                                            </td>
                                            <!--end::Status-->
                                            <!--begin::Qty-->
                                            <td class="text-end" data-order="8">
                                                <span class="text-dark fw-bold">8 PCS</span>
                                            </td>
                                            <!--end::Qty-->
                                        </tr><tr class="odd">
                                            <!--begin::Item-->
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">Google Pixel 6 Pro</a>
                                            </td>
                                            <!--end::Item-->
                                            <!--begin::Product ID-->
                                            <td class="text-end">#XVR-425</td>
                                            <!--end::Product ID-->
                                            <!--begin::Date added-->
                                            <td class="text-end" data-order="2022-12-20T00:00:00+05:30">27 Dec, 2022</td>
                                            <!--end::Date added-->
                                            <!--begin::Price-->
                                            <td class="text-end">1,060 KWD</td>
                                            <!--end::Price-->
                                            <!--begin::Status-->
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                            </td>
                                            <!--end::Status-->
                                            <!--begin::Qty-->
                                            <td class="text-end" data-order="124">
                                                <span class="text-dark fw-bold">124 PCS</span>
                                            </td>
                                            <!--end::Qty-->
                                        </tr></tbody>
                                        <!--end::Table body-->
                                    </table></div><div class="row"><div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div><div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"></div></div></div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Table Widget 5-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::List widget 5-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Product Delivery</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">1M Products Shipped so far</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-sm btn-light">Order Details</a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Scroll-->
                            <div class="hover-scroll-overlay-y pe-6 me-n6" style="height: 415px">
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="{{ asset('assets/media/stock/ecommerce/210.gif') }}" class="w-50px ms-n1 me-1" alt="">
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold">Elephant 1802</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Action-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
																<a href="#" class="text-gray-800 text-hover-primary fw-bold">Jason Bourne</a></span>
                                        <!--end::Name-->
                                        <!--begin::Label-->
                                        <span class="badge badge-light-success">Delivered</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="{{ asset('assets/media/stock/ecommerce/209.gif') }}" class="w-50px ms-n1 me-1" alt="">
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold">RiseUP</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
																<a href="#" class="text-gray-800 text-hover-primary fw-bold">Marie Durant</a></span>
                                        <!--end::Name-->
                                        <!--begin::Label-->
                                        <span class="badge badge-light-primary">Shipping</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="{{ asset('assets/media/stock/ecommerce/214.gif') }}" class="w-50px ms-n1 me-1" alt="">
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold">Yellow Stone</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->

                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
																<a href="#" class="text-gray-800 text-hover-primary fw-bold">Dan Wilson</a></span>
                                        <!--end::Name-->
                                        <!--begin::Label-->
                                        <span class="badge badge-light-danger">Confirmed</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="{{ asset('assets/media/stock/ecommerce/211.gif') }}" class="w-50px ms-n1 me-1" alt="">
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold">Elephant 1802</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
																<a href="#" class="text-gray-800 text-hover-primary fw-bold">Lebron Wayde</a></span>
                                        <!--end::Name-->
                                        <!--begin::Label-->
                                        <span class="badge badge-light-success">Delivered</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="{{ asset('assets/media/stock/ecommerce/215.gif') }}" class="w-50px ms-n1 me-1" alt="">
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold">RiseUP</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->

                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
																<a href="#" class="text-gray-800 text-hover-primary fw-bold">Ana Simmons</a></span>
                                        <!--end::Name-->
                                        <!--begin::Label-->
                                        <span class="badge badge-light-primary">Shipping</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="border border-dashed border-gray-300 rounded px-7 py-3">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-stack mb-3">
                                        <!--begin::Wrapper-->
                                        <div class="me-3">
                                            <!--begin::Icon-->
                                            <img src="{{ asset('assets/media/stock/ecommerce/192.gif') }}" class="w-50px ms-n1 me-1" alt="">
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold">Yellow Stone</a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Customer-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Name-->
                                        <span class="text-gray-400 fw-bold">To:
																<a href="#" class="text-gray-800 text-hover-primary fw-bold">Kevin Leonard</a></span>
                                        <!--end::Name-->
                                        <!--begin::Label-->
                                        <span class="badge badge-light-danger">Confirmed</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Customer-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Scroll-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List widget 5-->
                </div>
                <!--end::Col-->
            </div>
            <!-- row end -->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
    @push('head-scripts')
        <!--begin::Vendor Stylesheets(used for this page only)-->
        <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Vendor Stylesheets-->
    @endpush

    @push('footer-scripts')
        <!--begin::Custom Javascript(used for this page only)-->
       <script type="text/javascript">
           var KTChartsWidget3 = function() {
               var e = {
                       self: null,
                       rendered: !1
                   },
                   t = function(e) {
                       var t = document.getElementById("kt_charts_widget_3");
                       if (t) {
                           var a = parseInt(KTUtil.css(t, "height")),
                               l = KTUtil.getCssVariableValue("--kt-gray-500"),
                               r = KTUtil.getCssVariableValue("--kt-border-dashed-color"),
                               o = KTUtil.getCssVariableValue("--kt-success"),
                               i = {
                                   series: [{
                                       name: "Sales",
                                       data: [18, 18, 20, 20, 18, 18, 22, 22, 20, 20, 18, 18]
                                   }],
                                   chart: {
                                       fontFamily: "inherit",
                                       type: "area",
                                       height: a,
                                       toolbar: {
                                           show: !1
                                       }
                                   },
                                   plotOptions: {},
                                   legend: {
                                       show: !1
                                   },
                                   dataLabels: {
                                       enabled: !1
                                   },
                                   fill: {
                                       type: "gradient",
                                       gradient: {
                                           shadeIntensity: 1,
                                           opacityFrom: .4,
                                           opacityTo: 0,
                                           stops: [0, 80, 100]
                                       }
                                   },
                                   stroke: {
                                       curve: "smooth",
                                       show: !0,
                                       width: 3,
                                       colors: [o]
                                   },
                                   xaxis: {
                                       categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                                       axisBorder: {
                                           show: !1
                                       },
                                       axisTicks: {
                                           show: !1
                                       },
                                       tickAmount: 6,
                                       labels: {
                                           rotate: 0,
                                           rotateAlways: !0,
                                           style: {
                                               colors: l,
                                               fontSize: "12px"
                                           }
                                       },
                                       crosshairs: {
                                           position: "front",
                                           stroke: {
                                               color: o,
                                               width: 1,
                                               dashArray: 3
                                           }
                                       },
                                       tooltip: {
                                           enabled: !0,
                                           formatter: void 0,
                                           offsetY: 0,
                                           style: {
                                               fontSize: "12px"
                                           }
                                       }
                                   },
                                   yaxis: {
                                       tickAmount: 4,
                                       max: 24,
                                       min: 10,
                                       labels: {
                                           style: {
                                               colors: l,
                                               fontSize: "12px"
                                           },
                                           formatter: function(e) {
                                               return "" + e + " KWD"
                                           }
                                       }
                                   },
                                   states: {
                                       normal: {
                                           filter: {
                                               type: "none",
                                               value: 0
                                           }
                                       },
                                       hover: {
                                           filter: {
                                               type: "none",
                                               value: 0
                                           }
                                       },
                                       active: {
                                           allowMultipleDataPointsSelection: !1,
                                           filter: {
                                               type: "none",
                                               value: 0
                                           }
                                       }
                                   },
                                   tooltip: {
                                       style: {
                                           fontSize: "12px"
                                       },
                                       y: {
                                           formatter: function(e) {
                                               return "" + e + " KWD"
                                           }
                                       }
                                   },
                                   colors: [KTUtil.getCssVariableValue("--kt-success")],
                                   grid: {
                                       borderColor: r,
                                       strokeDashArray: 4,
                                       yaxis: {
                                           lines: {
                                               show: !0
                                           }
                                       }
                                   },
                                   markers: {
                                       strokeColor: o,
                                       strokeWidth: 3
                                   }
                               };
                           e.self = new ApexCharts(t, i), setTimeout((function() {
                               e.self.render(), e.rendered = !0
                           }), 200)
                       }
                   };
               return {
                   init: function() {
                       t(e), KTThemeMode.on("kt.thememode.change", (function() {
                           e.rendered && e.self.destroy(), t(e)
                       }))
                   }
               }
           }();
           "undefined" != typeof module && (module.exports = KTChartsWidget3), KTUtil.onDOMContentLoaded((function() {
               KTChartsWidget3.init()
           }));


           var KTCardsWidget6 = {
               init: function() {
                   ! function() {
                       var e = document.getElementById("kt_card_widget_6_chart");
                       if (e) {
                           var t = parseInt(KTUtil.css(e, "height")),
                               a = KTUtil.getCssVariableValue("--kt-gray-500"),
                               l = KTUtil.getCssVariableValue("--kt-border-dashed-color"),
                               r = KTUtil.getCssVariableValue("--kt-primary"),
                               o = KTUtil.getCssVariableValue("--kt-gray-300"),
                               i = new ApexCharts(e, {
                                   series: [{
                                       name: "Sales",
                                       data: [30, 60, 53, 45, 60, 75, 53, 30, 60, 53, 45, 60, 75, 53, 30]
                                   }],
                                   chart: {
                                       fontFamily: "inherit",
                                       type: "bar",
                                       height: t,
                                       toolbar: {
                                           show: !1
                                       },
                                       sparkline: {
                                           enabled: !0
                                       }
                                   },
                                   plotOptions: {
                                       bar: {
                                           horizontal: !1,
                                           columnWidth: ["55%"],
                                           borderRadius: 6
                                       }
                                   },
                                   legend: {
                                       show: !1
                                   },
                                   dataLabels: {
                                       enabled: !1
                                   },
                                   stroke: {
                                       show: !0,
                                       width: 9,
                                       colors: ["transparent"]
                                   },
                                   xaxis: {
                                       axisBorder: {
                                           show: !1
                                       },
                                       axisTicks: {
                                           show: !1,
                                           tickPlacement: "between"
                                       },
                                       labels: {
                                           show: !1,
                                           style: {
                                               colors: a,
                                               fontSize: "12px"
                                           }
                                       },
                                       crosshairs: {
                                           show: !1
                                       }
                                   },
                                   yaxis: {
                                       labels: {
                                           show: !1,
                                           style: {
                                               colors: a,
                                               fontSize: "12px"
                                           }
                                       }
                                   },
                                   fill: {
                                       type: "solid"
                                   },
                                   states: {
                                       normal: {
                                           filter: {
                                               type: "none",
                                               value: 0
                                           }
                                       },
                                       hover: {
                                           filter: {
                                               type: "none",
                                               value: 0
                                           }
                                       },
                                       active: {
                                           allowMultipleDataPointsSelection: !1,
                                           filter: {
                                               type: "none",
                                               value: 0
                                           }
                                       }
                                   },
                                   tooltip: {
                                       style: {
                                           fontSize: "12px"
                                       },
                                       x: {
                                           formatter: function(e) {
                                               return "Nov: " + e
                                           }
                                       },
                                       y: {
                                           formatter: function(e) {
                                               return e + "%"
                                           }
                                       }
                                   },
                                   colors: [r, o],
                                   grid: {
                                       padding: {
                                           left: 10,
                                           right: 10
                                       },
                                       borderColor: l,
                                       strokeDashArray: 4,
                                       yaxis: {
                                           lines: {
                                               show: !0
                                           }
                                       }
                                   }
                               });
                           setTimeout((function() {
                               i.render()
                           }), 300)
                       }
                   }()
               }
           };
           "undefined" != typeof module && (module.exports = KTCardsWidget6), KTUtil.onDOMContentLoaded((function() {
               KTCardsWidget6.init()
           }));


           var KTChartsWidget18 = function() {
               var e = {
                       self: null,
                       rendered: !1
                   },
                   t = function(e) {
                       var t = document.getElementById("kt_charts_widget_18_chart");
                       if (t) {
                           var a = parseInt(KTUtil.css(t, "height")),
                               l = KTUtil.getCssVariableValue("--kt-gray-900"),
                               r = KTUtil.getCssVariableValue("--kt-border-dashed-color"),
                               o = {
                                   series: [{
                                       name: "Signed Up",
                                       data: [54, 42, 75, 110, 23, 87, 50, 85, 10, 55, 44, 0]
                                   }],
                                   chart: {
                                       fontFamily: "inherit",
                                       type: "bar",
                                       height: a,
                                       toolbar: {
                                           show: !1
                                       }
                                   },
                                   plotOptions: {
                                       bar: {
                                           horizontal: !1,
                                           columnWidth: ["28%"],
                                           borderRadius: 5,
                                           dataLabels: {
                                               position: "top"
                                           },
                                           startingShape: "flat"
                                       }
                                   },
                                   legend: {
                                       show: !1
                                   },
                                   dataLabels: {
                                       enabled: !0,
                                       offsetY: -28,
                                       style: {
                                           fontSize: "13px",
                                           colors: [l]
                                       },
                                       formatter: function(e) {
                                           return e
                                       }
                                   },
                                   stroke: {
                                       show: !0,
                                       width: 2,
                                       colors: ["transparent"]
                                   },
                                   xaxis: {
                                       categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                                       axisBorder: {
                                           show: !1
                                       },
                                       axisTicks: {
                                           show: !1
                                       },
                                       labels: {
                                           style: {
                                               colors: KTUtil.getCssVariableValue("--kt-gray-500"),
                                               fontSize: "13px"
                                           }
                                       },
                                       crosshairs: {
                                           fill: {
                                               gradient: {
                                                   opacityFrom: 0,
                                                   opacityTo: 0
                                               }
                                           }
                                       }
                                   },
                                   yaxis: {
                                       labels: {
                                           style: {
                                               colors: KTUtil.getCssVariableValue("--kt-gray-500"),
                                               fontSize: "13px"
                                           },
                                           formatter: function(e) {
                                               return e + ""
                                           }
                                       }
                                   },
                                   fill: {
                                       opacity: 1
                                   },
                                   states: {
                                       normal: {
                                           filter: {
                                               type: "none",
                                               value: 0
                                           }
                                       },
                                       hover: {
                                           filter: {
                                               type: "none",
                                               value: 0
                                           }
                                       },
                                       active: {
                                           allowMultipleDataPointsSelection: !1,
                                           filter: {
                                               type: "none",
                                               value: 0
                                           }
                                       }
                                   },
                                   tooltip: {
                                       style: {
                                           fontSize: "12px"
                                       },
                                       y: {
                                           formatter: function(e) {
                                               return +e + " Users"
                                           }
                                       }
                                   },
                                   colors: [KTUtil.getCssVariableValue("--kt-primary"), KTUtil.getCssVariableValue("--kt-primary-light")],
                                   grid: {
                                       borderColor: r,
                                       strokeDashArray: 4,
                                       yaxis: {
                                           lines: {
                                               show: !0
                                           }
                                       }
                                   }
                               };
                           e.self = new ApexCharts(t, o), setTimeout((function() {
                               e.self.render(), e.rendered = !0
                           }), 200)
                       }
                   };
               return {
                   init: function() {
                       t(e), KTThemeMode.on("kt.thememode.change", (function() {
                           e.rendered && e.self.destroy(), t(e)
                       }))
                   }
               }
           }();
           "undefined" != typeof module && (module.exports = KTChartsWidget18), KTUtil.onDOMContentLoaded((function() {
               KTChartsWidget18.init()
           }));

       </script>
        <!--end::Custom Javascript-->

        <!--begin::Vendors Javascript(used for this page only)-->
        <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <script src="{{ asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
        <!--end::Vendors Javascript-->
    @endpush
@endsection
