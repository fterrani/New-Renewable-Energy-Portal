<h1><?=$title?></h1>

<div class="nre-login-area">

    <!--<form action="<?=__BASE_URL__.'/login/check'?>" method="POST" class="form">-->
    <form action="<?=__BASE_URL__.'/login/check'?>" method="POST" class="col-md-auto nre-login-form">
        Login for windmachine statistics
        <div class="form-group" style="margin-top: 5px;">
            <input type="text" class="form-control" placeholder="Username" name="username" style="border-radius: 20px;">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" style="border-radius: 20px;">
        </div>
        <div class= buttonSubmit>
            <button type="submit" class="btn btn-primary" style="background-color: #325908; border: #325908; border-radius: 20px;">Login</button>
        </div>
    </form>

    <div class="row justify-content-md-center mt-4" >
        <a class="btn btn-primary" href="<?=__BASE_URL__?>/energies">See basic statistics</a>
    </div>

</div>