@extends('layouts.auth')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> POsts Tables </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Posts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Posts</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Posts</h4>
                        <a href="{{ route('posts.create') }}" class="btn btn-gradient-primary">+ Add Post</a>
                        </p>
                        <table id="posts-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('storage/images/posts/'. $post->gallery->image) }}"
                                            style="width: 50%;" alt="Image">
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{!! Str::limit($post->description, 15) !!}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ $post->is_publish == 1 ? 'Published' : 'Draft' }}</td>
                                    <td>
                                        <a href='' class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                        <a href='' class="btn btn-success btn-sm"><i class="fa fa-edit"></i>
                                        </a>
                                        <a href='' class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(() => {
            $('#posts-table').DataTable();
        });
    </script>
    @endsection