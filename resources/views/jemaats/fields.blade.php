<!-- Nik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik', 'Nik:') !!}
    {!! Form::text('nik', null, ['class' => 'form-control']) !!}
</div>

<!-- Namalengkap Field -->
<div class="form-group col-sm-6">
    {!! Form::label('namaLengkap', 'Namalengkap:') !!}
    {!! Form::text('namaLengkap', null, ['class' => 'form-control']) !!}
</div>

<!-- Kartuvaksin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kartuVaksin', 'Kartuvaksin:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('kartuVaksin', ['class' => 'custom-file-input']) !!}
            {!! Form::label('kartuVaksin', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Nomorwhatsapp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomorWhatsapp', 'Nomorwhatsapp:') !!}
    {!! Form::text('nomorWhatsapp', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamatdomain Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamatDomain', 'Alamatdomain:') !!}
    {!! Form::textarea('alamatDomain', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Verifikasi Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('verifikasi', 'Verifikasi:') !!}
    {!! Form::hidden('verifikasi', 0) !!}
    {!! Form::checkbox('verifikasi', 1, null,  ['data-bootstrap-switch']) !!}
</div>
