

<div class="col-md-4">
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>


                <!-- login -->
                <div class="well">
                    <h2>Login</h2>
                    <form action="includes/login.php" method="post">
                    <div class="form-group ">
                        <input name="username" placeholder="enter username" type="text" class="form-control">
                    </div>

                    <div class="input-group ">
                        <input name="password" placeholder="enter password" type="password" class="form-control">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary" name="login" type="submit">
                                submit
                            </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>







                <!-- Blog Categories Well -->
                <div class="well">
                    <?php
                        $query = "SELECT * FROM categories ";
                        // $query = "SELECT * FROM categories LIMIT 3";
                        $select_categories_sidebar = mysqli_query($connection,$query);

                        
                    ?>

                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php 
                                while($row = mysqli_fetch_assoc($select_categories_sidebar))
                                {
                                    $cat_title =  $row['cat_title'];
                                    $cat_id =  $row['cat_id'];
                                    echo "<li><a href='category.php?category=$cat_id'> $cat_title </a></li>";
                                }
                                ?>

                        
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "widget.php" ?>

            </div>