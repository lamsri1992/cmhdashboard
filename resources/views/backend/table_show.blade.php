@extends('backend.layouts.master')
@section('title',"CMH :: ADMINISTRATOR")
@section('content')

<div class="card-header">
    <a href="/backend/table">Dataset Report</a> / {{ $data->table_name }}
</div>

<div class="card-body">
    <form id="updateTable">
        <div class="form-group">
            <label>ชื่อตารางข้อมูล</label>
            <input type="text" name="table_name" class="form-control" value="{{ $data->table_name }}">
        </div>
        <?php $value = explode(',',$data->table_level); ?>
        <div class="form-group">
            <label>กำหนดสิทธิ์การเข้าถึงข้อมูล</label>
            <div class="col-md-12">
                <div class="checkbox">
                    <label for="permission-0">
                        <input type="checkbox" name="table_level[]" id="permission-0" value="3"
                            <?php echo in_array(3,$value) ? "CHECKED" : ""; ?>>
                        ระดับ :: จังหวัด
                    </label>
                </div>
                <div class="checkbox">
                    <label for="permission-1">
                        <input type="checkbox" name="table_level[]" id="permission-1" value="4"
                            <?php echo in_array(4,$value) ? "CHECKED" : ""; ?>>
                        ระดับ :: อำเภอ
                    </label>
                </div>
                <div class="checkbox">
                    <label for="permission-2">
                        <input type="checkbox" name="table_level[]" id="permission-2" value="5"
                            <?php echo in_array(5,$value) ? "CHECKED" : ""; ?>>
                        ระดับ :: รพ.สต.
                    </label>
                </div>
            </div>
        </div>
        @if($data->table_active == 'N')
            <?php $selected = "SELECTED"; ?>
        @else
            <?php $selected = ""; ?>
        @endif
        <div class="form-group">
            <label for="">สถานะ</label>
            <select name="sub_active" class="custom-select mr-sm-2" required>
                <option value="Y" {{ $selected }}>แสดง</option>
                <option value="N" {{ $selected }}>ปกปิด</option>
            </select>
        </div>
        <div class="form-group">
            <label>คำสั่ง :: Query SQL</label>
            <textarea name="table_query" class="form-control" rows="6">{{ $data->table_query }}</textarea>
        </div>
        <div class="form-group">
            <label>กำหนดหัวตาราง</label>
            <textarea class="form-control" id="summary-ckeditor" name="table_html">{{ $data->table_html }}</textarea>
        </div>
        <div class="form-group text-right">
            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#preData">
                <i class="far fa-eye"></i> Preview Dataset
            </button>
            <button type="submit" class="btn btn-outline-success">
                <i class="far fa-save"></i> Save Dataset
            </button>
        </div>
    </form>
</div>
<div class="modal fade" id="preData" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="preData">Preview Dataset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $data->table_html !!}
            </div>
        </div>
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
    var xtable = document.getElementById("cmTable");
    var table = document.querySelector('#cmTable tbody');

    var tr = table.insertRow(-1);

    for (var i = 0; i < report.length; i++) {
        tr = table.insertRow(-1);
        for (var j = 0; j < col.length; j++) {
            var tabCell = tr.insertCell(-1);
            tabCell.innerHTML = report[i][col[j]];
        }
    }

    xtable.setAttribute('class', 'table table-striped table-sm table-bordered');

    $('#updateTable').on("submit", function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'ยืนยันการบันทึกรายการ ?',
            showCancelButton: true,
            confirmButtonText: `บันทึก`,
            cancelButtonText: `ยกเลิก`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    // url: "{{ route('backend.reportupdate',$data->table_id) }}",
                    data: $('#updateMenu').serialize(),
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'บันทึกรายการสำเร็จ',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        window.setTimeout(function () {
                            location.replace('/backend/table')
                        }, 1500);
                    }
                });
            }
        })
    });

</script>
@endsection
