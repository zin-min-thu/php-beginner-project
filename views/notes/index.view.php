<?php require 'views/partials/header.php'?>


    <?php require 'views/partials/nav.php'?>

    <?php require 'views/partials/banner.php'?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <?php foreach($notes as $note) : ?>
                <li>
                    <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                        <?= htmlspecialchars($note['body']) ?>
                    </a>
                </li>
            <?php endforeach; ?>

            <p class="mt-3">
                <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
            </p>
        </div>
    </main>


<?php require 'views/partials/footer.php'?>