<?php require_once('getposts.php'); ?>
<?php if (count($result) > 0): ?>
    <ul>
    <?php foreach ($result as $r): ?>
        <li>
            <span class="date"><?php echo $r['date']; ?></span>
            <span class="title"><?php echo $r['title']; ?></span>
            <span class="body"><?php echo $r['body']; ?></span>
            <span class="favs"><?php echo $r['favorites']; ?></span>
        </li>
    <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No results found.</p>
<?php endif; ?>
