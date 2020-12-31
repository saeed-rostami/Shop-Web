{{--loginFail--}}
@if($errors->any())
    @foreach($errors->all() as $error)
        <input type="hidden" id="errorInput" data-value="{{$error}}">
    @endforeach
@endif

{{--success--}}
@if(session("success"))
    <input type="hidden" id="hdnInput" data-value="{{session("success")}}">
@endif



@if(session("emptyBasket"))
    <input type="hidden" id="emptyBasket" data-value='{
     "title" : "{{session("emptyBasket.title")}}" ,
    "message" :  "{{session("emptyBasket.message")}}",
    "button" :  "{{session("emptyBasket.button")}}"
    }'>
@endif


@if(session("cardExist"))
    <input type="hidden" id="cardExist" data-value='{
     "title" : "{{session("cardExist.title")}}" ,
    "message" :  "{{session("cardExist.message")}}",
    "button" :  "{{session("cardExist.button")}}"
    }'>
@endif


@if(session("successBuy"))
    <input type="hidden" id="successBuy" data-value='{
     "title" : "{{session("successBuy.title")}}" ,
    "message" :  "{{session("successBuy.message")}}",
    "button" :  "{{session("successBuy.button")}}"
    }'>
@endif



@if(session("fail"))
    <input type="hidden" id="fail" data-value='{
     "title" : "{{session('fail.title')}}" ,
    "message" :  "{{session('fail.message')}}",
    "button" :  "{{session('fail.button')}}"
    }'>
@endif
