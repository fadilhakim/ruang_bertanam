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
                     <h4 class="card-header-title" style="width:90%"><?=$title?></h4>
                    
                </div>
                <div class="card-body">
                    <form id="form-plant">
                        <input type="hidden" id="plant_id" name="plant_id" value=<?=$this->uri->segment(4) ? $this->uri->segment(4) : "" ?> >
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label> Plant Name </label>
                                <input type="text" id="plant_name" name="plant_name" class="form-control" value="" />
                            </div>
                            <div class="form-group col-md-6">
                                <label> Scientific Name</label>
                                <input type="text" id="scientific_name" name='scientific_name' class="form-control" value="" />
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label> Family Plant </label>
                                <div class=" input-group">
                                    <select class="form-control" id="family_plant_id" name="family_plant_id">
                                        <option value="">-- Please Select Family Plant --</option>
                                        <?php foreach($plant_family_list as $plant_family){ ?>
                                            <option value="<?=$plant_family["id"]?>"><?=$plant_family["family_name"]?></option>
                                        <?php } ?>
                                    </select>
                                    <button class="btn btn-primary" type="button" id="button-addon2"> add Family Plant</button>
                                </div>
                            </div>
                          
                             <div class="form-group col-md-6">
                                <label> Price </label>
                                <input type="text" class="form-control" id="price" name="price">
                            </div>
                        </div>
                        
                        <div class="form-group" >
                            <label> Description </label>
                            <textarea class="form-control" rows="5" id="description" name="form-control"></textarea>
                        </div>
                        
                        <div class="row"> 
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="button" id="action_button" > 
                                    <?=$button_text?>
                                </button>
                            </div>
                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
