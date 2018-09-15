<div class="arrow-show-reminder">
    <i class="fas fa-calendar-alt"></i>
</div>
<?php if (isset($next_dates)) : ?>
    <ul class="next-dates-list">
        <?php foreach ($next_dates as $date) : ?>
            <li>
                <?php echo $date->next_date?>
                <?php echo ucfirst($date->name) . ' ' . ucfirst($date->lastname) ?>
                <?php echo $date->treatment ?>
                <i class="fas fa-times close-reminder-date" data-additional-info="<?php echo $date->id ?>"></i>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <ul class="next-dates-list">
        <li><?php echo __('No hay citas pendientes') ?></li>
    </ul>
<?php endif; ?>

