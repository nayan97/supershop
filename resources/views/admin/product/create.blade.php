@extends('admin.layouts.app')

@section('main-section')

                <div class="row">
                    <div class="col-md-1">
                 
                 
              
                </div>
					
						<div class="col-md-10">
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
                                                    <input name="name" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Short Desccription</label>
                                                    <textarea name="short_description" id="text_editor" cols="30" rows="10"></textarea>
                                                   
                                                </div>
                                                <div class="form-group">
                                                    <label>Desccription</label>
                                                    <textarea name="description" id="dersc_editor" cols="30" rows="6"></textarea>
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
                                                    <input name="#" type="number" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <input name="quantity" type="number" class="form-control">
                                                </div>
                                             
                                                <div class="form-group">
                                                    <label>Catergory</label>
                                                    <select name="category_id" id="">
                                                 
                                                        <option value="">Select Category</option>
                                                        @foreach ($categories as $cat )
                                                            
                                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                        @endforeach
                                                    
                                                    </select>
                        
                                                </div>
                                                <div class="form-group">
                                                    <label>Catergory</label>
                                                    <select name="brand_id" id="">
                                                 <br><br>
                                                        <option value="">Select Brand</option>
                                                        @foreach ($brands as $brand)
                                                            
                                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                        @endforeach
                                                    
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
                                            <a class="btn btn-primary float-right" href="{{ url('products')}}">Back</a></span>
                                        </div>
                                        <div class="card-body">

                                        @if( $errors -> any())
                                        <p class="alert alert-danger">{{$errors -> first()}} <button class="close" data-dismiss="alert">&times;</button></p>

                                        @endif
                                        @if(Session::has('success'))
                                        <p class="alert alert-success">{{Session::get('success')}} <button class="close" data-dismiss="alert">&times;</button></p>

                                        @endif

                                            <form action="{{ route('products.update', $product -> id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label>Tittle</label>
                                                    <input value="{{$product -> name}}" name="name" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Short Desccription</label>
                                                    <textarea name="short_description" id="text_editor" cols="30" rows="10">{{$product -> short_description}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Desccription</label>
                                                    <textarea name="description" id="dersc_editor" cols="10" rows="6">{{$product -> description}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <input value="{{$product -> quantity}}" name="quantity" type="number" min="0" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Discount Price</label>
                                                    <input value="{{$product -> regular_price}}" name="regular_price" type="number" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input value="{{$product -> sale_price}}" name="sale_price" type="number" min="number" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Catergory</label>
                                                <select name="category_id" id="">
                                                 
                                                    <option value="{{$product -> category->id}}" selected="">{{$product -> category->name}}</option>
                                                    @foreach ($cats as $cat )
                                                    <option value="{{$cat->id}}">{{$cat-> name}}</option> 
                                                    @endforeach 
                                                
                                                </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Brand</label>
                                                <select name="brand_id" id="">
                                                 
                                                    <option value="{{$product -> brand->id}}" selected="">{{$product -> brand->name}}</option>
                                                    @foreach ($brands as $brand )
                                                    <option value="{{$brand->id}}">{{$brand-> name}}</option> 
                                                    @endforeach 
                                                
                                                </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Old Image</label>
                                                  <img style="width:220px; height:250px;" src="{{url($product -> img)}}" alt="">
                                                </div>     
                                                <div class="form-group">
                                                    <label>Update Image</label>
                                                    <input name="img" type="file" class="form-control">
                                                </div>     
                                                <div class="form-group">
                                                    <label>Old Gallery</label>
                                                  <img style="width:220px; height:220px;" src="{{url($product -> gallery)}}" alt="">
                                                </div>  
                                                <div class="form-group">
                                                    <label>Gallery</label>
                                                    <input name="gallery" type="file" class="form-control">
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