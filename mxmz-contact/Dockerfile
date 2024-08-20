FROM php:8.2-fpm

# Instale dependências e extensões PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Criar e definir o usuário sail
RUN useradd -ms /bin/bash sail
USER sail

# Copie o restante do código do projeto
COPY . /var/www/html

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Exponha a porta do PHP-FPM
EXPOSE 9000

# Comando para iniciar o PHP-FPM
CMD ["php-fpm"]
