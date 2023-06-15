<x-layouts>
    <!-- Start Timeline-Style-One  -->
    <div class="rwt-timeline-area rn-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                        <h4 class="subtitle "><span class="theme-gradient">Manage Jobs</span></h4>
                        <h2 class="title w-600 mb--20">See Jobs you have created!</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="rn-timeline-wrapper timeline-style-one position-relative">
                        <div class="timeline-line"></div>
                        @if (count($jobs) != 0)
                            @foreach ($jobs as $jobradar)
                                <div class="single-timeline mt--50">
                                    <div class="timeline-dot">
                                        <div class="time-line-circle"></div>
                                    </div>
                                    <div class="single-content">
                                        <div class="inner">
                                            <div class="row row--30 align-items-center">
                                                <div class="col-lg-6 mt_md--40 mt_sm--40 order-2 order-lg-1">
                                                    <div class="content">
                                                        <span class="date-of-timeline">{{ auth()->user()->name }}</span>
                                                        <h2 class="title" data-sal="slide-up" data-sal-duration="700"
                                                            data-sal-delay="100">{{ $jobradar->title }}
                                                        </h2>
                                                        <p class="description" data-sal="slide-up"
                                                            data-sal-duration="700" data-sal-delay="200">
                                                            {{ $jobradar->description }}
                                                        </p>

                                                        <div class="row row--50">
                                                            <div class="col-lg-6 col-md-6 col-8 mt--10">
                                                                <div class="read-morebtn" data-sal="slide-up"
                                                                    data-sal-duration="700" data-sal-delay="300">
                                                                    <a class="btn-default"
                                                                        href="/single_job/{{ $jobradar->id }}/edit"><span><i
                                                                                class="fa-solid fa-pen-to-square"></i>
                                                                            Update Job</span></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-8 mt--10">
                                                                <div class="read-morebtn" data-sal="slide-up"
                                                                    data-sal-duration="700" data-sal-delay="300">
                                                                    <button class="btn-default" data-bs-toggle="modal"
                                                                        data-bs-target="#deleteModal"><span><i
                                                                                class="fa-solid fa-trash"></i> Delete
                                                                            Job</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 order-1 order-lg-2">
                                                    <div class="thumbnail">
                                                        <img class="w-100"
                                                            src="{{ $jobradar->logo ? asset('storage/' . $jobradar->logo) : asset('images/blog-grid/blog-01.jpg') }}"
                                                            alt="Corporate Html Template">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="h2 mt--10 mt--100 text-center text-danger">Jobs you create will appear here 😉</p>
                        @endif
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
                            <h5 class="mt-4">Are you sure you want to
                                delete this job?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-default" data-bs-dismiss="modal">Cancel</button>
                            <form method="POST" action="/single_job/{{ $jobradar->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-default">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Timeline-Style-One  -->
</x-layouts>
