
<script src="<?=base_url("assets/vendors/sweetalert2/sweetalert2.min.js")?>"></script>
<script>
    function group_add() {

        var group_name = $("#group_name").val();
     
        $.ajax({
            url:"<?=base_url("group/add/process")?>",
            type:"post",
            data:{
                group_name:group_name,
              
            },
            dataType:"json",
            // contentType:"application/json",
            success:function(res, data) {

               

                if(res.success === true) {
                    Swal.fire(
                        'Success!',
                        res.message,
                        'success'
                    )

                    setTimeout(() => {
                        window.location.href = "<?=base_url("group")?>";
                    }, 2000);
                } else {
                    Swal.fire({
                        title: '<strong> Error !</strong>',
                        icon: 'error',
                        html:res.message
                    })
                }
            },
            error:function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                
                console.log(" err msg ==> ",msg)
            },
        })
    }

    function group_update() {
        var group_id  = $("#group_id").val();
        var group_name = $("#group_name").val();
     

        $.ajax({
            url:"<?=base_url("group/update/process")?>",
            type:"post",
            data:{
                group_id:group_id,
                group_name:group_name,
              
            },
            dataType:"json",
            // contentType:"application/json",
            success:function(res, data) {

                console.log(" res => ",res.message)

                if(res.success === true) {
                    Swal.fire(
                        'Success!',
                        res.message,
                        'success'
                    )

                    setTimeout(() => {
                        window.location.href = "<?=base_url("group")?>";
                    }, 2000);
                } else {
                    Swal.fire({
                        title: '<strong> Error !</strong>',
                        icon: 'error',
                        html:res.message
                    })
                }
            },
            error:function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                
                console.log(" err msg ==> ",msg)
            },
        })
    }

    $(function(){
        $("#group-add-form").submit(function(e){
            // add group
            group_add()
            e.preventDefault()
        })  

        $("#group-update-form").submit(function(e){
            // update group
            group_update()
            e.preventDefault()
        })
    })
</script>
