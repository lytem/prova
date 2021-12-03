@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-header">
                <div>
                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                </div>
                <div>
                    @if (session('delete'))
                        <div class="alert alert-success">{{ session('delete') }}</div>
                    @endif
                </div>
                @if (!$items->count())
                    Nessun risultato trovato
                @endif

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <div class="card">
                                <div class="card-header">

                                    <div style="float: left">
                                        <h1>
                                            <b
                                                style="font-style: italic;font-family:georgia,sherif ; font-size:23px">Pazienti</b>
                                        </h1>
                                    </div>
                                    <div style="float: right">
                                        <form class="form-inline m-0 my-lg-0" method="GET"
                                            action="{{ route('patients.index') }}" id="searc">
                                            @csrf
                                            <input type="search" name="query" value="{{ $query ?? '' }}"
                                                class="form-control rounded" placeholder="Search doctor"
                                                aria-label="Search" />
                                            <button type="submit" class="btn btn-outline-primary"
                                                form="searc">search</button>
                                            <a class="btn btn-primary" href="{{ route('patients.index') }}">Resetta</a>
                                        </form>
                                    </div>


                                </div>
                            </div>
                            <div class="card-body">
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
                                        <th>Medico di base</th>
                                    </thead>
                                    <tbody>

                                        @foreach ($items as $item)
                                            <tr>
                                                <td><a href="{{ route('patients.edit', $item->id) }}"
                                                        class="btn btn-primary btn-circle"><i
                                                            class="fa fa-user-circle"></i></a></td>
                                                <td>{{ $item->nome }}</td>
                                                <td>{{ $item->cognome }}</td>
                                                <td>{{ $item->partita_iva }}</td>
                                                <td>{{ $item->codice_fiscale }}</td>
                                                <td>{{ $item->telefono }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->residenza }}</td>
                                                <td>{{ $item->città }}</td>
                                                <td>{{ !empty($item->doctor) ? $item->doctor->nome : '' }}</td>
                                                <td>
                                                    <form action="{{ route('patients.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-circle"><i
                                                                class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @endforeach

                                    </tbody>
                                </table>

                                @can('create', App\Models\Patient::class)
                                    <!-- The current user can create new posts... -->
                                    <a href="{{ route('patients.create') }}" class="btn btn-primary">new patient</a>
                                    <!-- ... -->
                                @endcan

                            </div>
                            <div class="card-footer text-muted">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
