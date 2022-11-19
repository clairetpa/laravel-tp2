@extends('layouts.app')
@section('content')


<div class="h2 title">@lang('form.form-title')</div>

<div class="container formulaire">
    <form method="post" class="row g-3">
        @csrf
        @method('POST')
        <div class="col-md-12">
            <label class="form-label">@lang('form.name')</label>
            <input type="text" name="nom" class="form-control" placeholder="@lang('form.name-placeholder')">
            @if($errors->has('nom'))
                <span class="text-danger">{{ $errors->first('nom') }}</span>
            @endif
        </div>

        <div class="col-md-12">
            <label class="form-label">@lang('form.address')</label>
            <input type="text" name="adresse" class="form-control"placeholder="@lang('form.address-placeholder')">
            @if($errors->has('adresse'))
                <span class="text-danger">{{ $errors->first('adresse') }}</span>
            @endif
        </div>

        <div class="col-md-12">
            <label class="form-label">@lang('form.city')</label>
                <select name="ville" class="form-select" required> 
                @foreach($villes as $ville)
                    <option value="{{$ville->id}}"> {{$ville->nom}} </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12">
            <label class="form-label">@lang('form.phone')</label>
            <input type="text" name="phone" class="form-control" placeholder="@lang('form.phone-placeholder')">
            @if($errors->has('phone'))
                <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
        </div>
        <div class="col-md-12">
            <label class="form-label">@lang('form.email')</label>
            <input type="email" name="email" class="form-control" placeholder="@lang('form.email-placeholder')" >
            @if($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="col-md-12">
            <label class="form-label">@lang('form.password')</label>
            <input type="password" name="password" class="form-control" placeholder="@lang('form.password-placeholder')" >
            @if($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="col-12">
            <label class="form-label">@lang('form.birth')</label>
            <input type="text" name="date_naissance" class="form-control" placeholder="@lang('form.birth-placeholder')" >
            @if($errors->has('date_naissance'))
                <span class="text-danger">{{ $errors->first('date_naissance') }}</span>
            @endif
        </div>

        <div class="col-12 btn-ajouter">
            <button type="submit" class="btn btn-dark">@lang('form.add')</button>
        </div>
    </form>
</div>

@endsection


