@extends('layouts.app')

@section('content')

    <div class="card" style="background-image: url(../../img/medici.jpg) ; background-repeat:no-repeat ;  background-size:cover">
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
                @if ($items->count()== 0 && $query != null)
                Nessun risultato trovato
            @endif

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <div class="card">
                                <div class="card-header">

                                    <div style="float: left">
                                        <h1>
                                            <b style="font-style: italic;font-family:georgia,sherif ; font-size:23px">elenco
                                                specialità</b>
                                        </h1>
                                    </div>
                                    <div style="float: right">
                                        <form class="form-inline m-0 my-lg-0" method="GET"
                                            action="{{ route('specialties.index') }}" id="searc">
                                            @csrf
                                            <input type="search" name="query" value="{{ $query ?? '' }}"
                                                class="form-control rounded" placeholder="Search specialità"
                                                aria-label="Search" />
                                            <button type="submit" class="btn btn-outline-primary"
                                                form="searc">search</button>
                                            <a class="btn btn-primary" href="{{ route('specialties.index') }}">Resetta</a>
                                        </form>
                                    </div>


                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table tab-content table-hover">
                                    <thead>
                                        <th></th>
                                        <th>Nome specialità</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td><a href="{{ route('specialties.edit', $item->id) }}"
                                                        class="btn btn-info"><i class="fa fa-address-book"
                                                            aria-hidden="true"></a></i></td>
                                                <td>{{ $item->nome }}
                                                </td>
                                                <td>
                                                    <form action="{{ route('specialties.destroy', $item->id) }}" method="post">
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

                                <a href="{{ route('specialties.create') }}" class="btn btn-primary">nuova specialità</a>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>


@endsection
