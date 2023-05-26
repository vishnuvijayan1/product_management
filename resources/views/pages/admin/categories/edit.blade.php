<!--begin::Toolbar-->
<div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
    <!--begin::Add customer-->
    @if(!$category->sub_categories->count())
    <button class="btn btn-icon btn-active-light-primary w-30px h-30px"  onclick="deleteCategory({{ $category->id }})" >
        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
        <span class="svg-icon svg-icon-3">
          <i class="bi bi-trash-fill text-danger fs-1"></i>
		</span>
        <!--end::Svg Icon-->
    </button>
    @endif
    <button class="btn btn-icon btn-active-light-primary w-30px h-30px"  onclick="getCategoryAddForm()" >
        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
        <span class="svg-icon svg-icon-3">
          <i class="bi bi-plus-square-fill text-success fs-1"></i>
		</span>
        <!--end::Svg Icon-->
    </button>

    <!--end::Add customer-->
</div>
<!--end::Toolbar-->
<!--begin::Form-->
<form class="form" action="#" id="editCategoryForm" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="id" value="{{ $category->id }}">
    <!--begin::Modal body-->
    <div class="modal-body py-10 px-lg-17">
        <!--begin::Scroll-->
        <div class="scroll-y me-n7 pe-7" id="categoryAddModalScroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#category_add_modal_header" data-kt-scroll-wrappers="#categoryAddModalScroll" data-kt-scroll-offset="300px">
            <!--begin::Input group-->
            <div class="row g-9 mb-7">
                <!--begin::Col-->
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">{{ __('messages.category_name') }} ({{ __('messages.en') }})</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text"class="form-control" placeholder="{{ __('messages.category_name') }} ({{ __('messages.en') }})" name="name" dir="ltr" value="{{ $category->name }}">
                    <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">{{ __('messages.category_name') }} ({{ __('messages.ar') }})</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control" placeholder="{{ __('messages.category_name') }} ({{ __('messages.ar') }})" name="name_ar" dir="rtl" value="{{ $category->name_ar }}">
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
                    <label class="fs-6 fw-semibold mb-2">
                        <span class="required">{{ __('messages.category_parent_name') }}</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->

                    <select name="category_parent" id="category_parent" aria-label="{{ __('messages.select_any') }}" data-control="select2" data-placeholder="{{ __('messages.select_any') }}" class="form-select form-select-solid fw-bold">
                        <option value="0">{{ __('messages.no_parent') }}</option>
                        @foreach ($categories as $category_item)
                        <option value="{{ $category_item->id }}" @if($category->parent_id == $category_item->id) selected @endif>{{ $category_item->name }}</option>
                       @endforeach
                    </select>
                    <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold mb-2">{{ __('messages.hide_in_app') }}</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                        <input class="form-check-input" name="hide_in_app" type="checkbox" value="1" id="hide_in_app" @if(!$category->shown_in_app) checked @endif/>
                    </div>
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row g-9 mb-7">
                <!--begin::Col-->
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--begin::Input-->
                    <label class=" fs-6 fw-semibold mb-2">{{ __('messages.image') }} ({{ __('messages.en') }})</label> <br>
                    <div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url('{{ ($category->image) ? asset('storage/uploads/categories/thumb/'.$category->image) : asset('assets/media/svg/files/blank-image.svg') }}')">
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
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <!--begin::Input-->
                    <label class=" fs-6 fw-semibold mb-2">{{ __('messages.image') }} ({{ __('messages.ar') }})</label> <br>
                    <div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url('{{ ($category->image_ar) ? asset('storage/uploads/categories/thumb/'.$category->image_ar) : asset('assets/media/svg/files/blank-image.svg') }}')">
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
                            <input type="file" name="image_ar" accept="image/*" />
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
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
        </div>
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
<!--end::Form-->
