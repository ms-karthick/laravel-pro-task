<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create Sales </title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

</head>
<style>
    form .error {
        color: #ff0000;
    }
</style>

<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">

                        <a class="btn btn-primary  pull-right" href="{{ url('sales') }}">Back</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <form id="sales_add" class="tabcontent" enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate">
                                    @csrf
                                    <div class="row">
                                        <!-- left column -->

                                        <div class="col-md-6 form-inline">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><b>INVOICE_NO:</b></label>&nbsp;&nbsp;&nbsp;
                                                <input type="text" class="form-control" name="invoice_number" id="invoice_number" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6 form-inline">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><b>INVOICE_DATE:</b></label>&nbsp;&nbsp;&nbsp;
                                                <input type="date" class="form-control" name="invoice_date" id="invoice_date">
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <br>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Customer Name</label>
                                                <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="Customer Name" value="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Customer Email</label>
                                                <input type="email" name="customer_email" class="form-control" id="customer_email" placeholder="Customer Email" value="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Customer Phone</label>
                                                <input type="text" name="customer_phone" class="form-control" id="customer_phone" placeholder="Customer Phone" value="">
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Customer State</label>
                                                <input type="text" name="customer_state" class="form-control" id="customer_state" placeholder="Customer State" value="">
                                            </div>
                                        </div>



                                    </div>

                                    <div id="form-container">
                                        <h5><b>Product Sales Info</b></h5>
                                        <div class="row my-form">

                                            <div class="col-sm-1 nopadding">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="id" name="id" value="1" placeholder="School name">
                                                </div>
                                            </div>

                                            <div class="col-sm-2 nopadding">
                                                <div class="form-group">
                                                    <select class="form-select" aria-label="Default select example" name="product_id" id="product_id" onchange="changeProduct()">
                                                        <option selected>Select</option>
                                                        @foreach ($product as $products)
                                                        <option value="{{$products->id}}">
                                                            {{$products->product_name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-2 nopadding">
                                                <div class="form-group">
                                                    <input type="text" class="form-control rate" id="rate" name="rate" placeholder="Rate">
                                                </div>
                                            </div>

                                            <div class="col-sm-2 nopadding">
                                                <div class="form-group">
                                                    <input type="text" class="form-control quantity" id="quantity" name="quantity" placeholder="Qty" onchange="updateTotal()">
                                                </div>
                                            </div>


                                            <div class="col-sm-2 nopadding">
                                                <div class="form-group">
                                                    <input type="text" class="form-control gst_percentage" id="gst_percentage" name="gst_percentage" placeholder="Gst Value" onchange="updateTotal()">
                                                </div>
                                            </div>

                                            <div class="col-sm-2 nopadding">
                                                <div class="form-group">
                                                    <input type="text" class="form-control total_cost" id="total_cost" name="total_cost" placeholder="Total">
                                                </div>
                                            </div>
                                            <div class="col-sm-1 nopadding">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-success" type="button" id="add-form-btn"> <span>+</span> </button>
                                                </div>
                                            </div>

                                            <!-- <div id="additionalFields"></div> -->

                                        </div>

                                    </div>
                                    <div>
                                        <span style="margin-left: 77%;"><b>Product Cost : <span id="productCost"></span></b></span><br>
                                        <span style="margin-left: 77%;"><b>Total GST : <span id="totalGST"></span></b></span> <br>
                                        <span style="margin-left: 77%;"><b>Total Sales Values : <span id="totalSalesValues"></span> </b></span>
                                    </div>
                                    <!-- /.card-body -->
                                    <div>
                                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>


<script>
    $(document).ready(function() {

        // $("#datepicker").datepicker({
        //     dateFormat: 'yy-mm-dd',
        //     onSelect: function(dateText) {
        //         $("#selectedDate").text(dateText);
        //     }
        // });

        var today = new Date().toISOString().split('T')[0];

        var threeDaysAgo = new Date();
        threeDaysAgo.setDate(threeDaysAgo.getDate() - 3);
        var minDate = threeDaysAgo.toISOString().split('T')[0];

        $('#invoice_date').attr('min', minDate);
        $('#invoice_date').attr('max', today);

        $('#sales_add').validate({
            rules: {
                customer_name: {
                    required: true,
                    maxlength: 200,
                    lettersonly: true,
                },
                customer_email: {
                    required: true,
                    email: true,
                    maxlength: 100,
                },
                customer_phone: {
                    required: true,
                    number: true,
                    maxlength: 10,
                },
                customer_state: {
                    required: true,
                },
            },

            submitHandler: function(form,event) {

                if (confirm("Do you want to save the data?")) {
                    event.preventDefault();
                    // const foruesArray = $(form).serializeArray();
                    var formData = [];

                    $(".my-form").each(function() {
                        const formValues = {};
                        $(this).find('input,select').each(function() {
                            formValues[this.name] = $(this).val();
                        })

                        formData.push(formValues);
                    })

                    // console.log(formData);

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('sales.store') }}",
                        data: {
                            _token: '{{ csrf_token() }}',
                            invoice_number: $('#invoice_number').val(),
                            invoice_date: $('#invoice_date').val(),
                            customer_name: $('#customer_name').val(),
                            customer_email: $('#customer_email').val(),
                            customer_phone: $('#customer_phone').val(),
                            customer_state: $('#customer_state').val(),
                            dynForm: formData,
                        },
                        cache: false,
                        success: function(response) {

                            window.location.href = "{{ route('sales.index') }}";

                        },
                        error: function(xhr, status, error) {

                            console.error('AJAX Error:', error);

                            alert('An error occurred. Please check the console for details.');
                        },
                        complete: function() {

                        }
                    })
                }
            },


        });


        // updateTotalRate();

        $(document).on('change', '.rate, .quantity, .gst_percentage, .total_cost', function() {
            // alert()
            updateTotal();
        });

        function updateTotal() {
            let totalRate = 0;
            let totalGstPercentage = 0;
            let totalCost = 0;

            $('.rate').each(function() {
                const rateValue = parseFloat($(this).val()) || 0;
                totalRate += rateValue;
            });

            $('.gst_percentage').each(function() {
                const gstPercentage = parseFloat($(this).val()) || 0;
                totalGstPercentage += gstPercentage;
            });

            $('.total_cost').each(function() {
                const totalPrice = parseFloat($(this).val()) || 0;
                totalCost += totalPrice;
            });

            $('#totalGST').text(totalGstPercentage.toFixed(2));
            $('#totalSalesValues').text(totalCost.toFixed(2));
            $('#productCost').text(totalRate.toFixed(2));
        }

    });

    function changeProduct() {
        const product_id = $('#product_id').val();

        $.ajax({
            type: 'GET',
            url: "{{ url('sales-common') }}",
            data: {
                product_id: product_id,
                _token: '{{csrf_token()}}',
            },
            cache: false,
            success: function(response) {


                if (response.status === true) {
                    $('#rate').val(response.data.rate);
                    $('#invoice_number').val(response.data.seq_name);
                    $('#gst_percentage').val(response.data.gst);
                    console.log(response.data.id)
                }

            }
        })

    }

    function updateTotal() {
        const quantity = parseFloat($('#quantity').val()) || 0;
        const price = parseFloat($('#rate').val()) || 0;
        const gst = parseFloat($('#gst_percentage').val()) || 0;
        const total = quantity * price;
        const totalgst = (total * gst) / 100;
        const withgst = total + totalgst;

        $('#total_cost').val(withgst.toFixed(2));
        // $('#productCost').text(price);
        // $('#totalGST').text(gst);
        // $('#totalSalesValues').text(withgst);
    }


    $('#add-form-btn').on('click', function() {
        const newForm = $('.my-form:first').clone();

        // Clear input values in the cloned form
        newForm.find('input').val('');

        // Increment form index in the cloned form
        const newIndex = $('.my-form').length + 1;
        newForm.find('h2').text('Form ' + newIndex);

        // Initialize validation for the new form
        //   initializeForm(newForm, newIndex);

        // Append the new form to the container
        $('#form-container').append(newForm);
    });

    // function initializeForm(form, index) {
    //   form.validate({
    //     // Your validation rules here
    //     submitHandler: function(form) {
    //         form.preventDefault();
    //       // Custom logic when the form is valid
    //       alert('Form ' + index + ' submitted successfully!');
    //     }
    //   });
    // }

    function removeFields(button) {
        $(button).closest('.additional-fields').remove();
    }
</script>