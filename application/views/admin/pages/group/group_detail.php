<div class="page-content">
    <div class="row">
        <div class="col-md-6">
            <form id="group-update-form">
                <div class="card" style="padding : 20px;">
                    <div class="card-header" style="margin-bottom : 20px;">
                        <h4 class="card-header-title">Group Detail</h4>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="group_id" id="group_id" value="<?=$group["id"]?>">
                        <div class="form-group">
                            <label for="group_name"> Group Name </label>
                            <input type="text" id="group_name" name="group_name" value="<?=$group["group_name"]?>" class="form-control">
                        </div>
                      
                        
                    </div>
                  
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">
                            <i data-feather="edit">&nbsp;</i>
                            Update Group
                        </button>    
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
