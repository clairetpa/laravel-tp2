@extends('layouts.app')
@section('content')


<div class="h2 title">@lang('article.form-title')</div>

<div class="container formulaire">
    <form method="post" class="row g-3">
        @csrf
        @method('POST')
        <div class="col-md-12">
            <div class="form-floating">
                <input type="text" name="title" class="form-control">
                <label class="form-label">@lang('article.title-placeholder')</label>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-floating">
                <textarea class="form-control" name="contenu" id="floatingTextarea" style="height: 200px"></textarea>
                <label for="floatingTextarea">@lang('article.contenu')</label>
            </div>
            @if($errors->has('contenu'))
                <span class="text-danger">{{ $errors->first('contenu') }}</span>
            @endif
        </div>

        <div class="col-md-12">
            <div class="form-floating">
                <select name="langue" class="form-select" required> 
                    <option value="fr"> Francais </option>
                    <option value="en"> English </option>
                </select>
                <label class="form-label">@lang('article.langue')</label>
            </div>
        </div>
        <div class="col-12 btn-ajouter">
            <button type="submit" class="btn btn-dark">@lang('article.add')</button>
        </div>
    </form>
</div>

@endsection


