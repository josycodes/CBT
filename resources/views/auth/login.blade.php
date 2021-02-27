@include('layout.head')
<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        <div class="app-logo-inverse mx-auto mb-3"></div>
                        <div class="modal-dialog w-100 mx-auto">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
   <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <div>Welcome back,</div>
                                            <span>Please sign in to your account below.</span>
                                        </h4>
                                    </div>
                                      <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="email" placeholder="Username here..." type="email" class="form-control" :value="old('email')" required autofocus >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input placeholder="Password here..." class="form-control" type="password" name="password" required autocomplete="current-password">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="divider"></div>
                                    <h6 class="mb-0">No account? <a href="javascript:void(0);" class="text-primary">Sign up now</a></h6>
                                </div>
                                 <div class="modal-footer clearfix">
                                    <div class="float-left">
                                        <a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a>
                                    </div>
                                    <div class="float-right">
                                        <button class="btn btn-primary btn-lg" type="submit">Login to Dashboard</button>
                                    </div>
                                </div>
      {{--       <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Login') }}
                </x-button>
            </div> --}}
        </form>
    </div>
                        </div>
                        <div class="text-center text-white opacity-8 mt-3">Copyright © ArchitectUI 2019</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('layout.footer')