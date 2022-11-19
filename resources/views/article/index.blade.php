@extends('layouts.app')
@section('content')

<div class="h2 title">@lang('article.titre')</div>
<div class="sub-title-btn-wrapper">
    <a href="{{ route('article.create')}}" class='btn btn-dark'>@lang('article.create')</a>
</div>
<div class="container text-center">
    <div class="row">
        @foreach ($articles as $article)
        <div class="container container-detail-article">
                <div class="container card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 container-detail-left">
                            <div style="margin-bottom:20px;">
                                <div class="img-container">
                                    <img src={{asset('img/student.png')}} class="card-img-top img-student" alt="image étudiant par défault">
                                </div>
                                <h3 class="card-title">{{$article->etudiant_nom}}</h3>
                            </div>
                            @if(Auth::check() && session()->get('etudiant')->id == $article->userId)
                            <div>
                                <!-- Bouton modifier -->
                                <a href="{{ route('article.edit', $article)}}" class="btn btn-dark btn-modifier">@lang('accueil.modifier-btn')</a>

                                <!-- Bouton effacer -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    @lang('accueil.delete-btn')
                                </button>
                            </div>
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
                                            <form action="{{route('article.destroy', $article)}}" method="post">
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
                        <div class="col-md-8 container-detail-right">
                            @if($article->langue == 'fr') <div class="text-muted text-right">Francais</div> @endif
                            @if($article->langue == 'en') <div class="text-muted text-right">English</div> @endif
                            <div class="card-body">
                                <h3 class="card-title">{{$article->title}}</h3>
                                <p class="card-text text-left">{{$article->contenu}}</p>
                            </div>
                        </div>
                
                        <div class="">
                            <p class="text-muted text-right">{{$article->date}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection