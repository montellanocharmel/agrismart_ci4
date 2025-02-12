<script>
    function openEditFieldModal(field_id, field_name, field_owner, field_address, field_total_area) {
        document.getElementById('editfield_id').value = field_id;
        document.getElementById('editfield_name').value = field_name;
        document.getElementById('editfield_owner').value = field_owner;
        document.getElementById('editfield_address').value = field_address;
        document.getElementById('editfield_total_area').value = field_total_area;

        $('#editfieldmodal').modal('show');
    }


    function deleteProduct(field_id) {
        if (confirm("Are you sure you want to delete this product?")) {
            $.ajax({
                type: 'POST',
                url: '/viewfields/delete/' + field_id,
                success: function(response) {
                    window.location.reload();
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }
    }

    $(document).ready(function() {
        $('#addfieldmodal').on('show.bs.modal', function() {

            $('#field_name').val('');
            $('#field_owner').val('');
            $('#field_address').val('');
            $('#field_total_area').val('');
        });
    });

    // crop planting


    function openAddPlantingModal(field_id, field_name) {
        document.getElementById('field_id_planting').value = field_id;
        document.getElementById('field_name_add').value = field_name;
        $('#addplantingmodal').modal('show');
    }

    function openEditPlantingModal(planting_id, crop_variety, planting_date, season, start_date, end_date, notes) {
        document.getElementById('editplanting_id').value = planting_id;
        document.getElementById('editcrop_variety').value = crop_variety;
        document.getElementById('editplanting_date').value = planting_date;
        document.getElementById('editseason').value = season;
        document.getElementById('editstart_date').value = start_date;
        document.getElementById('editend_date').value = end_date;
        document.getElementById('editnotes').value = notes;

        $('#editplantingmodal').modal('show');
    }

    function deleteplanting(planting_id) {
        if (confirm("Are you sure you want to delete this product?")) {
            $.ajax({
                type: 'POST',
                url: '/cropplanting/delete/' + planting_id,
                success: function(response) {
                    window.location.reload();
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }
    }

    //jobs
    function openAddJobModal(field_id, field_name) {
        document.getElementById('field_id_add').value = field_id;
        document.getElementById('field_nameadd').value = field_name;
        $('#addjobmodal').modal('show');
    }

    function openEditJobModal(job_id, job_name, field_name, finished_date, worker_name, equipment_use, quantity_use, total_money_spent, notes) {
        // Set the product ID and name in the modal
        document.getElementById('editjob_id').value = job_id;
        document.getElementById('editjob_name').value = job_name;
        document.getElementById('editfield_name').value = field_name;
        document.getElementById('editfinished_date').value = finished_date;
        document.getElementById('editworker_name').value = worker_name;
        document.getElementById('editequipment_use').value = equipment_use;
        document.getElementById('editquantity_use').value = quantity_use;
        document.getElementById('edittotal_money_spent').value = total_money_spent;
        document.getElementById('editnotes').value = notes;

        $('#editjobmodal').modal('show');
    }



    function deleteJob(job_id) {
        if (confirm("Are you sure you want to delete this product?")) {
            $.ajax({
                type: 'POST',
                url: '/jobs/delete/' + job_id,
                success: function(response) {
                    window.location.reload();
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }
    }
    $(document).ready(function() {
        $('#addjobmodal').on('show.bs.modal', function() {

            $('#job_name').val('');
            $('#field_name').val('');
            $('#finished_date').val('');
            $('#equipment_use').val('');
            $('#quantity_use').val('');
            $('#total_money_spent').val('');
            $('#notes').val('');

        });
    });



    //harvest
    function openAddHarvestModal(field_id, field_name) {
        document.getElementById('field_id_harvest').value = field_id;
        document.getElementById('field_name_harvest').value = field_name;
        $('#addharvestmodal').modal('show');
    }

    function openEditHarvestModal(harvest_id, field_name, variety_name, harvest_quantity, total_revenue, harvest_date, notes) {
        // Set the product ID and name in the modal
        document.getElementById('editharvest_id').value = harvest_id;
        document.getElementById('editfield_name').value = field_name;
        document.getElementById('editvariety_name').value = variety_name;
        document.getElementById('editharvest_quantity').value = harvest_quantity;
        document.getElementById('edittotal_revenue').value = total_revenue;
        document.getElementById('editharvest_date').value = harvest_date;
        document.getElementById('editnotes').value = notes;
        // Open the modal
        $('#editharvestmodal').modal('show');
    }


    // Function to delete a product
    function deleteHarvest(harvest_id) {
        // Confirm with the user before proceeding
        if (confirm("Are you sure you want to delete this product?")) {
            // Send an AJAX request to delete the product
            $.ajax({
                type: 'POST',
                url: '/harvest/delete/' + harvest_id, // Update the URL as needed
                success: function(response) {
                    // Reload the page or update the table as needed
                    window.location.reload(); // Reload the page for simplicity
                },
                error: function(error) {
                    console.error('Error:', error);
                    // Handle errors if needed
                }
            });
        }
    }
    $(document).ready(function() {
        $('#addharvestmodal').on('show.bs.modal', function() {

            $('#field_name').val('');
            $('#variety_name').val('');
            $('#harvest_quantity').val('');
            $('#total_revenue').val('');
            $('#harvest_date').val('');
            $('#total_money_spent').val('');
            $('#notes').val('');

        });
    });

    // worker
    function openEditWorkerModal(worker_id, worker_name, salaryperday) {
        // Set the product ID and name in the modal
        document.getElementById('editworker_id').value = worker_id;
        document.getElementById('editworker_name').value = worker_name;
        document.getElementById('editsalaryperday').value = salaryperday;
        // Open the modal
        $('#editworkermodal').modal('show');
    }


    function deleteworker(worker_id) {
        if (confirm("Are you sure you want to delete this worker?")) {
            $.ajax({
                type: 'POST',
                url: '/workers/delete/' + worker_id,
                success: function(response) {
                    window.location.reload();
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }
    }
</script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>dashboard/js/jquery1-3.4.1.min.js"></script>

<script src="<?= base_url() ?>dashboard/js/popper1.min.js"></script>

<script src="<?= base_url() ?>dashboard/js/bootstrap1.min.js"></script>

<script src="<?= base_url() ?>dashboard/js/metisMenu.js"></script>

<script src="<?= base_url() ?>dashboard/vendors/count_up/jquery.waypoints.min.js"></script>

<script src="<?= base_url() ?>dashboard/vendors/chartlist/Chart.min.js"></script>

<script src="<?= base_url() ?>dashboard/vendors/count_up/jquery.counterup.min.js"></script>

<script src="<?= base_url() ?>dashboard/vendors/swiper_slider/js/swiper.min.js"></script>

<script src="<?= base_url() ?>dashboard/vendors/niceselect/js/jquery.nice-select.min.js"></script>

<script src="<?= base_url() ?>dashboard/vendors/owl_carousel/js/owl.carousel.min.js"></script>

<script src="<?= base_url() ?>dashboard/vendors/gijgo/gijgo.min.js"></script>

<script src="<?= base_url() ?>dashboard/vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>dashboard/vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>dashboard/vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>dashboard/vendors/datatable/js/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>dashboard/vendors/datatable/js/jszip.min.js"></script>
<script src="<?= base_url() ?>dashboard/vendors/datatable/js/pdfmake.min.js"></script>
<script src="<?= base_url() ?>dashboard/vendors/datatable/js/vfs_fonts.js"></script>
<script src="<?= base_url() ?>dashboard/vendors/datatable/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>dashboard/vendors/datatable/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>dashboard/js/chart.min.js"></script>

<script src="<?= base_url() ?>dashboard/vendors/progressbar/jquery.barfiller.js"></script>

<script src="<?= base_url() ?>dashboard/vendors/tagsinput/tagsinput.js"></script>

<script src="<?= base_url() ?>dashboard/vendors/text_editor/summernote-bs4.js"></script>
<script src="<?= base_url() ?>dashboard/vendors/apex_chart/apexcharts.js"></script>

<script src="<?= base_url() ?>dashboard/js/custom.js"></script>
<script src="<?= base_url() ?>dashboard/vendors/apex_chart/bar_active_1.js"></script>
<script src="<?= base_url() ?>dashboard/vendors/apex_chart/apex_chart_list.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?= base_url() ?>dashboard/vendors/chartjs/chartjs_init.js"></script>
</body>

</html>