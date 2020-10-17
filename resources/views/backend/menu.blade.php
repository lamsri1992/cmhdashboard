@extends('backend.layouts.master')
@section('title',"CMH :: ADMINISTRATOR")
@section('content')

<div class="card-header">
    <span><i class="fa fa-sitemap"></i> จัดการเมนูระบบ</span>
</div>
<div class="card-body">
    <div class="col-md-12">
        <div class="text-right" style="padding-bottom: 1.2rem;">
            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#MenuModal">
                <i class="fa fa-plus-circle"></i> เพิ่มเมนูระบบ
            </button>
        </div>
        <div class="table-responsive">
            <table id="example" class="table table-border table-striped" style="width:100%">
              <thead class="thead-dark">
                <tr>
                  <th class="text-center">ID</th>
                  <th>Dashboard Group</th>
                  <th class="text-center">Status</th>
                  <th class="text-center"><i class="fa fa-edit"></i></th>
                </tr>
              </thead>
              <tbody>
              @foreach ($response as $result)
              <tr>
                <td class="text-center">{{$result->group_id }}</td>
                <td>{{$result->group_name}}</td>
                <td class="text-center">
                  @if ($result->group_active=='Y')
                  <?php $badge = "success"; $text = "แสดง"; ?>
                  @else
                  <?php $badge = "danger"; $text = "ปกปิด"; ?>
                  @endif
                  <span style="font-size: 13px;" class="badge badge-pill badge-{{$badge}}"> {{$text}}</span>
                </td>
                <td class="text-center">
                    <a href="{{route('backend.menu_show',$result->group_id)}}">
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

<!-- AddMenuModal -->
<form id="addMenu">
    <div class="modal fade" id="MenuModal" tabindex="-1" role="dialog" aria-labelledby="MenuModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="MenuModal"><i class="fa fa-plus-circle"></i> เพิ่มเมนูหลัก</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">ชื่อเมนู</label>
                        <div class="col-sm-10">
                            <input type="text" name="group_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">สถานะ</label>
                        <div class="col-sm-10">
                            <select name="group_active" class="custom-select mr-sm-2" required>
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

    $('#addMenu').on("submit", function(event) {
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
            url: "{{route('backend.menustore')}}",
            data: $('#addMenu').serialize(),
            success: function(data) {
                    Swal.fire({
                            icon: 'success',
                            title: 'บันทึกรายการใหม่สำเร็จ',
                            showConfirmButton: false,
                            timer: 3000
                    })
                    window.setTimeout(function() {
                        location.replace('menu')
                    }, 1500);
                }
            });
        } 
    })
});
</script>
@endsection