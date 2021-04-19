<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> Plant </li>
            <li class="breadcrumb-item active"> Plant List </li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                     <h4 class="card-header-title" style="width:90%">Plant List</h4>
                     <div class="card-tools">
                        <a class="btn btn-primary" href="<?=base_url("admin/plant/add")?>"> 
                            <i class='fa fa-plus'>&nbsp;</i>Add Plant 
                        </a>
                     
                     </div>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive" style="overflow : hidden;">
                        <table id="plant-table" class="table">
                            <thead>
                                <th> ID</th>
                                <th> Plant Name </th>
                                <th> Scientific Name </th>
                                <th> Price </th>
                               
                                <th> Action </th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
