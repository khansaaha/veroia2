@extends('layouts.app')

@section('title', 'Home')

@section('content')
    
@if(isset($error))
    <p>Error: {{ $error }}</p>
@else
    <img id="imagePreview" class="m-auto w-auto max-h-[300px]" src="data:image/png;base64,{{ base64_encode($result) }}" alt="API Image">
    <!-- Download button -->
    <a href="#" id="downloadButton" download="image.png') }}">Download Image</a>
    <a href="/" class="btn">Go to Home</a>
@endif





</body>
</html>

@endsection