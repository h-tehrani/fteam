@extends('Layouts.adminMaster')
@section('content')
    <form action="{{ route('postProductCreate') }}" method="post" >
        <div class="form-group">
            <label for="name" style="direction:rtl;color:white"></label>
            <input name="name" class="form-control" id="name" required placeholder="نام محصول" style="direction:rtl;text-align:right;width: 33%;float:right;min-width: 200px;">
        </div>
        <div class="form-group">
            <label for="type"style="direction:rtl;color:white"></label>
            <input name="type" class="form-control" id="type" placeholder=" نوع محصول "  style="direction:rtl;text-align:right;width: 33%;float:right;min-width: 180px;">
        </div>
        <div class="form-group">
            <label for="price"style="direction:rtl;color:white"></label>
            <input name="price" class="form-control" id="price" placeholder="قیمت محصول" required  style="direction:rtl;text-align:right;width: 33%;float:right;min-width: 200px;">
        </div>
        <div class="form-group">
            <label for="offPercent"style="direction:rtl;color:white"></label>
            <input name="offPercent" class="form-control" id="offPercent" placeholder="درصد تخفیف محصول" required  style="direction:rtl;text-align:right;width: 33%;float:right;min-width: 200px;">
        </div>
        <div class="form-group">
            <label for="offPrice"style="direction:rtl;color:white"></label>
            <input name="offPrice" class="form-control" id="offPrice" placeholder="قیمت محصول با احتساب تخفیف"  required  style="direction:rtl;text-align:right;width: 33%;float:right;min-width: 200px;">
        </div>
        <div class="form-group">
            <label for="options"style="direction:rtl;color:white"></label>
            <input name="options" class="form-control" id="options" placeholder="آپشن های محصول"  style="direction:rtl;text-align:right;">
        </div>
        <div class="form-group">
            <label for="description"style="direction:rtl;color:white">توضیحات درباره محصول</label>
            <textarea name="description" class="form-control" id="description"  style="direction:rtl;text-align:right;">
            </textarea>
        </div>
        <div class="form-group card col-12" style="direction:rtl;text-align:right;">
            <label for="pictures" style="direction:rtl;color:black">عکس محصول حداکثر  <br>یک مگابایات</label>
            <input name="pictures" type="file" class="form-control-file" id="pictures" style="direction:rtl;margin-left:70%;">
            @error('file')
            <span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
            @enderror
        </div>

        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger">ارسال</button>
    </form>




@endsection

