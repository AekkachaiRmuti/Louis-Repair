<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <link rel="stylesheet" href="./scss/login.css">

</head>


<body>
    <section class="form-section">
        <div class="form-wrapper">
            <form action="check_login.php" method="post" class="form">
                <div class="photo-info">
                    <img src="./img/11.png" alt="">
                    <h3>Welcome Louis Adhesive Tapes</h3>
                </div>
                <b>Username</b>
                <div class="input-block email">
                    <input type="text" class="form-control" placeholder="User Name" name="username" autocomplete="off">
                </div>
                <b>Password</b>
                <div class="input-block password">
                    <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
                </div>
                <!-- <p>Don’t have an account? <a href="#" class="span">Sign Up</a> here.</p> -->
                <button type="submit" class="btn-login1" name="btn_login">เข้าสู่ระบบ</button>
            </form>


        </div>
    </section>

    <ul class="squares"></ul>

    <script src="./scss/login.js"></script>

</body>

</html>