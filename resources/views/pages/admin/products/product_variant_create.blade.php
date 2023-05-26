<form class="form  mx-auto" novalidate="novalidate" id="addProductVariantForm">
    <input type="hidden" value="{{ $product->id }}" name="product_id">
<div class="row g-9 mb-7">
    <div class="col-md-12 fv-row fv-plugins-icon-container">
        <label class="required fs-6 fw-semibold mb-2">{{ __('messages.product_sku') }}</label>
        <input type="text" class="form-control" placeholder="{{ __('messages.product_sku') }}" name="sku" dir="ltr">                                                           <!--end::Input-->
        <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
</div>
<div class="row g-9 mb-7">
    @foreach($attributes as $key => $attribute)
    <div class="col-md-6 fv-row fv-plugins-icon-container">
        <label class="required fs-6 fw-semibold mb-2">{{ $attribute->getAttributeName() }}</label>
        <input type="hidden" name="product_attribute[]" value="{{$attribute->id}}">
        <select class="form-select attribute-select" name="attribute_value[]" data-control="select2" data-placeholder="{{ __('messages.select_any') }}" data-allow-clear="true">
            <option></option>
            @foreach($attribute->attribute_values as $key2 => $attribute_value)
            <option value="{{ $attribute_value->id }}">{{ $attribute_value->getAttributeValueName() }}</option>
            @endforeach
        </select>
        <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
    @endforeach
</div>

<div class="row g-9 mb-7">
    @if($product->sale_type == 'Sale')
        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.quantity') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('messages.quantity') }}" name="quantity" dir="ltr">                                                           <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.product_regular_price') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('messages.product_regular_price') }}" name="regular_price" dir="ltr">                                                           <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.product_final_price') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('messages.product_final_price') }}" name="final_price" dir="ltr">                                                           <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    @elseif($product->sale_type == 'Auction')
        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.quantity') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('messages.quantity') }}" name="quantity" dir="ltr">                                                           <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.bid_value') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('messages.bid_value') }}" name="bid_value" dir="ltr">                                                           <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.bid_start_price') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('messages.bid_start_price') }}" name="bid_start_price" dir="ltr">                                                           <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.estimate_start_price') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('messages.estimate_start_price') }}" name="estimate_start_price" dir="ltr">                                                           <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.estimate_end_price') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('messages.estimate_end_price') }}" name="estimate_end_price" dir="ltr">                                                           <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    @endif
</div>
<div class="row g-9 mb-7">
    <div class="col-md-6 fv-row fv-plugins-icon-container">
        <label class="fs-6 fw-semibold mb-2">{{ __('messages.offer_text') }} ({{ __('messages.en') }})</label>
        <input type="text" class="form-control" placeholder="{{ __('messages.offer_text') }} ({{ __('messages.en') }})" name="offer_text" dir="ltr">                                                           <!--end::Input-->
        <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
    <div class="col-md-6 fv-row fv-plugins-icon-container">
        <label class="fs-6 fw-semibold mb-2">{{ __('messages.offer_text') }} ({{ __('messages.ar') }})</label>
        <input type="text" class="form-control" placeholder="{{ __('messages.offer_text') }} ({{ __('messages.ar') }})" name="offer_text_ar" dir="rtl">                                                           <!--end::Input-->
        <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
</div>
    <div class="row g-9 mb-7">
        <div class="col-md-12 fv-row fv-plugins-icon-container">
            <label class="fs-6 fw-semibold mb-2">{{ __('messages.status') }}</label>
            <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                <input class="form-check-input" name="status" type="checkbox" checked value="1" id="status">
            </div>
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    </div>
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
    <button id="createProductVariantButton" class="btn btn-primary float-end mb-5">
        <span class="indicator-label">{{ __('messages.save') }}</span>
        <span class="indicator-progress">{{ __('messages.please_wait') }}
		 <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
    </button>
</form>
