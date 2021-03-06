@extends('layouts.app')

@section('content')



    <div class="card">
        <div class="card-header">
            <h1>Nuovo paziente</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('patients.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="nome">Nome:<span class="text-danger">*</span></label>
                    <input type="text" name="patient[nome]" class="form-control" placeholder="Nome"
                        value="{{ old('patient.nome') ? old('patient.nome') : $patient->nome ?? '' }}" />
                </div>

                <div class="form-group">
                    <label for="cognome">Cognome:<span class="text-danger">*</span></label>
                    <input type="text" name="patient[cognome]" class="form-control" placeholder="Cognome"
                        value="{{ old('patient.cognome') ? old('patient.cognome') : $patient->cognome ?? '' }}" />
                </div>
                <div class="form-group">
                    <label for="partita_iva">partita_iva:<span class="text-danger">*</span></label>
                    <input type="text" name="patient[partita_iva]" class="form-control" placeholder="pi"
                        value="{{ old('patient.partita_iva') ? old('patient.partita_iva') : $patient->partita_iva ?? '' }}" />
                </div>

                <div class="form-group">
                    <label for="codice_fiscale">codice_fiscale:<span class="text-danger">*</span></label>
                    <input type="text" name="patient[codice_fiscale]" class="form-control" placeholder="Cf"
                        value="{{ old('patient.codice_fiscale') ? old('patient.codice_fiscale') : $patient->codice_fiscale ?? '' }}" />
                </div>
                <div class="form-group">
                    <label for="telefono">telefono:<span class="text-danger">*</span></label>
                    <input type="text" name="patient[telefono]" class="form-control" placeholder="telefono"
                        value="{{ old('patient.telefono') ? old('patient.telefono') : $patient->telefono ?? '' }}" />
                </div>

                <div class="form-group">
                    <label for="email">email:<span class="text-danger">*</span></label>
                    <input type="text" name="patient[email]" class="form-control" placeholder="email"
                        value="{{ old('patient.email') ? old('patient.email') : $patient->email ?? '' }}" />
                </div>
                <div class="form-group">
                    <label for="residenza">Residenza</label>
                    <input type="text" name="patient[residenza]" class="form-control" placeholder="residenza"
                        value="{{ old('patient.residenza') ? old('patient.residenza') : $patient->residenza ?? '' }}" />
                </div>

                <div class="form-group">
                    <label for="citt??">citt??:<span class="text-danger">*</span></label>
                    <input type="text" name="patient[citt??]" class="form-control" placeholder="citt??"
                        value="{{ old('patient.citt??') ? old('patient.citt??') : $patient->citt?? ?? '' }}" />
                </div>
                <div class="form-group">
                    <label for="doctor_id">Scelgi dottore:<span class="text-danger">*</span></label>

                    <select name="patient[doctor_id]" class="form-control">
                        <option value="0"> ---dottore--- </option>
                        @foreach ($doctor as $item)

                            <option value="{{ $item->id }}">
                                {{ $item->cognome }}
                            </option>

                        @endforeach
                    </select>

                </div>

                <input type="submit" class="btn btn-success" value="salva">
                <a href="{{ url()->previous() }}" class="btn btn-dark">indietro</a>


            </form>
        </div>
        <div class="card-footer text-muted">

        </div>
    </div>



@endsection
