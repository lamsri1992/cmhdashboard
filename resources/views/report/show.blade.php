@extends('layouts.master')
@section('title',"CMH :: DASHBOARD")
@section('content')
<div class="col-lg-12">
    <h2> {{ $data->table_name }}</h2>
    <?php $array = explode(',',$data->table_level); ?>
    @if(in_array(Auth::user()->dlevel, $array))
        <?php $visible = ''; ?>
    @else
        <?php $visible = 'hidden'; ?>
    @endif

    <div class="col-lg-12" {{ $visible }}>
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

    var val = "<?php echo $visible ?>";

    if (val == 'hidden') {
        Swal.fire({
            icon: 'error',
            title: 'คำเตือน',
            html: '<p style="font-weight:bold;">ท่านไม่สามารถเข้าถึงข้อมูลของรายงานนี้ได้</p>' +
                '<p>1. ท่านอาจจะยังไม่ได้ทำการลงชื่อเข้าใช้งาน</p>' +
                '<p>2. รายงานนี้ต้องใช้สิทธิ์การเข้าถึง</p>',
            footer: '<small>ระบบจะนำท่านไปยังหน้าหลักใน <input type="text" id="counter" style="text-align:center;color:red;" size="1" readonly> วินาที</small>',
            allowOutsideClick: false,
            showCancelButton: false,
            showConfirmButton: false
        })
        var seconds = 6;
        document.getElementById("counter").value = '6';

        function display() {
            seconds -= 1;
            if (seconds == -1) {
                return;
            }
            document.getElementById("counter").value = seconds;
            setTimeout("display()",
                1000);
        }
        display();
        window.setTimeout(function () {
            location.replace('/dashboard')
        }, 6000);
    }

</script>
@endsection
