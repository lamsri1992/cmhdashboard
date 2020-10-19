@extends('backend.layouts.master')
@section('title',"CMH :: ADMINISTRATOR")
@section('content')

<div class="card-header">
    <a href="/backend/menu">Dashboard Group</a> /
    <span>{{ $data->group_id }} :: {{ $data->group_name }}</span>
</div>

<div class="card-body">
    <form id="updateMenu">
        <div class="form-group">
            <label for="">ชื่อเมนูหลัก</label>
            <input type="text" name="group_name" class="form-control" value="{{ $data->group_name }}">
        </div>
        @if($data->group_active == 'N')
            <?php $check = "SELECTED"; ?>
        @else
            <?php $check = ""; ?>
        @endif
        <div class="form-group">
            <label for="">สถานะ</label>
            <select name="group_active" class="custom-select mr-sm-2" required>
                <option value="Y" {{ $check }}>แสดง</option>
                <option value="N" {{ $check }}>ปกปิด</option>
            </select>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-success">บันทึกการแก้ไข</button>
        </div>
    </form>
</div>

@endsection
@section('script')
<script>
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
                    url: "{{ route('backend.menuupdate',$data->group_id) }}",
                    data: $('#updateMenu').serialize(),
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'บันทึกรายการสำเร็จ',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        window.setTimeout(function () {
                            location.replace('/backend/menu')
                        }, 1500);
                    }
                });
            }
        })
    });

</script>
@endsection
