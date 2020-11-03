<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\tag;
use Auth;
use Illuminate\Support\Facades\DB;

class tagController extends Controller
{
    public function getAdminTags()
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $tags=DB::table('tags')->get();
        return view('admin.tag.adminManageTag',['tags'=>$tags]);
    }
    public function getTagCreate()
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        return view('admin.tag.adminCreateTag');
    }
    public function postTagCreate(Request $request)
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $this->validate($request,[
            'name'=>'required',
            'describe'=>'required',
        ]);
        $admin=Auth::guard('admin')->user();
        if(!$admin){
            redirect()->back();
        }
        $tag= new tag(
            [
                'name'=>$request->input('name'),
                'describe'=>$request->input('describe'),
            ]);

        $tag->save();
        return redirect()->route('adminIndex')->with('tag','برچسب شما با موفقیت ایجاد شد');

    }
    public function getTagEdit($id)
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $tag = tag::find($id);

        return view('admin.tag.adminEditTag',['tag' => $tag, 'tagId' => $id ]);
    }
    public function postTagUpdate(Request $request)
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back();
        }
        $this->validate($request, [
            'name'=>'required',
            'describe'=>'required',
        ]);
        $tag = tag::find($request->input('id'));
        $tag->name=$request->input('name');
        $tag->describe=$request->input('describe');

        $tag->save();
        return redirect()->route('adminIndex')->with('tagUpdated', '   برچسب شما با موفقیت ویرایش شد عنوان جدید   ' . $request->input('name'));
    }
    public function getTagDelete($id)
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $tag = tag::find($id);
        $tag->delete();

        return redirect()->route('adminIndex')->with('TagDelete', 'برچسب شما با موفقیت حذف شد');
    }
}
