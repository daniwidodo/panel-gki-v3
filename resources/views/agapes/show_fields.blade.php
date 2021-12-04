<!-- Nama Ibadah Field -->
<div class="col-sm-12">
    {!! Form::label('nama_ibadah', 'Nama Ibadah:') !!}
    <p>{{ $agape->nama_ibadah }}</p>
</div>

<!-- Tanggal Ibadah Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal_ibadah', 'Tanggal Ibadah:') !!}
    <p>{{ $agape->tanggal_ibadah }}</p>
</div>

<!-- Jam Ibadah Field -->
<div class="col-sm-12">
    {!! Form::label('jam_ibadah', 'Jam Ibadah:') !!}
    <p>{{ $agape->jam_ibadah }}</p>
</div>

<!-- Kuota Field -->
<div class="col-sm-12">
    {!! Form::label('kuota', 'Kuota:') !!}
    <p>{{ $agape->kuota }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $agape->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $agape->updated_at }}</p>
</div>

