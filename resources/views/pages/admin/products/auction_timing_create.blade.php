<form class="form  mx-auto" novalidate="novalidate" id="addAuctionTimingForm">
    <input type="hidden" value="{{ $product->id }}" name="auction_timing_product_id">
<div class="row g-9 mb-7">
    <div class="col-md-12 fv-row fv-plugins-icon-container">
        <label class="fs-6 fw-semibold mb-2">{{ __('messages.bid_start_time') }} ~ {{ __('messages.bid_end_time') }}</label>
        <input class="form-control" placeholder="{{ __('messages.bid_start_time') }} ~ {{ __('messages.bid_start_time') }}" name="bid_start_time_end_time" id="bidStartTimeEndTime" readonly/>   <!--end::Input-->
        <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
</div>

    <button id="createAuctionTimingButton" class="btn btn-primary float-end mb-5">
        <span class="indicator-label">{{ __('messages.save') }}</span>
        <span class="indicator-progress">{{ __('messages.please_wait') }}
		 <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
    </button>
</form>
