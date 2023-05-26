$(document).ready(function () {
    document.getElementById("time_zone").value = time_zone;
    $('#tag').select2();
});

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$(document).on('submit', "#editPackageForm", function(e){
    e.preventDefault();
    var editButton = document.querySelector("#editButton");
    var editPackageForm = $("#editPackageForm");
    var form_data = new FormData(this);
    console.log(form_data)
    editPackageForm.validate({
        // lang:'ar',
        rules: {
            title: {
                required: true,
            },
            title: {
                required: true,
            },
        },
    });
    if (!editPackageForm.valid()){
        return;
    }
    loadPreloader(true)
    editButton.setAttribute("data-kt-indicator", "on");
    let id = $("input[name=id]").val();
    var update_url = admin_base_url+"/packages/"+id+"/update"
    $.ajax({
        type:'POST',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:update_url,
        data:form_data,
        success:function(data){
            data = JSON.parse(data);
            editButton.removeAttribute("data-kt-indicator", "on");
            if(data.success == true)
            {
                printSingleSuccessToast(data.message);
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
    let get_tag_item_url = admin_base_url+"/packages/get-tag-item?tag="+tag
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
});

$('input[name="start_time_end_time"]').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('DD-MM-YYYY hh:mm A') + ' ~ ' + picker.endDate.format('DD-MM-YYYY hh:mm A'));
});

$('input[name="start_time_end_time"]').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
});
