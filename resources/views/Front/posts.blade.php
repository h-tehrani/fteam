@extends('Layouts.masterHomePage')
@section('content')

    @foreach($posts as $post)
            <div class="post">

                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="postTitle">
                                <a class="btn btn-outline-success" style="margin:0.3%;font-size:25px;font-family:Yekan;color:dimgray;direction:rtl;"> نویسنده :{{$post->author}}</a>
                                <br>
                                <a class="btn btn-outline-light" style="margin:0.3%;font-size:22px;font-family:Yekan;color:dimgray;direction:rtl;">دسته بندی :{{$post->division}}</a>
                                <br>
                                <a class="btn btn-outline-danger" style="margin:0.3%;font-size:20px;font-family:Yekan;color:dimgray; direction:rtl;">  موضوع:  {{$post->title}}</a>
                            </div>
                            <div class="postContent">
                                <div class="card-header" style="border-style:solid!important;border-width:4px!important;border-color:orangered!important;border-radius: 10px!important;margin-top:10px;">
                                    <p style="font-size:18px;font-family:parastoo;color:black;direction:rtl;"><?php echo $post->content ?></p>
                                </div>
                            </div>
                            <strong style="direction:rtl ;"> <a style="text-decoration: none;" href="{{route('FrontPost',['id'=>$post->id])}}">  <img src="/Files/Pic/readmore.jpg" alt="comment " width="40" height="35"> مشاهده بیشتر   </a> </strong>
                            <div class="row">
                                <div class="col-md-12" style="direction: rtl;">
                                    <p> <strong> {{ count($post->likes) }} نفر پسندیدن  </strong> <a href="{{route('postLike',['id'=>$post->id])}}">   <img src="/Files/Pic/like.jpg" alt="Like " width="40" height="40">
                                        </a>|  <strong> {{ count($post->comments) }} نفر نظر دادن ، نظر شما چیه ؟ </strong>
                                        <a  type="button" data-toggle="collapse" data-target="#{{$post->title}}" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer;">
                                            <img src="/Files/Pic/comment.png" alt="comment " width="50" height="50">
                                        </a>
                                    <div class="collapse" id="{{$post->title}}" style="width:50%;float:right;">
                                        <div class="card card-body">
                                            <form action="{{route('postComment',['id'=>$post->id])}}" method="post">
                                                <div class="form-group">
                                                    <label for="nickName" class="col-12">نام</label>
                                                    <input class="form-control" type="text" @auth placeholder=" {{ Auth::user()->name }}  " @endauth  name="nickName" id="nickName" style="width:50%;float:right">
                                                </div>
                                                <div class="form-group" >
                                                    <label for="Content" class="col-12">نظرات شما درباره این پست</label>
                                                    <textarea class="form-control"  name="Content" id="Content">
                                                    </textarea>
                                                </div>
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn-danger">
                                                    ارسال
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <p STYLE="direction: rtl;text-align: center; color:white;">F.Team©</p>
            </div>
    @endforeach
    <div id="paginates">
        {{ $posts->links() }}
    </div>
@endsection


