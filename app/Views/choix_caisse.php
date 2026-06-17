<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Choix de la caisse</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
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
}

.header-title{
    flex:1;
}

.btn-deconnexion{
    display:flex;
    align-items:center;
    gap:8px;
    padding:9px 18px;
    background:white;
    color:#006d68;
    border:1.5px solid #006d68;
    border-radius:8px;
    font-size:14px;
    font-weight:bold;
    text-decoration:none;
    transition:background 0.2s, color 0.2s;
}

.btn-deconnexion:hover{
    background:#006d68;
    color:white;
}

.container{
    display:flex;
    justify-content:center;
    margin-top:40px;
}

.card{
    width:450px;
    background:white;
    border:1px solid #ddd;
    border-radius:15px;
    padding:30px;
}

h1{
    margin-bottom:10px;
}

.description{
    color:#556;
    margin-bottom:25px;
}

label{
    display:block;
    margin-bottom:8px;
    font-weight:bold;
}

select{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:8px;
}

button{
    width:100%;
    margin-top:18px;
    padding:12px;
    background:#006d68;
    color:white;
    border:none;
    border-radius:8px;
    font-size:18px;
    cursor:pointer;
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

    <div class="header-title">
        <h3>Caisse</h3>
        <p>Supermarché — Promo 18</p>
    </div>

    <a href="<?= base_url('/logout') ?>" class="btn-deconnexion">
        Déconnexion
    </a>
</header>

<div class="container">

    <div class="card">

        <h1>Choix de la caisse</h1>

        <p class="description">
            Sélectionnez le poste avec lequel vous travaillez aujourd'hui.
        </p>

        <form action="<?= base_url('/caisse/choisir') ?>" method="POST">
            <?= csrf_field() ?>
            <label>Caisse</label>
            <select name="caisse_id">
                <?php foreach ($caisses as $caisse): ?>
                    <option value="<?= $caisse['id'] ?>">
                        <?= esc($caisse['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Valider</button>
        </form>

    </div>

</div>

<footer>
    © 2026 ITUNIVERSITY — TD SI-IHM
</footer>

</body>
</html>
