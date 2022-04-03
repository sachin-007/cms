<?php include "includes/admin_header.php" ?>

<?php if (isset($_SESSION['username'])){
    
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";

    $select_user_profile_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_array($select_user_profile_query)){

        $user_id =  $row['user_id'];
        $username=  $row['username'];
        $user_password=  $row['user_password'];
        $user_firstname=  $row['user_firstname'];
        $user_lastname=  $row['user_lastname'];
        $user_email=  $row['user_email'];
        $user_image=  $row['user_image'];
        $user_role=  $row['user_role'];
    }

}
?>

<?php 
    

if (isset($_GET['edit_user'])) {
    
    $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM users WHERE user_id=$the_user_id ";
        // $query = "SELECT * FROM categories LIMIT 3";
        $select_users_query = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_users_query))
    {
        $user_id =  $row['user_id'];
        $username=  $row['username'];
        $user_password=  $row['user_password'];
        $user_firstname=  $row['user_firstname'];
        $user_lastname=  $row['user_lastname'];
        $user_email=  $row['user_email'];
        $user_image=  $row['user_image'];
        $user_role=  $row['user_role'];

}


}

    if (isset($_POST['edit_user'])) {
        
        // $user_id = $_POST['user_id'];
        // $firstname = $_POST['firstname'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];

        // // $post_image = $_FILES['image']['name'];
        // $post_image_temp = $_FILES['image']['tmp_name'];
        
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        // $post_date = date('d-m-y');

        // move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "UPDATE users SET ";
        $query .="user_firstname   = '{$user_firstname}', ";
        $query .="user_lastname = '{$user_lastname}', ";
        $query .="user_role = '{$user_role}', ";
        // $query .="post_date    = now() , ";
        $query .="username  = '{$username}', ";
        $query .="user_email  = '{$user_email}', ";
        $query .="user_password    = '{$user_password}' ";
        $query .="WHERE username = '{$username}' ";

        $edit_user_query= mysqli_query($connection,$query);

        confirmQuery($edit_user_query);
    }
 ?>
    

    <div id="wrapper">

        <!-- Navigation -->

<?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>

                        
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="author">First Name</label>
        <input type="text" name="user_firstname" value="<?php echo $user_firstname ; ?>" class="form-control">
    </div>


    <div class="form-group">
        <label for="post_status">Last Name</label>
        <input type="text" name="user_lastname" value="<?php echo $user_lastname ; ?>" class="form-control">
    </div>

        <div class="form-group">
        <select name="user_role" id="">

            <option value="subscriber"><?php echo $user_role ; ?></option>
            <?php 
                if ($user_role == 'admin') {
                    echo "<option value='subscriber'>subscriber</option>";
                }else{
                    echo "<option value='admin'>admin</option>";
                }
             ?>
            

        </select>
    </div>

    

<!--    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image" >
    </div> -->

    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" name="username" value="<?php echo $username ; ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" name="user_email" value="<?php echo $user_email ; ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" name="user_password" value="><?php echo $user_password ; ?>" class="form-control">
    </div>


    <div class="form-group">
        <input type="submit" name="edit_user" class="btn btn-primary" value="Update Profile">
    </div>


</form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php" ?>
