@extends('backend.layouts.master')
@section('title',"CMH :: ADMINISTRATOR")
@section('content')

<?php $getHost = request()->getSchemeAndHttpHost(); ?>

<div class="card-header">
    <span><i class="fa fa-table"></i> Dataset Report</span>
</div>
<div class="card-body">
    <div class="text-right" style="padding-bottom: 1.2rem;">
        <a href="table_new" class="btn btn-info btn-sm">
            <i class="fa fa-plus-circle"></i> เพิ่มตารางข้อมูล
        </a>
    </div>
    <div class="table-responsive">
        <table id="example" class="table table-border table-striped" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">ID</th>
                    <th>Report Name</th>
                    <th>Query</th>
                    <th class="text-center">Permission</th>
                    <th class="text-center"><i class="fa fa-edit"></i></th>
                    <th class="text-center"><i class="fa fa-link"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach($response as $tables)
                    <tr>
                        <td class="text-center">{{ $tables->table_id }}</td>
                        <td>{{ $tables->table_name }}</td>
                        <td>{{ $tables->table_query }}</td>
                        <td class="text-center">{{ $tables->table_level }}</td>
                        <td class="text-center">
                            <a href="{{ route('backend.table_show',$tables->table_id) }}"
                                class="btn btn-sm btn-danger">
                                <i class="fa fa-edit"></i> แก้ไข
                            </a>
                        </td>
                        <td class="text-center">
                            <div class="input-group">
                                <input id="cpLink{{ $tables->table_id }}" type="text" class="form-control"
                                    value="{{ $getHost."/report"."/".base64_encode($tables->table_id) }}"
                                    readonly>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-sm btn-secondary copyLink"
                                        data-id="{{ $tables->table_id }}">
                                        <i class="fa fa-copy"></i> URL
                                    </button>
                                </div>
                            </div>
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

    $('.copyLink').click(function () {
        var id = $(this).attr('data-id');
        var textBox = document.getElementById("cpLink" + id);
        textBox.select();
        document.execCommand("copy");
    });

</script>
@endsection
