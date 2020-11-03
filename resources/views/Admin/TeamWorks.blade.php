@extends('Layouts.adminMaster')
@section('content')
    @if(Session::has('JobDelete'))
        <div class="alert alert-success" role="alert">
            {{Session::get('JobDelete')}}
        </div>
    @endif
    @if(Session::has('errorSearch'))
        <div class="alert alert-success" role="alert">
            {{Session::get('errorSearch')}}
        </div>
    @endif
    @if(Session::has('JOBSDelete'))
        <div class="alert alert-success" role="alert">
            {{Session::get('JOBSDelete')}}
        </div>
    @endif
    <form class="form-outline" action="{{route('searchJob')}}" method="get" >
        <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="جستجو" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">جستجو</button>
    </form>
    <?php if($JobsNumber ?? ''){ ?>

    <div class="alert alert-success" role="alert" style="direction:rtl;">
        شماره تماس:
        <div class="card">
            <div class="productsDetail">
                <table>
                    <tr>
                        <th>کد (آی دی) درخواست</th>
                        <th>نام و نام خانوادگی</th>
                        <th>شماره همراه</th>
                        <th>حذف درخواست</th>
                    </tr>
                    @foreach($jobs as $job)
                        <tr class="tdJob">
                            <td class="btn-outline-success tdJob">{{$job->id}}</td>
                            <td class="btn-outline-success tdJob">{{$job->fullName}}</td>
                            <td class="btn-outline-success tdJob">{{$job->phone}}</td>
                            <td class="btn-outline-light">
                                <a class="btn-outline-danger" href="{{ route('getJobDelete' , ['id' =>$job->id]) }}">حذف </a>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php if($Job ?? ''){ ?>
         <div class="alert alert-success" role="alert" style="direction:rtl;">
            نتایج جستجو:
         <div class="card">
            <div class="productsDetail">
                <table>
                    <tr>
                        <th>کد (آی دی) درخواست</th>
                        <th>نام و نام خانوادگی</th>
                        <th>ایمیل</th>
                        <th>شماره همراه</th>
                        <th>تخصص</th>
                        <th>سطح توانایی</th>
                        <th>توضیحات</th>
                        <th>شرح توانایی</th>
                        <th>حذف درخواست</th>
                    </tr>
                    @foreach($Jobs as $Job)
                        <tr class="tdJob">
                            <td class="btn-outline-success tdJob">{{$Job->id}}</td>
                            <td class="btn-outline-success tdJob">{{$Job->fullName}}</td>
                            <td class="btn-outline-success tdJob">{{$Job->email}}</td>
                            <td class="btn-outline-success tdJob">{{$Job->phone}}</td>
                            <td class="btn-outline-success tdJob">{{$Job->ability}}</td>
                            <td class="btn-outline-success tdJob">{{$Job->abilityLevel}}</td>
                            <td class="btn-outline-success tdJob">{{$Job->description}}</td>
                            <td class="btn-outline-success tdJob">{{$Job->descriptionAbility}}</td>
                            <td class="btn-outline-light">
                                <a class="btn-outline-danger" href="{{ route('getJobDelete' , ['id' =>$Job->id]) }}">حذف </a>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>

    <?php } ?>
    <div class="card" style="margin-top:2%">
        <div class="productsDetail">
            <table>
                <tr>
                    <th>کد (آی دی) درخواست</th>
                    <th>نام و نام خانوادگی</th>
                    <th>ایمیل</th>
                    <th>شماره همراه</th>
                    <th>تخصص</th>
                    <th>سطح توانایی</th>
                    <th>توضیحات</th>
                    <th>شرح توانایی</th>
                    <th>حذف درخواست</th>
                </tr>
                @foreach($jobs as $job)
                    <tr class="tdJob">
                        <td class="btn-outline-success tdJob">{{$job->id}}</td>
                        <td class="btn-outline-success tdJob">{{$job->fullName}}</td>
                        <td class="btn-outline-success tdJob">{{$job->email}}</td>
                        <td class="btn-outline-success tdJob">{{$job->phone}}</td>
                        <td class="btn-outline-success tdJob">{{$job->ability}}</td>
                        <td class="btn-outline-success tdJob">{{$job->abilityLevel}}</td>
                        <td class="btn-outline-success tdJob">{{$job->description}}</td>
                        <td class="btn-outline-success tdJob">{{$job->descriptionAbility}}</td>
                        <td class="btn-outline-light">
                            <a class="btn-outline-danger" href="{{ route('getJobDelete' , ['id' =>$job->id]) }}">حذف </a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection

