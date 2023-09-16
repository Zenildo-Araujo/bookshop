@extends('auth.layouts')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-bg-dark">Detail of {{ $contact->name }}</div>
                <div class="card-body ">
                    <div class="card border-info justify-content-center" style="max-width: 18rem;">
                        <div class="card-header text-bg-dark"> Utilizador </div>
                        <div class="card-body ">
                            <h5>
                                <p>
                                    Name: {{ $contact->name }}
                                </p>
                                <p>
                                    Number: {{ $contact->number }}</p>
                                <p>Email: {{ $contact->email }}</p>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
