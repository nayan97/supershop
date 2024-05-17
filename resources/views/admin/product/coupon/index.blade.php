@extends('admin.layouts.app')

@section('main-section')

                <div class="row">
						<div class="col-md-7">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Coupon</h4>
								</div>
								<div class="card-body">
                                    
                                    @include('validate.success-main')


                                    <table class="table table-striped">
                                        <thead> 
                                                <tr>
                                                <td>#</td>
                                                <td>Coupon Code</td>
                                                <td>Coupon Type</td>
                                                <td>Coupon Value</td>
                                                <td>Cart Value</td>
                                                <td>Created at</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      

                                        @forelse ($items as $item)
                                        <tr>
                                            <td>{{$loop ->index + 1}}</td>
                                            
                                            <td>{{$item -> code}}</td>
                                            <td>{{$item -> type}}</td>
                                            @if ($item ->type == 'fixed')
                                               <td>{{$item -> value}}</td>
                                            @else
                                               <td>{{$item -> value}}%</td>
                                            @endif
                                        
                                            <td>{{$item -> cart_value}}</td>
                                            <td>{{$item -> created_at -> diffForHumans()}}</td>
                                            <td>
                                                <!----<a class="btn btn-sm btn-info" href="#"><i class="fe fe-eye"></i></a>-->
                                                <a class="btn btn-sm btn-warning" href="{{ route('coupon.edit', $item -> id ) }}"><i class="fe fe-edit"></i></a>
                                                <form onclick="return confirm('Are you sure to delete this')" action="{{ route('coupon.destroy', $item -> id ) }}" class="d-inline delete-form" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                       </tr> 
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <p>No Data Found</p>
                                            </td>
                                        </tr>
                                       
                                        @endforelse
                                           
                                     
                                        </tbody>
                                    </table>
								
								</div>
							</div>
						</div>
						<div class="col-md-5">

                            @if( $type === 'add')
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Add new Coupon</h4>
								</div>
								<div class="card-body">


                                @include('validate.success')
                                @include('validate.error')
									<form action="{{route ('coupon.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
										<div class="form-group">
											<label>Coupon Code</label>
											<input name="code" type="text" class="form-control">
                                       
                                        </div>
                                        <div class="form-group">
											<label>Coupon Type</label>
                                                <select name="type" id="" class="form-control">
                                                    <option value="">Select Coupon</option>
                                                    <option value="fixed">Fixed</option>
                                                    <option value="percent">Percent</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
											<label>Coupon Value</label>
											<input name="value" type="text" class="form-control">
                                       
                                        </div>
                                        <div class="form-group">
											<label>Cart Value</label>
											<input name="cart_value" type="text" class="form-control">
                                       
                                        </div>
									
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
                            @endif
                            
                            @if( $type === 'edit')
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"> Edit Category</h4>
                                    <a class="btn btn-primary btn-md" href="{{url('category')}}">Back</a>
								</div>
								<div class="card-body">


                                @include('validate.success')
                                @include('validate.error')
								<form action="{{route ('category.update', $categorys -> id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input value="{{$categorys->name}}"name="name" type="text" class="form-control">
                                        <hr>
                                    </div>
                                    <div class="form-group">
                                        <label>Old Image</label>
                                      <img style="width:220px; height:250px;" src="{{asset($categorys -> img)}}" alt="">
                                    </div>     
                                    <div class="form-group">
                                        <label>Update Image</label>
                                        <input name="img" type="file" class="form-control">
                                    </div> 
                                
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
								</div>
							</div>
                            @endif


						</div>
					</div>

               

@endsection
