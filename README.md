# whoischeck
Script para comprobar que la informacion whois de un dominio ha cambiado.

## Instalacion y configuracion
Definimos la contraseña del cron:
```
$config['default']['cron_password'] = 'password123'; 
```
Definimos la direccion de email donde se va a enviar el aviso:
```
$config['default']['emails'][] = 'johndoe@example.com';
```
Si quieremos añadir mas direcciones basta con duplicar la linea:
```
$config['default']['emails'][] = 'email1@example.com';
$config['default']['emails'][] = 'email2@example.com';
$config['default']['emails'][] = 'email3@example.com';
$config['default']['emails'][] = 'email4@example.com';
```
Definimos los dominios que se van a comprobar:
```
$config['default']['domains'][] = 'dominio1.com';
$config['default']['domains'][] = 'dominio2.es';
$config['default']['domains'][] = 'dominio3.co';
```

Otras opciones de configuracion:

Activar o desactivar el log
```
$config['default']['log'] = true; 
```

Activar o desactivar el envio de emails:

```
$config['default']['mail'] = true; 
```

Si necesitamos mas configuraciones:
```
$config['config1']['cron_password'] = 'password123'; 
$config['config1']['emails'][] = 'johndoe@example.com';
$config['config1']['domains'][] = 'domain.com';
$config['config1']['log'] = true; 
$config['config1']['mail'] = true; 
```

Modificamos la constante para que se cargue una configuracion determinada:
```
define('CONFIG_NAME', 'config1');
```

## Llamada cron
```
http://www.example.com/dir/whois.cron.php?password=password
```