@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12 col-md-6 col-lg-3">
        <div class="box box-body bg-hexagons-dark pull-up">
            <div class="media align-items-center p-0">
                <div>
                    <h3 class="no-margin text-bold text-center">En Attente</h3>
                </div>
            </div>
            <div class="flexbox align-items-center mt-25">
                <div class="text-right">
                    <p class="no-margin font-weight-600"><span class="text-yellow"></span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-12" id="app">
        <!-- Chart -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Traffic Types</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                            class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection

