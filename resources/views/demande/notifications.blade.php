@extends('layouts.master')

@section('content')
<div class="box">
    <div class="box-body">
        <div class="table-responsive">
            <div id="example5_wrapper" class="dataTables_wrapper no-footer">
                <table id="example5" class="table table-hover dataTable no-footer" role="grid"
                    aria-describedby="example5_info">
                    <tbody>
                        @foreach (auth()->user()->notifications as $notification)
                        <tr role="row" class="even">
                        <td class="w-20 sorting_1"><i class="fa {{ $notification->read_at != null ? 'fa-check text-info' : 'fa-square-o' }} pt-15"></i></td>
                            <td class="">
                                <p class="mb-0">
                                    <a href="#">Une nouvelle demande a traiter</a>
                                    <small class="sidetitle">Identifiant: <b>#{{ $notification->data['identifiant'] }}</b></small>
                                </p>
                                <p class="mb-0">Envoyer par: <b>{{ $notification->data['user_name'] }}</b></p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>
@endsection
