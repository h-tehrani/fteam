@extends('Layouts.adminMaster')
@section('content')
    @if(Session::has('errorPSearch'))
        <div class="alert alert-warning" role="alert">
            {{Session::get('errorPSearch')}}
        </div>
    @endif
    @if(Session::has('info'))
        <div class="alert alert-success" role="alert">
            {{Session::get('info')}}
        </div>
     @endif
    <form class="form-outline" action="{{route('getSearchProduct')}}" method="get" >
        <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="جستجو" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">جستجو</button>
    </form>
    <?php if($Products ?? ''){
        ?>
    <div class="alert alert-success" role="alert">
        <div class="card" style="border-radius:20px;overflow:hidden;resize: both;">
            <div class="card-body">
                <div class="productsDetailSearched">
                    <table style="table-layout:auto;width:100%;">
                        <tr>
                            <th>کد (آی دی) کالا</th>
                            <th>نام کالا</th>
                            <th>نوع کالا</th>
                            <th>قیمت کالا</th>
                            <th>درصد تخفیف کالا</th>
                            <th>قیمت کالا با احتساب تخفیف</th>
                            <th>آدرس عکس کالا</th>
                            <th>حذف کالا</th>
                            <th>ویرایش کالا</th>
                        </tr>


                        @foreach($Products ?? '' as $Product)
                            <tr>
                                <td>{{$Product->id}}</td>
                                <td>{{$Product->productName}}</td>
                                <td>{{$Product->productType}}</td>
                                <td>{{$Product->productPrice}}</td>
                                <td>{{$Product->productOffPercent}}</td>
                                <td>{{$Product->productOffPrice}}</td>
                                <td>{{$Product->picProduct}}</td>
                                <td><a href="{{ route('productsDelete' , ['id' =>$Product->id]) }}">حذف |</a></td>
                                <td><a href="{{ route('productsEdit' , ['id' =>$Product->id]) }}">ویرایش |</a></td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <div class="card" style="border-radius:20px;overflow:hidden;resize: both;">
            <div class="card-body">
                <div class="productsDetail">
                    <table style="table-layout:auto;width:100%;">
                        <tr>
                            <th>کد (آی دی) کالا</th>
                            <th>نام کالا</th>
                            <th>نوع کالا</th>
                            <th>قیمت کالا</th>
                            <th>درصد تخفیف کالا</th>
                            <th>قیمت کالا با احتساب تخفیف</th>
                            <th>آدرس عکس کالا</th>
                            <th>حذف کالا</th>
                            <th>ویرایش کالا</th>
                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->productName}}</td>
                                <td>{{$product->productType}}</td>
                                <td>{{$product->productPrice}}</td>
                                <td>{{$product->productOffPercent}}</td>
                                <td>{{$product->productOffPrice}}</td>
                                <td>{{$product->picProduct}}</td>
                                <td><a href="{{ route('productsDelete' , ['id' =>$product->id]) }}">حذف |</a></td>
                                <td><a href="{{ route('productsEdit' , ['id' =>$product->id]) }}">ویرایش |</a></td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
    </div>


@endsection


