@extends('layouts.app')

@section('content')
<style>
    .thead-light {
        display: table-header-group;
        vertical-align: middle !important;
        border-color: inherit !important;
        background-color: rgb(172, 172, 172) !important;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-4">
            <div class="h4">Add Product <span style="float: right;"><a href="{{ route('home') }}" style="text-align: right" class="btn btn-warning btn-sm"> Go Back </a></span></div>

            <form class="form" action="#" id="addProductForm" enctype="multipart/form-data" method="POST">
                <div class="modal-body py-10 px-lg-17">
                    <div class="row g-9 mb-7">
                        <div class="col-md-6 mt-2">
                            <label class="required fs-6 fw-semibold mb-2">Product</label>
                            <input type="text"class="form-control" placeholder="Product Name" name="product_name">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="fs-6 fw-semibold mb-2">Quantity</label>
                            <input type="number"class="form-control" placeholder="Quantity" name="quantity">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="fs-6 fw-semibold mb-2">Price</label>
                            <input type="number"class="form-control" placeholder="Price" name="price">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer mt-2" >
                        <!--begin::Button-->
                        <button type="submit" id="createButton"   class="btn btn-primary">
                            Save
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Toastr -->

<script>
    $(document).on('submit', "#addProductForm", function(e){
        e.preventDefault();
        let createButton = document.querySelector("#createButton");
        let addProductForm = $("#addProductForm");
        let form_data = new FormData(this);
        store_url = '{{ url('') }}'+"/save-product";
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            mimeType: "multipart/form-data",
            cache: false,
            contentType: false,
            processData: false,
            url:store_url,
            data:form_data,
            success:function(data){
                data = JSON.parse(data);
                if(data.success == true)
                {
                    setTimeout(function() {
                        window.location.replace('{{ url('') }}'+"/home");
                    }, 500);
                }
                else if(data.success == false)
                {
                    //error
                }
            },
            error: function(xhr, status, error){
                //error
            },
        });
    });
</script>
