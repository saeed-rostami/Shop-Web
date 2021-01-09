<section class="position-relative banner">
    <div class="container">
        <div class="row banner">
            {{--serach--}}
            <div class="col-12 col-sm-12 col-md-4">
                <div class="row search">
                    <div class="col-12">
                        <div class="container2">
                            <form action="{{route('Search')}}" method="GET">
                                <input name="query" id="query" type="text" placeholder="....جستجو"
                                    {{request()->input('query')}}
                                >
                                <div class="search"></div>
                            </form>
                        </div>
                    </div>
                </div>
                {{--serach--}}
            </div>

            {{--advertise--}}
            <div class="col-12 col-sm-12 col-md-8">
                <h4 class="text-dynamic" style="color: #72c5e4!important">کمیاب ترین و جدیدترین مجموعه های آموزشی را از
                    ما بخواهید</h4>
                <h4>مجموعه هایی از سایت های معتبر </h4>

                {{--<img class="d-none" id="bjjf" src="{{asset('images/ads/bjjfbanner2 - Copy.png')}}" alt="" >--}}
                {{--<img id="amazon" src="{{asset('images/ads/amazon.png')}}" alt="" >--}}


            </div>
        </div>
    </div>
</section>


<style>

</style>
