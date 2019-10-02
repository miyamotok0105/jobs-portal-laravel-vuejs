@extends('layouts.app')
@section('title')
    {{$job->title}}
@stop

@section('content')
    <div class="container">
        <div class="rtl mg-top-25">
            <div class="text-center">
                <h1>{{$job->title}}</h1>
                <p style="font-size: 1.1rem;"> <i class="fa fa-cube"></i> {{$job->category->name}} <i class="fa fa-compass"></i> {{$job->location->name}} <i class="fa fa-building"></i> {{$job->company->name}} <i class="fa fa-clock"></i> {{ \Carbon\Carbon::parse($job->created_at)->timezone('Asia/Baghdad')->format('F, d, Y')}}</p>
                <p style="font-size: 1.1rem;"> 給与: {{$job->expected_salary}} ,, 送信: {{$job->apply_email}}</p>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="pd-10" style="border-left: 1px solid #EEE;">
                        <h3>詳細</h3>
                        <p>{{$job->description}}</p>
                    </div>

                </div>
                <div class="col-md-6 text-center">
                    <div class="pd-10" style="border-right: 1px solid #EEE;">
                        <h3>条件と資格</h3>
                        <p>{{$job->qualifications}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
