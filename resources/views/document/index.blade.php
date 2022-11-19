@extends('layouts.app')
@section('content')

<div class="h2 title">@lang('document.titre')</div>
<div class="sub-title-btn-wrapper">
    <a href="{{ route('document.create')}}" class='btn btn-dark'>@lang('document.create')</a>
</div>
<div class="container text-center">
    <div class="row">

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">@lang('document.student')</th>
                <th scope="col">@lang('document.name')</th>
                <th scope="col">@lang('document.lang')</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($documents as $document)
                <tr>
                    <td>{{$document->etudiant_nom}}</td>
                    <td>{{$document->nom}}</td>
                    <td>
                        @if($document->langue == 'fr') <div class="text-muted ">Francais</div> @endif
                        @if($document->langue == 'en') <div class="text-muted ">English</div> @endif
                    </td>
                    <td>
                        <a href="{{ route('document.download', $document)}}" class="btn btn-success btn-sm">@lang('document.download')</a>
                        @if(Auth::check() && session()->get('etudiant')->id == $document->userId)
                            <a href="{{ route('document.edit', $document)}}" class="btn btn-dark btn-sm">@lang('document.update')</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    @lang('accueil.delete-btn')
                            </button>
                        @endif
                    </td>
                </tr>
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
                                        <form action="{{route('document.destroy', $document)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="@lang('accueil.delete-btn')" class="btn btn-danger">
                                        </form>  
                                    </div>
                                </div>
                            </div>
                        </div>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $documents->links() !!}
        </div>







        
    </div>
</div>

@endsection