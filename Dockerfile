# Usa a imagem oficial do PHP 8.2 com FPM
FROM php:8.2-fpm

# Define o diretório de trabalho
WORKDIR /var/www

# Instala dependências do sistema necessárias para extensões comuns do PHP
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev

# Instala as extensões do PHP necessárias para o Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia os arquivos da aplicação
COPY . .

# Instala as dependências do Laravel
RUN composer install

# Muda a propriedade dos arquivos para o usuário do Nginx/PHP-FPM
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expõe a porta 9000 para o PHP-FPM
EXPOSE 9000

# Inicia o serviço PHP-FPM
CMD ["php-fpm"]