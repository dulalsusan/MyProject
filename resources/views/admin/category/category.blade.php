<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
                <a href="/admin/categories/create">Create Category</a>
                <table width="900" align="center">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
                @foreach ($category as $category)
                <tr>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ substr($category->category_desc,0,50) }}</td>
                    <td>{{ $category->slug }}</td>

                    <td>
                        <a href="/admin/categories/edit/{{$category->id}}">Edit</a>|
                        <a href="/admin/categories/delete/{{$category->id}}">Delete</a>
                    </td>
                </tr>
                @endforeach
                </table>
          </div>
        </div>
    </div>


</x-admin.layout>