<?php
include 'includes/database.php';
include 'includes/functions.php';
include "header.php";


$cottageID = 1;
if(isset($_GET["cottageID"]) && $_GET["cottageID"] > 0){
    $cottageID = $_GET['cottageID'];
};

$sql = "SELECT * FROM `cottages` WHERE cottage_id = $cottageID";
$tblCottages = getData($sql,"fetch");


?>

<!-- <form method="GET" action="index.php"> -->
<section>    
<div class="container mt-4">
    <h1><?php echo $tblCottages['cottage_name']?></h1>
        <div class="row">
            <div class="col">
                <div id="carouselExampleControls" class="carousel slide pointer-event" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item">    
                    <img class="d-block w-100" src="images/<?php echo $tblCottages['cottage_img'];?>" alt="cottage_name"><!--src en alt dynamisch maken -->
                    </div>
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="images/<?php echo $tblCottages['cottage_img2'];?>" alt="cottage_name"><!--src en alt dynamisch maken -->
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="images/<?php echo $tblCottages['cottage_img3'];?>" alt="cottage_name"> <!--src en alt dynamisch maken -->
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="images/<?php echo $tblCottages['cottage_img4'];?>" alt="cottage_name"><!--src en alt dynamisch maken -->
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
            </div>
            <div class="col">
            <h5>Omschrijving</h5>
            <p> <?php echo $tblCottages['cottage_descr'];?></p>
            </div>
        </div>
    </div>
</section>
<section>

    <div class="container mt-4 bg-light">
        <div class="row  px-4 py-4">
            <div class="col">
            <h4>Faciliteiten</h4>
            <?php
            $sql = "SELECT facilities.facility_name FROM `cottages_facilities` INNER JOIN facilities ON facilities.facility_id=cottages_facilities.facility_id WHERE cottages_facilities.cottage_id = " . $cottageID;
            $tblFacilities = getData($sql, "fetchAll");
?>
                    <ul class="list-group list-group-flush">
                        <?php
                        foreach($tblFacilities as $facility) { ?>
                            <li class="list-group-item"><?php echo $facility["facility_name"];?></li>
                        <?php } ?>
                    </ul>
            </div>
            <div class="col">
                <h4>Prijzen (per persoon per nacht)</h4>
                    <ul class="list-group list-group-flush">
                            <li class="list-group-item">Volwassenen: &euro; <?php echo $tblCottages['cottage_price_a'];?></li>
                            <li class="list-group-item">Kinderen: &euro; <?php echo $tblCottages['cottage_price_c'];?></li>
                    </ul>
            </div>
            <?php
            ?>
            <div class="col">
            <h4>Extra's (per persoon per dag)</h4>
            <?php
            $sql = "SELECT additions.addition_name FROM `cottages` INNER JOIN additions ON additions.addition_id WHERE cottages.cottage_id = " . $cottageID; 
            $tblAdditions = getData($sql, "fetchAll");
?>
                    <ul class="list-group list-group-flush">
                        <?php
                        foreach($tblAdditions as $addition) { ?>
                            <li class="list-group-item"><?php echo $addition["addition_name"];?></li>
                        <?php } ?>
            </div>            
        </div>
    </div>
</section> 
<?php
include "calculateprice.php";
include "footer.php";


?>