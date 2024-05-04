@extends('admin.layouts.app')

@section('main-section')

                <div class="row">
						<div class="col-md-7">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Category</h4>
								</div>
								<div class="card-body">
                                    
                                    @include('validate.success-main')


                                    <table class="table table-striped">
                                        <thead> 
                                                <tr>
                                                <td>#</td>
                                                <td>Name</td>
                                                <td>Slug</td>
                                                <td>Photo</td>
                                                <td>Created at</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      

                                        @forelse ($cats as $item)
                                        <tr>
                                            <td>{{$loop ->index + 1}}</td>
                                            
                                            <td>{{$item -> name}}</td>
                                            <td>{{$item -> slug}}</td>
                                            <td>
                                                <img style="width:115px;height:115px;object-fit:cover;" src="{{asset($item->img)}}" alt="">
                                            </td>
                                            <td>{{$item -> created_at -> diffForHumans()}}</td>
                                            <td>
                                                <!----<a class="btn btn-sm btn-info" href="#"><i class="fe fe-eye"></i></a>-->
                                                <a class="btn btn-sm btn-warning" href="{{ route('category.edit', $item -> id ) }}"><i class="fe fe-edit"></i></a>
                                                <form onclick="return confirm('Are you sure to delete this')" action="{{ route('category.destroy', $item -> id ) }}" class="d-inline delete-form" method="POST">
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
									<h4 class="card-title">Add new Category</h4>
								</div>
								<div class="card-body">


                                @include('validate.success')
                                @include('validate.error')
									<form action="{{route ('category.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
										<div class="form-group">
											<label>Category Name</label>
											<input name="name" type="text" class="form-control">
                                            <hr>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input name="img" type="file" class="form-control">
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
