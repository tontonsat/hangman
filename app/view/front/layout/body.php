<body>
    <?php
        if(!empty($_SESSION['error'])) {
            foreach ($_SESSION['error'] as $value) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <i class="fas fa-times"></i> <?= $value; ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php
            }
        }
        if(!empty($_SESSION['success'])) {
            foreach ($_SESSION['success'] as $value) { ?>
                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                  <i class="fas fa-check-square"></i></i> <?= $value; ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php
            }
        }
        unset($_SESSION['success']);
        unset($_SESSION['error']);
     ?>
    <?php require_once $view;
            echo $content;
    ?>
</body>
