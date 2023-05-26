$(document).ready(function () {
    getCategoryData()
    $('#boutique').select2();
    $('#attributeSet').select2();
    $('#productType').select2();
    $('#saleType').select2();
    getProductAddForm(attribute_set_id, product_variant_id, sale_type, boutique)
    getProductVariantImages(product_variant_id)
    let stepIndex = 1;
    function validateStep(index) {
        if(index == 1)
        {
            let editProductForm_1 = $("#editProductForm");
            editProductForm_1.validate({
                // lang:'ar',
                rules: {
                    vendor: {
                        required: true,
                    },
                    product_type: {
                        required: true,
                    },
                    attribute_set: {
                        required: true,
                    },
                },
            });
            if (!editProductForm_1.valid()){ return false;}else{return true}
        }
        else if(index == 2)
        {
            let editProductForm_2 = $("#editProductForm");
            editProductForm_2.validate({
                // lang:'ar',
                rules: {
                    name: {
                        required: true,
                    },
                    name_ar: {
                        required: true,
                    },
                    'attribute_value[]': {
                        required: true,
                    },
                },
            });
            if (!editProductForm_2.valid()){ return false;}else{return true}
        }
    }
    // Stepper lement
    var element = document.querySelector("#productFormStepper");

// Initialize Stepper
    var stepper = new KTStepper(element);
    if(stepper_index=='first')
    {
        stepper.goFirst();
    }
    else if(stepper_index=='last')
    {
        stepper.goLast();
    }
    else
    {
        stepper.goFirst();
    }

// Handle navigation click
    stepper.on("kt.stepper.click", function (stepper) {
        //if(validateStep(stepIndex))
        if(1)
        {
            stepper.goTo(stepper.getClickedStepIndex()); // go to clicked step
            stepIndex = stepper.currentStepIndex
        }

    });

// Handle next step
    stepper.on("kt.stepper.next", function (stepper) {
        //if(validateStep(stepIndex))
        if(1)
        {
            stepper.goNext(); // go next step
            stepIndex = stepper.currentStepIndex
        }
    });

// Handle previous step
    stepper.on("kt.stepper.previous", function (stepper) {
        stepper.goPrevious(); // go previous step
        stepIndex = stepper.currentStepIndex
    });
});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click', "#editButton", function(e){
    e.preventDefault();
    let editButton = document.querySelector("#editButton");
    let editProductForm = $("#editProductForm");
    let form_data = new FormData(editProductForm[0]);
    // let categories =  $('#categoryTree').jstree(true).get_selected();
    // form_data.append('categories', categories);
    let checked_ids = [];
    let selectedNodes = $('#categoryTree').jstree("get_selected", true);
    $.each(selectedNodes, function() {
        checked_ids.push(this.id);
        if(this.parent != '#') checked_ids.push(this.parent);
    });
    // You can assign checked_ids to a hidden field of a form before submitting to the server
    $('#categories').text(checked_ids);
    let uniqueCategories = [...new Set(checked_ids)]
    form_data.append('categories', uniqueCategories);
    loadPreloader(true)
    editButton.setAttribute("data-kt-indicator", "on");
    let id = $("input[name=id]").val();
    let edit_url = admin_base_url+"/products/"+id+"/update"
    $.ajax({
        type:'POST',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:edit_url,
        data:form_data,
        success:function(data){
            console.log(data)
            data = JSON.parse(data);
            editButton.removeAttribute("data-kt-indicator", "on");
            if(data.success == true)
            {
                printSingleSuccessToast(data.message);
                window.location.href = data.url;
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



$(document).on('click', "#createProductVariantButton", function(e){
    e.preventDefault();
    let createProductVariantButton = document.querySelector("#createProductVariantButton");
    let addProductVariantForm = $("#addProductVariantForm");
    let form_data = new FormData(addProductVariantForm[0]);
    // You can assign checked_ids to a hidden field of a form before submitting to the server
    loadPreloader(true)
    createProductVariantButton.setAttribute("data-kt-indicator", "on");
    let store_url = admin_base_url+"/product_variants"
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
            createProductVariantButton.removeAttribute("data-kt-indicator", "on");
            if(data.success == true)
            {
                printSingleSuccessToast(data.message);
                $('#productCommonModalAddEdit').modal('hide');
                $('#productVariantDataTable').DataTable().columns.adjust().draw();

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

$(document).on('click', "#createAuctionTimingButton", function(e){
    e.preventDefault();
    let createAuctionTimingButton = document.querySelector("#createAuctionTimingButton");
    let addAuctionTimingForm = $("#addAuctionTimingForm");
    let form_data = new FormData(addAuctionTimingForm[0]);
    // You can assign checked_ids to a hidden field of a form before submitting to the server
    loadPreloader(true)
    createAuctionTimingButton.setAttribute("data-kt-indicator", "on");
    let store_url = admin_base_url+"/auction_timings"
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
            createAuctionTimingButton.removeAttribute("data-kt-indicator", "on");
            if(data.success == true)
            {
                printSingleSuccessToast(data.message);
                $('#productCommonModalAddEdit').modal('hide');
                $('#auctionTimingDataTable').DataTable().columns.adjust().draw();

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



$(document).on('click', "#editProductVariantButton", function(e){
    e.preventDefault();
    let editProductVariantButton = document.querySelector("#editProductVariantButton");
    let editProductVariantForm = $("#editProductVariantForm");
    let form_data = new FormData(editProductVariantForm[0]);
    loadPreloader(true)
    editProductVariantButton.setAttribute("data-kt-indicator", "on");
    let id = $("input[name=product_variant_id]").val();
    let edit_url = admin_base_url+"/product_variants/"+id+"/update"
    $.ajax({
        type:'POST',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:edit_url,
        data:form_data,
        success:function(data){
            data = JSON.parse(data);
            editProductVariantButton.removeAttribute("data-kt-indicator", "on");
            if(data.success == true)
            {
                printSingleSuccessToast(data.message);
                $('#productCommonModalAddEdit').modal('hide');
                $('#productVariantDataTable').DataTable().columns.adjust().draw();
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

$(document).on('click', "#editAuctionTimingButton", function(e){
    e.preventDefault();
    let editProductVariantButton = document.querySelector("#editAuctionTimingButton");
    let editAuctionTimingForm = $("#editAuctionTimingForm");
    let form_data = new FormData(editAuctionTimingForm[0]);
    loadPreloader(true)
    editAuctionTimingButton.setAttribute("data-kt-indicator", "on");
    let id = $("input[name=auction_timing_id]").val();
    let edit_url = admin_base_url+"/auction_timings/"+id+"/update"
    $.ajax({
        type:'POST',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:edit_url,
        data:form_data,
        success:function(data){
            data = JSON.parse(data);
            editAuctionTimingButton.removeAttribute("data-kt-indicator", "on");
            if(data.success == true)
            {
                printSingleSuccessToast(data.message);
                $('#productCommonModalAddEdit').modal('hide');
                $('#auctionTimingDataTable').DataTable().columns.adjust().draw();
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

$("#attributeSet").on('change', function(e) {
    let attribute_set = $(this).select2('data')[0].id;
    let sale_type = $('#saleType').val();
    let boutique = $('#boutique').val();
    if(!sale_type || !boutique)
    {
        return;
    }
    getProductAddForm(attribute_set, product_variant_id, sale_type, boutique)
});

$("#saleType").on('change', function(e) {
    let sale_type = $(this).select2('data')[0].id;
    let attribute_set = $('#attributeSet').val();
    let boutique = $('#boutique').val();
    if(!attribute_set || !boutique)
    {
        return;
    }
    getProductAddForm(attribute_set, product_variant_id, sale_type, boutique)
});
$("#boutique").on('change', function(e) {
    let boutique = $(this).select2('data')[0].id;
    let attribute_set = $('#attributeSet').val();
    let sale_type = $('#saleType').val();
    if(!attribute_set || !sale_type)
    {
        return;
    }
    getProductAddForm(attribute_set, product_variant_id, sale_type, boutique)
});
function  getProductAddForm(attribute_set, product_variant_id, sale_type, boutique) {
    let get_product_add_from = admin_base_url+"/products/get-product-add-form?attribute_set="+attribute_set+"&product_variant_id="+product_variant_id+"&sale_type="+sale_type+"&boutique="+boutique
    loadPreloader(true)
    $.ajax({
        type:'GET',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:get_product_add_from,
        data:{},
        success:function(data){
            data = JSON.parse(data);
            if(data.success == true)
            {
                $('#productAddForm').html(data.product_add_form)
                $('.attribute-select').select2();
                $('.datepicker').datetimepicker({
                    format: 'DD-MM-YYYY HH:mm:ss'
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

                $("#bidStartTime").daterangepicker({
                    timePicker: true,
                    minDate: new Date(),
                    autoUpdateInput: false,
                    singleDatePicker: true,
                    locale: {
                        format: "DD-MM-YYYY hh:mm A",
                        cancelLabel: clear_text,
                        applyLabel:  apply_text,
                    },
                });

                $('input[name="bid_start_time"]').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('DD-MM-YYYY hh:mm A'));
                });

                $('input[name="bid_start_time"]').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                });

                $("#bidEndTime").daterangepicker({
                    timePicker: true,
                    minDate: new Date(),
                    autoUpdateInput: false,
                    singleDatePicker: true,
                    locale: {
                        format: "DD-MM-YYYY hh:mm A",
                        cancelLabel: clear_text,
                        applyLabel:  apply_text,
                    },
                });

                $('input[name="bid_end_time"]').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('DD-MM-YYYY hh:mm A'));
                });

                $('input[name="bid_end_time"]').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                });



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

function  getProductVariantImages(product_variant_id) {
    let get_product_add_from = admin_base_url+"/products/get-product-variant-images?product_variant_id="+product_variant_id
    loadPreloader(true)
    $.ajax({
        type:'GET',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:get_product_add_from,
        data:{},
        success:function(data){
            data = JSON.parse(data);
            if(data.success == true)
            {
                $('#productVariantImageSection').html(data.product_variant_images)
                $('[data-bs-toggle="tooltip"]').tooltip()
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

function getCategoryData() {
    loadPreloader(true)
    var get_category_data_url = admin_base_url+"/categories/get-category-data?assigned_category_ids="+assigned_category_ids
    $.ajax({
        type:'GET',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:get_category_data_url,
        data:{},
        success:function(data){
            data = JSON.parse(data);
            if(data.success == true)
            {
                $('#treeViewScript').html(data.category_script)
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


function deleteProductVariantImage(id)
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
            loadPreloader(true)
            var delete_url = admin_base_url+"/product_variant_images/"+id+"/delete"
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
                                getProductVariantImages(product_variant_id)
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

function deleteAuctionTiming(id)
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
            loadPreloader(true)
            var delete_url = admin_base_url+"/auction_timings/"+id+"/delete"
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
                                $('#auctionTimingDataTable').DataTable().columns.adjust().draw();
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
function makeDefaultProductVariantImage(id)
{
    loadPreloader(true)
    var default_url = admin_base_url+"/product_variant_images/"+id+"/make_default"
    $.ajax({
        type:'POST',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:default_url,
        data:{},
        success:function(data){
            data = JSON.parse(data);
            if(data.success == true) {
                printSingleSuccessToast(data.message);
                getProductVariantImages(product_variant_id)
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


function productVariantAddForm(product_id)
{
    loadPreloader(true)
    var add_form_url = admin_base_url+"/product_variants/create?product_id="+product_id
    $.ajax({
        type:'GET',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:add_form_url,
        data:{},
        success:function(data){
            data = JSON.parse(data);
            if(data.success == true) {
                $('#productCommonModalAddEditForm').html(data.product_add_form)
                $('#addEditTitle').html(data.product_add_title)
                $('.attribute-select').select2();
                KTImageInput.createInstances();
                $('#productCommonModalAddEdit').modal('show');
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

function auctionTimingAddForm(product_id)
{
    loadPreloader(true)
    var add_form_url = admin_base_url+"/auction_timings/create?product_id="+product_id
    $.ajax({
        type:'GET',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:add_form_url,
        data:{},
        success:function(data){
            data = JSON.parse(data);
            if(data.success == true) {
                $('#productCommonModalAddEditForm').html(data.add_form)
                $('#addEditTitle').html(data.add_title)

                $("#bidStartTimeEndTime").daterangepicker({
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

                $('input[name="bid_start_time_end_time"]').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('DD-MM-YYYY hh:mm A') + ' ~ ' + picker.endDate.format('DD-MM-YYYY hh:mm A'));
                });

                $('input[name="bid_start_time_end_time"]').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                });

                $('#productCommonModalAddEdit').modal('show');
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

function productVariantEditForm(product_variant_id)
{
    loadPreloader(true)
    var edit_form_url = admin_base_url+"/product_variants/"+product_variant_id+"/edit"
    $.ajax({
        type:'GET',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:edit_form_url,
        data:{},
        success:function(data){
            data = JSON.parse(data);
            if(data.success == true) {
                $('#productCommonModalAddEditForm').html(data.product_edit_form)
                $('#addEditTitle').html(data.product_edit_title)
                $('.attribute-select').select2();
                KTImageInput.createInstances();
                $('#productCommonModalAddEdit').modal('show');
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


function auctionTimingEditForm(auction_timing_id)
{
    loadPreloader(true)
    var edit_form_url = admin_base_url+"/auction_timings/"+auction_timing_id+"/edit"
    $.ajax({
        type:'GET',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:edit_form_url,
        data:{},
        success:function(data){
            data = JSON.parse(data);
            if(data.success == true) {
                $('#productCommonModalAddEditForm').html(data.edit_form)
                $('#addEditTitle').html(data.edit_title)

                $("#bidStartTimeEndTime").daterangepicker({
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

                $('input[name="bid_start_time_end_time"]').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('DD-MM-YYYY hh:mm A') + ' ~ ' + picker.endDate.format('DD-MM-YYYY hh:mm A'));
                });

                $('input[name="bid_start_time_end_time"]').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                });

                $('#productCommonModalAddEdit').modal('show');
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

function createCategoryTree(category_data){
    $("#categoryTree").jstree({
        "core" : {
            'data': category_data,
            "themes" : {
                "responsive": false
            },
            "check_callback": true,
        },
        "types" : {
            "default" : {
                "icon" : "fa fa-folder text-success"
            },
            "file" : {
                "icon" : "fa fa-file  text-success"
            }
        },
        "search": {
            "case_sensitive": false,
            "show_only_matches": true
        },
        "plugins" : ["checkbox", "types", "search"],
        "checkbox": { "two_state" : true },
    });
}

// $('.btnGetCheckedItem').click(function(){
//     var checked_ids = [];
//     var selectedNodes = $('#categoryTree').jstree("get_selected", true);
//     $.each(selectedNodes, function() {
//         checked_ids.push(this.id);
//         if(this.parent != '#') checked_ids.push(this.parent);
//     });
//     // You can assign checked_ids to a hidden field of a form before submitting to the server
//     $('#categories').text(checked_ids);
//     let uniqueCategories = [...new Set(checked_ids)]
//     console.log(uniqueItems)
// });

$(".search-input").keyup(function () {
    var searchString = $(this).val();
    $('#categoryTree').jstree('search', searchString);
});
/* JSTree Scripts */


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
