<div id="data-product" class="row">
    @foreach($products as $product)
      @include('Partials._product')
    @endforeach

    <div class="my-3">
        {{$products->links()}}
    </div>
</div>

@push('productsPagination.js')
    <script src="{{ asset('JS/Pagination/productsPagination.js') }}"></script>
@endpush
