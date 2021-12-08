@extends('layouts.app')
@section('content')

    <div class="card"
        style="background-image: url(../../img/medici.jpg) ; background-repeat:no-repeat ;  background-size:cover">
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
            <div>
                @if ($items->count() == 0 && $query != null)
                    Nessun risultato trovato
                @endif
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="card">
                        <div class="card-header">

                            <div style="float: left">
                                <h1>
                                    <b style="font-style: italic;font-family:georgia,sherif ; font-size:23px">Doctors</b>
                                </h1>
                            </div>
                            <div style="float: right">
                                <form class="form-inline m-0 my-lg-0" method="GET" action="{{ route('doctors.index') }}"
                                    id="searc">
                                    @csrf
                                    <input type="search" name="query" value="{{ $query ?? '' }}"
                                        class="form-control rounded" placeholder="Search doctor" aria-label="Search" />
                                    <button type="submit" class="btn btn-outline-primary" form="searc">search</button>
                                    <a class="btn btn-primary" href="{{ route('doctors.index') }}">Resetta</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <th></th>
                                <th>@sortablelink('nome')</th>
                                <th>@sortablelink('cognome')</th>
                                <th>Part. iva</th>
                                <th>cod. fiscale</th>
                                <th>Tel.</th>
                                <th>Email</th>
                                <th>Residenza</th>
                                <th>@sortablelink('Città')</th>
                            </thead>
                            <tbody>

                                @foreach ($items as $item)
                                    <tr>
                                        @can('update', $item)
                                            <td>
                                                <a href="{{ route('doctors.edit', $item->id) }}">
                                                    <i class="fas fa-edit" aria-hidden="true"
                                                        style="color: rgb(20, 20, 119);font-size:20px">
                                                    </i>
                                                </a>
                                            </td>
                                        @endcan
                                        <td>{{ $item->nome }}</td>
                                        <td>{{ $item->cognome }}</td>
                                        <td>{{ $item->partita_iva }}</td>
                                        <td>{{ $item->codice_fiscale }}</td>
                                        <td>{{ $item->telefono }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->residenza }}</td>
                                        <td>{{ $item->città }}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="/clinica/doctors/{{ $item->id }}/patients">
                                                pazienti
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary"
                                            href="/clinica/doctors/{{ $item->id }}/appointments">
                                            appuntamenti
                                        </a>
                                        </td>
                                        @can('delete', $item)
                                            <td>
                                                <form action="{{ route('doctors.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-circle"><i
                                                            class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        @endcan
                                   </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-muted">
                        @can('create', \App\models\Doctor::class)
                            <!-- The current user can create new posts... -->
                            <a href="{{ route('doctors.create') }}" class="btn btn-primary">new doctors</a>
                            <!-- ... -->
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
