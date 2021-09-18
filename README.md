# NUPTIC-43

## OBJETIVOS DEL PROYECTO
**SIMULADOR NUPTIC43**
- Se encarga de construir las peticiones GET
- Hace el envío de los campos obligatorios como parámetros Json
- Espera respuesta del servidor, si la petición falla, reintenta la petición
- Crear command: realiza 60 peticiones al servidor de ORVAL, 1 por segundo

**SERVIDOR ORVAL**
- Recibe peticiones del simulador y devuelve el identificador del registro que se creará en el historial
- Devuelve el 10% de las peticiones como error
- En la peticion 60 indica al simulación que ha terminado la simulación y devuelve los resultados

**INTERFAZ NUPTIC SIMULATOR**
- Botón para ejecutar la simulación via Ajax
- Mostrar la suma del recorrido y el punto cardinal más frecuente
- Mostrar una gráfica con valores de la simulación

## EJECUCIÓN DEL PROYECTO
- Start the project `make up`
- Set up the project with `make setup` [WARNING] - This environtment is for development purposes. This command, makes unsafe environtment for security
