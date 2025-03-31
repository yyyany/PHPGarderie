
# PHP Garderie

## Installation et Configuration

### Prérequis
- PHP 8.1 ou supérieur
- Composer
- Node.js et npm
- Base de données MySQL

### Étapes d'installation


2. **Installer les dépendances PHP**
```bash
composer install
```

3. **Installer les dépendances JavaScript**
```bash
npm install
```

5. **Configurer la base de données**
- Modifier le fichier `.env` avec vos informations de connexion à la base de données
- Exécuter les migrations
```bash
php artisan migrate
```

6. **Compiler les assets**
```bash
npm run build
```

7. **Lancer le serveur de développement**
```bash
php artisan serve
```

8. **Accéder à l'application**
- Ouvrir votre navigateur et accéder à `http://localhost:8000`

### En cas de problèmes

Si vous rencontrez l'erreur "Vite manifest not found", exécutez :
```bash
npm run build
```

Si vous rencontrez des problèmes avec les dépendances, essayez :
```bash
composer clear-cache
rm -rf vendor/
composer install
```
