@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        @if ($products->count())
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>{{ $product->product_name }}</h4>
                        </div>
                        <div class="card-body text-center">
                            <div class="mb-3">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}" class="img-fluid" style="max-width: 100%; height: auto;">
                                @else
                                    <p>No Image Available</p>
                                @endif
                            </div>
                            
                            <p><strong>Description:</strong> {{ $product->details }}</p>
                            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12">
                <div class="alert alert-warning">
                    No products found.
                </div>
            </div>
        @endif
    </div>
    
    <!-- Pagination links -->
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>
@endsection
