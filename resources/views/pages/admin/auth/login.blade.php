@include('layouts.admin.partials.admin_head')
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="app-blank app-blank">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
<!--end::Theme mode setup on page load-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Logo-->
        <a href="" class="d-block d-lg-none mx-auto py-20">
            <img alt="Logo" src="{{ asset('assets/media/logos/default.svg') }}" class="theme-light-show h-25px" />
            <img alt="Logo" src="{{ asset('assets/media/logos/default-dark.svg') }}" class="theme-dark-show h-25px" />
        </a>
        <!--end::Logo-->
        <!--begin::Aside-->
        <div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
            <!--begin::Wrapper-->
            <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
                <!--begin::Header-->
                <div class="d-flex flex-stack py-2">
                    <!--begin::Back link-->
                    <div class="me-2"></div>
                    <!--end::Back link-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="py-20">
                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" id="admin_login_form" action="#">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Heading-->
                            <div class="text-start mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-in-title">{{ __('messages.sign_in') }}</h1>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="general-desc">{{ __('messages.admin_welcome_title') }}</div>
                                <!--end::Link-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="{{ __('messages.email') }}" name="email" id="email" autocomplete="off" class="form-control" />
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-7">
                                <!--begin::Password-->
                                <input type="password" placeholder="{{ __('messages.password') }}" name="password" id="password" autocomplete="off"  class="form-control" />
                                <!--end::Password-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-10">
                                <div></div>
                                <!--begin::Link-->
                                <a href="" class="link-primary" data-kt-translate="sign-in-forgot-password">{{ __('messages.forgot_password') }}</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Actions-->
                            <div class="d-flex flex-stack">
                                <!--begin::Submit-->
                                <button id="login_button" class="btn btn-primary me-2 flex-shrink-0">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label" data-kt-translate="sign-in-submit">{{ __('messages.sign_in') }}</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">
												<span data-kt-translate="general-progress">{{ __('messages.please_wait') }}</span>
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
											</span>
                                    <!--end::Indicator progress-->
                                </button>
                                <!--end::Submit-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--begin::Body-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="m-0">
                    <!--begin::Toggle-->
                    <button class="btn btn-flex btn-link rotate" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, 0px">
                       @if(session()->get('locale') == 'ar')
                           <img  class="w-25px h-25px rounded-circle me-3" src="{{ asset('assets/media/flags/kuwait.svg') }}" alt="" />
                            <span class="me-2">{{ __('messages.arabic') }}</span>
                        @else
                            <img  class="w-25px h-25px rounded-circle me-3" src="{{ asset('assets/media/flags/united-states.svg') }}" alt="" />
                            <span class="me-2">{{ __('messages.english') }}</span>
                        @endif
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                        <span class="svg-icon svg-icon-3 svg-icon-muted rotate-180 m-0">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
									</svg>
								</span>
                        <!--end::Svg Icon-->
                    </button>
                    <!--end::Toggle-->
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4" data-kt-menu="true" id="kt_auth_lang_menu">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="{{ url('admin/change-language?language=en') }}" class="menu-link d-flex px-5 @if(session()->get('locale') == 'en') active @endif">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="{{ asset('assets/media/flags/united-states.svg') }}" alt="" />
										</span>
                                <span>{{ __('messages.english') }}</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="{{ url('admin/change-language?language=ar') }}" class="menu-link d-flex px-5 @if(session()->get('locale') == 'ar') active @endif">
										<span class="symbol symbol-20px me-4">
											<img class="rounded-1" src="{{ asset('assets/media/flags/kuwait.svg') }}" alt="" />
										</span>
                                <span>{{ __('messages.arabic') }}</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Aside-->
        <!--begin::Body-->
        <div class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat" style="background-image: url({{ asset('assets/media/auth/bg10-dark-2.jpg') }})"></div>
        <!--begin::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->
<!--begin::Javascript-->
@include('layouts.admin.partials.admin_scripts')
<!--begin::Custom Javascript(used for this page only)-->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#login_button").click(function(e){
        e.preventDefault();
        var login_button = document.querySelector("#login_button");
        var admin_login_form = $("#admin_login_form");
        admin_login_form.validate({
           // lang:'ar',
            rules: {

                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                },
            },
            // messages : {
            //     email: {
            //         required: "Please Enter Email",
            //         email: "Please Enter Valid Email"
            //     },
            //     password: {
            //         required: "Please Enter Password",
            //     },
            // }
        });
        if (!admin_login_form.valid())
        {
            return;
        }
        login_button.setAttribute("data-kt-indicator", "on");
        var email = $("#email").val();
        var password = $("#password").val();
        $.ajax({
            type:'POST',
            url:"{{ route('admin.login') }}",
            data:{email:email, password:password},
            success:function(data){
                login_button.removeAttribute("data-kt-indicator", "on");
                if(data.success == true)
                {
                    printSingleSuccessToast(data.message);
                    window.location.href = data.url
                }
                else if(data.success == false)
                {
                    if($.isEmptyObject(data.error))
                    {
                        printSingleErrorToast(data.message);
                    }
                    else
                    {
                        printMultipleErrorToast(data.errors);
                    }
                }
            },
            error: function(xhr, status, error){
                printSingleErrorToast(error);
            },
        });

    });
</script>
<!--end::Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
