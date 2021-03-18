<div class="col-lg-4 col-xl-4 stretch-card">
    <div class="card admin-hg">
        <div class="card-body" style="padding-left:0px; padding-right:0px;">

        <h6 style="background-color: #ff3366; color:#fff; font-weight:bold;" class="card-title mb-0">
            Projects Mendekati RFS :
            <i style="position:absolute; right:11px; top:13px;" class="link-icon" data-feather="alert-circle"></i>
        </h6>
        <br>
        <div class="table-responsive" style="padding:0 25px 0 25px !important;">
            <table class="table table-hover mb-0" >
            <thead>
                <tr>
                <th class="pt-0">#</th>

                <th class="pt-0">RFS Date</th>
                <th class="pt-0">No WO</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($project_update_rfs7 as $row){ ?>
                <tr>
                    <td>
                        <a href="<?=base_url("all-projects/update/$row[h_workorder_id]")?>">
                            <?=$row["no_wo"]?>
                        </a>
                    </td>
                    <td><?=$row["h_workorder_id"]?></td>
                    <td><?=$row["rfs"]?></td>
                </tr>
                <?php } ?>

            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
