test-civitatis
=========

**Pasos para instalar y ejecutar esta prueba** 

    git clone https://github.com/gondeni/civitatis-test.git
        
Crear BBDD:

    Importar el archivo test_civitatis.sql de la raiz del proyecto
    Se pueden añadir más actividades y relaciones a las tablas correspondientes,
    siempre respetando el modelo de datos para su correcto funcionamiento.

Modificar config.php
    
    Hay que modificar el archivo application/config/config.php
    La linea:
    >$config['base_url'] = 'http://localhost/civ/civitatis-test/';
    
    Sustituir la url con la ruta correspondiente del directorio donde se
    clone el proyecto.
    
    
**Notas**

He utilizado codeigniter como framework de PHP para la realización de este test 
Requiere PHP 7.1
