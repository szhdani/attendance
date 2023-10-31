<?php
    $title = 'View records';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if(isset($_GET['result'])){
        if(is_numeric($_GET['result'])){
            include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        }
    }

    $results = $crud->getAttendees();
?>

    <table class="table">
        <tr>
            <th>#</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Specialty</th>
            <th>Actions</th>
        </tr>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
                <td><?php echo $r['attendee_id'] ?></td>
                <td><?php echo $r['firstname'] ?></td>
                <td><?php echo $r['lastname'] ?></td>
                <td><?php echo $r['name'] ?></td>
                <td>
                    <a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a>
                    <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

<?php require_once 'includes/footer.php'; ?>