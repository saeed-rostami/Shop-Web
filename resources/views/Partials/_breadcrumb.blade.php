<div class="container">
    <div class="row">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb breadcrumb-arrow">
            <li><a href="{{route('Home')}}"> <img style="height: 40px;width: 40px" src="{{asset('images/home.png')}}"
                                                  alt=""></a></li>
            @foreach(request()->breadcrumbs()->segments() as $segment)
                <li class="mt-2">
                    <a href="#">  {{ optional($segment->model())
         ->breadcrumbName() ?:
         $segment->name()

         }}</a>
                </li>


            @endforeach

        </ol>
    </div>
</div>


@push('Breadcrumb.css')
    <link rel="stylesheet" href="{{asset('CSS/Breadcrumb/Breadcrumb.css')}}">
@endpush
