<?php 

	if (isset($_GET['p_id'])) {
		$the_post_id = $_GET['p_id'];
	}

	$query = "SELECT * FROM posts WHERE post_id=$the_post_id ";
      // $query = "SELECT * FROM categories LIMIT 3";
      $select_posts_by_id = mysqli_query($connection,$query);
  while($row = mysqli_fetch_assoc($select_posts_by_id))
  {
      $post_id =  $row['post_id'];
      $post_author=  $row['post_author'];
      $post_title=  $row['post_title'];
      $post_category_id=  $row['post_category_id'];
      $post_status=  $row['post_status'];
      $post_image=  $row['post_image'];
      $post_content=  $row['post_content'];
      $post_tags=  $row['post_tags'];
      $post_comment_count=  $row['post_comment_count'];
      $post_date=  $row['post_date'];
}

if (isset($_POST['update_post'])) {

		$post_author = $_POST['post_author'];	
		$post_title = $_POST['post_title'];
		$post_category_id = $_POST['post_category'];
		$post_status = $_POST['post_status'];
		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];
		$post_content = $_POST['post_content'];
		$post_tags = $_POST['post_tags'];

		
		
		move_uploaded_file($post_image_temp, "../images/$post_image");

		if (empty($post_image)) {
			$query = "SELECT * FROM posts WHERE post_id = $the_post_id";

			$select_image = mysqli_query($connection,$query);

			while ($row = mysqli_fetch_array($select_image)) {
				$post_image = $row['post_image'];
			}
		}

		$query = "UPDATE posts SET ";
		$query .="post_title   = '{$post_title}', ";
		$query .="post_category_id = '{$post_category_id}', ";
		$query .="post_date    = now() , ";
		$query .="post_author  = '{$post_author}', ";
		$query .="post_status  = '{$post_status}', ";
		$query .="post_tags    = '{$post_tags}', ";
		$query .="post_content = '{$post_content}', ";
		$query .="post_image   = '{$post_image}' ";
		$query .="WHERE post_id = {$the_post_id} ";


		// $query = "UPDATE posts SET 'post_title={$post_title}',post_category_id = '{$post_category_id}' WHERE  post_id = '{$the_post_id}'";

		// $query .="VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','$post_content','{$post_tags}','{$post_comment_count}','{$post_status}')";


		// $update_post = mysqli_query($connection,$query);

        $update_post = mysqli_query($connection,$query);


		confirmQuery($update_post);


}

 ?>



<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="title">Post Title</label>
		<input value="<?php echo $post_title; ?>" type="text" name="post_title" class="form-control">
	</div>

	<div class="form-group">
		<select name="post_category" id="">
			
			<?php 
			    $query = "SELECT * FROM categories ";
				// $query = "SELECT * FROM categories LIMIT 3";
				$select_categories = mysqli_query($connection,$query);
				confirmQuery($select_categories);
				while($row = mysqli_fetch_assoc($select_categories))
				{
				$cat_id =  $row['cat_id'];
				$cat_title =  $row['cat_title'];

				echo "<option value='{$cat_id}'>$cat_title</option>";
			}
			 ?>


		</select>
	</div>

	<div class="form-group">
		<label for="author">Post Author</label>
		<input value="<?php echo $post_author; ?>" type="text" name="post_author" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input type="text" value="<?php echo $post_status; ?>" name="post_status" class="form-control">
	</div>

	<div class="form-group">
		<img width="100" src="../images/<?php echo $post_image; ?>" alt="">
		<input type="file" name="image" >

	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" value="<?php echo $post_tags; ?>" name="post_tags" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" value="<?php echo $post_content; ?>" class="form-control" id="" cols="30" rows="10">
			<?php echo $post_content; ?>
		</textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="update_post" class="btn btn-primary" value="Update Post">
	</div>



</form>