@extends('layouts.app')
@section('content')


<div class="h2 title">@lang('document.form-title')</div>

<div class="container formulaire">
    <form method="post" class="row g-3" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="col-md-12">
            <div class="form-floating">
                <select name="langue" class="form-select" required> 
                    <option value="fr" @if($document->langue == 'fr') selected @endif> Francais </option>
                    <option value="en" @if($document->langue == 'en') selected @endif> English </option>
                </select>
                <label class="form-label">@lang('document.langue')</label>
            </div>
        </div>

        <div class="col-md-12">
            <div class="input-group mb-3">
                <input type="file" name="file" class="form-control" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">{{$document->nom}}</label>
                @if($errors->has('file'))
                    <span class="text-danger">{{ $errors->first('file') }}</span>
                @endif
            </div>
        </div>
        
        <div class="col-12 btn-ajouter">
            <button type="submit" class="btn btn-dark">@lang('document.update')</button>
        </div>
    </form>
</div>

@endsection


