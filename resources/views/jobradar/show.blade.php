<x-layouts>
    <!-- Start Advance Pricing Area  -->
    <div class="rn-blog-details-area">
        <div class="rn-blog-details-area">
            <div class="post-page-banner rn-section-gapTop">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="content text-center">
                                <div class="page-title">
                                    <h1 class="theme-gradient">{{ $single_job->title }}</h1>
                                </div>
                                <ul class="rn-meta-list">
                                    <li>
                                        <i class="feather-user"></i>
                                        <a href="/">Irin Pervin</a>
                                    </li>
                                    <li>
                                        <i class="feather-calendar"></i>
                                        10 Dec 2021
                                    </li>
                                </ul>
                                <div class="thumbnail alignwide mt--60"><img class="w-100 radius"
                                        src="{{ $single_job->logo ? asset('storage/' . $single_job->logo) : asset('images/blog-grid/blog-01.jpg') }}"
                                        alt="Blog Images"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-details-content pt--60 rn-section-gapBottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="content">
                                <p>{{ $single_job->description }}</p>
                                <div class="category-meta">
                                    <div class="tagcloud">
                                        <a href="/single_job/{{ $single_job->email }}" target="blank">
                                            <i class="fa-solid fa-envelope"></i> Contact Employer
                                        </a>
                                        <a href="/single_job/{{ $single_job->website }}" target="blank">
                                            <i class="fa-solid fa-globe"></i> Visit Website
                                        </a>
                                    </div>
                                </div>
                                <!-- Check if the user is authenticated and if the authenticated user is the owner of the job -->
                                @auth
                                    @if (auth()->user()->id === $single_job->user_id)
                                        <div class="d-flex mt-5">
                                            <div class="me-4">
                                                <a class="btn-default" href="/single_job/{{ $single_job->id }}/edit">
                                                    <i class="fa-solid fa-pen-to-square"></i> Update Job</span>
                                                </a>
                                            </div>
                                            <div class="">
                                                <button class="btn-default" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal">
                                                    <span><i class="fa-solid fa-trash"></i></span> Delete Job</span>
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <button type="button" class="btn-close bg-secondary" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5 class="mt-4">Are you sure you want to delete this job?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-default" data-bs-dismiss="modal">Cancel</button>

                            <form method="POST" action="/single_job/{{ $single_job->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-default">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Advance Pricing Area  -->
</x-layouts>
