@extends('layouts.master')
@section('title',"CMH :: DASHBOARD")
@section('content')
@include('part.breadcrumb')

<div class="card-body">
    <div class="row">
        <div class="card-body">
            <div class="col-md-12">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="{{$dashboard->sub_src}}"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
{{-- Script --}}
@endsection