@extends('Layouts.Parent')

@section('Content')
 <div class="col-12 col-md-8 justify-content-center black-bg rounded">
     <form action="{{route('Store-Profile')}}" method="post">
         @csrf
         @method('PUT')
         <div class="form-group text-muted">
             <label for="name">
                 نام <img style="width: 40px; height: 40px" src="{{asset('images/test-account.png')}}" alt="">
             </label>
             <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
         </div>

         <div class="form-group text-muted">
             <label for="family">
                 نام خانوادگی <img style="width: 40px; height: 40px" src="{{asset('images/family.png')}}" alt="">
             </label>
             <input type="text" class="form-control" id="family" name="family" value="{{$user->family}}">
         </div>

         <div class="form-group text-muted">
             <label for="phone">
                 شماره همراه <img style="width: 40px; height: 40px" src="{{asset('images/phone.png')}}" alt="">
             </label>
             <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
         </div>
         <button type="submit" class="btn custom-btn">ثبت</button>
     </form>
 </div>
@endsection
