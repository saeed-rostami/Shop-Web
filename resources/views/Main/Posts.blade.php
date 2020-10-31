@extends('Layouts.Parent')

@section('Title')
    آموزش های
    {{$posts[0]['category']['title']}}
@endsection

@section('Content')

    <div class="container">
        @includeIf('Partials._breadcrumb')
        <h2 class="product-count text-white-50 badge badge-pill">تعداد رشته های ورزشی موجود : {{$counts}}
        </h2>

        <div class="row mb-2">
            <div class="choose-field col d-flex flex-wrap text-uppercase justify-content-center shadow">
                <h3 class="font-weight-bold align-self-center mx-1 text-light text-dynamic">
                    رشته ورزشی خود را انتخاب کنید </h3>
            </div>
        </div>
        <div>
            @include('Partials._pagination')
        </div>
    </div>
@endsection
