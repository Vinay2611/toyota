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
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $FormData = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `city_m` WHERE `city_id` = '$id'"));
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add City</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">City</li>
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
                            <h3 class="card-title">Add City</h3>
                        </div>
                        <form role="form" method="post" action="" id="add_edit_city">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="location">Add City</label>
                                    <input type="text" class="form-control" name="city_name" id="city_name" placeholder="Enter City" value="<?php echo isset($FormData['city_name'])?$FormData['city_name']:''; ?>">
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="city_id" id="city_id" value="<?php echo isset($FormData['city_id'])?$FormData['city_id']:''; ?>">
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
                            <h3 class="card-title">City</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Add Dealer</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                //$sql = $db->query( "SELECT * FROM `crew_users`" );
                                $sql = $db->query( "SELECT * FROM `city_m`" );
                                while($row = $sql->fetch_assoc())
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $row['city_name'];?></td>
                                        <td><a href="add_dealer.php?id=<?php echo $row['city_id'];?>" ><i class="fa fa-user fa-2x"></i></a></td>
                                        <td>
                                            <a href="cities.php?id=<?php echo $row['city_id'];?>" ><i class="fa fa-pencil fa-2x"></i></a>
                                            <a href="javascript:void(0);" title="Delete Cities" value="<?php echo $row['city_id'];?>" class="delete_city" data-id="<?php echo $row['city_id'];?>"><i class="fa fa-trash fa-2x"></i></a>
                                            <?php
                                            if ($row['status'] == 'Approved'){ ?>
                                                <a href="javascript:void(0);" title="Cities" value="<?php echo $row['city_id'];?>" class="status_city" data-id="<?php echo $row['city_id'];?>" data-status="Block"><span class="badge badge-danger">Block</span></a>
                                            <?php }else{ ?>
                                                <a href="javascript:void(0);" title="Cities" value="<?php echo $row['city_id'];?>" class="status_city" data-id="<?php echo $row['city_id'];?>" data-status="Approved"><span class="badge badge-success">Approved</span></a>
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
                                    <th>Name</th>
                                    <th>Add Dealer</th>
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