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

                                <div class="form-group row">
                                    <input type="text" class="form-control input" name="title"
                                           value="{{ old('title') }}" autocomplete="title" autofocus
                                           placeholder="تیتر محصول">
                                </div>

                                <div class="form-group row">
                                    <textarea type="text" class="form-control input" name="description"
                                              value="{{ old('description') }}" autocomplete="description" autofocus
                                              placeholder="توضیحات محصول"></textarea>
                                </div>

                                <div class="form-group row">
                                    <input type="text" class="form-control input" name="coach"
                                           value="{{ old('coach') }}" autocomplete="coach" autofocus
                                           placeholder="آموزش دهنده یا تولید کننده">
                                </div>


                                <div class="form-group row">
                                    <input type="text" class="form-control input" name="year"
                                           value="{{ old('year') }}" autocomplete="year" autofocus
                                           placeholder="سال انتشار">
                                </div>

                                <div class="form-group row">
                                    <input type="text" class="form-control input" name="price"
                                           value="{{ old('price') }}" autocomplete="price" autofocus
                                           placeholder="قیمت">
                                </div>

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


