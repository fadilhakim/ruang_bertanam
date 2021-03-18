<link rel="stylesheet" href="<?=base_url("assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css")?>">
<link rel="stylesheet" href="<?=base_url("assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css")?>">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

<style>
  .hg-item:hover {
    background-color: #eee;
  }

  .hg-item:hover h6 {
    color:#727cf5 !important;
  }
  .hg-item:hover p {
    color:#000 !important;
  }

  .admin-hg .card-body {
    padding: 0px;
  }
  .admin-hg {
    max-height: 330px;
    overflow-x: scroll;
  }

  .admin-hg .hg-item {
    padding: 1rem 1.5rem 1rem 1.5rem;
  }
  .admin-hg .card-body {
    position: relative;
    padding-top:0px !important;
  }
  .admin-hg .card-title {
    /* margin-left: -1.5rem; */
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
    padding-left: 1.5rem;
    padding-right: 1.5rem;
    padding-top: 1rem;
    padding-bottom: 1rem;
    position: sticky;
    top: 0px;
    left: 0px;
    width: 100%;
  }
  .badge {
    font-size: 90% !important;
  }
  .st-card {
    position: relative;
  }
  .incon {
    position: absolute;
    right: 5px;
    bottom: -15px;
  }
  .i-1 {
    color: #727cf5;
  }
  .i-2 {
    color: #66d1d1;
  }
  .i-3 {
    color: #10b759;
  }
  .i-4 {
    color: #ff3366;
  }
</style>
