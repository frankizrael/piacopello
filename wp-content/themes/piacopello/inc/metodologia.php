<section class="metodologia">
    <div class="x-container">
        <h2>Metodología</h2>
        <div class="metodologia__content">
            <?php 
                $metodologia = get_field("metodologia", "options");
                if ($metodologia) {
                    $aux = 1;
                    foreach ($metodologia as $met) {
                        ?>
            <div class="metodologia__item">
                <img src="<?php echo $met["imagen"]; ?>" />
                <div class="content">
                    <span><?php echo $aux; ?></span>
                    <div><?php echo $met["name"]; ?></div>
                </div>
            </div>
                        <?php
                    $aux++;
                    }
                }
            ?>
        </div>
    </div>
</section>