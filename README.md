# Projet-WiredBeauty

## Description

Wired Beauty invents and develops innovative connected solutions for a new beauty.

Our Mission:
Help Consumers and Brands to understand Skin and Hair in real Time to Adapt the ideal Beauty Routine in B2C and drive innovation in B2B

## Technologies in use
- [Laravel 8.0](https://laravel.com/)
- [Php-8.0](https://www.php.net/manual-lookup.php?pattern=php+unit&scope=quickref)
- [Wordpress](https://wordpress.com/fr/l)
- [Bootstrap](https://getbootstrap.com/docs/5.1/getting-started/introduction/)
- [Docker](https://docs.docker.com/)
- [Git](https://git-scm.com/doc)

## Requirement for starting

### Required

- [Docker](https://docs.docker.com/engine/install/)
- [Docker-Compose](https://docs.docker.com/compose/install/)
- Git (With configured [SSH](https://docs.github.com/en/authentication/connecting-to-github-with-ssh) and [GPG](https://docs.github.com/en/authentication/managing-commit-signature-verification/generating-a-new-gpg-key) Keys for signed commits)
- Knowledge of [Git Flow](https://www.atlassian.com/fr/git/tutorials/comparing-workflows/gitflow-workflow#:~:text=git%2Dflow%20est%20un%20outil,ex%C3%A9cuter%20brew%20install%20git%2Dflow%20.)

## Getting started

#### Start Application
1. Go into the folder : back
2. Use this command : ```composer install```
3. Make an alias with sail : ```alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'```

#### Configuration
```text
# URL
http://127.0.0.1:8000
# Env DB
http://127.0.0.1:8080
```

## Useful commands
```
# Start project 
sail up
# Start project in daemon
sail up -d
# Stop project
sail stop
# Exect artisan command
sail artisan …
# Exect php command
sail php …
# Exect composer command
sail composer …
```

## Database management

#### Make migration
```
sail migrate
```

https://laravel.com/docs/9.x/migrations

#### Make seed
```
sail artisan db:seed
```

https://laravel.com/docs/9.x/seeding#main-content

## Auth

https://laravel.com/docs/9.x/starter-kits#laravel-breeze

## Contact

- Calvin INTHASAKUBOL (Chef de projet, Developpeur ESGI)
- Alexandre TROUVE (Developpeur ESGI)
- Malik BELMEZOUAR (DesigneuR ICAN)
- Suvirtha THAYAHARAN (Marketeuse ECITV)
