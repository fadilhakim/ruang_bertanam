<div class="page-content" style="padding : 20px;">
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="padding : 10px;">
                <div class="card-header" style="margin-bottom : 20px;">
                
                     <h4 class="card-header-title">Group Roles <?=$rs_group["group_name"]?></h4>
                     <div class="card-tools">
                        
                     
                     </div>
                </div>
                <div class="card-body">
                    <form id="group-roles-form">
                        <div id="treeview_container"  >
							
								<ul id="treeview" class="hummingbird-base">
									
									<?php 
										foreach($menu as $row) {

                                            $chi = $this->group_model->check_menuid_group_menu($group_id,$row["id"]);
                                            $checked = "";
                                            if(isset($chi["authorized"])) {
                                                if($chi["authorized"] == 1) {
                                                    $checked = "checked";
                                                }
                                            }
                                           
                                    ?>
								
									<li>
									
										<label>
											<input class="" name="menus" id="<?=$group_id?>_<?=$row["id"]?>" 
												   value="<?=$row["id"]?>" 
												   type="checkbox" <?=$checked?> />

											<label for="<?=$group_id?>_<?=$row["id"]?>">
												<?=$row["menu_name"]?>
											</label>
										</label>
										
									</li>
									<?php 
										}
									?>
								</ul>
									
							</div>

							
							<input type="hidden" name="group_id" id="group_id" value="<?=$group_id?>" />
						
							<button type="button" onclick="update_group_roles()" class="btn btn-primary" id="btn-modal-update-group-roles">Update Roles</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
