$(document).ready(function () {
    $('#attributes').select2();
});

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$(document).on('submit', "#editAttributeSetForm", function(e){
    e.preventDefault();
    var editButton = document.querySelector("#editButton");
    var editAttributeSetForm = $("#editAttributeSetForm");
    var form_data = new FormData(this);
    console.log(form_data)
    editAttributeSetForm.validate({
        // lang:'ar',
        rules: {
            name: {
                required: true,
            },
            name_ar: {
                required: true,
            },
        },
    });
    if (!editAttributeSetForm.valid()){
        return;
    }
    loadPreloader(true)
    editButton.setAttribute("data-kt-indicator", "on");
    let id = $("input[name=id]").val();
    var update_url = admin_base_url+"/attribute_sets/"+id+"/update"
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

function deleteAttributeValue(id)
{
    Swal.fire({
        html: are_you_sure_want_to_delete,
        icon: "question",
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: yes_text,
        cancelButtonText: no_text,
        customClass: {
            confirmButton: "btn btn-danger",
            cancelButton: 'btn btn-primary'
        }
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            var delete_url = admin_base_url+"/attribute_values/"+id+"/delete"
            $.ajax({
                type:'POST',
                mimeType: "multipart/form-data",
                cache: false,
                contentType: false,
                processData: false,
                url:delete_url,
                data:{},
                success:function(data){
                    data = JSON.parse(data);
                    if(data.success == true) {
                        Swal.fire({
                            html: data.message,
                            icon: "success",
                            confirmButtonText: ok_text,
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        })
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
    })
}
