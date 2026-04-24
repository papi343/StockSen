# StockSen

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

**StockSen** est une solution moderne et performante de gestion de stock développée avec le framework **Laravel 13**. Ce projet est conçu pour offrir une expérience utilisateur fluide tout en garantissant une gestion rigoureuse des inventaires et des accès.

## 🚀 Fonctionnalités Principales

- **🔐 Authentification & Sécurité** : Système d'authentification sécurisé intégré.
- **👥 Gestion des Rôles** : Contrôle d'accès basé sur les rôles (RBAC) pour définir précisément qui peut voir ou modifier quoi.
- **📊 Tableau de Bord Dynamique** : Un dashboard intuitif offrant une vue d'ensemble sur l'état global du stock et les alertes critiques.
- **📦 Gestion d'Inventaire** : 
  - Suivi en temps réel des entrées et sorties.
  - Gestion détaillée des produits, catégories et fournisseurs.
  - Alertes automatiques en cas de stock faible.
- **📈 Rapports & Analyses** : Génération de rapports pour faciliter la prise de décision.

## 🛠️ Stack Technique

- **Framework** : [Laravel 13](https://laravel.com)
- **Langage** : PHP 8.3+
- **Frontend** : Vite, Blade & TailwindCSS
- **Base de données** : MySQL
- **Gestionnaire de paquets** : Composer & NPM

## ⚙️ Installation & Configuration

Suivez ces étapes pour installer le projet localement :

1. **Cloner le projet**
   ```bash
   git clone https://github.com/votre-compte/StockSen.git
   cd StockSen
   ```

2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```

3. **Installer les dépendances JavaScript**
   ```bash
   npm install
   ```

4. **Configurer l'environnement**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   > **Note** : Configurez vos identifiants de base de données dans le fichier `.env`.

5. **Exécuter les migrations**
   ```bash
   php artisan migrate --seed
   ```

6. **Lancer l'application**
   ```bash
   # Terminal 1 : Serveur PHP
   php artisan serve

   # Terminal 2 : Compilation Assets
   npm run dev
   ```

## 📄 Licence

Ce projet est sous licence [MIT](LICENSE).

---
*Développé dans le cadre d'un projet de gestion de stock moderne.*
