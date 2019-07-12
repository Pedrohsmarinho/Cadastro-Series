<?php
include_once 'includes/header.php';
?>


<div class="row">
<div class="col s12 m6 push-m3"> 
<h3 class="light"> Login User</h3>

    <form action="index.php" method="POST">
    <div class="input-field col s12">
				<input type="text" name="email" id="email">
				<label for="email">email</label>
			 </div>
    <div class="input-field col s12">
				<input type="password" name="passord" id="passord">
				<label for="passord">passord</label>
			 </div>
             <button  type="submit" name="add"class="btn">Sing in</button>
			 




</div>
</div>

<?php
    include_once 'includes/footer.php';
?>