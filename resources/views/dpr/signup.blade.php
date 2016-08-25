@extends('index')
@section('content')

@if(session('message')=="success")
	
<script>

swal("Registration Successfull!", "Click The Login Menu to login and continue your registration", "success")

</script>

@endif

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Applicants login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="available_jobs" method="post">
						   <input type="hidden" name="_token" vale="{{csrf_token()}}" />
                            <div class="form-group">
                                <input type="email" class="form-control" id="email_modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password_modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="available_jobs"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to our Job Portal!</p>

                    </div>
                </div>
            </div>
        </div>

        <!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>New account / Sign up</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a>
                            </li>
                            <li>New account / Sign up</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <h2 class="text-uppercase">New account</h2>

                            <p class="lead">Not our registered ?</p>
                            <p>With registration with us new world of career building oppurtunities  and much more opens to you! The whole process will not take you more than a minute!</p>
                            <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                            <hr>
					@if (count($errors) > 0)
						<div class="alert alert-danger">
					
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

                            <form action="/registerapplicant" method="post">
							 <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="name-login">First Name</label>
                                            <input type="text" class="form-control" name="first_name" >
                                        </div>
										 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name-login">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" >
                                        </div>
										 
                                    </div>
								
                                </div>
									<div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name-login">Middle Name</label>
                                            <input type="text" class="form-control" name="middle_name" >
                                        </div>
										 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name-login">Maiden Name</label>
                                            <input type="text" class="form-control" name="maiden_name" >
                                        </div>
										
                                    </div>
								
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email-login">Email</label>
                                            <input type="text" class="form-control" name="email" id="email-login">
                                        </div>
										 
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="name-login">Phone</label>
                                            <input type="text" name="phonenumber" class="form-control" >
                                        </div>
										
                                    </div>
                                </div>
                                

                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password-login">Password</label>
                                            <input type="password" class="form-control" name="password" id="password-login">
                                        </div>
										 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="re-password-login">Re-type Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" id="re-password-login">
                                       	 
									   </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Register</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

        <!-- *** COPYRIGHT ***-->

       @endsection