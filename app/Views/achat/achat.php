<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Saisie des achats</title>
<link href="<?= base_url('assets/css/achat.css') ?>" rel="stylesheet">
</head>
<body>
<header>
    <div class="logo">C</div>
    <div class="header-title">
        <h3>Caisse n°<?= esc($caisse_id) ?></h3>
        <p>Supermarché — Promo 18</p>
    </div>
    <a href="<?= base_url('/logout') ?>" class="btn-deconnexion">
        Déconnexion
    </a>
</header>
<div class="container">
    <h1>Saisie des achats</h1>
    <p class="subtitle">
        Ajoutez les produits passés en caisse pour le client en cours.
    </p>

    <?php if (session()->getFlashdata('erreur')) : ?>
        <p style="color:#b00020;"><?= esc(session()->getFlashdata('erreur')) ?></p>
    <?php endif; ?>

    <form class="form" method="post" action="<?= base_url('achat/ajouter') ?>">
        <?= csrf_field() ?>
        <div class="group">
            <label>Produit</label>
            <select name="id_produit" required>
                <?php foreach ($produits as $produit) : ?>
                    <option value="<?= $produit['id'] ?>">
                        <?= esc($produit['designation']) ?> — <?= number_format((float) $produit['prix_unitaire'], 0, ',', ' ') ?> F
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div style="width:250px;">
            <label>Quantité</label>
            <input type="number" name="quantite" value="1" min="1" required>
        </div>
        <button class="btn" type="submit">
            Valider
        </button>
    </form>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>PRODUIT</th>
                    <th>PRIX UNIT</th>
                    <th>QTÉ</th>
                    <th>MONTANT</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($lignes)) : ?>
                    <tr>
                        <td colspan="4">
                            Aucun achat saisi pour ce client.
                        </td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($lignes as $ligne) : ?>
                        <tr>
                            <td><?= esc($ligne['designation']) ?></td>
                            <td><?= number_format((float) $ligne['prix_unitaire'], 0, ',', ' ') ?> F</td>
                            <td><?= (int) $ligne['quantite'] ?></td>
                            <td><?= number_format($ligne['prix_unitaire'] * $ligne['quantite'], 0, ',', ' ') ?> F</td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" style="text-align:right;">
                        Total
                    </th>
                    <th class="total">
                        <?= number_format($total, 0, ',', ' ') ?> F
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>

    <form class="cloture" method="post" action="<?= base_url('achat/cloturer') ?>">
        <?= csrf_field() ?>
        <button type="submit">Clôturer l'achat</button>
    </form>
</div>
<footer>
    © 2026 ITUNIVERSITY — TD SI-IHM
</footer>
</body>
</html>
