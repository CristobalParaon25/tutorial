<?php
include('connection.php');

$getRecords ="SELECT ID, ContactName, ContactNumber FROM records";

$results = $conn->query($getRecords);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container shadow-lg mt-4 rounded">
        <h1 class="text-center pt-4">Phonebook</h1>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <form class="d-flex">
                    <button class="btn btn-outline-success" type="submit ">Search</button>   
                    <input class="form-control me-2 ms-2" type="search" placeholder="" aria-label="Search">
                </form>
            </div>
        </nav>
            <table class="table table-responsive">
                <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact #</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
    <?php foreach($results as $result): ?>
        <tr>
            <td class="text-truncate"><?php echo $result['ID']; ?></td>
            <td class="text-truncate"><?php echo $result['ContactName']; ?></td>
            <td class="text-truncate"><?php echo $result['ContactNumber']; ?></td>
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $result['ID']; ?>">Edit</button>
                <a href="recorddelete.php?id=<?php echo $result['ID']; ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    
        <div class="modal fade" id="editModal<?php echo $result['ID']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $result['ID']; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel<?php echo $result['ID']; ?>">Edit Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      
                        <form method="POST" action="recordeditsave.php">
                            <input type="hidden" name="editRecordId" value="<?php echo $result['ID']; ?>">
                            <div class="mb-3">
                                <label for="editContactName<?php echo $result['ID']; ?>" class="form-label">Name</label>
                                <input type="text" class="form-control" id="editContactName<?php echo $result['ID']; ?>" name="editContactName" value="<?php echo $result['ContactName']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="editContactNumber<?php echo $result['ID']; ?>" class="form-label">Contact #</label>
                                <input type="text" class="form-control" id="editContactNumber<?php echo $result['ID']; ?>" name="editContactNumber" value="<?php echo $result['ContactNumber']; ?>" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</tbody>

            </table>
            <div class="text-end">
            <button type="button" class="btn btn-primary btn-success mb-4" data-bs-toggle="modal" data-bs-target="#addModal">Add</button>
            </div>
        </div>

       <!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for adding a new record -->
                <form method="POST" action="recordsave.php">
                    <div class="mb-3">
                        <label for="contactName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="contactName" name="contactName" placeholder="Enter Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="contactNumber" class="form-label">Contact #</label>
                        <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="Enter Contact Number" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"
    ></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"
    ></script>
</body>
</html>
