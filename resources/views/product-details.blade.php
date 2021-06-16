@extends('layout')

@section('menu')
    @include('includes/menu')
@endsection

@section('content')


    <p>This is product details page.</p>
    

    <h1>Product name is :- <a href="/product-details/{{ $pp->id }}">{{ $pp->product_name }}</a></h1>
    <p>Description:- {{ $pp->product_desc}}</p>
    <p>Price is:- Rs. {{ $pp->price }}</p>
    <a href="/product-details/{{ $pp->id }}"> <img class="default-img" src="{{ $pp->image == '' ? 'https://via.placeholder.com/550x750' : asset('storage/images/thumbnail/'.$pp->image) }}" alt="#">
    </a>

@endsection