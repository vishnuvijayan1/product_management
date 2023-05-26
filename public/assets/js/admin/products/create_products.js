$(document).ready(function () {
    getCategoryData()
    $('#boutique').select2();
    $('#attributeSet').select2();
    $('#productType').select2();
    $('#saleType').select2();
    let stepIndex = 1;
    function validateStep(index) {
       if(index == 1)
       {
           let addProductForm_1 = $("#addProductForm");
           addProductForm_1.validate({
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
           if (!addProductForm_1.valid()){ return false;}else{return true}
       }
       else if(index == 2)
       {
           let addProductForm_2 = $("#addProductForm");
           addProductForm_2.validate({
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
           if (!addProductForm_2.valid()){ return false;}else{return true}
       }
    }
    // Stepper lement
    var element = document.querySelector("#productFormStepper");

// Initialize Stepper
    var stepper = new KTStepper(element);

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

$(document).on('click', "#createButton", function(e){
    e.preventDefault();
    let createButton = document.querySelector("#createButton");
    let addProductForm = $("#addProductForm");
    let form_data = new FormData(addProductForm[0]);
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
    let uniqueCategories = [...new Set(checked_ids)] // set unique
    form_data.append('categories', uniqueCategories);
    loadPreloader(true)
    createButton.setAttribute("data-kt-indicator", "on");
    store_url = admin_base_url+"/products"
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

$("#attributeSet").on('change', function(e) {
    let attribute_set = $(this).select2('data')[0].id;
    let sale_type = $('#saleType').val();
    let boutique = $('#boutique').val();
    if(!sale_type || !boutique)
    {
        return;
    }
    getProductAddForm(attribute_set, sale_type, boutique)
});

$("#saleType").on('change', function(e) {
    let sale_type = $(this).select2('data')[0].id;
    let attribute_set = $('#attributeSet').val();
    let boutique = $('#boutique').val();
    if(!attribute_set || !boutique)
    {
        return;
    }
    getProductAddForm(attribute_set, sale_type, boutique)
});

$("#boutique").on('change', function(e) {
    let boutique = $(this).select2('data')[0].id;
    let attribute_set = $('#attributeSet').val();
    let sale_type = $('#saleType').val();
    if(!attribute_set || !sale_type)
    {
        return;
    }
    getProductAddForm(attribute_set, sale_type, boutique)
});

function  getProductAddForm(attribute_set, sale_type, boutique) {
    let get_product_add_from = admin_base_url+"/products/get-product-add-form?attribute_set="+attribute_set+"&sale_type="+sale_type+"&boutique="+boutique
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
    var get_category_data_url = admin_base_url+"/categories/get-category-data"
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
        "state" : { "key" : "demo2" },
        "checkbox": { "two_state" : true },
        "plugins" : ["checkbox", "types", "search"]
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
