<?php

namespace App\Http\Controllers;
use app\Models\order;
use app\Models\post;
use app\Models\User;
use app\Models\job;
use app\Models\like;
use app\Models\rateUs;
use app\Models\ticket;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class userController extends Controller
{
    public function getIndex() {

        $products=DB::table('products')->get();
        if (Auth::check()){
            $user_id=Auth::user()->id;
            $order = DB::table('orders')->where('product_id', $user_id)->get();
            $user = Auth::user();
            return view('Front.index',["user"=>$user,"products"=>$products,"order"=>$order]);
        }

        return view('Front.index',["products"=>$products]);
    }
    public function getAbout() {

        if (Auth::check()){
            $user_id=Auth::user()->id;
            $order = DB::table('orders')->where('user_Id', $user_id)->get();
            return view('Front.about',["order"=>$order]);
        }
        return view('Front.about');
    }
    public function getConnection() {
        if (Auth::check()){
            $user_id=Auth::user()->id;
            $order = DB::table('orders')->where('user_Id', $user_id)->get();
            return view('Front.connection',["order"=>$order]);
        }
        return view('Front.connection');

    }
    public function getPrice() {

        if (Auth::check()){
            $user_id=Auth::user()->id;
            $order = DB::table('orders')->where('user_Id', $user_id)->get();
            return view('Front.price',["order"=>$order]);
        }
        return view('Front.price');
    }
    public function getJob() {
        $job = DB::table('jobs')->get();
        return view('Front.jobs',['job'=>$job]);
    }
    public function postSurvey(Request $request)
    {
        if (!Auth::check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $this->validate($request,[
            'rateContent'=>'required'
        ]);
        $user=Auth::user();
        if(!$user){
            redirect()->back();
        }
        $rateUs= new rateUs(
            [
                'rateContent'=>$request->rateContent,
            ]);
        $user->rate_us()->save($rateUs);
        return redirect()->route('Front.connection')->with('rateUsInfo',' با تشکر از پیام شما ، نظرات شما  با موفقیت ارسال شد ');
    }
    public function postTicket(Request $request)
    {
        if (!Auth::check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $this->validate($request,[
            'email'=>'required',
            'ticketTitle'=>'required',
            'ticketContent'=> 'min:2|required'
        ]);
        $user=Auth::user();
        if(!$user){
            redirect()->back();
        }
        $ticket= new ticket(
            [
                'email'=>$request->input('email'),
                'ticketTitle'=>$request->ticketTitle,
                'ticketContent'=>$request->ticketContent,
            ]);

        $user->tickets()->save($ticket);
        return redirect()->route('Front.customerService')->with('ticketInfo','تیکت شما  با موفقیت ارسال شد به زودی از طریق ایمیل درج شده، اطلاع رسانی خواهد شد');

    }
    public function postOrder(Request $request)
    {
        if (!Auth::check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $user=Auth::user();
        if(!$user){
            redirect()->back();
        }
        $order= new order(
            [
                'user_id'=>$user->id,
                /*'product_id'=>$request->product_id,*/
                'customerName'=>$user->name,
                'customerPhone'=>$user->phone,
                'customerEmail'=>$user->email,
                'productHost'=>$request->productHost,
                'productGuaranty'=>$request->productGuaranty,
                'optionsPayGate'=>$request->optionsPayGate,
                'optionsEnamad'=>$request->optionsEnamad,
                'optionsCertificateR'=>$request->optionsCertificateR,
                'optionsResponsive'=>$request->optionsResponsive,
                'optionsMySQL'=>$request->optionsMySQL,
                'optionsAuthenticationGuard'=>$request->optionsAuthenticationGuard,
                'optionsWelcomePageJquery'=>$request->optionsWelcomePageJquery,
                'optionsStart'=>$request->optionsStart,
                'finalPrice'=>$request->finalPrice,
                'orderPaid'=>$request->input('orderPaid'),
                'customerDescription'=>$request->customerDescription
            ]);

        $user->orders()->save($order);
        return response()->json('The book successfully added');
    }
    public function postJobsRequest(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('fail', 'لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $this->validate($request, [
            'fullName' => 'required',
            'email' => 'required',
            'phone' => 'min:10|required'
        ]);
        $user = Auth::user();
        if (!$user) {
            redirect()->back();
        }
        $job = new job(
            [
                'email' => $request->input('email'),
                'fullName' => $request->input('fullName'),
                'phone' => $request->input('phone'),
                'ability' => $request->ability,
                'abilityLevel' => $request->abilityLevel,
                'descriptionAbility' => $request->descriptionAbility,
                'description' => $request->description,


            ]);

        $user->jobs()->save($job);
        return redirect()->route('Front.jobs')->with('jobInfo', 'درخواست شما  با موفقیت ارسال شد به زودی از طریق تماس با شماره ی درج شده، اطلاع رسانی خواهد شد');

    }
    public function postIndexBuy(Request $request)
    {
        if (!Auth::check()){
            return redirect()->back()->with('failBuy','لطفا برای ثبت درخواست خود وارد حساب کاربری  شوید');
        }
        $this->validate($request,[
            'customerName'=>'required|alpha_dash|bail',
            'customerPhone'=>'required|bail',
            'customerEmail'=>'required|bail|email:rfc,dns',
            'productName'=>'required|bail',
            'product_id'=>'required|bail|digits_between:0,9999',
            'customerDescription'=>'bail',
            'orderPaid'=>'required|bail|boolean',
            'productHost'=>'required|bail',
            'productGuaranty'=>'required|bail',
            'optionsPayGate'=>'bail|boolean',
            'optionsEnamad'=>'bail|boolean',
            'optionsCertificateR'=>'bail|boolean',
            'optionsResponsive'=>'bail|boolean',
            'optionsMySQL'=>'bail|boolean',
            'optionsAuthenticationGuard'=>'bail|boolean',
            'optionsWelcomePageJquery'=>'bail|boolean',
            'optionsStart'=>'boolean',
        ]);
        $user=Auth::user();
        if(!$user){
            redirect()->back();
        }
        $order= new order(
            [
                'customerName'=>$request->input('customerName'),
                'customerPhone'=>$request->input('customerPhone'),
                'customerEmail'=>$request->input('customerEmail'),
                'productName'=>$request->productName,
                'productHost'=>$request->productHost,
                'productGuaranty'=>$request->productGuaranty,
                'finalPrice'=>$request->input('finalPrice'),
                'product_id'=>$request->input('product_id'),
                'customerDescription'=>$request->customerDescription,
                'orderPaid'=>$request->input('orderPaid'),
                'user_id'=>$request->input('user_id'),
                'optionsPayGate'=>$request->input('optionsPayGate'),
                'optionsEnamad'=>$request->input('optionsEnamad'),
                'optionsCertificateR'=>$request->input('optionsCertificateR'),
                'optionsResponsive'=>$request->input('optionsResponsive'),
                'optionsMySQL'=>$request->input('optionsMySQL'),
                'optionsAuthenticationGuard'=>$request->input('optionsAuthenticationGuard'),
                'optionsWelcomePageJquery'=>$request->input('optionsWelcomePageJquery'),
                'optionsStart'=>$request->input('optionsStart'),

            ]);
        $user->orders()->save($order);
        return redirect()->route('panelIndex')->with('successBuyOrder','محصول شما به سبد اظافه شد');
    }
    public function getPanelIndex ()
    {
        if (Auth::check()){
            $user_id=Auth::user()->id;
            $order = DB::table('orders')->where('user_Id', $user_id)->get();
            return view('Panel.index',['user_id'=>$user_id,'order'=>$order]);
        }
        return view('Panel.index');
    }
    public function getOrderDelete($id)
    {
        if (!Auth::check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $order = order::find($id);
        $order->delete();
        return redirect()->route('panelIndex')->with('OrderDelete', 'محصول شما با موفقیت از سبد کالا حذف شد');
    }
    public function getSiteService() {
        $products=db::table('products')->paginate(9);
        if (Auth::check()){
            $user_id=Auth::user()->id;
            $order = DB::table('orders')->where('user_Id', $user_id)->get();
            return view('Front.siteService',['products'=>$products,"order"=>$order]);
        }
        return view('Front.siteService',['products'=>$products]);
    }
    public function getAppService() {

        if (Auth::check()){
            $user_id=Auth::user()->id;
            return view('Front.appService');
        }
        return view('Front.appService');
    }
    public function getTemplateService() {

        if (Auth::check()){
            $user_id=Auth::user()->id;
            $order = DB::table('orders')->where('user_Id', $user_id)->get();
            return view('Front.templateService',["order"=>$order]);
        }
        return view('Front.templateService');
    }
    public function getPluginService() {

        if (Auth::check()){
            $user_id=Auth::user()->id;
            $order = DB::table('orders')->where('user_Id', $user_id)->get();
            return view('Front.pluginService',["order"=>$order]);
        }
        return view('Front.pluginService');
    }
    public function getReadySiteService() {

        if (Auth::check()){
            $user_id=Auth::user()->id;
            $order = DB::table('orders')->where('user_Id', $user_id)->get();
            return view('Front.readySiteService',["order"=>$order]);
        }
        return view('Front.readySiteService');
    }
    public function getCustomerService() {

        if (Auth::check()){
            $user_id=Auth::user()->id;
            $order = DB::table('orders')->where('user_Id', $user_id)->get();
            return view('Front.readySiteService',["order"=>$order]);
        }
        return view('Front.customerService');
    }
    public function indexCalcPrice (Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $product = DB::table('products')->where('productName', '=',  $request->productName )->first();
            if ($product) {
                $output .=  '<input type="hidden" name="product_id" id="product_id" value="' . $product->id . '"/>' .'<br>'.
                    '<input type="hidden" name="productOffPercent" id="productOffPercent" value="' . $product->productOffPercent . '"/>'.'<br>';
                return Response($output);
            }
        }
    }
}
