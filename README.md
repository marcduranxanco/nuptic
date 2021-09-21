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

## ENDPOINTS
/simulador: ejecuta el comando
| Endpoint | Descripción | Parámetros | Respuesta |
| ------------- | ------------- | ------------- | ------------- |
| /simulador | Ejecuta el comando para realizar la simulación de 60 peticiones al servidor | - | {"execution": "success"} |
| /servidor | Recibe las peticiones ejecutadas por el simulador | p: Json con los parámetros obligatorios por url codificada (ej: p=%7B"direction"%3A"Sur"%2C"route"%3A"10"%2C"simulatorName"%3A"nuptic-43"%2C"idRequest"%3A"1"%7D) | {"id": "61477ac7a7998", "status": "success"}
| /servidor/get | Obtiene todas las peticiones registradas |  | [{"id":1,"created_at":null,"updated_at":null,"internalId":"1234","requestName":"1234","requestNumber":1234,"direction":"1234","route":1234},{"id":2,"created_at":null,"updated_at":null,"internalId":"1111","requestName":"1111","requestNumber":1111,"direction":"1111","route":1111}] 
