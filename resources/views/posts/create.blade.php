@extends('layouts.auth')

@section('title', 'Create Post')

@section('styles')
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">



@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Post </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Post</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Post</li>
                </ol>
            </nav>
        </div>
        {{-- @if (Session::has('success'))
        <div class="pt-3">
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
        @endif --}}
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Post</h4>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form class="forms-sample" action="{{ route('posts.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ old('title') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="category">Categories</label>
                                <select name="category" id="category" class="form-control" required>
                                    <option>Choose Option</option>
                                    @foreach ($categories as $category)
                                    <option @selected(old('category')==$category->id ) value="{{ $category->id }}">{{
                                        $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="is_publish">Published</label>
                                <select name="is_publish" id="is_publish" class="form-control" required>
                                    <option>Choose Option</option>
                                    <option @selected( old('is_publish')==1 ) value="1">Publish</option>
                                    <option @selected( old('is_publish')==0 ) value="0">Draft</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="file" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="summernote" cols="30" rows="10"
                                    required>{{
                                    old('description') }}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <a href="{{ route('posts.index') }}" class="btn btn-gradient-dark">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    @endsection

    @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>

    @endsection