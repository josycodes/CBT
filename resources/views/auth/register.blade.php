@include('layout.head')
<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-premium-dark">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        <div class="app-logo-inverse mx-auto mb-3"></div>
                        <div class="modal-dialog w-100">
                            <div class="modal-content">
                                <div class="modal-body" scrollable>
                                    <h5 class="modal-title">
                                        <h4 class="mt-2">
                                            <div>Welcome,</div>
                                            <span>It only takes a <span class="text-success">few seconds</span> to create your account</span>
                                        </h4>
                                    </h5>
                                    <div class="divider row"></div>
                                     

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-row">
            <div class="col-md-12">
                <div class="position-relative form-group">
                    <input name="name" placeholder="Enter your full Name here..." type="text" class="form-control" required autofocus >
                </div>
            </div>
               
           <!-- Email Address -->
             <div class="col-md-12">
                <div class="position-relative form-group">
                    <input name="email" id="exampleEmail"  placeholder="Email here..." type="email" class="form-control" required>
                </div>
            </div>
               <!-- Registeration Number -->
                <div class="col-md-12">
                    <div class="position-relative form-group">
                        <input name="regno" placeholder="Enter your Registeration Number here..." type="text" class="form-control">
                    </div>
                </div>

            <!-- Gender-->

              <div class="col-md-12">
                <div class="position-relative form-group">
                    <select class="form-control" name="sex">
                    <option value="">-- Select Gender --</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    </select>
                </div>
            </div>

        <!--Date Of birth -->
              <div class="col-md-12">
                <div class="position-relative form-group">
                    <div class="input-group">
                        <div class="input-group-prepend datepicker-trigger">
                            <div class="input-group-text">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                        </div>
                        <input type="text" name="dob" placeholder="Enter your date of birth" class="form-control" data-toggle="datepicker-icon"/>
                    </div>
                </div>
            </div>

           <!-- State Of Origin -->
              <div class="col-md-12">
                <div class="position-relative form-group">
                    <input name="stateoforigin" placeholder="Enter your State of Origin here..." type="text" class="form-control">
                </div>
            </div> 
            <!-- Student Class-->
             <div class="col-md-12">
            <div class="position-relative form-group">
            <select name="studentclass" class="form-control">
            <option></option>
            </select>
            </div>
            </div>

            <!-- Password -->
             <div class="col-md-12">
            <div class="position-relative form-group">
                <input id="examplePassword" placeholder="Password here..." class="form-control"  type="password" name="password" required autocomplete="new-password">
            </div>
        </div>

            <!-- Confirm Password -->
             <div class="col-md-12">
                <div class="position-relative form-group">
                    <input name="password_confirmation" required  placeholder="Repeat Password here..." type="password" class="form-control">
                </div>
            </div>

           
      
   
                                   <div class="divider row"></div>
                                    <h6 class="mb-0">Already have an account? 
                                        <a href="{{ route('login') }}" class="text-primary">Sign in</a></h6>

          
            <div class="modal-footer d-block text-center">
                <a class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg" type="submit" href=" {{ __('Register') }}">Create Account</a>
            </div>
                        </div>
                          </form>
                        <div class="text-center text-white opacity-8 mt-3">Copyright © Oge_Josy 2021</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       </div>
          </div>
             </div>

@include('layout.footer')