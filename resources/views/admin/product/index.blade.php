@extends('admin.layouts.app')

@section('main-section')

                <div class="row">
						<div class="col-md-8">
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
                                                <td>Deccription</td>
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
                                            <td>{{$item -> name}}</td>
                                            <td>{{$item -> description}}</td>
                                            <td>{{$item -> price}}</td>
                                            <td>
                                                <img style="width:45px;height:45px;object-fit:cover;" src="{{ ('img/product/' . $item -> photo ) }}" alt="">
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
						<div class="col-md-4">
                                @if ($form == 'create')
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Add new product</h4>
                                        </div>
                                        <div class="card-body">

                                        @if( $errors -> any())
                                        <p class="alert alert-danger">{{$errors -> first()}} <button class="close" data-dismiss="alert">&times;</button></p>

                                        @endif
                                        @if(Session::has('success'))
                                        <p class="alert alert-success">{{Session::get('success')}} <button class="close" data-dismiss="alert">&times;</button></p>

                                        @endif

                                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Tittle</label>
                                                    <input name="title" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Desccription</label>
                                                    <input name="desc" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input name="price" type="number" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Discount Price</label>
                                                    <input name="dis_price" type="number" class="form-control">
                                                </div>
                                             
                                                <div class="form-group">
                                                    <label>Catergory</label>
                                                    <select name="cat" id="">
                                                 
                                                        <option value="">Select Category</option>
                                                        <option value="electronic">Electronic</option>
                                                        <option value="mobile">Mobile</option>
                                                        <option value="computer">Computer</option> 
                                                        <option value="tv">TV</option>  
                                                        
                                                    
                                                    </select>
                        
                                                </div>

                                                <div class="form-group">
                                                    <label>Tags</label>
                                                    <select class="form-control comet-select-2" name="tag[]" id="" multiple>
                                                        @foreach( $tags as $tag )
                                                        <option value="{{ $tag -> id }}">{{ $tag -> name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input name="photo" type="file" class="form-control">
                                                </div>
                                            
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                @endif

                                @if ($form == 'edit')
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Edit Product</h4><span style="padding:0px">
                                            <a class="btn btn-primary float-right" href="{{ url('product')}}">Back</a></span>
                                        </div>
                                        <div class="card-body">

                                        @if( $errors -> any())
                                        <p class="alert alert-danger">{{$errors -> first()}} <button class="close" data-dismiss="alert">&times;</button></p>

                                        @endif
                                        @if(Session::has('success'))
                                        <p class="alert alert-success">{{Session::get('success')}} <button class="close" data-dismiss="alert">&times;</button></p>

                                        @endif

                                            {{-- <form action="{{ route('product.update', $edit_data -> id) }}" method="POST" enctype="multipart/form-data"> --}}
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label>Tittle</label>
                                                    <input value="{{$edit_data -> title}}" name="title" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Desccription</label>
                                                    <input value="{{$edit_data -> description}}" name="desc" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <input value="{{$edit_data -> quantity}}" name="quantity" type="number" min="0" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input value="{{$edit_data -> price}}" name="price" type="number" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Discount Price</label>
                                                    <input value="{{$edit_data -> dis_price}}" name="dis_price" type="number" min="number" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Catergory</label>
                                                <select name="cat" id="">
                                                 
                                                    <option value="{{$edit_data -> category}}" selected="">{{$edit_data -> category}}</option>
                                                    @foreach ($category as $cat )
                                                    <option value="{{$cat-> name}}">{{$cat-> name}}</option> 
                                                    @endforeach 
                                                
                                                </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Old Image</label>
                                                  <img style="width:220px; height:250px;" src="{{ url('/img/product/'. $edit_data -> image )}}" alt="">
                                                </div>     
                                                <div class="form-group">
                                                    <label>Update Image</label>
                                                    <input name="photo" type="file" class="form-control">
                                                </div>
                                            
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                @endif
                         
                      
						</div>
					</div>


@endsection