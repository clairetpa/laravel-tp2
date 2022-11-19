@extends('layouts.app')
@section('content')


<div class="h2 title">@lang('form.form-title-modification')</div>

<div class="container formulaire">
    <form method="post" class="row g-3">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <label class="form-label">@lang('form.name')</label>
            <input type="text" name="nom" value="{{$etudiant->nom}}" class="form-control"placeholder="@lang('form.name-placeholder')">
            @if($errors->has('nom'))
                <span class="text-danger">{{ $errors->first('nom') }}</span>
            @endif
        </div>

        <div class="col-md-12">
            <label class="form-label">@lang('form.address')</label>
            <input type="text" name="adresse" value="{{$etudiant->adresse}}" class="form-control"placeholder="@lang('form.address-placeholder')">
            @if($errors->has('adresse'))
                <span class="text-danger">{{ $errors->first('adresse') }}</span>
            @endif
        </div>
        <div class="col-md-12">
            <label class="form-label">@lang('form.city')</label>
                <select name="ville" class="form-select" required> 
                @foreach($villes as $ville)
                    <option value="{{$ville->id}}" @if ($ville->id == $etudiant->villeId) selected @endif> {{$ville->nom}} </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12">
            <label class="form-label">@lang('form.phone')</label>
            <input type="text" name="phone" value="{{$etudiant->phone}}" class="form-control" placeholder="@lang('form.phone-placeholder')">
            @if($errors->has('phone'))
                <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
        </div>
        <div class="col-12">
            <label class="form-label">@lang('form.birth')</label>
            <input type="text" name="date_naissance" value="{{$etudiant->date_naissance}}" class="form-control" placeholder="@lang('form.birth-placeholder')">
            @if($errors->has('date_naissance'))
                <span class="text-danger">{{ $errors->first('date_naissance') }}</span>
            @endif
        </div>

        <div class="col-12 btn-ajouter">
            <button type="submit" class="btn btn-dark">@lang('form.modification-btn')</button>
        </div>
    </form>
</div>

@endsection


