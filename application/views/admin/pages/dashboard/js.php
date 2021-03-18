<!-- plugin js for this page -->

<!-- end plugin js for this page -->

<!-- custom js for this page -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="<?=base_url("assets/vendors/datatables.net/jquery.dataTables.js")?>"></script>
<script src="<?=base_url("assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js")?>"></script>
<script src="<?=base_url("assets/js/counter.js")?>"></script>


<!-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<!-- end custom js for this page -->


<script>

var ctx = document.getElementById('myChart').getContext('2d');
var jumlahData1 = `<?= $jumlah_selesai[0]['jumlah'] ?>`;
var jumlahData2 = `<?= $jumlah_selesai_sebagian[0]['jumlah'] ?>`;
var jumlahData3 = `<?= $on_progress[0]['jumlah'] ?>`;
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Selesai', 'Selesai Sebagian', 'On Progress'],
        datasets: [{
            label: '# of Votes',
            data: [jumlahData1, jumlahData2, jumlahData3],
            backgroundColor: [
                '#6cc788',
                '#f77a99',
                '#6887ff'
            ]
        }]
    },
    options: {
        
    }
});


$(document).ready( function () {
    $('#details-selesai').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });


    $('#details-selesai-sebagian').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
} );

</script>

