<?php

/**
 * Pour bien nous organiser, toutes les pages "publiques"
 * sont situées dans le dossier public.
 */

// On peut inclure toutes les bibliothèques de Composer
require __DIR__.'/../vendor/autoload.php';

require __DIR__.'/../views/header.php';

use App\Form;
use App\Validation;

$form = new Form($_POST);
$validation = new Validation($form);
$validation->add('civility')->required()->in(['Mr', 'Mme']);
$validation->add('email')->required()->email();
$validation->add('telephone')->required()->min(10)->number();
$validation->add('message')->required()->min(15);
// Potentiellement, en @todo on pourrait ajouter une règle confirmed()
// $validation->add('password')->required()->min(6)->confirmed();
// Le confirmed pourrait comparer le champ password et password_confirmation

// Sans l'objet, on fait ça
$email = $_POST['email'] ?? null;
// Avec l'objet, on fait ça
$email = $form->get('email');
// ou ça
$email = $form->email;

if ($form->isSubmit() && $validation->isValid()) {
    // Envoi un email...
    // Fais une requête en BDD...
    echo $form->get('civility').' '.$form->get('email').' a envoyé un message: <br />';
    echo $form->message; // $form->message est idem que $form->get('message');
}

?>

<form action="" method="post">
    <div>
        <?= $form->select('civility', 'Civilité', ['Mr' => 'Mr', 'Mme' => 'Mme']); ?>
        <?= $validation->error('civility'); ?>
    </div>
    <div>
        <?= $form->input('email', null, 'email'); ?>
        <?= $validation->error('email'); ?>
    </div>
    <div>
        <?= $form->input('telephone', 'Téléphone'); ?>
        <?= $validation->error('telephone'); ?>
    </div>
    <div>
        <?= $form->textarea('message'); ?>
        <?= $validation->error('message'); ?>
    </div>

    <button class="btn btn-primary">Envoyer</button>
</form>

<?php require __DIR__.'/../views/footer.php';
