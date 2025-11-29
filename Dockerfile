FROM php:8.2-fpm-alpine

WORKDIR /var/www/html

# Installer les dépendances système et les extensions PHP nécessaires (pdo, pdo_mysql, etc.)
RUN apk add --no-cache nginx curl \
    && docker-php-ext-install pdo pdo_mysql opcache

# Installer Composer globalement et s'assurer qu'il est exécutable
RUN curl -sS getcomposer.org | php -- --install-dir=/usr/local/bin --filename=composer \
    && chmod +x /usr/local/bin/composer

# Copier le code de l'application
COPY . .

# Installer les dépendances Composer dans le projet
RUN composer install --no-dev --optimize-autoloader

# Générer la clé d'application (déjà définie via variables d'env sur Render, mais bonne pratique)
# RUN php artisan key:generate

# Configurer Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Exposer le port 80
EXPOSE 80

# Démarrer Nginx et php-fpm
CMD ["nginx", "-g", "daemon off;"]
