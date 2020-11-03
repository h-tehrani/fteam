@extends('Layouts.master')
@section('content')

    @if(Session::has('errorSearch'))
        <div class="alert alert-success" role="alert">
            {{Session::get('welcomePanel')}}
        </div>
    @endif
    @if(Session::has('successBuyOrder'))
        <div class="alert alert-success" role="alert">
            {{Session::get('successBuyOrder')}}
        </div>
    @endif
    @if(Session::has('OrderDelete'))
        <div class="alert alert-success" role="alert">
            {{Session::get('OrderDelete')}}
        </div>
    @endif
    <div class="timeDate" >
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
               <br>
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
    </div>
    <div class="card" id="BuyBasket">
        <button class="badge-danger" style="margin-left:auto;margin-right:auto;display:table;"><img src="Files/Pic/basketBuy.png" style="width:10%;height:10%;">سبد خرید</button>
        <p style="direction:rtl;margin:5%;font-size:20px;font-weight:800;">
            محصولات انتخابی شما :
        </p>
       {{-- <?php if($order){?>
            <div class="productsDetail" id="productsdetail2">
            <div class="col-12">
                <table style="display:table;margin-right:auto;margin-left:auto;">
                    <tr>
                        <th>وضعیت پرداخت</th>
                        <th>حذف از سبد خرید</th>
                        <th>قیمت کالا با احتساب تخفیف</th>
                        <th>درصد تخفیف کالا</th>
                        <th>قیمت کالا</th>
                        <th>نوع کالا</th>
                        <th>کد کالا</th>
                        <th>نام کالا</th>
                    </tr>
                    @foreach($order as $orderItem)
                    <tr>
                        <td><?php
                            if($orderItem->orderPaid==0){echo "<p style='background-color:red;'> پرداخت نشده </p>";
                            }
                            else{
                                echo "<p style='background-color:green;'> پرداخت شده </p>";
                            }
                            ?></td>
                        <td> <a href="{{route('panelOrderDelete' , ['id'=> $orderItem->id] )}}">حذف </a></td>
                        <td>{{$orderItem->id}}</td>
                        <td>{{$orderItem->productName}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="productsDetail " id="productsdetail2">
            <table class="btn" style="margin-top:5%;margin-left:auto;margin-right:auto;display:table;">
                <tr>
                    <th>تعداد کل</th>
                    <th>مجموع قیمت</th>
                    <th>مجموع قیمت بعد از اعمال تخفیف</th>
                    <th>اعتبار</th>
                    <th>مبلغ کل پرداختی</th>
                </tr>
                <tr>
                    <td id="orderCount">{{ count($order) }}</td>
                    <td id="totalPrice"><?php echo $orderPrice?></td>
                    <td><?php echo $orderOffPrice?></td>
                    <td>-</td>
                    <td><?php echo $orderOffPrice?></td>
                </tr>
            </table>
        </div>
        <form action="">
            <label for=""></label>
            <input type="hidden">
            <label for=""></label>
            <input type="hidden">
            <label for=""></label>
            <input type="hidden">
            <label for=""></label>
            <input type="hidden">
            <button type="submit" class="badge btn-outline-danger" style="margin-right:auto;font-size:20px;margin-left:auto;display:table;">پرداخت آنلاین بانک ملت</button>
        </form>
        <?php } ?>--}}
    </div>

@endsection


