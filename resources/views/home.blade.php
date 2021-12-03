@extends('layouts.app')
@section('content')
    <div style="background-image: url(../../img/medici.jpg) ; background-repeat:no-repeat; background-size:cover">

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <div class="p-6">
                                    <h3>About us</h3>
                                </div>

                                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                                    <a href="/clinica/patients">Pazienti</a>
                                </div>

                                <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                                    <a href="/clinica/doctors">Medici</a>
                                </div>

                                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                                    <a href="/clinica/appointments">Appuntamenti</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>

@endsection
