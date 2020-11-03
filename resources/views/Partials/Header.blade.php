<div id="headerDefault">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark col-12" style="padding-bottom:30px;">
         <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " href="{{route('getAbout')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        درباره ما
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('getConnection')}}">تماس با ما</a>
                        <a class="dropdown-item" href="{{route('getAbout')}}">سابقه ، تخصص و پروژه های در دست اجرا</a>

                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('getPrice')}}">تعرفه و امکانات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('getCustomerService')}}">پشتیبانی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('getJob')}}">استخدام و همکاری</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="{{route('getPosts')}}">مقالات</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle deactive" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        خدمات
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('getSiteService')}}">سفارش سایت</a>
                        <a class="dropdown-item" href="{{route('getAppService')}}">سفارش اپلیکیشن</a>
                        <a class="dropdown-item" href="{{route('getReadySiteService')}}">خرید سایت آماده</a>
                        <a class="dropdown-item" href="{{route('getTemplateService')}}">خرید قالب سایت آماده</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('getPluginService')}}">خرید پلاگین های تخصصی</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('getIndex')}}" >صفحه اصلی</a>
                </li>
            </ul>

        </div>

    </nav>
    <form class="form-inline">
        <input class="form-control mr-sm-2" id="search" type="search" placeholder="جستجو" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">جستجو</button>
    </form>
</div>
<!--HEADER DEFAULT MOBILE-->

<div id="headerMobile">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <button class="navbar-toggler" id="navMobilePrimaryButton" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand"  style="font-family:dragz;font-size:20px;">F-Team</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('getIndex')}}" >صفحه اصلی</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle deactive" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        خدمات
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('getSiteService')}}">سفارش سایت</a>
                        <a class="dropdown-item" href="{{route('getAppService')}}">سفارش اپلیکیشن</a>
                        <a class="dropdown-item" href="{{route('getReadySiteService')}}">خرید سایت آماده</a>
                        <a class="dropdown-item" href="{{route('getTemplateService')}}">خرید قالب سایت آماده</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('getPluginService')}}">خرید پلاگین های تخصصی</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('getPosts')}}">مقالات</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="{{route('getPrice')}}">تعرفه و امکانات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('getJob')}}">استخدام و همکاری</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('getCustomerService')}}">پشتیبانی</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        درباره ما
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('getConnection')}}">تماس با ما</a>
                        <a class="dropdown-item" href="{{route('getAbout')}}">سابقه ، تخصص و پروژه های در دست اجرا</a>
                    </div>
                </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
</nav>
</div>





