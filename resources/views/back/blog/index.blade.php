@extends('back.layout')
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Blog</h3>
            </div>
            <div class="card-body">
                <div align="right">
                    <a href="{{ route('blog.create') }}"><button class="btn btn-primary"><i
                                class="fa fa-plus"></i></button></a> <br>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>

                                <th>Başlık</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['blog'] as $blog)
                                <td>{{ $blog['blog_title'] }}</td>
                                <td width="5"><a href="{{ route('blog.edit', $blog->id) }}"><i
                                            class="fa fa-pencil-square"></i></a></td>
                                <td width="5"><a href="javascript:void(0)"><i class="fa fa-trash-o" id='click1'></i></a>
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
    <script>
        $(document).on("click", "#click1", function(e) {
            $('body').removeClass('timer-alert');

            swal({
                    title: "Uyarı",
                    text: "Veri silinecektir, emin misiniz?",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: 'Vazgeç',
                    confirmButtonText: 'Evet,sil'
                },
                function() {
                    window.location.href = "blog/" + {{ $blog->id }};
                });
        });
    </script>
@endsection
@section('css')
@endsection
@section('js')
@endsection
