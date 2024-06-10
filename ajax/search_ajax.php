<?php
require '../functions.php';

$keyword = $_GET['keyword'] ?? '';
$rows = search($keyword);
?>
<div class="list-group">
    <?php if (count($rows) > 0) : ?>
        <?php foreach ($rows as $row) : ?>
            <a href="content/<?= htmlspecialchars(strtolower($row['description'])) ?>.php" class="list-group-item list-group-item-action">
                <h5 class="mb-1"><?= htmlspecialchars($row['title']) ?></h5>
            </a>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No results found.</p>
    <?php endif; ?>
</div>