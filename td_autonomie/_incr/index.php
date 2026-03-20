<?php 

use model\form\elem\Text;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['form']['name'])) {
        $prenom = $_POST['form']['name'];
        $_SESSION['pseudo'] = $prenom;
        header('Location: /quiz');
        exit();
    }
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <title>Quiz</title>
</head>
<body class="index">
    <h1>Bienvenue sur l'application des Quiz</h1>
    <form action="" method="post">
        <article>
            <label for="">Entrer votre Pseudo : </label>
            <?php echo new Text('name', True); ?>
        </article>
        <button type="submit">Valider</button>
    </form>
</body>
</html>