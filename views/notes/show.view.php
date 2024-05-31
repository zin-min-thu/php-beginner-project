<?php require base_path('views/partials/header.php')?>


    <?php require base_path('views/partials/nav.php')?>

    <?php require base_path('views/partials/banner.php')?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p><?= htmlspecialchars($note['body']) ?></p>
            <div class="flex fle-row my-3">

                <a class="text-gray-700 hover:bg-gray-700 hover:text-white border-2 rounded-md p-2" href="/note/edit?id=<?= $note['id'] ?>">Edit</a>

                <form class="ml-3" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                    <button class="tex-sm hover:bg-red-700 hover:text-white text-red-500 border-2 rounded-md p-2" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </main>


<?php require base_path('views/partials/footer.php')?>