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

<?php

//Dealer information when edit
if(isset($_GET['d_id']))
{
    //$id = $_GET['id'];
    $d_id = $_GET['d_id'];
    $FormData = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `dealer_m` WHERE `dealer_id` = '$d_id'"));
}

//City information
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    //$d_id = $_GET['d_id'];
    $city = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `city_m` WHERE `city_id` = '$id'"));
}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Dealer - <?php echo isset($city['city_name'])?$city['city_name']:''; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Dealer</li>
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
                            <h3 class="card-title">Add Dealer</h3>
                        </div>
                        <form role="form" method="post" action="" id="add_edit_dealer">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location">Add Dealer</label>
                                            <input type="text" class="form-control" name="dealer_name" id="dealer_name" placeholder="Enter Dealer Name" value="<?php echo isset($FormData['dealer_name'])?$FormData['dealer_name']:''; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location">Add Location</label>
                                            <input type="text" class="form-control" name="dealer_location" id="dealer_location" placeholder="Enter Location" value="<?php echo isset($FormData['dealer_location'])?$FormData['dealer_location']:''; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="city_id" id="city_id" value="<?php echo isset($city['city_id'])?$city['city_id']:''; ?>">
                                <input type="hidden" name="dealer_id" id="dealer_id" value="<?php echo isset($FormData['dealer_id'])?$FormData['dealer_id']:''; ?>">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dealer</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Dealer Name</th>
                                    <th>Dealer Location</th>
                                    <th>City</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                //$sql = $db->query( "SELECT * FROM `dealer_m`" );
                                $sql = $db->query( "SELECT dm.dealer_id,dm.dealer_id,dm.city_id,dm.dealer_name,dm.dealer_location,dm.status,cm.city_name FROM `dealer_m` AS dm JOIN city_m AS cm ON dm.city_id = cm.city_id WHERE dm.city_id = '$id'" );
                                while($row = $sql->fetch_assoc())
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $row['dealer_name'];?></td>
                                        <td><?php echo $row['dealer_location'];?></td>
                                        <td><?php echo $row['city_name'];?></td>
                                        <td>
                                            <a href="add_dealer.php?id=<?php echo $row['city_id'];?>&d_id=<?php echo $row['dealer_id'];?>" ><i class="fa fa-pencil fa-2x"></i></a>
                                            <a href="javascript:void(0);" title="Delete Dealer" value="<?php echo $row['dealer_id'];?>" class="delete_dealer" data-id="<?php echo $row['dealer_id'];?>"><i class="fa fa-trash fa-2x"></i></a>
                                            <?php
                                            if ($row['status'] == 'Approved'){ ?>
                                                <a href="javascript:void(0);" title="Dealer" value="<?php echo $row['dealer_id'];?>" class="status_dealer" data-id="<?php echo $row['dealer_id'];?>" data-status="Block"><span class="badge badge-danger">Block</span></a>
                                            <?php }else{ ?>
                                                <a href="javascript:void(0);" title="Dealer" value="<?php echo $row['dealer_id'];?>" class="status_dealer" data-id="<?php echo $row['dealer_id'];?>" data-status="Approved"><span class="badge badge-success">Approved</span></a>
                                            <?php }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Dealer Name</th>
                                    <th>Dealer Location</th>
                                    <th>City</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
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