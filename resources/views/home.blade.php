@extends('layouts.master')
@section('title',"CMH :: DASHBOARD")
@section('content')
<div class="container" style="padding-bottom: 27.5rem">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-check-circle text-success"></i>
                    <strong> {{ __('Login Success') }} </strong>
                </div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <span>
                        สวัสดีคุณ {{ Auth::user()->fullname }}
                    </span>
                    <span>
                        {{ Auth::user()->level }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
