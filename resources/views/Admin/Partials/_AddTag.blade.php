<div id="AddTag" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content bg-light">
            <div class="modal-header text-white">
                <button type="button" class="close" data-dismiss="modal"><i><span class="fa
                    fa-close"></span></i></button>
            </div>
            <div class="modal-body">
                {{--body--}}
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{ route('storeTag') }}" class="login-form" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">

                                    <input type="text" class="form-control input" name="name"
                                           value="{{ old('name') }}" autocomplete="name" autofocus
                                           placeholder="نام برچسب">
                                </div>



                                <div class="form-group d-flex justify-content-center">
                                    <button type="submit" class="btn btn-sm btn-dark login-submit">
                                        {{ __('ثبت') }}
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                {{--body--}}
            </div>
        </div>

    </div>
</div>
