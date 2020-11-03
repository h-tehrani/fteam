@extends('Layouts.masterHomePage')
@section('content')
    <span class="badge badge-dark" id="show_time_1">
                <script language="JavaScript">
                function show_time_1(){
                    d=new Date();
                    H=d.getHours();H=(H<10)?"0"+H:H;
                    i=d.getMinutes();i=(i<10)?"0"+i:i;
                    s=d.getSeconds();s=(s<10)?"0"+s:s;
                    document.getElementById('show_time_1').innerHTML=H+":"+i+":"+s;
                    setTimeout("show_time_1()",1000);/* 1 sec */
                } show_time_1();
                </script>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="spinner-border spinner-border-sm" role="alert" aria-hidden="true"></span>
           </span>
    <span class="badge badge-dark" id="show_time_2">
              <?php
        include_once('jdf.php');
        $out=jdate('l/j/F');
        echo $out; ?>
        <br><br>
        <?php
        $out=date('l jS \of F Y');
        echo $out; ?>
       </span>

        <div class="prices" style="margin-bottom:10%;">
            <div class="card" id="pricesButton" style="border-radius:20px;margin-top:10%;">
                <p style="margin:auto;">
                    <button style="border-radius:20px;" class="btn btn-warning" type="button" data-toggle="collapse" data-target="#orderPlugin" aria-expanded="false" aria-controls="collapseExample">
                        پلاگین اختصاصی
                    </button>

                    <button style="border-radius:20px;" class="btn btn-warning" type="button" data-toggle="collapse" data-target="#orderApplication" aria-expanded="false" aria-controls="collapseExample">
                        اپلیکیشن
                    </button>

                    <button style="border-radius:20px;" class="btn btn-warning" type="button" data-toggle="collapse" data-target="#orderSite" aria-expanded="false" aria-controls="collapseExample">
                        سایت آماده
                    </button>


                </p>
            </div>
            <div class="complexButton" >

                        <div class="complexReadySite">
                            <div class="collapse" id="orderSite">
                                 <div class="card card-body" style="border-radius:20px;">
                                     <button style="border-radius:20px;" class="btn btn-warning" type="button" data-toggle="collapse" data-target="#orderSite3" aria-expanded="false" aria-controls="collapseExample">
                                         قیمت سایت
                                     </button >
                                     <button style="margin-top:10px;border-radius:20px;" class="btn btn-warning" type="button" data-toggle="collapse" data-target="#orderSite2" aria-expanded="false" aria-controls="collapseExample">
                                         تفاوت سایت سفارشی با سایت آماده
                                     </button>
                                 </div>
                                 <div class="collapse" id="orderSite2" >
                                     <div class="card-body" style="border-radius:20px;">
                                         <div  class="card card-body" id="readySiteBox">
                                                 <p style="border: solid; border-color:orange;">
                                                     <p style="border-radius:20px;text-align:center;direction:rtl;"  class="btn-warning" type="button" data-toggle="collapse" data-target="#orderSite" aria-expanded="false" aria-controls="collapseExample">
                                                         سایت آماده
                                                     </p>
                                             <div class="card card-body" style="border-radius:20px;">

                                             <p style="direction:rtl">
                                                          هاست cPanel   ، سرور ایران پرسرعت ، 500   مگابایت فضا حداقل و بیشتر*
                                                 <br>
                                                         ایمیل و ساب دامین نامحدود ، ترافیک نامحدود  ، دیتابیس Mysql
                                                 <br>
                                                 <br>

                                                 طراحی حرفه ای  المان ها ،  واکنش گرا ،   طراحی ظاهر سایت مطابق معیار های روز رابط کاربری
                                                 <br>
                                                         با استفاده از پلاگین های عمومی
                                                 <br>
                                                 <br>

                                                 1 سال دامین ir.
                                                 <br>
                                                         6 ماه هاست
                                                 <br>
                                                        48 ساعت گارانتی سایت
                                                 <br>
                                                 تمدید سالیانه 90%
                                         </div>
                                         </div>
                                         <div  class="col-6 card card-body" id="orderSiteBox">
                                             <p style="border: solid; border-color:orange;">
                                             <p style="border-radius:20px;text-align:center;"  class="btn-warning" type="button" data-toggle="collapse" data-target="#orderSite" aria-expanded="false" aria-controls="collapseExample">
                                                 سایت اختصاصی
                                             </p>
                                             <div class="card card-body" style="border-radius:20px;">
                                                 <p style="direction: rtl;">
                                                     هاست cPanel آلمان و ایران پرسرعت و 1000   مگابایت فضا حداقل و بیشتر*
                                                     <br>
                                                     ایمیل و ساب دامین نامحدود - ترافیک نامحدود  - دیتابیس Mysql FTeam Encryption Mode
                                                 </p>
                                                 <p style="direction: rtl;">
                                                     طراحی اختصاصی المان ها - کاملا واکنش گرا - پنل ادمین حرفه ای -  طراحی ظاهر سایت مطابق سلیقه شما - امکانات ویژه مطابق نیاز شما *
                                                     <br>
                                                     دیتابیس با کدگذاری ضد هک (Fteam Mode) - سرعت بسیار بالا به دلیل استفاده نکردن از پلاگین های عمومی و سنگین
                                                     <br>
                                                     استفاده از پلاگین های اختصاصی گروه F و شخصی سازی آن مطابق نظر شما
                                                 </p>
                                                 <p style="direction: rtl;">
                                                     1 سال دامین ir.
                                                     <br>
                                                     1 سال هاست
                                                     <br>
                                                     3 ماه گارانتی سایت و 1 بار اعمال تغییرات*
                                                 </p>
                                                 <p>
                                                     تمدید سالیانه با 35% قیمت
                                                 </p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                <div class="collapse" id="orderSite3">
                                    <div class="card card-body" style="border-radius:20px;">
                                        <p style="border: solid; border-color:orange;">
                                        <p style="border-radius:20px;border-style:solid;border-color:dodgerblue;border-width:3px;text-align:center;font-size:30px"   class="btn-warning" type="button" data-toggle="collapse" data-target="#orderSite" aria-expanded="false" aria-controls="collapseExample">
                                            قیمت  سایت اختصاصی
                                        </p>
                                        <p>
                                            قیمت ها با در نظر گرفتن هاست و دامین هستند

                                        </p>
                                        <a style="direction: rtl;border-radius:10px;color:white;border-color:orange;border-width:3px;border-style:solid;"class="btn-info">

                                             سایت شخصی : 349.000 تومان
                                            <br>
                                             سایت آموزشی  : 499.000 تومان
                                            <br>
                                             سایت فروشگاهی  :
                                            <br>
                                            تیپ 1  499.000  تومان                                          <br>
                                            تیپ 2   449.000 تومان                                         <br>
                                            تیپ 3   599.000 تومان
                                            <br>
                                             سایت بازاریابی شبکه ای   : 7.999.000 تومان
                                        <br>
                                        </a>
                                        <p style="border-radius:20px;border-style:solid;border-color:forestgreen;text-align:center;font-size:30px;margin-top:20px;"   class="btn-warning" type="button" data-toggle="collapse" data-target="#orderSite" aria-expanded="false" aria-controls="collapseExample">
                                            قیمت  سایت آماده
                                        </p>

                                        <a style="direction: rtl;border-radius:10px;color:white;margin-top:10px;border-color:orange;border-width:3px;border-style:solid"class="btn-success">


                                         سایت شخصی  : 199.000 تومان
                                            <br>
                                             سایت آموزشی  : 349.000 تومان
                                            <br>
                                             سایت فروشگاهی  :<br> تیپ 1  349.000  تومان                                          <br>
                                            تیپ 2   299.000 تومان                                         <br>
                                            تیپ 3   399.000 تومان
                                            <br>
                                             سایت بازاریابی شبکه ای   : 3.999.000 تومان
                                        </a>
                                        <div class="forms" style="direction: rtl;margin-top:10px;">
                                            <div class="row justify-content-center" style="border-radius:20px;">
                                                <button style="border-radius:20px;border-color:orange;border-width:3px;border-style:solid" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample6767" aria-expanded="false" aria-controls="collapseExample">
                                                    همین حالا سفارش دهید !
                                                </button>

                                                <div class="collapse" id="collapseExample6767">
                                                    <div class="card card-body">
                                                        <form>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">نام و نام خانوادگی</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="نام و نام خانوادگی" aria-label="Username" aria-describedby="basic-addon1" style="text-align:right;">
                                                            </div>

                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">+98</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="تلفن همراه" aria-label="Username" aria-describedby="basic-addon1" style="text-align:right;">
                                                            </div>


                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">شرح سایت</span>
                                                                </div>
                                                                <textarea class="form-control" aria-label="With textarea"></textarea>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class="complexApplication">
                                <div class="collapse" id="orderApplication">
                                    <div class="card card-body" style="border-radius:20px;direction:rtl;">
                                        بخش نرم افزاری  در حال برنامه نویسی هست و تا آخر مهر ماه قابل دسترسی می شود.
                                    </div>
                                </div>
                            </div>

                                 <div class="complexPlugin">
                                    <div class="collapse" id="orderPlugin">
                                        <div class="card card-body" style="border-radius:20px;direction:rtl;">
                                            بخش پلاگین ها در حال برنامه نویسی هست و تا آخر شهریور ماه قابل دسترسی می شود.
                                        </div>
                                    </div>
                                 </div>
            </div>
        </div>
@endsection


