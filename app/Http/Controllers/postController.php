<?php

namespace App\Http\Controllers;
use App\Models\comment;
use App\Models\post;
use App\Models\Admin;
use App\Models\like;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class PostController extends Controller
{
    public function getPosts()
    {
        $posts = post::with('likes','comments')->simplePaginate(2);
        if (Auth::check()){
            $user_id=Auth::user()->id;
            $order = DB::table('orders')->where('user_Id', $user_id)->get();
            return view('Front.posts',['posts' => $posts ,"order"=>$order]);
        }
        return view('Front.posts', ['posts' => $posts]);
    }
    public function getPost($id)
    {
        $post = post::where('id','=',$id)->with('likes','comments')->first();
        $comments= comment::where('post_id','=',$id)->get();
        if (Auth::check()){
            $user_id=Auth::user()->id;
            $order = DB::table('orders')->where('user_Id', $user_id)->get();
            return view('Front.post',['post' => $post , 'comments'=>$comments ,"order"=>$order]);
        }
        return view('Front.post', ['post' => $post , 'comments'=>$comments]);
    }
    public function getLikePost($id)
    {
        $post = post::where('id','=',$id)->first();
        $like= new like();
        $post->likes()->save($like);

        return redirect()->back();
    }
    public function getComment($id)
    {
        $post = post::where('id','=',$id)->first();
        $comment= post::where('id','=',$id)->first();
        $post->comments()->get($comment);

        return redirect()->back()->with('commentInfo','نظر شما با موفقیت ثبت شد');
    }
    public function postCommentPost(Request $request,$id)
    {
        $post = post::where('id','=',$id)->first();
        $comment= new comment(
            [

                'nickName'=>$request->input('nickName'),
                'Content'=>$request->Content,

            ]
        );

        $post->comments()->save($comment);

        return redirect()->back()->with('commentInfo','نظر شما با موفقیت ثبت شد');
    }
    public function getPostCreate()
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        return view('Admin.create');
    }
    public function postCreatePost(Request $request)
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $this->validate($request,[
            'division'=>'required',
            'author'=>'required',
            'title'=>'required',
            'content'=> 'min:6|required'
        ]);
        $admin=Auth::guard('admin')->user();
        if(!$admin){
            redirect()->back();
        }
        $post= new post(
            [
                'author'=>$request->input('author'),
                'division'=>$request->input('division'),
                'title'=>$request->input('title'),
                'content'=>$request->input('content')
            ]);
        $post->admin_id=$request->input('admin_id');
        $admin->posts()->save($post);
        return redirect()->route('getAdminIndex')->with('info','پست شما با موفقیت ایجاد شد');

    }
    public function getPostEdit($id)
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $post = post::find($id);

        return view('Admin.edit',['post' => $post, 'postId' => $id ]);
    }
    public function postUpdatePost(Request $request)
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back();
        }
        $this->validate($request, [
            'author'=>'required',
            'division'=>'required',
            'title' => 'required|min:2',
            'content' => 'required|min:8'

        ]);
        $post = post::find($request->input('id'));
        $post->author=$request->input('author');
        $post->division=$request->input('division');
        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->save();
        return redirect()->route('adminIndex')->with('adminUpdate', '   پست شما با موفقیت ویرایش شد عنوان جدید   ' . $request->input('title'));
    }
    public function getPostDelete($id)
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $post = post::find($id);
        $post->likes()->delete();
        $post->delete();

        return redirect()->route('adminIndex')->with('adminDelete', 'پست شما با موفقیت حذف شد');
    }

    public function search (Request $request)
    {
            if ($request->ajax()) {
                $output = "";
                $posts = DB::table('posts')->where('title', 'like', '%' . $request->search . "%")->Paginate(10);;
                if ($posts) {
                    foreach ($posts as $post) {
                        $output .='<div class="post">'.'<div class="card card-body">'.'<div class="row">'.'<div class="col-md-12">'.
                            '<a class="btn btn-outline-dark">' . $post->id . '</a>' .'<br>'.
                            '<a  class="btn btn-outline-success">' . $post->author . '</a>'.'<br>'.
                            '<a  class="btn btn-outline-light">' . $post->division . '</a>'.'<br>'.
                            '<a  class="btn btn-outline-danger">' . $post->title . '</a>'.'<br>'.
                            '<a  class="btn btn-outline-warning">' . $post->content . '</a>'.'<br>'.
                            '<a  class="btn btn-outline-warning" href="{{route("FrontPost",["id"=>$post->id])}}">'.
                            '<img src="/Files/Pic/readmore.jpg" alt="comment " width="40" height="35">' . 'مشاهده بیشتر  '.
                            '</a>'.'<br>'.
                            '</div>'.'</div>'.'</div>'.'</div>';
                    }
                    return Response($output);
                }
            }
    }

}


