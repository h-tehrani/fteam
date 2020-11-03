<div class="loginLogout" id="loginLogout">

    <script >
        $(document).ready(function(){
                $('#search').on('keyup',function(){
                    $value=$(this).val();
                    $.ajax({
                        type : 'get',
                        url : '{{URL::to('search')}}',
                        data:{'search':$value},
                        success:function(data){
                            $('#resultss').html(data);
                        }
                    });
                });
            $('.basketButton').on(
                {
                    'mouseenter' : function(){
                        $value=$(this).val();
                        $.ajax({
                            type : 'get',
                            url : '{{URL::to('orderAjax')}}',
                            data:{'orderAjax':$value},
                            success:function(data){
                                $('.orderInfo').html(data);
                            } });

                        $('.basketButtonDiv').css('display' , "table");
                        $('.basketButton').removeClass("btn-outline-dark");
                        $('.basketButton').addClass("btn-outline-danger");
                    } ,
                    'mouseleave' : function(){
                        $('.basketButtonDiv').css('display' , "none");
                        $('.basketButton').removeClass("btn-outline-danger");
                        $('.basketButton').addClass("btn-outline-dark");
                    }
                }
            )
    })


    </script>
    @if(Session::has('fail'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('fail')}}
        </div>

    @endif

    @if(Session::has('failUsername'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('failUsername')}}
        </div>

    @endif

    <div class="row justify-content-left" style="margin-left:10% !important;">
        <div class="basket">
            <button class="btn  btn-outline-dark basketButton">
                <a href="{{route(('panelIndex'))}}">
                <text style="font-family:dragz;padding-right:2%;font-size:15px;direction:rtl;font-weight:100;" >Be Different </text><strong style="direction:rtl;font-family:dragz;font-size:12px;padding-right:2%;">@auth @if($order ?? ''){{count($order ?? '')}} @endif @endauth ORDER</strong><img src="Files/Pic/basketBuy.png" style="width:5%;height:5%;margin-right:2%;"><strong style="direction:rtl">سبد خرید</strong>
                <div class="basketButtonDiv">
                    <div class="orderInfo">
                    </div>
                </div>
                </a>
            </button>
        </div>
        @auth

            <div >
                <a class="btn btn-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                    {{ __('خروج') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <p>
            <form action="{{route('panelIndex')}}"  style="direction:rtl;">
                <button class="btn btn-danger" type="submit"  style="direction:rtl;">پنل کاربری</button>
            </form>
            </p>
            <p>
                <button class="btn btn-outline-warning" type="button"  style="direction:rtl;">
                    سلام {{ Auth::user()->name }}

                </button>
            </p>

        @endauth
        @guest
            <p>
                <a class="btn btn-danger " id="godbtn" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                    ثبت نام
                </a>
            </p>
            <div class="collapse col-md-8" id="collapseExample2">
                <div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('ثبت نام') }}</div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نام') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="family" class="col-md-4 col-form-label text-md-right">{{ __('نام خانوداگی') }}</label>

                                            <div class="col-md-6">
                                                <input id="family" type="text" class="form-control @error('family') is-invalid @enderror" name="family" value="{{ old('family') }}" required autocomplete="family" autofocus>

                                                @error('family')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('شماره همراه') }}</label>

                                            <div class="col-md-6">
                                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ایمیل') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('رمز عبور') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تکرار رمز عبور') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('ثبت نام') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>            </div>
            </div>
            <p>
                <button class="btn btn-danger " id="godbtn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    ورود کاربران
                </button>
            </p>
        @endguest
        <div class="collapse col-md-8" id="collapseExample">
            <div class="card card-body">
                <div>
                    <form method="post"   action="{{route('login')}}">
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

                            <div class="">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('رمز عبور خود را فراموش کرده اید؟') }}
                                    </a>
                                @endif
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Scrollable modal -- Mobile login -->
<div class="loginMobile">

@if(Session::has('fail'))
    <div class="alert alert-danger" role="alert">
        {{Session::get('fail')}}
    </div>

@endif

@if(Session::has('failUsername'))
    <div class="alert alert-danger" role="alert">
        {{Session::get('failUsername')}}
    </div>

@endif

<div class="row justify-content-left" style="margin-left:10% !important;font-size:10px!important">

    @auth

        <div>
            <a class="btn btn-danger" href="{{ route('logout') }}"
               onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" style="font-size:10px;">
                {{ __('خروج') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <p>
            <button class="btn btn-danger" type="button"  style="direction:rtl;font-size:10px;">
                سلام {{ Auth::user()->name }}خوش آمدید

            </button>
        </p>
    @endauth
    @guest
        <p>
            <a class="btn btn-danger " id="godbtn" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample" style="font-size:10px;">
                ثبت نام
            </a>
        </p>
        <div class="collapse col-md-8" id="collapseExample2">
            <div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('ثبت نام') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نام') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="family" class="col-md-4 col-form-label text-md-right">{{ __('نام خانوداگی') }}</label>

                                        <div class="col-md-6">
                                            <input id="family" type="text" class="form-control @error('family') is-invalid @enderror" name="family" value="{{ old('family') }}" required autocomplete="family" autofocus>

                                            @error('family')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('شماره همراه') }}</label>

                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ایمیل') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('رمز عبور') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تکرار رمز عبور') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary" style="font-size:10px!important">
                                                {{ __('ثبت نام') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>            </div>
        </div>
        <p>
            <button class="btn btn-danger " id="godbtn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="font-size:10px;">
                ورود کاربران
            </button>
        </p>
    @endguest
    <div class="collapse col-md-8" id="collapseExample" style="font-size:10px!important">
        <div class="card card-body">
            <div>
                <form method="post"   action="{{route('login')}}">
                    @csrf
                    <div class="col-md-5" style="float:right">
                        <div class="input-group flex-nowrap">
                            <label for="email"></label>
                            <input id="email" class="form-control @error('email') is-invalid @enderror"  type="email" name="email" placeholder="ایمیل" value="{{ old('email') }}" required autocomplete="email" autofocus style="text-align: center;font-size:10px!important">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4" style="float:right;font-size:10px!important">
                        <div class="input-group flex-nowrap">
                            <label class="col-form-label text-md-right" for="password"></label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="رمز عبور" name="password" required autocomplete="current-password" style="text-align: center;font-size:10px!important">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-3" style="float:right">
                        <button type="submit" class="btn btn-danger" style="font-size:10px!important">
                            {{ __('ورود') }}
                        </button>
                    </div>
                    <div class="form-group  col-md-6" style="float:right;">
                        <div class="">
                            <input class="" style="margin-right:20px;" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('مرا به خاطر بسپار') }}
                            </label>
                        </div>

                        <div class="">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="font-size:10px!important">
                                    {{ __('رمز عبور خود را فراموش کرده اید؟') }}
                                </a>
                            @endif
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
