@php
    if(isset($_COOKIE["time_zone"])){ $time_zone = getLocalTimeZone($_COOKIE["time_zone"]); } else {$time_zone = getLocalTimeZone(); }
@endphp
<div class="row g-9 mb-7">
    <div class="col-md-6 fv-row fv-plugins-icon-container">
        <label class="required fs-6 fw-semibold mb-2">{{ __('messages.product_name') }} ({{ __('messages.en') }})</label>
        <input type="text"class="form-control" placeholder="{{ __('messages.product_name') }} ({{ __('messages.en') }})" name="name" dir="ltr" @if(isset($product)) value="{{ $product->name }}" @endif>
        <div class="fv-plugins-message-container invalid-feedback"></div></div>
    <div class="col-md-6 fv-row fv-plugins-icon-container">
        <label class="required fs-6 fw-semibold mb-2">{{ __('messages.product_name') }} ({{ __('messages.ar') }})</label>
        <input type="text" class="form-control" placeholder="{{ __('messages.product_name') }} ({{ __('messages.ar') }})" name="name_ar" dir="rtl" @if(isset($product)) value="{{ $product->name_ar }}" @endif>
        <div class="fv-plugins-message-container invalid-feedback"></div></div>
</div>
<div class="row g-9 mb-7">
    <div class="col-md-12 fv-row fv-plugins-icon-container">
        <label class="required fs-6 fw-semibold mb-2">{{ __('messages.product_sku') }}</label>
        <input type="text" class="form-control" placeholder="{{ __('messages.product_sku') }}" name="sku" dir="ltr" @if(isset($product_variant)) value="{{ $product_variant->sku }}" @endif>                                                           <!--end::Input-->
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
            @foreach($attribute->attribute_value_items as $key2 => $attribute_value)
            <option value="{{ $attribute_value->id }}" @if(isset($product_variant) && (getProductVariantAttributeValue($product_variant->id, $attribute->id) == $attribute_value->id)) selected @endif>{{ $attribute_value->getAttributeValueName() }}</option>
            @endforeach
        </select>
        <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
    @endforeach
</div>


