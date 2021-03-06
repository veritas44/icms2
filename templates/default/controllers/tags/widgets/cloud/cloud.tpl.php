<?php if ($tags){ ?>

    <div class="widget_tags_cloud">

        <ul class="tags_as_<?php echo $style; ?>">
            <?php foreach($tags as $tag) { ?>

                <?php
                    $color = false;
                    if($colors){
                        $color = current($colors);
                        if(!next($colors)){reset($colors);}
                    }
                    $url_prefix = '';
                    if(count($subjects) == 1){
                        $url_prefix = 'content-'.reset($subjects);
                    }
                ?>

                <?php if ($style=='cloud'){ ?>
                    <?php
                        $size_percent = round(($tag['frequency'] * 100) / $max_freq);
                        $step = 0;
                        if($size_percent){
                            $portion = round(100 / $size_percent, 2);
                            $step = round(($max_fs - $min_fs) / $portion);
                        }
                        $fs = $min_fs + $step;
                    ?>
                    <li <?php if($color){ echo 'class="colored"'; } ?> style="font-size: <?php echo $fs; ?>px;<?php if($color){ echo ' color: '.$color; } ?>">
                        <?php echo html_tags_bar($tag['tag'], $url_prefix); ?>
                    </li>
                <?php } ?>

                <?php if ($style=='list'){ ?>
                    <li <?php if($color){ echo 'class="colored" style="color: '.$color.'"'; } ?>>
                        <?php echo html_tags_bar($tag['tag'], $url_prefix); ?>
                        <span class="counter"><?php html($tag['frequency']); ?></span>
                    </li>
                <?php } ?>


            <?php } ?>
        </ul>

    </div>

<?php } ?>