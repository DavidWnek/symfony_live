symfony_starter_kit
===================

#Perquisites


##Installation Instructions

```bash
git clone https://github.com/DavidWnek/symfony_starter_kit.git --depth 1 {project_name}
cd {project_name}
composer install
```

###Fillout parameters / use defaults


##Linux File Permissions
```bash
 HTTPDUSER=$(ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1)

 sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:$(whoami):rwX var
 sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:$(whoami):rwX var
```

##OSX File Permissions
```bash
 rm -rf var/cache/*
 rm -rf var/logs/*

 HTTPDUSER=$(ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1)
 sudo chmod +a "$HTTPDUSER allow delete,write,append,file_inherit,directory_inherit" var
 sudo chmod +a "$(whoami) allow delete,write,append,file_inherit,directory_inherit" var
```

###Load Database

```bash
bash reload-db.sh
```

OR

```bash
bin/console doctrine:database:create
bin/console doctrine:schema:create
bin/console doctrine:fixtues:load -n
```