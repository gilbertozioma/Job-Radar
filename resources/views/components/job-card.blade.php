@props(['job'])

<!-- Column container -->
<div class="col-lg-4 col-md-6 col-12 mt--30" data-sal="slide-up" data-sal-duration="700">
    <!-- Card container -->
    <div class="rn-card box-card-style-default">
        <!-- Inner container -->
        <div class="inner">
            <!-- Thumbnail section -->
            <div class="thumbnail">
                <!-- Job image with link to the single job page -->
                <a class="image" href="/single_job/{{ $job->id }}">
                    <img class="w-100" src="{{ $job->logo ? asset('storage/' . $job->logo) : asset('images/blog-grid/blog-01.jpg') }}" alt="Blog Image">
                </a>
            </div>
            <!-- Content section -->
            <div class="content">
                <!-- Meta information list -->
                <ul class="rn-meta-list">
                    <!-- Placeholder name (Goodnews) -->
                    <li><a href="#">Goodnews</a></li>
                    <li class="separator">/</li>
                    <!-- Placeholder date (14 June 2023) -->
                    <li>14 June 2023</li>
                </ul>
                <!-- Inner container within content section -->
                <div class="inner mt--20">
                    <!-- Render the 'job-tags' component and pass the 'tagsCsv' prop -->
                    <x-job-tags :tagsCsv="$job->tags" />
                </div>
                <!-- Job title as a clickable link to the single job page -->
                <h4 class="title"><a href="/single_job/{{ $job->id }}">{{ $job->title }}</a></h4>
            </div>
        </div>
    </div>
</div>
