$(document).ready(function () {
    $('#type').select2();
   // getPackageSection(type, user_id)
});

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$(document).on('submit', "#editUserForm", function(e){
    e.preventDefault();
    var editButton = document.querySelector("#editButton");
    var editUserForm = $("#editUserForm");
    var form_data = new FormData(this);
    // console.log(form_data)
    // editUserForm.validate({
    //     // lang:'ar',
    //     rules: {
    //         title: {
    //             required: true,
    //         },
    //         title: {
    //             required: true,
    //         },
    //     },
    // });
    // if (!editUserForm.valid()){
    //     return;
    // }
    loadPreloader(true)
    editButton.setAttribute("data-kt-indicator", "on");
    let id = $("input[name=id]").val();
    var update_url = admin_base_url+"/users/"+id+"/update"
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
});

$('input[name="date_of_birth"]').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('DD-MM-YYYY'));
});

$('input[name="date_of_birth"]').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
});
/*
$("#type").on('change', function(e) {
    let type = $(this).select2('data')[0].id;
    getPackageSection(type, user_id)
});

function getPackageSection(type, user_id)
{
    let get_url = admin_base_url+"/users/get-packages?type="+type+"&user_id="+user_id
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
}
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
