<div class="table-responsive">
    <table class="table" id="agapes-table">
        <thead>
            <tr>
                <th>Nama Ibadah</th>
        <th>Tanggal Ibadah</th>
        <th>Jam Ibadah</th>
        <th>Kuota</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($agapes as $agape)
            <tr>
                <td>{{ $agape->nama_ibadah }}</td>
            <td>{{ $agape->tanggal_ibadah }}</td>
            <td>{{ $agape->jam_ibadah }}</td>
            <td>{{ $agape->kuota }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['agapes.destroy', $agape->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('agapes.show', [$agape->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('agapes.edit', [$agape->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
