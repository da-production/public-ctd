@extends('layouts.master')

@section('content')
<div class="row">

    <!-- /.col -->
    <div class="col-xl-12 col-lg-12">
        @if (session()->get('success'))
        <div class="alert alert-success my-1">
            {{ session()->get('success') }}
        </div>
        @endif

        <div class="box box-solid bg-black">
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('wilaya.store') }}" method="post">
                    <div class="row">
                        @csrf
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Wilaya</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="wilaya" type="text" value="{{ old('wilaya') }}">
                                    @error('wilaya')
                                    <div class="alert alert-danger my-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Code</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="code" type="text" value="{{ old('code') }}">
                                    @error('code')
                                    <div class="alert alert-danger my-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-info">Ajouter</button>
                                    <input type="reset" class="btn btn-warning" value="Vider les champs">
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