<div class="row g-9 mb-7">
    @if($sale_type == 'Sale')
        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.quantity') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('messages.quantity') }}" name="quantity" dir="ltr" @if(isset($product_variant)) readonly value="{{ $product_variant->quantity }}" @endif>                                                           <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.product_regular_price') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('messages.product_regular_price') }}" name="regular_price" dir="ltr" @if(isset($product_variant)) value="{{ $product_variant->regular_price }}" @endif>                                                           <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.product_final_price') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('messages.product_final_price') }}" name="final_price" dir="ltr" @if(isset($product_variant)) value="{{ $product_variant->final_price }}" @endif>                                                           <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    @elseif($sale_type == 'Auction')
        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.quantity') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('messages.quantity') }}" name="quantity" dir="ltr" @if(isset($product_variant)) readonly value="{{ $product_variant->quantity }}" @endif>                                                           <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.bid_value') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('messages.bid_value') }}" name="bid_value" dir="ltr" @if(isset($product_variant)) value="{{ $product_variant->bid_value }}" @endif>                                                           <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.bid_start_price') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('messages.bid_start_price') }}" name="bid_start_price" dir="ltr" @if(isset($product_variant)) value="{{ $product_variant->bid_start_price }}" @endif>                                                           <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
       @if(!isset($product_variant))
            <div class="col-md-12 fv-row fv-plugins-icon-container">
                <label class="fs-6 fw-semibold mb-2">{{ __('messages.bid_start_time') }} ~ {{ __('messages.bid_end_time') }}</label>
                <input class="form-control" placeholder="{{ __('messages.bid_start_time') }} ~ {{ __('messages.bid_start_time') }}" name="bid_start_time_end_time" id="bidStartTimeEndTime" readonly/>   <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        @endif
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.estimate_start_price') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('messages.estimate_start_price') }}" name="estimate_start_price"  @if(isset($product_variant)) value="{{ $product_variant->estimate_start_price }}" @endif>                                                           <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">{{ __('messages.estimate_end_price') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('messages.estimate_end_price') }}" name="estimate_end_price" dir="ltr" @if(isset($product_variant)) value="{{ $product_variant->estimate_end_price }}" @endif>                                                           <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    @endif
</div>
<div class="row g-9 mb-7">
    @if($boutique->user->beiaat_handled)
    <div class="col-md-12 fv-row fv-plugins-icon-container">
        <label class="required fs-6 fw-semibold mb-2">{{ __('messages.cost') }}</label>
        <input type="text" class="form-control" placeholder="{{ __('messages.cost') }}" name="cost" @if(isset($product_variant)) value="{{ $product_variant->cost }}" @endif>                                                           <!--end::Input-->
        <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
    @endif
{{--    <div class="col-md-6 fv-row fv-plugins-icon-container">--}}
{{--        <label class="fs-6 fw-semibold mb-2">{{ __('messages.offer_text') }} ({{ __('messages.en') }})</label>--}}
{{--        <input type="text" class="form-control" placeholder="{{ __('messages.offer_text') }} ({{ __('messages.en') }})" name="offer_text" dir="ltr" @if(isset($product_variant)) value="{{ $product_variant->offer_text }}" @endif>                                                           <!--end::Input-->--}}
{{--        <div class="fv-plugins-message-container invalid-feedback"></div>--}}
{{--    </div>--}}
{{--    <div class="col-md-6 fv-row fv-plugins-icon-container">--}}
{{--        <label class="fs-6 fw-semibold mb-2">{{ __('messages.offer_text') }} ({{ __('messages.ar') }})</label>--}}
{{--        <input type="text" class="form-control" placeholder="{{ __('messages.offer_text') }} ({{ __('messages.ar') }})" name="offer_text_ar" dir="rtl" @if(isset($product_variant)) value="{{ $product_variant->offer_text_ar }}" @endif>                                                           <!--end::Input-->--}}
{{--        <div class="fv-plugins-message-container invalid-feedback"></div>--}}
{{--    </div>--}}
</div>
<div class="row g-9 mb-7">
    <div class="col-md-6 fv-row fv-plugins-icon-container">
        <label class="fs-6 fw-semibold mb-2">{{ __('messages.new_arrival_duration') }}</label>
        <input class="form-control" placeholder="{{ __('messages.start_date_time') }} ~ {{ __('messages.end_date_time') }}" name="start_time_end_time" id="startTimeEndTime"  @if(isset($product) && $product->new_arrival_start_time && $product->new_arrival_end_time) value="{{ getReadableLocalTimeFromUtc($product->new_arrival_start_time, $time_zone) }} ~ {{ getReadableLocalTimeFromUtc($product->new_arrival_end_time, $time_zone) }}" @endif readonly/>   <!--end::Input-->
        <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
    <div class="col-md-3 fv-row fv-plugins-icon-container">
        <label class="fs-6 fw-semibold mb-2">{{ __('messages.most_selling_product') }}</label>
        <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
            <input class="form-check-input" name="most_selling_status" type="checkbox"  value="1" id="most_selling_status" @if(isset($product) && $product->most_selling_status) checked @endif>
        </div>
        <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
    <div class="col-md-3 fv-row fv-plugins-icon-container">
        <label class="fs-6 fw-semibold mb-2">{{ __('messages.status') }}</label>
        <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
            <input class="form-check-input" name="status" type="checkbox"  value="1" id="status" @if(isset($product)) @if($product->status) checked @endif @else checked @endif>
        </div>
        <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
</div>
<div class="row g-9 mb-7">
    <div class="col-md-6 fv-row fv-plugins-icon-container">
        <label class="required fs-6 fw-semibold mb-2">{{ __('messages.product_description') }} ({{ __('messages.en') }})</label>
        <textarea class="form-control" placeholder="{{ __('messages.product_description') }} ({{ __('messages.en') }})" name="description" dir="ltr" rows="10">@if(isset($product)){{ $product->description }}@endif</textarea>
        <div class="fv-plugins-message-container invalid-feedback"></div></div>
    <div class="col-md-6 fv-row fv-plugins-icon-container">
        <label class="required fs-6 fw-semibold mb-2">{{ __('messages.product_description') }} ({{ __('messages.ar') }})</label>
        <textarea class="form-control" placeholder="{{ __('messages.product_description') }} ({{ __('messages.ar') }})" name="description_ar" dir="rtl" rows="10">@if(isset($product)){{ $product->description_ar }}@endif</textarea>
        <div class="fv-plugins-message-container invalid-feedback"></div></div>
</div>
