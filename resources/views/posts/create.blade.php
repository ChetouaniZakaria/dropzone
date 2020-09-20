@extends('layouts.master')

@section('title', 'Nouveau Post')

@section('content')
<link rel="stylesheet" href={{ asset("dropzone_js\dist\dropzone.css") }}>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src={{asset("dropzone_js\dist\dropzone.js")}}></script>


<form action="{{route('post.store') }}" enctype="multipart/form-data" method="POST">
    @csrf   
    <input type="text" id ="title" name ="title" />
    <div class="dropzone" id="myDropzone"></div>
    <button type="submit" id="submit-all"> upload </button>
</form>


<script>
Dropzone.options.myDropzone= {
    url: '{{route('post.store') }}',
    paramName: "file",
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 5,
    maxFiles: 5,
    maxFilesize: 1,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    init: function() {
        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

        // for Dropzone to process the queue (instead of default form behavior):
        document.getElementById("submit-all").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            dzClosure.processQueue();
        });

        //send all the form data along with the files:
        this.on("sendingmultiple", function(data, xhr, formData) {
            formData.append("title", $("#title").val());
            formData.append("_token", "{{ csrf_token() }}");
            // formData.append("lastname", jQuery("#lastname").val());
        });
    },
    success: function(response){
        console.log(response)    }
}

</script>
@endsection
