<?php 
    include 'config/database.php';
    require_once 'session.php';
    if(!isset($_SESSION['user_id'])){
        header("Location: index.php");
        exit;
    };
    $query = "SELECT * FROM users";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap User Management Data Table</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/admin.css">
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});

$(function(){
    $('a#btnLogout').click(function(){
        if(confirm('Are you sure to logout?')) {
            return true;
        }
        return false;
    });
});
</script>
<script>
        document.getElementById("reg_form").addEventListener("submit", function(event) {
            event.preventDefault(); // Ngăn form được gửi đi ngay lập tức
            
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var sdt = document.getElementById("sdt").value;
            var gender = document.getElementById("gender").value;
            var birth = document.getElementById("birth").value;
            // Lưu dữ liệu vào sessionStorage
            sessionStorage.setItem("reg_name", name);
            sessionStorage.setItem("reg_email", email);
            sessionStorage.setItem("reg_password", password);
            sessionStorage.setItem("reg_sdt", sdt);
            sessionStorage.setItem("reg_gender", gender);
            sessionStorage.setItem("reg_birth", birth);
            // Chuyển hướng đến trang xử lý
            window.location.href = "verification.php";
        });
    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>User <b>Management</b></h2>
                    </div>
                    <div class="col-sm-2"> 
                        <b style="font-size: 15px; color: red;"><?php if(isset($_SESSION['msg'])) echo $_SESSION['msg']?></b>
                    </div>
                    <div class="col-sm-2" style="text-align: right; padding-top: 10px; color:#ff9999 ;">Xin chào, <b><?php echo $_SESSION['user_name']; ?></b></div>
                    <div class="col-sm-3">
                        
                        <a href="logout.php" class="btn btn-danger" id="btnLogout"><i class="material-icons"></i> <span>Logout</span></a>	
                        <a href="" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
                        <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Create new user</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" action="verification.php" method="post" id="reg_form">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Email:</label>
                                        <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" placeholder="Enter email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Password:</label>
                                        <div class="col-sm-10">
                                        <input required type="password" class="form-control" name="password" placeholder="Enter password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2"> Name:</label>
                                        <div class="col-sm-10">
                                        <input required type="text" class="form-control" name="name" placeholder="Enter your name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Phone number:</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="sdt" placeholder="Enter your phone number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Birth:</label>
                                        <div class="col-sm-10">
                                        <input type="date" class="form-control" name="birth" placeholder="Enter your birthday">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Gender:</label>
                                        <select name="gender" id="cars" style="padding: 10px;">
                                            <optgroup label="Gender">
                                            <option value="Male">Choose</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div> -->
                        </div>
                        
                        </div>
                    </div>					
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>						
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Birth</th>
                    </tr>
                </thead>
                <?php 
                    $_SESSION['msg'] = null;
                    $num = $stmt->rowCount();
                    if($num>0){
                        echo '<tbody>';
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            extract($row);
                            $date = date("d/m/Y", strtotime($birth));
                            echo "<tr>
                            <td>{$id}</td>
                            <td>{$name}</td>
                            <td>{$email}</td>
                            <td>{$sdt}</td>
                            <td>{$gender}</td>
                            <td>{$date}</td>
                            ";
                        }
                        echo '</tbody>';
                    }
                    // if no records found
                    else{
                        echo "<div class='alert alert-danger'>No records found.</div>";
                    }
                ?>
                
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>     
</body>
</html>