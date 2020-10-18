@extends('backend.layouts.master')
@section('title',"CMH :: ADMINISTRATOR")
@section('content')

<div class="card-header">
    <a href="/backend/report">จัดการ Dashboard</a> /
    <span>{{ $data->sub_id }} :: {{ $data->sub_name }}</span>
</div>

<div class="card-body">
    <form id="updateMenu">
        <div class="form-group">
            <label for="">ชื่อเมนูหลัก</label>
            <select class="basic-single" name="sub_group">
                @foreach($menu as $list)
                    @if($list->group_id == $data->sub_group)
                        <?php $main = "SELECTED"; ?>
                    @else
                        <?php $main = ""; ?>
                    @endif
                    <option value="{{ $list->group_id }}" {{ $main }}>{{ $list->group_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">ชื่อรายงาน</label>
            <input type="text" name="sub_name" class="form-control" value="{{ $data->sub_name }}">
        </div>
        <div class="form-group">
            <label for="">Source Embed</label>
            <input type="text" name="sub_src" class="form-control" value="{{ $data->sub_src }}">
        </div>
        <div class="form-group">
            <label for="">Order</label>
            <input type="number" name="sub_order" class="form-control" value="{{ $data->sub_order }}">
        </div>
        @if($data->sub_active == 'N')
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
        <div class="text-right">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#preDashboard">
                <i class="far fa-eye"></i> Dashboard Preview
            </button>
            <button type="submit" class="btn btn-success">บันทึกการแก้ไข</button>
        </div>
    </form>
</div>

<div class="modal fade" id="preDashboard" tabindex="-1" role="dialog" aria-labelledby="preDashboardLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="preDashboardLabel">Dashboard Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{ $data->sub_src }}"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('.basic-single').select2({
            width: '100%'
        });
    });

    $('#updateMenu').on("submit", function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'ยืนยันการบันทึกรายการ ?',
            showCancelButton: true,
            confirmButtonText: `บันทึก`,
            cancelButtonText: `ยกเลิก`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('backend.reportupdate',$data->sub_id) }}",
                    data: $('#updateMenu').serialize(),
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'บันทึกรายการสำเร็จ',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        window.setTimeout(function () {
                            location.replace('/backend/report')
                        }, 1500);
                    }
                });
            }
        })
    });

</script>
@endsection
