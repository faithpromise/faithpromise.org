<div class="Card" link-to="<?= isset($card->card_url) ? $card->card_url : ""; ?>">
    <?php if (isset($card->card_url)): ?>
        <a class="Card-image" href="<?= $card->card_url; ?>" style="background-image: url(<?= $card->card_image ?>);"></a>
    <?php else: ?>
        <span class="Card-image" style="background-image: url(<?= $card->card_image ?>);"></span>
    <?php endif; ?>
    <div class="Card-body">
        <?php if (isset($card->card_url)): ?>
            <h3 class="Card-title"><a href="<?= $card->card_url ?>"><?= $card->card_title ?></a></h3>
        <?php else: ?>
            <h3 class="Card-title"><?= $card->card_title ?></h3>
        <?php endif; ?>
        <h4 class="Card-subtitle"><?= isset($card->card_subtitle) ? $card->card_subtitle : ""; ?></h4>
        <p class="Card-text"><?= isset($card->card_text) ? $card->card_text : ""; ?></p>
    </div>
    <div class="Card-footer">
        <?php if (isset($card->card_url)): ?>
            <a class="Card-link" href="<?= $card->card_url; ?>"><?= (isset($card->card_url_text) && strlen($card->card_url_text)) ? $card->card_url_text : "More Details" ?>
                <i class="icon-right-open-big"></i></a>
        <?php endif; ?>
    </div>
</div>