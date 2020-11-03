@extends('Layouts.adminMaster')
@section('content')
{{--messages--}}
    @if(Session::has('info'))
        <div class="alert alert-success" role="alert">
            {{Session::get('info')}}
        </div>
    @endif
    @if(Session::has('INDEXCreated'))
        <div class="alert alert-success" role="alert">
            {{Session::get('INDEXCreated')}}
        </div>
    @endif
    <div class="sessionMessages">
        @if(Session::has('adminUpdate'))
            <div class="alert alert-success" role="alert">
                {{Session::get('adminUpdate')}}
            </div>
        @endif
            @if(Session::has('productCreated'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('productCreated')}}
                </div>
            @endif
        @if(Session::has('adminDelete'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('adminDelete')}}
            </div>
        @endif
            @if(Session::has('ProductUpdate'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('ProductUpdate')}}
                </div>
            @endif
            @if(Session::has('ProductDelete'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('ProductDelete')}}
                </div>
            @endif
    </div>
{{--TIME AND DATE--}}
<div class="showTimeAndDate">
     <span class="badge badge-light" id="show_time_1">
                        <script language="JavaScript">
                        function show_time_1(){
                            d=new Date();
                            H=d.getHours();H=(H<10)?"0"+H:H;
                            i=d.getMinutes();i=(i<10)?"0"+i:i;
                            s=d.getSeconds();s=(s<10)?"0"+s:s;
                            document.getElementById('show_time_1').innerHTML=H+":"+i+":"+s;
                            setTimeout("show_time_1()",1000);/* 1 sec */
                        } show_time_1();
                        </script>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="spinner-border spinner-border-sm" role="alert" aria-hidden="true"></span>
     </span>
     <span class="badge badge-light" id="show_time_2">
                      <?php
        include_once('jdf.php');
        $out=jdate('l/j/F');
        echo $out; ?>
        <br><br>
        <?php
        $out=date('l jS \of F Y');
        echo $out; ?>
     </span>
</div>
{{--Main MENU and Welcome Message To ADMIN--}}
<div id=adminMainMenu>
    <div id="adminWelcomeMessage">
        <strong> سلام <b></b> به پنل ادمین خوش اومدی</strong>
        <a id="adminLogOut" href="{{ route('getAdminLogOut') }}">
            خروج
        </a>
    </div>
    <div id="adminMainMenuContent">
        <div class="adminPosts">
            <p>
                <button class="btn btn-outline-dark" type="button" data-toggle="collapse" data-target="#adminPosts" aria-expanded="false" aria-controls="collapseExample" style="direction:rtl;">
                    پست ها >>>
                </button>
            </p>
            <div class="collapse" id="adminPosts">
                <div class="card card-body">
                    <a class="dropdown-item bg-dark" href="{{route('getPostCreate')}}" style="text-align: center;font-size:20px;">پست جدید</a>
                    <p>
                        پست ها :
                    </p>
                @foreach($posts as $post)
                        <div class="row">
                            <div class="col-md-12" style="direction: rtl;">
                                <strong>{{$post->title}}</strong> ===> <a href="{{ route('getPostEdit' , ['id' =>$post->id]) }}">ویرایش |</a><a href="{{ route('getPostDelete' , ['id' =>$post->id]) }}">حذف |</a></p>
                            </div>
                        </div>
                    @endforeach
                    <div style="margin-right:auto;margin-left:auto;display:table;">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="adminProducts">
            <p>
                <button class="btn btn-outline-dark" type="button" data-toggle="collapse" data-target="#adminProducts" aria-expanded="false" aria-controls="collapseExample" style="direction:rtl;">
                    محصولات >>>
                </button>
            </p>
            <div class="collapse" id="adminProducts">
                <div class="card card-body">
                    <a class="dropdown-item bg-dark" href="{{route('getProductCreate')}}" style="text-align: center;font-size:20px;">اظافه کردن محصول جدید</a>
                    <p style="direction:rtl;">
                        محصولات :
                    </p>
                    @foreach($products as $product)
                        <div class="row">
                            <div class="col-md-12" style="direction: rtl;">
                                <strong>{{$product->productName}}</strong>|<strong>{{$product->productType}}</strong> ===><a href="{{ route('productsEdit' , ['id' =>$product->id]) }}">ویرایش |</a><a href="{{ route('productsDelete' , ['id' =>$product->id]) }}">حذف |</a>
                            </div>
                        </div>
                    @endforeach
                    <div style="margin-right:auto;margin-left:auto;display:table;">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="rate_us">
            <p>
                <button class="btn btn-outline-dark" type="button" data-toggle="collapse" data-target="#adminRateUs" aria-expanded="false" aria-controls="collapseExample" style="direction:rtl;">
                    انتقادات و پیشنهادات >>>
                </button>
            </p>
            <div class="collapse" id="adminRateUs">
                <div class="card card-body">
                    <a class="dropdown-item bg-dark" href="{{route('getPostCreate')}}" style="text-align: center;font-size:20px;">پست جدید</a>
                    <p>
                        انتقادات و پیشنهادات :
                    </p>
                    <?php if($rateUss ?? ''){ ?>
                    <div class="alert alert-success" role="alert">
                        @foreach($rateUss as $rateus)
                            <div class="row">
                                <div class="col-md-12" style="direction: rtl;">
                                    <strong>{{$rateus->rateContent}}</strong><br>
                                </div>
                            </div>
                        @endforeach
                        {{ $rateUss->links() }}
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
{{--scroll Focus to TOP--}}
<div class="scrollToUp">
    <a class="btn btn-outline-danger" href="#">برو بالا</a>
</div>

@endsection


