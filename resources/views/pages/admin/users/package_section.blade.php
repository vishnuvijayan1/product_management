<div class="row g-9 mb-7">
    <!--begin::Col-->
    <div class="col-md-12 fv-row fv-plugins-icon-container">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold mb-2">{{ __('messages.package') }}</label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-select" id="package" name="package" data-control="select2" data-placeholder="{{ __('messages.select_any') }}" data-allow-clear="true">
            <option></option>
            @foreach($packages as $package)
            <option value="{{ $package->id }}" @if(isset($package_id) && $package_id == $package->id) selected @endif>{{ $package->getTitle() }} || {{ $package->price }} {{ __('messages.kwd') }} || {{ $package->package }}</option>
            @endforeach
        </select>

        <!--end::Input-->
        <div class="fv-plugins-message-container invalid-feedback"></div></div>
    <!--end::Col-->
</div>
