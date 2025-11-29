FROM php:8.2-fpm-alpine

WORKDIR /var/www/html

# Installer les dépendances système et les extensions PHP nécessaires (pdo, pdo_mysql, curl, etc.)
RUN apk add --no-cache nginx curl \
    && docker-php-ext-install pdo pdo_mysql opcache

# --- Installation robuste de Composer ---
# Télécharger le script d'installation dans un répertoire temporaire
WORKDIR /tmp
RUN curl -sS getcomposer.org -o composer-installer.php

# Exécuter le script pour installer Composer globalement, puis le rendre exécutable
RUN php composer-installer.php --install-dir=/usr/local/bin --filename=composer \
    && chmod +x /usr/local/bin/composer

# Revenir au répertoire de travail principal
WORKDIR /var/www/html
# --- Fin installation Composer ---

# Copier le code de l'application depuis votre dépôt GitHub
COPY . .

# Installer les dépendances Composer dans le projet
RUN composer install --no-dev --optimize-autoloader

# Configurer Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Exposer le port 80
EXPOSE 80

# Démarrer Nginx et php-fpm
CMD ["nginx", "-g", "daemon off;"]
