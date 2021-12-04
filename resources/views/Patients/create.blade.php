@extends('layouts.app')

@section('content')

<form action="{{route('patients.store')}}" method="post">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="patient[nome]" class="form-control" placeholder="Nome"/>
        </div>

        <div class="form-group">
            <label for="cognome">Cognome</label>
            <input type="text" name="patient[cognome]" class="form-control" placeholder="Cognome"/>
        </div>
        <div class="form-group">
            <label for="partita_iva">partita_iva</label>
            <input type="text" name="patient[partita_iva]" class="form-control" placeholder="pi"/>
        </div>

        <div class="form-group">
            <label for="codice_fiscale">codice_fiscale</label>
            <input type="text" name="patient[codice_fiscale]" class="form-control" placeholder="Cf"/>
        </div>
        <div class="form-group">
            <label for="telefono">telefono</label>
            <input type="text" name="patient[telefono]" class="form-control" placeholder="telefono"/>
        </div>

        <div class="form-group">
            <label for="email">email</label>
            <input type="text" name="patient[email]" class="form-control" placeholder="email"/>
        </div>
        <div class="form-group">
            <label for="residenza">Residenza</label>
            <input type="text" name="patient[residenza]" class="form-control" placeholder="residenza"/>
        </div>

        <div class="form-group">
            <label for="città">città</label>
            <input type="text" name="patient[città]" class="form-control" placeholder="città"/>
        </div>
        <div class="form-group">
            <label for="doctor_id">Scelgi dottore</label>

            <select name="patient[doctor_id]" class="form-control">
                <option value="0"> ---dottore--- </option>
                @foreach ($doctor as $item)

                    <option value="{{$item->id}}">
                       {{$item->cognome}}
                    </option>

                @endforeach
            </select>

        </div>

        <input type="submit" class="btn btn-success" value="salva">
        <a href="{{url()->previous()}}" class="btn btn-dark">indietro</a>
    </div>

</form>

@endsection
