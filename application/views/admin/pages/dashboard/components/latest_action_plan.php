<div class="box lt" >
    <div class="box-header">
      <h2>Latest Updated Action Plan</h2>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <td>
                        <strong>No</strong>
                    </td>
                    <td>
                        <strong>Arahan</strong>
                    </td>
                    <td>
                        <strong>PIC</strong>
                    </td>
                    <td>
                        <strong>Direktorat</strong>
                    </td>
                    <td><strong>No MOM</strong></td>
                    <td><strong>Target Date</strong></td>
                    <td><strong>Status Progress</strong></td>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach($action_plan_order_asc as $row) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row['arahan'] ?></td>
                    <td>
                        <?= $row['pic_name'] ?>
                    </td>
                    <td>
                        <?= $row['direktorat'] ?>
                    </td>
                    <td>
                        <a style="color:blue" target="_blank" href="<?= base_url("mom/detail_mom") ?>/<?= $row['id'] ?>">
                            <?= $row['mo_mom'] ?>
                        </a>
                    </td>
                    <td><?= $row['target_date'] ?></td>
                    <td>
                        <?php 
                            if($row['status_progress'] == 'On Progress' || $row['status_progress'] == 'Perbaikan') { ?>
                                <span class="badge badge-info">
                                    <?= $row['status_progress'] ?>
                                </span>  
                           <?php } else if ($row['status_progress'] == 'Verified'){ ?>
                                <span class="badge badge-success">
                                    <?= $row['status_progress'] ?>
                                </span> 
                          <?php } else {  ?>
                                <span class="badge" style="background-color:#f77a99;">
                                <?= $row['status_progress'] ?>
                            </span>  
                        <?php } ?>              
                         
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    

</div>