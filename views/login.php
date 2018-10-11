<h1><?=$title?></h1>
<div class="container">
    <div class="row justify-content-center" >
        <button class="btn btn-primary" id="button">See basic statistics</button>
    </div>
    <div class="row justify-content-center">
        <form action="<?=__BASE_URL__.'/login/check'?>" method="POST" class="form">
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
    </div>
</div>