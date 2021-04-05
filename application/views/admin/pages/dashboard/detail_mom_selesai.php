<div class="page-content" style="padding : 20px;">
<div class="row">
    <div class="col-md-12">
        <div class="card">
                <h2 class="title" style="margin-top : 40px; margin-left: 40px;">
                MoM <span class="badge badge-success">Selesai</span> 
              </h2>
              <div class="card-body">
              <br>
              <div class="row" style="padding : 20px;">
                <div class="col-md-12">
                    <div class="table-responsive">
                    <table ui-jp="dataTable" class="table table-striped b-t b-b" id="details-selesai">
                        <thead>
                            <tr>
                                <th  style="width:20%">MO MOM</th>
                                <th  style="width:25%">Tanggal</th>
                                <th  style="width:25%">Status Progress</th>
                                <th  style="width:15%">File Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($detail_selesai as $row) :  ?>
                                <tr>
                                    <td>
                                        <a style="color:blue" target="_blank" href="<?= base_url("mom/detail_mom") ?>/<?= $row['id'] ?>">
                                            <?= $row['mo_mom'] ?>
                                        </a>
                                    </td>
                                    <td><?= $row['mom_date'] ?></td>
                                    <td>
                                        <span class="text-info">
                                            <?= $row['status_progress'] ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a style="color:blue; font-size:12px; letter-spacing:0.5px; text-decoration:underline !important;"
                                            href="<?= base_url("mom/download") ?>/<?= $row['id'] ?>">
                                            <i class="fa fa-download">&nbsp;</i>  <?= $row['file_name_mom'] ?>
                                        </a>
                                   </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    </div>
                </div>
              </div>
              </div>
        </div>
    </div>
</div>
</div>


