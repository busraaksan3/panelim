@extends('back.layout')
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Blog</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <small><li>{{ $error }}</li></small>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('blog.update', $blogs->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @isset($blogs->blog_file)
                        <div class="form-group">
                            <label> Image</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img width="100" src="/images/blogs/{{ $blogs->blog_file }}" alt="">
                                </div>
                            </div>
                        </div>
                    @endisset
                    <div class="form-group">
                        <label>Select Image</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="blog_file" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="blog_title"
                                    value="{{ $blogs->blog_title }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="blog_slug"
                                    value="{{ $blogs->blog_slug }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" rows="10" name="blog_content">{{ $blogs->blog_content }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Durum</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <select name="blog_status" class="form-control">
                                        <option {{ $blogs->blog_status == 1 ? "selected=''" : '' }} value="1">Aktif
                                        </option>
                                        <option {{ $blogs->blog_status == 0 ? "selected=''" : '' }} value="0">Pasif
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="old_file" value="{{ $blogs->blog_file }}">

                            <div align="right" class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@section('css')
@endsection
@section('js')
@endsection
