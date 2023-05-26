<div class="row g-9 mb-7">
    <!--begin::Col-->
    <div class="col-md-12 fv-row fv-plugins-icon-container">
        <!--begin::Label-->
        <label class="required fs-6 fw-semibold mb-2">{{ __('messages.select_category') }}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-select" id="tagItem" name="tag_item" data-control="select2" data-placeholder="{{ __('messages.select_any') }}" data-allow-clear="true">
            <option></option>
           @foreach($items as $item)
            <option value="{{ $item->id }}">{{ $item->getCategoryName() }}</option>
           @endforeach
        </select>

        <!--end::Input-->
        <div class="fv-plugins-message-container invalid-feedback"></div></div>
    <!--end::Col-->
</div>
