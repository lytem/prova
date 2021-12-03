@extends('layouts.app')

@section('content')

    <body>

        <div class="card">
            <div class="card-header">
                elenco appuntamenti
            </div>
            <div class="card-body">
                <table class="table tab-content table-hover">
                    <thead>
                        <th></th>
                        <th>Nome Dottore</th>
                        <th>nome paziente</th>
                        <th>data</th>


                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td><a href="{{ route('appointments.edit', $item->id) }}" class="btn btn-info"><i
                                            class="fa fa-address-book" aria-hidden="true"></a></i></td>
                                <td>{{ Str::ucfirst(!empty($item->doctor) ? $item->doctor->nome : '') }}
                                    {{ Str::ucfirst(!empty($item->doctor) ? $item->doctor->cognome : '') }}</td>
                                <td>{{ Str::ucfirst(!empty($item->patient) ? $item->patient->nome : '') }}
                                    {{ Str::ucfirst(!empty($item->patient) ? $item->patient->cognome : '') }}</td>
                                <td>{{ $item->data }}</td>
                                <td>
                                    <form action="{{route('appointments.destroy',$item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i>
                                    </form>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="card-footer text-muted">

                <a href="{{ route('appointments.create') }}" class="btn btn-primary">nuovo appuntamento</a>
            </div>
        </div>

    </body>

@endsection
