<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Connexion</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial, sans-serif;
}

body{
    background:#f5f3eb;
}

header{
    background:white;
    border-bottom:1px solid #ddd;
    padding:15px 150px;
    display:flex;
    align-items:center;
    gap:15px;
}

.logo{
    width:40px;
    height:40px;
    background:#006d68;
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
    border-radius:10px;
    font-weight:bold;
}

.title h2{
    font-size:18px;
}

.title p{
    color:#667;
}

.container{
    display:flex;
    justify-content:center;
    margin-top:70px;
}

.card{
    width:400px;
    background:white;
    padding:30px;
    border-radius:15px;
    border:1px solid #ddd;
}

.card h1{
    text-align:center;
    margin-bottom:10px;
}

.card p{
    text-align:center;
    color:#556;
    margin-bottom:25px;
}

label{
    display:block;
    margin-bottom:5px;
    font-weight:bold;
}

input{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:8px;
    margin-bottom:15px;
}

button{
    width:100%;
    padding:12px;
    background:#006d68;
    color:white;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
}

.skip{
    display:block;
    text-align:center;
    margin-top:15px;
    color:#556;
    text-decoration:none;
}

footer{
    text-align:center;
    margin-top:70px;
    color:#556;
}
</style>
</head>

<body>

<header>
    <div class="logo">C</div>

    <div class="title">
        <h2>Caisse</h2>
        <p>Supermarché — Promo 18</p>
    </div>
</header>

<div class="container">
    <div class="card">

        <h1>Connexion</h1>
        <p>Accédez à votre poste de caisse</p>
        <?php if (session()->getFlashdata('error')): ?>
            <p style="color:red; text-align:center;">
                <?= session()->getFlashdata('error') ?>
            </p>
        <?php endif; ?>
        <form action="<?= base_url('/login') ?>" method="POST">
            <?= csrf_field() ?>

            <label>Nom</label>
            <input type="text" name="nom" placeholder="admin">

            <label>Mot de passe</label>
            <input type="password" name="mdp">

            <button type="submit">Se connecter</button>
        </form>

    </div>
</div>

<footer>
    © 2026 ITUNIVERSITY — TD SI-IHM
</footer>

</body>
</html>
