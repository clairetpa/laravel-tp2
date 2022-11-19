@extends('layouts.app')
@section('content')


<div class="h2 title">@lang('article.form-title')</div>

<div class="container formulaire">
    <form method="post" class="row g-3">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <div class="form-floating">
                <input type="text" name="title" value="{{$article->title}}" class="form-control">
                <label class="form-label">@lang('article.title-placeholder')</label>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-floating">
                <textarea class="form-control" name="contenu" id="floatingTextarea" style="height: 200px">{{$article->contenu}}</textarea>
                <label for="floatingTextarea">@lang('article.contenu')</label>
            </div>
            @if($errors->has('contenu'))
                <span class="text-danger">{{ $errors->first('contenu') }}</span>
            @endif
        </div>

        <div class="col-md-12">
            <div class="form-floating">
                <select name="langue" class="form-select" required> 
                    <option value="fr" @if($article->langue == 'fr') selected @endif> Francais </option>
                    <option value="en" @if($article->langue == 'en') selected @endif> English </option>
                </select>
                <label class="form-label">@lang('article.langue')</label>
            </div>
        </div>
        <div class="col-12 btn-ajouter">
            <button type="submit" class="btn btn-dark">@lang('article.update')</button>
        </div>
    </form>
</div>

@endsection


