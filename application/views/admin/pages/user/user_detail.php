<div class="page-content" style="padding : 20px;">
    <div class="row">
        <div class="col-md-12">
            <form id="user-update-form">
                <div class="card" style="padding : 10px;">
                    <div class="card-header" style="margin-bottom : 20px;">
                        <h4 class="card-header-title">User Detail</h4>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="user_id" id="user_id" value="<?=$user["id"]?>">

						<div class="form-group">
							<label for="username"> User NIK </label>
                            <select name="karyawan_id" id="karyawan_id" disabled>
								<option value=""> -- please select User NIK -- </option>
                                <?php foreach($get_user_nik as $row_nik){ 
                                    
                                        $selected = "";
                                        if($row_nik["username"] == $user["username"]) {
                                            $selected="selected";
                                        }
                                    ?>
                                    <option <?=$selected?> value="<?=$row_nik["karyawan_id"]?>"><?=$row_nik["username"]?> - <?=$row_nik["nama"]?> </option>     
                                <?php } ?>
							</select>
						</div>

                        <div class="form-group">
                            <label for="username"> Username </label>
                            <input readonly type="text" id="username" name="username" value="<?=$user["username"]?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="fullname"> Fullname </label>
                            <input readonly type="text" id="fullname" name="fullname" value="<?=$user["fullname"]?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Status"> Status </label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="status form-check-input" value="1" name="status" <?=$user["status_id"] == 1 ? "checked" : ""?> >
                                    Active
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="status form-check-input" value="0" name="status" <?=$user["status_id"] == 0 ? "checked" : ""?> >
                                    Inactive
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="group"> Group </label>
                            <select class="form-control" id="group" name="group">
                                <option value=""> -- please select group -- </option>
                                <?php 
                                 
                                foreach($groups as $row){ 
                                    $selected = "";
                                    if($row["id"] == $user["group_id"]) {
                                        $selected = "selected='selected'";
                                    }
                                ?>
                                    <option value="<?=$row["id"]?>" <?=$selected?>><?=$row["group_name"]?></option>     
                                <?php } ?>
                            </select>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <label for="email"> Email </label>
                            <input readonly type="email" class="form-control" name="email" id="email" value="<?=$user["email"]?>">
                        </div>
                         <div class="form-group" style="display:none">
                            <label for="password"> Password </label>
                            <input readonly  type="hidden" class="form-control" name="password" id="password">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">
                            <i data-feather="edit">&nbsp;</i>
                            Update User
                        </button>    
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
