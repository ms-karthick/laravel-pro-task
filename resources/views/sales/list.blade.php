<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sales List </title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    

    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
</head>

<body class="antialiased">
    <div class="container-fluid">
        <!-- main app container -->
             <div class="row">
                    <div class="col-md-12 ">
                        <h3>Sales List</h3>
                    

                       
                        <div class="card-header " style="background-color: #fff;">
                                <div class="card-title"></div>
                                <a href="{{url('sales/create')}}" class="btn btn-primary pull-right"> + Add Sales</a>
                            </div>
                            <div class="card-body">
                            <table id="sales_table" class="table table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th>ID.</th>
                                    <th>INV No</th>
                                    <th>Date</th>
                                    <th>Product</th>
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Customer Phone</th>
                                    <th>Customer State</th>
                                    <th>Quantity</th>
                                    <th>Total Cost</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                               <tbody>

                               </tbody>
                                
                            </table>
                           
                        </div>
                </div>

        </div>
        <!-- credits -->
        <div class="text-center">
           
        </div>
    </div>

</body>



<script type="text/javascript">

    $(function(){
        var table = $('#sales_table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            buttons: [
                'excelHtml5' // Enable Excel export button
                ],
            ajax: {
                url: "{{ route('sales.index') }}",
                type: 'GET',
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'invoice_number',
                    name: 'invoice_number',
                },
                {
                    data: 'invoice_date',
                    name: 'invoice_date'
                },
                {
                    data: 'product_name',
                    name: 'product_name'
                },
                {
                    data: 'customer_name',
                    name: 'customer_name'
                },

                {
                    data: 'customer_email',
                    name: 'customer_email'
                },
                
                {
                    data: 'customer_phone',
                    name: 'customer_phone'
                },


                {
                    data: 'customer_state',
                    name: 'customer_state'
                },

                {
                    data: 'quantity',
                    name: 'quantity'
                },
                {
                    data: 'total_cost',
                    name: 'total_cost'
                },
                
                {
                    data: 'action',
                    name: 'action ',orderable: true, searchable: false

                },
            ],
            
        });
    })

</script>

</html>