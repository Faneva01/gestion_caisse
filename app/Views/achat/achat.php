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

    <div>
        <h3>Caisse</h3>
        <p>Supermarché — Promo 18</p>
    </div>
</header>

<div class="container">

    <h1>Saisie des achats</h1>

    <p class="subtitle">
        Ajoutez les produits passés en caisse pour le client en cours.
    </p>

    <!-- FORMULAIRE -->
    <form method="POST" action="<?= base_url('/achat/ajouter') ?>" class="form">

        <div class="group">
            <label>Produit</label>

            <select name="id_produit" required>
                <?php foreach ($produits as $p): ?>
                    <option value="<?= $p->id ?>">
                        <?= $p->designation ?> — <?= $p->prix_unitaire ?> F
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="width:250px;">
            <label>Quantité</label>
            <input type="number" name="quantite" value="1" min="1">
        </div>

        <button class="btn" type="submit">
            Valider
        </button>

    </form>

    <!-- TABLE -->
    <div class="table">

        <table>

            <thead>
                <tr>
                    <th>PRODUIT</th>
                    <th>PRIX UNIT</th>
                    <th>QTÉ</th>
                    <th>MONTANT</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody>

                <?php if (empty($panier)): ?>
                    <tr>
                        <td colspan="5">Aucun achat saisi pour ce client.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($panier as $i => $item): ?>
                        <tr>
                            <td><?= $item['designation'] ?></td>
                            <td><?= $item['prix'] ?></td>
                            <td><?= $item['quantite'] ?></td>
                            <td><?= $item['montant'] ?></td>
                            <td>
                                <a href="<?= base_url('/achat/supprimer/'.$i) ?>">X</a>
                            </td>
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
                        <?= $total ?> F
                    </th>
                </tr>
            </tfoot>

        </table>

    </div>

    <div class="cloture">
        <a href="<?= base_url('/achat/cloturer') ?>">
            <button>Clôturer l'achat</button>
        </a>
    </div>

</div>

<footer>
    © 2026 ITUNIVERSITY — TD SI-IHM
</footer>

</body>
</html>