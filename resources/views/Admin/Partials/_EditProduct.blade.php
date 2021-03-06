@extends('Admin.Layouts.Parent')

@section('AdminContent')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">
                <div class="container">
                    <form class="form" action="{{route('Update-Product' , $product->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        {{--title--}}
                        <div class="form-group">
                            <label for="title">
                                تیتر
                            </label>
                            <input type="text" value="{{$product->title}}" name="title" class="form-control">
                        </div>

                        {{--description--}}
                        <div class="form-group">
                            <label for="description">
                                توضیحات
                            </label>
                            <input type="text" class="form-control" name="description"
                                   value="{{$product->description}}" autocomplete="description"
                                   autofocus
                                   placeholder="توضیحات">
                        </div>

                        {{--extra-description--}}

                        <div class="form-group">
                            <label for="extra_description">
                                توضیحات اضافه محصول(ختیاری)
                            </label>
                            <input type="text" class="form-control" name="extra_description"
                                   value="{{$product->extra_description}}" autocomplete="extra_description"
                                   autofocus
                                   placeholder="توضیحات اضافه محصول">
                        </div>

                        {{--trainer--}}
                        <div class="form-group">
                            <label for="trainer_id">
                                تمرین دهنده
                            </label>
                            <select name="trainer_id" class="form-control">
                                <option value="{{$product->trainer->id}}">{{$product->trainer->name}}</option>
                                @foreach($trainers as $trainer)
                                    <option value="{{$trainer->id}}">{{$trainer->name}}</option>
                                @endforeach

                            </select>

                        </div>

                        {{--year--}}
                        <div class="form-group">
                            <label for="year">
                                سال انتشار
                            </label>
                            <input type="text" value="{{$product->year}}" name="year" class="form-control">
                        </div>

                        {{--price--}}
                        <div class="form-group">
                            <label for="price">
                                قیمت
                            </label>
                            <input type="text" value="{{\App\Http\Helpers\price($product->price)}}" name="price" class="form-control">
                        </div>

                        {{--off--}}
                        <label for="off">
                            تخفیف
                        </label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="off"
                                   value="{{$product->off}}"
                                   placeholder="تخفیف">
                        </div>

                        {{--duration--}}
                        <label for="duration">
                            مدت زمان آموزش
                        </label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="duration"
                                   value="{{ $product->duration }}"
                                   placeholder=" مدت زمان آموزش">
                        </div>

                        {{--post--}}
                        <div class="form-group">
                            <label for="post_id">
                                رشته ورزشی
                            </label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option
 {{($category->id == $product->category->id) ? 'selected' : ''}}
 value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach

                            </select>

                        </div>

                        {{--tags--}}
                        <div class="form-group">
                            <label for="tags">
                                برچسب ها
                            </label>
                            <select name="tags[]" class="form-control js-example-basic-multiple"
                                    multiple="multiple">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach

                            </select>

                        </div>

                        {{--image--}}
                        <div class="form-group">
                            <label for="image">
                                تصاویر
                            </label>
                            <input type="file" name="image[]" class="form-control-file" multiple>
                        </div>


                        {{--demo--}}
                        <label for="demo" class="text-primary">
                            دمو محصول
                        </label>
                        <div class="form-group">
                            <input type="file" class="form-control" name="demo"
                                   formenctype="multipart/form-data"
                                   placeholder="دمو محصول">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2().val({!! json_encode($product->tags->pluck('id')) !!}).trigger('change')
    });
</script>

