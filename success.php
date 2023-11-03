<?php
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        $destination = NULL;
        if(!empty($_FILES['avatar']['tmp_name'])){
            $original_file = $_FILES['avatar']['tmp_name'];
            $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            $target_dir = 'uploads/';
            $destination = $target_dir.$contact.'.'.$extension;
            move_uploaded_file($original_file, $destination);
        }

        $isSuccess = $crud->insertAttendee($fname, $lname, $dob, $email, $contact, $specialty, $destination);
        $specialtyName = $crud->getSpecialtyById($specialty);

        if($isSuccess){
            include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        }
    }
?>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <img src="<?php echo empty($destination)?"uploads/default.jpg":$destination ?>" class="rounded-circle w-100"/>
            <h5 class="card-title">
                <?php echo $_POST['firstname'].' '.$_POST['lastname']?>
            </h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">
                <?php echo $specialtyName['name']?>
            </h6>
            <p class="card-text">
                Date of birth: <?php echo $_POST['dob']?>
            </p>
            <p class="card-text">
                Email: <?php echo $_POST['email']?>
            </p>
            <p class="card-text">
                Contact number: <?php echo $_POST['phone']?>
            </p>
        </div>
    </div>
    <?php

    ?>

<?php require_once 'includes/footer.php'; ?>