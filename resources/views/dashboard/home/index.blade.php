@extends('layouts.dashboard')
@section('title','Dashboard Home')

@section('content')
    <div class="row">
            <div class="col-lg-3 col-6">
                    <div class="small-box bg-default">
                      <div class="inner">
                        <h3>{{ $counter['users'] }}</h3>
                        <p>Administrators</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-users"></i>
                      </div>
                    </div>
            </div>

            <div class="col-lg-3 col-6">
                    <div class="small-box bg-default">
                      <div class="inner">
                        <h3>{{ $counter['categories'] }}</h3>
                        <p>Categories</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-cube"></i>
                      </div>
                    </div>
            </div>


            <div class="col-lg-3 col-6">
                    <div class="small-box bg-default">
                      <div class="inner">
                        <h3>{{ $counter['companies'] }}</h3>
                        <p>Compaines</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-building"></i>
                      </div>
                    </div>
            </div>


            <div class="col-lg-3 col-6">
                    <div class="small-box bg-default">
                      <div class="inner">
                        <h3>{{ $counter['locations'] }}</h3>
                        <p>Locations</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-compass"></i>
                      </div>
                    </div>
            </div>

            <div class="col-lg-6 col-6">
                    <div class="small-box bg-default">
                      <div class="inner">
                        <h3>{{ $counter['types'] }}</h3>
                        <p>Types</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-asterisk"></i>
                      </div>
                    </div>
            </div>

            <div class="col-lg-6 col-6">
                    <div class="small-box bg-default">
                      <div class="inner">
                        <h3>{{ $counter['jobs'] }}</h3>
                        <p>Number of All Jobs in Site</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-puzzle-piece"></i>
                      </div>
                    </div>
            </div>


    </div>


    <div class="row">
        <div class="col-md-12">
          <h1 class="text-center" style="color:#CCC;margin-top: 50px;font-size:8rem;">
            <i class="fa fa-band-aid"></i>
          </h1>
        </div>
    </div>
@stop
