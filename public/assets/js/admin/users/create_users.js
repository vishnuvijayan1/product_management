$(document).ready(function () {
    $('#type').select2();
});
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$(document).on('submit', "#addUserForm", function(e){
    e.preventDefault();
    let createButton = document.querySelector("#createButton");
    let addUserForm = $("#addUserForm");
    let form_data = new FormData(this);
    console.log(form_data)
    // addUserForm.validate({
    //     // lang:'ar',
    //     rules: {
    //         title: {
    //             required: true,
    //         },
    //         title_ar: {
    //             required: true,
    //         },
    //     },
    // });
    // if (!addUserForm.valid()){
    //     return;
    // }
    loadPreloader(true)
    createButton.setAttribute("data-kt-indicator", "on");
    store_url = admin_base_url+"/users"
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
                document.getElementById('addUserForm').reset();
                $('#type').select2();
                $('#packageSection').html('');
                KTImageInput.createInstances();

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
/*
$("#type").on('change', function(e) {
    let type = $(this).select2('data')[0].id;
    let get_url = admin_base_url+"/users/get-packages?type="+type
    loadPreloader(true)
    $.ajax({
        type:'GET',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:get_url,
        data:{type:type},
        success:function(data){
            data = JSON.parse(data);
            if(data.success == true)
            {
                $('#packageSection').html(data.package_section)
                $('#package').select2();

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
*/

$("#type").on('change', function(e) {
    let type = $(this).select2('data')[0].id;
    if(type == 'Vendor')
    {
       $("#beiaatHandledSection").show();
    }
    else
    {
        $("#beiaatHandledSection").hide();
    }
});

$("#dateOfBirth").daterangepicker({
    timePicker: false,
    autoUpdateInput: false,
    singleDatePicker:true,
    showDropdowns: true,
    minYear:1900,
    maxYear: parseInt(moment().format("YYYY")),
    locale: {
        format: "DD-MM-YYYY",
        cancelLabel: clear_text,
        applyLabel:  apply_text,
    },
}).val('');

$('input[name="date_of_birth"]').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('DD-MM-YYYY'));
});

$('input[name="date_of_birth"]').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
});
