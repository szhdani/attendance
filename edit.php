<?php
    $title = 'Edit record';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();

    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }
    else{
        $id = $_GET['id'];
        if($crud->attendeeExists($id)){
            $attendee = $crud->getAttendeeDetails($id);
?>

    <h1 class="text-center">Edit record</h1>

    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>">
        <div class="mb-3">
            <label for="firstname">First name</label>
            <input require type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname">Last name</label>
            <input require type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="dob">Date of birth</label>
            <input require type="text" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="specialty" class="form-label">Area of expertise</label>
            <select class="form-select" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $r['specialty_id'] ?>"
                    <?php if($r['specialty_id'] == $attendee['specialty_id']){
                        echo 'selected';
                    } ?>>
                        <?php echo $r['name'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input require type="email" class="form-control" value="<?php echo $attendee['emailaddress'] ?>" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact number</label>
            <input require type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>" id="phone" name="phone" aria-describedby="phoneHelp">
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        <a href="viewrecords.php" class="btn btn-secondary">Cancel</a>
        <button type="submit" name="submit" class="btn btn-success">Save changes</button>
    </form>

<?php   }
        else{
            include 'includes/idnotfound.php';
        } 
    }?>

<?php require_once 'includes/footer.php'; ?>