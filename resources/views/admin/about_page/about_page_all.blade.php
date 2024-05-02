@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
   <div class="container-fluid">
   <div class="row">
    <div class="col-12">
        <div class="card">
               <div class="card-body">

                <h4 class="card-title">About Page</h4>
                <form method="post" action="{{ route('update.about')}}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" class="form-control" name="id" value="{{ $aboutpage->id}}">
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Title:</label>
                    <div class="col-sm-10">
                        <input  name="title" class="form-control" type="text" id="example-text-input" value="{{$aboutpage->title}}">
                    </div>
                </div>
                 <div class="row mb-3">
                    <label for="example-email-input" class="col-sm-2 col-form-label">Short Title:</label>
                    <div class="col-sm-10">
                        <input name="short_title" class="form-control" type="text"  id="example-email-input" value="{{$aboutpage->short_title}}">
                    </div>
                </div>
               
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Description:</label>
                    <div class="col-sm-10">
                        <textarea name="short_description" id="" class="form-control" >{{$aboutpage->short_description}}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">long Description:</label>
                    <div class="col-sm-10">
                    <textarea name="long_description" id="elm1" >{{$aboutpage->long_description}}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                    <div class="col-sm-10">
                        <input  name="about_image" class="form-control" type="file"  id="image" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">    </label>
                    <div class="col-sm-10">
                        <img id="showImage" class="rounded avatar-md" src="{{(!empty($aboutpage->about_image))?url('upload/home_about/'.$aboutpage->about_image):url('upload/no_image.png')}}"  alt="Card image cap">
                      
                    </div>
                </div>

                <input type="submit"  class="btn btn-info waves-effect waves-light" value="Update About Page">
              </form>
              
            </div>  
               
               
        </div>
    
    </div>
     </div>       
                
               
    </div>
 </div> 
<!--profile image uploading -->
 <script type="text/javascript"> 
$(document).ready(function(){
    $('#image').change(function(e){
        var reader=new FileReader();
        reader.onload=function(e){
            $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    })
})
</script>
@endsection