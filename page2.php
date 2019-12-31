<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location:page1.php?error=لطفا ابتدا وارد حساب کاربری خود شوید!');
    die();
}

$loggedInUserId = $_SESSION['login'];
$connect = mysqli_connect("localhost", "root", "", "uni2");
$query = "select * from users where id='{$loggedInUserId}'";
$sql = mysqli_query($connect, $query);
$loggedInUser = mysqli_fetch_assoc($sql);
if (!$loggedInUser) {
    echo 'کاربر یافت نشد!';
    die();
}
// var_dump($loggedInUser);
// die();

if ($loggedInUser['access'] == '2') {
	$query = "select * from posts";
	$sql = mysqli_query($connect, $query);
	$posts = mysqli_fetch_all($sql);
	// echo "<pre>";
	// print_r($posts);
	// echo "</pre>";
	// die();
}

if ($loggedInUser['access'] == '1') {
	$query = "select * from replies";
	$sql = mysqli_query($connect, $query);
	$replies = mysqli_fetch_all($sql);
}
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body {
           background-color:whitesmoke;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
        q1 {
            color:greenyellow ;
            text-align: center;
            font-family: "B Titr";
            /* font-size: 20px; */
        }
        q2 {
            color:yellow ;
            text-align: right;
            font-family: "B Titr";
            /* font-size: 20px; */
        }
        q3 {
            color:mediumblue ;
            text-align: right;
            font-family: "B Titr";
            font-size: 20px;

        }
        nav.round3 {
  border: 2px solid red;
  border-radius: 12px;
}
    </style>
</head>
<body> 
     

    
        <nav class="navbar nav-tabs navbar-expand-sm bg-warning navbar-dark " dir="rtl">
          <ul class="navbar-nav mr-5">
            <li class="nav-item">
              <span style="font-size:20px;font-weight:bold;" ><?php echo $loggedInUser['name']; ?></span>
            </li>

            <li class="nav-item mr-4">
              <a href="logout.php" class="btn btn-danger btn-sm" >خروج</a>
            </li>
          </ul>
		</nav>
		
		<?php if (isset($_GET['error'])): ?>
                <h5 style="text-align:right;" class="my-2 alert alert-danger" >
                  <?php echo $_GET['error']; ?>
                </h2>
              <?php endif; ?>

              <?php if (isset($_GET['info'])): ?>
                <h5 style="text-align:right;" class="my-2 alert alert-success" >
                  <?php echo $_GET['info']; ?>
                </h2>
              <?php endif; ?>
  
		<?php if ($loggedInUser['access'] == '1'): ?>
		<div style="direction:rtl !important;text-align:right;" class="p-3 jumbotron" >
			<div class="card border-danger  mt-2 " style="max-width: 18rem">
				<div class="card-header border-danger font-weight-bolder">
					<h5>آپلود فایل</h5>
				</div>
				<div class="card-body">
					<form method="post" action="upload_post.php" enctype="multipart/form-data">
						<div class="form-group">
							<label for="file">انتخاب فایل</label>
						<input type="file" id="file" name="file" >
						</div>

						<button style="width:200px;" type="submit" class="btn btn-outline-primary" >آپلود</button>
					</form>
				</div>
			</div>

			<div class="card text-white bg-dark border-primary mt-2">
				<div class="card-header">
					<h5 class="font-weigth-bolder">نظرات</h5>
				</div>
				<div class="card-body">
					<?php foreach ($replies as $reply): ?>
						<div class="border p-2" >
							<p class="m-0" >
								<span>برای فایل شماره : </span>
								<span><?php echo $reply[2]; ?></span>
							</p>
							<?php
								$userId = $reply[1];
								$query = "select * from users where id='{$userId}'";
								$sql = mysqli_query($connect, $query);
								$userInfo = mysqli_fetch_assoc($sql);
							?>
							<p class="m-0" >
								<span>توسط دانشجو : </span>
								<span><?php echo $userInfo['name']; ?></span>
							</p>
							<div class="form-group">
								<label for="reply">نظرات دانشجو : </label>
								<textarea id="reply" rows="3" class="form-control" disabled ><?php echo $reply[3]; ?></textarea>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

		</div>
		<?php else: ?>
		<div style="direction:rtl !important;text-align:right;" class="p-3" >
			<?php foreach ($posts as $post): ?>
				<?php
					$filename = $post[3];
					$extName = strtolower(pathinfo($filename)['extension']);
				?>
				<div class="post border p-2 my-2">
					<?php if (in_array($extName,['png','jpg','jpeg'])): ?>
						<img src="upload/<?php echo $post[2]; ?>" width="200" />
					<?php else: ?>
						<h5>
							<a href="upload/<?php echo $post[2]; ?>"><?php echo $post[2]; ?></a>
						</h5>
					<?php endif; ?>

					<form method="post" action="send_reply.php">
						<input type="hidden" name="form[post_id]" value="<?php echo $post[0]; ?>" >
						<div class="form-group">
							<label for="reply">ارسال نظرات</label>
							<textarea name="form[text]" id="reply" rows="3" class="form-control"></textarea>
						</div>

						<button type="submit" class="btn btn-dark" >ارسال نظرات</button>
					</form>
				</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
      
        
</body>
</html>
