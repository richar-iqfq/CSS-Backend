# API Especies

## Acerca de
API interna del proyecto Chemical Science for Students para la consulta de las especies químicas contenidas en la base de datos y sus constantes de disociación ácida así como el filtrado de las especies con base en diversos criterios de búsqueda.

___
## Consulta de las especies químicas
*URL Base:* [/api/especies]()

La petición de tipo get retornará un array con los objetos en formato json referentes a cada especie contenida en la base de datos, las propiedades de cada objeto son:

+ id **(int)** -> Identificador de la especie química.
+ name **(str)** -> Nombre de la especie química.
+ formula **(str)**-> Formula química de la especie, los corchetes son utilizados para los exponentes de las cargas de los átomos y la formula es análoga a la reportada en la primer referencia.
+ calculatedMolarWeight **(bool)** -> true si la masa molar fue calculada utilizando el diccionario de masa atómicas.
+ molarWeight **(str)** -> Valor del peso molecular de la especie química en $g/mol$.
+ density **(str)** -> Valor de la densidad de la especie (si esta existe) en $g/cm^3$.
+ meltingPoint **(str)** -> Punto de fusión de la especie química (si este existe) en °C.
+ boilingPoint **(str)** -> Punto de ebullición de la especie (si este existe) en °C.
+ acidType **(str)** -> Clasificación de la especie química en términos del tipo de ácido, puede ser:
    * Ácido débil
    * Ácido fuerte
    * Base débil
    * Base fuerte
+ chargeType **(str)** -> Clasificación de la especie química en términos de su carga eléctrica, puede ser:
    * Neutro
    * Anión
    * Catión

### Ejemplo
```
# Json response
[
    {
        "id": 86,
        "name": "\u00c1cido tioci\u00e1nico",
        "formula": "HSCN",
        "calculatedMolarWeight": false,
        "molarWeight": "59.090",
        "density": null,
        "meltingPoint": "5.00",
        "boilingPoint": null,
        "acidType": "\u00c1cido d\u00e9bil",
        "chargeType": "Neutro"
    },
    {
        "id": 87,
        "name": "\u00c1cido tiosulf\u00farico",
        "formula": "H2S2O3",
        "calculatedMolarWeight": false,
        "molarWeight": "114.150",
        "density": "1.900",
        "meltingPoint": "48.00",
        "boilingPoint": "100.00",
        "acidType": "\u00c1cido d\u00e9bil",
        "chargeType": "Neutro"
    }
]
```
___
## Consulta de una especie química específica
*URL:* [/api/especies/{id}]()

El parámetro *id* hace referencia al identificador de la especie química que desea ser consultada. El identificador debe ser válido o retornará un array con el error "The selected id is invalid".

Si la peticíon get es correcta, se retornará un objeto de json con las mismas propiedades que las mencionadas en la sección ***Consulta de las especies químicas*** junto con la propiedad *constantes* la cual se trata de un array con las constantes de disociación ácida de la especie. Las propiedades de cada constante son:
+ reportedValue **(str)** -> Indica los valores que fueron reportados por la bibliografía (Ka o pKa), los otros valores son resultado de la solución de la ecuación: $pKa = -Log_{10}(Ka)$.
+ kaValues **(array)** -> Arreglo con las constantes Ka, cada una en formato **str** y **null** si estas no existen.
+ pkaValues **(array)** -> Arreglo con las constantes pKa, cada una en formato **str** y **null** si estas no existen.
+ reference **obj** -> Referencia bibliográfica de las constantes reportadas con las siguientes propiedades:
    * author **(str)** -> Autor.
    * citation **(str)** -> Cita bibliográfica completa.

*Nota: en el caso de las especies **Ácido fuerte** y **Base fuerte**, las constantes de disociación ácida no están reportadas, debido a ser infinitamente grandes o poqueñas respectivamente*.

