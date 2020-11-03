@extends('Layouts.masterHomePage')
@section('content')
    @if(Session::has('rateUsInfo'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('rateUsInfo')}}
        </div>

    @endif
<div class="infoOfUs">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h5 class="card-title" style="font-family:dragz;text-align:center;border-style:solid;">F.Team©</h5>
            <h6 class="card-subtitle mb-2">فرم تماس با ما</h6>
            <form action="{{route('postSurvey')}}" method="post">
                <div class="form-group">
                    <label for="contactUsForm" style="direction:rtl;">نظرات،انتقادات و پیشنهاد های خود را بنویسید.</label>
                    <textarea name="rateContent" class="form-control" id="contactUsForm" rows="3"></textarea>
                </div>
                {{ csrf_field() }}
                <button class="btn-outline-danger" type="submit">
                    ارسال
                </button>
            </form>
        </div>
    </div>
</div>

<div class="infoOfUs1">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h5 class="card-title" style="font-family:dragz;text-align:center;border-style:solid;">company</h5>
            <h6 class="card-subtitle mb-2" style="direction: rtl;">اطلاعات تماس:</h6>
           <p style="direction: rtl">
                     021-44469008    <br>           پاسخگویی از ساعت 8 تا 13 به غیر از روز های تعطیل

           </p>
            <p>
                جنت آباد جنوبی خیابان رازی شماره 134 پلاک 32 واحد 7
            </p>
            <p style="border-style:solid;"></p>
       <p>
           09121539485
           <br>
           مدیریت تیم حسین طهرانی
       </p>
        </div>
    </div>
</div>

@endsection


