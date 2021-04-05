<div class="row">
        <div class="col-sm-12">
          <a href="<?= base_url() ?>dashboard/detail_mom_selesai">
                <div class="box p-a">
                  <div class="pull-right m-r">
                    <i class="fa fa-check-square text-2x text-success m-y-sm"></i>
                  </div>
                  <div class="clear">
                    <div class="text-muted">Total Action Plan <span class="text-success" style="font-weight:bold">Selesai :</span></div>
                    <h4 class="m-0 text-md _600 text-3x"><?= $jumlah_selesai[0]['jumlah'] ?></h4>
                  </div>
                </div>
              </a>
          </div>

          <div class="col-sm-12">
            <a href="<?= base_url() ?>dashboard/detail_mom_selesai_sebagian">
                <div class="box p-a">
                  <div class="pull-right m-r">
                    <i class="fa fa-check text-2x text-warning m-y-sm"></i>
                  </div>
                  <div class="clear">
                    <div class="text-muted">Total Action Plan
                     <span class="text-warning" style="font-weight:bold"> Selesai Sebagian : 
                     </span>
                    </div>
                    <h4 class="m-0 text-md _600 text-3x"><?= $jumlah_selesai_sebagian[0]['jumlah'] ?></h4>
                  </div>
                </div>
              </a>
          </div>

          <div class="col-sm-12">
            <a href="<?= base_url() ?>dashboard/detail_mom_on_progress">
                <div class="box p-a">
                  <div class="pull-right m-r">
                    <i class="fa fa-spinner text-2x text-info m-y-sm"></i>
                  </div>
                  <div class="clear">
                    <div class="text-muted">Total Action Plan <span class="text-info" style="font-weight:bold"> Progress :</span></div>
                    <h4 class="m-0 text-md _600 text-3x">
                      <?= $on_progress[0]['jumlah'] ?>
                    </h4>
                  </div>
                </div>
              </a>
          </div>

      </div>