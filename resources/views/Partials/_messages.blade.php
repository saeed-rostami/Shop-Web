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



{{--card--}}
@if(session("CardSuccess"))
    <input type="hidden" id="CardSuccess" data-value="{{session("CardSuccess")}}">
@endif

@if(session("cardExist"))
    <input type="hidden" id="cardExist" data-value="{{session("cardExist")}}">
@endif
