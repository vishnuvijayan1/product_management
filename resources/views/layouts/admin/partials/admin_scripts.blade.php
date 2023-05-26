<script type="text/javascript">
    let base_url = "{{ url('') }}"
    let admin_base_url = "{{ url('admin') }}"
    let hostUrl = "assets/";
    let are_you_sure_want_to_delete ='{{ __('messages.are_you_sure_want_to_delete') }}';
    let yes_text ='{{ __('messages.yes') }}';
    let no_text ='{{ __('messages.no') }}';
    let ok_text ='{{ __('messages.ok') }}';
    let clear_text ='{{ __('messages.clear') }}';
    let apply_text ='{{ __('messages.apply') }}';
    let locale_language ='{{ app()->getLocale() }}';
</script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/admin/admin.js') }}"></script>
<script src="{{ asset('assets/js/custom_plugins/select2/'.app()->getLocale().'.js') }}"></script>
@if(session()->get('locale') == 'ar')
    <script src="{{ asset('assets/js/custom_plugins/validation/messages_ar.js') }}"></script>
    <script src="{{ asset('assets/js/custom_plugins/date_picker/ar.js') }}"></script>
@endif
<!--end::Global Javascript Bundle-->
