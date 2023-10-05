@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
   <div class="container-fluid">
   <div class="row">
    <div class="col-12">
        <div class="card">
               <div class="card-body">

                <h4 class="card-title">Change Password Page</h4><br><br>

                @if (count($errors))
                    @foreach($errors->all() as $error)
                     <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
                    @endforeach
                @endif
                <form method="post" action="{{ route('update.password')}}" >
                    @csrf
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Old Password:</label>
                    <div class="col-sm-10">
                        <input  name="oldpassword" class="form-control" type="password" placeholder="Old Password" id="oldpassword" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Old Password:</label>
                    <div class="col-sm-10">
                        <input  name="newpassword" class="form-control" type="password" placeholder="New Password" id="newpassword" >
                    </div>
                </div>
               
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Old Password:</label>
                    <div class="col-sm-10">
                        <input  name="confirm_password" class="form-control" type="password" placeholder="Confirm Password" id="confrim_password" >
                    </div>
                </div>
            
                <input type="submit"  class="btn btn-info waves-effect waves-light" value="Change Password">
              </form>
              
            </div>  
               
               
        </div>
    
    </div>
     </div>       
                
               
    </div>
 </div> 

 
 @endsection
