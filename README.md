

## Installation

1. Cloner le projet
2. Exécuter les migrations via XAMPP : `/opt/lampp/bin/php spark migrate`
3. Exécuter le seeder : `/opt/lampp/bin/php spark db:seed MainSeeder`
4. Lancer le serveur : `./start.sh` (ou `/opt/lampp/bin/php spark serve`)

> **Note importante** : L'extension SQLite3 est disponible dans le PHP de XAMPP mais peut manquer dans le PHP par défaut de votre système. Utilisez toujours le chemin complet `/opt/lampp/bin/php`.

