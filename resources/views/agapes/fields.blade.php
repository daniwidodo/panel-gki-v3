<!-- Nama Ibadah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_ibadah', 'Nama Ibadah:') !!}
    {!! Form::text('nama_ibadah', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Ibadah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_ibadah', 'Tanggal Ibadah:') !!}
    {!! Form::text('tanggal_ibadah', null, ['class' => 'form-control','id'=>'tanggal_ibadah']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal_ibadah').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Jam Ibadah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jam_ibadah', 'Jam Ibadah:') !!}
    {!! Form::text('jam_ibadah', null, ['class' => 'form-control']) !!}
</div>

<!-- Kuota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kuota', 'Kuota:') !!}
    {!! Form::text('kuota', null, ['class' => 'form-control']) !!}
</div>