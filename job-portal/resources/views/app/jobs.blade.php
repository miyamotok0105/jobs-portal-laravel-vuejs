@extends('layouts.app')
@section('title','機能')

@section('content')
    <div class="container">
        <div class="rtl mg-top-25">
            @if(isset($_GET['searchText']))
                <h1>の検索結果: @php echo $_GET['searchText']; @endphp</h1>
            @else
                <h1>{{$job->name}}</h1>
            @endif

            <hr>
            <div class="row">
                @if(isset($_GET['searchText']))
                @forelse($job as $jb)
                <div class="col-md-12">
                    <div class="job-card">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4>{{$jb->title}} <span>{{$jb->type->name}}</span> </h4>
                                <p> <i class="fa fa-cube"></i> {{$jb->category->name}} <i class="fa fa-compass"></i> {{$jb->location->name}} <i class="fa fa-building"></i> {{$jb->company->name}} <i class="fa fa-clock"></i> {{ \Carbon\Carbon::parse($jb->created_at)->timezone('Asia/Baghdad')->format('F, d, Y')}}</p>
                            </div>
                            <div class="col-sm-3 text-center">
                                <a href="{{ route('browse.job',['jobID' => $jb->id]) }}" class="btn-job-info">詳細を見る/a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <center>
                        <h2>検索結果に一致する求人はありません</h2>
                    </center>
                @endforelse
                @else
                @forelse($job->jobs as $jb)
                <div class="col-md-12">
                    <div class="job-card">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4>{{$jb->title}} <span>{{$jb->type->name}}</span> </h4>
                                <p> <i class="fa fa-cube"></i> {{$jb->category->name}} <i class="fa fa-compass"></i> {{$jb->location->name}} <i class="fa fa-building"></i> {{$jb->company->name}} <i class="fa fa-clock"></i> {{ \Carbon\Carbon::parse($jb->created_at)->timezone('Asia/Baghdad')->format('F, d, Y')}}</p>
                            </div>
                            <div class="col-sm-3 text-center">
                                <a href="{{ route('browse.job',['jobID' => $jb->id]) }}" class="btn-job-info">詳細を見る</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <center>
                        <h2>まだ仕事がありません</h2>
                    </center>
                @endforelse
                @endif
            </div>
        </div>
    </div>
@stop
