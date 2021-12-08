@extends('layouts.app')

@section('content')

<div class="card" >
    <div class="card-header">
        modifica Docttore: {{$doctor->nome}} {{$doctor->cognome}}
    </div>
    <div class="card-body">
        <form action="{{ route('doctors.update', $doctor->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="doctor[nome]" class="form-control" placeholder="Nome"
                        value="{{ $doctor->nome }}" />
                </div>

                <div class="form-group">
                    <label for="cognome">Cognome</label>
                    <input type="text" name="doctor[cognome]" class="form-control" placeholder="Cognome"
                        value="{{ $doctor->cognome }}" />
                </div>
                <div class="form-group">
                    <label for="partita_iva">partita_iva</label>
                    <input type="text" name="doctor[partita_iva]" class="form-control" placeholder="pi"
                        value="{{ $doctor->partita_iva }}" />
                </div>

                <div class="form-group">
                    <label for="codice_fiscale">codice_fiscale</label>
                    <input type="text" name="doctor[codice_fiscale]" class="form-control" placeholder="Cf"
                        value="{{ $doctor->codice_fiscale }}" />
                </div>
                <div class="form-group">
                    <label for="telefono">telefono</label>
                    <input type="text" name="doctor[telefono]" class="form-control" placeholder="telefono"
                        value="{{ $doctor->telefono }}" />
                </div>

                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="doctor[email]" class="form-control" placeholder="email"
                        value="{{ $doctor->email }}" />
                </div>
                <div class="form-group">
                    <label for="residenza">Residenza</label>
                    <input type="text" name="doctor[residenza]" class="form-control" placeholder="residenza"
                        value="{{ $doctor->residenza }}" />
                </div>

                <div class="form-group">
                    <label for="città">città</label>
                    <input type="text" name="doctor[città]" class="form-control" placeholder="città"
                        value="{{ $doctor->città }}" />
                </div>


            </div>

            <div class="card-footer text-muted">
                <input type="submit" class="btn btn-success" value="salva">
                <a href="{{url()->previous()}}" class="btn btn-dark">indietro</a>
            </div>

        </form>

    </div>

</div>





@endsection
