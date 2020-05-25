<?php require VIEW_PATH."header.php"; ?>
<main>
    <div id="mainform">
        <?php 
            if(!empty($result["view"]))
                require VIEW_PATH.$result["view"].".php"; ?>                     
    </div>
</main>
<?php require VIEW_PATH."footer.php"; ?>