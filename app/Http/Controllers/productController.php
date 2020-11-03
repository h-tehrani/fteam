<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\like;
use App\Models\comment;
use App\Models\tag;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    public function getProduct($id)
    {
        $product = product::where('id','=',$id)->first();
        if (Auth::check()){
            $user_id=Auth::user()->id;
            $order = DB::table('orders')->where('user_Id', $user_id)->get();
            return view('Front.site',['product' => $product,"order"=>$order]);
        }
        return view('Front.site', ['product' => $product]);
    }
    public function getProducts()
    {

        if (!Auth::check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }

        $products=db::table('products')->paginate(10);
        return view('Products.products', ['products' => $products]);
    }
    public function getSearchProduct(){
        if (!Auth::check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $key = request('keyword');
        $Products= product::search($key)->latest()->get();
        $Product= product::search($key)->latest()->first();
        $products = DB::table('products')->paginate(10);
        if($Product==true){
            return view('products.manager', ['key'=>$key,'Products'=>$Products,'Product'=>$Product , 'products'=>$products]);
        }
        else {
            return redirect()->route('productManager')->with('errorPSearch', ' متاسفانه ،  محصول مورد نظر پیدا نشد  ');
        }
    }
    public function getProductsManager(){
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $products=db::table('products')->paginate(10);
        return view('Products.Manager', ['products' => $products]);
    }
    public function getProductCreate(){
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $tags=DB::table('tags')->get();
        return view('Products.createProduct',['tags'=>$tags]);
    }
    public function postProductCreate(Request $request)
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $this->validate($request,[
            'name'=>'required',
            'type'=>'required',
            'price'=>'required',
            'offPercent'=>'required',
            'offPrice'=>'required',
            'description'=>'required',
            'options'=>'required',
        ]);
        $product= new product(
            [
                'name'=>$request->input('name'),
                'type'=>$request->input('type'),
                'price'=>$request->input('price'),
                'offPercent'=>$request->input('offPercent'),
                'offPrice'=>$request->input('offPrice'),
                'description'=>$request->description,
                'options'=>$request->input('options'),
                'pictures'=>'52154gfd'
            ]);

        if($request->hasfile('pictures'))
        {
            $data='';
            foreach($request->pictures as $image)
            {

                $fileName=Storage::putFile('/public/photos/products',$image);
                $filename=str_replace("public","storage",$fileName);
                $data.=$filename.'-';
            }
            $product->pictures=$data;
        }
        $product->visited=0;
        $product->save();
        $product->tags()->attach($request->input('tags')===null ? [] : $request->input('tags'));
        return redirect()->route('adminIndex')->with('productCreated','محصول شما با موفقیت اظافه شد');
    }
    public function getProductEdit($id){
        $product = product::where('id','=',$id)->first();
        if (Auth::check()){
            $user_id=Auth::user()->id;
            $order = DB::table('orders')->where('user_Id', $user_id)->get();
            return view('Products.editProduct',['product' => $product,"order"=>$order]);
        }
        return view('Products.editProduct', ['product' => $product]);
    }
    public function postProductUpdate(Request $request)
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back();
        }
        $this->validate($request, [
            'name'=>'required',
            'type'=>'required',
            'price' => 'required|min:2',
            'offPercent' => 'required|min:2',
            'offPrice' => 'required|min:2',
            'description' => 'required|min:2',
            'options' => 'required|min:2',
        ]);
        $product = product::find($request->input('id'));
        $product->name=$request->input('productName');
        $product->type=$request->input('productType');
        $product->price=$request->input('productPrice');
        $product->offPercent=$request->input('productOffPercent');
        $product->offPrice=$request->input('productOffPrice');
        $product->description=$request->input('productDescription');
        $product->options=$request->input('productOptions');
        $id=$request->input('id');
        if($request->hasfile('imagesProduct'))
        {
            $data='';
            foreach($request->imagesProduct as $image)
            {

                $fileName=Storage::putFile('/public/photos/products',$image);
                $filename=str_replace("public","storage",$fileName);
                $data.=$filename.'-';
            }
            $product->pictures=$data;
        }
        $product->visited=0;
        $product->save();
        return redirect()->route('getProductEdit',compact('id'))->with('ProductUpdate', '   محصول شما با موفقیت ویرایش شد | ' . $request->input('productName'));
    }
    public function getProductDelete($id)
    {
        if (!Auth::guard('admin')->check()){
            return redirect()->back()->with('fail','لطفا برای ورود به این بخش وارد حساب کاربری خود شوید');
        }
        $product = product::find($id);
        $str=$product->pictures;
        $links=explode('-',$str);
        foreach($links as $link){
            $fileName=str_replace("storage","public",$link);
            Storage::delete($fileName);
        }
        $product->likes()->delete();
        $product->comments()->delete();
        $product->delete();
        return redirect()->route('adminIndex')->with('ProductDelete', 'محصول شما با موفقیت حذف شد');
    }


}
