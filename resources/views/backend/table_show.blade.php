@extends('backend.layouts.master')
@section('title',"CMH :: ADMINISTRATOR")
@section('content')

<div class="card-header">
    <a href="/backend/table">จัดการรายงาน</a> / {{ $data->table_name }}
</div>

<div class="card-body">
    <form id="addTable">
        <div class="form-group">
            <label>ชื่อตารางข้อมูล</label>
            <input type="text" name="table_name" class="form-control" value="{{ $data->table_name }}">
        </div>
        <div class="form-group">
            <label>กำหนดสิทธิ์การเข้าถึงข้อมูล</label>
            <div class="col-md-12">
                <div class="checkbox">
                    <label for="permission-0">
                        <input type="checkbox" name="table_level[]" id="permission-0" value="3">
                        ระดับ :: จังหวัด
                    </label>
                </div>
                <div class="checkbox">
                    <label for="permission-1">
                        <input type="checkbox" name="table_level[]" id="permission-1" value="4">
                        ระดับ :: อำเภอ
                    </label>
                </div>
                <div class="checkbox">
                    <label for="permission-2">
                        <input type="checkbox" name="table_level[]" id="permission-2" value="5">
                        ระดับ :: รพ.สต.
                    </label>
                </div>
            </div>
        </div>
        @if($data->table_active == 'N')
            <?php $check = "SELECTED"; ?>
        @else
            <?php $check = ""; ?>
        @endif
        <div class="form-group">
            <label for="">สถานะ</label>
            <select name="sub_active" class="custom-select mr-sm-2" required>
                <option value="Y" {{ $check }}>แสดง</option>
                <option value="N" {{ $check }}>ปกปิด</option>
            </select>
        </div>
        <div class="form-group">
            <label>คำสั่ง :: Query SQL</label>
            <textarea name="table_query" class="form-control" rows="6"
                placeholder="SELECT some_column FROM some_table">{{ $data->table_query }}</textarea>
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
<?php $raws_json = json_encode($raws); ?>
@endsection
@section('script')
<script>
    // var dataSet = {!! json_encode($raws) !!}
    // var dataSet = @json($raws);
    var dataSet = [
        [
            "Tiger Nixon",
            "System Architect",
            "Edinburgh",
        ],
        [
            "Garrett Winters",
            "Accountant",
            "Tokyo",
        ],
        [
            "Ashton Cox",
            "Junior Technical Author",
            "San Francisco",
        ],
        [
            "Cedric Kelly",
            "Senior Javascript Developer",
            "Edinburgh",
        ],
        [
            "Airi Satou",
            "Accountant",
            "Tokyo",
        ],
        [
            "Brielle Williamson",
            "Integration Specialist",
            "New York",
        ],
        [
            "Herrod Chandler",
            "Sales Assistant",
            "San Francisco",
        ],
        [
            "Rhona Davidson",
            "Integration Specialist",
            "Tokyo",
        ],
    ]
    $(document).ready(function () {
        $('#example').DataTable({
            searching: false,
            data: dataSet,
        });
    });

</script>
@endsection
