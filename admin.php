<!-- <?php
// session_start();
// if(!isset($_SESSION['unique_id']) || !isset($_SESSION['is_admin'])){
//     header("location: login.php");
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <h1>Admin Dashboard</h1>
                <a href="php/logout.php" class="logout">Logout</a>
            </header>
            <div class="users-list">
                <!-- User list will be loaded here dynamically 
            </div>
        </section>
    </div>
    
    <script src="javascript/admin.js"></script>
</body>
</html> -->
<?php
session_start();
if(!isset($_SESSION['unique_id']) || !isset($_SESSION['is_admin'])){
    header("location: login.php");
    exit();
}

include_once "php/config.php"; // Include your database connection

// Fetch all users
$users_sql = "SELECT unique_id, fname, img, status, role FROM users";
$users_result = mysqli_query($conn, $users_sql);
$users_data = mysqli_fetch_all($users_result, MYSQLI_ASSOC);

// Fetch all messages
$messages_sql = "SELECT * FROM messages ";
$messages_result = mysqli_query($conn, $messages_sql);
$messages_data = mysqli_fetch_all($messages_result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .wrapper {
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        header h1 {
            margin: 0;
        }
        header .logout {
            text-decoration: none;
            color: #fff;
            background-color: #ff4b5c;
            padding: 10px 15px;
            border-radius: 5px;
        }
        header .logout:hover {
            background-color: #ff1e2d;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Admin Dashboard</h1>
            <a href="php/logout.php" class="logout">Logout</a>
        </header>
        
        <section>
            <h2>Users Table</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Profile Image</th>
                        <th>Status</th>
                        <th>role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users_data as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['unique_id']); ?></td>
                        <td><?php echo htmlspecialchars($user['fname']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($user['img']); ?>" alt="Profile Image"></td>
                        <td><?php echo htmlspecialchars($user['status']); ?></td>
                        <td><?php echo htmlspecialchars($user['role']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section>
            <h2>Messages Table</h2>
            <table>
                <thead>
                    <tr>
                        <th>Message ID</th>
                        <th>Sender ID</th>
                        <th>Receiver ID</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages_data as $message): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($message['msg_id']); ?></td>
                        <td><?php echo htmlspecialchars($message['incoming_msg_id']); ?></td>
                        <td><?php echo htmlspecialchars($message['outgoing_msg_id']); ?></td>
                        <td><?php echo htmlspecialchars($message['msg']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>

