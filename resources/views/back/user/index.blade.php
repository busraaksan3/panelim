@extends('back.layout')
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Users</h3>
            </div>
            <div class="card-body">
                <div align="right">
                    <a href="{{ route('user.create') }}"><button class="btn btn-primary"><i class="fa fa-plus"></i></button></a> <br>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>

                                <th>User Name</th>
                                <th>Role</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['user'] as $user)
                                    <td>{{ $user->name }}</td>
                                    <td>{{$user->type}}</td>
                                    <td width="5"><a href="{{ route('user.edit', $user->id) }}"><i
                                                class="fa fa-pencil"></i></a></td>
                                    <td width="5"><a href="javascript:void(0)"><i
                                                class="fa fa-trash-o" id='click4'></i></a>

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
        $(document).on("click", "#click4", function(e) {
            $('body').removeClass('timer-alert');

            swal({
                    title: "Uyarı",
                    text: "Kullanıcı silinecektir, emin misiniz?",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: 'Vazgeç',
                    confirmButtonText: 'Evet,sil'
                },
                function() {
                   window.location.href = "user/" + {{ $user->id }};
                });
        });
    </script>
   
@endsection
@section('css')
@endsection
@section('js')
@endsection
