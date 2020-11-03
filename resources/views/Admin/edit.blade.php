@extends('Layouts.adminMaster')
@section('content')



    <form action="{{ route('postUpdatePost') }}" method="post">
        <div class="form-group">
            <label class="col-12" for="author" style="color:white;">نویسنده</label>
            <input name="author" class="form-control" id="author" placeholder="نویسنده" value="{{ $post->author }}" required style="text-align:right;width: 33%;float:right;min-width: 180px;">
        </div>
        <div class="form-group">
            <label for="division" class="col-12" style="color:white;">دسته بندی-بخش</label>
            <input name="division" class="form-control" id="division" placeholder="دسته بندی-بخش" value="{{ $post->division }}" required  style="text-align:right;width: 33%;float:right;min-width: 180px;">
        </div>
        <div class="form-group">
            <label class="col-12" for="title" style="color:white;">  عنوان پست </label>
            <input name="title" class="form-control" id="title" placeholder="عنوان پست" value="{{ $post->title }}" required style="text-align:right;">
        </div>


        <div class="input-group" style="direction: rtl;">
            <label class="col-12" for="content" style="color:white;">محتوای پست</label>

            <input name="content" class="form-control" aria-label="With textarea" id="content"  placeholder="محتوای پست" value="{{ $post->content }}" required style="text-align:right;height: 105px;">

        </div>

        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $postId }}">
        <button type="sumbit" class="btn btn-danger">ویرایش</button>
    </form>




@endsection

