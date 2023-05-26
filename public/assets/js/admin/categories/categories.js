$(document).ready(function () {
    var selected_parent = 0;
    getCategoryData()
    getCategoryAddForm();
});
let move_node_ajax;
var selected_parent = 0;
/* JSTree Scripts */
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
        "plugins" : [ "dnd", "state", "types", "search"]
    });

    $('#categoryTree').on('changed.jstree', function (e, data) {
        // var i, j, r = [];
        // for(i = 0, j = data.selected.length; i < j; i++) {
        //     r.push(data.instance.get_node(data.selected[i]).id);
        // }
        if(data.action == "select_node")
        {
            selected_parent = data.node.id
            getCategoryEditForm(data.node.id)
        }
    }).jstree();

    $('#categoryTree').on('move_node.jstree', function (e, data) {
        var categories = [];
        var treeNodes = $('#categoryTree').jstree(true).get_json('#', { flat: true });
        $.each(treeNodes, function (i, val) {
            categories.push({
                id: $(val).attr('id'),
                parent:  $(val).attr('parent'),
                position:  i
            });
        })
        moveCategoryTreeNode(categories)
    }).jstree();
}

$(".search-input").keyup(function () {
    var searchString = $(this).val();
    $('#categoryTree').jstree('search', searchString);
});
/* JSTree Scripts */

$('#categoryTabPanel a').click(function (link) {
    if(link.currentTarget.getAttribute('data-id') == 'generalInformationTab')
    {
        getCategoryAddForm();
    }
    else if(link.currentTarget.getAttribute('data-id') == 'categoryProductsTab')
    {
        getCategoryProducts()
    }

})

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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

function getCategoryAddForm(){
    loadPreloader(true)
    var add_form_url = admin_base_url+"/categories/create?selected_parent="+selected_parent
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
            if(data.success == true)
            {
                $('#generalInformationTab').html(data.create_form);
                $('.form-select').select2();
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
}

function getCategoryEditForm(id){
    loadPreloader(true)
    $('#generalInformationTab').html('');
    var edit_url = admin_base_url+"/categories/"+id+"/edit?selected_parent="+selected_parent
    $.ajax({
        type:'GET',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:edit_url,
        data:{},
        success:function(data){
            data = JSON.parse(data);
            if(data.success == true)
            {
                $('#generalInformationTab').html(data.edit_form);
                $('.form-select').select2();
                KTImageInput.createInstances();
                getCategoryData();
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

function moveCategoryTreeNode(categories) {
    loadPreloader(true)
    let form_data = new FormData();
    form_data.append('categories', JSON.stringify(categories));
    var move_category_data_url = admin_base_url+"/categories/move-category-data"
    move_node_ajax = $.ajax({
        type:'POST',
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        url:move_category_data_url,
        data:form_data,
        beforeSend: function() {
          if(move_node_ajax && move_node_ajax.readyState !=4){
              move_node_ajax.abort()
          }
        },
        success:function(data){
            data = JSON.parse(data);
            if(data.success == true)
            {
                printSingleSuccessToast(data.message);
                $("#categoryTreeMain").html('');
                $("#categoryTreeMain").html('<div id="categoryTree"></div>');
                getCategoryData();
                $("#categoryTree").jstree("loaded");
                $("#categoryTree").jstree("refresh");
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
            if(error != 'abort')
            printSingleErrorToast(error);
        },
    });
}

function getCategoryProducts(){
    $('#categoryProductsTab').html('......')
}

$(document).on('submit', "#addCategoryForm", function(e){
    e.preventDefault();
    var createButton = document.querySelector("#createButton");
    var addCategoryForm = $("#addCategoryForm");
    var form_data = new FormData(this);
    console.log(form_data)
    addCategoryForm.validate({
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
    if (!addCategoryForm.valid()){
        return;
    }
    loadPreloader(true)
    createButton.setAttribute("data-kt-indicator", "on");
    store_url = admin_base_url+"/categories"
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
                document.getElementById('addCategoryForm').reset();
                $("#categoryTreeMain").html('');
                $("#categoryTreeMain").html('<div id="categoryTree"></div>');
                getCategoryData();
                $("#categoryTree").jstree("loaded");
                $("#categoryTree").jstree("refresh");
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

$(document).on('submit', "#editCategoryForm", function(e){
    e.preventDefault();
    var createButton = document.querySelector("#createButton");
    var editCategoryForm = $("#editCategoryForm");
    var form_data = new FormData(this);
    console.log(form_data)
    editCategoryForm.validate({
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
    if (!editCategoryForm.valid()){
        return;
    }
    loadPreloader(true)
    editButton.setAttribute("data-kt-indicator", "on");
    let id = $("input[name=id]").val();
    var update_url = admin_base_url+"/categories/"+id+"/update"
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
                $("#categoryTreeMain").html('');
                $("#categoryTreeMain").html('<div id="categoryTree"></div>');
                getCategoryData();
                $("#categoryTree").jstree("loaded");
                $("#categoryTree").jstree("refresh");
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

function deleteCategory(id)
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
            var delete_url = admin_base_url+"/categories/"+id+"/delete"
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
                        $("#categoryTreeMain").html('');
                        $("#categoryTreeMain").html('<div id="categoryTree"></div>');
                        getCategoryData();
                        $("#categoryTree").jstree("loaded");
                        $("#categoryTree").jstree("refresh");
                        selected_parent = 0
                        getCategoryAddForm();
                        Swal.fire({
                            html: data.message,
                            icon: "success",
                            confirmButtonText: ok_text,
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

