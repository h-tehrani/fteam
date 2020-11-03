@extends('Layouts.masterHomePage')
@section('content')
    <div class="cards">
        <div class="row justify-content-center" id="siteService">

            <div class="card" id="siteServiceCard1" style="width: 18rem;float:right;border-color: #b21f2d">
                <img src="Files/Pic/shoppingt1.jpg" class="card-img-top" alt="responsive" style="width:100%;height:150px;">
                <div class="card-body">
                    <p class="card-text" style="text-align:center;font-weight: bold;font-style: italic">سایت های فروشگاهی تیپ 1 </p>
                    <p class="siteServiceDetail"> سایت فروشگاهی آماده جهت فروش انواع محصولات و تولیداتی که فیزیکی هستند و با پست ارسال می شوند<br> تولید و توسعه با فریم ورک کدایگنایتر توسط تیم©F.Team </p>
                    <p class="siteServiceSubDetail"> marketing site - type 1 </p>
                    <p class="siteServiceURL">F.Team©</p>

                </div>
            </div>
            <div class="card" id="siteServiceCard2"style="width: 18rem;float:right;margin-left:20px;border-color: #b21f2d" >
                <img src="Files/Pic/shoppingt2.jpg" class="card-img-top" alt="web-design" style="width:100%;height:150px;">
                <div class="card-body">
                    <p class="card-text" style="text-align:center;font-weight: bold;font-style: italic"> سایت های فروشگاهی تیپ 2  </p>
                    <p class="siteServiceDetail"> سایت فروشگاهی آماده جهت فروش انواع محصولات غیر فیزیکی اعم از (اینترت ، وی پی ان ، کارت اعتباری و ....)<br> تولید و توسعه با فریم ورک لاراول توسط تیم©F.Team </p>
                    <p class="siteServiceSubDetail"> marketing site - type 2</p>
                    <p class="siteServiceURL">F.Team©</p>

                </div>
            </div>
            <div class="card" id="siteServiceCard3" style="width: 18rem;float:right;margin-right:20px;margin-top:35px;border-color: #b21f2d" >
                <img src="Files/Pic/shoppingt3.jpg" class="card-img-top" alt="web-design" style="width:100%;height:150px;">
                <div class="card-body">
                    <p class="card-text" style="text-align:center;font-weight: bold;font-style: italic">  سایت های فروشگاهی تیپ 3 </p>
                    <p class="siteServiceDetail"> سایت فروشگاهی آماده جهت فروش انواع محصولات فیزیکی و غیر فیزیکی اعم از (اینترت ، وی پی ان ، کارت اعتباری و ....)<br> این مجموعه به صورت اپن سورس یا قابل تغییر دادن و ویرایش می باشد<br> تولید و توسعه با فریم ورک لاراول و کدایگنایتر توسط تیم©F.Team </p>
                    <p class="siteServiceSubDetail">marketing site - editable-type3</p>
                    <p class="siteServiceURL">F.Team©</p>


                </div>
            </div>

            <div class="card" id="siteServiceCard4" style="width: 18rem;float:right;margin-top:35px;border-color: #b21f2d" >
                <img src="Files/Pic/education.jpg" class="card-img-top" alt="web-design" style="width:100%;height:150px;">
                <div class="card-body">
                    <p class="card-text" style="text-align:center;font-weight: bold;font-style: italic">سایت های آموزشی</p>
                    <p class="siteServiceDetail"> این نوع سایت ها برای آموزشگاه ها یا کسانی که قصد دارند از آموزش دادن حرفه خود کسب درآمد کنند مناسب است</p>
                    <p class="siteServiceSubDetail">education site</p>

                    <p class="siteServiceURL">F.Team©</p>

                </div>
            </div>



            <div class="card" id="siteServiceCard5" style="width: 18rem;float:right;margin-top:35px;margin-right:20px;border-color: #b21f2d" >
                <img src="Files/Pic/networkmarketing.jpg" class="card-img-top" alt="web-design" style="width:100%;height:150px;">
                <div class="card-body">
                    <p class="card-text" style="text-align:center;font-weight: bold;font-style: italic">بازاریابی شبکه ای</p>
                    <p class="siteServiceDetail">این نوع سایت برای فعالیت های شبکه ای یا هرمی با قابلیت های متعدد و انعطاف پذیری بالا در پلن های درامدی ساخته شده است</p>
                    <p class="siteServiceSubDetail">
                        network marketing site</p>
                    <p class="siteServiceURL">F.Team©</p>

                </div>
            </div>


            <div class="card" id="siteServiceCard6" style="width: 18rem;float:right;margin-top:35px;border-color: #b21f2d" >
                <img src="Files/Pic/personal.jpg" class="card-img-top" alt="web-design" style="width:100%;height:150px;">
                <div class="card-body">
                    <p class="card-text" style="text-align:center;font-weight: bold;font-style: italic"> سایت شخصی </p>
                    <p class="siteServiceDetail">این نوع سایت بر اساس سلیقه شخصی شما انعطاف پذیر است و قابلیت فروش کالا ندارد </p>
                    <p class="siteServiceSubDetail">personal site</p>

                    <p class="siteServiceURL">F.Team©</p>

                </div>
            </div>

        </div>
    </div>

    <div class="forms" style="margin-top:20px;direction: rtl;">
        <div class="row justify-content-center">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample6767" aria-expanded="false" aria-controls="collapseExample">
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
@endsection


