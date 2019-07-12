<?php 
//this add the header of the page 
include_once 'includes/header.php';?>
<?php 
// this add the database on system
include  'Banco/conect.php';

    try {
        


    $stmt = $conn->prepare("UPDATE serie SET name=:name, genre=:genre, season=:season, synopsis=:synopsis  WHERE id = id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':season', $season);
    $stmt->bindParam(':synopsis', $synopsis);
    $stmt->execute();
    $stmt->fetch(PDO::FETCH_ASSOC);



    echo $stmt->rowCount();

} catch (PDOException $e){
            echo $e;

?>


<div class="row">
	<div class="col s12 m6 push-m3"> 
	<h3 class="light"> Edit your Series</h3>
		<form action="update.php" method="POST">
			<div class="input-field col s12">
				<input type="text" name="name" id="name" value="<?=$stmt['name'];?>">
				<label for="name">Series Name</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="genre" id="geren"value="<?= $stmt['geren'];?>">
				<label for="genre">genre</label>
			</div>
			<div class="input-field col s12">
				<input type="number" name="season" id="season"value="<?= $stmt['season'];?>">
				<label for="season">season</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="synopsis" id="synopsis"value="<?=$stmt['synopsis'];?>">
				<label for="synopsis">Synopsis</label>
			</div>
			<button  type="submit" class="btn" >Add Serie</button>
			<a href="index.php" class="btn green"> Home</a>
		</form>
	</div>
</div> 

<?php 
//this add the footer on the page
include_once 'includes/footer.php';

?>