
<!DOCTYPE html>
<html>
	<head>
		<?php include('header.php') ?>
        <?php 
        session_start();
        if(isset($_SESSION['login_id'])){
            header('Location:home.php');
        }
        ?>
		<title>Online Quiz maker</title>
	</head>

	<body id='login-body' class="bg-light">

        <div class=" text-center">
            <h3 >Online quiz maker and taker</h3>
        </div>
		<div class="card col-md-4 offset-md-4 mt-4">
                <div class="text-black text-center">
                    <strong>Login</strong>
                    <strong>For the admin login using:</strong><br>
                    <strong>username: admin</strong><br>
                    <strong>password: admin123</strong><br>
                    <strong>Login as student using credentials you provided while adding students in admin</strong>
                </div>
            <div class="card-body">
                     <form id="login-frm" >
                        <div class="form-group">
                            <label>Username</label>
                            <input type="username" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control">
                        </div> 
                        <div class="form-group text-right">
                            <a><button class="btn btn-primary btn-block"  style="background-color:purple" name="submit">Login</button></a>
                        </div>
                        
                    </form>
            </div>
        </div>

		</body>

        <script>
            $(document).ready(function(){
                $('#login-frm').submit(function(e){
                    e.preventDefault()
                    $('#login-frm button').attr('disable',true)
                    $('#login-frm button').html('Please wait...')

                    $.ajax({
                        url:'./login_auth.php',
                        method:'POST',
                        data:$(this).serialize(),
                        error:err=>{
                            console.log(err)
                            alert('An error occured');
                            $('#login-frm button').removeAttr('disable')
                            $('#login-frm button').html('Login')
                        },
                        success:function(resp){
                            if(resp == 1){
                                location.replace('home.php')
                            }else{
                                alert("Incorrect username or password.")
                                $('#login-frm button').removeAttr('disable')
                                $('#login-frm button').html('Login')
                            }
                        }
                    })

                })
            })
        </script>
</html>