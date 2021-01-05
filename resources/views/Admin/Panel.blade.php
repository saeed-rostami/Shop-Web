@extends('Admin.Layouts.Parent')

@section('AdminContent')
    <div class="app-content content">

        <div class="content-wrapper">
            <div class="content-body">
                <div class="row">
                    {{--orders--}}
                    <div class="col-12 col-md-6 mb-3">
                        <div class="box bg-danger d-flex flex-column align-items-center justify-content-center"
                             style="width:
                        100%; min-height: 200px">
                            <h3>تعداد سفارشات</h3>
                            <ion-icon name="cart"></ion-icon>
                           <div>
                               <h1>{{\App\Http\Helpers\toPersianNum(count($orders))}}</h1>
                           </div>
                        </div>
                    </div>

                    {{--users--}}
                    <div class="col-12 col-md-6 mb-3">
                        <div class="box bg-info d-flex flex-column align-items-center justify-content-center"
                             style="width:
                        100%; min-height: 200px">
                            <h3>کاربران ثبت شده</h3>
                            <ion-icon name="person"></ion-icon>
                           <div>
                               <h1>{{\App\Http\Helpers\toPersianNum($users)}}</h1>
                           </div>
                        </div>
                    </div>

                    {{--products--}}
                    <div class="col-12 col-md-6 mb-3">
                        <div class="box bg-warning d-flex flex-column align-items-center justify-content-center"
                             style="width:
                        100%; min-height: 200px">
                            <h3>تعداد محصولات</h3>
                            <ion-icon name="albums"></ion-icon>
                           <div>
                               <h1>{{\App\Http\Helpers\toPersianNum($products)}}</h1>
                           </div>
                        </div>
                    </div>

                    {{--customers--}}
                    <div class="col-12 col-md-6 mb-3">
                        <div class="box bg-success d-flex flex-column align-items-center justify-content-center"
                             style="width:
                        100%; min-height: 200px">
                            <h3>تعداد مشتریان</h3>
                            <ion-icon name="person-add"></ion-icon>
                           <div>
                               <h1>{{\App\Http\Helpers\toPersianNum($customers)}}</h1>
                           </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    ion-icon {
        --ionicon-stroke-width: 16px;
        color: black;
        font-size: 85px;
    }
</style>
