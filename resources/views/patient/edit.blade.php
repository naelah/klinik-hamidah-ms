@extends('master')
@section('sidebar')
    @include('sidebar.staff')
@stop
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h1>Edit Patient Details</h1>
    </div>
    
    <div class="panel-body">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">New</a>
            </li>
            <!-- <li class=""><a href="#profile" data-toggle="tab">Existing</a>
            </li>
            <li class=""><a href="#messages" data-toggle="tab">Empty</a>
            </li>
            <li class=""><a href="#settings" data-toggle="tab">Empty</a>
            </li> -->
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade active in" id="home">
                <h4>Edit Details of {{$patient->pt_name}}</h4>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group">
                            {!! Form::model($patient, ['method' => 'PATCH','route' => ['patient.update', $patient->id]]) !!}
                            <div class="col-lg-6">
                                {!! Form::label('', 'IC Number', ['class' => 'control-label']) !!}
                                {!! Form::text('pt_ic', null, ['class' => 'form-control']) !!}
                                {!! Form::label('', 'Name', ['class' => 'control-label']) !!}
                                {!! Form::text('pt_name', null, ['class' => 'form-control']) !!}
                                {!! Form::label('', 'Contact No', ['class' => 'control-label']) !!}
                                {!! Form::text('pt_contactNo', null, ['class' => 'form-control']) !!}
                                {!! Form::label('pt_dob', 'Date of Birth', ['class' => 'control-label']) !!}
                                {!! Form::input('date','pt_dob', null, ['class' => 'form-control']) !!}<br>
                                {!! Form::label('', 'Gender', ['class' => 'control-label']) !!}<br>
                                {!! Form::radio('pt_gender', 'Male', ['class' => 'form-control']) !!} Male
                                {!! Form::radio('pt_gender', 'Female', ['class' => 'form-control']) !!} Female<br>
                                </div>
                                <div class="col-lg-6">
                                {!! Form::label('', 'Insurance Panel', ['class' => 'control-label']) !!}
                                {!! Form::text('pt_panel', null, ['class' => 'form-control']) !!}
                                {!! Form::label('', 'Race', ['class' => 'control-label']) !!}
                                {!! Form::text('pt_race', null, ['class' => 'form-control']) !!}
                                {!! Form::label('', 'Address', ['class' => 'control-label']) !!}
                                {!! Form::text('pt_address', null, ['class' => 'form-control']) !!}
                                {!! Form::label('', 'Postcode', ['class' => 'control-label']) !!}
                                {!! Form::text('pt_postcode', null, ['class' => 'form-control']) !!}
                                {!! Form::label('', 'City', ['class' => 'control-label']) !!}
                                {!! Form::text('pt_city', null, ['class' => 'form-control']) !!}
                                {!! Form::label('', 'State', ['class' => 'control-label']) !!}
                                {!! Form::text('pt_state', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                                &nbsp&nbsp&nbsp&nbsp
                                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                {!! Form::reset('Clear', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                <!-- /.panel-body -->
            </div>

            <div class="tab-pane fade" id="profile">
                <h4>Existing Patient</h4>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form">
                                <div class="form-group">
                                    <label>IC Number</label>
                                    <input class="form-control">
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>

        <div class="tab-pane fade" id="messages">
                <h4>empty tab</h4>
                <p>empty</p>
        </div>

        <div class="tab-pane fade" id="settings">
                <h4>Empty tab</h4>
                <p>empty</p>
        </div>
    </div>
</div>
               

@stop