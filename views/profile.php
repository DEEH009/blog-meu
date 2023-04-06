<?php
$page_title = "Profile"; 
include (__DIR__ . "/components/header.php");

block_access();
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <a class="btn btn-primary" href="../index.php" role="button">Home</a>
        </div>
        <?= success_notification()?>
        <?= error_notification() ?>

        <h2>Your Profile</h2>
        <img style="width:115; height: 100px" class="img-thumbnail" src="<?= user()['profile_picture']?>"
            alt="img_profile">


        <div class="col-md-3">
            <form method="post" action="../actions/edit_user.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="hidden" name="id" value="<?= user()["id"]?>">
                    <label for="user" class="form-label">User Name:</label>
                    <input type="text" class="form-control" id="user" value="<?= user()["name"] ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">User email:</label>
                    <input type="text" class="form-control" id="email" value="<?= user()["email"] ?>">
                </div>
                <div class="mb-3">
                    <label for="birth" class="form-label">User birth:</label>
                    <input id="birth" name="birth" type="date" class="form-control" value="<?= user()["birth_date"] ?>">
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label">Update picture:</label>
                    <input class="btn btn-primary" class="form-control" id="picture" name="picture" type="file">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Edit Profile</button>
                </div>
            </form>
        </div>

        <h3 class="text-center mt-5 mb-4">your posts</h3>


        <?php
$seach_public = $config->query("SELECT  id, post, title, picture FROM posts WHERE id_user = ".user()['id']."  ORDER BY id DESC");
$post = array();
if ($seach_public) {
    if ($seach_public->num_rows > 0) {
        while ($row = $seach_public->fetch_assoc()) {
            $post[] = $row;
            
        }
    }
}

if (count($post)) : foreach ($post as $posts) : ?>
        <div class="mt-4">
            <div style="padding: 0px 519px;">
                <form action="../actions/edit_post.php" method="post">
                    <div class="card" style="max-width: 20rem;">

                        <img class="card-img-top" src='<?= $posts['picture'] ?>'>
                        <div class="card-body">

                            <div class="post-content">
                                <h5 class="card-title"><?= $posts['title'] ?></h5>
                                <p class="card-text"><?= $posts['post'] ?></p>
                            </div>

                            <div class="input-title">
                                <input type="text" name="edit_post_title" class="edit_post_title"
                                    value="<?= $posts['title'] ?>">
                            </div>
                            <input type="hidden" name="post_id" value="<?= $posts['id'] ?>">
                            <div class="input-post">
                                <textarea name="edit_post_post" class="edit_post_post form-label"
                                    style="max-height: 125px; max-width: 260px; resize:none"><?= $posts['post'] ?></textarea>
                            </div>
                            <button class="edit-post btn btn-primary" type="button" role="button">Edit</button>
                            <button style="display: none;" type="submit" role="button"
                                class="save-edit-post btn btn-success" type="button">Salvar</button>

                            <a style="display: none;" href="../../actions/delete_post.php?post_id=<?= $posts["id"]?>"
                                class="delete-post btn btn-danger"> Delete</a>

                        </div>
                    </div>
            </div>
            </form>


            <?php endforeach; endif;?>
        </div>

</body>

<script>
$(".input-post").hide();
$(".input-title").hide();

$("body").on("click", ".edit-post", function() {
    $(this).closest("div.card").find(".input-post").toggle();
    $(this).closest("div.card").find(".input-title").toggle();

    $(this).closest("div.card").find(".save-edit-post").toggle();

    $(this).closest("div.card").find(".delete-post").toggle();

    $(this).closest("div.card").find(".post-content").toggle();
});
</script>

</html>