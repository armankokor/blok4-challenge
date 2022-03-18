<?php
include 'includes/database.php';
include 'includes/functions.php';
include "header.php";


$cottageID = 1;
if(isset($_GET["cottageID"]) && $_GET["cottageID"] > 0){
    $cottageID = $_GET['cottageID'];
};

$sql = "SELECT * FROM `cottages` WHERE cottage_id";
$tblCottages = getData($sql,"fetch");

// print_r($tblCottages);

?>

<!-- <form method="GET" action="index.php"> -->

<section>
    <div class="container mt-4">
    <h1><?php echo $cottage['cottage_name']?></h1>
        <div class="row">
            <div class="col">
                <div id="carouselExampleControls" class="carousel slide pointer-event" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item">
                    <img src="images/ijmuiden.jpg" class="d-block w-100" alt="ijmuiden.jpg"<?php echo $cottage['cottage_img'];?> ><!--src en alt dynamisch maken -->
                    </div>
                    <div class="carousel-item active">
                    <img src="images/ijmuiden-strand.jpg" class="d-block w-100" alt="ijmuiden-strand.jpg"<?php echo $cottage['cottage_img2'];?> ><!--src en alt dynamisch maken -->
                    </div>
                    <div class="carousel-item">
                    <img src="images/ijmuiden-hottub.jpg" class="d-block w-100" alt="ijmuiden-hottub.jpg" <?php echo $cottage['cottage_img3'];?> ><!--src en alt dynamisch maken -->
                    </div>
                    <div class="carousel-item">
                    <img src="images/ijmuiden-haard.jpg" class="d-block w-100" alt="ijmuiden-haard.jpg"<?php echo $cottage['cottage_img4'];?> ><!--src en alt dynamisch maken -->
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
            <p></p><?php echo $cottage['cottage_descr'];?>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container mt-4 bg-light">
        <div class="row  px-4 py-4">
            <div class="col">
            faciliteiten (aparte file in includes)
            </div>

            <div class="col">
                <h4>Prijzen (per persoon per nacht)</h4>
                    <ul class="list-group list-group-flush">
                            <li class="list-group-item">Volwassenen: &euro; <?php echo $cottage['cottage_price_a'];?></li>
                            <li class="list-group-item">Kinderen: &euro; <?php echo $cottage['cottage_price_c'];?></li>
                    </ul>
            </div>

            <div class="col">
                additions (aparte file in includes)
            </div>
        </div>
    </div>
</section> 
<?php
include "calculateprice.php";

?>