@extends('layouts.app')
@section('title','国と都市')

@section('content')
<div class="container">
    <div class="rtl mg-top-25">
        <div class="row">
            @foreach($locations as $loc)
            <div class="col-md-4">
                <div class="category-card text-center">
                    <h1> <i class="fa fa-globe-africa"></i> </h1>
                    <h3>{{$loc->name}}</h3>
                    <a href="{{route('browse',['by' => 'location', 'locID' => $loc->id])}}" class="btn btn-sm btn-success">仕事を閲覧 - @php echo count($loc->jobs); @endphp </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop
