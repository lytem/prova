@extends('layouts.app')
@section('content')
    <div class="card"
        style="background-image: url(../../img/medici.jpg) ; background-repeat:no-repeat ;  background-size:cover">
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
                @if ($items->count() == 0 && $query != null)
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
                                                style="font-style: italic;font-family:georgia,sherif ; font-size:23px">Pazienti
                                            </b>
                                            @can('create', App\Models\Patient::class)
                                            <!-- The current user can create new posts... -->
                                            <a href="{{ route('patients.create') }}" class="btn btn-primary">new patient</a>
                                            <!-- ... -->
                                        @endcan

                                        </h1>
                                    </div>
                                    <div style="float: right">
                                        <form class="form-inline m-0 my-lg-0" method="GET"
                                            action="{{ route('patients.index') }}" id="searc">
                                            @csrf
                                            <input type="search" name="query" value="{{ $query ?? '' }}"
                                                class="form-control rounded" placeholder="Search paziente"
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
                                        <th>@sortablelink('nome')</th>
                                        <th>@sortablelink('cognome')</th>
                                        <th>Partita iva</th>
                                        <th>codice fiscale</th>
                                        <th>Telefono</th>
                                        <th>@sortablelink('Email')</th>
                                        <th>Residenza</th>
                                        <th>@sortablelink('Città')</th>
                                        <th>Medico di base</th>
                                    </thead>
                                    <tbody>

                                        @foreach ($items as $item)
                                            <tr>
                                                @can('update', $item)
                                                <td><a href="{{ route('patients.edit', $item->id) }}">
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
                                                <td>{{ !empty($item->doctor) ? $item->doctor->nome : '' }}</td>
                                                @can('delete',$item)
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
                                                @endcan

                                            </tr>

                                        @endforeach

                                    </tbody>
                                </table>



                            </div>
                            <div class="card-footer text-muted">
                                @can('create', App\Models\Patient::class)
                                <!-- The current user can create new posts... -->
                                <a href="{{ route('patients.create') }}" class="btn btn-primary">new patient</a>
                                <!-- ... -->
                            @endcan

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
