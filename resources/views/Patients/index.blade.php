@extends('layouts.app')
@section('content')
<body>
    <table class="table table-hover">
        <thead>
            <th></th>
            <th>nome</th>
            <th>cognome</th>
            <th>Partita iva</th>
            <th>codice fiscale</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Residenza</th>
            <th>Città</th>
        </thead>
        <tbody>

            @foreach ($items as $item)
                <tr>
                    <td><a href="{{route('patients.edit',$item->id)}}" class="btn btn-primary btn-circle"><i class="fa fa-user-circle"></i></a></td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->cognome }}</td>
                    <td>{{$item->partita_iva}}</td>
                    <td>{{$item->codice_fiscale}}</td>
                    <td>{{$item->telefono}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->residenza}}</td>
                    <td>{{$item->città}}</td>
                    <td>
                        <form action="{{route('patients.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i> </button>
                        </form>
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>
    <a href="{{ route('patients.create') }}" class="btn btn-primary">new patient</a>
</body>
@endsection
