@extends('backend.layouts.master')
@section('title',"CMH :: ADMINISTRATOR")
@section('content')

<div class="card-header">
    <span><i class="fa fa-plus-circle"></i> เพิ่มตารางข้อมูล</span>
</div>
<div class="card-body">
    <form id="addTable">
        <div class="form-group">
            <label>ชื่อตารางข้อมูล</label>
            <input type="text" name="table_name" class="form-control" placeholder="ระบุชื่อตารางข้อมูล">
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
        <div class="form-group">
            <label>สถานะ</label>
            <select name="table_active" class="custom-select mr-sm-2" required>
                <option value="">เลือก...</option>
                <option value="Y">แสดง</option>
                <option value="N">ปกปิด</option>
            </select>
        </div>
        <div class="form-group">
            <label>คำสั่ง :: Query SQL</label>
            <textarea name="table_query" class="form-control" rows="6" placeholder="SELECT some_column FROM some_table"></textarea>
        </div>
        <div class="form-group">
            <label>กำหนดหัวตาราง</label>
            <textarea class="form-control" id="summary-ckeditor" name="table_html"></textarea>
        </div>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-outline-success"><i class="far fa-save"></i> Save Dataset</button>
        </div>
    </form>
</div>

@endsection
@section('script')
<script>
    $('#addTable').on("submit", function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'ยืนยันการสร้างรายงาน ?',
            showCancelButton: true,
            confirmButtonText: `บันทึก`,
            cancelButtonText: `ยกเลิก`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('backend.tablestore') }}",
                    data: $('#addTable').serialize(),
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'สร้างรายงานใหม่สำเร็จ',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        window.setTimeout(function () {
                            location.replace('table')
                        }, 1500);
                    }
                });
            }
        })
    });
</script>
@endsection
