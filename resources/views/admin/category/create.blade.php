<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">

            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

                    <h1>Create Category</h1>
                    <form action="/admin/categories/store" method="POST">
                        @csrf
                        category Name: <input type="text" name="category_name" id="cat_name" class="form-control" value="{{ old('category_name') }}"
                        @error('category_name')
                            style="border-color:red;"
                        @enderror
                        >
                        @error('category_name')
                            {{ $message }}
                        @enderror
                        <br><br>
                        category Slug: <input type="text" name="slug" id="cat_slug" class="form-control" value="{{ old('slug') }}"
                        @error('category_name')
                            style="border-color:red;"
                        @enderror
                        >
                        @error('slug')
                            {{ $message }}
                        @enderror
                        <br><br>
                        category Desc: <textarea name="category_desc" id="" cols="30" rows="10" class="form-control">{{ old('category_desc' )}}</textarea>
                        @error('category_desc')
                            {{ $message }}
                        @enderror
                        <br><br>

                        Parent Category:
                        <x-forms.select name="parent_id" class="form-control">
                            <option value="0">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{ $category->id == old('parent_id') ? "selected":""}}>{{$category->category_name}}</option>
                                        {{-- <option value=""></option> --}}
                                    @endforeach
                        </x-forms.select>
                        

                        @error('category_id')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror<br><br>


                        <input type="submit" name="submit" value="SAVE" class="form-control">

                    </form>
          </div>
        </div>
    </div>
</x-admin.layout>

<script>
    jQuery(document).ready(function($){
        $('#cat_name').on('change',function(){
            var name = $('#cat_name').val();
            var slug = name.replace(/\s+/g,'-').toLowerCase();
            $('#cat_slug').val(slug);                                    //here cat_name & cat_slug mathi 'id' ma diyeka value ho

        })
    })
</script>