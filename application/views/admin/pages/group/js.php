<!-- plugin js for this page -->
<script src="<?=base_url("assets/vendors/datatables.net/jquery.dataTables.js")?>"></script>
<script src="<?=base_url("assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js")?>"></script>
<script src="<?=base_url("assets/vendors/sweetalert2/sweetalert2.min.js")?>"></script>
<!-- end plugin js for this page -->

<!-- custom js for this page -->
<script>
function confirmModal(data) {

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger mr-2'
        },
        buttonsStyling: false,
    })

    Swal.fire({
        title: 'Delete group '+data.group_name,
        text: "Are you sure you want to delete this group !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'mr-2',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
            delete_group(data.id)
            $('#group-table').DataTable().ajax.reload();

        } else if (
          // Read more about handling dismissals
          result.dismiss === Swal.DismissReason.cancel
        ) {
          
        }
      })
}

function delete_group(group_id) {
    $.ajax({
        url:"<?=base_url("group/delete")?>",
        type:"post",
        data:{
            group_id:group_id
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

function groupTable() {

    // tambahan value

    $("#group-table").DataTable({
        serverSide: true,
        ajax: {
            data:{
                foo:"bar"
                // tambahan value
            },
            url: "<?=base_url("group/list")?>",
            type: 'POST'
        },
        columns:[
            {"data": "id",width:50},
            {"data": "group_name",width:100},
            {"data": "group_menu",width:200},
            { data:"action", width:200}
        ],
        columnDefs:[
            {
                "sorting": false,
                "orderable": false,
                "type":"html",
                "targets":-1,
                // "data": id,
                "render": function (data, type, row) {
                    // console.log("data => ", data, type, row)

                    const newRow = row

                    return `
                    <a href='<?=base_url("group/roles/")?>${row.id}' class='btn btn-primary mr-1' onClick=''>
                        Group Roles
                    </a>
                    <a href='<?=base_url("group/detail/")?>${row.id}' class='btn btn-primary mr-1' onClick=''>
                        Edit
                    </a>
                    <a href='#' class='btn btn-danger mr-1' onClick='confirmModal({ id: ${row.id}, group_name:"${row.group_name}" })'>
                        Delete
                    </a>`
                }
                // defaultContent: `<a href='#' class='btn btn-primary mr-1' onClick='getDetail()'>
                //     Edit
                // </a>
                // <a href='#' class='btn btn-danger mr-1'>
                //     Delete
                // </a>`
            },
             {
                "sorting": false,
                "orderable": false,
                "type":"html",
                "targets":-2,
                // "data": id,
                "render": function (data, type, row) {
                    // console.log("data => ", data, type, row)

                   

                    return row["group_menu"]
                }
                // defaultContent: `<a href='#' class='btn btn-primary mr-1' onClick='getDetail()'>
                //     Edit
                // </a>
                // <a href='#' class='btn btn-danger mr-1'>
                //     Delete
                // </a>`
            }
        ]
    })
}

$(function() {
  'use strict';

  $(groupTable);

});
</script>
<!-- end custom js for this page -->

