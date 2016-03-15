<?php

use Illuminate\Support\Facades\App;

if (App::environment('production')):
//@formatter:off
    ?>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=<?= config('site.google_tag_manager_id') ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','<?= config('site.google_tag_manager_id') ?>');</script>
<!-- End Google Tag Manager -->
<?php
//@formatter:on
else:
    echo '<!-- Google Analytics will be inserted here in production -->';
endif;