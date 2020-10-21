@extends('layouts.master')
@section('title',"CMH :: DASHBOARD")
@section('content')

<div class="col-lg-12">
    <h2> {{ $data->table_name }}</h2>
    <div class="col-lg-12">
        {!! $data->table_html !!}
    </div>
</div>

@endsection
@section('script')
<script>
    var report = @json($raws);
    var col = [];

    for (var i = 0; i < report.length; i++) {
        for (var key in report[i]) {
            if (col.indexOf(key) === -1) {
                col.push(key);
            }
        }
    }
    var tables = document.querySelector('table');
    tables.setAttribute('id', 'cmTable');
    var xtable = document.getElementById('cmTable');
    var table = document.querySelector('#cmTable tbody');

    // var tr = table.insertRow(-1);

    for (var i = 0; i < report.length; i++) {
        tr = table.insertRow(-1);
        for (var j = 0; j < col.length; j++) {
            var tabCell = tr.insertCell(-1);
            tabCell.innerHTML = report[i][col[j]];
        }
    }

    xtable.setAttribute('class', 'table table-striped table-sm table-bordered compact');

    $(document).ready(function () {
        $('#cmTable').DataTable({
            searching: false,
            pageLength: 20,
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excel',
                text: '<i class="fa fa-file-export"></i> Excel',
                className: "btn btn-success btn-sm",
            }],
        });
    });

</script>
@endsection
