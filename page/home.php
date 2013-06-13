<?php



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SupLink</title>
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
</head>

<body>
    <div class="container-narrow">
        <div class="masthead">
            <?php
            if(isset($_SESSION['logged_id'])) {
                ?>
                <ul class="nav nav-pills pull-right">
                    <li class="active"><a href="/home">Home</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
                <?php
            }
            else {
                ?>
                <ul class="nav nav-pills pull-right">
                    <li class="active"><a href="/home">Home</a></li>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                </ul>
                <?php
            }
            ?>
        <h3 class="muted">SupLink-143783</h3>
        </div>

        <hr>

        <div class="jumbotron">
            <form method="post" action="php/create_link.php">
                <fieldset>
                    <input type="text" name="name" class="" placeholder="Name" required>
                    <input type="text" name="long_url" class="span6" placeholder="http://super.longue.url/plein-de-texte?mdr=true" required>
                    <br>
                    <?php
                    if(isset($_SESSION['logged_id'])) {
                        ?>
                        <button type="submit" class="btn btn-mini">short it</button>
                        <?php
                    }
                    else {
                        ?>
                        <button type="submit" class="btn btn-mini" disabled="true">short it</button>
                        <?php
                    }
                    ?>
                </fieldset>
            </form>
        </div>

        <hr>

        <?php
        if(isset($_SESSION['logged_id'])) {
            $link = new Link();
            echo '<table class="table table-striped">
    <thead>
        <tr>
            <td>name</td>
            <td>short_link</td>
            <td>long_link</td>
            <td>click_total</td>
            <td>date_create</td>
            <td>en/dis-able</td>
            <td>DELETE</td>
        </tr>
    </thead>
    <tbody>';
            foreach ($link->get_link_fromUser($_SESSION['logged_id']) as $row) {
                echo '<tr>';
                    echo '<td><a href="http://suplink-143783.dev/stats/'.$row['short_link'].'">'.$row['name'].'</a></td>';
                    echo '<td><a href="http://suplink-143783.dev/'.$row['short_link'].'">http://suplink-143783.dev/'.$row['short_link'].'</a></td>';
                    echo '<td>'.$row['long_link'].'</td>';
                    echo '<td>'.$row['click_total'].'</td>';
                    echo '<td>'.$row['date_create'].'</td>';

                    if($row['enable']) {
                        echo '<td><a href="/php/enable_link.php?sl='.$row['short_link'].'&iu='.$row['id_user'].'&en=disable">disable</a></td>';
                    }
                    else {
                        echo '<td><a href="/php/enable_link.php?sl='.$row['short_link'].'&iu='.$row['id_user'].'&en=enable">enable</a></td>';
                    }
                    echo '<td><a href="/php/delete_link.php?sl='.$row['short_link'].'&iu='.$row['id_user'].'"><i class="icon-trash"></i></a></td>';
                echo '</tr>';
            }
            echo '</tbody>
    </table>';
            echo '<hr>';
        }
        ?>

        <div class="footer">
            <?php
            if(isset($_SESSION['logged_email'])) {
                ?>
                <p>&copy; SupLink-143783 -- Connected as <?php echo $_SESSION['logged_email']; ?> -- 2013</p>

                <?php
            }
            else {
                ?>
                <p>&copy; SupLink-143783 -- 2013</p>

                <?php
            }
            ?>

        </div>

    </div>

</body>
</html>
