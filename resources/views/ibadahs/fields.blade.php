<!-- Namaibadah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('namaIbadah', 'Namaibadah:') !!}
    {!! Form::text('namaIbadah', null, ['class' => 'form-control']) !!}
</div>

<!-- Imageibadah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imageIbadah', 'Imageibadah:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('imageIbadah', ['class' => 'custom-file-input']) !!}
            {!! Form::label('imageIbadah', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Quota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quota', 'Quota:') !!}
    {!! Form::text('quota', null, ['class' => 'form-control']) !!}
</div>

<!-- Jam Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jam', 'Jam:') !!}
    {!! Form::text('jam', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::text('tanggal', null, ['class' => 'form-control','id'=>'tanggal']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Deskripsi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>