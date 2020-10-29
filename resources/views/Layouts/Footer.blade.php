<footer class="footer pt-3 shadow">
    <div class="container mb-0">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 d-flex flex-column justify-content-center align-items-center mb-sm-2">
                <h1>درباره ما</h1>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorum iure nostrum
                    veniam.
                    Accusamus amet eveniet exercitationem expedita id itaque laborum, minima numquam placeat quam quia recusandae suscipit ullam, voluptatem?</p>
            </div>

            <div class="col-12 col-md-6 col-lg-3 mb-sm-3">
               <div class="d-flex flex-column justify-content-center align-items-center">
                   <h1>آموزش ها</h1>
                   @foreach($cats as $cat)
                   <a class="footer-txt text-muted" href="{{route('Category' , $cat->title)}}">{{$cat->title}}</a>
                   @endforeach
               </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3 mt-sm-2">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{asset('images/logo.jpg')}}" alt="" class="rounded-circle" style="width: 60px; height: 60px">
                </div>
                <hr class="bg-light">
                <div class="d-flex justify-content-center align-items-center">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
