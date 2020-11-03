@extends('Layouts.masterHomePage')
@section('content')
                <div class="siteServiceCard">
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-11 col-sm-11">
                            <div class="BodyCard">
                                <img src="{{$product->picProduct}}" class="card-img-top" alt="web-design" style="width:100%;height:150px;">
                                    <h5 class="card-text" style="text-align:center;font-weight: bold;font-style: italic"> {{$product->productName}}  </h5>
                                    <p>  تیپ : {{$product->productType}}  </p>
                                    <p class="siteServiceDetail" style="text-align: justify"> <strong>امکانات:</strong>  <br> {{$product->productOptions}}</p>
                                <strong>...</strong>
                                    <p class="siteServiceDetail" style="text-align: justify">    توضیحات: {{$product->productDescription}}</p>
                                <strong>...</strong>
                                <ul class="list-group list-group-flush ul-siteService" style="list-style:none;">
                                    <li class="siteServiceSubDetail">  قیمت : تومان{{$product->productPrice}} </li>
                                    <li class="siteServiceSubDetail">   تخفیف : % {{$product->productOffPercent}} </li>
                                    <li class="siteServiceSubDetail">  قیمت با احتساب تخفیف : تومان {{$product->productOffPrice}} </li>
                                </ul>
                                <p class="siteServiceURL">F.Team©</p>
                                <div class="card-body">
                                    <strong style="direction:rtl ;"> <a style="text-decoration: none;" href="{{route('Product',['id'=>$product->id])}}">  <img src="/Files/Pic/readmore.jpg" alt="comment " width="40" height="35"> مشاهده بیشتر   </a> </strong>
                                    <div class="forms" style="margin-top:20px;direction: rtl;padding:5%;">
                                        <div class="row justify-content-center">
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#O{{$product->id}}" aria-expanded="false" aria-controls="collapseExample">
                                                    همین حالا سفارش دهید !
                                            </button>
                                                    <div id="O{{$product->id}}" class="forms collapse" style="margin-top:20px;direction: rtl;">
                                                        <div class="row justify-content-center">
                                                            <form action="{{route('postOrder')}}" method="post">
                                                                @csrf
                                                                @auth
                                                                <input name="product_id" id="product_id" type="hidden" value="{{$product->id}}">
                                                                <input name="user_id" id="user_id" type="hidden" value="{{Auth::user()->id}}">
                                                                <input name="customerName" id="customerName" type="hidden" value="{{Auth::user()->name}}-{{Auth::user()->family}}">
                                                                <input name="customerPhone" id="customerPhone" type="hidden" value="{{Auth::user()->phone}}">
                                                                <input name="customerEmail" id="customerEmail" type="hidden" value="{{Auth::user()->email}}">
                                                                <input name="productName" id="productName" type="hidden" value="{{$product->productName}}">
                                                                <input name="productType" id="productType" type="hidden" value="{{$product->productType}}">
                                                                <input name="productOffPrice" id="productOffPrice" type="hidden" value="{{$product->productOffPrice}}">
                                                                <input name="productPrice" id="productPrice" type="hidden" value="{{$product->productPrice}}">
                                                                <input name="productOffPercent" id="productOffPercent" type="hidden" value="{{$product->productOffPercent}}">
                                                                <input name="productOptions" id="productOptions" type="hidden" value="{{$product->productOptions}}">
                                                                <input name="orderPaid" id="orderPaid" type="hidden" value="0">
                                                                <label for="customerDescription">توضیحات</label>
                                                                <textarea name="customerDescription" id="customerDescription" rows="5" style="width:100%;"></textarea>
                                                                <button class="btn btn-outline-success" type="submit" style="width:100%;">
                                                                    اظافه کردن به سبد خرید
                                                                </button>
                                                                @endauth
                                                            </form>
                                                        </div>
                                                    </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div  id="paginates">
                    {{ $products->links() }}
                </div>


@endsection


