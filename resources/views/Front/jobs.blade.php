@extends('Layouts.masterHomePage')
@section('content')
    <div class="justify-content-center">

        <div class="sessionMessages">
            @if(Session::has('jobInfo'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('jobInfo')}}
                </div>

            @endif
        </div>

    <div class="mainJobs">
    <form action="{{route('postJobsRequest')}}" method="post">
        <div class="form-group">
            <label  for="emailJobs"  style="color:white">ایمیل</label>
            <input name="email" type="email" class="form-control" id="emailJobs" placeholder="name@example.com" value="@auth{{ Auth::user()->email }}@endauth" required>
        </div>
        <div class="form-group">
            <label  for="fullName"  style="color:white">نام و نام خانوادگی</label>
            <input name="fullName" type="text" class="form-control" id="fullName" style="text-align:right;" placeholder="به فارسی " value="@auth{{ Auth::user()->name }} {{ Auth::user()->family }}@endauth" required>
        </div>
        <div class="form-group">
            <label  for="phone"  style="color:white">شماره همراه</label>
            <input name="phone" type="tel" class="form-control" id="phone" style="text-align:right;" placeholder="+989*********" value="@auth{{ Auth::user()->phone }}@endauth" required>
        </div>
        <div class="form-group">
            <label for="abilityLevel"  style="color:white">سطح توانایی</label>
            <select name="abilityLevel" class="form-control" id="abilityLevel" style="text-align: right" required>
                <option>کارآموز</option>
                <option>نیمه حرفه ای</option>
                <option>حرفه ای</option>
                <option>استاد کار</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ability" style="color:white" >زمینه کاری
            </label>
            <select name="ability" multiple class="form-control" id="ability" required>

                <option>Front-End</option>
                <option>Back-End</option>
                <option>Full-Stack</option>
                <option>S.E.O</option>
                <option>تولید محتوا</option>
                <option>بازاریاب</option>
                <option>DataBases</option>
                <option>Android</option>
            </select>
        </div>
        <div class="form-group">
            <label for="descriptionAbility" style="color:white" >عناوین تخصص های شما</label>
            <textarea name="descriptionAbility" class="form-control" id="descriptionAbility" rows="3" placeholder="مثلا بوت استرپ ، جاوا اسکریپت و ...." style="direction: rtl;"></textarea>
        </div>
        <div class="form-group">
            <label for="description" style="color:white">توضیحات </label>
            <textarea name="description" class="form-control" id="description" rows="3" placeholder="سن ، محل سکونت ، تایم خالی در روز ، رزومه..." style="direction: rtl;"></textarea>
        </div>

        {{ csrf_field() }}

        <button type="submit" class="btn-danger">
                                ارسال
        </button>
    </form>
</div>
</div>
@endsection


