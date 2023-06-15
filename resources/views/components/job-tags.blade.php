@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv)
@endphp

  {{-- Convert the comma-separated tags string to an array --}}
<div class="tagcloud">
    @foreach ($tags as $tag)
        <a href="/?tag={{ $tag }}">{{ $tag }}</a>
    @endforeach
</div>
