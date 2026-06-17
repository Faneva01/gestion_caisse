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

    <div class="form">

        <div class="group">
            <label>Produit</label>

            <select>
                <option>Biscuit — 1000 F</option>
                <option>Riz — 2500 F</option>
                <option>Lait — 3500 F</option>
            </select>
        </div>

        <div style="width:250px;">
            <label>Quantité</label>
            <input type="number" value="1">
        </div>

        <button class="btn">
            Valider
        </button>

    </div>

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
                <tr>
                    <td colspan="4">
                        Aucun achat saisi pour ce client.
                    </td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <th colspan="3" style="text-align:right;">
                        Total
                    </th>

                    <th class="total">
                        0 F
                    </th>
                </tr>
            </tfoot>

        </table>

    </div>

    <div class="cloture">
        <button>Clôturer l'achat</button>
    </div>

</div>

<footer>
    © 2026 ITUNIVERSITY — TD SI-IHM
</footer>

</body>
</html>
