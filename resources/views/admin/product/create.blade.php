@extends('admin.layouts.app')

@section('main-section')

                <div class="row">
					
						<div class="col-md-12">
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
                                                    <label>Short Desccription</label>
                                                    <input name="short_description" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Desccription</label>
                                                    <input name="description" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Regular Price</label>
                                                    <input name="regular_price" type="number" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input name="sale_price" type="number" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <input name="sale_price" type="number" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <input name="sale_price" type="number" class="form-control">
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
                                                    <label>Image</label>
                                                    <input name="img" type="file" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Gallery</label>
                                                    <input name="gallery" type="file" class="form-control">
                                                </div>
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