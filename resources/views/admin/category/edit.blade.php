<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
                    <h1>Update Category:{{$cat->category_name}}</h1>
                    <form action="/admin/categories/update/{{ $cat->id }}" method="POST">
                        @csrf
                        Category Name: <input type="text" name="category_name" id="" class="form-control" value="{{$cat->category_name}}"><br><br>
                        {{-- Category Slug: <input type="text" name="slug" id="" class="form-control" value="{{$cat->slug}}"><br><br> --}}
                        Category Desc: <textarea name="category_desc" id="" cols="30" rows="10" class="form-control" >{{$cat->category_desc}}</textarea><br><br>
                        <input type="submit" name="submit" value="SAVE" class="form-control">

                    </form>
          </div>
        </div>
    </div>
</x-admin.layout>