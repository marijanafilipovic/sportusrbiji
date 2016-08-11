<div class='loginform'><hr>
    <h3>Vasi podaci za registraciju</h3><hr>
    <?php if(isset($_GET['err'])){ ?>
<p style="color:black;"><?php echo $_GET['err'];?></p>
<?php } ?>
<form action="" method="POST">
    <p>Korisnicko ime*:</p>
    <p class="rounded"><input type="text" name="username" placeholder="<?php echo @$_SESSION['username']; ?>"/></p>
    <p>Lozinka*:</p>
    <p class="rounded"><input type="password" name="password" placeholder="<?php echo  @$_SESSION['password']; ?>" /></p>
      <p>Potvrdi lozinku*:</p>
    <p class="rounded"><input type="password" name="password2" placeholder="<?php echo  @$_SESSION['password2']; ?>" /></p>
        <p>Prvo ime*:</p>
    <p class="rounded"><input type="text" name="fname" placeholder="<?php echo  @$_SESSION['fname']; ?>"/></p>
     <p>Prezime*:</p>
    <p class="rounded"><input type="text" name="lname" placeholder="<?php echo  @$_SESSION['lname']; ?>"/></p>
     <p>Email*:</p>
    <p class="rounded"><input type="text" name="email" placeholder="<?php echo   @$_SESSION['email']; ?>"/></p>
     <p>Email potvrdi*:</p>
    <p class="rounded"><input type="text" name="email2" placeholder=" <?php echo  @$_SESSION['email2']; ?>"/></p><br><br>
    
    <p class="rounded"><input type="submit" value="Posalji" name="register"  /></p>
</form>
</div>