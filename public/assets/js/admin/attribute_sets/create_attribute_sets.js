$(document).ready(function () {
    $('#attributes').select2();
});
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$(document).on('submit', "#addAttributeSetForm", function(e){
    e.preventDefault();
    var createButton = document.querySelector("#createButton");
    var addAttributeSetForm = $("#addAttributeSetForm");
    var form_data = new FormData(this);
    console.log(form_data)
    addAttributeSetForm.validate({
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
    if (!addAttributeSetForm.valid()){
        return;
    }
    loadPreloader(true)
    createButton.setAttribute("data-kt-indicator", "on");
    store_url = admin_base_url+"/attribute_sets"
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
                document.getElementById('addAttributeSetForm').reset();
                $("#attributes").val('').trigger('change')
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


$('#attribute_value').repeater({
    initEmpty: false,

    defaultValues: {
        'text-input': 'foo'
    },

    show: function () {
        $(this).slideDown();
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    }
});
