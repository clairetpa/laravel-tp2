@extends('layouts.app')
@section('content')

<main class="login-form">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-4 pt-4">
            <div class="card">
               <h3 class="card-header text-center">@lang('login.login')</h3>
               <div class="card-body">
                  @if(session('success'))
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                  @endif
                  @if($errors)
                     @foreach($errors->all() as $error)
                     <ul class="alert alert-danger">
                        <li class="text-danger">{{ $error }}</li>
                     </ul>
                     @endforeach
                  @endif
                  <form action="{{ route('login.authentication') }}" method="post">
                     @csrf
                     <div class="form-group mb-3">
                        <input type="text" placeholder="@lang('login.email')" id="email" name="email" class="form-control" value="{{old('email')}}" autofocus>
                        @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                     </div>
                     <div class="form-group mb-3">
                        <input type="password" placeholder="@lang('login.password')" id="password" name="password" class="form-control">
                        @if($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                     </div>
                     <div class="d-grid mx-auto">
                        <input type="submit" class="btn btn-dark btn-block" value="@lang('login.signin')">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>

@endsection