@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">
            <h2>nuovo Dottore</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('doctors.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nome">Nome:<span class="text-danger">*</span> </label>
                        <input type="text" name="doctor[nome]" class="form-control" placeholder="Nome" value="{{ (old('doctor.nome')) ? old('doctor.nome') : $doctor->nome ?? '' }}"/>
                    </div>

                    <div class="form-group">
                        <label for="cognome">Cognome:<span class="text-danger">*</span></label>
                        <input type="text" name="doctor[cognome]" class="form-control" placeholder="Cognome" value="{{ (old('doctor.cognome')) ? old('doctor.cognome') : $doctor->cognome ?? '' }}" />
                    </div>
                    <div class="form-group">
                        <label for="partita_iva">partita_iva:<span class="text-danger">*</span></label>
                        <input type="text" name="doctor[partita_iva]" class="form-control" placeholder="pi" value="{{ (old('doctor.partita_iva')) ? old('doctor.partita_iva') : $doctor->partita_iva ?? '' }}"/>
                    </div>

                    <div class="form-group">
                        <label for="codice_fiscale">codice_fiscale:<span class="text-danger">*</span></label>
                        <input type="text" name="doctor[codice_fiscale]" class="form-control" placeholder="Cf" value="{{ (old('doctor.codice_fiscale')) ? old('doctor.codice_fiscale') : $doctor->codice_fiscale ?? '' }}"/>
                    </div>
                    <div class="form-group">
                        <label for="telefono">telefono:<span class="text-danger">*</span></label>
                        <input type="text" name="doctor[telefono]" class="form-control" placeholder="telefono" value="{{ (old('doctor.telefono')) ? old('doctor.telefono') : $doctor->telefono ?? '' }}" />
                    </div>

                    <div class="form-group">
                        <label for="email">email:<span class="text-danger">*</span></label>
                        <input type="text" name="doctor[email]" class="form-control" placeholder="email" value="{{ (old('doctor.email')) ? old('doctor.email') : $doctor->email ?? '' }}"/>
                    </div>
                    <div class="form-group">
                        <label for="residenza">Residenza:<span class="text-danger">*</span></label>
                        <input type="text" name="doctor[residenza]" class="form-control" placeholder="residenza" value="{{ (old('doctor.residenza')) ? old('doctor.residenza') : $doctor->residenza ?? '' }}"/>
                    </div>

                    <div class="form-group">
                        <label for="città">città:<span class="text-danger">*</span></label>
                        <input type="text" name="doctor[città]" class="form-control" placeholder="città" value="{{ (old('doctor.città')) ? old('doctor.città') : $doctor->città ?? '' }}" />
                    </div>


                    <input type="submit" class="btn btn-success" value="salva">
                    <a href="{{ url()->previous() }}" class="btn btn-dark">indietro</a>
                </div>

            </form>
        </div>
        <div class="card-footer text-muted">

        </div>
    </div>




@endsection
