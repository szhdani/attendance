<?php
    $title = 'Delete record';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }
    else{
        $id = $_GET['id'];
        if($crud->attendeeExists($id)){
            $result = $crud->getAttendeeDetails($id);
?>
    <form method="post" action="deletepost.php">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <h1>Details</h1>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $result['firstname'].' '.$result['lastname']?>
                </h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">
                    <?php echo $result['name']?>
                </h6>
                <p class="card-text">
                    Date of birth: <?php echo $result['dateofbirth']?>
                </p>
                <p class="card-text">
                    Email: <?php echo $result['emailaddress']?>
                </p>
                <p class="card-text">
                    Contact number: <?php echo $result['contactnumber']?>
                </p>
            </div>
        </div>
        <h5 class="text-danger">Are you sure you want to delete this record?</h5>
        <a href="viewrecords.php" class="btn btn-secondary">Cancel</a>
        <button type="submit" name="submit" class="btn btn-danger">Delete</button>
    </form>

<?php   }
        else{
            include 'includes/idnotfound.php';
        } 
    }?>
        
<?php require_once 'includes/footer.php'; ?>