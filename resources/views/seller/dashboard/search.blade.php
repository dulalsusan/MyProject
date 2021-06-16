
<x-seller.layout>



    <div class="col-12">

        <div class="col-xl-6 col-lg-8 col-md-8 col-12">
            <h1>The searched Products are...</h1>  

    
        @foreach ($product as $item)
                    <a href="/seller/products/show/{{ $item->id }}">
                    	<img style="width:250;height:250" class="default-img" src="{{ $item->image == '' ? 'https://via.placeholder.com/550x750' : asset('storage/images/thumbnail/'.$item->image) }}" alt="#">
                    </a>
                
                <div class="product-content">
                    <h3><a href="/seller/products/show/{{ $item->id }}">{{ $item->product_name }}</a></h3>
                    <div class="product-price">
                        <span>Price:- {{ $item->price }}</span>
                    </div>
                    <a href="/seller/categories/{{ $item->cat->id }}">{{ $item->cat->category_name }}</a>

                </div>
        @endforeach




  </div>
    
    <div class="col-xl-6 col-lg-4 col-md-4 col-12">


        <h1>The searched categories are...</h1>  
        @foreach ($category as $item)
                <div class="product-content">
                    <h3><a href="/seller/categories/{{ $item->id }}">{{ $item->category_name }}</a></h3>                
                </div>
        @endforeach

    </div>
</div>



  



</x-seller.layout>