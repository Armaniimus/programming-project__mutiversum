<header>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><img src="view/assets/images/vr.png" height="50px"/>Multiversum</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?view=products">Producten</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?view=contact">Contact</a>
                </li>
            </ul>

            <a href="index.php?view=winkelwagen" class="btn btn-sm btn-outline-secondary mr-3">Winkelwagen</a>

            <?php
                if (!isset($previousSearch)) {
                    $previousSearch = '';
                }
             ?>
            <form class="form-inline my-2 my-lg-0" action="index.php?view=search" method="post">
                  <input class="form-control mr-sm-2" name="search" placeholder="Zoeken" value="<?php echo $previousSearch ?>">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Zoeken</button>
            </form>
        </div>
    </nav>
</header>
