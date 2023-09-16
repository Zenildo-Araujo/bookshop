@extends('auth.layouts')

@section('content')
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" data-bs-interval="5">
            <div class="carousel-item active" style="min-width: 100%;
            height: 450px;">
                <img src="../assets/img/slide1.jpg" class="d-block d-print-block w-100" alt="...">
            </div>
            <div class="carousel-item" style="min-width: 100%;
            height: 450px;">
                <img src="../assets/img/slide2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" style="min-width: 100%;
            height: 450px;">
                <img src="../assets/img/slide3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif
            <div class="card">
                @include('auth.includes.card_header')
                @foreach ($contacts as $contact)
                    <div class="card-body row">
                        <div class="col-md-4">
                            <div class="card-header text-bg-dark"> Utilizador </div>
                            <div class="card-body "> {{ $contact->name }} </div>
                            <div class="card-footer">
                                <a class="btn btn-warning" href="{{ route('contacts_edit', $contact->id) }}">Edit</a>
                                <a class="btn btn-primary" href="{{ route('contacts_detail', $contact->id) }}">Detail</a>
                                <a class="btn btn-danger" href="{{ route('contacts_destroy', $contact->id) }}">Delete</a>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
