<?php
/**
 * Created by PhpStorm.
 * User: vinayj
 * Date: 27-02-2019
 * Time: 15:49
 */
?>


<?php include "header.php"; ?>
<?php include "navigation.php"; ?>

<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $FormData = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `crew_users` WHERE `crew_users_id` = '$id'"));
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Add Users</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <form role="form" method="post" action="" id="add_edit_user">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Enter Full Name" value="<?php echo isset($FormData['full_name'])?$FormData['full_name']:''; ?>">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Email</label>
                                        <input type="text" name="email_id" class="form-control" id="email_id" placeholder="Enter Email" value="<?php echo isset($FormData['email_id'])?$FormData['email_id']:''; ?>" <?php echo isset($FormData['email_id'])? 'disabled':''; ?>>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile" value="<?php echo isset($FormData['mobile'])?$FormData['mobile']:''; ?>">
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control"  minlength="6" id="password" placeholder="Enter Password" value="<?php echo isset($FormData['password'])?$FormData['password']:''; ?>">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control"  minlength="6" id="confirm_password" placeholder="Enter Password" value="<?php echo isset($FormData['confirm_password'])?$FormData['confirm_password']:''; ?>">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Location</label>
                                    <select class="form-control select2" name="location_id" id="location_id">
                                        <option value="">--Select Location--</option>
                                        <?php
                                        $sql = "SELECT * FROM `location_m`";
                                        $que = $db->query( $sql );
                                        while($row = $que->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $row['location_id']; ?>" <?php echo isset($FormData['location_id']) && $FormData['location_id']== $row["location_id"] ?'selected':'';?>><?php echo $row['location_name']?></option>
                                            <?php
                                        }?>
                                        <!--<option selected="selected">Alabama</option>
                                        <option value="1" <?php /*echo isset($FormData['location_id']) && $FormData['location_id']=='1'?'selected':'';*/?>>Alaska</option>
                                        <option value="2" <?php /*echo isset($FormData['location_id']) && $FormData['location_id']=='2'?'selected':'';*/?>>California</option>
                                        <option value="3" <?php /*echo isset($FormData['location_id']) && $FormData['location_id']=='3'?'selected':'';*/?>>Delaware</option>
                                        <option value="4" <?php /*echo isset($FormData['location_id']) && $FormData['location_id']=='4'?'selected':'';*/?>>Tennessee</option>
                                        <option value="5" <?php /*echo isset($FormData['location_id']) && $FormData['location_id']=='5'?'selected':'';*/?>>Texas</option>
                                        <option value="6" <?php /*echo isset($FormData['location_id']) && $FormData['location_id']=='6'?'selected':'';*/?>>Washington</option>-->
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="type" value="AddEditUser">
                        <input type="hidden" name="Record_id" value="<?php echo isset($FormData['crew_users_id'])?$FormData['crew_users_id']:''?>">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Full Name</th>
                                    <th>Credentials</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                //$sql = $db->query( "SELECT * FROM `crew_users`" );
                                $sql = $db->query( "SELECT cu.crew_users_id,cu.full_name,cu.email_id,cu.mobile,cu.password,cu.location_id,lm.location_name,cu.status FROM `crew_users` AS cu JOIN location_m AS lm ON cu.location_id = lm.location_id ORDER BY cu.crew_users_id DESC" );
                                while($row = $sql->fetch_assoc())
                                {
                                ?>
                                <tr id='users_<?php echo $row['crew_users_id'];?>'>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $row['full_name'];?></td>
                                    <td><?php echo "Email: ".$row['email_id'].'<br>'.'<b>Password</b>'.$row['password'];?></td>
                                    <td> <?php echo $row['location_name'];?></td>
                                    <td>
                                        <a href="add_user.php?id=<?php echo $row['crew_users_id'];?>" ><i class="fa fa-pencil fa-2x"></i></a>
                                        <a href="javascript:void(0);" title="Delete User" value="<?php echo $row['crew_users_id'];?>" class="delete_user" data-id="<?php echo $row['crew_users_id'];?>"><i class="fa fa-trash fa-2x"></i></a>
                                        <!--<input type="checkbox" class="form-check-input" id="">-->
                                        <?php
                                        if ($row['status'] == 'Approved'){ ?>
                                            <a href="javascript:void(0);" title="User Status" value="<?php echo $row['crew_users_id'];?>" class="status_user" data-id="<?php echo $row['crew_users_id'];?>" data-status="Block"><span class="badge badge-danger">Block</span></a>
                                        <?php }else{ ?>
                                            <a href="javascript:void(0);" title="User Status" value="<?php echo $row['crew_users_id'];?>" class="status_user" data-id="<?php echo $row['crew_users_id'];?>" data-status="Approved"><span class="badge badge-success">Approved</span></a>
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
                                    <th>Full Name</th>
                                    <th>Credentials</th>
                                    <th>Location</th>
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