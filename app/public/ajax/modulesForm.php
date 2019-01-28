<div class="selectModulesGroup form-group">
    <label for="modulesSession">Modules sélectionnés
        <button type="button" class="btn btn-primary btn-sm" id="resetModuleBtn">Vider</button></label>
    <?php foreach($modules as $key => $value) { ?>
        <div class="selectModulesRow form-row">
            <div class="col">
                <input type="text" class="form-control" aria-describedby="name_module" value="<?= $value['name_module']; ?>" disabled>
            </div>
            <div class="col">
                <input type="text" class="form-control" aria-describedby="Duree en jours" value="<?= $value['days_module']; ?> jours" disabled>
            </div>
            <div class="col">
                <button type="button" data-keymodule="<?= $key; ?>" class="removeModuleBtn btn btn-primary btn-sm"><i class="far fa-trash-alt"></i></button>
            </div>
        </div>
    <?php } ?>
</div>
