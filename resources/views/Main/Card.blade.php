
@extends('Layouts.Parent')

@section('Content')
    @includeIf('Partials._messages')
    @if(Cart::count() > 0)

        <div class="container">
            <div class="row py-5 bg-white rounded shadow-sm">
                <div class="col-lg-6">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="rounded">
                            <tr>
                                <th scope="col" class="border-0 bg-light ">
                                    <div class="py-2 text-uppercase">حذف</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">قیمت محصول</div>
                                </th>
                                <th class="border-0 bg-light">
                                    <div class="p-2 px-3 text-uppercase">نام محصول</div>
                                </th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach(Cart::content() as $item)
                                <tr>
                                    <td class="border-0 align-middle">

                                        <form action="{{route('remove' , $item->rowId)}}" method="post">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="text-dark border-0 trash-btn">

                                                <img src="{{asset('images/full-trash.png')}}" alt="">
                                            </button>
                                        </form>

                                    </td>
                                    <td class="border-0 align-middle"><strong>{{$item->price}}</strong></td>

                                    <th scope="row" class="border-0">
                                        <div class="p-2">

                                            <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0"><a href="{{route('Product' ,
                                                    [$item->options->catTitle, $item->options->postTitle,
                                                    $item->options->slug])}}"
                                                                    class="text-dark d-inline-block
                                                                    align-middle">{{Str::limit($item->name ,'25')
                    }}</a></h5><span
                                                    class="text-muted font-weight-normal font-italic
                                                    d-block">More Information</span>
                                            </div>
                                            <img
                                                src="{{asset('images/Products/'.json_decode
                                                    ($item->options->image))}}"
                                                alt="" width="70" class="img-fluid rounded shadow-sm">
                                            <hr>

                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-start">

                            <form action="{{route('removeAll')}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-secondary">
                                    <img src="{{asset('images/full-trash2.png')}}" alt="">

                                    حذف
                                    همه
                                    محصولات

                                </button>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">فرآیند پرداخت</div>
                    <div class="p-4">
                        <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you
                            have entered.</p>
                        <ul class="list-unstyled mb-4">

                            <li class="d-flex justify-content-between py-3 border-bottom">

                                <h5 class="font-weight-bold">{{Cart::tax()}}</h5>

                                <strong class="text-muted">مالیات</strong>

                            <li class="d-flex justify-content-between py-3 border-bottom">

                                <h5 class="font-weight-bold">{{Cart::total()}}</h5>
                                <strong class="text-muted">قیمت کل</strong>

                            </li>
                        </ul>
                     <form action="{{route('buy')}}" method="post">
                         @csrf
                         <button type="submit" class="btn btn-dark rounded-pill py-2 btn-block">پرداخت نهایی</button>
                     </form>
                    </div>
                </div>


            </div>
            @else
                @include('Errors.EmptyBasket')
            @endif
        </div>

@stop

