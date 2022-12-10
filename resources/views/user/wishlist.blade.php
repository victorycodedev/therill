@extends('layouts.main')
@section('title', 'My Wishlist')
@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('app/css/style.min.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('content')
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Wishlist
                        </li>
                    </ol>
                </div>
            </nav>

            <h1>Wishlist</h1>
        </div>
    </div>

    <div class="container">
        <div class="wishlist-title">
            <h2 class="p-2">My wishlist</h2>
        </div>
        <div class="wishlist-table-container">
            <table class="table mb-0 table-wishlist">
                <thead>
                    <tr>
                        <th class="thumbnail-col"></th>
                        <th class="product-col">Product</th>
                        <th class="price-col">Price</th>
                        <th class="status-col">Stock Status</th>
                        <th class="action-col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($wishlist as $wish)
                        <tr class="product-row">
                            <td>
                                <figure class="product-image-container">
                                    <a href="{{ route('productsingle', str_replace(' ', '-', $wish->product->name)) }}"
                                        class="product-image">
                                        <img src="{{ asset('storage/' . $wish->product->featured_image) }}" alt="product">
                                    </a>

                                    <a href="javascript:void(0)" id="{{ $wish->id }}" onclick="removewish(this.id)"
                                        class="btn-remove icon-cancel" title="Remove Product"></a>
                                </figure>
                            </td>
                            <td>
                                <h5 class="product-title">
                                    <a
                                        href="{{ route('productsingle', str_replace(' ', '-', $wish->product->name)) }}">{{ $wish->product->name }}</a>
                                </h5>
                            </td>
                            <td class="price-box">
                                {{ $settings->currency }}{{ number_format($wish->product->current_price) }}</td>
                            <td>
                                @if ($wish->product->instock < 1)
                                    <span class="stock-status text-danger">Sold Out</span>
                                @else
                                    <span class="stock-status">In stock</span>
                                @endif

                            </td>
                            <td class="action">
                                @if ($wish->product->instock < 1)
                                    <button class="btn btn-dark btn-add-cart product-type-simple btn-shop"
                                        disabled="disabled"> BUY NOW</button>
                                @else
                                    <a href="{{ route('productsingle', str_replace(' ', '-', $wish->product->name)) }}"
                                        class="btn btn-dark product-type-simple">
                                        BUY NOW
                                    </a>
                                @endif

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <h3>No item in wishlist</h3>
                                {{-- take user to product page --}}
                                <a href="{{ route('products', ['cat' => 'all', 'brand' => 'all', 'st' => 'desc', 'pg' => 10, 'search' => 'query']) }}"
                                    class="btn btn-dark">Shop Now</a>
                            </td>
                    @endforelse

                </tbody>
            </table>
        </div><!-- End .cart-table-container -->
    </div><!-- End .container -->
@endsection
@section('scripts')
    @parent

    <script>
        function removewish(id) {

            let url = "{{ url('/account/removewish/') }}" + '/' + id;
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    Swal.fire({
                        title: response,
                        icon: 'success',
                    });
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                },
                error: function(error) {
                    console.log(error);
                },

            });
        }
    </script>
@endsection
