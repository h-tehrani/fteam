@extends('Layouts.adminMaster')
@section('content')

    <script>
        $(document).ready(function(){
            $('#btnX').click(function(){$('#content').val( $('.contentOfContent').html())
            });
            $('#dropCode1').click(function(){
                var SelText = '';
                if (window.getSelection) {
                    SelText = window.getSelection().toString();
                } else if (document.getSelection) {
                    SelText = document.getSelection().toString();
                } else if (document.selection) {
                    SelText = document.selection.createRange().text.toString();
                }
                var link2 = $('#dropCodeColor').val();
                var link3 = $('#dropCodeSize').val()+'px';
                var BTfont =$('#dropCodeBold:checked').val();
                var BTfont2 =$('#dropCodeThin:checked').val();
                var ItalicFont=$('#dropCodeItalic:checked').val();
                if(ItalicFont){
                    var link5 = 'italic';
                }
                else {
                    var link5 = 'none';
                }

                if(BTfont){
                    var link4 = $('#dropCodeBold').val();
                }
                else if (BTfont2){
                    var link4 = $('#dropCodeThin').val();
                }
                var link1 ='<text id="textPrimary" style="color:'+link2+';font-size:'+link3+';font-weight:'+link4+';font-style:'+link5+'">'+SelText+'</text>';
                var firstText = $('.contentOfContent').html();
                var finalText= firstText.replace(SelText,link1);
                $('#contentOfContent').html(finalText);
            });
        });
    </script>


    <form action="{{ route('postIndexContentCreate') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="author"></label>
            <input name="author" class="form-control" id="author" placeholder="نویسنده" required style="text-align:right;width: 33%;float:right;min-width: 180px;">
        </div>
        <div class="form-group">
            <label for="title"></label>
            <input name="title" class="form-control" id="title" placeholder="عنوان پست" required style="text-align:right;" value="">
        </div>
        <div class="editButtonsAdminCreate">
            <label for="dropCodeSize">سایز فونت </label>
            <input class="btn btn-outline-warning" id="dropCodeSize" type="number" min="2" max="100" step="1" value="10"  style="margin-right:4%;">
            <label for="dropCodeColor">رنگ فونت </label>
            <input class="btn btn-outline-warning" name="dropCodeColor" id="dropCodeColor" type="color" style="margin-right:4%;">
            <input class="btn-outline-warning" name="dropCodeBT" id="dropCodeBold" type="radio" style="margin-top:10px;" value="800">
            <label for="dropCodeBold" style="font-weight:800;direction:rtl;">  فونت BOLD </label>
            <input class="btn-outline-warning" name="dropCodeBT" id="dropCodeThin" type="radio" style="margin-top:10px;margin-left:10px;" value="100">
            <label for="dropCodeThin" style="direction:rtl;">  فونت THIN </label>
            <input class="btn-outline-warning" name="dropCodeItalic" id="dropCodeItalic" type="checkbox" style="margin-top:10px;margin-left:10px;">
            <label for="dropCodeItalic" style="direction:rtl;font-style:italic">  فونت Italic </label>
            <br>
            <button class="btn btn-outline-warning" id="dropCode1"  type="button">اعمال تغییرات</button>
        </div>
        <div class="form-group">
            <div class="contentOfContent" id="contentOfContent" style="background-color:antiquewhite;width:100%;height:200px;direction:rtl;margin-top:5%;" contenteditable="true">
            </div>
            <label for="content"></label>
            <input type="hidden"  name="content" class="form-control" id="content"  placeholder="محتوای پست" style="text-align:right;direction:rtl;">
        </div>
        <div class="form-group">
            <label for="price"></label>
            <input name="price" class="form-control" id="price" placeholder="مبلغ" required  style="text-align:right;width: 33%;float:right;min-width: 180px;">
        </div>

        <div class="form-group card col-12" style="direction:rtl;text-align:right;">
            <label for="picURL" style="direction:rtl;color:black">عکس محصول حداکثر  <br>یک مگابایات</label>
            <input name="picURL" type="file" class="form-control-file" id="picURL" style="direction:rtl;margin-left:70%;">
            @error('file')
            <span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
            @enderror
        </div>

        {{ csrf_field() }}

        <button id="btnX" type="submit" class="btn btn-danger" >ارسال</button>
    </form>




@endsection

