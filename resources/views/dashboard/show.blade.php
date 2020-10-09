@extends('layouts.master')
@section('title',"CMH :: DASHBOARD")
@section('content')

<div class="card-body">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">{{$dashboard->group_name}}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{$dashboard->sub_name}}</li>
        </ol>
      </nav>
      <div class="row">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{$dashboard->sub_src}}"></iframe>
        </div>
    </div>
</div>

@endsection