@extends('themes.layout.index')
@section('content')
    <section class="page">
        @include('themes.navigation.index')
        @include('themes.rooms.roomsList.roomGallery.index')
        @include('themes.blogs.blogList.index')
        
    </section>
@endsection
