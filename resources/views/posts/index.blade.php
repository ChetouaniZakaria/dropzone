@extends('layouts.master')

@section('title', 'Liste des Postes')
    
@section('content')

<link rel="stylesheet" href={{ asset("dropzone_js\dist\dropzone.css") }}>
<link rel="stylesheet" href={{ asset("viewbox-master\\viewbox.css") }}>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src={{asset("dropzone_js\dist\dropzone.js")}}></script>
<script src={{asset("viewbox-master\jquery.viewbox.js")}}></script>
<div class="container">
    {{-- <form action="{{route('post.store') }}"
      class="dropzone" method="POST" enctype="multipart/form-data"
      id="my-awesome-dropzone">
      @csrf

    </form> --}}

        <div class="row">

@forelse ($posts as $post)

            <div class="col-md-4">
                <div class="card text-left">
                   @foreach ($post->images as $key => $image)

                    @if ($post->images->first()== $image)
                        <a id="link_image" href="{{ asset('storage\\'.$image->path) }}" title="Image Title" class="image-link">

                                <img class="card-img-top" src="{{ asset('storage\\'.$image->path) }}" alt="img">

                        </a>
                    @endif
                       
                   @endforeach

                    <div class="card-body">
                    <h4 class="card-title">{{ $post->title }}</h4>
                    <p class="card-text">{{ $post->images->first() }}</p>
                    </div>
                </div>
            </div>
        
        
@empty
</div>

        <span class="badge badge-primary">No card</span>

@endforelse
    

</div>
    

<script>

    $('#link_image').click()

$(function(){
	$('.image-link').viewbox({fullscreenButton: true});
});
</script>

@endsection