@extends('layouts.app')
@section('title','職種')

@section('content')
<div class="container">
    <div class="rtl mg-top-25">
        <div class="row">
            @foreach($categories as $cat)
            <div class="col-md-4">
                <div class="category-card text-center">
                    <h1> <i class="fa fa-cube"></i> </h1>
                    <h3>{{$cat->name}}</h3>
                    <a href="{{route('browse',['by' => 'category', 'catID' => $cat->id])}}" class="btn btn-sm btn-success">仕事を閲覧- @php echo count($cat->jobs); @endphp </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop
