@extends('admin.layouts.app')

@section('main-section')

                <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Product</h4>
								</div>
								<div class="card-body">


                                @include('validate.success-main')

                                    <table class="table table-striped">
                                        <thead> 
                                                <tr>
                                                <td>#</td>
                                                <td>Title</td>
                                                <td>Category</td>
                                                <td>Brand</td>
                                                <td>Price</td>
                                                <td>Photo</td>
                                                <td>Created at</td>
                                                <td>Action</td>
                                               
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @forelse($data as $item)
                                         
                                         <tr>
                                            <td>{{$loop ->index + 1}}</td>
                                            <td style="max-width: 60px">{{$item -> name}}</td>
                                          
                                            <td>{{$item -> sale_price}}</td>
                                            <td>{{$item -> category->name}}</td>
                                            <td>{{$item -> brand->name}}</td>
                                            <td>
                                                <img style="width:115px;height:115px;object-fit:cover;" src="{{ asset($item -> img ) }}" alt="">
                                            </td>
                                            <td>{{$item -> created_at -> diffForHumans()}}</td>
                                            <td>
                                                <!----<a class="btn btn-sm btn-info" href="#"><i class="fe fe-eye"></i></a>-->
                                                <a class="btn btn-sm btn-warning" href="{{ route('products.edit', $item -> id ) }}"><i class="fe fe-edit"></i></a>
                                                <form onclick="return confirm('Are you sure to delete this')" action="{{ route('products.destroy', $item -> id ) }}" class="d-inline delete-form" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                       </tr>
                                         
                                         
                                         @empty
                                         <tr>
                                            <td colspan="6" class="text-center">
                                                <p>No Permision Found</p>
                                            </td>
                                        </tr>
                                         @endforelse  
                                 
                                        </tbody>
                                    </table>
								
								</div>
							</div>
						</div>
					
					</div>


@endsection