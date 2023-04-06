<?php
$page_title = "Home"; 
include (__DIR__ . "/views/components/header.php");

    block_access();
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary dropdown-toggle " data-bs-toggle="dropdown"
                    aria-expanded="false">
                    ☰
                </button>
                <div class="row">
                    <ul class="dropdown-menu text-center">

                        <li><a class="dropdown-item" href="../views/profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="../actions/logout.php">Sigout</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div style="padding: 0px 545px;">
            <div class="row">
                <div class="mb-3">
                    <h3>Post something cool!!!</h3>
                    <form method="post" action="../actions/add_publications.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <input id="title" maxlength="155" name="title" type="text" placeholder="Title"
                                    class="form-control" aria-label="First name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col">
                                <input id="post" maxlength="255" name="post" type="text" placeholder="Text Content"
                                    class="form-control" aria-label="Last name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col">
                                <input class="btn btn-primary" id="picture" name="picture" type="file" value="upload">
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="subimt">add
                                    publication</button>
                            </div>
                        
                </div>
                </form>
            </div>
        </div>


        <h4 class="text-center mt-5 mb-4">Publications</h4>

        <?php

            $seach_public = $config->query("SELECT  post, title, picture FROM posts ORDER BY id DESC");
            $post = array();
            if ($seach_public) {
                if ($seach_public->num_rows > 0) {
                    while ($row = $seach_public->fetch_assoc()) {
                        $post[] = $row;
                    }
                }
            }

        if (count($post)) : foreach ($post as $posts) : 
        ?>

        <div class="mb-4">
            <div style="padding: 0px 586px;">

                <div class="card">
                    <div class="row">
                        <img style="max-width: 200px; max-height: 200px" class="rounded mx-auto d-block img-thumbnail"
                            src='<?= $posts['picture'] ?>'>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $posts['title'] ?></h5>
                        <p class="card-text"><?= $posts['post'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; endif;?>
    </div>
</body>

</html>