<x-seller.layout>

    <p>This is the <b style="color: red;">{{ $pp->product_name }}</b> product</p>
    <h1>Product name is :- {{ $pp->product_name }}</h1>
    <p>Description:- {{ $pp->product_desc}}</p>
    <p>Category:- <a href="/seller/categories/{{ $pp->cat->id }}">{{ $pp->cat->category_name}}</a></p>
    <p>Price is:- Rs. {{ $pp->price }}</p>
    <img class="default-img" src="{{ $pp->image == '' ? 'https://via.placeholder.com/550x750' : asset('storage/images/thumbnail/'.$pp->image) }}" alt="#"><br><br>
     <p>
         <button><a href="/seller/products/edit/{{ $pp->id }}">Edit</a></button>
         <button><a href="/seller/products/delete/{{ $pp->id }}">Delete</a></button>
    </p>

</x-seller.layout>