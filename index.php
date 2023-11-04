<?php
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();
?>

    <h1 class="text-center">Registration for IT conference</h1>

    <form method="post" action="success.php" enctype="multipart/form-data" autocomplete="off">
        <div class="mb-3">
            <label for="firstname">First name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname">Last name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="dob">Date of birth</label>
            <input required type="text" class="form-control" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="specialty" class="form-label">Area of expertise</label>
            <select class="form-select" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact number</label>
            <input required type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Choose file</label>
            <input class="form-control" type="file" accept="image/*" id="avatar" name="avatar" aria-describedby="avatarHelp">
            <div id="avatarHelp" class="form-text">File upload is optional</div>
        </div>
        <div class="d-grid gap-2 mx-auto">
            <button type="submit" name="submit" class="btn btn-success">Register</button>
        </div>
    </form>

<?php require_once 'includes/footer.php'; ?>