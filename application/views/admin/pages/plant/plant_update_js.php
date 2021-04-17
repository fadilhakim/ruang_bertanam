<script src="<?=base_url("admin_assets/vendors/sweetalert2/sweetalert2.min.js")?>"></script>
<!-- <script src="<?=base_url("admin_assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js")?>"></script> -->

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


<script>

    function update_plant() { 
        $.ajax({
            type:"post",
            url:"<?=base_url("")?>",
            data:{

            },
            success:function(data) { 
                
            }
        })
    }


    $(function(){
        

        update_plant()
    })

</script>