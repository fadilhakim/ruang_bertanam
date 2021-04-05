<div class="col-xl-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

        <div class="row">
            <div class="col-lg-6">
            <h6 class="card-title" style="font-size:16px;">
                Jumlah Node Per <span style="color:#727cf5"><strong>Periode Tanggal Terima Order</strong> </span>
            </h6>
            <p>
                Tanggal Filter : <span id="tto_start_date_span"> </span> sd <span id="tto_end_date_span"></span>
                <br>Total Node : <span id="tto_total_span"></span>
            </p>
            </div>
            <div class="col-lg-6">
            <button type="button" style="float:right; background-color:#ff0042; border-color:#ff0042; padding:4px" class="btn btn-primary" data-toggle="modal" data-target="#filterDateTTO">
                <i style="height:16px; margin-top:-2px" class="link-icon" data-feather="calendar"></i>
                Filter Tanggal
            </button>
            </div>

            <div class="modal fade" id="filterDateTTO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span style="color:#727cf5;">Filter Tanggal</span> <br>Jumlah Node per Periode Tanggal Terima Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="col-lg-6">
                        <h6 class="card-title" style="color:#727cf5;">Start Date :</h6>
                        <div style="margin-top:-15px;" class="input-group date datepicker" id="datePickerExample">
                        <input type="text" class="form-control" id="tto_start_date"><span class="input-group-addon"><i data-feather="calendar"></i></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h6 class="card-title" style="color:#727cf5;">End Date :</h6>
                        <div style="margin-top:-15px;" class="input-group date datepicker" id="datePickerExample">
                        <input type="text" class="form-control" id="tto_end_date"><span class="input-group-addon"><i data-feather="calendar"></i></span>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-tto-submit">Submit</button>
                </div>
                </div>
            </div>
            </div>

        <canvas id="chartjsBarTTO"></canvas>
        </div>
    </div>
</div>