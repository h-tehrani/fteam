@extends('Layouts.masterHomePage')
@section('content')
    <div class="siteServiceCard">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="BodyCard">
                    <img src="../{{$product->picProduct}}" class="card-img-top" alt="web-design" style="width:100%;max-width:600px;height:300px;margin-right:auto;margin-left:auto;display:table;">
                    <h5 class="card-text" style="text-align:center;font-weight: bold;font-style: italic"> {{$product->productName}}  </h5>
                    <p>  تیپ : {{$product->productType}}  </p>
                    <p class="siteServiceDetail1" style="text-align: justify"> <strong>امکانات:</strong>  <br> {{$product->productOptions}}</p>
                    <p class="siteServiceDetail1" style="text-align: justify">    توضیحات: {{$product->productDescription}}</p>
                    <ul class="list-group list-group-flush ul-siteService" style="list-style:none;">
                        <li class="siteServiceSubDetail">  قیمت : تومان{{$product->productPrice}} </li>
                        <li class="siteServiceSubDetail">   تخفیف : % {{$product->productOffPercent}} </li>
                        <li class="siteServiceSubDetail">  قیمت با احتساب تخفیف : تومان {{$product->productOffPrice}} </li>
                    </ul>
                    <p class="siteServiceURL">F.Team©</p>
                    <div class="card-body">
                        <div class="forms" style="margin-top:20px;direction: rtl;">
                            <div class="row justify-content-center">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#O{{$product->id}}" aria-expanded="false" aria-controls="collapseExample">
                                    همین حالا سفارش دهید !
                                </button>
                                <div class="collapse" id="O{{$product->id}}">
                                    <div class="card card-body">
                                        <form>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">نام و نام خانوادگی</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="نام و نام خانوادگی" aria-label="Username" aria-describedby="basic-addon1" style="text-align:right;">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">+98</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="تلفن همراه" aria-label="Username" aria-describedby="basic-addon1" style="text-align:right;">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">شرح سایت</span>
                                                </div>
                                                <textarea class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


@endsection


