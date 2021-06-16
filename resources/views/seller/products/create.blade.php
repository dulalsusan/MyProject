<x-seller.layout>
    

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                    <h1>Create Product</h1>
                    <form action="/seller/products/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        Product Name: <input type="text" name="product_name" id="" class="form-control" value="{{ old('product_name') }}"
                        
                        @error('product_name')
                            style="border-color:red;"
                        @enderror
                        >
                        
                        @error('product_name')
                            {{ $message }}
                        @enderror

                        <br><br>
                        Product Desc: <textarea name="product_desc" id="" cols="30" rows="10" class="form-control">{{ old('product_desc' )}}</textarea><br><br>
                        Price: <input type="text" name="price" id="" class="form-control" value="{{old('price')}}"><br><br>


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
                                        <option value="{{$category->id}}" {{ $category->id == old('category_id') ? "selected":""}}>{{$category->category_name}}</option>
                                    @endforeach
                        </x-forms.select>
                        
                        @error('category_id')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror<br><br>

                        
                        <input type="file" name="img" id="" class="form-control" ><br><br>
                        <input type="submit" name="submit" value="SAVE" class="form-control">

                    </form>
        
</x-seller.layout>