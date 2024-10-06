<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
              $is_admin = ($row['role'] == 'admin') ? true : false;
              } else {
                $is_admin = false;
 
            }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <!-- <a href="admin.php" class="view-users">View Users</a>  -->
        <!-- <a href="admin.php" id="viewUsersBtn" class="view-users">View Users</a>
        <div id="warningMessage" style="color:red; display:none;"></div>
         -->


        <?php if ($_SESSION['is_admin'] === 'admin'): ?>
        <a href="admin.php" class="service-button">
            <h5>View Users</h5>
        </a>
        <?php else: ?>
            <a href="users.php" class="service-button" onclick="alert('You are not authorised to access this page!'); return false;">
            <h5>View Users</h5>
        </a>
        <?php endif; ?>


        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>
  <!--       -->
  <!-- <script>
    var isAdmin = <?php echo json_encode($_SESSION['is_admin']); ?>;
  </script>  -->
  <script src="javascript/users.js"></script>

</body>
</html>
