$(document).ready(function () {
    document.getElementById("time_zone").value = time_zone;
    $('#tag').select2();
});
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$(document).on('submit', "#addAppBannerForm", function(e){
    e.preventDefault();
    let createButton = document.querySelector("#createButton");
    let addAppBannerForm = $("#addAppBannerForm");
    let form_data = new FormData(this);
    console.log(form_data)
    addAppBannerForm.validate({
        // lang:'ar',
        rules: {
            title: {
                required: true,
            },
            title_ar: {
                required: true,
            },
        },
    });
    if (!addAppBannerForm.valid()){
        return;
    }
    loadPreloader(true)
    createButton.setAttribute("data-kt-indicator", "on");
    store_url = admin_base_url+"/app_banners"
    $.ajax({
        type:'POST',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:store_url,
        data:form_data,
        success:function(data){
            data = JSON.parse(data);
            createButton.removeAttribute("data-kt-indicator", "on");
            if(data.success == true)
            {
                printSingleSuccessToast(data.message);
                document.getElementById('addAppBannerForm').reset();
                window.location.reload()

            }
            else if(data.success == false)
            {
                if($.isEmptyObject(data.errors))
                {
                    printSingleErrorToast(data.message);
                }
                else
                {
                    printMultipleErrorToast(data.errors);
                }
            }
            loadPreloader(false)
        },
        error: function(xhr, status, error){
            printSingleErrorToast(error);
        },
    });

});

$("#tag").on('change', function(e) {
    let tag = $(this).select2('data')[0].id;
    let get_tag_item_url = admin_base_url+"/app_banners/get-tag-item?tag="+tag
    loadPreloader(true)
    $.ajax({
        type:'GET',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:get_tag_item_url,
        data:{tag:tag},
        success:function(data){
            data = JSON.parse(data);
            if(data.success == true)
            {
                $('#tagItemSelect').html(data.tag_item_select)
                $('#tagItem').select2();

            }
            else if(data.success == false)
            {
                if($.isEmptyObject(data.errors))
                {
                    printSingleErrorToast(data.message);
                }
                else
                {
                    printMultipleErrorToast(data.errors);
                }
            }
            loadPreloader(false)
        },
        error: function(xhr, status, error){
            printSingleErrorToast(error);
        },
    });

});

$("#startTimeEndTime").daterangepicker({
    timePicker: true,
    minDate: new Date(),
    autoUpdateInput: false,
    locale: {
        separator: " ~ ",
        format: "DD-MM-YYYY hh:mm A",
        cancelLabel: clear_text,
        applyLabel:  apply_text,
    },
}).val('');

$('input[name="start_time_end_time"]').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('DD-MM-YYYY hh:mm A') + ' ~ ' + picker.endDate.format('DD-MM-YYYY hh:mm A'));
});

$('input[name="start_time_end_time"]').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
});
