@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-8">
        <div class="box box-solid bg-dark">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper">
                        <table id="example"
                            class="table table-bordered table-hover display nowrap margin-top-10 w-p100 dataTable"
                            role="grid" aria-describedby="example_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending">#ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending">Code</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Office: activate to sort column ascending">Wilaya</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"aria-label="Age: activate to sort column ascending">
                                        Communes / Agences</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Start date: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wilayas as $wilaya)
                                    <tr>
                                        <td>{{ $wilaya->id }}</td>
                                        <td>{{ $wilaya->code }}</td>
                                        <td>{{ $wilaya->wilaya }}</td>
                                        <td>{{ count($wilaya->communes) }} / {{ count($wilaya->agences) }}</td>
                                        <td>
                                            <a href="" class="btn btn-info">Modifier</a>
                                            <a href="" class="btn btn-danger">Supprimer</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_info" id="example_info" role="status" aria-live="polite">
                            Affichage {{$wilayas->currentPage()}} à {{$wilayas->lastPage()}}
                            sur {{$wilayas->total()}}
                        </div>
                        {{ $wilayas->links('pagination::table') }}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
        <!-- /.col -->
    <div id="addwilaya" class="col-xl-4 col-lg-12">
        <addwilaya-component></addwilaya-component>
    </div>
    
</div>
@endsection
