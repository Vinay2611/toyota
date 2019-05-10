<?php
/**
 * Created by PhpStorm.
 * User: vinayj
 * Date: 26-02-2019
 * Time: 16:20
 */
?>
<?php include "header.php"; ?>
<?php include "navigation.php"; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">All report</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">All Report</h3>
                        </div>
                        <form role="form" method="get" action="download_lead.php" id="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="location">Leads</label>
                                            <select name="lead" id="lead" class="form-control" required>
                                                <option value="">Select Lead</option>
                                                <option value="Within 3 months">Within 3 Months</option>
                                                <option value="3 - 6 months">3 - 6 Months</option>
                                                <option value="6 months to 1 year">6 months to 1 Year </option>
                                                <option value="No current plan">No current plan</option>
                                                <option value="All">All</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <select name="location" id="location" class="form-control" required>
                                                <option value="">Select location</option>
                                                <?php
                                                $i = 1;
                                                $sql = $db->query( "SELECT * FROM `location_m`" );
                                                while($row = $sql->fetch_assoc())
                                                {
                                                ?>
                                                <option value="<?php echo $row['location_id'];?>"><?php echo $row['location_name'];?></option>
                                                    <?php
                                                    $i++;
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="col-md-3">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <select name="city" id="city" class="form-control" required>
                                                <option value="">Select city</option>
                                                <?php
/*                                                $i = 1;
                                                $sql = $db->query( "SELECT * FROM `city_m`" );
                                                while($row = $sql->fetch_assoc())
                                                {
                                                    */?>
                                                    <option value="<?php /*echo $row['city_name'];*/?>"><?php /*echo $row['city_name'];*/?></option>
                                                    <?php
/*                                                    $i++;
                                                }
                                                */?>
                                            </select>
                                        </div>
                                    </div>
                                </div>-->
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Generate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>
    </section>






</div>

<?php include "footer.php"; ?>
<script>
    $(function () {
        $("#example1").DataTable();
        /*$('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });*/
    });
</script>