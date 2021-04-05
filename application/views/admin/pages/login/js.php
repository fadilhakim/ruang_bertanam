<script src="<?=base_url("assets/vendors/sweetalert2/sweetalert2.min.js")?>"></script>
<script>

function login(nik, password) {
	$.ajax({
        type:"post",
        url:"<?=base_url("login/process")?>",
        // contentType: "application/json",
        dataType: "json",
        data:{
            nik:nik,
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

function auth(nik, password) {
	login(nik,password)
	// $.ajax({
	// 	type:"post",
	// 	url:"http://10.80.253.94/portal/api/auth",
	// 	dataType:"json",
	// 	data:{
    //         username:nik,
    //         password:password
    //     },
	// 	success:function(res){
    //         if(res === 1) {
    //             // window.location.replace("<?=base_url()?>");
	// 			login(nik,password)
    //         } else {
	// 			Swal.fire({
    //                 title: '<strong> Error !</strong>',
    //                 icon: 'error',
    //                 text:" Autentikasi gagal"
    //             })

    //         }
    //     },
    //     error:function(xhr) {

    //     }
	// })
}

function auth2(nik, password) {
	$.ajax({
		type:"post",
		url:"http://10.80.253.94/portal/api/auth",
		dataType:"json",
		data:{
            username:nik,
            password:password
        },
		success:function(res){
            if(res === 1) {
                // window.location.replace("<?=base_url()?>");
				login(nik,password)
            } else {
				Swal.fire({
                    title: '<strong> Error !</strong>',
                    icon: 'error',
                    text:" Autentikasi gagal"
                })

            }
        },
        error:function(xhr) {

        }
	})
}

$("#login-form").submit(function(e){

    var nik = $("#form-nik-login").val()
    var password = $("#form-password-login").val()

	//login(nik, password)

    // auth2(nik, password)

    auth(nik, password)

    e.preventDefault()
})
</script>
