<?php require_once("partials/head.php"); ?>
<?php require_once("partials/nav.php"); ?>

<?php include_once("config/db.php"); ?>
<div class="container mt-5 shadow p-5">
    <h2 class="text-center">Enter Players Information</h2>
    <br>
    <form action="add.php" method="post">
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="name">Player Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter player name !">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="marketVlu">Market Value</label>
                    <input type="text" class="form-control" name="marketVlu" placeholder="Enter Market Value !">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" name="position" placeholder="Enter player position !">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="club">Club</label>
                    <input type="text" class="form-control" name="club" placeholder="Enter Club Name !">
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary form-control" name="submit">
        </div>
    </form>

    <br><br>

    <?php
    $query = "SELECT * FROM players";
    $result = mysqli_query($conn, $query);
    $records = mysqli_num_rows($result);


    ?>
    <table class="table text-white bg-dark">
        <thead>
            <th>Name</th>
            <th>Market Value</th>
            <th>Position</th>
            <th>Club</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            if ($records) {
                while ($rows = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?php echo $rows['name']; ?></td>
                        <td><?php echo $rows['market_value']; ?></td>
                        <td><?php echo $rows['position']; ?></td>
                        <td><?php echo $rows['club']; ?></td>
                        <td>
                            <a href="add.php?id=<?php echo $rows['id']; ?>" class="btn btn-primary" type="button" name="edit">edit</a>
                            <a href="delete.php?id=<?php echo $rows['id']; ?>" class="btn btn-danger">delete</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
<?php require_once("partials/footer.php"); ?>