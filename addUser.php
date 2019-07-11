<?php 
//header
include_once 'includes/header.php';?>
<?php 
include  'Banco/conect.php';
?>
<div class="row">
	<div class="col s12 m6 push-m3"> 
	<h3 class="light"> New User</h3>
		<form action="reg_user.php" method="POST">
			<div class="input-field col s12">
				<input type="text" name="name" id="name">
				<label for="name">Name</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="email" id="email">
				<label for="email">Email</label>
			</div>
			<div class="input-field col s12">
				<input type="password" name="password" id="password">
				<label for="password">Password</label>
			</div>
			<div class="input-field col s12">
				<input type="password" name="password2" id="password2">
				<label for="password2">Password Confimed</label>
			</div>
			<button  type="submit" class="btn" > Adicionar</button>
			<a href="index.php" class="btn green"> Home</a>
		</form>
	</div>
</div> 

<?php 
//footer
include_once 'includes/footer.php';

?>
