@extends('master')
@section('sidebar')
    @include('sidebar.staff')
@stop
@section('content')


<div class="panel panel-body">
    <div class="row">
        <div class="col-lg-12">
                <div class="form-group">
                    <div class="col-lg-6">
                        {!! Form::model($supplier, ['method' => 'PATCH','route' => ['supplier.update', $supplier->id]]) !!}
                        {!! Form::label('', 'Supplier Name', ['class' => 'control-label']) !!}
                        {!! Form::text('supp_name', null, ['class' => 'form-control']) !!}
                        @if($errors->has('supp_name'))
                                {{ $errors->first('supp_name') }}<br>
                        @endif

                        {!! Form::label('', 'Contact Person', ['class' => 'control-label']) !!}
                        {!! Form::text('supp_contactName', null, ['class' => 'form-control']) !!}
                        @if($errors->has('supp_contactName'))
                                {{ $errors->first('supp_contactName') }}<br>
                        @endif
                        
                        {!! Form::label('', 'Contact No', ['class' => 'control-label']) !!}
                        {!! Form::text('supp_phoneNo', null, ['class' => 'form-control']) !!}
                        @if($errors->has('supp_phoneNo'))
                                {{ $errors->first('supp_phoneNo') }}<br>
                        @endif
                        
                        {!! Form::label('', 'Alternate No', ['class' => 'control-label']) !!}
                        {!! Form::text('supp_altNo', null, ['class' => 'form-control']) !!}
                        {!! Form::label('', 'Fax', ['class' => 'control-label']) !!}
                        {!! Form::text('supp_faxNo', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-lg-6">
                        {!! Form::label('', 'Email address', ['class' => 'control-label']) !!}
                        {!! Form::text('supp_email', null, ['class' => 'form-control']) !!}
                        @if($errors->has('supp_email'))
                                {{ $errors->first('supp_email') }}<br>
                        @endif
                        
                        {!! Form::label('', 'Address', ['class' => 'control-label']) !!}
                        {!! Form::text('supp_billAddress', null, ['class' => 'form-control']) !!}
                        {!! Form::label('', 'Postcode', ['class' => 'control-label']) !!}
                        {!! Form::text('supp_postcode', null, ['class' => 'form-control']) !!}
                        {!! Form::label('', 'City', ['class' => 'control-label']) !!}
                        {!! Form::text('supp_city', null, ['class' => 'form-control']) !!}
                        {!! Form::label('', 'State', ['class' => 'control-label']) !!}
                        {!! Form::text('supp_state', null, ['class' => 'form-control']) !!}
                    </div>
                </div>    
                  
        </div>
    </div>
    <div class="row">
        <br>
        <div class="col-md-12">
                        &nbsp&nbsp&nbsp
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!} 
        </div>
</div>
<!-- /.panel-body -->

@stop