@extends('Layouts.masterHomePage')
@section('content')
    @if(Session::has('ticketInfo'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('ticketInfo')}}
        </div>

    @endif
    <div class="mainCustomer">

        <form action="{{route('postTicket')}}" method="post">
            <div class="form-group">
                <label for="email" style="background-color:white;">ایمیل</label>
                <input name="email" type="email" class="form-control" id="customerEmail" placeholder="name@example.com" value="@auth{{Auth::user()->email}}@endauth">
            </div>
            <div class="form-group">
                <label for="ticketTitle" style="background-color:white;">لطفا عنوان تیکت خود را مشخص کنید</label>
                <select name="ticketTitle" class="form-control" id="ticketTitle" style="text-align: right;">
                    <option>سفارش سایت</option>
                    <option>سایت آماده</option>
                    <option>قالب آماده</option>
                    <option> سفارش اپلیکیشن</option>
                    <option>پلاگین ها</option>
                    <option>متفرقه</option>

                </select>
            </div>

            <div class="form-group">
                <label for="ticketContent" style="background-color:white;">متن درخواست خود را بنویسید</label>
                <textarea name="ticketContent" class="form-control" id="ticketContent" rows="5" style="text-align: right; direction: rtl;"></textarea>
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn-outline-danger">
                ارسال
            </button>
        </form>
    </div>
@endsection


