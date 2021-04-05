<div class="box lt" >
    <div class="box-header">
      <h2>Latest MoM</h2>
    </div>
    <div class="box-body">
     <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <td><strong>No</strong></td>
            <td><strong>NO. MOM</strong></td>
            <td><strong>MOM Date</strong></td>
            <td><strong>MOM File</strong></td>
          </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        <?php foreach($order_by_asc as $row) : ?>
          <tr>
            <td><?= $i++ ?></td>
            <td><?= $row['mo_mom'] ?></td>
            <td><?= $row['mom_date'] ?></td>
            <td>
            <a style="color:blue; font-size:12px; letter-spacing:0.5px; text-decoration:underline !important;"
                href="<?= base_url("mom/download") ?>/<?= $row['id'] ?>">
                <i class="fa fa-download">&nbsp;</i>  <?= $row['file_name_mom'] ?>
            </a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
     </div>
      

    </div>
    

</div>