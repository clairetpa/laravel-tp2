@extends('layouts.app')
@section('content')

<div class="h2 title">@lang('accueil.titre')</div>

<div class="container text-center">
    <div class="row">
        @foreach ($etudiants as $etudiant)
        <div class="card" style="width: 18rem;">
            <div>
                <img src={{asset('img/student.png')}} class="card-img-top img-student" alt="image étudiant par défault">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$etudiant->nom}}</h5>
                <p class="card-text">{{$etudiant->email}}</p>
                <a href="{{ route('etudiant.show', $etudiant)}}" class="btn btn-dark">Details</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection