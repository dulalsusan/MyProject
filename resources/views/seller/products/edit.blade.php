<x-seller.layout>
    
                    <h1>Update Product:{{$product->product_name}}</h1>
                    <form action="/seller/products/update/{{ $product->id }}" method="POST">
                        @csrf
                        Product Name: <input type="text" name="product_name" id="" class="form-control" value="{{$product->product_name}}"><br><br>
                        Product Desc: <textarea name="product_desc" id="" cols="30" rows="10" class="form-control" >{{$product->product_desc}}</textarea><br><br>
                        Price: <input type="text" name="price" id="" class="form-control" value="{{$product->price}}"><br><br>


                        {{-- Category:
                            <select name="category_id" id="">
                                <option value="0">Select a category</option>
                                @foreach ($category as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select><br><br>
                            <input type="submit" name="submit" value="save"> --}}


                        {{-- blade template use garera garda --}}
                        Category:
                        <x-forms.select name="category_id" class="form-control">
                            <option value="0">Select a category</option>
                                    @foreach ($category as $category)
                                        <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>{{$category->category_name}}</option>
                                    @endforeach
                        </x-forms.select><br><br>
                        <input type="submit" name="submit" value="SAVE" class="form-control">

                    </form>
          
</x-seller.layout>