<h2>Citas</h2>
<?php if (isset($next_dates)) : ?>
    <ul class="next-dates-list">
        <?php foreach ($next_dates as $date) : ?>
            <li data-additional-info="<?php echo $date->id?>">
                <span><?php echo $date->next_date?></span>
                <span><?php echo ucfirst($date->name) . ' ' . ucfirst($date->lastname) ?></span>
                <span><?php echo $date->treatment ?></span>
                <i class="fas fa-times close-reminder-date"></i>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p><?php echo __('No hay citas pendientes') ?></p>
<?php endif; ?>

