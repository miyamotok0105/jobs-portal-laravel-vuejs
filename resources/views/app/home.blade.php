@extends('layouts.app')
@section('title','الصفحه الرئيسيه')

@section('content')
    <div class="container">
        <div class="rtl mg-top-25">
            <div class="text-center">
                <form method="get" action="/jobs-browse/search">
                    <div class="">
                        <input class="search-textBox" type="text" name="searchText" placeholder="البحث ... " autofocus>
                    </div>
                </form>
            </div>

            <div class="">
                @foreach($types as $tp)
                    <a href="{{route('browse',['by' => 'type', 'typeID' => $tp->id])}}" class="btn btn-sm btn-success" style="margin-bottom: 5px;">{{$tp->name}} - <span>@php echo count($tp->jobs); @endphp</span> </a>
                @endforeach
            </div>

            <hr>
            <h1>احدث الوظائف المعروضه</h1>
            <div class="row">
                
                @forelse($jobs as $job)
                <div class="col-md-12">
                    <div class="job-card">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4>{{$job->title}} <span>{{$job->type->name}}</span> </h4>
                                <p> <i class="fa fa-cube"></i> {{$job->category->name}} <i class="fa fa-compass"></i> {{$job->location->name}} <i class="fa fa-building"></i> {{$job->company->name}} <i class="fa fa-clock"></i> {{ \Carbon\Carbon::parse($job->created_at)->timezone('Asia/Baghdad')->format('F, d, Y')}}</p>
                            </div>
                            <div class="col-sm-3 text-center">
                                <a href="{{ route('browse.job',['jobID' => $job->id]) }}" class="btn-job-info">عرض التفاصيل</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
@stop