### Ejemplo
```
# Json Response
{
    "id": 7,
    "name": "\u00c1cido ac\u00e9tico",
    "formula": "CH3COOH",
    "calculatedMolarWeight": false,
    "molarWeight": "60.050",
    "density": "1.045",
    "meltingPoint": "16.64",
    "boilingPoint": "117.90",
    "acidType": "\u00c1cido d\u00e9bil",
    "chargeType": "Neutro",
    "constants": [
        {
            "reportedValue": "ka",
            "kaValues": [
                "1.8E-5",
                null,
                null,
                null,
                null
            ],
            "pkaValues": [
                "4.74",
                null,
                null,
                null,
                null
            ],
            "reference": {
                "author": "Chang, R.",
                "citation": "Chang, R., & Goldsby, K. A. (2013). Qu\u00edmica."
            }
        },
        {
            "reportedValue": "ka",
            "kaValues": [
                "1.75E-5",
                null,
                null,
                null,
                null
            ],
            "pkaValues": [
                "4.76",
                null,
                null,
                null,
                null
            ],
            "reference": {
                "author": "Skoog, D.",
                "citation": "Skoog, D., West, D., Holler, F., & Crouch, S. (2013). Fundamentals of Analytical Chemistry. Cengage Learning."
            }
        },
        {
            "reportedValue": "pka",
            "kaValues": [
                "1.74E-5",
                null,
                null,
                null,
                null
            ],
            "pkaValues": [
                "4.76",
                null,
                null,
                null,
                null
            ],
            "reference": {
                "author": "Montuenga, C.",
                "citation": "Montuenga, C. (1979). Formaci\u00f3n de Complejos en Qu\u00edmica Anal\u00edtica. Alhambra, S. A."
            }
        }
    ]
}
```
___
## Filtrado de las especies

*URL:* [/api/especies/filter]()

### Parámetros

Esta ruta permite unicamente 4 criterios de filtrado con sus respectivos valores permitidos:
+ author -> Especies existentes para el author seleccionado
    * 1 => Chang, R.
    * 2 => Skoog, D.
    * 3 => Speight, J.
    * 4 => Montuenga, C.

    Ejemplo:

    Para seleccionar únicamente las constantes que cuentan con referencia a **Skoog, D.** se realizaría una petición como:

    [/api/especies/filter?author=2]()

    _Nota: Los valores antes mencionados están sujetos a cambios según el crecimiento de la base de datos y la cantidad de autores capturados._

+ acidType -> Clasificación ácida de las especies
    * 1 => Ácido débil
    * 2 => Ácido fuerte
    * 3 => Base débil
    * 4 => Base fuerte

    Ejemplo:

    Para seleccionar únicamente las especies pertenecientes a la clasificación ácida **base fuerte** se realizaría una petición como:

    [/api/especies/filter?acidType=4]()

+ chargeType -> Clasificación de las especies de acuerdo con su carga
    * 1 => Neutro
    * 2 => Anión
    * 3 => Catión

    Ejemplo:

    Para seleccionar únicamente las especies pertenecientes a la clasificación **catión** se realizaría una petición como:

    [/api/especies/filter?chargeType=3]()

+ Substring -> Especies que contengan en su nombre el fragmento de la cadena de texto especificada.

    Ejemplo:

    Para buscar las especies que contengan en el nombre la sub-cadena de texto *nitri* se realizaría una petición como:

    [/api/especies/filter?substring=nitri]()

    _Nota: la longitud máxima permitida para este parámetro es de 15 carácteres_

### Consideraciones

Las peticiones no requieren la presencia de los 4 parámetros a la vez, sólo se requiere al menos 1 único parámetro. 

Puede ser la combinación de varios de ellos como:

+ [/api/especies/filter?author=2&acidType=2]()

O todos a la vez como:

+ [/api/especies/filter?author=2&acidType=2&chargeType=1&substring=acid]()

Sin embargo es importante notar que no está permitido el envío del mismo parámetro más de una vez como en el siguiente ejemplo:

+ [/api/especies/filter?author=2&acidType=2&acidType=1]()

_Nota: Aún se está revisando este apartado por lo que se recomienda estar pendiente de las modificaciones._

## Errores

working on...