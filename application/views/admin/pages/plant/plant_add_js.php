<script src="<?=base_url("admin_assets/vendors/sweetalert2/sweetalert2.min.js")?>"></script>
<!-- <script src="<?=base_url("admin_assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js")?>"></script> -->

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>

    function add_plant() { 
        $.ajax({
            url:"<?=base_url("admin/plant/add_process")?>",
            type:"post",
            data:{

            },
            dataType:'json',
            success:function(data) { 
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

    })

</script>