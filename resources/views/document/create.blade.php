@extends('layouts.app')
@section('content')


<div class="h2 title">@lang('document.form-title')</div>

<div class="container formulaire">
    <form method="post" class="row g-3" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="col-md-12">
            <div class="form-floating">
                <select name="langue" class="form-select" required> 
                    <option value="fr"> Francais </option>
                    <option value="en"> English </option>
                </select>
                <label class="form-label">@lang('document.langue')</label>
            </div>
        </div>

        <div class="col-md-12">
            <div class="input-group mb-3">
                <input type="file" name="file" class="form-control" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02"></label>
            </div>
        </div>
        <div class="col-12 btn-ajouter">
            <button type="submit" class="btn btn-dark">@lang('document.add')</button>
        </div>
    </form>
</div>

@endsection


