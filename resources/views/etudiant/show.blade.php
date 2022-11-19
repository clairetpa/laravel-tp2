@extends('layouts.app')
@section('content')

<div class="container text-center centered">
    <!-- Carte etudiant -->
    <div class="card" style="width: 18rem;">
        <!-- image etudiant -->
        <div>
            <img src={{asset('img/student.png')}} class="card-img-top img-student" alt="image étudiant par défault">
        </div>
        <!-- contenu dynamique -->
        <div class="card-body">
            <h5 class="card-title">{{$etudiant->nom}}</h5>
            <p class="card-text">{{$etudiant->adresse}}</p>
            <p class="card-text">{{$etudiant->phone}}</p>
            <p class="card-text">{{$etudiant->email}}</p>
            <p class="card-text">{{$etudiant->date_naissance}}</p>
            <p class="card-text">{{$etudiant->etudiantHasVille->nom}}</p>

            @if(Auth::check() && session()->get('etudiant')->id == $etudiant->id)
            <!-- Bouton modifier -->
            <a href="{{ route('etudiant.edit', $etudiant->id)}}" class="btn btn-dark btn-modifier">@lang('accueil.modifier-btn')</a>

            <!-- Bouton effacer -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                @lang('accueil.delete-btn')
            </button>

            <!-- Fenetre modal de confirmation-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('accueil.delete-btn')</h1>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @lang('accueil.modal-text')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('accueil.close-btn')</button>
                            <form action="{{route('etudiant.destroy', $etudiant->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="@lang('accueil.delete-btn')" class="btn btn-danger">
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
