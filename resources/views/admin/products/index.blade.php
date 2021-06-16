<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
                <a href="/admin/products/create">Create Product</a><br>
                 <p style="text-align: center;">These products are posted by:-<b>{{ Auth::user()->name }}</b></p>
                <table width="900" align="center">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ substr($product->product_desc,0,50) }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="/admin/products/edit/{{ $product->id }}">Edit</a>|
                        <a href="/admin/products/delete/{{ $product->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
                </table>
          </div>
        </div>
    </div>


</x-admin.layout>