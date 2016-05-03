@extends('master')
@section('sidebar')
    @include('sidebar.doctor')
@stop
@section('content')

<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            <i class="fa fa-user-md"></i> Dashboard <small>Doctor Hadi</small>
        </h1>
        <div class="panel panel-default">
            
        </div>
        <div class="row">
            
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Patient Queue for Consultation
                    </div>
                    <div class="panel-queue">
                        <div class="list-group">
                        @foreach ($queue as $que)
                            @if($que->status == "Waiting" || $que->status == "Consulting")
                                <a href="{{action('DocController@show', $que->id)}}" class="list-group-item">
                                    <span class="badge">{{ $que->status }}</span>
                                    <i class="fa fa-fw fa-user"></i> {{ $que->name }}
                                </a>
                            @else
                                <a href="#" class="list-group-item">
                                    <span class="badge">{{ $que->status }}</span>
                                    <i class="fa fa-fw fa-user"></i> {{ $que->name }}
                                </a>
                            @endif
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-brown">
                    <div class="panel-left pull-left brown">
                        <i class="fa fa-users fa-5x"></i>
                        
                    </div>
                    <div class="panel-right">
                    <h3>{{ count($queue) }}</h3>
                     <strong> Total in Queue </strong>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        To Do List (Click to remove)
                    </div>
                    <div class="panel-queue">
                        <div class="list-group">
                                <input type="text" class="form-control" id="task"></input>
                                <input type="button" id="add" class="form-control" value="Add"></input>
                                
                                <div id="todos"></div>
                        </div>
                        <!-- <div class="text-right">
                            <a href="#">More <i class="fa fa-arrow-circle-right"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-green green">
                    <div class="panel-left pull-left green">
                        <i class="fa fa-eye fa-5x"></i>
                        
                    </div>
                    <div class="panel-right">
                        <h3>{{ count($patient) }}</h3>
                       <strong> Total Patient</strong>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@stop