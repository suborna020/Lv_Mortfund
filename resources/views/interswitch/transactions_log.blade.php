<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}} Transactions</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.0/b-colvis-1.6.0/b-flash-1.6.0/b-html5-1.6.0/b-print-1.6.0/fh-3.1.6/r-2.2.3/sc-2.0.1/sl-1.3.1/datatables.min.css"/>
</head>
<body>
<div class="jumbotron text-center">
    <h1>Interswitch Transactions Log</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>(S/N)</th>
                            <th>Gateway</th>
                            <th>Environment</th>
                            <th>Customer</th>
                            <th>Reference</th>
                            <th>&#x20A6; Amount</th>
                            <th>Status</th>
                            <th>Response Code</th>
                            <th>Response Description</th>
                            <th>Transaction Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $serial => $transaction)
                            <tr>
                                <td>{{$serial + 1}}</td>
                                <td>{{$transaction->gateway}}</td>
                                <td class="font-weight-bold @if($transaction->environment == 'TEST') text-success @else text-danger @endif">{{$transaction->environment}}</td>
                                <td>{{$transaction->customer_name}}</td>
                                <td>{{$transaction->reference}}</td>
                                <td class="font-weight-bold">{{number_format(($transaction->amount / 100), 2)}}
                                <td class="status_{{$transaction->reference}}">
                                    @if($transaction->response_code == '0')
                                        <span class="badge badge-warning"> Pending</span>
                                    @elseif(in_array($transaction->response_code,['00','10','11']))
                                        <span class="badge badge-success"> Successful</span>
                                    @else
                                        <span class="badge badge-danger"> Failed</span>
                                    @endif
                                </td>
                                <td class="response_code_{{$transaction->reference}}">{{$transaction->response_code}}</td>
                                <td class="response_description_{{$transaction->reference}}">{{$transaction->response_description}}</td>
                                <td>{{date('d, D M Y', strtotime($transaction->created_at))}}</td>
                                <td>
                                    <button value="{{$transaction->reference}}" @if(config('interswitch.env') == 'LIVE' && $transaction->environment == 'TEST') disabled @endif type="button" class="btn btn-sm btn-primary requery">
                                        Requery
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.0/b-colvis-1.6.0/b-flash-1.6.0/b-html5-1.6.0/b-print-1.6.0/fh-3.1.6/r-2.2.3/sc-2.0.1/sl-1.3.1/datatables.min.js"></script>
<script>
    $(document).ready(() => {
        let table = $('.table');
        table.DataTable({
            dom: 'Bfrtip',
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                ['5 rows', '10 rows', '25 rows', '50 rows', '100 rows', 'Show all']
            ],
            buttons: [
                {
                    extend: 'collection',
                    text: 'Export',
                    buttons: ['copy', 'excel', 'pdf', 'csv']
                },
                'print',
                'pageLength'
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });
        table.on('click', '.requery', function(){
            let reference = $(this).val();
            $(this).prop('disabled',true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>\n' +
                '  Loading...');
            axios.post('/interswitch-confirm-payment', {reference: reference})
                .then((response) => {
                    $(this).prop('disabled',false).html('Requery');
                    toastr.info(response.data.message,response.data.status);
                    $('.table .response_code_'+reference).html(response.data.data.response_code);
                    $('.table .response_description_'+reference).html(response.data.data.response_description);
                    if(['00','10','11'].includes(response.data.data.response_code)) {
                        $('.table .status_'+reference).html('<span class="badge badge-success"> Successful</span>');
                    }else{
                        $('.table .status_'+reference).html('<span class="badge badge-danger"> Failed</span>');
                    }
                })
                .catch((error) => {
                    $(this).prop('disabled',false).html('Requery');
                    toastr.info(error.response.data.message,error.response.data.status);
                    let errors = error.response.data.errors;
                    errors.forEach((error, key)=>{
                        toastr.error(error, key)
                    })
                });
        });
    });
</script>
</html>
