@extends('backend.layouts.master')
@section('title',"CMH :: ADMINISTRATOR")
@section('content')

<div class="card-header">
    <h5><i class="fa fa-tasks"></i> จัดการรายงาน</h5>
</div>
<div class="card-body">
    <div class="col-md-12">
        <div class="text-right" style="padding-bottom: 1.2rem;">
            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#MenuModal">
                <i class="fa fa-plus-circle"></i> เพิ่มรายงาน
            </button>
        </div>
        <div class="table-responsive">
            <table id="example" class="table table-border table-striped" style="width:100%">
                <thead class="thead-dark">
                  <tr>
                    <th class="text-center">ID</th>
                    <th>Report Name</th>
                    <th>Source Embed</th>
                    <th class="text-center">Status</th>
                    <th class="text-center"><i class="fa fa-edit"></i></th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($response as $result)
                <tr>
                  <td class="text-center">{{$result->sub_id}}</td>
                  <td>{{$result->sub_name}}</td>
                  <td><a href="{{$result->sub_src}}" target="_blank">{{$result->sub_src}}</a></td>
                  <td class="text-center">
                    @if ($result->sub_active=='Y')
                    <?php $badge = "success"; $text = "แสดง"; ?>
                    @else
                    <?php $badge = "danger"; $text = "ปกปิด"; ?>
                    @endif
                    <span style="font-size: 13px;" class="badge badge-pill badge-{{$badge}}"> {{$text}}</span>
                  </td>
                  <td class="text-center">
                    <a href="{{route('backend.report_show',$result->sub_id)}}">
                        <i class="fa fa-edit"></i> แก้ไข
                    </a>
                  </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- AddReportModal -->
<form id="addReport">
    <div class="modal fade" id="MenuModal" tabindex="-1" role="dialog" aria-labelledby="MenuModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="MenuModal"><i class="fa fa-plus-circle"></i> เพิ่มรายงาน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">เมนูหลัก</label>
                        <div class="col-sm-10">
                            <select class="basic-single" name="sub_group">
                                <option value="">เลือก...</option>
                                @foreach ($menulist as $list)
                                <option value="{{$list->group_id}}">{{$list->group_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">ชื่อรายงาน</label>
                        <div class="col-sm-10">
                            <input type="text" name="sub_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">แหล่งข้อมูล</label>
                        <div class="col-sm-10">
                            <input type="text" name="sub_src" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">สถานะ</label>
                        <div class="col-sm-10">
                            <select name="sub_active" class="custom-select mr-sm-2" required>
                                <option value="">เลือก...</option>
                                <option value="Y">แสดง</option>
                                <option value="N">ปกปิด</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnSave" class="btn btn-primary btn-sm">บันทึกรายการ</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">ปิดหน้าต่าง</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );

$('#addReport').on("submit", function(event) {
    event.preventDefault();
    Swal.fire({
        title: 'ยืนยันการบันทึกรายการใหม่ ?',
        showCancelButton: true,
        confirmButtonText: `บันทึก`,
        cancelButtonText: `ยกเลิก`,
    }).then((result) => {
    if (result.isConfirmed)
    {
        $.ajax({
            url: "{{route('backend.reportstore')}}",
            data: $('#addReport').serialize(),
            success: function(data) {
                    Swal.fire({
                            icon: 'success',
                            title: 'บันทึกรายการใหม่สำเร็จ',
                            showConfirmButton: false,
                            timer: 3000
                    })
                    window.setTimeout(function() {
                        location.replace('report')
                    }, 1500);
                }
            });
        } 
    })
});

$(document).ready(function() {
    $('.basic-single').select2({
        width: '100%'
    });
});
</script>
@endsection