
<script src="<?=base_url("assets/vendors/sweetalert2/sweetalert2.min.js")?>"></script>
<script>

	function user_nik_detail(id) {

		$.ajax({
			url:"<?=base_url("user/get_user_nik_detail")?>",
			type:"POST",
            dataType:"json",
			data:{
				karyawan_id:id
			},
			success:function(res) {

                // console.log(res)

				$("#username").val(res.message.username);
				$("#fullname").val(res.message.nama);
				$("#email").val(res.message.email);
			}
		})

		
	}

    function user_add() {

        var username = $("#username").val();
        var fullname = $("#fullname").val();
        var group    = $("#group").val();
        var status   = $(".status:checked").val();
        var email    = $("#email").val();
        // var password = $("#password").val()

        $.ajax({
            url:"<?=base_url("user/add/process")?>",
            type:"post",
            data:{
                username:username,
                fullname:fullname,
                group:group,
                status:status,
                email:email,
                // password:password
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
                        window.location.href = "<?=base_url("user")?>";
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

    function user_update() {
        var user_id  = $("#user_id").val();
        var username = $("#username").val();
        var fullname = $("#fullname").val();
        var group    = $("#group").val();
        var status   = $(".status:checked").val();
        var email    = $("#email").val();
        var password = $("#password").val()

        $.ajax({
            url:"<?=base_url("user/update/process")?>",
            type:"post",
            data:{
                user_id:user_id,
                username:username,
                fullname:fullname,
                group:group,
                status:status,        
                email:email,
                password:password
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
                        window.location.href = "<?=base_url("user")?>";
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
        $("#user-add-form").submit(function(e){
            // add user
            user_add()
            e.preventDefault()
        })  

        $("#user-update-form").submit(function(e){
            // update user
            user_update()
            e.preventDefault()
        })

        $("#user-add-form #karyawan_id").change(function(){

            const karyawan_id = $("#user-add-form #karyawan_id").val()
            console.log("noo hammooonn", karyawan_id)
            user_nik_detail(karyawan_id)
        })
    })
</script>
