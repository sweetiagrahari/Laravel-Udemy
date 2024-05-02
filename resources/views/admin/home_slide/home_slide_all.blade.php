@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
   <div class="container-fluid">
   <div class="row">
    <div class="col-12">
        <div class="card">
               <div class="card-body">

                <h4 class="card-title">Home Slider Page</h4>
                <form method="post" action="{{ route('update.slide')}}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" class="form-control" name="id" value="{{ $homeslide->id}}">
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Title:</label>
                    <div class="col-sm-10">
                        <input  name="title" class="form-control" type="text" id="example-text-input" value="{{$homeslide->title}}">
                    </div>
                </div>
                 <div class="row mb-3">
                    <label for="example-email-input" class="col-sm-2 col-form-label">Short Title:</label>
                    <div class="col-sm-10">
                        <input name="short_title" class="form-control" type="text"  id="example-email-input" value="{{$homeslide->short_title}}">
                    </div>
                </div>
               
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Video URL:</label>
                    <div class="col-sm-10">
                        <input  name="video_url" class="form-control" type="text"  id="example-text-input" value="{{$homeslide->video_url}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Home Slide Image</label>
                    <div class="col-sm-10">
                        <input  name="home_slide" class="form-control" type="file"  id="image" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">    </label>
                    <div class="col-sm-10">
                        <img id="showImage" class="rounded avatar-md" src="{{(!empty($homeslide->home_slide))?url('upload/home_slide/'.$homeslide->home_slide):url('upload/no_image.png')}}"  alt="Card image cap">
                      
                    </div>
                </div>

                <input type="submit"  class="btn btn-info waves-effect waves-light" value="Update Slide">
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
