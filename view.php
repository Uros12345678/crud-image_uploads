<?php
if(empty($_GET['id'])){
    header("Location: manage.php");
}
// Include and initialize DB class
require_once 'DB.class.php';
$db = new DB();
$conditions['where'] = array(
    'id' => $_GET['id'],
);
$conditions['return_type'] = 'single';
$galData = $db->getRows($conditions);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">

 
<div class="row">
    
<div class="col-md-12">
        <h5><?php echo !empty($galData['title'])?$galData['title']:''; ?></h5>
        <h5><?php echo !empty($galData['description'])?$galData['description']:''; ?></h5>
        <h5><?php echo !empty($galData['content'])?$galData['content']:''; ?></h5>
        <h5><?php echo !empty($galData['content2'])?$galData['content2']:''; ?></h5>
        <h5><?php echo !empty($galData['tel'])?$galData['tel']:''; ?></h5>
        <?php if(!empty($galData['images'])){ ?>
            <div class="gallery-img">
            <?php foreach($galData['images'] as $imgRow){ ?>
                <div style="display:inline-block;" class="img-box" id="imgb_<?php echo $imgRow['id']; ?>">
                    <img src="uploads/images/<?php echo $imgRow['file_name']; ?>" height="250">
                    <a href="javascript:void(0);" class="badge badge-danger" onclick="deleteImage('<?php echo $imgRow['id']; ?>')">delete</a>
                </div>
            <?php } ?>
            </div>
        <?php } ?>
    </div>
    <a href="index.php" class="btn btn-primary">Back to List</a>
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>