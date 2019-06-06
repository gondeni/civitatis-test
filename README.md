test-civitatis
=========

**Pasos para instalar y ejecutar esta prueba** 

    git clone https://github.com/gondeni/civitatis-test.git
        

Crear BBDD:

    Importando el archivo test_civitatis.sql de la raiz del proyecto

Modificar config.php
    
    Hay que modificar el archivo application/config/config.php
    La linea:
    >$config['base_url'] = 'http://localhost/civ/civitatis-test/';
    
    Sustituir la url con la ruta correspondiente del directorio donde se
    clone el proyecto.
    
    
    
**Notas**

Requiere PHP 7.1
