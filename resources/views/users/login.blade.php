<x-layouts>
    <div class="rwt-contact-area rn-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb--40">
                    <div class="section-title text-center" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                        <h4 class="subtitle "><span class="theme-gradient">@lang('Login')</span></h4>
                        <h2 class="title w-600 mb--20">@lang('Log in to your  account to post Jobs!')</h2>
                    </div>
                </div>
            </div>

            <div class="row mt--40 row--15 justify-content-center">
                <div class="col-lg-6">
                    <form method="POST" action="/users/authenticate">
                        @csrf
                        <div class="contact-form-1 rwt-dynamic-form">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email Address"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password"
                                    value="{{ old('password') }}">
                                @error('password')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button name="submit" type="submit" class="btn-default btn-large rn-btn">
                                    <span>Login</span>
                                </button>
                            </div>

                            <div class="mt-5">
                                <p>
                                    Don't have an account?
                                    <a href="/register" class="text-danger">Register</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts>
