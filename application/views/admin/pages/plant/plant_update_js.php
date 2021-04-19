<script src="<?=base_url("admin_assets/vendors/sweetalert2/sweetalert2.min.js")?>"></script>
<!-- <script src="<?=base_url("admin_assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js")?>"></script> -->

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


<script>

    function get_detail_plant() {

        var form = "#form-plant"

         $.ajax({
            url:"<?=base_url("admin/plant/get_plant_detail")?>",
            type:"post",
            data:{
                plant_id:$(`${form} #plant_id`).val(),
            },
            dataType:'json',
            success:function(res) { 
                if(res.success === true) {
                    //$(`${form} #plant_id`).val(res.data.id),
                    $(`${form} #plant_name`).val(res.data.plant_name),
                    $(`${form} #scientific_name`).val(res.data.scientific_name),
                    $(`${form} #family_plant_id`).val(res.data.m_family_plant_id),
                    $(`${form} #price`).val(res.data.price),
                    $(`${form} #description`).val(res.data.description)
                } else {
                    Swal.fire({
                        title: '<strong> Error !</strong>',
                        icon: 'error',
                        html:res.message
                    })
                }
            }
         })
    }

    function update_plant() { 
         var form = "#form-plant"

        $.ajax({
            url:"<?=base_url("admin/plant/update_process")?>",
            type:"post",
            data:{
                plant_id:$(`${form} #plant_id`).val(),
                plant_name:$(`${form} #plant_name`).val(),
                scientific_name:$(`${form} #scientific_name`).val(),
                family_plant_id:$(`${form} #family_plant_id`).val(),
                price:$(`${form} #price`).val(),
                description:$(`${form} #description`).val()
            },
            dataType:'json',
            success:function(res) { 
                if(res.success === true) {
                    Swal.fire(
                        'Success!',
                        res.message,
                        'success'
                    )
                } else {
                    Swal.fire({
                        title: '<strong> Error !</strong>',
                        icon: 'error',
                        html:res.message
                    })
                }
            }
        })
    }


    $(function(){
        
        get_detail_plant()

        var form = "#form-plant"

        $(`${form} #family_plant_id`).select2({
            width:"80%",
            display:"block"
        })

        $(form).submit(function(e){
            update_plant()
        })

        $("#action_button").click(function(e){
            update_plant()
        })

        
    })

</script>