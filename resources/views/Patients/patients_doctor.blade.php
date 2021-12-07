@extends('layouts.app')
@section('content')
<body>

    <h1>elenco pazienti dottore {{$doctor->nome}} {{$doctor->cognome}}</h1>
    <table class="table table-hover">
        <thead>
            <th></th>
            <th>@sortablelink('nome')</th>
            <th>@sortablelink('cognome')</th>
            <th>Partita iva</th>
            <th>codice fiscale</th>
            <th>Telefono</th>
            <th>@sortablelink('Email')</th>
            <th>Residenza</th>
            <th>@sortablelink('Città')</th>
            <th>Medecin</th>
        </thead>
        <tbody>

            @foreach ($items as $item)
                <tr>
                    <td><a href="{{route('patients.edit',$item->id)}}">  <i class="fas fa-edit" aria-hidden="true"
                        style="color: rgb(20, 20, 119);font-size:20px">
                    </i></a></td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->cognome }}</td>
                    <td>{{$item->partita_iva}}</td>
                    <td>{{$item->codice_fiscale}}</td>
                    <td>{{$item->telefono}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->residenza}}</td>
                    <td>{{$item->città}}</td>
                    <td>{{ Str::ucfirst(!empty($item->doctor) ? $item->doctor->nome : '') }}</td>
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

    @can('create', App\Models\Patient::class)
            <!-- The current user can create new posts... -->
            <a href="{{ route('patients.create') }}" class="btn btn-primary">new patient</a>
            <a href="{{url()->previous()}}" class="btn btn-dark">indietro</a>
            <!-- ... -->
        @endcan

</body>
@endsection
