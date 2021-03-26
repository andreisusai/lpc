<?php
require APPROOT . '/views/inc/header.php'; ?>

<div class="container pt-9">
    <div id="aboutus-showcase">
        <div class="aboutus-content">
            <div class="aboutus-showcase-content">
                <h1><?php echo $data["title"] ?></h1>
                <p class="aboutus-lead"><?php echo $data["quote"] ?></p>
            </div>
        </div>
    </div>
    <div id="first-aboutus-infos">
        <div class="first-aboutus-image-info"></div>
        <div class="first-aboutus-infos-content">
            <h2><?php echo ucfirst($data["second_title"]) ?></h2>
            <p><?php echo $data["second_quote"] ?></p>
        </div>
    </div>
    <div id="second-aboutus-infos">
        <div class="second-aboutus-image-info"></div>
        <div class="second-aboutus-infos-content">
            <h2><?php echo ucfirst($data["third_title"]) ?></h2>
            <p><?php echo $data["third_quote"] ?></p>
            <address>
                25 rue de paris <br>
                75000 <br>
                Paris <br>
            </address>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>