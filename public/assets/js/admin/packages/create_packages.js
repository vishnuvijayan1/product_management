$(document).ready(function () {
    $('#package').select2();
});
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$(document).on('submit', "#addPackageForm", function(e){
    e.preventDefault();
    let createButton = document.querySelector("#createButton");
    let addPackageForm = $("#addPackageForm");
    let form_data = new FormData(this);
    console.log(form_data)
    addPackageForm.validate({
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
    if (!addPackageForm.valid()){
        return;
    }
    loadPreloader(true)
    createButton.setAttribute("data-kt-indicator", "on");
    store_url = admin_base_url+"/packages"
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
                document.getElementById('addPackageForm').reset();
                $('#package').select2();
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
