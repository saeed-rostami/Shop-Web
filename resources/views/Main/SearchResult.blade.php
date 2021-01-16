@extends('Layouts.Parent')

@section('Content')
    <div class="container">
        <div class="row">
            <div>
                <span class="text-white">تعداد محصول پیدا شده : {{$products->count()}}</span>

                @foreach($products as $product)

                    <a href="{{route('Product', [$product->post->category->title, $product->post->title,  $product->slug])}}">
                        <h1 class="text-white">
                            {{$product->title}}
                        </h1>
                    </a>
                @endforeach

            </div>
        </div>

    </div>
@endsection
