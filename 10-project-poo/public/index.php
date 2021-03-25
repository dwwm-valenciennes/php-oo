<?php

/**
 * Pour bien nous organiser, toutes les pages "publiques"
 * sont situées dans le dossier public.
 */

// On peut inclure toutes les bibliothèques de Composer
require __DIR__.'/../vendor/autoload.php';

require __DIR__.'/../views/header.php';

use App\Form;

$form = new Form();
dump($form);

?>

<form action="" method="post">
    <?= $form->select('civility', 'Civilité', ['Mr', 'Mme']); ?>
    <?= $form->input('email', null, 'email'); ?>
    <?= $form->input('telephone', 'Téléphone'); ?>
    <?= $form->textarea('message'); ?>
</form>

<?php require __DIR__.'/../views/footer.php';
