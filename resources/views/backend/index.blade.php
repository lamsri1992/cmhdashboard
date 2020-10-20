@extends('backend.layouts.master')
@section('title',"CMH :: ADMINISTRATOR")
@section('content')

<div class="card-header">
    <span><i class="fa fa-home"></i> Home : Dashboard</span>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table id="example" class="table table-border table-striped" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">ID</th>
                    <th>Dashboard Group</th>
                    <th>Dashboard Name</th>
                    <th>Source Embed</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($response as $result)
                    <tr>
                        <td class="text-center">{{ $result->sub_id }}</td>
                        <td>{{ $result->group_name }}</td>
                        <td>{{ $result->sub_name }}</td>
                        <td><a href="{{ $result->sub_src }}" target="_blank">{{ SUBSTR($result->sub_src,0,50) }}...</a></td>
                        <td class="text-center">
                            @if($result->sub_active=='Y')
                                <?php $badge = "success"; $text = "แสดง"; ?>
                            @else
                                <?php $badge = "danger"; $text = "ปกปิด"; ?>
                            @endif
                            <span style="font-size: 13px;" class="badge badge-pill badge-{{ $badge }}">
                                {{ $text }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

</script>
@endsection
