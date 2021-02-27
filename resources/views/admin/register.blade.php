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
                                <div class="modal-body">
                                    <h5 class="modal-title">
                                        <h4 class="mt-2">
                                            <div>Welcome,</div>
                                            <span>It only takes a <span class="text-success">few seconds</span> to create your account</span>
                                        </h4>
                                    </h5>
                                    <div class="divider row"></div>
                                 <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                    <div class="form-row">
                                        
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input name="name" placeholder="Enter your full Name here..." type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input name="email" id="exampleEmail"  placeholder="Email here..." type="email" class="form-control">
                                            </div>
                                        </div>

                                          <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input name="name" placeholder="Enter your Registeration Number here..." type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input name="password"  id="examplePassword" placeholder="Password here..." type="password"  class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input name="passwordrep" id="examplePasswordRep" placeholder="Repeat Password here..." type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    </form>

                                   
                                    <div class="divider row"></div>
                                    <h6 class="mb-0">Already have an account? 
                                        <a href="javascript:void(0);" class="text-primary">Sign in</a> | <a href="javascript:void(0);" class="text-primary">Recover Password</a>
                                    </h6>
                                </div>
                                <div class="modal-footer d-block text-center">
                                    <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg">Create Account</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-white opacity-8 mt-3">Copyright © Oge_Josy 2021</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('layout.footer')