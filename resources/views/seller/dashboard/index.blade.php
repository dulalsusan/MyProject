<x-seller.layout>




					
							<h1> Welcome to Seller Panel</h1>

							<h3>Our products are</h3>
							
                                                   
						
								
											<a href="/seller/products/create">Create Product</a>
											<table width="900" align="center">
											<tr>
												<th><b>Name</b></th>
												<th><b>Description</b></th>
												<th><b>Price</b></th>
												<th><b>Category</b></th>
												<th><b>Action</b></th>
											</tr>
												@foreach ($product as $product)
												<tr>
													<td><a href="/seller/products/show/{{ $product->id }}">{{ $product->product_name }}</a></td>
													<td>{{ substr($product->product_desc,0,50) }}</td>
													<td>{{ $product->price }}</td>
													<td><a href="/seller/categories/{{ $product->cat->id }}">{{ $product->cat->category_name }}</a></td>

													<td>
														<a href="/seller/products/edit/{{ $product->id }}">Edit</a>|
														<a href="/seller/products/delete/{{ $product->id }}">Delete</a>
													</td>
												</tr>
												@endforeach
											</table>
							
							
						
							                
					
									


</x-seller.layout>


								