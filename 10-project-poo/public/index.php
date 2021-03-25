<?php

/**
 * Pour bien nous organiser, toutes les pages "publiques"
 * sont situées dans le dossier public.
 */

// On peut inclure toutes les bibliothèques de Composer
require __DIR__.'/../vendor/autoload.php';

require __DIR__.'/../views/header.php';

use App\Form;

$form = new Form($_POST);
dump($form);
dump($form->get('email'));

// Sans l'objet, on fait ça
$email = $_POST['email'] ?? null;
// Avec l'objet, on fait ça
$email = $form->get('email');

if ($form->isSubmit()) {
    // Envoi un email...
    // Fais une requête en BDD...
    echo $form->get('civility').' '.$form->get('email').' a envoyé un message: <br />';
    echo $form->get('message');
}

?>

<form action="" method="post">
    <?= $form->select('civility', 'Civilité', ['Mr' => 'Mr', 'Mme' => 'Mme']); ?>
    <?= $form->input('email', null, 'email'); ?>
    <?= $form->input('telephone', 'Téléphone'); ?>
    <?= $form->textarea('message'); ?>

    <button class="btn btn-primary">Envoyer</button>
</form>

<?php require __DIR__.'/../views/footer.php';
