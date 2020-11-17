<div id="AddProduct" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header text-white">
                <button type="button" class="close" data-dismiss="modal"><i><span class="fa
                    fa-close"></span></i></button>
                <h4 class="modal-title">وارد کردن محصول جدید</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{ route('storeProduct') }}" class="login-form"
                                  enctype="multipart/form-data">
                                @csrf

                                {{--title--}}
                                <div class="form-group row">
                                    <input type="text" class="form-control input" name="title"
                                           value="{{ old('title') }}" autocomplete="title" autofocus
                                           placeholder="تیتر محصول">
                                </div>

                                {{--description--}}
                                <div class="form-group row">
                                    <textarea type="text" class="form-control input" name="description"
                                              value="{{ old('description') }}" autocomplete="description" autofocus
                                              placeholder="توضیحات محصول"></textarea>
                                </div>

                                {{--extra-description--}}
                                <div class="form-group row">
                                    <textarea type="text" class="form-control input" name="extra_description"
                                              value="{{ old('extra_description') }}" autocomplete="extra_description"
                                              autofocus
                                              placeholder="(توضیحات اضافه محصول(اختیاری"></textarea>
                                </div>

                                {{--trainer--}}
                                <div class="form-group row">
                                    <label for="trainer_id" class="text-primary">
                                      تمرین دهنده
                                    </label>
                                    <select name="trainer_id" class="form-control">
                                        <option>#</option>
                                        @foreach($trainers as $trainer)
                                            <option value="{{$trainer->id}}">{{$trainer->name}}</option>
                                        @endforeach

                                    </select>

                                </div>


                                {{--year--}}
                                <div class="form-group row">
                                    <input type="text" class="form-control input" name="year"
                                           value="{{ old('year') }}" autocomplete="year" autofocus
                                           placeholder="سال انتشار">
                                </div>

                                {{--price--}}
                                <div class="form-group row">
                                    <input type="text" class="form-control input" name="price"
                                           value="{{ old('price') }}" autocomplete="price" autofocus
                                           placeholder="قیمت">
                                </div>

                                {{--off--}}
                                <div class="form-group row">
                                    <input type="text" class="form-control input" name="off"
                                           value="{{ old('off') }}" autocomplete="off" autofocus
                                           placeholder="(تخفیف(اختیاری">
                                </div>

                                {{--duration--}}
                                <div class="form-group row">
                                    <input type="time" class="form-control input" name="duration"
                                           value="{{ old('duration') }}" autocomplete="duration" autofocus
                                           placeholder="(مدت آموزش(اختیاری">
                                </div>


                                {{-- رشته ورزشی--}}
                                <div class="form-group row">
                                    <label for="post_id" class="text-primary">
                                        رشته ورزشی
                                    </label>
                                    <select name="post_id" class="form-control">
                                        <option>#</option>
                                        @foreach($posts as $post)
                                            <option value="{{$post->id}}">{{$post->title}}</option>
                                        @endforeach

                                    </select>

                                </div>

                                {{--tags--}}
                                <div class="form-group row">
                                    <label for="tags[]" class="text-primary">
                                        برچسب ها
                                    </label>
                                    <select name="tags[]" class="form-control js-example-basic-multiple"
                                            multiple="multiple">
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach

                                    </select>

                                </div>


                                <div class="form-group row">
                                    <input type="file" class="form-control" name="image[]" multiple
                                           placeholder="تصویر کتگوری">
                                </div>


                                <div class="form-group d-flex justify-content-center">
                                    <button type="submit" class="login-submit btn btn-sm btn-dark">
                                        {{ __('ثبت') }}
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


