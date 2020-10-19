@extends('layouts.master')
@section('title',"CMH :: DASHBOARD")
@section('content')

<div class="col-lg-12">
    <span class="text-secondary">{{ $dashboard->group_name }}</span>
    <h2>{{ $dashboard->sub_name }}</h2>
    <div class="col-lg-12" style="text-align: center;margin: 0 auto">
        <iframe width="{{ $dashboard->sub_width }}" height="{{ $dashboard->sub_height }}"
            src="{{ $dashboard->sub_src }}" frameborder="0" style="border:0" allowfullscreen>
        </iframe>
    </div>
</div>

@endsection
@section('script')
{{-- Script --}}
@endsection
