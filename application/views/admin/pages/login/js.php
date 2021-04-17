<script src="<?=base_url("admin_assets/vendors/sweetalert2/sweetalert2.min.js")?>"></script>
<script>

function login(username, password) {
	$.ajax({
        type:"post",
        url:"<?=base_url("admin/login/process")?>",
        // contentType: "application/json",
        dataType: "json",
        data:{
            username:username,
            password:password
        },
        success:function(res){
            if(res.logged_in == true) {
                //window.location.replace("<?=base_url()?>");
                window.location.reload()
            } else {
				Swal.fire({
                    title: '<strong> Error !</strong>',
                    icon: 'error',
                    html:res.message
                })

            }
        },
        error:function(xhr) {

        }

    })
}

$("#login-form").submit(function(e){

    var username = $("#form-username-login").val()
    var password = $("#form-password-login").val()

    login(username, password)

    e.preventDefault()
})
</script>
