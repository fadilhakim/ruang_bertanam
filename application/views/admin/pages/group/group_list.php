<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> Group </li>
            <li class="breadcrumb-item active"> Group list </li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="title" style="margin-left: 10px;">Group List</h2>
                     </div>
                     <div class="col-lg-6">
                        <div class="card-tools">
                            <a href="<?=base_url("group/add")?>" class="btn btn-success float-right text-white"> 
                                <i data-feather="plus">&nbsp;</i>
                                Add Group
                            </a>
                        </div>
                     </div>
                </div>
                <div style="width : 100%; height : 50px;"></div>
                <div class="card-body table-responsive" style="overflow : hidden;">
                   <table id="group-table" class="table ">
                       <thead>
                           <th> ID</th>
                           <th> Group Name </th>
                           <th> Group Menu </th>
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
