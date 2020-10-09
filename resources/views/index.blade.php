@extends('layouts.master')
@section('title',"CMH :: DASHBOARD")
@section('content')

<div class="card-body">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2">
                <img src="https://cmbis.chiangmaihealth.go.th/web/img/chiangmaihealth.ico" width="100%">
             </div>
            <div class="col-md-10">
                <div style="padding-top: 5%;">
                    <h2>Chiangmai Data Dashboard System (CM-DDS)</h2>
                    <p class="text-secondary">&nbsp;ระบบรายงานข้อมูล สาธารณสุขจังหวัดเชียงใหม่</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.chartjs.org/samples/latest/legend/point-style.html"></iframe>
        </div>
    </div>
</div>

@endsection