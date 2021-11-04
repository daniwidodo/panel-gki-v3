@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Jemaat</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($jemaat, ['route' => ['jemaats.update', $jemaat->id], 'method' => 'patch', 'files' => true]) !!}
            <img height="400" src="{{ Storage :: url ($jemaat->kartuVaksin) }}" alt="">
            <div class="card-body">
                <div class="row">
                    @include('jemaats.fields')
                </div>
                
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('jemaats.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
