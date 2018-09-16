<div class="arrow-show-reminder">
    <i class="fas fa-calendar-alt"></i>
</div>
<?php if (isset($next_dates)) : ?>
    <ul class="next-dates-list">
        <?php foreach ($next_dates as $date) : ?>
            <li>
                <p>
                    <span class="span-date"><?php echo $date->next_date?></span>
                    <span class="span-pacient">
                        <?php echo ucfirst($date->name) . ' ' . ucfirst($date->lastname) ?>
                        <span class="span-phone"><?php echo $date->phone ?> </span>
                    </span>
                    <span class="span-treatment"><?php echo $date->treatment ?></span>
                    <i class="fas fa-times close-reminder-date" data-additional-info="<?php echo $date->id ?>"></i>
                </p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <ul class="next-dates-list">
        <li><?php echo __('No hay citas pendientes') ?></li>
    </ul>
<?php endif; ?>

