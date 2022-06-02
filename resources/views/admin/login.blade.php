<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{mix('css/common.css')}}">
    <title>Admin login</title>
</head>
<body class="sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <form method="POST">
                        <br/><br/>
                        @csrf
                        <h3>Admin login</h3>
                        <div class="form-group">
                            <label>Email address</label>
                            <input required name="email" type="email" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input required name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{mix('js/common.js')}}"></script>
</body>
</html>
