<select class="form-select" id="deliveryHandle" name="delivery_handle" data-control="select2" data-placeholder="{{ __('messages.select_any') }}">
<option></option>
<option value="Beiaat">{{ __('messages.beiaat') }}</option>
<option value="SelfDelivery">{{ __('messages.self_delivery') }}</option>
{{--    @if($user_type == "User")--}}
{{--        <option value="Beiaat">{{ __('messages.beiaat') }}</option>--}}
{{--        <option value="SelfDelivery">{{ __('messages.self_delivery') }}</option>--}}
{{--    @else--}}
{{--        <option value="Vendor">{{ __('messages.vendor') }}</option>--}}
{{--        <option value="User">{{ __('messages.user') }}</option>--}}
{{--    @endif--}}
</select>

