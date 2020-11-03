<div class="adminHeader">
    <nav class="navbar navbar-expand-lg col-12" id="adminHeaderInside">
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav mr-auto" >
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle deactive" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        محصولات
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">گزارش محصولات </a>
                        <a class="dropdown-item" href="{{route('getProductsManager')}}">ویرایش ، حذف محصول  و مشخصات</a>
                        <a class="dropdown-item" href="{{route('getProducts')}}">نمایش تمام محصولات</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('getProductCreate')}}">افزودن محصول جدید</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle deactive" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        آمار بازدید کنندگان
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('getSiteService')}}">بازدید های اخیر</a>
                        <a class="dropdown-item" href="{{route('getAppService')}}">نمایش آمار کلی سایت</a>
                        <a class="dropdown-item" href="{{route('getReadySiteService')}}">بازدید های ماه گذشته</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('getPluginService')}}">کلیه سفارشات</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle deactive" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        استخدام و همکاری
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('getAdminTeamWorks')}}">مشاهده ی تمامی درخواست ها</a>
                        <a class="dropdown-item" href="{{route('getJobsDelete')}}">حذف تمامی درخواست ها</a>
                        <a class="dropdown-item" href="{{route('getJobsNumber')}}">شماره های تماس</a>
                        <a class="dropdown-item" href="#">Front-End</a>
                        <a class="dropdown-item" href="#">Back-End</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle deactive" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        پشتیبانی اعضا
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('getSurvey')}}">انتقاد و پیشنهاد </a>
                        <a class="dropdown-item" href="{{route('getAppService')}}">تماس با ما</a>
                        <a class="dropdown-item" href="{{route('getReadySiteService')}}">تیکت</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('getPluginService')}}">ارتباط با اعضا</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle deactive" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        پست و مقاله
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('getIndexContentCreate')}}"> پست های صفحه اول</a>
                        <a class="dropdown-item" href="{{route('getAppService')}}">حذف یا ویرایش پست های صفحه اول</a>
                        <a class="dropdown-item" href="{{route('getReadySiteService')}}">مدیریت  تمام پست ها</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('getPluginService')}}">حذف یا ویرایش پست ها</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle deactive" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        تنظیمات
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('getSiteService')}}">تنظیمات عمومی</a>
                        <a class="dropdown-item" href="#">تنظیمات مربوط به محصول</a>
                        <a class="dropdown-item" href="{{route('getReadySiteService')}}">تنظیمات پست ها</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('getPluginService')}}">مدیریت فایل ها</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('getAdminIndex')}}" >پنل اصلی ادمین</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('getIndex')}}" >صفحه اصلی</a>
                </li>
            </ul>
        </div>
    </nav>
</div>