<?php require base_path('views/partials/header.php')?>


    <?php require base_path('views/partials/nav.php')?>

    <?php require base_path('views/partials/banner.php')?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p><?= htmlspecialchars($note['body']) ?></p>

            <form class="mt-3" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="tex-sm text-red-500" type="submit">Delete</button>
            </form>
        </div>
    </main>


<?php require base_path('views/partials/footer.php')?>