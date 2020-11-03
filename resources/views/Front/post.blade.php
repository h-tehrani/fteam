@extends('Layouts.masterHomePage')
@section('content')

        <div class="mainApp">
            <div class="post" >

                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="postTitle">
                                <a class="btn badge-success" style="font-size:25px;font-family:Yekan;color:dimgray;direction:rtl;"> نویسنده :{{$post->author}}</a>
                                <br>
                                <a class="btn badge-warning" style="font-size:22px;font-family:Yekan;color:dimgray;direction:rtl;">دسته بندی :{{$post->division}}</a>
                                <br>
                                <a class="btn badge-danger" style="font-size:20px;font-family:Yekan;color:dimgray; direction:rtl;">  موضوع:  {{$post->title}}</a>
                            </div>
                            <div class="postContent">
                                <div class="card-header" style="border-style:solid!important;border-width:4px!important;border-color:orangered!important;border-radius: 10px!important;margin-top:10px;">
                                    <p style="font-size:18px;font-family:Yekan;color:black;direction:rtl;">{{$post->content}}</p>
                                </div>
                            </div>
                            <div class="justify-content-center" style="text-align:center;border-color:black;border-radius:8px;border-style:solid;direction: rtl;margin-top:10px;font-size:20px;">
                                نظرات :
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach($comments as $comment)
                                            <div class="commentBorder"  style="border-color:orange;border-radius:6px;border-style:dashed ;margin:10px 10px;">
                                            <p style="font-size:16px;font-family:Yekan;color:orangered;direction:rtl;margin:5px 5px;">
                                                {{$comment->nickName}}
                                            </p>
                                            <p style="font-size:12px;font-family:Yekan;color:black;direction:rtl;margin:5px 5px;">
                                                {{$comment->Content}}
                                            </p>
                                            </div>
                                            @endforeach
                                    </div>
                                </div>
                            </div>
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
                                                    <input class="form-control" type="text" @auth value="{{ Auth::user()->name }}" @endauth  name="nickName" id="nickName" required style="width:50%;float:right">
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


                <p STYLE="direction: rtl;text-align: center;color:white;">F.Team©</p>
            </div>
        </div>

@endsection


