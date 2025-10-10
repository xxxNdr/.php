# Istruzioni Installazione Progetto

```bash
# 1. Clona il progetto
git clone [url-del-repository]
cd nome-progetto

# 2. Installa le dipendenze PHP
composer install

# 3. Configura il database:
#    - Importa estetica.sql nel tuo MySQL
#    - Modifica .env con le tue credenziali database

# 4. Genera la chiave dell'applicazione
php artisan key:generate

# 5. Avvia il server
php artisan serve
