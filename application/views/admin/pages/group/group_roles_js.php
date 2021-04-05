<script src="<?=base_url("assets/vendors/hummingbird/hummingbird-treeview.js")?>"></script>
<script src="<?=base_url("assets/vendors/sweetalert2/sweetalert2.min.js")?>"></script>
<script>
    function update_group_roles(){

		var group_id = $("#group_id").val()
		var menus = []
		var $boxes = $("input[name=menus]:checked").val()
		
        $("input[name=menus]:checked").each(function(i){
          menus[i] = $(this).val();
        });

		// $boxes.each(function( item ){
		// 	// Do stuff here with 
		// 	console.log("item => ", item)
		// 	menus.push( item )
		// });
		//console.log(" boxes => ",menus)
		

        $.ajax({
            url:"<?=base_url("group/roles/update")?>",
            type:"post",
            data:{
                group_id:group_id,
				menus:menus
            },

            dataType:"json",
            success:function(res, data) {

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
            
            },
            error:function(jqXHR, exception){
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
            }
        })
    }

	$(function(){
       

        $("#group-roles-form").submit(function(e){
            // update group
			//alert("test")
            update_group_roles()
            e.preventDefault()
        })
    })
</script>
