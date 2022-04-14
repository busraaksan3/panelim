@extends('back.layout')
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Blog</h3>
            </div>
            <div class="card-body">
                <form action="{{route('blog.store')}}" method="post"
                            enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Resim Seç</label>
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
                            <input class="form-control" type="text" name="blog_title">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Slug</label>
                    <div class="row">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="blog_slug">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label>İçerik</label>
                    <div class="row">
                        <div class="col-xs-12">
                            <textarea class="form-control"  rows="10" name="blog_content"></textarea>
                           

                        </div>
                    </div>

                    <div class="form-group">
                        <label>Durum</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="blog_status" class="form-control">
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                </select>
                            </div>
                        </div>


                        <div align="right" class="card-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endsection
@section('css')
@endsection
@section('js')
@endsection
