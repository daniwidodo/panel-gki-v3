<div class="table-responsive">
    <table class="table" id="jemaats-table">
        <thead>
            <tr>
            <th>Kartuvaksin</th>
                <th>Nik</th>
                <th>Namalengkap</th>
                
                <th>Nomorwhatsapp</th>
                <th>Alamatdomain</th>
                <th>Verifikasi</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jemaats as $jemaat)
            <tr>
                <td><img height="80" src="{{ Storage :: url ($jemaat->kartuVaksin) }}" alt=""></td>
                <td>{{ $jemaat->nik }}</td>
                <td>{{ $jemaat->namaLengkap }}</td>
                <!-- <td>{{ $jemaat->kartuVaksin }}</td> -->

                <td>{{ $jemaat->nomorWhatsapp }}</td>
                <td>{{ $jemaat->alamatDomain }}</td>
                <td>{{ $jemaat->verifikasi }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['jemaats.destroy', $jemaat->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('jemaats.show', [$jemaat->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('jemaats.edit', [$jemaat->id]) }}" class='btn btn-default btn-xs'>
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