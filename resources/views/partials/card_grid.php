<ul class="Card-grid" card-grid>
    <?php foreach ($cards as $card): ?>
        <li class="Card-item">
            <?php include(base_path("resources/views/partials/card.php")); ?>
        </li>
    <?php endforeach; ?>
</ul>