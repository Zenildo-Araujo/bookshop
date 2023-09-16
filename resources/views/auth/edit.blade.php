@extends('auth.layouts')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Edit</div>
                <div class="card-body">
                    <form action="{{ route('contacts_update', $contact->id) }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ $contact->name }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="number" class="col-md-4 col-form-label text-md-end text-start">Number</label>
                            <div class="col-md-6">
                                <input type="tel" class="form-control @error('number') is-invalid @enderror"
                                    id="number" name="number" value="{{ $contact->number }}">
                                @if ($errors->has('number'))
                                    <span class="text-danger">{{ $errors->first('number') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-start">E-mail
                                Adress</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ $contact->email }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-block">
                            <a class="btn btn-danger col-form-label" href="{{ route('index') }}">Back</a>
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Submit">

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
