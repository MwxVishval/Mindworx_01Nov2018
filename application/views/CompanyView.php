<style>
    .container {
    /*width: 1300px !important;*/
    padding: 0;
}
</style>
<div class="x_panelhold" style="min-height:600px; height: auto;">
    <?php if ($this->session->userdata('session_data')->is_admin == 1) { ?>
        <div class="x_title">
            <h2>Entity</h2>
            <a href="<?php echo base_url() ?>addEntity" id="send"  class="btn btn-success" style="float:right;">Add Entity</a>
           <div class="clearfix"></div>
        </div>
    <?php } ?>
    <div class="x_content">
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>SNo</th>
                    <th>Entity Name</th>
                    <th>Address</th>
                    <th>Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($result AS $r) {
                    ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $r['ent_name']; ?></td>
                        <td><?php echo $r['ent_address']; ?></td>
                        <td><?php echo $r['ent_year']; ?></td>
                        <td><form action="<?php echo base_url(); ?>updateEntity" method="post">
                                <input type="hidden" value="<?php echo $r['id']; ?>" name="edit_id"  />      
                                <button class="fa fa-edit" name="edit" value="edit" title="Edit"></button>
                                <?php if ($this->session->userdata('session_data')->is_admin == 1) { ?>
                                    <button class="fa fa-trash" name="delete" value="delete" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"></button>
    <?php } ?>
                            </form>
                        </td>
                    </tr>
<?php } ?>
            </tbody>
        </table>
    </div>
 
    
</div>
<!-- Datatables-->
<script src="<?php echo base_url(); ?>assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/responsive.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/dataTables.scroller.min.js"></script>
<!-- pace -->
<script src="<?php echo base_url(); ?>assets/js/pace/pace.min.js"></script>
<script>
                    var handleDataTableButtons = function () {
                        "use strict";
                        0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                            dom: "Bfrtip",
                            columnDefs: [{
                                    targets: [0,4], // column or columns numbers
                                    orderable: false, // set orderable for selected columns
                                }],
                            buttons: [{
                                    extend: "copy",
                                    className: "btn-sm"
                                }, {
                                    extend: "csv",
                                    className: "btn-sm"
                                }, {
                                    extend: "excel",
                                    className: "btn-sm"
                                }, {
                                    extend: "pdf",
                                    className: "btn-sm"
                                }, {
                                    extend: "print",
                                    className: "btn-sm"
                                }],
                            responsive: !0
                        })
                    },
                            TableManageButtons = function () {
                                "use strict";
                                return {
                                    init: function () {
                                        handleDataTableButtons()
                                    }
                                }
                            }();
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
            keys: true
        });
        $('#datatable-responsive').DataTable();
        $('#datatable-scroller').DataTable({
            ajax: "<?php echo base_url(); ?>assets/js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });
        var table = $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });
    });
    TableManageButtons.init();
</script>

