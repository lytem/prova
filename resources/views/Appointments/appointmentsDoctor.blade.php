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


                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <div class="card">
                                <div class="card-header">

                                    <div style="float: left">
                                        <h1>
                                            <b
                                                style="font-style: italic;font-family:georgia,sherif ; font-size:23px">Appuntamenti Dottore: {{$doctor->nome}} {{$doctor->cognome}} </b>
                                        </h1>
                                    </div>
                                    <div style="float: right">
                                        <form class="form-inline m-0 my-lg-0" method="GET"
                                            action="{{ route('appointments.index') }}" id="searc">
                                            @csrf
                                            <input type="search" name="query" value="{{ $query ?? '' }}"
                                                class="form-control rounded" placeholder="Search patient"
                                                aria-label="Search" />
                                            <button type="submit" class="btn btn-outline-primary"
                                                form="searc">search</button>
                                            <a class="btn btn-primary"
                                                href="{{ route('appointments.index') }}">Resetta</a>
                                        </form>
                                    </div>


                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table tab-content table-hover">
                                    <thead>
                                        <th></th>
                                        <th>@sortablelink('Nome Dottore')</th>
                                        <th>@sortablelink('Nome paziente')</th>
                                        <th>data</th>
                                        <th>orario</th>

                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td><a href="{{ route('appointments.edit', $item->id) }}"
                                                        >  <i class="fas fa-edit" aria-hidden="true"
                                                        style="color: rgb(20, 20, 119);font-size:20px">
                                                    </i>
                                                    </a>
                                                        </td>
                                                <td>{{ Str::ucfirst(!empty($item->doctor) ? $item->doctor->nome : '') }}
                                                    {{ Str::ucfirst(!empty($item->doctor) ? $item->doctor->cognome : '') }}
                                                </td>
                                                <td>{{ Str::ucfirst(!empty($item->patient) ? $item->patient->nome : '') }}
                                                    {{ Str::ucfirst(!empty($item->patient) ? $item->patient->cognome : '') }}
                                                </td>
                                                <td>{{ $item->data }}</td>
                                                <td>{{ $item->ora }}</td>
                                                <td>
                                                    <form action="{{ route('appointments.destroy', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-circle"><i
                                                                class="fa fa-trash"></i>
                                                    </form>

                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer text-muted">
                                <a href="{{url()->previous()}}" class="btn btn-dark" style="float: left">indietro</a>
                                <a href="{{ route('appointments.create') }}" class="btn btn-primary">nuovo
                                    appuntamento</a>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>


@endsection
