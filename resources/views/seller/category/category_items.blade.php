<x-seller.layout>


                        @foreach ($product as $item)
                        <div class="col-12">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                <div>
                        
                                    <a href="product-details.html">
                    	                <img style="width:250;height:250" class="default-img" src="{{ $item->image == '' ? 'https://via.placeholder.com/550x750' : asset('storage/images/thumbnail/'.$item->image) }}" alt="#">
                                    </a>
                                    
                                </div>
                                <div>
                                    <h3><a href="/seller/products/show/{{ $item->id }}">{{ $item->product_name }}</a></h3>
                                    <div>
                                        <span>{{ $item->price }}</span>
                                    </div>
                                    <h6><a href="/seller/categories/{{ $item->cat->id }}">{{ $item->cat->category_name }}</a></h6>

                                </div>
                            </div>
                            </div>
                            
                        @endforeach
                        
                        <pre>
                        <h4 style="text-align:center;color:green;">These items are belongs to <a href="#">{{ $item->cat->category_name }}</a> category...</h4>
                        </pre>
                       
</x-seller.layout>                                   