<div class="col-lg-4 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
    <div class="card admin-hg">
        <div class="card-body" style="padding-left:0px; padding-right:0px;">

            <h6 style="background-color: #fbbc06;" class="card-title mb-0">Highligted Projects</h6>

            <div class="d-flex flex-column">

                <?php foreach($project_update_highlighted as $row){
                    $project = explode("-",$row["project_code"]);
                ?>
                    <a data-toggle="modal" style="cursor:pointer;" data-target="#modalKeteranganHighlighted<?= $row['h_workorder_id'] ?>" class="hg-item d-flex align-items-center border-bottom pb-3">
                        <div class="w-100">
                            <div class="d-flex justify-content-between">
                            <h6 style="" class="text-body mb-2">[ <?=$project[0]?> ]</h6>
                            <p class="text-muted tx-12">RFS : <?=$row["RFS"]?></p>
                            </div>
                            <p class="text-muted tx-13">
                              <?= strlen($project[1]) > 60 ? substr($project[1],0,60)."..." : $project[1]?>

                            </p>
                        </div>
                    </a>
                    <!-- Modal Keterangan Highligted -->
                    <div class="modal fade" id="modalKeteranganHighlighted<?= $row['h_workorder_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="background-color: #fbbc06;">
                            <h5 class="modal-title" style="color:#000;" id="exampleModalLabel"><strong>[ <?=$project[0]?> ]</strong> <?=$project[1]?> </h5>

                          </div>
                          <div class="modal-body">
                            <div class="form-group mb-0 row" style="margin-top:-15px;">
                              <div class="col-lg-12">
                                <label class="col-form-label">Alasan project ini di Highlight :</label>
                              </div>
                              <div class="col-lg-12">
                                <textarea id="maxlength-textarea" class="form-control" maxlength="100" readonly rows="8" placeholder=""><?=$row["highlighted_desc"]?></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a style="background-color: #fbbc06; border-color: #fbbc06; color:#000;" href="<?=base_url("all-projects/update/$row[h_workorder_id]")?>" class="btn btn-primary">See Detail Project</a>
                          </div>
                        </div>
                      </div>
                    </div>

                <?php } ?>



            </div>
        </div>
    </div>
</div>

<!-- Modal Keterangan Highligted -->
<div class="modal fade" id="modalKeteranganHighlighted" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#727cf5;">
        <h5 class="modal-title" style="color:#fff;" id="exampleModalLabel">Are You Sure Want to Highlight This Project ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group mb-0 row" style="margin-top:-15px;">
          <div class="col-lg-12">
            <label class="col-form-label">Keterangan :</label>
          </div>
          <div class="col-lg-12">
            <textarea id="maxlength-textarea" class="form-control" maxlength="100" rows="8" placeholder="Alasan untuk project ini perlu di Highlight"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
