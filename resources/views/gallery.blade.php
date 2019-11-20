@extends('parts.layout')
@section('content')
<div class="elitteh-pictures">
        <h1>{{ $name }}</h1>
        @for ($i = 1; $i <= $amount; $i++)
            <a href="/gallery/{{ $folder }}/{{$i}}_{{$i}}.jpg" data-lightbox="image-1">
                <div class="gal-img" style="background:url(/gallery/{{ $folder }}/thumbs/{{$i}}_{{$i}}.jpg);"></div>
            </a>
        @endfor
</div>
@endsection
