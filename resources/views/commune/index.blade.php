@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="box box-solid bg-dark">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper">
                        <form action="" class="row">
                            @csrf
                            <div class="form-group col-md-3">
                                <h5>Code Commune</h5>
                                <div class="controls">
                                    <input type="text" name="code_commune" class="form-control"> 
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <h5>Commune </h5>
                                <div class="controls">
                                    <input type="text" name="commune" class="form-control" > 
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <h5>Wilaya</h5>
                                <select class="form-control select2 w-p100" name="wilaya_id">
                                    <option value=""></option>
                                  @foreach ($wilayas as $wilaya)
                                      <option value="{{ $wilaya->code }}">{{ $wilaya->wilaya }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3 pt-4">
                                <h5 class="mt-2"><span class="text-danger"></span></h5>
                                <button type="submit" class="btn btn-info">Rechercher</button>
                            </div>
                        </form>
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
                                        aria-label="Office: activate to sort column ascending">Commune</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"aria-label="Age: activate to sort column ascending">
                                        Wilaya</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        aria-label="Start date: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($communes as $commune)
                                    <tr>
                                        <td>{{ $commune->id }}</td>
                                        <td>{{ $commune->code }}</td>
                                        <td>{{ $commune->lib_commune }}</td>
                                        <td>{{ !is_null($commune->wilaya) ? $commune->wilaya->wilaya : '' }}</td>
                                        <td>
                                            <a href="" class="btn btn-info">Modifier</a>
                                            <a href="" class="btn btn-danger">Supprimer</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_info" id="example_info" role="status" aria-live="polite">
                            Affichage {{$communes->currentPage()}} à {{$communes->lastPage()}}
                            sur {{$communes->total()}}
                        </div>
                        {{ $communes->links('pagination::table') }}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
@endsection
