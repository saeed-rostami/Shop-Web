@extends('Admin.Layouts.Parent')

@section('AdminContent')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">
                <div class="container">
                    <form class="form" action="{{route('Update-User' , $user->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        {{--name--}}
                        <div class="form-group">
                            <label for="name">
                                نام کاربر
                            </label>
                            <input type="text" value="{{$user->name}}" name="name" class="form-control">
                        </div>

                        {{--family--}}
                        <div class="form-group">
                            <label for="family">
                                نام خانوادگی کاربر
                            </label>
                            <input type="text" value="{{$user->family}}" name="family" class="form-control">
                        </div>

                        {{--email--}}
                        <div class="form-group">
                            <label for="email">
                                پست الکترونیکی کاربر
                            </label>
                            <input type="text" value="{{$user->email}}" name="email" class="form-control">
                        </div>

                        {{--email--}}
                        <div class="form-group">
                            <label for="email_verified_at" >
                                <select name="email_verified_at" class="form-control">
                                    <option value="{{$user->email_verified_at}}">تایید شده</option>
                                    <option value="{{$user->email_verified_at === null}}">تایید نشده</option>
                                </select>
                            </label>
                        </div>


                        {{--phone--}}
                        <div class="form-group">
                            <label for="phone">
                                شماره همراه کاربر
                            </label>
                            <input type="text" value="{{$user->phone}}" name="phone" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-block btn-info" type="submit">ثبت تغییرات</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
