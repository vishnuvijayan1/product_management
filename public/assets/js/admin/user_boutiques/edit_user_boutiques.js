$(document).ready(function () {
    $('#vendorOrUser').select2();
    getDeliveryHandle(vendorOrUser, user_boutique_id)
});

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$(document).on('submit', "#editUserBoutiqueForm", function(e){
    e.preventDefault();
    var editButton = document.querySelector("#editButton");
    var editUserBoutiqueForm = $("#editUserBoutiqueForm");
    var form_data = new FormData(this);
    // console.log(form_data)
    // editUserBoutiqueForm.validate({
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
    // if (!editUserBoutiqueForm.valid()){
    //     return;
    // }
    loadPreloader(true)
    editButton.setAttribute("data-kt-indicator", "on");
    let id = $("input[name=id]").val();
    var update_url = admin_base_url+"/user_boutiques/"+id+"/update"
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

$("#vendorOrUser").on('change', function(e) {
    let vendorOrUserId = $(this).select2('data')[0].id;
    getDeliveryHandle(vendorOrUserId, user_boutique_id)
});

function getDeliveryHandle(vendor, user_boutique_id)
{
    let get_url = admin_base_url+"/user_boutiques/get-delivery-handle?vendor_or_user="+vendor+"&user_boutique_id="+user_boutique_id
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
}
