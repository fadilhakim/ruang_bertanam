<div class="page-content" style="padding : 20px;">
    <div class="row">
        <div class="col-md-6">
            <form id="user-add-form">
                <div class="card" style="padding : 10px;">
                
                    <div class="card-header" style="margin-bottom : 20px;">
                    
                        <h4 class="card-header-title">User Add</h4>
                        <div class="card-tools">
                        
                        
                        </div>
                    </div>
                    <div class="card-body">
                        
					<div class="form-group">
							<label for="username"> User NIK </label>
                            <select name="karyawan_id" id="karyawan_id">
								<option value=""> -- please select User NIK -- </option>
                                <?php foreach($get_user_nik as $row_nik){ ?>
                                    <option value="<?=$row_nik["karyawan_id"]?>"><?=$row_nik["username"]?> - <?=$row_nik["nama"]?> </option>     
                                <?php } ?>
							</select>
						</div>

                        <div class="form-group">
                            <label for="username"> Username </label>
                            <input readonly type="text" id="username" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="fullname"> Fullname </label>
                            <input readonly type="text" id="fullname" name="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Status"> Status </label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="status form-check-input" value="1" name="status" >
                                    Active
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="status form-check-input" value="0" name="status" >
                                    Inactive
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="group"> Group </label>
                            <select class="form-control" id="group" name="group">
                                <option value=""> -- please select group -- </option>
                                <?php foreach($groups as $row){ ?>
                                    <option value="<?=$row["id"]?>"><?=$row["group_name"]?></option>     
                                <?php } ?>
                            </select>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <label for="email"> Email </label>
                            <input readonly type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group" style="display:none">
                            <label for="password"> Password </label>
                            <input readonly  type="hidden" class="form-control" name="password" id="password">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">
                            <i data-feather="plus">&nbsp;</i>
                            Add User
                        </button>    
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
