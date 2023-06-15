<x-layouts>

    <!-- Display a message if no jobs are available -->
    @if (count($jobs) == 0)
        <h4 class="text-danger text-center mt-5">No Jobs Available</h4>
    @endif

    @include('partials._breadcrumb')

    <!-- Start Theme Style -->
    <div>
        <div class="rn-gradient-circle"></div>
        <div class="rn-gradient-circle theme-pink"></div>
    </div>
    <!-- End Theme Style -->

    <!-- Start Rn Blog Area -->
    <div class="main-content">
        @include('partials._search')
        <div class="rn-blog-area rn-section-gap">
            <div class="container">
                <div class="row mt_dec--30">
                    <div class="col-lg-12">
                        <div class="row row--15">
                            <!-- Loop through each job and render a job card component -->
                            @foreach ($jobs as $job)
                                <x-job-card :job="$job" />
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="text-center mt--60">
                            <!-- Render pagination links for the job listings -->
                            {{ $jobs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Rn Blog Area -->
</x-layouts>
