<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> User </li>
            <li class="breadcrumb-item active"> User list </li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="title" style="margin-left: 10px;">User List</h2>
                    </div>
                    <div class="col-lg-6">
                        <div class="card-tools">
                            <a href="<?=base_url("user/add")?>" class="btn btn-success float-right text-white">
                                <i data-feather="plus">&nbsp;</i>
                                Add User
                            </a>
                        </div>
                    </div>
                </div>
                <div style="width : 100%; height : 50px;"></div>
                <div class="card-body table-responsive" style="overflow : hidden;">
                   <table id="user-table" class="table">
                       <thead>
                           <th> ID</th>
                           <th> Username </th>
                           <th> Fullname </th>
                           <th> Email </th>
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
