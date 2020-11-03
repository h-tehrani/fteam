@extends('Layouts.adminMaster')
@section('content')
    <form action="{{route('productsUpdate')}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="productName" style="color:white"></label>
            <input name="productName" class="form-control" id="productName" required placeholder="نام محصول" value="{{$product->productName}}" style="text-align:right;width: 33%;float:right;min-width: 200px;">
        </div>
        <div class="form-group">
            <label for="productType"style="color:white"></label>
            <input name="productType" class="form-control" id="productType" placeholder=" نوع محصول " value="{{$product->productType}}" style="text-align:right;width: 33%;float:right;min-width: 180px;">
        </div>
        <div class="form-group">
            <label for="productPrice"style="color:white"></label>
            <input name="productPrice" class="form-control" id="productPrice" placeholder="قیمت محصول" value="{{$product->productPrice}}" required  style="text-align:right;width: 33%;float:right;min-width: 200px;">
        </div>
        <div class="form-group">
            <label for="productOffPercent"style="color:white"></label>
            <input name="productOffPercent" class="form-control" id="productOffPercent" placeholder="قیمت محصول" value="{{$product->productOffPercent}}" required  style="text-align:right;width: 33%;float:right;min-width: 200px;">
        </div>
        <div class="form-group">
            <label for="productOffPrice"style="color:white"></label>
            <input name="productOffPrice" class="form-control" id="productOffPrice" placeholder="قیمت محصول با احتساب تخفیف" value="{{$product->productOffPrice}}" required  style="text-align:right;width: 33%;float:right;min-width: 200px;">
        </div>
        <div class="form-group">
            <label for="productOptions"style="color:white"></label>
            <input name="productOptions" class="form-control" id="productOptions" placeholder="آپشن های محصول" value="{{$product->productOptions}}"  style="text-align:right;">
        </div>
        <div class="form-group">
            <label for="productDescription"style="color:white">توضیحات درباره محصول</label>
            <textarea name="productDescription" class="form-control" id="productDescription" value="{{$product->productDescription}}"  style="text-align:right;">
            </textarea>
        </div>


        <div class="form-group card col-12" style="text-align:right;">
            <label for="picProduct" style="color:black">عکس محصول حداکثر  <br>یک مگابایات</label>
            <input name="picProduct" type="file" class="form-control-file" id="picProduct" style="margin-left:70%;">
            @error('file')
            <span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
            @enderror
        </div>

        <input type="hidden" name="id" value="{{$product->id}}">


        {{ csrf_field() }}
        <button type="sumbit" class="btn btn-danger">ویرایش</button>
    </form>




@endsection

