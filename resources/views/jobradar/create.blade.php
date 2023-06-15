<x-layouts>
    <div class="rwt-contact-area rn-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb--40">
                    <div class="section-title text-center" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                        <h4 class="subtitle "><span class="theme-gradient">@lang('Create a Job')</span></h4>
                        <h2 class="title w-600 mb--20">@lang('We help you find best hires!')</h2>
                    </div>
                </div>
            </div>

            <div class="row mt--40 row--15 justify-content-center">
                <div class="col-lg-6">
                    <form method="POST" action="/submit_job" enctype="multipart/form-data">
                        <!-- Generate and include the CSRF (Cross-Site Request Forgery) -->
                        @csrf
                        <div class="contact-form-1 rwt-dynamic-form">
                            <div class="form-group">
                                <input type="text" name="company" placeholder="Company Name"
                                    value="{{ old('company') }}">
                                <!-- Display error message if validation fails for the 'company' field -->
                                @error('company')
                                    <!-- Display the error message -->
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="title" placeholder="Job Title"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="location" placeholder="Job Location"
                                    value="{{ old('location') }}">
                                @error('location')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" name="website" placeholder="Website URL"
                                    value="{{ old('website') }}">
                                @error('website')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email Address"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" name="tags" placeholder="Tags (Comma Seperated Values)"
                                    value="{{ old('tags') }}">
                                @error('tags')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="file" name="logo" placeholder="Company Logo">
                                @error('logo')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <textarea name="description" placeholder="Job Description">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button name="submit" type="submit" class="btn-default btn-large rn-btn">
                                    <span>Submit Now</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts>
