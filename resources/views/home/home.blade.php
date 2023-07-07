@extends('home.master')
@section('main-content')
    <main>
        <h2>REALME</h2>
        <section class="mobile">
            <div class="row">
                @foreach ($product as $item)
                    <div class="col-md-3">
                        <div class="card">
                            <img src="{{ asset('uploads/storeimages/' . $item['gallery']) }}" alt="no image">
                            <h2>{{ $item['name'] }}</h2>
                            <h3>Price : {{ $item['price'] }}</h3>
                            <h4>Details: {{ $item['discription'] }}</h4>
                            <h4>category: {{ $item['category'] }}</h4>
                            <h4>Sub_category: {{ $item['sub_category'] }}</h4>
                        </div>
                        <div>
                            <a class="btn btn-primary" href="#">Buy Now</a>
                            <form action="/add_to_cart" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value={{$item['id']}}>
                                <br>
                                <button class="btn btn-success">Add to Cart</button>
                            </form>

                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    </main>
@endsection
