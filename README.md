# API de gesti贸n de archivos desarrollado con **Laravel 9**


### Instalaci贸n 馃敡


_Despues de haber clonado el repositorio, creado la BD y configurado el .env, se debe hacer la migraci贸n con el siguiente comando:_

```
php artisan migrate
```

_En el archivo .env poner el nombre y puerto del directorio raiz que est谩 corriendo en su maquina. **Es importante** porque uso esa variable de entorno (APP_URL) dentro del proyecto_

```
ejemplo:  APP_URL = http://localhost:8000
```



## Usando los endpoints 鈿欙笍

_lo primero que tiene que hacer es registrarse para obtener un token de seguridad. El endpoint es el siguiente: **http://localhost:8000/api/register**, es importante que use los nombres que pondre acontinuaci贸n si desea el valor si puede cambiarlo._

```
{
    "name" : "juan",
    "email" : "juan@gmail.com",
    "password" :"12345678"
}
```
_Luego tiene que logearse para recibir su token de seguridad. El endpoint es: **http://localhost:8000/api/login** y los datos para logear son los siguientes:_

```
{    
    "email" : "juan@gmail.com",
    "password" :"12345678"
}
```
### Ahora que ya tiene su token lo puede usar para ver y subir archivos.

_El name del input type:file es **"file"**, eso lo tiene que especificar el form-data si usa postman. El endpoint para subir un archivo es:_
```
http://localhost:8000/api/file
```
_El endpoint para eliminar un archivo de forma l贸gica es: **http://localhost:8000/api/file/{id}**_
```
ejemplo: http://localhost:8000/api/file/12
```
_El endpoint para eliminar un archivo de forma F铆sica es: **http://localhost:8000/api/files-delete/{id}**_
```
ejemplo: http://localhost:8000/api/files-delete/12
```


---
echo con 鉂わ笍 por **Jiancarlos Marcos** 馃槉
