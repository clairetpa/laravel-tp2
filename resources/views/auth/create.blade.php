@extends('layouts.app')
@section('content')

<main class="signup-form">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-4 pt-4">
            <div class="card">
               <h3 class="card-header text-center">
                  @lang('lang.text_register')
               </h3>
               <div class="card-body">
                  @if(session('success'))
                     <div class="alert alert-success">
                        {{ session('success') }}
                     </div>
                  @endif
                  <form action="{{ route('user.store') }}" method="post">
                     @csrf
                     <div class="form-group mb-3">
                        <input type="text" placeholder="@lang('lang.text_name')" id="name" name="name" value="{{old('name')}}" class="form-control" autofocus>
                        @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                     </div>
                     <div class="form-group mb-3">
                        <input type="text" placeholder="@lang('lang.text_email')" id="email" name="email" value="{{old('email')}}" class="form-control" autofocus>
                        @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                     </div>
                     <div class="form-group mb-3">
                        <input type="password" placeholder="@lang('lang.text_password')" id="password" name="password" class="form-control">
                        @if($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                     </div>
                     <div class="d-grid mx-auto">
                        <input type="submit" class="btn btn-dark btn-block" value="@lang('lang.text_signup')">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>

@endsection