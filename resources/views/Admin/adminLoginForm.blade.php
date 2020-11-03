@extends('Layouts.masterHomePage')
@section('content')

    <div class="container">
        @if(Session::has('failAdmin'))
            <div class="alert alert-success" role="alert">
                {{Session::get('failAdmin')}}
            </div>
        @endif
            <div class="card card-body">
                <div>
                    <form method="post"   action="{{route('postAdminLogin')}}">
                        @csrf
                        <div class="col-md-5" style="float:right">
                            <div class="input-group flex-nowrap">
                                <label for="email"></label>
                                <input id="email" class="form-control @error('email') is-invalid @enderror"  type="email" name="email" placeholder="ایمیل" value="{{ old('email') }}" required autocomplete="email" autofocus style="text-align: center;">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4" style="float:right">
                            <div class="input-group flex-nowrap">
                                <label class="col-form-label text-md-right" for="password"></label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="رمز عبور" name="password" required autocomplete="current-password" style="text-align: center;">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-3" style="float:right">
                            <button type="submit" class="btn btn-danger">
                                {{ __('ورود') }}
                            </button>
                        </div>
                        <div class="form-group  col-md-6" style="float:right;">
                            <div class="">
                                <input class="" style="margin-right:20px  ;" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('مرا به خاطر بسپار') }}
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
@endsection
