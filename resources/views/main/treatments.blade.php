<?php
use App\Http\Controllers\MainController;
?>
<!-- Historic -->
<h2><?php echo __('Histórico Tratamientos')?></h2>
<div id="treatment-info">
    <?php $treatments = MainController::groupTreatments($pacient); ?>
    <?php if (isset($treatments) && count($treatments) > 0) :
    foreach ($treatments as $treatment) : ?>
    <ul <?php echo (isset($treatment['class'])) ? 'class="' . $treatment['class'] . '"' : 'class="list-no-active"'; ?>>
        <li class="treatments-box-list-header <?php echo $treatment['treatment']; ?>">
            <span class="treatments-list-title"><?php echo $treatment['treatment']; ?></span>
            <?php if ($treatment['treatment'] === 'cuadrante') : ?>
            @include('includes.treatments.cuadrantessvg')
            <?php endif; ?>
            <span class="treatments-list-date"><?php echo $treatment['date']; ?></span>
        </li>
        <li class="treatments-list-observations <?php if (isset($treatment['treatment'])) echo $treatment['treatment'] . '-list'; ?>">
            <span class="bold">Observaciones:</span>
            <span class="treatments-icons">
                <i class="far fa-edit"></i>
                <i class="far fa-check-square hidden"></i>
                <i class="far fa-times-circle hidden"></i>
                <i class="far fa-trash-alt"></i>
            </span>
            <textarea class="div-editable" disabled data-treatment-id="<?php echo $treatment['id']?>" data-treatment-type="<?php echo $treatment['treatment']?>" data-pacient-id="<?php echo $pacient['id']?>"><?php echo trim($treatment['observations']) ?></textarea>
        </li>
    </ul>
    <?php endforeach;
    else :
        echo __('Este paciente no tiene histórico.');
    endif; ?>
</div>