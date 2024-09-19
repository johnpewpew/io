
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" type="text/css" href="./css/main.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"/>

      <link rel="stylesheet" type="text/css" href="./css/login.css">
      <link rel="stylesheet" type="text/css" href="./css/util.css">
  </head>
  <body>
    <div class="wrapper">
      <h1 class="form-title">Login</h1>
      <form action="/dashboardview/admin.php" method="POST">
        <div class="input-box">
          <input type="text" name="username" placeholder="Username" required ="" />
          <i class="bx bxs-user"></i>
        </div>
        <div class="input-box">
          <input
            type="password"
            name="password"
            placeholder="Password"
            required=""
          />
          <i class="bx bxs-lock-alt"></i>
        </div>
        <button type="login" class="btn">Login</button>
      </form>
    </div>
  </body>
</html>
