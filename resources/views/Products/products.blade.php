@extends('Layouts.adminMaster')
@section('content')
    @if(Session::has('info'))
        <div class="alert alert-success" role="alert">
            {{Session::get('info')}}
        </div>
    @endif
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
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>


@endsection


