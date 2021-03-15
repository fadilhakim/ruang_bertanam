<!-- core:js -->
<script src="<?=base_url("admin_assets/vendors/core/core.js")?>"></script>

<!-- endinject -->

<!-- plugin js for this page -->

<!-- end plugin js for this page -->

<!-- inject:js -->
<script src="<?=base_url("admin_assets/vendors/feather-icons/feather.min.js")?>"></script>
<script src="<?=base_url("admin_assets/js/template.js")?>"></script>
<script src="<?=base_url("admin_assets/vendors/select2/select2.min.js")?>"></script>
<script src="<?=base_url("admin_assets/vendors/typeahead.js/typeahead.bundle.min.js")?>"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- endinject  -->

<!-- custom js for this page -->
<?php !isset($js) || empty($js) ? "" : $this->load->view($js); ?>
<script>

    $("#project-update-search").autocomplete({
      source:function(request, response){
        $.ajax({
            // url:"https://swapi.dev/api/planets/",
            url:"<?=base_url("project/project_search")?>",
            dataType:"json",
            data:{
                search:request.term
            },
            success:function(data){
                response( $.map( data.results, function( item ) {
                    return {
                        label: `[${item.project_id}] ${item.project_nama}`,
                        value: item.no_wo,
                        detail: item
                    }
                }));
            }
        })
      },
      minLength: 2,

      select: function( event, ui ) {
        //   console.log(" ui.item => ",ui.item.detail)
          const workorder_id = ui.item.detail.h_workorder_id
          const url_str = "<?=base_url()?>"+"all-projects/update/"+workorder_id
          window.location.href = url_str
        //log( "Selected: " + ui.item.name + " aka " + ui.item.id );
      }
    });

    $('#project-update-search-backup').typeahead({
        hint: true,
        highlight: true,
        minLength: 1,
    },{
        
        source: function (query, process) {
            // https://swapi.dev/api/planets/

            /* <?=base_url("project/project_search")?> */
            return $.get("https://swapi.dev/api/planets/", { search: query }, function (data) {
                
                const projectUpdates = data.results.map(item => {
                    return item.name
                })

                // console.log(projectUpdates)

                return process(projectUpdates)
            })
        },
       
        // source: function(typeahead, query){
        //     // console.log("run ...", query)
        //     // #this function receives the typeahead object and the query string
        //     return $.get({
        //         url: "<?=base_url("project/project_search")?>",
                
        //         dataType:"json",
        //         data:{
        //             search:query
        //         },
        //         // # i'm binding the function here using CoffeeScript syntactic sugar,
        //         // # you can use for example Underscore's bind function instead.
        //         success: function(data) {
        //             //console.log("data => ", data)
        //             // # data must be a list of either strings or objects
        //             // # data = [{'name': 'Joe', }, {'name': 'Henry'}, ...]
        //             typeahead.process(data)
        //         },
        //         error:function(err) {
        //             console.log("err => ", err)
        //         }
        //     })

        // },
        // //if we return objects to typeahead.process we must specify the property
        // //that typeahead uses to look up the display value
        // property: "project_nama"
    });

    // $.typeahead({
	// 	input: '#q',
	// 	hint: true,
	// 	display: ["title"], // Search objects by the title-key
	// 	source: {
	// 		url: actionURL // Ajax request to get JSON from the action url
	// 	},
	// 	callback: {
	// 		// Redirect to url after clicking or pressing enter
	// 		onClickAfter: function (node, a, item, event) {
	// 			window.location.href = item.url; // Set window location to site url
	// 		}
	// 	}
	// });
  $(document).ready(function() {

    $('.js-example-basic-single').select2({
    placeholder: 'Cari Project Disini'
    })

    $('#project-update-search-backup').select2({
      placeholder: 'Cari Project Disini',
      ajax: {
        url: 'https://swapi.dev/api/planets/',
        dataType: 'json',
        
        delay: 250, // wait 250 milliseconds before triggering the request
        data: function (params) {
            console.log("params ", params)

            var query = {
                search: params.term,
              
            }

            // Query parameters will be ?search=[term]&type=public
            return query;
        },
      
        
            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
      },
      templateResult: function(data) {
            // console.log("data temp result", data)
        return $(`<div class='select2-result-project-update-search clearfix'>
            <div class='select2-result-project-update-search__meta'>
                <div class='select2-result-project-update-search__title'>${data.name}</div>
            </div>
          </div>`)
      },
      templateSelection: function(data) {
        return data.name || "-- please input for search --";
      },
      minimumInputLength: 2
    });

  });
</script>
<!-- end custom js for this page -->
