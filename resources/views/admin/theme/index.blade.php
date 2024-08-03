@extends('admin.layouts.app')

@section('main-section')



<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Theme Options</h4>
            </div>
            <div class="card-body">
                @include('validate.error')
                @include('validate.success')
                <form action="{{ route('theme.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Title</label>
                        <div class="col-md-10">
                            <input name="title" type="text" value="{{ $theme -> title}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Tag Line</label>
                        <div class="col-md-10">
                            <input name="tagline" type="text" value="{{ $theme -> tagline}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">email</label>
                        <div class="col-md-10">
                            <input name="email" type="text" value="{{ $theme -> email}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Cell</label>
                        <div class="col-md-10">
                            <input name="cell" type="text" value="{{ $theme -> cell}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Address</label>
                        <div class="col-md-10">
                            <input name="address" type="text" value="{{ $theme -> address}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Hot Deal</label>
                        <div class="col-md-10">
                            <input name="running_tag" type="text" value="{{ $theme -> running_tag}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Logo</label>
                        <div class="col-md-10">
                            @if ($theme-> logo === 'logo.png')
                
                                <img style="background-color:#ddd;" src="{{ url ('img/logo.png')}}" alt="">
                                <br><br>
                              
                            
                            @else
                                <img style="width:100px; height:100px;background-color:#ddd;"src="{{ url ('storage/logo/' . $theme -> logo ) }}" alt="" class="logo-light">
                            @endif
                        
                            <input name="old-logo" type="hidden" value="{{ $theme -> logo }}">
                        
                            <input name="logo" type="file" class="form-control">
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-form-label col-md-2">Favicon</label>
                        <div class="col-md-10">
                            <input name="favicon" type="file" class="form-control">
                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Copy Right</label>
                        <div class="col-md-10">
                            <textarea name="copy" rows="2" cols="5" class="form-control" value="">{{ $theme -> copyright}}</textarea>
                        </div>
                    </div>
                    @php
                        $social = json_decode($theme -> social, false);
                    
                    @endphp


                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Social Link</label>
              
                        <div class="col-md-10">
                            <label for="">Facebook</label>
                            <input value="{{$social -> fb}}" name="fb" class="form-control" type="text">

                            <label for="">Linkdin</label>
                            <input value="{{$social ->din}}"  name="din" class="form-control" type="text">

                            <label for="">Twiter</label>
                            <input value="{{$social -> tw}}" name="tw" class="form-control" type="text">

                            <label for="">Whatsapp</label>
                            <input value="{{$social -> wapp}}" name="wapp" class="form-control" type="text">

                            <label for="">Instagram</label>
                            <input value="{{$social -> ins}}"  name="ins" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2"></label>
                        <div class="col-md-10">
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>
               

@endsection
