$(document).ready(function () {
    $('#vendorOrUser').select2();
    $('#deliveryHandle').select2();
});
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$(document).on('submit', "#addUserBoutiqueForm", function(e){
    e.preventDefault();
    let createButton = document.querySelector("#createButton");
    let addUserBoutiqueForm = $("#addUserBoutiqueForm");
    let form_data = new FormData(this);
    console.log(form_data)
    // addUserBoutiqueForm.validate({
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
    // if (!addUserBoutiqueForm.valid()){
    //     return;
    // }
    loadPreloader(true)
    createButton.setAttribute("data-kt-indicator", "on");
    store_url = admin_base_url+"/user_boutiques"
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
                document.getElementById('addUserBoutiqueForm').reset();
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

$("#vendorOrUser").on('change', function(e) {
    let vendorOrUser = $(this).select2('data')[0].id;
    let get_url = admin_base_url+"/user_boutiques/get-delivery-handle?vendor_or_user="+vendorOrUser
    loadPreloader(true)
    $.ajax({
        type:'GET',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:get_url,
        data:{vendor_or_user:vendorOrUser},
        success:function(data){
            data = JSON.parse(data);
            if(data.success == true)
            {
                $('#deliveryHandle').html(data.delivery_handle)
                $('#deliveryHandle').select2();

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
