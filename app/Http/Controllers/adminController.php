<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\User;
use App\Models\job;
use App\Models\indexContent;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class adminController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin';
    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function getAdminLogin()
    {

        if (!Auth::guard('admin')->check()) {
            return view('Admin.adminLoginForm');
        }

        return redirect()->intended('/admin');
    }
    public function postAdminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin');
        }
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('getAdminLogin')->with('failAdmin', ' لطفا برای ورود به این بخش وارد حساب کاربری مدیریت شوید');

        }
    }
    public function getAdminLogOut()
    {
        auth('admin')->logout();

        return view('Admin.adminLoginForm');
    }
    public function getAdminIndex()
    {
    if (!Auth::guard('admin')->check()){
        return redirect()->route('getAdminLogin')->with('failAdmin','لطفا برای ورود به این بخش وارد حساب کاربری مدیریت شوید');
    }
    $posts = DB::table('posts')->paginate(15);
    $products = DB::table('products')->get();
        return view('Admin.index',['products'=>$products,'posts'=>$posts]);
    }
    public function getSurvey()
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $users = DB::table('users')->paginate(10);
        $rateUss = DB::table('rate_us')->paginate(10);
        $user_Id = DB::table('rate_us')->pluck('user_id');
        $posts = DB::table('posts')->paginate(10);
        $products = DB::table('products')->paginate(10);
        $Name = DB::table('users')->where('id', $user_Id)->value('family');
        return view('Admin.index', ['rateUss' => $rateUss ,'posts'=>$posts , 'products'=>$products , 'users'=>$users , 'Name'=>$Name ]);
    }
    public function getAdminTeamWorks()
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }

        $jobs = job::get();

        return view('Admin.TeamWorks', ['jobs' => $jobs]);
    }
    public function getJobsDelete()
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        DB::table('jobs')->truncate();
        return redirect()->route('adminTeamWorks')->with('JOBSDelete', 'کلیه درخواست ها با موفقیت حذف شد');
    }
    public function getJobDelete($id)
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        DB::table('jobs')->where('id', '=', $id)->delete();
        return redirect()->route('adminTeamWorks')->with('JobDelete', 'درخواست با موفقیت حذف شد');
    }
    public function getJobsNumber()
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $jobs = DB::table('jobs')->paginate(10);
        $JobsNumber = DB::table('jobs')->paginate(10);
        return view('Admin.TeamWorks', ['JobsNumber' => $JobsNumber , 'jobs'=>$jobs]);
    }
    public function searchJob(){
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $key = request('keyword');
        $Jobs= job::search($key)->latest()->get();
        $Job= job::search($key)->latest()->first();
        $jobs = DB::table('jobs')->paginate(10);
        if($Job==true){
            return view('Admin.TeamWorks', ['key'=>$key,'Jobs'=>$Jobs,'Job'=>$Job , 'jobs'=>$jobs]);
        }
        else {
            return redirect()->route('adminTeamWorks')->with('errorSearch', ' متاسفانه ،  عبارت مورد نظر پیدا نشد  ');
        }
    }
    public function getIndexContentCreate()
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }

        return view('Admin.createIndexContent');
    }
    public function postIndexContentCreate(Request $request)
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }

        $indexContent= new indexContent(
            [
                'title'=>$request->input('title'),
                'content'=>$request->input('content'),
                'author'=>$request->input('author'),
                'price'=>$request->input('price'),
            ]);
        if($request->has('picURL')) {
            $image = $request->file('picURL');
            $filename=rand(1111111,99999999);
            $destination= 'imagess/products/';
            $image->move($destination, $filename.$request->picURL->getClientOriginalName());
        }
        $indexContent->picURL = $destination.$filename.$request->picURL->getClientOriginalName();
        $indexContent->save();
        return redirect()->route('adminIndex')->with('INDEXCreated','پست شما با موفقیت به صفحه اصلی اظافه شد');
    }

}
