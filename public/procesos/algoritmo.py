# -*- coding: utf-8 -*-
"""
Created on Wed Mar  9 12:10:45 2022

@author: erubilar
"""

#VARIABLES
## Conceptos

var_Abastecimiento = ["abastecimiento", "abastecer"]
var_Aborto = ["aborto", "abortos"]
var_Academia = ["academia", "academico", "academica", "academicos", "academicas"]
var_Acceso = ["acceso", "accesos", "disponibilidad", "disponible", "asequible", "accesibilidad", "accesible", "disponibles"]
var_Acidez = ["acidez", "acidificacion", "ph "]
var_Acoso = ["acoso", "acosar"]
var_Actividad = ["actividad", "actividades"]
var_Actualizacion = ["actualizacion", "actualizaciones", "actualizada"]
var_Acuiferos = ["acuifero", "acuiferos", " rios", "lagos", " rio ", "lago", "laguna", "lagunas", "humedal", "humedales", "riachuelo", "riachuelos", "hidrograficas"]
var_Adaptacion = ["adaptar", "adaptacion", "adaptarse"]
var_Adquisicion = ["adquisicion", "adquisiciones", "adquirir", "compra", "compras", "comprar"]
var_Adulto = ["adulto", "adultos"]
var_Afp = ["afp", "asociacion fondos de pensiones", "asociacion de fondos de pensiones"]
var_Agricultura = ["agricultura", "agricola", "agricolas", "agriculturas", "agropecuaria", "agropecuarias", "agropecuario", "agropecuarios", "ganadera", "ganadero"]
var_Agroindustria = ["agroindustria", "agroindustrias"]
var_Agua = ["agua", "aguas" "hídricos", "hídrico", "hídrica", "hídricas"]
var_AguasNegras = ["aguas negras", "aguas servidas"]
var_Aire = ["aire"]
var_Alcantarillado = ["alcantarillado", "alcantarilla", "fosa septica"]
var_Alcohol = ["alcohol", "ebrio", "ebriedad"]
var_Alcolemia = ["alcolemia", "alcotest"]
var_Alerta = ["alerta", "alertas", "alarma", "alarmas"]
var_Alianza = ["alianza", "alianzas"]
var_Alimentos = ["alimentos", "alimento", "alimentación", "alimentario", "alimentaria", "alimenticios", "alimenticio", "comida", "comidas", "colaciones", "colacion", "colación"]
var_Aloctona = ["aloctona", "aloctono"]
var_AlzaUnilateral = ["alza unilateral", "alzas unilaterales", "fijacion unilateral", "fijaciones unilaterales"]
var_Ambiente = ["ambiente", "medioambiente", "ambiental", "medio ambiente", "medioambientales", "ambientales", "ecologico", "ecologia", "ecologias", "ecologicas", "ecologicamente", "ecologica"]
var_Amenaza =	["amenaza", "amenazada", "amenazado", "amenazadas", "amenazados"]
var_Ampolleta = ["ampolleta", "ampolletas"]
var_Analisis = ["analisis", "analizar"]
var_Anciano = ["anciano", "adulto mayor", "adultos mayores", "abuelos", "abuelo", "abuelitos", "envejecimiento"]
var_Animales = ["animal", "animales", "especie", "especies", "fauna", "faunas"]
var_ApoyaBrazos = ["apoya brazo", "apoya brazos"]
var_APR = [" apr ", "agua potable rural"]
var_Aprovechar = ["aprovechar", "aprovechamiento", "aprovechamientos"]
var_Apto = [" apto ", " apta ", " aptos ", " aptas "]
var_AreasVerdes = ["áreas verdes", "areas verdes", "área verde", "area verde"]
var_Argumento = ["argumento", "argumentos", "argumentar"]
var_Armas = ["armas", "arma", "municiones", "municion", "explosivos", "explosivo", " bomba ", "bombas"]
var_Arte = ["arte", "artistico", "artisticos"]
var_Artesanal = ["artesanal", "artesanales", "artesanos"]
var_Articulo = ["articulo", "articulos"]
var_Asesoria = ["asesoria", "asesor", "asesorias", "asesores"]
var_Asistencia = ["asistencia", "soporte"]
var_Asociatividad = ["asociatividad", "cooperativa", "cooperacion", "colaboracion", "colaborativa", "asociacion"]
var_Atencion = ["atencion", "atenciones", "atender"]
var_Atmosfera	= ["atmosfera",	"atmosferas", "atmosferica", "atmosferico", "atmosfericas", "atmosfericos"]
var_Audiencia = ["audiencia", "audiencias"]
var_Auto = ["auto", "automovil", "automovilistico", "automovilista"]
var_Autocuidado = ["autocuidado", "autocuidar"]
var_Automatizar = ["automatizar", "automatizacion"]
var_Autoridad = ["autoridad", "autoridades"]
var_Ayudar = ["ayudar", "ayuda", "apoyo", "apoyar"]
var_Bajo = ["bajo", "bajos", "escasos", "escaso", "insuficientes", "escasez", "carencia", " baja "]
var_Balanceado = ["balanceado", "balanceada"]
var_Banco = ["banco", "bancos"]
var_Barco = ["barco", "embarcacion", "bote", "barcos", "embarcaciones", "botes"]
var_Basica = ["basica", "basicas", "basico", "basicos"]
var_Basura = ["basura","basuras", "residuo", "residuos", "basureros", "basurero", "vertedero", "vertederos", "microbasurales"]
var_Bebe = ["bebe", "bebes", "lactante", "lactantes", "recien nacido","recien nacidos"]
var_Beca = ["beca", "becas"]
var_Beneficio = ["beneficio", "beneficios"]
var_Biblioteca = ["biblioteca", "bibliotecas"]
var_Bienes = ["bienes"]
var_Bienestar = ["bienestar"]
var_Biodiversidad = ["biodiversidad"]
var_Bolsa = ["bolsa", "bolsas"]
var_Bono = ["bono", "bonos"]
var_Brecha = ["brecha","brechas"]
var_Bueno = ["bueno", "buena", "buenas", "buenos"]
var_Bulling = ["bulling"]
var_Cambio = ["cambio", "cambiar", "cambiarse"]
var_Campamento = ["campamento", "campamentos"]
var_Campesino = ["campesino", "campesinos", "campesina", "agricultores", "agricultor"]
var_Canalista = ["canalista", "canalistas"]
var_Capacidad = ["capacidad", "capacidades"]
var_Capacitar = ["capacitar", "capacitacion", "capacitaciones"]
var_Carbono = ["carbono"]
var_Cardio = ["cardio", "cardiovascular", "cardiogenico", "corazon"]
var_Cautiverio = ["cautiverio", "cautiverios", "tenencia", "tenencias"]
var_Caza = ["caza", "cazador", "cazadores"]
var_Certificado = ["certificado", "certificacion", "certificaciones"]
var_Charla = ["charla", "charlas"]
var_Chile = ["chile", "chileno", "chilena", "chilenos", "chilenas"]
var_Ciclo = ["ciclo", "ciclos"]
var_Ciencia = ["ciencia", "ciencias", "cientificos", "cientifico", "cientificas", "cientifica"]
var_CienciasNaturales = ["fisica", "quimica", "biologia", "geologia", "oceanografica"]
var_Circulacion = ["circulacion", "circular", "circulando"]
var_Ciudadano = ["ciudadano", "ciudadanos", "ciudadana", "ciudadanas"]
var_Ciudades =	["ciudades", "ciudad", "comunas", "comuna", "comunal", "comunales"]
var_Ciudar = ["cuidar", "cuidado", "cuidada", "buen trato"]
var_Civil = ["civil", "civiles"]
var_Clima = ["clima", "climatico", "climas", "climaticos"]
var_Clinica = ["clinica", "clinicas", "clinico", "clinicos"]
var_Cobertura = ["cobertura", "coberturas"]
var_CodigoSanitario = ["codigo sanitario"]
var_Colision = ["colision", "colisiones", "atropello", "atropellar", "choque", "chocar"]
var_Comercio = ["comercio", "comercios", "comerciales", "comercializacion"]
var_Comite = ["comite"]
var_Compartir = ["compartir", "compartido", "compartida", "compartidos", "compartidas"]
var_Competencia = ["competencia", "competencias", "competir", "competicion", "competiciones"]
var_Complementar = ["complementar", "complemento", "complementar"]
var_Compromiso = ["compromiso"]
var_Comunidad = ["comunidad", "comunidades", "comunitario", "comunitaria", "comunitarios", "comunitarios"]
var_Concejo = ["concejo", "concejos"]
var_Conciencia = ["conciencia"]
var_Condicion = ["condicion", "condiciones"]
var_CondicionDeVida = ["condicion de vida", "condiciones de vida"]
var_Conductor = ["conductor", "conductores", "conducir"]
var_Confiable = ["confiable", "fiable", "calidad", "confiables", "fiables", "calidades", "confianza", "confiables"]
var_Conicyt = ["conicyt"]
var_Consecuencia = ["consecuencia", "consecuencias"]
var_Conservacion = ["conservacion", "conservar", "preservacion", "preservar"]
var_Constitucion = ["constitucion", "constituciones", "constitucionales", "constitucional"]
var_Construccion = ["construccion", "construcciones", "construir"]
var_Consultoria = ["consultoria"]
var_Consumo = ["consumo", "consumen"]
var_Contaminacion = ["contaminacion", "contaminar", "contaminantes", "contaminante", "contaminado", "smog", "polucion", "eutrofizacion"]
var_ContigoAprendo = ["contigo aprendo"]
var_Continuar = ["continuar", "continuo"]
var_Contratacion = ["contratacion", "contratar", "contrataciones"]
var_Contribucion = ["contribucion", "contribuir", "apoyar", "apoyo"]
var_Control = ["control", "controles"]
var_Convenio = ["convenio"]
var_Convivencia = ["convivencia", "convivir"]
var_Cooperativa = ["cooperativa"]
var_Coordinacion = ["coordinacion", "coordinador", "coordinar", "coordinadores", "coordinado"]
var_Corporacion = ["corporacion", "corporativo", "corporativa", "corporativos", "corporativas"]
var_Corredor = ["corredor", "corredores"]
var_Corriente = ["corriente", "corrientes"]
var_Corrupcion = ["corrupcion", "soborno", "cohecho", "probidad", "mop-gate", "milicogate", "conflictos de interéses", "coimas", "desfalco", "pacogate", "caso, cascada", "caso penta", "conflicto de interés"]
var_Costa = ["costa", "costero", "costera", "playa", "playero", "playera", "playas"]
var_Costo = ["costo", "coste", "costos", "costes"]
var_CreceChile = ["crece chile"]
var_Crecimiento = ["crecimiento"]
var_Crianza = ["crianza", "crianzas"]
var_Criticar = ["critica", "critico", "criticar", "criticando"]
var_CuentaPublica = ["cuenta publica"]
var_Cultivo = ["cultivo", "cultivar", "cultivos", "cultivando", "cultivados"]
var_Cultura = ["cultura", "culturas", "culto", "culta", "cultural"]
var_CulturaLocal = ["cultura local"]
var_Cuna = [" cuna ", " cunas "]
var_Curso = [" curso ", " cursos "]
var_Dano = ["dano", "danos", "danino", "danina", "daninas", "daninos", "nocivo", "nocivos", "nociva", "nocivas"]
var_Dato = ["dato", "datos"]
var_Deber = ["deber", "deberes"]
var_Decidir = ["decidir", "decision", "decisiones"]
var_Defensa = ["defensoria", "defensa"]
var_Defecar = ["defecar", "defecacion"]
var_Deficit = ["déficit"]
var_Deforestar = ["deforestar", "deforestacion", "deforestaciones"]
var_Degradar = ["degradar", "degradacion", "degradaciones", "erosion", "erosionar", "degradadas", "degradada"]
var_Delincuencia = ["delincuencia", "delincuencia", "trafico", "ilicito", "ilicitos", "traficos", "ilegal", "contrabando", "delincuentes", "ladrones", "ladron", "crimen", "crimenes", "criminales", "delitos", "delito", "fechoria", "fechorias", "mafia", "mafias", "ilegales", "furtivo", "furtiva", "clandestino"]
var_Democracia = ["democracia", "democrata", "democracias", "democratica", "democratico", "democraticas", "democraticos", "democrativa", "democrativo", "democrativos", "democrativas"]
var_Dental = ["dental", "dentales", "odontologico", "odontologicos", "bucal", "bucodental", "bucodentales", "odontologica", "odontologicas", "periodontales", " oral ", " orales "]
var_Derecho = ["derecho", "derechos"]
var_DerechosDelMar = ["derechos del mar"]
var_Desafio = ["desafio", "desafios"]
var_Desalinizacion = ["desalinizacion", "desalinizaciones"]
var_Desarollar = ["desarrollo", "desarrollar", "desarrollando", "desarrollan"]
var_Desastre = ["desastre", "desastre"]
var_DesastreNatural = ["terremoto", "maremoto", "tsunami", "inundacion", "incendio", "desastre natural", "desastres naturales", "desastre climatico", "desastres climaticos", "sismo", "sismos", "climatico"]
var_DesastreSanitario = ["pandemia", "corona virus", "coronavirus"]
var_Desecho = ["desecho", "desechos", "desechado", "desperdicio", "desperdicios", "desperdiciados", "merma", "mermas"]
var_DesechoQuimico = ["desecho quimico", "desechos quimicos", "desechos toxicos", "desecho toxico"]
var_Desempleo = ["desempleo", "desempleado", "desempleados", "sin empleo", "desempleada"]
var_Desercion = ["desercion", "deserciones"]
var_Desertificacion = ["desertificacion"]
var_Desigualdad = ["desigualdad", "inequidad", "inequidades", "desigualdades", "disparidad", "dispar"]
var_Destruccion = ["destruccion", "destrucciones", "destructiva", "destructivas", "destructivo", "destructivos"]
var_Deuda = ["deuda", "deudas", "deudores", "deudoras", "deudor"]
var_Diagnostico = ["diagnostico", "diagnosticos", "diagnosticar"]
var_Diario = ["diario", "cada dia"]
var_Diferente = ["diferente", "diferencia", "diferenciado", "diferenciacion"]
var_Dinero = ["dinero", "remesa", "dineros", "remesas"]
var_DioxidoDeCarbono = ["dioxido de carbono", "co2"]
var_Director = ["director", "directores", "directora", "directoras"]
var_Discapacidad = ["discapacidad", "discapacitado", "discapacitado"]
var_Discriminacion = ["discriminacion", "discriminatorias", "discriminada", "discriminado", "zamudio", "antidiscriminacion"]
var_Distorsion = ["distorsion", "distorsiones"]
var_Distribucion = ["distribucion", "distribuir"]
var_Diversidad = ["diversidad", "diverso", "variedad", "variado"]
var_Domestico = ["domestico", "domesticar", "domestica", "domesticos", "domesticas"]
var_Domicilio = ["domicilio", "domicilios", "domiciliario", "domiciliarios"]
var_Donacion = ["donacion", "donaciones", "aporte economico", "ayudar economicamente", "colecta"]
var_Droga = ["droga", "drogas", "marihuana", "cocaina", "pasta base", "lcd", "metanfetamina", "extasis", "narcotrafico"]
var_DuenaDeCasa = ["duena de casa", "duenas de casa"]
var_Economia = ["economia", "economico", "economica", "economicas", "macroeconomica", "economía", "económico", "económica"]
var_EconomiaCircular = ["economia circular"]
var_Ecosistema = ["ecosistemas", "ecosistema"]
var_Ecoturismo = ["ecoturismo", "turismo ecologico"]
var_Educacion = ["educación", "educativa", "educativo", "ensenanza", "ensenar", "aprender", "aprendiendo", "aprendizaje", "estudiar", "estudios", "educativas", "educar", "ensenarles"]
var_Efecto = ["efecto", "efectos"]
var_EfectoInvernadero = ["efecto invernadero"]
var_EficienciaEnergetica = ["eficiencia energetica", "tragaluces", "iluminacion led", "iluminadores led", "luces fluorescente", "aislante termico"]
var_Eficiente = ["eficiente", "eficiencia", "eficacia", "eficaz", "efectivo", "efectiva"]
var_Electricidad = ["electricidad", "luz", "energia electrica", "energia", "energeticas", "electrica", "electricas", "energetica", "energeticos", "energias", "luces", "luminosidad", "luminico", "luminica"]
var_Embarazo = ["embarazo", "embarazos", "embarazada", "embarazadas"]
var_Emergencia = ["emergencia", "accidente", "accidentes"]
var_Empoderar = ["empoderar", "empoderamiento"]
var_Emprendimiento = ["emprendimiento", "emprendedores", "pequenas empresas", "pequena empresa", "mediana empresa", "pyme", "PYME", "mipyme", "MIPYME", "pequenos empresarios", "pequeno empresario", "emprendedor", "emprender", "asech", "artesanos", "artesanales"]
var_Emprendedora = ["emprendedora", "emprendedoras"]
var_Empresa = ["empresa", "empresas", "empresarios", "empresario", "empresarial", "empresariales"]
var_EmpresaB = ["empresa b", "empresas b"]
var_Encadenamiento = ["encadenamiento", "encadenamientos", "cadena", "cadenas"]
var_Enchufe = ["enchufe", "enchufes", "enchufado", "enchufados"]
var_Encomienda = ["encomienda", "encomiendas"]
var_EncuentroIntercultural = ["encuentro intercultural"]
var_EnergiaRenovable = ["renovable", "renovables", "energia limpia", "energias limpias", "paneles solares", "eolicas", "eolica", "geomotriz", "mareomotriz", "biomasa", "termica", "energia hidraulica", "energia solar", "tecnologias limpias", "tecnologia limpia", "menos contaminantes", "electro movilidad", "automovil electrico", "automoviles electricos"]
var_Enfermedad = ["enfermedad", "enfermedades", "problemas respiratorios", "infeccion", "infecciones"]
var_EnfermedadesNoTransmisibles = ["enfermedad no transmisible", "patologias", "depresion", "stress", "heridas", "traumatismos",  "mordeduras", "quemaduras", "diabeticos", "diabetes", "hipertension", "hipertensos", "cancer", "trastornos mentales", "demencias", "epilepsia", "artritis", "gingivitis", "enfermedades cronicas", "ulcera", "trastornos emocionales", "espina bifida", "tumores", "asperger", "autista", "caries"]
var_EnfermedadesTransmisibles = ["tuberculosis", "malaria", " vih ", "zika", "fiebre amarilla", "dengue", " sida", " ets ", "vih/sida", " its ", "iaas", "picaduras", " reas ", "enfermedad viral", "rabia", "influenza", "corona virus", "covid", "covid-19", "enfermedades transmisibles", "infectocontagiosas"]
var_Enfoque = ["enfoque", "enfoques"]
var_Entrega = ["entrega", "entregar", "entregas"]
var_Entrenar = ["entrenar", "entrenamiento"]
var_Enviar = ["enviar", "envio", "enviado"]
var_Equipo = ["equipo", "equipos"]
var_Erradicar = ["erradicar", "prohibicion", "prohibir"]
var_Esclavo = ["esclavos", "esclavo"]
var_Escuela = ["escuela", "escuelas", "colegio", "colegios"]
var_Espacio = ["espacio", "espacios"]
var_Especial = ["especial", "especiales"]
var_Esqueleto = ["esqueleto", "esqueletos", "hueso", "huesos", "esqueletico", "esqueletica", "esqueleticos", "esqueleticas"]
var_Estabilidad = ["estabilidad", "estabilidades", "estable"]
var_Estacionamiento = ["estacionamiento", "estacionamientos"]
var_Estadistico = ["estadistico", "estadisticos", "estadistica", "estadisticas"]
var_Estado = ["estado"]
var_Estudiante = ["estudiante", "estudiantes", "alumno", "alumnos", "alumna", "alumnas", "estudiantil", "escolar", "escolares"]
var_Evaluacion = ["evaluacion", "evaluaciones", "diagnostico", "examen", "examenes", "prueba", "pruebas", "test", "diagnosticos", "diagnosticar"]
var_Evacuacion = ["evacuacion", "evacuaciones"]
var_Evitar = ["evitar"]
var_ExamenFemenino = ["pap", "papanicolau", "examen de mamas"]
var_Exceso = ["exceso", "excesivo", "excesiva"]
var_Exclavitud = ["esclavo", "esclava", "esclavos", "esclavas", "esclavitud"]
var_Extranjero = ["extranjero", "extranjeros"]
var_Exotico = ["exotico", "exotica", "exoticos", "exoticos", "foranea", "foraneas", "foraneo", "foraneos"]
var_Experiencia = ["experiencia", "experiencias"]
var_Explotacion = ["explotacion", "explotaciones"]
var_Exportacion = ["exportacion", "exportaciones"]
var_Expresion = ["expresion", "expresiones"]
var_Externalidad = ["externalidad", "externalidades"]
var_Extinsion = ["extincion", "extinciones"]
var_Extraccion = ["extraer", "extraccion", "extracciones"]
var_Familia = ["familia", "familias", "familiares", "familiar", "intrafamiliar", "intrafamiliares"]
var_Feria = ["feria", "ferias"]
var_Finalizacion = [" fin ", "final", "finalizar", "finalizacion"]
var_Financiamiento = ["financiamiento", "financiar", "financiero", "financieros", "financiera", "financieras", "capital semilla", "capital abeja"]
var_Firmar = ["firmar ", "firma "]
var_Fisco = ["fiscal", "fisco"]
var_Flora = ["flora", "plantas"]
var_FondoVerde = ["fondo verde"]
var_Fonoaudiologia = ["fonoaudiologia", "fonoaudiologo", "fonoaudiologica", "fonoaudiologico", "fonoaudiologicas", "fonoaudiologicos"]
var_Forestal = ["forestal", "bosque", "bosques", "forestales", "arbol", "arboles"]
var_Formacion = ["formacion", "formaciones", "formar", "conformar", "conformacion", "conformaciones"]
var_Formal = ["formal", "formalizacion", "formalizaciones"]
var_Fortalecimiento = ["fortalecimiento", "fortalecer"]
var_Fruto = ["fruto", "frutos", "frutal", "frutales"]
var_Fuera = ["fuera"]
var_FundacionTecho = ["fundacion techo"]
var_Fundamental = ["fundamental", "fundamentales"]
var_Gasto = ["gasto", "gastos"]
var_GastoPublico = ["gasto publico"]
var_Gastronomia = ["gastronomia", "gastronomico", "gastronomicos"]
var_Generacion = ["generacion", "generar"]
var_Genero = ["género", "generos", "sexo", "sexos"]
var_Genetica = ["genetica", "genetico", "geneticos", "geneticas"]
var_Genital = ["genital", "genitales", "pene", "penes", "vagina", "vaginas"]
var_Gerente = ["gerente", "gerentes"]
var_Gestion = ["gestion", "gestiones"]
var_Gratuidad = ["gratuidad", "gratuito", "gratuita", "gratis"]
var_Guerra = ["guerra", "conflicto armado"]
var_Habilidad = ["habilidad", "habilidades"]
var_HabilidadesEducativas = ["habilidades educativas", "matematicas", "lenguaje", "leer", "lectura", "oratoria", "lectoescritura", "alfabetizar", "alfabetizacion", "comprension lectora", "comprension de lectura", "ortografia"]
var_Habitat = ["habitat", "habitar", "habitats"]
var_Habitos = ["habitos", "habito", "conducta", "conductas", "conductual"]
var_Hacinar = ["hacinar", "hacinamiento", "hacinado", "hacinada"]
var_Haitiano = ["haitiano", "haitianos", "haitiana", "haitianas"]
var_Hambre = ["hambre", "hambriento", "hambrienta", "hambrientas", "subalimentacion"]
var_Herencia = ["herencia", "herencias"]
var_Herramienta = ["herramienta", "herramientas"]
var_Historica = ["historica", "historico", "historicas", "historicos"]
var_Higiene = ["higiene", "cepillo de dientes", "pasta de dientes", "flour", "lavado", "cepillar", "cepillado", "higienista", "higienistas"]
var_Honor = ["honor", "honores"]
var_Hospital = ["cesfam", "hospital", "hospitales"]
var_Huella = ["huella", "huellas"]
var_Huerto = ["huerto", "huertos", "huerta", "huertas"]
var_Humano = ["humano", "humana", "humanidad", "humanidades"]
var_Humo = [" humo "]
var_IA = ["inteligencia artificial"]
var_Idea = [" idea ", " ideas "]
var_Identidad = ["identidad", "identidades"]
var_IdeologiaDeGenero = ["ideologia de genero", "identidad de genero"]
var_Igualdad = ["igualdad", "equidad", "igualitario", "equidades", "paridad", "equitativo", "equitativa", "equitativos", "equitativas","igualitaria"]
var_Imagen = ["imagen", "imagenes", "imagenologia"]
var_Impacto = ["impacto", "impactar", "impactos"]
var_Importancia = ["importancia", "importancias", "importante", "importantes"]
var_Impuesto = ["impuesto", "tributo", "operacion renta", "iva", "impuesto", "royalty", "sii", "servicio de impuestos internos"]
var_Inadecuado = ["inadecuado", "inadecuada", "inadecuadas", "inadecuados"]
var_Incautar = ["incautar", "incautacion", "incautada", "incautadas", "incautado", "incautados", "confiscar", "confiscada", "confiscado", "confiscadas", "confiscados"]
var_Incentivo = ["incentivo", "incentiva", "incentivar", "incentivado", "incentivando", "incentivos"]
var_Inclusion = ["inclusion", "inclusivo", "inclusiva", "inclusivos"]
var_Indicador = ["indicador", "indicadores"]
var_Industria = ["industria", "industrializacion", "industrial", "industrias"]
var_Infanticidio = ["infanticidio", "infanticidios"]
var_Informacion = ["informacion", "informaciones", "informativa", "informativo", "informativas", "informativos", "conocimiento", "conocer", "conocimientos"]
var_Informatico = ["informatico", "digital", "informaticos", "digitales", " tic ", " tics ", "informaticas", "computacion"]
var_Infraestructura = ["infraestructura", "infraestructuras", "caminos", "carreteras", "camino", "carretera", "puentes", "puente", "edificios", "edificio", "edificacion", "edificaciones", "sendero", "senderos"]
var_Ingenieria = ["ingenieria", "ingenierias"]
var_Ingesta = ["ingesta", "ingerir"]
var_Ingreso = ["ingresos", "ingreso", "recurso", "recursos", "fondo", "fondos"]
var_Inicial = ["inicial", "iniciales"]
var_Iniciativa = ["iniciativa", "iniciativas"]
var_Injusticia = ["injusticia", "injusto"]
var_Inmigracion = ["inmigracion", "inmigrante", "inmigrantes", "migrantes", "migrante", "migracion", "migraciones", "inmigraciones"]
var_Inmunizacion = ["inmunizacion", "inmunizar", "inmunizaciones", "inmunologicas", "inmunologica", "inmunologico", "inmunologicos", "inmunologia"]
var_Innecesario = ["innecesario", "innecesarios", "inutil", "inutiles"]
var_Innovacion = ["innovacion", "innovaciones"]
var_Inseguridad = ["inseguridad", "inseguro", "insegura"]
var_Insercion = ["insercion", "inserciones"]
var_Inspeccion = ["inspeccion", "inspecciones"]
var_Institucion = ["institucion", "instituciones", "institucionalidad"]
var_InstitucionesFiscalizacionFinanciera = ["fiscalia nacional economica", "superintendencia de bancos"]
var_InstitucionesMundiales = [" onu ", " ocde ", " oea ", " fmi ", "fondo monetario internacional", "banco mundial" "organizacion mundial de comercio", "organizacion mundial del medio ambiente", "organizacion mundial de la salud"]
var_InstitucionesPobreza = ["fondo esperanza", "banco comunal"]
var_InstitucionesPobrezaExtrema = ["hogar de cristo", "maria ayuda"]
var_InstitucionesProductivas = ["sercotec", "corfo", "fosis", "prochile", "omil"]
var_InstitucionesProductivasAgricolas = ["pdti", "prodesal", "indap"]
var_InstitucionProteccionSocial = ["afc", "aseguradora fondo de pensiones"]
var_InstrumentoProteccionSocial = ["registro social de hogares", "cartola hogar", "fondo de cesantia", "seguro de cesantia"]
var_Insumo = ["insumo", "insumos"]
var_Integral = ["integral", "integracion", "integrada", "integrado", "integraciones"]
var_Intercambio = ["intercambio", "intercambiar"]
var_Internacional = ["internacional", "mundial", "internacionales", "mundiales", "global", "globales", "transfronterizo", "transfronteriza"]
var_Internet = ["internet"]
var_Interurbano = ["interurbano", "interurbano"]
var_Intervencion = ["intervencion"]
var_Introduccion = ["introduccion", "introducida", "introducido", "introducir"]
var_Inundacion = ["inundacion", "inundaciones", "inundar"]
var_Invadir = ["invadir", "invasor", "invasora", "invasores", "invasoras"]
var_Invernadero = ["invernadero", "invernaderos"]
var_Inversion = ["inversion", "inversiones", "invertir"]
var_Investigacion = ["investigacion", "investigaciones", "investigativo", "investigativa"]
var_Isapre = ["isapre"]
var_Jardin = ["jardines", "jardin"]
var_Joven = ["joven", "jovenes", "juventud", "juvenil", "adolescente", "adolescentes"]
var_Judicial = ["judicial", "juridica", "judiciales", "juridicas"]
var_Junta = ["junta"]
var_Justo = ["justo"]
var_Kinder = ["kinder"]
var_Kinesiologico = ["kinesiologo", "kinesico", "kinesiologico", "kinesiologos", "kinesica"]
var_Laboral = ["laboral", "laborales", "trabajo", "trabajadores", "empleo", "empleadores", "empleabilidad", "oficio", "oficios"]
var_Laboratorio = ["laboratorio", "laboratorios", "laboratorista", "laboratoristas"]
var_Lactancia = ["lactancia", "leche materna"]
var_Ley = ["ley", "leyes", "legislacion", "marco normativo", "legislativas", "politicas", "reforma", "legales", "politica", "margen normativo", "marcos normativos", "margenes normativos"]
var_Libertad = ["libertad", "libertades", "libre"]
var_Licitacion = ["licitacion", "licitaciones"]
var_Limpio = ["limpio", "limpiar", "limpios", "limpieza", "limpiezas"]
var_ListaRoja = ["lista roja"]
var_Local = ["local", "locales"]
var_Luchar = ["luchar", "enfrentar", "hacer frente"]
var_Mal = [" mal ", " malo "]
var_MalaPracticaPesquera = ["sobrepesca", "pesca de arrastre"]
var_MalNutricion = ["malnutricion", "malnutrición", "comida chatarra"]
var_Manejo = ["manejo", "manejos"]
var_Mar = [" mar ", "mares", "oceano", "oceanos", "pacifico", "atlantico", "indico", "artico", "antartico"]
var_MarcoSendai = ["marco sendai"]
var_Marginal = ["marginal", "marginales"]
var_Maritimo = ["marino", "maritimo", "maritimos", "marina", "maritima", "submarino", "submarina"]
var_Marketing = ["marketing", "mercadotecnia"]
var_Material = ["material", "materiales"]
var_MateriaPrima = ["materia prima", "materias primas"]
var_Materna = ["materna", "maternal", "materno", "maternas"]
var_Matricula = ["matricula", "matriculas"]
var_Matrimonio = ["matrimonio", "matrimonios"]
var_Medicamento = ["medicamento", "medicamentos", "vacuna", "vacunas", "vacunacion", "farmacologicos", "farmacos"]
var_Medicina = ["medicina", "medica", "medico", "medicinal", "medicinales"]
var_Medicion = ["medicion", "mediciones"]
var_Mejorar = ["mejorar", "mejorando", "mejor", "mejores"]
var_Mental = [" mental", " mentales"]
var_Mercado = ["mercado", "mercados"]
var_Metodo = ["metodo", "metodo"]
var_Microcredito = ["microcredito", "micro credito", "micro financiamiento", "micro financiacion"]
var_Mineria = ["minero", "mineros", "mineria", "mineras", "minera"]
var_Minimo = ["minimo", "minimizar", "minimizacion", "minimizaciones"]
var_Modelo = ["modelo", "modelos", "modelamiento", "modelamientos"]
var_Moderno = ["moderno", "modernizar", "modernos", "modernizacion"]
var_Montana = ["montana", "montanas", "montanoso", "montanosos", "montanosa", "montanosas"]
var_Monopolio = ["monopolio", "monopolios"]
var_Motora = ["motora", "motrices", "motriz"]
var_Movilizacion = ["movilizacion", "movilidad"]
var_Muerte = ["muerte", "muertes", "mortalidad", "defuncion", "defunciones", "asesinatos", "asesinato", "homicidios"]
var_MuerteDeNinos = ["muerte de ninos", "preclamsia"]
var_Muestra = ["muestra", "mostrar"]
var_Mujer = ["mujer", "mujeres", "femenino", "feminizacion"]
var_Mundo = ["mundo"]
var_Musculo = ["musculo", "musculos"]
var_Mutilacion = ["mutilar", "mutilacion", "mutilaciones"]
var_Nacion = ["nacion", "nacional", "nacionales"]
var_Narcotest = ["narcotest"]
var_nativo = ["nativo", "nativos", "nativa", "nativas"]
var_Natural = ["natural", "naturaleza", "naturales"]
var_Necesidad = ["necesidad", "necesidades"]
var_NEE = ["nee", "necesidades educativas especiales"]
var_Negativo = ["negativo", "negativa", "negativos", "negativas"]
var_Negocio = ["negocio", "negocios"]
var_Neurologia = ["neurologia", "neuro", "neurologia", "neurologica", "neurologico", "neurologias", "neurologicas", "neurologicos", "neuropsicologia", "neuropsicologica"]
var_Nino = ["nino", "ninos", "infantil", "infantiles", "hijos", "hijo"]
var_Nina = ["ninas", "nina", "niña", "niñas"]
var_No = [" no "]
var_Nombre = ["nombre", "nombres"]
var_Nuevo = ["nuevo", "nuevos", "nueva", "nuevas"]
var_Nutricional = ["nutricional", "nutricionales", "nutricion", "nutrición"]
var_Nutriente = ["nutriente", "nutrientes"]
var_Oasificacion = ["oasificacion"]
var_Obesidad = ["obesidad", "obeso", "obesa", "sobrepeso"]
var_Obligado = ["obligado", "obligatorio", "obligar", "forzar", "forzado", "forzoso", "obligacion", "involuntario"]
var_Ocupacional = ["ocupacional", "ocupacionales"]
var_ODS = ["objetivo de desarrollo sostenible", "objetivos de desarrollo sostenible", "objetivo de desarrollo sustentable", "objetivos de desarrollo sustentable", "ods"]
var_Oficina = ["oficina", "oficinas"]
var_Operativo = ["operativo", "campana", "operativos", "campanas"]
var_Oportunidad = ["oportunidad", "oportunidades"]
var_Organizada = ["organizada", "organizado", "organizar", "organizacion", "organizaciones", "organizacional", "organizacionales"]
var_Paciente = ["paciente", "pacientes"]
var_Padre = ["padre", "padres", "papa", "papas", "papi"]
var_Pais = ["paises", "pais"]
var_PaisesAfricanos = ["Egipto"]
var_PaisesAsiaticos = ["China", "Japon"]
var_PaisesCentroAmericanos = ["Haiti"]
var_PaisesEnDesarrollo = ["paises en desarrollo", "paises subdesarrollados", "paises menos adelantados", "paises menos desarrollados"]
var_PaisesEuropeos = ["Alemania", "Espana", "Italia"]
var_PaisesNorteAmericano = ["Estados Unidos", "Mexico", "Canada"]
var_PaisesOceanicos = ["Australia"]
var_PaisesSudamericano = ["Argentina", "Peru"]
var_Pareja = ["pareja", "parejas"]
var_Parque = ["parque", "parques"]
var_Parto = ["parto", "partos", "dar a luz", "parir"]
var_Participacion = ["participacion", "participaciones", "partipativas", "participativa", "participativo", "participativos"]
var_Particula = ["particula", "particulado"]
var_Parvulo = ["parvulo", "parvulos", "parvularia", "parvulario", "parvularios", "parvularias"]
var_Patrimonio = ["patrimonio", "patrimonios", "monumento", "monumentos"]
var_Pausa = ["pausa", "pausar"]
var_Pedagogia = ["pedagogia", "pedagogico", "docente", "docencia", "docentes", "pedagogicos", "educador", "educadoras", "educadora", "educadores", "profesores", "profesor"]
var_Pediatria = ["pediatria", "pediatrica", "pediatrico", "pediatrias", "pediatricas", "pediatricos", "neonatal"]
var_Peligro = ["peligro", "peligros", "peligroso", "peligrosa", "peligrosos", "peligrosas"]
var_Penal = ["penal"]
var_Pension = ["pension", "pensiones"]
var_Perdida = ["perdida", "perdidas", "perder", "perdido", "perdidos"]
var_Perfil = ["perfil", "perfiles"]
var_Periodismo = ["periodismo", "periodista", "periodistas", "periodismos"]
var_Peritaje = ["peritaje", "peritajes"]
var_Perjudicial = ["perjudicial", "perjudiciales"]
var_Persona = ["personas", "persona"]
var_Pesca = ["pesca", "pesquero", "pesquera", "pescador", "pescadora", "pescadoras", "pescadores", "pesqueras", "armador", "armadores"]
var_Petroleo = ["petroleo", "gasolina", "diesel", "bencina", "combustibles fosiles", "combustible fosil", "hidrocarburo", "hidrocarburos"]
var_PIB = ["pib", "producto interno bruto"]
var_Psicologia = ["psicologica", "psicologico", "psicologia", "psicologicos", "psicodiagnostico", "psicomotriz", "psicoanalisis"]
var_Plan = ["plan", "planes", "planificacion", "planificaciones", "estrategia", "estrategias"]
var_Plastico = ["plastico", "plasticos", "plastica", "plasticas"]
var_Poblacion = ["poblacion", "poblaciones", "barrio", "barrios", "vecindario", "villa"]
var_Pobre = ["pobre", "pobres", "pobreza"]
var_PobrezaExtrema = ["pobreza extrema", "situacion de calle", "indigentes", "mendigos", "mendigar", "vagabundos", "sin hogar", "indigente", "vagabundo", "mendigo"]
var_Poligamia = ["poligamia"]
var_Pololeo = ["pololeo", "pololeos"]
var_Portal = ["portal", "portales"]
var_Positivo = ["positivo", "positivos"]
var_PozoNegro = ["pozo negro", "pozos negros"]
var_Postgrado = ["postgrado", "magister", "doctorado"]
var_Postulacion = ["postulacion", "postular", "postulaciones"]
var_Potable = ["potable", "potabilizacion", "potabilizada"]
var_Practica = ["practica", "practicas", "practicar"]
var_Precio = ["precio", "precios"]
var_Prensa = ["prensa"]
var_Preparacion = ["preparacion", "preparar", "preparaciones", "elaborar", "elaboracion", "elaboraciones"]
var_Presentacion = ["presentacion", "presentar", "presentando", "presentado"]
var_Preservativo = ["preservativo", "preservativos", "anticonceptivo", "anticonceptivos"]
var_Prevencion = ["prevencion", "prevenir", "preventiva", "preventivo"]
var_Primaria = ["primaria"]
var_Primer = ["primer", "primero", "primeros"]
var_PrimerosAuxilios = ["primeros auxilios", "primer auxilio", "rcp", "maniobra cardiopulmonar", "reanimacion", "heimlich"]
var_Privado = ["privado", "privados"]
var_Problema = ["problema", "problemas", "problematica", "problematicas", "problematico", "problematicos", "complicado", "complicacion", "complicaciones"]
var_Proceso = ["procesos", "proceso"]
var_Produccion = ["produccion", "producción", "producido", "producir", "producidos", "producida", "producidas", "productivo", "productiva", "productivos", "productivas", "productividad"]
var_Producto = ["producto", "productos"]
var_Portador = ["portador", "portadores", "portadora", "portadoras"]
var_ProductosFinancieros = ["prestamos", "prestamo", "fondo publico", "fondos publicos", "fondo privado", "fondos privados", "creditos", "credito", "subsidios", "servicios bancarios", "servicio financieros", "cuentas bancarias", "productos financieros", "crediticio", "crediticios", "bancarizable"]
var_Profesion = ["profesion", "profesiones", "profesional", "profesionales"]
var_Programa = ["programa", "programas"]
var_ProgramaMujeres = ["programa mujer", "programa mujeres", "programa mujeres jefas de hogar", "programa mujer emprende", "programa buenas practicas laborales con equidad de genero", "programa crece mujer"]
var_Promover = ["promocion", "promover", "promoviendo"]
var_Propiedad = ["propiedad", "propio", "propietario", "propietarias", "dueno", "duenos", "propietarios", "propietaria", "duenas", "duena", "propiedades"]
var_Protesis = ["protesis", "protesi"]
var_Proteccion = ["proteccion", "protecciones", "seguridad", "seguridades", "proteger", "seguro", "protegido", "protegidos", "protegidas", "protegida", "seguros"]
var_Proyecto = ["proyecto", "proyectos"]
var_Psicoeducacion = ["psicoeducacion", "psicoeducativo", "psicoeducativa", "psicopedagogico"]
var_Publica = ["publica", "publicas"]
var_Publico = ["publico", "publicos"]
var_Pura = [" puro ", "purificacion", "purificaciones", " pura "]
var_Racismo = ["racismo", "racismos", "racista", "racistas"]
var_Rampa = ["rampa", "rampas"]
var_RayoUV = ["rayos uv", "rayos ultravioleta"]
var_Recaudacion = ["recaudar", "recaudacion", "recaudaciones", "recoleccion", "recolectar", "recolecciones"]
var_Reciclaje = ["reciclaje", "reciclado", "reciclar", "reutilizar", "reutilizacion"]
var_Recomendacion = ["recomendacion", "recomendaciones"]
var_Reconocer = ["reconocer", "reconocimiento", "reconocimientos"]
var_Reconstruccion = ["reconstruccion"]
var_Red = ["red", "redes"]
var_Reducir = ["reducir", "disminuir", "reduccion", "disminucion", "ahorrar", "ahorro", "ahorros"]
var_Reforestar = ["reforestacion", "reforestar", "reforestaciones", "reforestemos", "reforestamos"]
var_Refuerzo = ["refuerzo", "reforzar", "reforzamiento", "reforzamientos"]
var_Region = ["region", "regiones", "regional", "regionales"]
var_Registro = ["registro"]
var_Regulacion = ["regulacion","reglamentacion", "reglamentar", "regular", "regularizacion", "regularizar"]
var_Rehabilitar = ["rehabilitar", "rehabitacion", "rehabilitaciones"]
var_Religion = ["religion", "religiones", "religioso", "religiosa", "religiosos", "religiosas"]
var_Remuneracion = ["remuneracion", "remuneraciones", "salario", "salarios", "salarial"]
var_RendicionDeCuenta = ["rendicion de cuenta", "Rendiciones de cuentas"]
var_Reos = ["reos", "reo", "presidiario", "presidiarios", "poblacion penal", "presos", "preso"]
var_Representatividad = ["representatividad", "representativo", "representativa", "representativos", "representativas"]
var_Reproduccion = ["reproduccion", "reproducir", "reproducciones", "reproductivo", "reproductiva", "reproductivas", "reproductivos"]
var_Rescate = ["rescate", "rescatar", "rescates"]
var_Reserva = ["reserva", "reservar", "reservas", "reservacion"]
var_Residual = ["residual", "residuales"]
var_Resiliencia = ["resiliencia", "resiliente", "resilientes"]
var_Respetar = ["respetar", "respeto"]
var_Respiracion = ["respiracion", "respirar", "respiratorio", "respiratoria", "respiratorios", "respiratorias"]
var_Responsabilidad = ["responsabilidad", "responsable", "responsabilidades"]
var_Restauracion = ["restauracion", "restauraciones", "restaurar", "restablecer", "restablecimiento"]
var_Resultado = ["resultado", "resultados"]
var_Reunion = ["reunion", "reuniones", "reunir"]
var_Riesgo = ["riesgo", "riesgos", "inseguridad", "inseguridades"]
var_Rol = [" rol ", "roles"]
var_Rural = ["rural", "rurales", "campo"]
var_Sala = ["sala", "salas", "aula", "aulas"]
var_Salir = ["salir", "salida"]
var_Salud = ["salud"]
var_Saludable = ["saludable", "saludables", "buena salud", "sanos", " sano ", " sana ", "sanas"]
var_Sangre = ["sangre"]
var_Sanitario = ["sanitario", "sanitaria", "sanitarios", "sanitarias"]
var_Saneamiento = ["saneamiento"]
var_Secundaria = ["secundaria", "secundario", "secundarias", "secundarios"]
var_Segundo = ["segundo", "segundos"]
var_Seleccion = ["seleccion", "selectivo", "selectiva"]
var_Sembrar = ["sembrar", "siembra", "siembras", "plantar", "plantacion", "plantaciones"]
var_Semilla = ["semillas", "semilla"]
var_Senda = [" senda "]
var_Sensibilidad = ["sensibilidad", "sensible"]
var_Sentido = ["sentido"]
var_Separar = ["separar", "separacion", "separaciones"]
var_Sequia = ["sequia", "sequias", "estres hidrico"]
var_Serie = ["serie", "series"]
var_Sernatur = ["sernatur"]
var_Servicio = ["servicio", "servicios"]
var_Sexualidad = ["sexualidad", "sexual"]
var_Simulacro = ["simulacro"]
var_Sin = [" sin ", " falta ", "carencia", "escasez", " cero "]
var_Sindicato = ["sindicato", "sindicatos", "sindical", "sindicales"]
var_Sistema = ["sistema", "sistemas"]
var_Situacion = ["situacion", "situaciones"]
var_Sobreexplotacion = ["sobreexplotacion", "sobreexplotaciones"]
var_Social = ["social", "sociales", "socialmente"]
var_Socioeducativo = ["socioeducativo", "socioeducativa", "socioeducativas", "socioeducativos"]
var_Soldado = ["soldado", "soldados"]
var_Solicitud = ["solicitud", "solicitudes"]
var_Solidaridad = ["solidaridad", "solidario", "solidaria", "solidarias", "solidarios"]
var_Solido = ["solido", "solidos"]
var_Suscribir = ["Suscribir", "Sustriben", "Suscripción"]
var_Sostenible = ["sostenible", "sustentable", "sustentabilidad", "sostenibilidad"]
var_Subsistencia = ["subsistencia", "subsistencias"]
var_Subvencion = ["subvencion", "subvenciones", "subsidios", "subsidio"]
var_Suicidio = ["suicidios", "suicidio"]
var_Suministro = ["suministro", "suministros"]
var_Superior = ["superior", "superiores"]
var_Tabaquismo = ["tabaco", "tabaquismo", "cigarro", "cigarrillo", "fumar", "fumador", "fumadores", "nicotina", "antitabaco", "cancer de pulmon"]
var_Tala = [" tala ", " talar "]
var_Taller = ["taller", "talleres", "seminario", "seminarios", "jornada", "jornadas"]
var_Tecnica = ["tecnica", "tecnicas"]
var_Tecnico = ["tecnico", "tecnicos"]
var_Tecnologia = ["tecnologia", "tecnologico", "tecnologica", "tecnologias", "tecnologicas", "tecnologicos"]
var_Telecomunicaciones = ["telecomunicaciones", "senales inalambricas", "senal inalambrica", "telefonia", "telecomunicacion"]
var_Teleton = ["teleton"]
var_Temprano = ["temprano", "tempranos", "temprana", "tempranas"]
var_Tension = ["tension", "tensiones"]
var_Terapia = ["terapia", "terapeutico", "psicoterapia", "terapias"]
var_Terrorismo = ["terrorismo", "terroristas", "terrorista"]
var_Tierra = ["tierra", "suelo", "suelos", "tierras"]
var_Toma = [" toma ", " tomas "]
var_Torax = ["torax", "toracica", "toracicas", "toracico", "toracicos"]
var_Toxico = ["toxico", "toxica", "toxicos", "toxicas"]
var_Tradicion = ["tradicion", "tradiciones", "tradicionales", "tradicional"]
var_Transaccion = ["transaccion", "transacciones"]
var_Transexual = ["transexual", "transexualidad", " trans ", "travesti", "travestis", "transexuales", "transgenero"]
var_Transferencia = ["transferencia", "transferencias"]
var_Transitorio = ["transitorio", "transitoria", "transitorios", "transitorias"]
var_Transparencia = ["transparencia", "transparente", "transparencias", "transparentes"]
var_Transporte = ["transporte", "transportes"]
var_Trastorno = ["trastorno", "trastornos"]
var_Trata = [" trata ", " tratas "]
var_Tratamiento = ["tratamiento", "tratamientos"]
var_Trato = [" trato "]
var_Tribunal = ["tribunal", "tribunales"]
var_Turismo = ["turismo", "turistico", "turistica"]
var_Universal = ["universal", "universales"]
var_Universidad = ["universidad", "universidades", "universitario", "universitaria", "universitarios", "universitarias"]
var_Urbanizacion = ["urbanizacion", "urbano", "urbanos", "urbanizaciones"]
var_Uso = [" uso ", " usos ", " usar "]
var_Usuario = ["usuario", "usuarios", "usuaria", "usuarias"]
var_Valor = ["valor", "valores"]
var_Vegetal = ["vegetal", "vegetales", "verduras", "verdura", "hortalizas", "hortaliza", "horticola", "horticolas"]
var_Vestuario = ["vestuario", "vestuarios", "vestimenta", "vestimentas", "ropa", "ropas", "ropero", "roperos"]
var_Vial = ["vial", "viales", "transito", "transitos"]
var_Vida = [" vida ", "vidas"]
var_Vigilancia = ["vigilancia", "vigilancias", "vigilante", "vigilantes", "fiscalizacion", "fiscalizaciones", "fiscalizador", "fiscalizadores", "supervision", "supervisiones", "supervisor", "supervisores"]
var_Vinculo = ["vinculo", "vincular", "vinculando", "vinculado"]
var_Violencia = ["violencia", "violento", "agresion", "agresiones", "abuso", "abusos", "violencias", "tortura", "torturas", "golpe", "golpes"]
var_ViolenciaMujer = ["violacion", "violaciones", "femicidio", "femicidios"]
var_Vocacion = ["vocacion", "vocaciones", "vocacional", "vocacionales"]
var_Vivienda = ["vivienda", "viviendas", " casa ", "casas", "hogar", "hogares"]
var_Vulnerabilidad = ["vulnerabilidad", "vulnerable", "vulnerables"]
var_Zona = [" zona ", " zonas "]

import sys

#ENTRADA DE DATOS

entrada = sys.argv[1]

#entrada = "El Director de Sede recibe a los convocados dándoles la bienvenida, contándoles el objetivo de la reunión, realiza presentación de la gestión de su sede del año 2022, además ilustra a los presentes del CEAP Consejo Estratégico Asesor Provincial, a continuación da a conocer estadísticas sobre el año académico en curso, se hablan temáticas de continuidad de estudios, convenios firmados con el entono, equidad de género y uso de nombre social. Seguidamente expone la Directora de Vinculación con el Medio, en la cual da a conocer las iniciativas de vinculación ejecutadas durante el año, índice de vinculación Institucional (INVI) y detalles del Proyecto Educativamente Sano, ejecutado en las cuatro sedes. Para terminar con el proceso de exposición, finaliza la encargada de Educación continua, con la presentación de la OTEC, detalle de cursos ejecutados durante el año 2022 y se abre diálogo para sugerencia para la oferta programática."

#-----------------------ALGORITMO ODS 1----------------------------------------

#   ("ALGORITMO META 1.1")
# Meta_1_1 =    [var_PobrezaExtrema,
#               var_InstitucionesPobrezaExtrema,
#               (var_Necesidad and var_Basica),
#               (((var_Persona or var_Familia) and var_Sin) and var_Ingreso)]
#Meta_1.1

if  (any(var in entrada for var in var_PobrezaExtrema) or
    (any(var in entrada for var in var_InstitucionesPobrezaExtrema)) or
    (any(var in entrada for var in var_Necesidad) and any(var in entrada for var in var_Basica)) or
    (((any(var in entrada for var in var_Persona) or any(var in entrada for var in var_Familia)) and
    any(var in entrada for var in var_Sin)) and any(var in entrada for var in var_Ingreso))):
    Meta_1_1 = True
    print("Meta 1.1: De aqui a 2030, erradicar para todas las personas y en todo el mundo la pobreza extrema (actualmente se considera que sufren pobreza extrema las personas que viven con menos de 1,25 dolares de los Estados Unidos al dia)");
else:
    Meta_1_1 = False

#   ("ALGORITMO META 1.2")
#Meta_1_2 =     [var_InstitucionesPobreza,
#               var_Bajo and var_Ingresos,
#               var_Persona and var_Pobre]


if  (any(var in entrada for var in var_InstitucionesPobreza) or
    ((any(var in entrada for var in var_Bajo) and any(var in entrada for var in var_Ingreso)) or
    any(var in entrada for var in var_Pobre))):
    Meta_1_2 = True
    print("Meta 1.2: De aqui a 2030, reducir al menos a la mitad la proporcion de hombres, mujeres y ninos de todas las edades que viven en la pobreza en todas sus dimensiones con arreglo a las definiciones nacionales)");
else:
    Meta_1_2 = False

#   ("ALGORITMO META 1.3")
# Meta_1_3 =    [(var_Proteccion or var_Vulnerabilidad or var_Bienestar or var_Asistencia) and (var_Social or var_Laboral),
#               var_InstrumentoProteccionSocial,
#               var_InstitucionProteccionSocial]

if  (((any(var in entrada for var in var_Proteccion) or any(var in entrada for var in var_Vulnerabilidad) or
    any(var in entrada for var in var_Bienestar) or any(var in entrada for var in var_Asistencia)) and
    (any(var in entrada for var in var_Social) or any(var in entrada for var in var_Laboral))) or
    any(var in entrada for var in var_InstrumentoProteccionSocial) or
    any(var in entrada for var in var_InstitucionProteccionSocial)):
    Meta_1_3 = True
    print("Meta 1.3: Implementar a nivel nacional sistemas y medidas apropiados de proteccion social para todos, incluidos niveles minimos, y, de aqui a 2030, lograr una amplia cobertura de las personas pobres y vulnerables)");
else:
    Meta_1_3 = False

#   ("ALGORITMO META 1.4")
# Meta_1_4 =    [var_InstitucionesPobreza,
#               (var_Derecho or var_Acceso) and (var_Vivivenda or var_Agua or var_Electricidad)]

if  (any(var in entrada for var in var_InstitucionesPobreza) or
    ((any(var in entrada for var in var_Derecho) or any(var in entrada for var in var_Acceso)) and
    (any(var in entrada for var in var_Vivienda) or any(var in entrada for var in var_Agua) or
    any(var in entrada for var in var_Electricidad)))):
    Meta_1_4 = True
    print("Meta 1.4: De aqui a 2030, garantizar que todos los hombres y mujeres, en particular los pobres y los vulnerables, tengan los mismos derechos a los recursos economicos y acceso a los servicios basicos, la propiedad y el control de la tierra y otros bienes, la herencia, los recursos naturales, las nuevas tecnologias apropiadas y los servicios financieros, incluida la microfinanciacion");
else:
    Meta_1_4 = False

#   ("ALGORITMO META 1.5")
# Meta_1_5 =    [var_Vestuario and var_Solidaridad,
#               var_Vestuario and var_PobrezaExtrema,
#               var_Vivienda and var_Emergencia,
#               var_Reconstruccion and var_Vivienda,
#               (var_Desastre or var_DesastreNatural or var_DesastreSanitario) and var_Pobre]

if  ((any(var in entrada for var in var_Vestuario) and any(var in entrada for var in var_Solidaridad)) or
    (any(var in entrada for var in var_Vestuario) and any(var in entrada for var in var_PobrezaExtrema)) or
    (any(var in entrada for var in var_Vivienda) and any(var in entrada for var in var_Emergencia)) or
    (any(var in entrada for var in var_Reconstruccion) and any(var in entrada for var in var_Vivienda)) or
    ((any(var in entrada for var in var_Desastre) or any(var in entrada for var in var_DesastreNatural) or
    any(var in entrada for var in var_DesastreSanitario)) and any(var in entrada for var in var_Pobre))):
    Meta_1_5 = True
    print("Meta 1.5: De aqui a 2030, fomentar la resiliencia de los pobres y las personas que se encuentran en situaciones de vulnerabilidad y reducir su exposicion y vulnerabilidad a los fenomenos extremos relacionados con el clima y otras perturbaciones y desastres economicos, sociales y ambientales)");
else:
    Meta_1_5 = False

#   ("ALGORITMO META 1.6")
# Meta_1_6 =    [var_Donacion or var_GastoPublico or var_Programa or (var_Movilizacion and var_Ingreso) or
#               (var_Contribucion and var_Ingreso) and var_Pobre]

if  ((any(var in entrada for var in var_Donacion) or any(var in entrada for var in var_GastoPublico) or
    any(var in entrada for var in var_Programa) or (any(var in entrada for var in var_Movilizacion) and
    any(var in entrada for var in var_Ingreso)) or (any(var in entrada for var in var_Contribucion) and
    any(var in entrada for var in var_Ingreso))) and (any(var in entrada for var in var_Pobre))):
    Meta_1_6 = True
    print("Meta 1.6: Garantizar una movilizacion significativa de recursos procedentes de diversas fuentes, incluso mediante la mejora de la cooperacion para el desarrollo, a fin de proporcionar medios suficientes y previsibles a los paises en desarrollo, en particular los paises menos adelantados, para que implementen programas y politicas encaminados a poner fin a la pobreza en todas sus dimensiones");
else:
    Meta_1_6 = False

#   ("ALGORITMO META 1.7")
# Meta_1_7 =    [var_Ley and (var_Pobre or var_Social)]

if  (any(var in entrada for var in var_Ley) and
    (any(var in entrada for var in var_Pobre) or any(var in entrada for var in var_Social))):
    Meta_1_7 = True
    print("Meta 1.7: Crear marcos normativos solidos en los planos nacional, regional e internacional, sobre la base de estrategias de desarrollo en favor de los pobres que tengan en cuenta las cuestiones de genero, a fin de apoyar la inversion acelerada en medidas para erradicar la pobreza");
else:
    Meta_1_7 = False

# ALGORITMO ODS 1

if  (Meta_1_1 == True or Meta_1_2 == True or Meta_1_3 == True or Meta_1_4 == True or Meta_1_5 == True or Meta_1_6 == True or
    Meta_1_7 == True) :
    print("ODS 1: Poner fin a la pobreza en todas sus formas en todo el mundo")
    ODS_1 = True
else:
    ODS_1 = False

#-----------------------ALGORITMO ODS 2----------------------------------------

#   ("ALGORITMO META 2.1")
# Meta_2_1 =    [(var_Inseguridad or var_Sin or var_Acceso or var_Proteccion or var_Necesidad) and var_Alimentos,
#               (var_Sin or var_Persona or var_Internacional) and var_Hambre]

if  (((any(var in entrada for var in var_Inseguridad) or any(var in entrada for var in var_Acceso) or
    any(var in entrada for var in var_Proteccion) or any(var in entrada for var in var_Necesidad)) and
    (any(var in entrada for var in var_Alimentos))) or
    ((any(var in entrada for var in var_Persona) or any(var in entrada for var in var_Internacional)) and
    (any(var in entrada for var in var_Hambre)))):
    Meta_2_1 = True
    print("Meta 2.1: De aqui a 2030, poner fin al hambre y asegurar el acceso de todas las personas, en particular los pobres y las personas en situaciones de vulnerabilidad, incluidos los ninos menores de 1 ano, a una alimentacion sana, nutritiva y suficiente durante todo el ano");
else:
    Meta_2_1 = False

#   ("ALGORITMO META 2.2")
# Meta_2_2 =    [var_Obesidad,
#               var_Lactancia,
#               var_Balanceado or var_Proceso 
#               or var_Habitos or var_Saludable 
#               or var_Recomendacion and var_Alimentos,
#               var_Propiedad or var_Ingesta or 
#               var_Situacion or var_Mal 
#               or var_Necesidad or var_Consultoria or
#               var_Estado or var_Educacion 
#               or var_Estudiante or 
#               var_Recomendacion or var_Evaluacion or
#               var_Intervencion or var_ Deficit and 
#               (var_Nutricional or var_Alimentos) or
#               var_Preparacion or var_Feria and var_Saludable,
#               var_MalNutricion or (var_Efecto and Var_Positivo) and var_Consumo,
#               var_Insumo and var_Vegetal]

if  (any(var in entrada for var in var_Obesidad) or
    any(var in entrada for var in var_Lactancia) or
    ((any(var in entrada for var in var_Balanceado) or any(var in entrada for var in var_Proceso) or
    any(var in entrada for var in var_Habitos) or any(var in entrada for var in var_Saludable) or
    any(var in entrada for var in var_Recomendacion)) and any(var in entrada for var in var_Alimentos)) or
    ((any(var in entrada for var in var_Propiedad) or any(var in entrada for var in var_Ingesta) or
    any(var in entrada for var in var_Situacion) or any(var in entrada for var in var_Mal) or
    any(var in entrada for var in var_Necesidad) or any(var in entrada for var in var_Consultoria) or
    any(var in entrada for var in var_Estado) or any(var in entrada for var in var_Educacion) or
    any(var in entrada for var in var_Estudiante ) or
    any(var in entrada for var in var_Recomendacion) or any(var in entrada for var in var_Evaluacion) or
    any(var in entrada for var in var_Intervencion) or any(var in entrada for var in var_Deficit)) and 
    (any(var in entrada for var in var_Nutricional) or any(var in entrada for var in var_Alimentos))) or
    ((any(var in entrada for var in var_Preparacion) or any(var in entrada for var in var_Feria)) and
    any(var in entrada for var in var_Saludable)) or
    ((any(var in entrada for var in var_MalNutricion) or (any(var in entrada for var in var_Efecto) and
    any(var in entrada for var in var_Positivo))) and any(var in entrada for var in var_Consumo)) or
    (any(var in entrada for var in var_Insumo) and any(var in entrada for var in var_Vegetal))):
    Meta_2_2 = True
    print("Meta 2.2: De aqui a 2030, poner fin a todas las formas de malnutricion, incluso logrando, a mas tardar en 2025, las metas convenidas internacionalmente sobre el retraso del crecimiento y la emaciacion de los ninos menores de 5 anos, y abordar las necesidades de nutricion de las adolescentes, las mujeres embarazadas y lactantes y las personas de edad");
else:
    Meta_2_2 = False

#   ("ALGORITMO META 2.3")
# Meta_2_3 =    [((var_Manejo and var_Vegetal) or var_Alimentos or (var_Transferencia and var_Tecnologia)) and var_Cultivo,
#               var_Region or var_Familia or (var_Bueno and var_Practica) or var_Cooperativa or var_Campesino or
#               var_Produccion and var_Agricultura,
#               var_Huerto and var_Familia,
#               var_Cooperativa and var_Campesino,
#               var_Fruto and var_Confiable,
#               var_Produccion and var_Vegetal,
#               var_InstitucionesProductivasAgricolas,
#               var_Invernadero]

if  ((((any(var in entrada for var in var_Manejo) and any(var in entrada for var in var_Vegetal)) or
    any(var in entrada for var in var_Alimentos) or (any(var in entrada for var in var_Transferencia) and
    any(var in entrada for var in var_Tecnologia))) and any(var in entrada for var in var_Cultivo)) or
    ((any(var in entrada for var in var_Region) or any(var in entrada for var in var_Familia) or
    (any(var in entrada for var in var_Bueno) and any(var in entrada for var in var_Practica)) or
    any(var in entrada for var in var_Cooperativa) or any(var in entrada for var in var_Campesino) or
    any(var in entrada for var in var_Produccion)) and any(var in entrada for var in var_Agricultura)) or
    (any(var in entrada for var in var_Produccion) and any(var in entrada for var in var_Vegetal)) or
    (any(var in entrada for var in var_Huerto) and any(var in entrada for var in var_Familia)) or
    (any(var in entrada for var in var_Cooperativa) and any(var in entrada for var in var_Campesino)) or
    any(var in entrada for var in var_InstitucionesProductivasAgricolas) or
    any(var in entrada for var in var_Invernadero)):
    Meta_2_3 = True
    print("Meta 2.3: De aqui a 2030, duplicar la productividad agricola y los ingresos de los productores de alimentos en pequena escala, en particular las mujeres, los pueblos indigenas, los agricultores familiares, los ganaderos y los pescadores, entre otras cosas mediante un acceso seguro y equitativo a las tierras, a otros recursos e insumos de produccion y a los conocimientos, los servicios financieros, los mercados y las oportunidades para anadir valor y obtener empleos no agricolas");
else:
    Meta_2_3 = False

#   ("ALGORITMO META 2.4")
# Meta_2_4 =    [var_Fruto and var_Confiable,
#               (var_Gestion or var_Bueno) and var_Practica and var_Agricultura,
#               var_Suministro or var_Sistema or var_Produccion and var_Alimentos]

if  ((any(var in entrada for var in var_Fruto) and any(var in entrada for var in var_Confiable)) or
    ((any(var in entrada for var in var_Gestion) or any(var in entrada for var in var_Bueno)) and
    any(var in entrada for var in var_Practica) and any(var in entrada for var in var_Agricultura)) or
    ((any(var in entrada for var in var_Suministro) or any(var in entrada for var in var_Sistema) or
    any(var in entrada for var in var_Produccion)) and any(var in entrada for var in var_Alimentos))):
    Meta_2_4 = True
    print("Meta 2.4: De aqui a 2030, asegurar la sostenibilidad de los sistemas de produccion de alimentos y aplicar practicas agricolas resilientes que aumenten la productividad y la produccion, contribuyan al mantenimiento de los ecosistemas, fortalezcan la capacidad de adaptacion al cambio climatico, los fenomenos meteorologicos extremos, las sequias, las inundaciones y otros desastres, y mejoren progresivamente la calidad de la tierra y el suelo");
else:
    Meta_2_4 = False

#   ("ALGORITMO META 2.5")
# Meta_2_5 =    [var_Flora or var_Animales or var_Genetica or var_Alimentos or var_Semilla and var_Diversidad,
#               var_Cautiverio or var_Peligro or var_Extinsion or var_Conservacion and var_Animales,
#               var_Perdida and var_Biodiversidad,
#               var_Peligro and var_Extinsion]

if  (((any(var in entrada for var in var_Flora) or any(var in entrada for var in var_Animales) or
    any(var in entrada for var in var_Genetica) or any(var in entrada for var in var_Alimentos) or
    any(var in entrada for var in var_Semilla)) and any(var in entrada for var in var_Diversidad)) or
    ((any(var in entrada for var in var_Cautiverio) or any(var in entrada for var in var_Peligro) or
    any(var in entrada for var in var_Extinsion) or any(var in entrada for var in var_Conservacion)) and
    any(var in entrada for var in var_Animales)) or
    (any(var in entrada for var in var_Perdida) and any(var in entrada for var in var_Biodiversidad)) or
    (any(var in entrada for var in var_Peligro) and any(var in entrada for var in var_Extinsion))):
    Meta_2_5 = True
    print("Meta 2.5: De aqui a 2020, mantener la diversidad genetica de las semillas, las plantas cultivadas y los animales de granja y domesticados y sus correspondientes especies silvestres, entre otras cosas mediante una buena gestion y diversificacion de los bancos de semillas y plantas a nivel nacional, regional e internacional, y promover el acceso a los beneficios que se deriven de la utilizacion de los recursos geneticos y los conocimientos tradicionales conexos y su distribucion justa y equitativa, segun lo convenido internacionalmente");
else:
    Meta_2_5 = False

#   ("ALGORITMO META 2.6")
# Meta_2_6 =    [((var_Tecnologia and var_Manejo) or (var_Tecnica and var_Preparacion) or
#               (var_Taller or (var_Competencia and var_Produccion)) and var_Agricultura)
#               or (((var_Manejo and var_Cultivo) or var_Habilidad or var_Informacion or var_Manejo) and var_Vegetal)
#               or (var_Transferencia and var_Tecnologia and var_Cultivo) and
#               (var_PaisesEnDesarrollo or var_PaisesSudamericano or var_PaisesAfricanos or var_PaisesCentroAmericanos)]

if  ((((any(var in entrada for var in var_Tecnologia) and any(var in entrada for var in var_Manejo)) or
    (any(var in entrada for var in var_Tecnica) and any(var in entrada for var in var_Preparacion)) or
    ((any(var in entrada for var in var_Taller) or (any(var in entrada for var in var_Competencia) and
    any(var in entrada for var in var_Produccion))))) and any(var in entrada for var in var_Agricultura)) or
    (((any(var in entrada for var in var_Manejo) and any(var in entrada for var in var_Cultivo)) or
    any(var in entrada for var in var_Habilidad) or any(var in entrada for var in var_Informacion) or
    any(var in entrada for var in var_Manejo)) and any(var in entrada for var in var_Vegetal)) or
    (any(var in entrada for var in var_Transferencia) and any(var in entrada for var in var_Tecnologia) and
    any(var in entrada for var in var_Cultivo)) and (any(var in entrada for var in var_PaisesEnDesarrollo) or
    any(var in entrada for var in var_PaisesSudamericano) or any(var in entrada for var in var_PaisesAfricanos) or
    any(var in entrada for var in var_PaisesCentroAmericanos))):
    Meta_2_6 = True
    print("Meta 2.6: Aumentar, incluso mediante una mayor cooperacion internacional, las inversiones en infraestructura rural, investigacion y servicios de extension agricola, desarrollo tecnologico y bancos de genes de plantas y ganado a fin de mejorar la capacidad de produccion agropecuaria en los paises en desarrollo, particularmente en los paises menos adelantados");
else:
    Meta_2_6 = False

#   ("ALGORITMO META 2.7")
# Meta_2_7 =    [(var_Practica and var_Comercio and var_Injusticia) or (var_Libertad and var_Competencia) or
#               (var_Reducir and var_Exportacion) or var_Monopolio or (var_AlzaUnilateral and var_Precio) and var_Alimentos,
#               (var_Distorsion and var_Comercio and var_Mercado) or (var_Subvencion and var_Perjudicial) and var_Agricultura,
#               var_Mercado and var_Igualdad and var_Campesino,
#               var_Subvencion and var_Exportacion]

if  (((any(var in entrada for var in var_Practica) and any(var in entrada for var in var_Comercio) and
    any(var in entrada for var in var_Injusticia)) or (any(var in entrada for var in var_Libertad) and
    any(var in entrada for var in var_Competencia)) or (any(var in entrada for var in var_Reducir) and
    any(var in entrada for var in var_Exportacion)) or any(var in entrada for var in var_Monopolio) or
    (any(var in entrada for var in var_AlzaUnilateral) and any(var in entrada for var in var_Precio))
    and any(var in entrada for var in var_Alimentos)) or
    ((any(var in entrada for var in var_Distorsion) and any(var in entrada for var in var_Comercio) and
    any(var in entrada for var in var_Mercado)) or (any(var in entrada for var in var_Subvencion) and
    any(var in entrada for var in var_Perjudicial)) and any(var in entrada for var in var_Agricultura)) or
    (any(var in entrada for var in var_Mercado) and any(var in entrada for var in var_Igualdad) and
    any(var in entrada for var in var_Campesino)) or
    (any(var in entrada for var in var_Subvencion) and any(var in entrada for var in var_Exportacion))):
    Meta_2_7 = True
    print("Meta 2.7: Corregir y prevenir las restricciones y distorsiones comerciales en los mercados agropecuarios mundiales, incluso mediante la eliminacion paralela de todas las formas de subvencion a las exportaciones agricolas y todas las medidas de exportacion con efectos equivalentes, de conformidad con el mandato de la Ronda de Doha para el Desarrollo");
else:
    Meta_2_7 = False

#   ("ALGORITMO META 2.8")
# Meta_2_8 =    [var_Distribucion or (var_Informacion and var_Mercado) or var_Suministro or (var_Ley and var_Mercado)
#               or var_Precio or var_Valor and var_Alimentos]

if  ((any(var in entrada for var in var_Distribucion) or (any(var in entrada for var in var_Informacion) and
    any(var in entrada for var in var_Mercado)) or any(var in entrada for var in var_Suministro) or
    (any(var in entrada for var in var_Ley) and any(var in entrada for var in var_Mercado)) or
    any(var in entrada for var in var_Precio) or any(var in entrada for var in var_Valor)) and
    any(var in entrada for var in var_Alimentos)):
    Meta_2_8 = True
    print("Meta 2.8: Adoptar medidas para asegurar el buen funcionamiento de los mercados de productos basicos alimentarios y sus derivados y facilitar el acceso oportuno a la informacion sobre los mercados, incluso sobre las reservas de alimentos, a fin de ayudar a limitar la extrema volatilidad de los precios de los alimentos");
else:
    Meta_2_8 = False

if  (Meta_2_1 == True or Meta_2_2 == True or Meta_2_3 == True or Meta_2_4 == True or Meta_2_5 == True or Meta_2_6 == True or
    Meta_2_7 == True or Meta_2_8 == True) :
    print("ODS 2: Poner fin al hambre, lograr la seguridad alimentaria y la mejora de la nutricion y promover la agricultura sostenible")
    ODS_2 = True
else:
    ODS_2 = False

#-----------------------ALGORITMO ODS 3----------------------------------------

#   ("ALGORITMO META 3.1")
# Meta_3_1 =    [(var_Delincuencia or var_Ley or var_Terapia) and var_Aborto,
#               (var_Especial or var_Problema) and var_Parto,
#               (var_Muerte or var_Portador or var_Problema) and var_Embarazo,
#               var_Muerte and var_Materna]

if  (((any(var in entrada for var in var_Delincuencia) or any(var in entrada for var in var_Ley) or
    any(var in entrada for var in var_Terapia)) and any(var in entrada for var in var_Aborto)) or
    ((any(var in entrada for var in var_Especial) or any(var in entrada for var in var_Problema)) and
    any(var in entrada for var in var_Parto)) or
    ((any(var in entrada for var in var_Muerte) or any(var in entrada for var in var_Portador) or
    any(var in entrada for var in var_Problema)) and any(var in entrada for var in var_Embarazo)) or
    (any(var in entrada for var in var_Muerte) and any(var in entrada for var in var_Materna))):
    Meta_3_1 = True
    print("Meta 3.1: De aqui a 2030, reducir la tasa mundial de mortalidad materna a menos de 70 por cada 100.000 nacidos vivos");
else:
    Meta_3_1 = False

#   ("ALGORITMO META 3.2")
# Meta_3_2 =    [var_PrimerosAuxilios or var_Asistencia and var_Pediatria,
#               var_MuerteDeNinos,
#               var_Bebe or var_Nino or var_Pediatria and var_Muerte]

if  (((any(var in entrada for var in var_PrimerosAuxilios) or any(var in entrada for var in var_Asistencia)) and
    any(var in entrada for var in var_Pediatria)) or
    any(var in entrada for var in var_MuerteDeNinos) or
    ((any(var in entrada for var in var_Bebe) or any(var in entrada for var in var_Nino) or
    any(var in entrada for var in var_Pediatria)) and  any(var in entrada for var in var_Muerte))):
    Meta_3_2 = True
    print("Meta 3.2: De aqui a 2030, poner fin a las muertes evitables de recien nacidos y de ninos menores de 5 anos, logrando que todos los paises intenten reducir la mortalidad neonatal al menos a 12 por cada 1.000 nacidos vivos y la mortalidad de los ninos menores de 5 anos al menos a 25 por cada 1.000 nacidos vivos");
else:
    Meta_3_2 = False


#   ("ALGORITMO META 3.3")
# Meta_3_3 = [(var_Medicamento or var_Evaluacion) and (var_EnfermedadesTransmisibles or var_DesastreSanitario),
#             (var_Preservativo or var_Responsabilidad or var_Habitos or var_Basura or var_Educacion or var_Salud or
#             var_Autocuidado) and var_Sexualidad,
#             var_Sistema and var_Inmunizacion]

if  (((any(var in entrada for var in var_Medicamento) or any(var in entrada for var in var_Evaluacion) or
    any(var in entrada for var in var_Prevencion)) and (any(var in entrada for var in var_EnfermedadesTransmisibles) or
    any(var in entrada for var in var_DesastreSanitario))) or
    ((any(var in entrada for var in var_Preservativo) or any(var in entrada for var in var_Responsabilidad) or
    any(var in entrada for var in var_Habitos) or any(var in entrada for var in var_Basura) or
    any(var in entrada for var in var_Educacion) or any(var in entrada for var in var_Salud) or
    any(var in entrada for var in var_Autocuidado)) and any(var in entrada for var in var_Sexualidad)) or
    (any(var in entrada for var in var_Sistema) and any(var in entrada for var in var_Inmunizacion))):
    Meta_3_3 = True
    print("Meta 3.3: De aqui a 2030, poner fin a las epidemias del SIDA, la tuberculosis, la malaria y las enfermedades tropicales desatendidas y combatir la hepatitis, las enfermedades transmitidas por el agua y otras enfermedades transmisibles");
else:
    Meta_3_3 = False

#   ("ALGORITMO META 3.4")
# Meta_3_4 =  [var_Prevencion and var_Suicidio,
#             (var_Servicio or var_Desarollar) and var_Psicologia,
#             (var_Fonoaudiologia or var_Paciente or var_Publica or var_Salud) and var_Atencion,
#             (var_Habilidad or var_Actividad) and var_Motora,
#             var_RayoUV and var_Prevencion,
#             var_RayoUV or var_Medicina and var_Operativo,
#             var_Higiene and var_Tecnica,
#             var_Evaluacion or var_Saludable or var_Ciudar and var_Anciano,
#             var_Banco and var_Sangre,
#             var_ExamenFemenino or var_Mental or var_Prevencion and var_Evaluacion,
#             var_Esqueleto and var_Musculo,
#             var_Enfermedad and var_Respiracion,
#             var_Cardio and var_Riesgo,
#             var_Teleton,
#             var_Neurologia or var_Servicio or var_Promover or var_Primaria or var_Prevencion or
#             var_Operativo or var_Mental or var_Mejorar or var_Educacion or var_Dental and var_Salud,
#             var_Higiene or var_Enfermedad or var_Ciudar and var_Dental,
#             var_RayoUV or var_Medicamento or var_Kinesiologico and var_Tratamiento,
#             var_Ayudar and var_Terapia,
#             var_Discapacidad,
#             var_Dental or var_Higiene or var_Evaluacion or var_Kinesiologico or var_Manejo
#             or var_Psicologia or var_Neurologia and var_Clinica,
#             var_Hospital or var_Medicamento or var_Paciente or var_Prevencion and (var_EnfermedadesNoTransmisibles or
#             var_DesastreSanitario), 
#             var_Ciudar and var_Salud]

if  ((any(var in entrada for var in var_Prevencion) and any(var in entrada for var in var_Suicidio)) or
    ((any(var in entrada for var in var_Servicio) or any(var in entrada for var in var_Desarollar)) and
    any(var in entrada for var in var_Psicologia)) or
    ((any(var in entrada for var in var_Fonoaudiologia) or any(var in entrada for var in var_Paciente) or
    any(var in entrada for var in var_Publica) or any(var in entrada for var in var_Salud)) and
    any(var in entrada for var in var_Atencion)) or
    ((any(var in entrada for var in var_Habilidad) or any(var in entrada for var in var_Actividad)) and
    any(var in entrada for var in var_Motora)) or
    (any(var in entrada for var in var_RayoUV) and any(var in entrada for var in var_Prevencion)) or
    ((any(var in entrada for var in var_RayoUV) or any(var in entrada for var in var_Medicina)) and
    any(var in entrada for var in var_Operativo)) or
    (any(var in entrada for var in var_Higiene) and any(var in entrada for var in var_Tecnica)) or
    ((any(var in entrada for var in var_Evaluacion) or any(var in entrada for var in var_Saludable) or 
    any(var in entrada for var in var_Ciudar)) and
    any(var in entrada for var in var_Anciano)) or
    (any(var in entrada for var in var_Banco) and any(var in entrada for var in var_Sangre)) or
    ((any(var in entrada for var in var_ExamenFemenino) or any(var in entrada for var in var_Mental) or
    any(var in entrada for var in var_Prevencion)) and any(var in entrada for var in var_Evaluacion)) or
    (any(var in entrada for var in var_Esqueleto) and any(var in entrada for var in var_Musculo)) or
    (any(var in entrada for var in var_Enfermedad) and any(var in entrada for var in var_Respiracion)) or
    (any(var in entrada for var in var_Cardio) and any(var in entrada for var in var_Riesgo)) or
    any(var in entrada for var in var_Teleton) or
    ((any(var in entrada for var in var_Neurologia) or any(var in entrada for var in var_Servicio) or
    any(var in entrada for var in var_Promover) or any(var in entrada for var in var_Primaria) or
    any(var in entrada for var in var_Prevencion) or any(var in entrada for var in var_Operativo) or
    any(var in entrada for var in var_Mental) or any(var in entrada for var in var_Mejorar) or
    any(var in entrada for var in var_Educacion) or any(var in entrada for var in var_Dental)) and
    any(var in entrada for var in var_Salud)) or
    ((any(var in entrada for var in var_Higiene) or any(var in entrada for var in var_Enfermedad) or
    any(var in entrada for var in var_Ciudar)) and any(var in entrada for var in var_Dental)) or
    ((any(var in entrada for var in var_RayoUV) or any(var in entrada for var in var_Medicamento) or
    any(var in entrada for var in var_Kinesiologico)) and any(var in entrada for var in var_Tratamiento)) or
    (any(var in entrada for var in var_Ayudar) and any(var in entrada for var in var_Terapia)) or
    any(var in entrada for var in var_Discapacidad) or
    ((any(var in entrada for var in var_Dental) or any(var in entrada for var in var_Higiene) or
    any(var in entrada for var in var_Evaluacion) or any(var in entrada for var in var_Kinesiologico) or
    any(var in entrada for var in var_Manejo) or any(var in entrada for var in var_Psicologia) or
    any(var in entrada for var in var_Neurologia)) and any(var in entrada for var in var_Clinica)) or
    ((any(var in entrada for var in var_Hospital) or any(var in entrada for var in var_Medicamento) or
    any(var in entrada for var in var_Paciente) or any(var in entrada for var in var_Evaluacion) or
    any(var in entrada for var in var_Prevencion)) and any(var in entrada for var in var_EnfermedadesNoTransmisibles)) or
    (any(var in entrada for var in var_Ciudar)) and any(var in entrada for var in var_Salud)):
    Meta_3_4 = True
    print("Meta 3.4: De aqui a 2030, reducir en un tercio la mortalidad prematura por enfermedades no transmisibles mediante su prevencion y tratamiento, y promover la salud mental y el bienestar");
else:
    Meta_3_4 = False


#   ("ALGORITMO META 3.5")
# Meta_3_5 = [var_Alcohol,
#             var_Droga,
#             var_Senda]

if  (any(var in entrada for var in var_Alcohol) or
    any(var in entrada for var in var_Droga) or
    any(var in entrada for var in var_Senda)):
    Meta_3_5 = True
    print("Meta 3.5: Fortalecer la prevencion y el tratamiento del abuso de sustancias adictivas, incluido el uso indebido de estupefacientes y el consumo nocivo de alcohol");
else:
    Meta_3_5 = False


#   ("ALGORITMO META 3.6")
# Meta_3_6 = [var_Auto or var_Vial and var_Emergencia,
#             var_Colision and var_Auto,
#             var_Conductor and var_Alcohol,
#             var_Alcolemia,
#             var_Narcotest]

if  (((any(var in entrada for var in var_Auto) or any(var in entrada for var in var_Vial)) and
    any(var in entrada for var in var_Emergencia)) or
    (any(var in entrada for var in var_Colision) and any(var in entrada for var in var_Auto)) or
    (any(var in entrada for var in var_Conductor) and any(var in entrada for var in var_Alcohol)) or
    any(var in entrada for var in var_Alcolemia) or
    any(var in entrada for var in var_Narcotest)):
    Meta_3_6 = True
    print("Meta 3.6: De aqui a 2020, reducir a la mitad el numero de muertes y lesiones causadas por accidentes de trafico en el mundo");
else:
    Meta_3_6 = False

#   ("ALGORITMO META 3.7")
# Meta_3_7 = [(var_Salud or var_Autocuidado or var_Vida or var_Anciano or var_Deber or var_Derecho or
#             var_Educacion or var_Saludable or var_Responsabilidad) and var_Sexualidad,
#             (var_Derecho or var_Deber) and var_Reproduccion,
#             var_Metodo and var_Preservativo,
#             var_Prevencion or var_Joven and var_Embarazo,
#             var_Plan and var_Familia]

if  (((any(var in entrada for var in var_Salud) or any(var in entrada for var in var_Autocuidado) or
    any(var in entrada for var in var_Vida) or any(var in entrada for var in var_Anciano) or
    any(var in entrada for var in var_Deber) or any(var in entrada for var in var_Derecho) or
    any(var in entrada for var in var_Educacion) or any(var in entrada for var in var_Saludable) or
    any(var in entrada for var in var_Responsabilidad)) and any(var in entrada for var in var_Sexualidad)) or
    ((any(var in entrada for var in var_Derecho) or any(var in entrada for var in var_Deber)) and
    any(var in entrada for var in var_Reproduccion)) or
    (any(var in entrada for var in var_Metodo) and  any(var in entrada for var in var_Preservativo)) or
    ((any(var in entrada for var in var_Prevencion) or any(var in entrada for var in var_Joven)) and
    any(var in entrada for var in var_Embarazo)) or
    (any(var in entrada for var in var_Plan) and  any(var in entrada for var in var_Familia))):
    Meta_3_7 = True
    print("Meta 3.7: De aqui a 2030, garantizar el acceso universal a los servicios de salud sexual y reproductiva, incluidos los de planificacion familiar, informacion y educacion, y la integracion de la salud reproductiva en las estrategias y los programas nacionales");
else:
    Meta_3_7 = False

#   ("ALGORITMO META 3.8")
# Meta_3_8 =    [(var_Cobertura and var_Servicio) or var_Gasto or var_Desigualdad or (var_Brecha and var_Economia) and var_Salud,
#               (var_Gasto or var_Precio) and var_Medicamento,
#               (var_Cobertura and var_Universal) or var_Igualdad and var_Sanitario]

if  ((((any(var in entrada for var in var_Cobertura) and any(var in entrada for var in var_Servicio)) or
    any(var in entrada for var in var_Gasto) or any(var in entrada for var in var_Desigualdad) or
    (any(var in entrada for var in var_Brecha) and any(var in entrada for var in var_Economia))) and
    any(var in entrada for var in var_Salud)) or
    ((any(var in entrada for var in var_Gasto) or any(var in entrada for var in var_Precio)) and
    any(var in entrada for var in var_Medicamento)) or
    (((any(var in entrada for var in var_Cobertura) and any(var in entrada for var in var_Universal)) or
    any(var in entrada for var in var_Igualdad)) and any(var in entrada for var in var_Sanitario))):
    Meta_3_8 = True
    print("Meta 3.8: Lograr la cobertura sanitaria universal, incluida la proteccion contra los riesgos financieros, el acceso a servicios de salud esenciales de calidad y el acceso a medicamentos y vacunas inocuos, eficaces, asequibles y de calidad para todos");
else:
    Meta_3_8 = False

#   ("ALGORITMO META 3.9")
# Meta_3_9 = [(var_Vivienda or var_Muerte or var_Salud or var_Enfermedad) and var_Contaminacion,
#             (var_Basura or var_Humo) and var_Enfermedad,
#             var_Externalidad and var_Ambiente and var_Negativo,
#             var_Impacto and var_Confiable and var_Aire and var_Salud]

if  (((any(var in entrada for var in var_Vivienda) or any(var in entrada for var in var_Muerte) or
    any(var in entrada for var in var_Salud) or any(var in entrada for var in var_Enfermedad)) and
    any(var in entrada for var in var_Contaminacion)) or
    ((any(var in entrada for var in var_Basura) or any(var in entrada for var in var_Humo)) and
    any(var in entrada for var in var_Enfermedad)) or
    (any(var in entrada for var in var_Externalidad) and any(var in entrada for var in var_Ambiente) and
    any(var in entrada for var in var_Negativo)) or
    (any(var in entrada for var in var_Impacto) and any(var in entrada for var in var_Confiable) and
    any(var in entrada for var in var_Aire) and any(var in entrada for var in var_Salud))):
    Meta_3_9 = True
    print("Meta 3.9: De aqui a 2030, reducir considerablemente el numero de muertes y enfermedades causadas por productos quimicos peligrosos y por la polucion y contaminacion del aire, el agua y el suelo");
else:
    Meta_3_9 = False

#   ("ALGORITMO META 3.10")
# Meta_3_10 = [var_Tabaquismo]

if any(var in entrada for var in var_Tabaquismo):
    Meta_3_10 = True
    print("Meta 3.10: Fortalecer la aplicacion del Convenio Marco de la Organizacion Mundial de la Salud para el Control del Tabaco en todos los paises, segun proceda");
else:
    Meta_3_10 = False

#   ("ALGORITMO META 3.11")
# Meta_3_11 =   [var_EnfermedadesTransmisibles or var_Personas or var_Poblacion or var_Programa or var_Acceso or
#               var_Investigacion or var_Desarollar and var_Medicamento,
#               var_Medicina or var_Salud and var_Investigacion,
#               var_Innovacion and var_Salud,
#               var_Persona and var_Inmunizacion]

if  (((any(var in entrada for var in var_EnfermedadesTransmisibles) or any(var in entrada for var in var_Persona) or
    any(var in entrada for var in var_Poblacion) or any(var in entrada for var in var_Programa) or
    any(var in entrada for var in var_Acceso) or any(var in entrada for var in var_Investigacion) or
    any(var in entrada for var in var_Desarollar)) and any(var in entrada for var in var_Medicamento)) or
    ((any(var in entrada for var in var_Investigacion) or any(var in entrada for var in var_Desarollar)) and
    any(var in entrada for var in var_Medicamento)) or
    ((any(var in entrada for var in var_Medicina) or any(var in entrada for var in var_Salud)) and
    any(var in entrada for var in var_Investigacion)) or
    (any(var in entrada for var in var_Innovacion) and any(var in entrada for var in var_Salud)) or
    (any(var in entrada for var in var_Persona) and any(var in entrada for var in var_Inmunizacion))):
    Meta_3_11 = True
    print("Meta 3.11: Apoyar las actividades de investigacion y desarrollo de vacunas y medicamentos contra las enfermedades transmisibles y no transmisibles que afectan primordialmente a los paises en desarrollo y facilitar el acceso a medicamentos y vacunas esenciales asequibles de conformidad con la Declaracion relativa al Acuerdo sobre los Aspectos de los Derechos de Propiedad Intelectual Relacionados con el Comercio y la Salud Publica, en la que se afirma el derecho de los paises en desarrollo a utilizar al maximo las disposiciones del Acuerdo sobre los Aspectos de los Derechos de Propiedad Intelectual Relacionados con el Comercio respecto a la flexibilidad para proteger la salud publica y, en particular, proporcionar acceso a los medicamentos para todos");
else:
    Meta_3_11 = False

#   ("ALGORITMO META 3.12")
# Meta_3_12 =   [(var_Imagen or var_Salud) and var_Capacitar,
#               (var_Sanitario or var_Rehabilitar or var_Medicina or var_Inmunizacion or var_Dental) and var_Taller,
#               (var_Kinesiologico or var_EnfermedadesTransmisibles) and var_Curso,
#               ((var_Nuevo and var_Rehabilitar) or (var_Inmunizacion and var_Nuevo)) and var_Tecnica,
#               (var_Trastorno or var_Inmunizacion or var_Nutricional or var_EnfermedadesNoTransmisibles or var_Laboratorio or
#               (var_Informacion and var_Torax) or (var_Informacion and var_Diagnostico) or var_Enfermedad) and var_Actualizacion,
#               (var_Salud or var_Mental) and var_Charla]

if  (((any(var in entrada for var in var_Imagen) or any(var in entrada for var in var_Salud)) and
    any(var in entrada for var in var_Capacitar)) or
    ((any(var in entrada for var in var_Sanitario) or any(var in entrada for var in var_Rehabilitar) or
    any(var in entrada for var in var_Medicina) or any(var in entrada for var in var_Inmunizacion) or
    any(var in entrada for var in var_Dental)) and any(var in entrada for var in var_Taller)) or
    ((any(var in entrada for var in var_Kinesiologico) or any(var in entrada for var in var_EnfermedadesTransmisibles)) and
    any(var in entrada for var in var_Curso)) or
    (((any(var in entrada for var in var_Nuevo) and any(var in entrada for var in var_Rehabilitar)) or
    (any(var in entrada for var in var_Inmunizacion) and any(var in entrada for var in var_Nuevo))) and
    any(var in entrada for var in var_Tecnica)) or
    ((any(var in entrada for var in var_Trastorno) or any(var in entrada for var in var_Inmunizacion) or
    any(var in entrada for var in var_Nutricional) or any(var in entrada for var in var_EnfermedadesNoTransmisibles) or
    any(var in entrada for var in var_Laboratorio) or
    (any(var in entrada for var in var_Informacion) and any(var in entrada for var in var_Torax)) or
    (any(var in entrada for var in var_Informacion) and any(var in entrada for var in var_Diagnostico)) or
    any(var in entrada for var in var_Enfermedad)) and any(var in entrada for var in var_Actualizacion)) or
    ((any(var in entrada for var in var_Salud) or any(var in entrada for var in var_Mental)) and
    any(var in entrada for var in var_Charla))):
    Meta_3_12 = True
    print("Meta 3.12: Aumentar considerablemente la financiacion de la salud y la contratacion, el perfeccionamiento, la capacitacion y la retencion del personal sanitario en los paises en desarrollo, especialmente en los paises menos adelantados y los pequenos Estados insulares en desarrollo");
else:
    Meta_3_12 = False

#   ("ALGORITMO META 3.13")
# Meta_3_13 =   (var_Zona or (var_Salud and var_Ocupacional) or var_Condicion) and var_Proteccion,
#               (var_Capacitar and var_Prevencion) or var_Reducir and var_Riesgo,
#               (var_Simulacro or var_Manejo or var_Estudiante or var_Situacion or var_Prevencion or var_Plan) and var_Emergencia,
#               var_PrimerosAuxilios,
#               var_Simulacro and var_Evacuacion]

if  (((any(var in entrada for var in var_Zona) or (any(var in entrada for var in var_Salud) and
    any(var in entrada for var in var_Ocupacional)) or any(var in entrada for var in var_Condicion)) and
    any(var in entrada for var in var_Proteccion)) or
    (((any(var in entrada for var in var_Capacitar) and any(var in entrada for var in var_Prevencion)) or
    any(var in entrada for var in var_Reducir)) and any(var in entrada for var in var_Riesgo)) or
    ((any(var in entrada for var in var_Simulacro) or any(var in entrada for var in var_Manejo) or
    any(var in entrada for var in var_Estudiante) or any(var in entrada for var in var_Situacion) or
    any(var in entrada for var in var_Prevencion) or any(var in entrada for var in var_Plan)) and
    any(var in entrada for var in var_Emergencia)) or
    any(var in entrada for var in var_PrimerosAuxilios) or
    (any(var in entrada for var in var_Simulacro) and any(var in entrada for var in var_Evacuacion))):
    Meta_3_13 = True
    print("Meta 3.13: Reforzar la capacidad de todos los paises, en particular los paises en desarrollo, en materia de alerta temprana, reduccion de riesgos y gestion de los riesgos para la salud nacional y mundial");
else:
    Meta_3_13 = False

if  (Meta_3_1 == True or Meta_3_2 == True or Meta_3_3 == True or Meta_3_4 == True or Meta_3_5 == True or Meta_3_6 == True or
    Meta_3_7 == True or Meta_3_8 == True or Meta_3_9 == True or Meta_3_10 == True or Meta_3_11 == True or Meta_3_12 == True or
    Meta_3_13 == True) :
    print("ODS 3: Garantizar una vida sana y promover el bienestar de todos a todas las edades")
    ODS_3 = True
else:
    ODS_3 = False


#-----------------------ALGORITMO ODS 4----------------------------------------

#   ("ALGORITMO META 4.1")
# Meta_4_1 =    [(var_Confiable or var_Gratuidad or (var_Finalizacion and var_Estudiante)) and var_Educacion,
#               (var_HabilidadesEducativas or var_Desercion or var_Refuerzo or var_Reunion) and var_Estudiante,
#               var_Matricula and var_Secundaria]

if  (((any(var in entrada for var in var_Confiable) or any(var in entrada for var in var_Gratuidad) or (
    any(var in entrada for var in var_Finalizacion)) and any(var in entrada for var in var_Estudiante)) and any(var in entrada for var in var_Educacion)) or
    ((any(var in entrada for var in var_HabilidadesEducativas) or any(var in entrada for var in var_Desercion) or
    any(var in entrada for var in var_Refuerzo) or any(var in entrada for var in var_Reunion)) and
    any(var in entrada for var in var_Estudiante)) or
    (any(var in entrada for var in var_Matricula) and any(var in entrada for var in var_Secundaria))):
    Meta_4_1 = True
    print("Meta 4.1: De aqui a 2030, asegurar que todas las ninas y todos los ninos terminen la ensenanza primaria y secundaria, que ha de ser gratuita, equitativa y de calidad y producir resultados de aprendizaje pertinentes y efectivos");
else:
    Meta_4_1 = False


#   ("ALGORITMO META 4.2")
# Meta_4_2 = [var_Sala and var_Cuna,
#             var_HabilidadesEducativas or var_Jardin and var_Nino,
#             var_Inicial or var_Primaria or var_Parvulo and var_Educacion,
#             var_Segundo or var_Primer and var_Ciclo,
#             var_Kinder]

if  ((any(var in entrada for var in var_Sala) and any(var in entrada for var in var_Cuna)) or
    ((any(var in entrada for var in var_HabilidadesEducativas) or any(var in entrada for var in var_Jardin)) and
    any(var in entrada for var in var_Nino)) or
    ((any(var in entrada for var in var_Inicial) or any(var in entrada for var in var_Primaria) or
    any(var in entrada for var in var_Parvulo)) and any(var in entrada for var in var_Educacion)) or
    ((any(var in entrada for var in var_Segundo) or any(var in entrada for var in var_Primer)) and
    any(var in entrada for var in var_Ciclo)) or
    any(var in entrada for var in var_Kinder)):
    Meta_4_2 = True
    print("Meta 4.2: De aqui a 2030, asegurar que todas las ninas y todos los ninos tengan acceso a servicios de atencion y desarrollo en la primera infancia y educacion preescolar de calidad, a fin de que esten preparados para la ensenanza primaria");
else:
    Meta_4_2 = False

#   ("ALGORITMO META 4.3")
# Meta_4_3 =  [var_Estudiante or var_Academia and var_Desercion,
#             var_Beneficio or var_Experiencia and (var_Educacion and var_Superior),
#             var_Universidad or (var_Educacion and var_Profesion) or (var_Educacion and var_Tecnica) and var_Acceso,
#             var_Charla and var_Vocacion,
#             var_Bajo and var_Matricula and var_Universidad]

if  (((any(var in entrada for var in var_Estudiante) or any(var in entrada for var in var_Academia)) and
    any(var in entrada for var in var_Desercion)) or
    ((any(var in entrada for var in var_Beneficio) or  any(var in entrada for var in var_Experiencia)) and
    (any(var in entrada for var in var_Educacion) and any(var in entrada for var in var_Superior))) or
    ((any(var in entrada for var in var_Universidad) or (any(var in entrada for var in var_Educacion) and
    any(var in entrada for var in var_Profesion)) or (any(var in entrada for var in var_Educacion) and
    any(var in entrada for var in var_Tecnica))) and any(var in entrada for var in var_Acceso)) or
    (any(var in entrada for var in var_Charla) and any(var in entrada for var in var_Vocacion)) or
    (any(var in entrada for var in var_Bajo) and any(var in entrada for var in var_Matricula) and
    any(var in entrada for var in var_Universidad))):
    Meta_4_3 = True
    print("Meta 4.3: De aqui a 2030, asegurar el acceso igualitario de todos los hombres y las mujeres a una formacion tecnica, profesional y superior de calidad, incluida la ensenanza universitaria");
else:
    Meta_4_3 = False

#   ("ALGORITMO META 4.4")
# Meta_4_4 =    [(var_Mejorar or var_Fortalecimiento or var_Complementar) and var_Competencia,
#               (var_Fortalecimiento or var_Capacitar) and var_Estudiante,
#               (var_Informacion or var_Habilidad or var_Competencia) and (var_Estudiante and var_Desarollar),
#               (var_Financiamiento or var_Economia or var_Continuar) and var_Educacion,
#               (var_Investigacion or var_Taller or var_Capacidad) and var_Emprendimiento,
#               (var_Insercion or var_Mundo) and var_Laboral,
#               (var_Estudiante or var_Contribucion) and var_Formacion,
#               (var_Entrega or var_Ciencia or (var_Ingenieria and var_Escuela)) and var_Informacion,
#               (var_Generacion and var_Sentido) and var_Criticar,
#               (var_Mejorar or var_Importancia) and var_HabilidadesEducativas,
#               var_Entrega and var_Herramienta,
#               var_Acceso and var_Ingenieria and var_Escuela,
#               var_Construccion and var_Argumento,
#               var_Presentacion and var_Eficiente]

if  (((any(var in entrada for var in var_Mejorar) or any(var in entrada for var in var_Fortalecimiento) or
    any(var in entrada for var in var_Complementar)) and any(var in entrada for var in var_Competencia)) or
    ((any(var in entrada for var in var_Fortalecimiento) or
    any(var in entrada for var in var_Capacitar)) and any(var in entrada for var in var_Estudiante)) or
    ((any(var in entrada for var in var_Informacion) or any(var in entrada for var in var_Habilidad) or
    any(var in entrada for var in var_Competencia)) and (any(var in entrada for var in var_Estudiante) and
    any(var in entrada for var in var_Desarollar))) or
    ((any(var in entrada for var in var_Financiamiento) or any(var in entrada for var in var_Economia) or
    any(var in entrada for var in var_Continuar)) and any(var in entrada for var in var_Educacion)) or
    ((any(var in entrada for var in var_Investigacion) or any(var in entrada for var in var_Taller) or
    any(var in entrada for var in var_Capacidad)) and any(var in entrada for var in var_Emprendimiento)) or
    ((any(var in entrada for var in var_Insercion) or any(var in entrada for var in var_Mundo)) and
    any(var in entrada for var in var_Laboral)) or
    ((any(var in entrada for var in var_Estudiante) or any(var in entrada for var in var_Contribucion)) and
    any(var in entrada for var in var_Formacion)) or
    ((any(var in entrada for var in var_Entrega) or any(var in entrada for var in var_Ciencia) or
    (any(var in entrada for var in var_Ingenieria) and any(var in entrada for var in var_Escuela))) and
    any(var in entrada for var in var_Informacion)) or
    ((any(var in entrada for var in var_Generacion) or any(var in entrada for var in var_Sentido)) and
    any(var in entrada for var in var_Criticar)) or
    ((any(var in entrada for var in var_Mejorar) or any(var in entrada for var in var_Importancia)) and
    any(var in entrada for var in var_HabilidadesEducativas)) or
    (any(var in entrada for var in var_Entrega) and any(var in entrada for var in var_Herramienta)) or
    (any(var in entrada for var in var_Acceso) and any(var in entrada for var in var_Ingenieria) and
    any(var in entrada for var in var_Escuela)) or
    (any(var in entrada for var in var_Construccion) and any(var in entrada for var in var_Argumento)) or
    (any(var in entrada for var in var_Presentacion) and any(var in entrada for var in var_Eficiente))):
    Meta_4_4 = True
    print("Meta 4.4: De aqui a 2030, aumentar considerablemente el numero de jovenes y adultos que tienen las competencias necesarias, en particular tecnicas y profesionales, para acceder al empleo, el trabajo decente y el emprendimiento");
else:
    Meta_4_4 = False

#   ("ALGORITMO META 4.5")
# Meta_4_5 =    [var_Estudiante or var_Pedagogia or var_Psicoeducacion and var_EnfermedadesNoTransmisibles,
#               var_Estudiante or var_Educacion and var_Inclusion,
#               var_Educacion or var_Pedagogia and var_Discapacidad,
#               (var_Bajo and var_Ingreso) or (var_Jardin and var_Nino) or var_Educacion or var_Kinder or var_Escuela and
#               var_HabilidadesEducativas,
#               (var_No and var_Laboratorio) or var_Especial and var_Escuela,
#               (var_Poblacion and var_Penal) or var_Educacion and var_Inmigracion,
#               var_Reos and var_Socioeducativo,
#               var_Pedagogia and var_Trastorno,
#               var_Biblioteca and var_Campamento,
#               var_Necesidad and var_Educacion and var_Transitorio,
#               var_NEE]

if  (((any(var in entrada for var in var_Estudiante) or any(var in entrada for var in var_Pedagogia) or
    any(var in entrada for var in var_Psicoeducacion)) and any(var in entrada for var in var_EnfermedadesNoTransmisibles)) or
    ((any(var in entrada for var in var_Estudiante) or any(var in entrada for var in var_Educacion)) and
    any(var in entrada for var in var_Inclusion)) or
    ((any(var in entrada for var in var_Educacion) or any(var in entrada for var in var_Pedagogia)) and
    any(var in entrada for var in var_Discapacidad)) or
    (((any(var in entrada for var in var_Bajo) and any(var in entrada for var in var_Ingreso)) or
    (any(var in entrada for var in var_Jardin) and any(var in entrada for var in var_Nino)) or
    any(var in entrada for var in var_Educacion) or any(var in entrada for var in var_Kinder) or
    any(var in entrada for var in var_Escuela)) and any(var in entrada for var in var_HabilidadesEducativas)) or
    (((any(var in entrada for var in var_No) and any(var in entrada for var in var_Laboratorio)) or
    any(var in entrada for var in var_Especial)) and any(var in entrada for var in var_Escuela)) or
    (((any(var in entrada for var in var_Poblacion) and any(var in entrada for var in var_Penal)) or
    any(var in entrada for var in var_Educacion)) and any(var in entrada for var in var_Inmigracion)) or
    (any(var in entrada for var in var_Reos) and any(var in entrada for var in var_Socioeducativo)) or
    (any(var in entrada for var in var_Pedagogia) and any(var in entrada for var in var_Trastorno)) or
    (any(var in entrada for var in var_Biblioteca) and any(var in entrada for var in var_Campamento)) or
    (any(var in entrada for var in var_Necesidad) and any(var in entrada for var in var_Educacion) and
    any(var in entrada for var in var_Transitorio)) or
    any(var in entrada for var in var_NEE)):
    Meta_4_5 = True
    print("Meta 4.5: De aqui a 2030, eliminar las disparidades de genero en la educacion y asegurar el acceso igualitario a todos los niveles de la ensenanza y la formacion profesional para las personas vulnerables, incluidas las personas con discapacidad, los pueblos indigenas y los ninos en situaciones de vulnerabilidad");
else:
    Meta_4_5 = False

#   ("ALGORITMO META 4.6")
# Meta_4_6 = [var_CreceChile,
#             var_Educacion and var_Anciano,
#             var_Escuela and var_Adulto,
#             (var_Adulto or var_ContigoAprendo or var_Anciano) and var_HabilidadesEducativas]

if  (any(var in entrada for var in var_CreceChile) or
    (any(var in entrada for var in var_Educacion) and any(var in entrada for var in var_Anciano)) or
    (any(var in entrada for var in var_Escuela) and any(var in entrada for var in var_Adulto)) or
    ((any(var in entrada for var in var_Adulto) or any(var in entrada for var in var_ContigoAprendo) or
    any(var in entrada for var in var_Anciano)) and any(var in entrada for var in var_HabilidadesEducativas))):
    Meta_4_6 = True
    print("Meta 4.6: De aqui a 2030, asegurar que todos los jovenes y una proporcion considerable de los adultos, tanto hombres como mujeres, esten alfabetizados y tengan nociones elementales de aritmetica");
else:
    Meta_4_6 = False

#   ("ALGORITMO META 4.7")
# Meta_4_7 =    [var_Serie or var_Educacion or var_Escuela and var_Ambiente,
#               var_Estudiante or var_Escuela or var_Pedagogia and var_ODS,
#               var_Educacion or var_Estudiante and (var_Desarollar and var_Sostenible),
#               var_Estudiante and var_Igualdad and var_Genero]

if  (((any(var in entrada for var in var_Serie) or any(var in entrada for var in var_Educacion) or
    any(var in entrada for var in var_Escuela)) and any(var in entrada for var in var_Ambiente)) or
    ((any(var in entrada for var in var_Estudiante) or any(var in entrada for var in var_Escuela) or
    any(var in entrada for var in var_Pedagogia)) and any(var in entrada for var in var_ODS)) or
    ((any(var in entrada for var in var_Educacion) or any(var in entrada for var in var_Estudiante)) and
    (any(var in entrada for var in var_Desarollar) and any(var in entrada for var in var_Sostenible))) or
    ((any(var in entrada for var in var_Estudiante) and any(var in entrada for var in var_Igualdad)) and
    any(var in entrada for var in var_Genero))):
    Meta_4_7 = True
    print("Meta 4.7: De aqui a 2030, asegurar que todos los alumnos adquieran los conocimientos teoricos y practicos necesarios para promover el desarrollo sostenible, entre otras cosas mediante la educacion para el desarrollo sostenible y los estilos de vida sostenibles, los derechos humanos, la igualdad de genero, la promocion de una cultura de paz y no violencia, la ciudadania mundial y la valoracion de la diversidad cultural y la contribucion de la cultura al desarrollo sostenible");
else:
    Meta_4_7 = False

#   ("ALGORITMO META 4.8")
# Meta_4_8 =    [(var_PrimerosAuxilios or var_Emergencia or var_Convivencia or var_Violencia) and var_Estudiante,
#               var_Transexual and var_Nino,
#               var_Emergencia and var_Kinder,
#               var_Jardin and var_Nino and var_PrimerosAuxilios,
#               var_Bulling]

if  (((any(var in entrada for var in var_PrimerosAuxilios) or any(var in entrada for var in var_Emergencia) or
    any(var in entrada for var in var_Convivencia) or any(var in entrada for var in var_Violencia)) and
    any(var in entrada for var in var_Estudiante)) or
    (any(var in entrada for var in var_Transexual) and any(var in entrada for var in var_Nino)) or
    (any(var in entrada for var in var_Emergencia) and any(var in entrada for var in var_Kinder)) or
    (any(var in entrada for var in var_Jardin) and any(var in entrada for var in var_Nino) and
    any(var in entrada for var in var_PrimerosAuxilios)) or
    any(var in entrada for var in var_Bulling)):
    Meta_4_8 = True
    print("Meta 4.8: Construir y adecuar instalaciones educativas que tengan en cuenta las necesidades de los ninos y las personas con discapacidad y las diferencias de genero, y que ofrezcan entornos de aprendizaje seguros, no violentos, inclusivos y eficaces para todos");
else:
    Meta_4_8 = False

#   ("ALGORITMO META 4.9")
# Meta_4_9 =    [var_Conicyt or (var_Estudiante and var_Intercambio) or (var_Estudiante and var_Extranjero) and var_Beca,
#               var_Educacion or (var_Experiencia and var_Universidad) and var_Internacional,
#               var_Postgrado or (var_Financiamiento and var_Educacion) and var_Extranjero,
#               var_Movilizacion and var_Estudiante]

if  (((any(var in entrada for var in var_Conicyt) or (any(var in entrada for var in var_Estudiante) and
    any(var in entrada for var in var_Intercambio)) or (any(var in entrada for var in var_Estudiante) and
    any(var in entrada for var in var_Extranjero))) and any(var in entrada for var in var_Beca)) or
    ((any(var in entrada for var in var_Educacion) or (any(var in entrada for var in var_Experiencia) and
    any(var in entrada for var in var_Universidad))) and any(var in entrada for var in var_Internacional)) or
    ((any(var in entrada for var in var_Postgrado) or (any(var in entrada for var in var_Financiamiento) and
    any(var in entrada for var in var_Educacion))) and any(var in entrada for var in var_Extranjero)) or
    (any(var in entrada for var in var_Movilizacion) and any(var in entrada for var in var_Estudiante))):
    Meta_4_9 = True
    print("Meta 4.9: De aqui a 2020, aumentar considerablemente a nivel mundial el numero de becas disponibles para los paises en desarrollo, en particular los paises menos adelantados, los pequenos Estados insulares en desarrollo y los paises africanos, a fin de que sus estudiantes puedan matricularse en programas de ensenanza superior, incluidos programas de formacion profesional y programas tecnicos, cientificos, de ingenieria y de tecnologia de la informacion y las comunicaciones, de paises desarrollados y otros paises  en desarrollo");
else:
    Meta_4_9 = False

#   ("ALGORITMO META 4.10")
# Meta_4_10 =   [(var_Entrenar or var_Herramienta or var_Evaluacion or var_Taller or var_Certificado or var_Practica) and var_Pedagogia,
#               var_Bueno and var_Practica and var_Estudiante,
#               var_Capacitar and var_Psicoeducacion]

if  (((any(var in entrada for var in var_Entrenar) or any(var in entrada for var in var_Herramienta) or
    any(var in entrada for var in var_Evaluacion) or any(var in entrada for var in var_Taller) or
    any(var in entrada for var in var_Certificado) or any(var in entrada for var in var_Practica)) and
    any(var in entrada for var in var_Bueno)) or
    (any(var in entrada for var in var_Bueno) and any(var in entrada for var in var_Practica) and
    any(var in entrada for var in var_Estudiante)) or
    (any(var in entrada for var in var_Capacitar) and any(var in entrada for var in var_Psicoeducacion))):
    Meta_4_10 = True
    print("Meta 4.10: De aqui a 2030, aumentar considerablemente la oferta de docentes calificados, incluso mediante la cooperacion internacional para la formacion de docentes en los paises en desarrollo, especialmente los paises menos adelantados y los pequenos Estados insulares en desarrollo");
else:
    Meta_4_10 = False

if  (Meta_4_1 == True or Meta_4_2 == True or Meta_4_3 == True or Meta_4_4 == True or Meta_4_5 == True or Meta_4_6 == True or
    Meta_4_7 == True or Meta_4_8 == True or Meta_4_9 == True or Meta_4_10 == True) :
    print("ODS 4: Garantizar una educacion inclusiva y equitativa de calidad y promover oportunidades de aprendizaje permanente para todos")
    ODS_4 = True
else:
    ODS_4 = False

#-----------------------ALGORITMO ODS 5----------------------------------------

#   ("ALGORITMO META 5.1")
# Meta_5_1 =    [var_Igualdad and var_Derecho,
#               (var_Discriminacion or var_Libertad or var_Pobre or var_Derecho) and var_Mujer,
#               (var_Educacion or var_Discriminacion or var_Derecho or var_Enfoque or var_Igualdad) and var_Genero]

if  ((any(var in entrada for var in var_Igualdad) and any(var in entrada for var in var_Derecho)) or
    ((any(var in entrada for var in var_Discriminacion) or any(var in entrada for var in var_Libertad) or
    any(var in entrada for var in var_Pobre) or any(var in entrada for var in var_Derecho)) and
    any(var in entrada for var in var_Mujer)) or
    ((any(var in entrada for var in var_Educacion) or any(var in entrada for var in var_Discriminacion) or
    any(var in entrada for var in var_Derecho) or any(var in entrada for var in var_Enfoque) or
    any(var in entrada for var in var_Igualdad)) and any(var in entrada for var in var_Genero))):
    Meta_5_1 = True
    print("Meta 5.1: Poner fin a todas las formas de discriminacion contra todas las mujeres y las ninas en todo el mundo");
else:
    Meta_5_1 = False

#   ("ALGORITMO META 5.2")
# Meta_5_2 =    [(var_Pareja or var_Matrimonio or var_Mujer or var_Genero or var_Familia or var_Sexualidad) and var_Violencia,
#               var_Acoso and var_Sexualidad,
#               var_Violencia and var_Pololeo,
#               var_ViolenciaMujer]

if  (((any(var in entrada for var in var_Pareja) or any(var in entrada for var in var_Matrimonio) or
    any(var in entrada for var in var_Mujer) or any(var in entrada for var in var_Genero) or
    any(var in entrada for var in var_Familia) or any(var in entrada for var in var_Sexualidad))
    and any(var in entrada for var in var_Violencia)) or
    (any(var in entrada for var in var_Acoso) and any(var in entrada for var in var_Sexualidad)) or
    (any(var in entrada for var in var_Violencia) and any(var in entrada for var in var_Pololeo)) or
    any(var in entrada for var in var_ViolenciaMujer)):
    Meta_5_2 = True
    print("Meta 5.2: Eliminar todas las formas de violencia contra todas las mujeres y las ninas en los ambitos publico y privado, incluidas la trata y la explotacion sexual y otros tipos de explotacion");
else:
    Meta_5_2 = False

#   ("ALGORITMO META 5.3")
# Meta_5_3 =    [(var_ViolenciaMujer or var_Obligado or var_Nino) and var_Matrimonio,
#               (var_Infanticidio or (var_ViolenciaMujer and var_Derecho) or (var_Practica and var_Dano)) and var_Mujer,
#               var_Exclavitud and var_Sexualidad,
#               var_Muerte and var_Honor,
#               var_Mutilacion and var_Genital,
#               var_Poligamia]


if  (((any(var in entrada for var in var_ViolenciaMujer) or any(var in entrada for var in var_Obligado) or
    any(var in entrada for var in var_Nino)) and any(var in entrada for var in var_Matrimonio)) or
    ((any(var in entrada for var in var_Infanticidio) or (any(var in entrada for var in var_ViolenciaMujer) and
    any(var in entrada for var in var_Derecho)) or (any(var in entrada for var in var_Practica) and
    any(var in entrada for var in var_Dano))) and any(var in entrada for var in var_Mujer)) or
    (any(var in entrada for var in var_Exclavitud) and any(var in entrada for var in var_Sexualidad)) or
    (any(var in entrada for var in var_Muerte) and any(var in entrada for var in var_Honor)) or
    (any(var in entrada for var in var_Mutilacion) and any(var in entrada for var in var_Genital)) or
    any(var in entrada for var in var_Poligamia)):
    Meta_5_3 = True
    print("Meta 5.3: Eliminar todas las practicas nocivas, como el matrimonio infantil, precoz y forzado y la mutilacion genital femenina");
else:
    Meta_5_3 = False

#   ("ALGORITMO META 5.4")
# Meta_5_4 =    [(var_Ciudar and Var_Compartir) or (var_Remuneracion and var_Laboral) or (var_Reconocer and var_Laboral) and
#               var_Domestico,
#               var_Responsabilidad and var_Compartir and var_Vivienda,
#               var_Crianza and var_Igualdad and var_Nino,
#               var_DuenaDeCasa,
#               var_Ciudadano and var_Anciano and var_Mujer]

if  ((((any(var in entrada for var in var_Ciudar) and any(var in entrada for var in var_Compartir)) or
    (any(var in entrada for var in var_Remuneracion) and any(var in entrada for var in var_Laboral)) or
    (any(var in entrada for var in var_Reconocer) and any(var in entrada for var in var_Laboral))) and
    any(var in entrada for var in var_Domestico)) or
    (any(var in entrada for var in var_Responsabilidad) and any(var in entrada for var in var_Compartir) and
    any(var in entrada for var in var_Vivienda)) or
    (any(var in entrada for var in var_Crianza) and any(var in entrada for var in var_Igualdad) and
    any(var in entrada for var in var_Nino)) or
    any(var in entrada for var in var_DuenaDeCasa) or
    (any(var in entrada for var in var_Ciudadano) and any(var in entrada for var in var_Anciano) and
    any(var in entrada for var in var_Mujer))):
    Meta_5_4 = True
    print("Meta 5.4: Reconocer y valorar los cuidados y el trabajo domestico no remunerados mediante servicios publicos, infraestructuras y politicas de proteccion social, y promoviendo la responsabilidad compartida en el hogar y la familia, segun proceda en cada pais");
else:
    Meta_5_4 = False

#   ("ALGORITMO META 5.5")
# Meta_5_5 =    [((var_Rol or var_Ley or var_Gerente or var_Mineria or var_Capacitar or var_Emprendimiento or var_Derecho 
#               or var_igualdad or var_Oportunidad or var_Economia) and (var_Mujer or var_Genero)) or
#               var_Emprendedora]

if  (((any(var in entrada for var in var_Rol) or any(var in entrada for var in var_Ley) or
    any(var in entrada for var in var_Gerente) or any(var in entrada for var in var_Mineria) or any(var in entrada for var in var_Capacitar) or 
    any(var in entrada for var in var_Emprendimiento) or any(var in entrada for var in var_Derecho) or any(var in entrada for var in var_Igualdad) or 
    any(var in entrada for var in var_Oportunidad) or any(var in entrada for var in var_Economia)) and 
    any(var in entrada for var in var_Mujer) or any(var in entrada for var in var_Genero)) or
    any(var in entrada for var in var_Emprendedora)):
    Meta_5_5 = True
    print("Meta 5.5: Asegurar la participacion plena y efectiva de las mujeres y la igualdad de oportunidades de liderazgo a todos los niveles decisorios en la vida politica, economica y publica");
else:
    Meta_5_5 = False

#   ("ALGORITMO META 5.6")
# Meta_5_6 =    [(var_Decidir and var_Informacion) or var_Deber or var_Derecho or var_Responsabilidad or var_Salud or
#               var_Educacion and var_Sexualidad,
#               (var_Salud or var_Informacion or var_Deber or var_Derecho) and var_Reproduccion,
#               var_Joven and var_Embarazo]

if  ((((any(var in entrada for var in var_Decidir) and any(var in entrada for var in var_Informacion)) or
    any(var in entrada for var in var_Deber) or any(var in entrada for var in var_Derecho) or
    any(var in entrada for var in var_Responsabilidad) or any(var in entrada for var in var_Salud) or
    any(var in entrada for var in var_Educacion)) and any(var in entrada for var in var_Sexualidad)) or
    ((any(var in entrada for var in var_Salud) or any(var in entrada for var in var_Informacion) or
    any(var in entrada for var in var_Deber) or any(var in entrada for var in var_Derecho)) and
    any(var in entrada for var in var_Reproduccion)) or
    (any(var in entrada for var in var_Joven) and any(var in entrada for var in var_Embarazo))):
    Meta_5_6 = True
    print("Meta 5.6: Asegurar el acceso universal a la salud sexual y reproductiva y los derechos reproductivos segun lo acordado de conformidad con el Programa de Accion de la Conferencia Internacional sobre la Poblacion y el Desarrollo, la Plataforma de Accion de Beijing y los documentos finales de sus conferencias de examen");
else:
    Meta_5_6 = False

#   ("ALGORITMO META 5.7")
# Meta_5_7 =    [(var_Propiedad and var_Tierra) or (var_Acceso and var_Herencia) or (var_Acceso and var_Bienes) or
#               (var_Acceso and var_Propiedad) or (var_Derecho and var_Economia) and var_Mujer,
#               (var_Plan and var_Isapre) or (var_Plan and var_AFP) or (var_Bienes and var_Matrimonio) or
#               (var_Servicio and var_Financiamiento) and var_Igualdad,
#               var_Derecho and var_Ingreso and var_Economia]

if  ((((any(var in entrada for var in var_Propiedad) and any(var in entrada for var in var_Tierra)) or
    (any(var in entrada for var in var_Acceso) and any(var in entrada for var in var_Herencia)) or
    (any(var in entrada for var in var_Acceso) and any(var in entrada for var in var_Bienes)) or
    (any(var in entrada for var in var_Acceso) and any(var in entrada for var in var_Propiedad)) or
    (any(var in entrada for var in var_Derecho) and any(var in entrada for var in var_Economia))) and
    any(var in entrada for var in var_Mujer)) or
    (((any(var in entrada for var in var_Plan) and any(var in entrada for var in var_Isapre)) or
    (any(var in entrada for var in var_Plan) and any(var in entrada for var in var_Afp)) or
    (any(var in entrada for var in var_Bienes) and any(var in entrada for var in var_Matrimonio)) or
    (any(var in entrada for var in var_Servicio) and any(var in entrada for var in var_Financiamiento))) and
    any(var in entrada for var in var_Igualdad)) or
    (any(var in entrada for var in var_Derecho) and any(var in entrada for var in var_Ingreso) and
    any(var in entrada for var in var_Economia))) :
    Meta_5_7 = True
    print("Meta 5.7: Emprender reformas que otorguen a las mujeres igualdad de derechos a los recursos economicos, asi como acceso a la propiedad y al control de la tierra y otros tipos de bienes, los servicios financieros, la herencia y los recursos naturales, de conformidad con las leyes nacionales");
else:
    Meta_5_7 = False


#   ("ALGORITMO META 5.8")
# Meta_5_8 =    [var_Periodismo or var_Director or var_Ley or var_Empoderar and var_Mujer,
#               var_Genero and var_Informatico,
#               ((var_Informatico or var_Tecnologia) or var_Informatico) and var_Nina]

if  (((any(var in entrada for var in var_Periodismo) or any(var in entrada for var in var_Director) or
    any(var in entrada for var in var_Ley) or any(var in entrada for var in var_Empoderar)) and
    any(var in entrada for var in var_Mujer)) or
    (any(var in entrada for var in var_Genero) and any(var in entrada for var in var_Informatico)) or
    (((any(var in entrada for var in var_Informacion) and any(var in entrada for var in var_Tecnologia)) or 
    any(var in entrada for var in var_Informatico)) and any(var in entrada for var in var_Nina))):
    Meta_5_8 = True
    print("Meta 5.8: Mejorar el uso de la tecnologia instrumental, en particular la tecnologia de la informacion y las comunicaciones, para promover el empoderamiento de las mujeres");
else:
    Meta_5_8 = False

#   ("ALGORITMO META 5.9")
# Meta_5_9 =    [var_ProgramaMujeres,
#               var_Ley and var_Igualdad and var_Genero,
#               var_Servicio and var_Mujer,
#               var_Sala and var_Cuna and var_Universal]

if  (any(var in entrada for var in var_ProgramaMujeres) or
    (any(var in entrada for var in var_Ley) and any(var in entrada for var in var_Igualdad) and
    any(var in entrada for var in var_Genero)) or
    (any(var in entrada for var in var_Servicio) and any(var in entrada for var in var_Mujer)) or
    (any(var in entrada for var in var_Sala) and any(var in entrada for var in var_Cuna) and
    any(var in entrada for var in var_Universal))):
    Meta_5_9 = True
    print("Meta 5.9: Aprobar y fortalecer politicas acertadas y leyes aplicables para promover la igualdad de genero y el empoderamiento de todas las mujeres y las ninas a todos los niveles");
else:
    Meta_5_9 = False

if  (Meta_5_1 == True or Meta_5_2 == True or Meta_5_3 == True or Meta_5_4 == True or Meta_5_5 == True or Meta_5_6 == True or
    Meta_5_7 == True or Meta_5_8 == True or Meta_5_9 == True) :
    print("ODS 5: Lograr la igualdad de genero y empoderar a todas  las mujeres y las nina")
    ODS_5 = True
else:
    ODS_5 = False

#-----------------------ALGORITMO ODS 6----------------------------------------

#   ("ALGORITMO META 6.1")
# Meta_6_1 =    [var_Potable or (var_Apto and var_Consumo and var_Humano) or (var_Precio and var_Consumo) or var_Sin and var_Agua,
#               var_APR]

if  (((any(var in entrada for var in var_Potable) or (any(var in entrada for var in var_Apto) and
    any(var in entrada for var in var_Consumo) and any(var in entrada for var in var_Humano)) or
    (any(var in entrada for var in var_Precio) and any(var in entrada for var in var_Consumo)) or
    any(var in entrada for var in var_Sin)) and any(var in entrada for var in var_Agua)) or
    any(var in entrada for var in var_APR)):
    Meta_6_1 = True
    print("Meta 6.1: De aqui a 2030, lograr el acceso universal y equitativo al agua potable a un precio asequible para todos");
else:
    Meta_6_1 = False

#   ("ALGORITMO META 6.2")
# Meta_6_2 =    [var_CodigoSanitario,
#               var_Ambiente or var_Agua and var_Saneamiento,
#               var_Alcantarillado,
#               var_Defecar and var_Aire and var_Libertad,
#               var_Agua and var_Residual,
#               var_AguasNegras,
#               var_PozoNegro]

if  ((any(var in entrada for var in var_CodigoSanitario)) or
    ((any(var in entrada for var in var_Ambiente) or any(var in entrada for var in var_Agua)) and
    any(var in entrada for var in var_Saneamiento)) or
    any(var in entrada for var in var_Alcantarillado) or
    (any(var in entrada for var in var_Defecar) and any(var in entrada for var in var_Aire) and
    any(var in entrada for var in var_Libertad)) or
    (any(var in entrada for var in var_Agua) and any(var in entrada for var in var_Residual)) or
    any(var in entrada for var in var_AguasNegras) or
    any(var in entrada for var in var_PozoNegro)):
    Meta_6_2 = True
    print("Meta 6.2: De aqui a 2030, lograr el acceso a servicios de saneamiento e higiene adecuados y equitativos para todos y poner fin a la defecacion al aire libre, prestando especial atencion a las necesidades de las mujeres y las ninas y las personas en situaciones de vulnerabilidad");
else:
    Meta_6_2 = False

#   ("ALGORITMO META 6.3")
# Meta_6_3 =    [var_Tratamiento or var_Residual or var_Basura or var_DesechoQuimico or var_Confiable or var_Contaminacion and var_Agua,
#               var_Contaminacion and var_Acuiferos]

if  (((any(var in entrada for var in var_Tratamiento) or any(var in entrada for var in var_Residual) or
    any(var in entrada for var in var_Basura) or any(var in entrada for var in var_DesechoQuimico) or
    any(var in entrada for var in var_Confiable) or any(var in entrada for var in var_Contaminacion)) and
    any(var in entrada for var in var_Agua)) or
    (any(var in entrada for var in var_Contaminacion) and any(var in entrada for var in var_Acuiferos))):
    Meta_6_3 = True
    print("Meta 6.3: De aqui a 2030, mejorar la calidad del agua reduciendo la contaminacion, eliminando el vertimiento y minimizando la emision de productos quimicos y materiales peligrosos, reduciendo a la mitad el porcentaje de aguas residuales sin tratar y aumentando considerablemente el reciclado y la reutilizacion sin riesgos a nivel mundial");
else:
    Meta_6_3 = False

#   ("ALGORITMO META 6.4")
# Meta_6_4 =    [(var_Consumo and var_Responsabilidad) or var_Eficiente or var_Pura or var_Acceso or var_Ciudar or
#               var_Reciclaje or var_Reducir or var_Sin or var_Extraccion or var_Importancia or var_Sostenible and var_Agua,

if  (((any(var in entrada for var in var_Consumo) and any(var in entrada for var in var_Responsabilidad)) or
    any(var in entrada for var in var_Eficiente) or any(var in entrada for var in var_Pura) or
    any(var in entrada for var in var_Acceso) or any(var in entrada for var in var_Ciudar) or
    any(var in entrada for var in var_Reciclaje) or any(var in entrada for var in var_Reducir) or
    any(var in entrada for var in var_Sin) or any(var in entrada for var in var_Extraccion) or
    any(var in entrada for var in var_Importancia) or any(var in entrada for var in var_Sostenible)) and
    any(var in entrada for var in var_Agua)):
    Meta_6_4 = True
    print("Meta 6.4: De aqui a 2030, aumentar considerablemente el uso eficiente de los recursos hidricos en todos los sectores y asegurar la sostenibilidad de la extraccion y el abastecimiento de agua dulce para hacer frente a la escasez de agua y reducir considerablemente el numero de personas que sufren falta de agua");
else:
    Meta_6_4 = False

#   ("ALGORITMO META 6.5")
# Meta_6_5 =    [var_Ley or (var_Aprovechar and var_Coordinacion) or (var_Eficiente and var_Financiamiento) or
#               (var_Sostenible and var_Ambiente) or (var_Igualdad and var_Social) or (var_Asociatividad and
#               var_Internacional) or (var_Gestion and var_Integral) and var_Agua,
#               var_Manejo and var_Acuiferos]

if  (((any(var in entrada for var in var_Ley) or (any(var in entrada for var in var_Aprovechar) and
    any(var in entrada for var in var_Coordinacion)) or (any(var in entrada for var in var_Eficiente) and
    any(var in entrada for var in var_Financiamiento)) or (any(var in entrada for var in var_Sostenible) and
    any(var in entrada for var in var_Ambiente)) or (any(var in entrada for var in var_Igualdad) and
    any(var in entrada for var in var_Social)) or (any(var in entrada for var in var_Asociatividad) and
    any(var in entrada for var in var_Internacional)) or (any(var in entrada for var in var_Gestion) and
    any(var in entrada for var in var_Integral))) and any(var in entrada for var in var_Agua)) or
    (any(var in entrada for var in var_Manejo) and any(var in entrada for var in var_Acuiferos))):
    Meta_6_5 = True
    print("Meta 6.5: De aqui a 2030, implementar la gestion integrada de los recursos hidricos a todos los niveles, incluso mediante la cooperacion transfronteriza, segun proceda");
else:
    Meta_6_5 = False

#   ("ALGORITMO META 6.6")
# Meta_6_6 =    [var_Acuiferos or var_Montana or var_Forestal or (var_Ecosistema and var_Agua) and var_Proteccion,
#               var_Restauracion and var_Ecosistema and var_Agua]

if  ((((any(var in entrada for var in var_Acuiferos) or any(var in entrada for var in var_Montana) or
    any(var in entrada for var in var_Forestal) or (any(var in entrada for var in var_Ecosistema) and
    any(var in entrada for var in var_Agua))) and any(var in entrada for var in var_Proteccion))) or
    (any(var in entrada for var in var_Restauracion) and any(var in entrada for var in var_Ecosistema) and
    any(var in entrada for var in var_Agua))):
    Meta_6_6 = True
    print("Meta 6.6: De aqui a 2020, proteger y restablecer los ecosistemas relacionados con el agua, incluidos los bosques, las montanas, los humedales, los rios, los acuiferos y los lagos");
else:
    Meta_6_6 = False

#   ("ALGORITMO META 6.7")
# Meta_6_7 =    [var_Programa and var_Agua,
#               var_Desalinizacion or var_Agua or var_Saneamiento and (var_Asociatividad and var_Internacional)]

if  ((any(var in entrada for var in var_Programa) and any(var in entrada for var in var_Agua)) or
    ((any(var in entrada for var in var_Programa) or any(var in entrada for var in var_Agua) or
    any(var in entrada for var in var_Agua)) and (any(var in entrada for var in var_Agua) and
    any(var in entrada for var in var_Agua)))):
    Meta_6_7 = True
    print("Meta 6.7: De aqui a 2030, ampliar la cooperacion internacional y el apoyo prestado a los paises en desarrollo para la creacion de capacidad en actividades y programas relativos al agua y el saneamiento, como los de captacion de agua, desalinizacion, uso eficiente de los recursos hidricos, tratamiento de aguas residuales, reciclado y tecnologias de reutilizacion");
else:
    Meta_6_7 = False

#   ("ALGORITMO META 6.8")
# Meta_6_8 =    [[var_APR,
#               (var_Concejo and var_Ciudadano) or (var_Junta and var_Vigilancia) or (var_Organizada and var_Usuario) or
#               var_Comite or var_Comunidad and var_Agua,
#               var_Comunidad and var_Saneamiento,
#               var_Asociatividad and var_Canalista]

if  (any(var in entrada for var in var_APR) or
    (((any(var in entrada for var in var_Concejo) and any(var in entrada for var in var_Ciudadano)) or
    (any(var in entrada for var in var_Junta) and any(var in entrada for var in var_Vigilancia)) or
    (any(var in entrada for var in var_Organizada) and any(var in entrada for var in var_Usuario)) or
    any(var in entrada for var in var_Comite) or any(var in entrada for var in var_Comunidad)) and
    any(var in entrada for var in var_Agua)) or
    (any(var in entrada for var in var_Comunidad) and any(var in entrada for var in var_Saneamiento)) or
    (any(var in entrada for var in var_Asociatividad) and any(var in entrada for var in var_Canalista))):
    Meta_6_8 = True
    print("Meta 6.8: Apoyar y fortalecer la participacion de las comunidades locales en la mejora de la gestion del agua y el saneamiento");
else:
    Meta_6_8 = False

if  (Meta_6_1 == True or Meta_6_2 == True or Meta_6_3 == True or Meta_6_4 == True or Meta_6_5 == True or Meta_6_6 == True or
    Meta_6_7 == True or Meta_6_8 == True) :
    print("ODS 6: Garantizar la disponibilidad y la gestion sostenible del agua y el saneamiento para todos")
    ODS_6 = True
else:
    ODS_6 = False

#-----------------------ALGORITMO ODS 7----------------------------------------

#   ("#ALGORITMO META 7.1")
# Meta_7_1 =    [var_Vivienda or var_Rural or var_Confiable or var_Acceso and var_Electricidad]

if  ((any(var in entrada for var in var_Vivienda) or any(var in entrada for var in var_Rural) or
    any(var in entrada for var in var_Confiable) or any(var in entrada for var in var_Acceso)) and
    any(var in entrada for var in var_Electricidad)):
    Meta_7_1 = True
    print("Meta 7.1: De aqui a 2030, garantizar el acceso universal a servicios energeticos asequibles, fiables y modernos");
else:
    Meta_7_1 = False

#   ("ALGORITMO META 7.2")
# Meta_7_2 =    [var_Electricidad and var_Basura and var_Solido,
#               var_EnergiaRenovable]

if  ((any(var in entrada for var in var_Electricidad) and any(var in entrada for var in var_Basura) and
    any(var in entrada for var in var_Solido)) or
    any(var in entrada for var in var_EnergiaRenovable)):
    Meta_7_2 = True
    print("Meta 7.2: De aqui a 2030, aumentar considerablemente la proporcion de energia renovable en el conjunto de fuentes energeticas");
else:
    Meta_7_2 = False

#   ("ALGORITMO META 7.3")
# Meta_7_3 =    [var_Sostenible or var_Responsabilidad or (var_Gasto and var_Innecesario) or var_Innecesario or
#               var_Reducir or var_Eficiente and var_Electricidad,
#               var_Equipo and var_Enchufe,
#               var_EficienciaEnergetica]

if  (((any(var in entrada for var in var_Sostenible) or any(var in entrada for var in var_Responsabilidad) or
    (any(var in entrada for var in var_Gasto) and any(var in entrada for var in var_Innecesario)) or
    any(var in entrada for var in var_Innecesario) or any(var in entrada for var in var_Reducir) or
    any(var in entrada for var in var_Eficiente)) and any(var in entrada for var in var_Electricidad)) or
    (any(var in entrada for var in var_Equipo) and any(var in entrada for var in var_Enchufe)) or
    any(var in entrada for var in var_EficienciaEnergetica)):
    Meta_7_3 = True
    print("Meta 7.3: De aqui a 2030, duplicar la tasa mundial de mejora de la eficiencia energetica");
else:
    Meta_7_3 = False

#   ("ALGORITMO META 7.4")
# Meta_7_4 =    [var_Financiamiento or (var_Asociatividad and var_Internacional) or var_Investigacion and (var_Eficiente and
#               var_Electricidad),
#               (var_Asociatividad and var_Internacional) or var_Financiamiento or var_Investigacion and var_EnergiaRenovable]

if  (((any(var in entrada for var in var_Financiamiento) or (any(var in entrada for var in var_Asociatividad) and
    any(var in entrada for var in var_Internacional)) or any(var in entrada for var in var_Investigacion)) and
    (any(var in entrada for var in var_Eficiente) and any(var in entrada for var in var_Electricidad))) or
    (((any(var in entrada for var in var_Asociatividad) and any(var in entrada for var in var_Internacional)) or
    any(var in entrada for var in var_Financiamiento) or any(var in entrada for var in var_Investigacion)) and
    any(var in entrada for var in var_EnergiaRenovable))):
    Meta_7_4 = True
    print("Meta 7.4: De aqui a 2030, aumentar la cooperacion internacional para facilitar el acceso a la investigacion y la tecnologia relativas a la energia limpia, incluidas las fuentes renovables, la eficiencia energetica y las tecnologias avanzadas y menos contaminantes de combustibles fosiles, y promover la inversion en infraestructura energetica y tecnologias limpias");
else:
    Meta_7_4 = False

#   ("ALGORITMO META 7.5")
# Meta_7_5 =    [(var_Servicio and var_Moderno) or (var_Mejorar and var_Distribucion) and var_Electricidad,
#               (var_Infraestructura or var_Distribucion or var_Red) and (var_Electricidad and var_Confiable)]

if  ((((any(var in entrada for var in var_Servicio) and any(var in entrada for var in var_Moderno)) or
    (any(var in entrada for var in var_Mejorar) and any(var in entrada for var in var_Distribucion))) and
    any(var in entrada for var in var_Electricidad)) or
    ((any(var in entrada for var in var_Infraestructura) or any(var in entrada for var in var_Distribucion) or
    any(var in entrada for var in var_Red)) and (any(var in entrada for var in var_Electricidad) and
    any(var in entrada for var in var_Confiable)))):
    Meta_7_5 = True
    print("Meta 7.5: De aqui a 2030, ampliar la infraestructura y mejorar la tecnologia para prestar servicios energeticos modernos y sostenibles para todos en los paises en desarrollo, en particular los paises menos adelantados, los pequenos Estados insulares en desarrollo y los paises en desarrollo sin litoral, en consonancia con sus respectivos programas de apoyo");
else:
    Meta_7_5 = False

if  (Meta_7_1 == True or Meta_7_2 == True or Meta_7_3 == True or Meta_7_4 == True or Meta_7_5 == True) :
    print("ODS 7: Garantizar el acceso a una  energia asequible, fiable, sostenible y moderna para todos")
    ODS_7 = True
else:
    ODS_7 = False

#-----------------------ALGORITMO ODS 8----------------------------------------

#   ("ALGORITMO META 8.1")
# Meta_8_1 =    [(var_PIB or var_Economia) and (Var_Crecimiento or Var_Produtividad),
#               var_Nuevo and var_Mercado and var_Internacional,
#               var_Ley and var_Comercio,
#               var_Negocio and var_PaisesAsiaticos and var_Chile]

if  (((any(var in entrada for var in var_PIB) or any(var in entrada for var in var_Economia)) and
    (any(var in entrada for var in var_Crecimiento) or any(var in entrada for var in var_Produccion))) or
    (any(var in entrada for var in var_Nuevo) and any(var in entrada for var in var_Mercado) and
    any(var in entrada for var in var_Internacional)) or
    (any(var in entrada for var in var_Ley) and any(var in entrada for var in var_Comercio)) or
    (any(var in entrada for var in var_Negocio) and any(var in entrada for var in var_PaisesAsiaticos) and
    any(var in entrada for var in var_Chile))):
    Meta_8_1 = True
    print("Meta 8.1: Mantener el crecimiento economico per capita de conformidad con las circunstancias nacionales y, en particular, un crecimiento del producto interno bruto de al menos el 7% anual en los paises menos adelantados");
else:
    Meta_8_1 = False

#   ("ALGORITMO META 8.2")
# Meta_8_2 =    [var_Desarollar or var_Comunidad or var_Explotacion or var_Actividad and var_Mineria,
#               var_Agricultura or var_Industria and var_Desarollar,
#               var_Empresa or var_Abastecimiento and var_Tecnologia,
#               var_Mundo and var_Produccion,
#               var_Gestion and var_Corporacion,
#               var_Mercado and var_Informatico,
#               var_Automatizar and var_Proceso]

if  (((any(var in entrada for var in var_Desarollar) or any(var in entrada for var in var_Comunidad) or
    any(var in entrada for var in var_Explotacion) or any(var in entrada for var in var_Actividad)) and
    any(var in entrada for var in var_Mineria)) or
    ((any(var in entrada for var in var_Agricultura) or any(var in entrada for var in var_Industria)) and
    any(var in entrada for var in var_Desarollar)) or
    ((any(var in entrada for var in var_Empresa) or any(var in entrada for var in var_Abastecimiento)) and
    any(var in entrada for var in var_Tecnologia)) or
    (any(var in entrada for var in var_Mundo) and any(var in entrada for var in var_Produccion)) or
    (any(var in entrada for var in var_Gestion) and any(var in entrada for var in var_Corporacion)) or
    (any(var in entrada for var in var_Mercado) and any(var in entrada for var in var_Informatico)) or
    (any(var in entrada for var in var_Automatizar) and any(var in entrada for var in var_Proceso))):
    Meta_8_2 = True
    print("Meta 8.2: Lograr niveles mas elevados de productividad economica mediante la diversificacion, la modernizacion tecnologica y la innovacion, entre otras cosas centrandose en los sectores con gran valor anadido y un uso intensivo de la mano de obra");
else:
    Meta_8_2 = False

#   ("ALGORITMO META 8.3")
# Meta_8_3 =    [var_Emprendimiento,
#               var_Desarollar and var_Economia,
#               var_Impacto or var_Situacion or var_Mundo or var_Mercado and var_Laboral,
#               var_Nuevo or var_Plan or var_Modelo or var_Desarollar and var_Negocio,
#               var_Formal or var_Asesoria or var_Habilidad or var_Formacion and var_Empresa,
#               var_Idea or var_Financiamiento and var_Proyecto,
#               var_InstitucionesProductivas,
#               var_Marketing and var_Informatico,
#               var_Investigacion and var_Mercado,
#               var_Mercado and var_Justo,
#               var_Artesanal]

if  (any(var in entrada for var in var_Emprendimiento) or
    (any(var in entrada for var in var_Desarollar) and any(var in entrada for var in var_Economia)) or
    ((any(var in entrada for var in var_Impacto) or any(var in entrada for var in var_Situacion) or
    any(var in entrada for var in var_Mundo) or any(var in entrada for var in var_Mercado)) and
    any(var in entrada for var in var_Laboral)) or
    ((any(var in entrada for var in var_Nuevo) or any(var in entrada for var in var_Plan) or
    any(var in entrada for var in var_Modelo) or any(var in entrada for var in var_Desarollar)) and
    any(var in entrada for var in var_Negocio)) or
    ((any(var in entrada for var in var_Formal) or any(var in entrada for var in var_Asesoria) or
    any(var in entrada for var in var_Habilidad) or any(var in entrada for var in var_Formacion)) and
    any(var in entrada for var in var_Empresa)) or
    ((any(var in entrada for var in var_Idea) or any(var in entrada for var in var_Financiamiento)) and
    any(var in entrada for var in var_Proyecto)) or
    any(var in entrada for var in var_InstitucionesProductivas) or
    (any(var in entrada for var in var_Marketing) and any(var in entrada for var in var_Informatico)) or
    (any(var in entrada for var in var_Investigacion) and any(var in entrada for var in var_Mercado)) or
    (any(var in entrada for var in var_Mercado) and any(var in entrada for var in var_Justo))):
    Meta_8_3 = True
    print("Meta 8.3: Promover politicas orientadas al desarrollo que apoyen las actividades productivas, la creacion de puestos de trabajo decentes, el emprendimiento, la creatividad y la innovacion, y fomentar la formalizacion y el crecimiento de las microempresas y las pequenas y medianas empresas, incluso mediante el acceso a servicios financieros");
else:
    Meta_8_3 = False

#   ("ALGORITMO META 8.4")
# Meta_8_4 =    [var_Consumo or var_Produccion and var_Eficiente,
#               var_Consumo or var_Produccion and var_Sostenible,
#               var_Consumo and var_Responsabilidad,
#               (var_Impacto and var_Ambiente) or (var_Sentido and var_Social) and var_Produccion,
#               var_EmpresaB,
#               var_Mercado and var_Justo]

if  (((any(var in entrada for var in var_Consumo) or any(var in entrada for var in var_Produccion)) and
    any(var in entrada for var in var_Eficiente)) or
    ((any(var in entrada for var in var_Consumo) or any(var in entrada for var in var_Produccion)) and
    any(var in entrada for var in var_Sostenible)) or
    (any(var in entrada for var in var_Consumo) and any(var in entrada for var in var_Responsabilidad)) or
    (((any(var in entrada for var in var_Impacto) and any(var in entrada for var in var_Ambiente)) or
    (any(var in entrada for var in var_Sentido) and any(var in entrada for var in var_Social))) and
    any(var in entrada for var in var_Produccion)) or
    any(var in entrada for var in var_EmpresaB) or any(var in entrada for var in var_EconomiaCircular) or 
    (any(var in entrada for var in var_Mercado) and any(var in entrada for var in var_Justo))):
    Meta_8_4 = True
    print("Meta 8.4: Mejorar progresivamente, de aqui a 2030, la produccion y el consumo eficientes de los recursos mundiales y procurar desvincular el crecimiento economico de la degradacion del medio ambiente, conforme al Marco Decenal de Programas sobre Modalidades de Consumo y Produccion Sostenibles, empezando por los paises desarrollados");
else:
    Meta_8_4 = False

#   ("ALGORITMO META 8.5")
# Meta_8_5 =    [(var_Asesoria or var_Perfil) and var_Organizada,
#               var_Mercado and var_Laboral,
#               var_Capacitar and var_Mujer,
#               var_Practica and var_Profesion,
#               var_Consumo and var_Inclusion,
#               var_Estudiante and var_Empresa]

if  (((any(var in entrada for var in var_Asesoria) or any(var in entrada for var in var_Perfil)) and
    any(var in entrada for var in var_Organizada)) or
    (any(var in entrada for var in var_Mercado) and any(var in entrada for var in var_Laboral)) or
    (any(var in entrada for var in var_Mujer) and any(var in entrada for var in var_Capacitar)) or
    (any(var in entrada for var in var_Practica) and any(var in entrada for var in var_Profesion)) or
    (any(var in entrada for var in var_Consumo) and any(var in entrada for var in var_Inclusion)) or
    (any(var in entrada for var in var_Estudiante) and any(var in entrada for var in var_Empresa))):
    Meta_8_5 = True
    print("Meta 8.5: De aqui a 2030, lograr el empleo pleno y productivo y el trabajo decente para todas las mujeres y los hombres, incluidos los jovenes y las personas con discapacidad, asi como la igualdad de remuneracion por trabajo de igual valor");
else:
    Meta_8_5 = False

#   ("ALGORITMO META 8.6")
# Meta_8_6 =    [(var_Emprendimiento or var_Capacitar or var_Desempleo or var_Laboral) and var_Joven]

if  ((any(var in entrada for var in var_Emprendimiento) or any(var in entrada for var in var_Capacitar) or
    any(var in entrada for var in var_Desempleo) or any(var in entrada for var in var_Laboral)) and
    any(var in entrada for var in var_Joven)):
    Meta_8_6 = True
    print("Meta 8.6: De aqui a 2020, reducir considerablemente la proporcion de jovenes que no estan empleados y no cursan estudios ni reciben capacitacion");
else:
    Meta_8_6 = False

#   ("ALGORITMO META 8.7")
# Meta_8_7 =    [(var_Esclavo or var_Explotacion or var_Libertad or var_Amenaza or var_Obligado or var_Nino) and var_Laboral,
#               var_Explotacion and var_Sexualidad,
#               var_Trata and var_Persona,
#               var_Nino and var_Soldado]

if  (((any(var in entrada for var in var_Esclavo) or any(var in entrada for var in var_Explotacion) or
    any(var in entrada for var in var_Libertad) or any(var in entrada for var in var_Amenaza) or
    any(var in entrada for var in var_Obligado) or any(var in entrada for var in var_Nino)) and
    any(var in entrada for var in var_Laboral)) or
    (any(var in entrada for var in var_Explotacion) and any(var in entrada for var in var_Sexualidad)) or
    (any(var in entrada for var in var_Trata) and any(var in entrada for var in var_Persona)) or
    (any(var in entrada for var in var_Nino) and any(var in entrada for var in var_Soldado))):
    Meta_8_7 = True
    print("Meta 8.7: Adoptar medidas inmediatas y eficaces para erradicar el trabajo forzoso, poner fin a las formas contemporaneas de esclavitud y la trata de personas y asegurar la prohibicion y eliminacion de las peores formas de trabajo infantil, incluidos el reclutamiento y la utilizacion de ninos soldados, y, de aqui a 2025, poner fin al trabajo infantil en todas sus formas");
else:
    Meta_8_7 = False

#   ("ALGORITMO META 8.8")
# Meta_8_8 =    [(var_Clima or var_Riesgo or var_Proteccion or var_Ley or var_Inspeccion or var_Defensa or
#               var_Derecho or var_Tension or var_Pausa) and var_Laboral,
#               var_Libertad and var_Sindicato]

if  (((any(var in entrada for var in var_Clima) or any(var in entrada for var in var_Riesgo) or any(var in entrada for var in var_Proteccion) or
    any(var in entrada for var in var_Ley) or any(var in entrada for var in var_Inspeccion) or
    any(var in entrada for var in var_Defensa) or any(var in entrada for var in var_Derecho) or
    any(var in entrada for var in var_Tension) or any(var in entrada for var in var_Pausa)) and
    any(var in entrada for var in var_Laboral)) or
    (any(var in entrada for var in var_Libertad) and any(var in entrada for var in var_Sindicato))):
    Meta_8_8 = True
    print("Meta 8.8: Proteger los derechos laborales y promover un entorno de trabajo seguro y sin riesgos para todos los trabajadores, incluidos los trabajadores migrantes, en particular las mujeres migrantes y las personas con empleos precarios");
else:
    Meta_8_8 = False

#   ("ALGORITMO META 8.9")
# Meta_8_9 =    [((var_Impacto and var_Social) or var_Actividad or var_Sostenible or var_Industria) and var_Turismo,
#               var_Identidad or var_Producto and var_Local,
#               var_CulturaLocal,
#               var_Producto and var_Zona,
#               var_Desarollar and var_Gastronomia and var_Region,
#               var_Ecoturismo,
#               var_Sostenible and var_Sernatur]

if  ((((any(var in entrada for var in var_Impacto) and any(var in entrada for var in var_Social)) or
    any(var in entrada for var in var_Actividad) or any(var in entrada for var in var_Sostenible) or
    any(var in entrada for var in var_Industria)) and any(var in entrada for var in var_Turismo)) or
    ((any(var in entrada for var in var_Identidad) or
    any(var in entrada for var in var_Producto)) and any(var in entrada for var in var_Local)) or
    any(var in entrada for var in var_CulturaLocal) or
    (any(var in entrada for var in var_Producto) and any(var in entrada for var in var_Zona)) or
    (any(var in entrada for var in var_Desarollar) and any(var in entrada for var in var_Gastronomia) and
    any(var in entrada for var in var_Region)) or
    any(var in entrada for var in var_Ecoturismo) or
    (any(var in entrada for var in var_Sostenible) and any(var in entrada for var in var_Sernatur))):
    Meta_8_9 = True
    print("Meta 8.9: De aqui a 2030, elaborar y poner en practica politicas encaminadas a promover un turismo sostenible que cree puestos de trabajo y promueva la cultura y los productos locales");
else:
    Meta_8_9 = False

#   ("ALGORITMO META 8.10")
# Meta_8_10 =   [(var_ProductosFinancieros or var_Inclusion or var_Educacion) and var_Financiamiento,
#               (var_Personas or var_Acceso) and var_ProductosFinancieros]

if  (((any(var in entrada for var in var_ProductosFinancieros) or any(var in entrada for var in var_Inclusion) or
    any(var in entrada for var in var_Educacion)) and any(var in entrada for var in var_Financiamiento)) or
    ((any(var in entrada for var in var_Persona) or any(var in entrada for var in var_Acceso)) and
    any(var in entrada for var in var_ProductosFinancieros))):
    Meta_8_10 = True
    print("Meta 8.10: Fortalecer la capacidad de las instituciones financieras nacionales para fomentar y ampliar el acceso a los servicios bancarios, financieros y de seguros para todos");
else:
    Meta_8_10 = False

#   ("ALGORITMO META 8.11")
# Meta_8_11 =   [((var_Contribucion and var_Emprendimiento) or (var_Contribucion and var_Empresa) or
#               (var_Encadenamiento and var_Produccion) or var_ProductosFinancieros or var_Mercado or
#               var_Comercio) and var_PaisesEnDesarrollo]

if  (((any(var in entrada for var in var_Contribucion) and any(var in entrada for var in var_Emprendimiento)) or
    (any(var in entrada for var in var_Contribucion) and any(var in entrada for var in var_Empresa)) or
    (any(var in entrada for var in var_Encadenamiento) and any(var in entrada for var in var_Produccion)) or
    any(var in entrada for var in var_ProductosFinancieros) or any(var in entrada for var in var_Mercado) or
    any(var in entrada for var in var_Comercio)) and any(var in entrada for var in var_PaisesEnDesarrollo)):
    Meta_8_11 = True
    print("Meta 8.11: Aumentar el apoyo a la iniciativa de ayuda para el comercio en los paises en desarrollo, en particular los paises menos adelantados, incluso mediante el Marco Integrado Mejorado para la Asistencia Tecnica a los Paises Menos Adelantados en Materia de Comercio");
else:
    Meta_8_11 = False

#   ("ALGORITMO META 8.12")
# Meta_8_12 =   [(var_Iniciativa or var_Plan) and (var_Internacional and var_Laboral and var_Joven)]

if  ((any(var in entrada for var in var_Iniciativa) or any(var in entrada for var in var_Plan)) and
    (any(var in entrada for var in var_Internacional) and any(var in entrada for var in var_Laboral) and
    any(var in entrada for var in var_Joven))):
    Meta_8_12 = True
    print("Meta 8.12: De aqui a 2020, desarrollar y poner en marcha una estrategia mundial para el empleo de los jovenes y aplicar el Pacto Mundial para el Empleo de la Organizacion Internacional del Trabajo");
else:
    Meta_8_12 = False

if  (Meta_8_1 == True or Meta_8_2 == True or Meta_8_3 == True or Meta_8_4 == True or Meta_8_5 == True or Meta_8_6 == True or
    Meta_8_7 == True or Meta_8_8 == True or Meta_8_9 == True or Meta_8_10 == True or Meta_8_11 == True or Meta_8_12 == True) :
    print("ODS 8: Promover el crecimiento economico sostenido, inclusivo y sostenible, el empleo pleno y productivo y el trabajo decente para todos")
    ODS_8 = True
else:
    ODS_8 = False

#-----------------------ALGORITMO ODS 9----------------------------------------


#   ("ALGORITMO META 9.1")
# Meta_9_1 =    [(var_Interurbano or var_Rural or var_Confiable or var_Resiliencia or var_Sostenible) and
#               (var_Construccion and var_Infraestructura)]

if  ((any(var in entrada for var in var_Interurbano) or any(var in entrada for var in var_Rural) or
    any(var in entrada for var in var_Confiable) or any(var in entrada for var in var_Resiliencia) or
    any(var in entrada for var in var_Sostenible)) and (any(var in entrada for var in var_Construccion) or
    any(var in entrada for var in var_Infraestructura))):
    Meta_9_1 = True
    print("Meta 9.1: Desarrollar infraestructuras fiables, sostenibles, resilientes y de calidad, incluidas infraestructuras regionales y transfronterizas, para apoyar el desarrollo economico y el bienestar humano, haciendo especial hincapie en el acceso asequible y equitativo para todos");
else:
    Meta_9_1 = False

#   ("ALGORITMO META 9.2")
# Meta_9_2 =    [(var_Laboral or var_Sostenible or var_Inclusion) and var_Industria,
#               (var_Desarollar and var_Economia) or (var_Crecimiento and var_Economia) or var_Laboral or var_PIB) and
#               (var_Contribucion and var_Industria),
#               var_PIB and var_Economia]

#if  (((any(var in entrada for var in var_Laboral) or any(var in entrada for var in var_Sostenible) or
#    any(var in entrada for var in var_Inclusion)) and any(var in entrada for var in var_Industria)) or
#    (((any(var in entrada for var in var_Desarollar) and any(var in entrada for var in var_Economia)) or
#    (any(var in entrada for var in var_Crecimiento) and any(var in entrada for var in var_Economia)) or
#    any(var in entrada for var in var_Laboral) or any(var in entrada for var in var_PIB)) 
#    (any(var in entrada for var in var_Contribucion) and any(var in entrada for var in var_Industria))) or
#    (any(var in entrada for var in var_PIB) and any(var in entrada for var in var_Economia))):


#    Meta_9_2 = True
#    print("Meta 9.2: Promover una industrializacion inclusiva y sostenible y, de aqui a 2030, aumentar significativamente la contribucion de la industria al empleo y al producto interno bruto, de acuerdo con las circunstancias nacionales, y duplicar esa contribucion en los paises menos adelantados");
#else:
    Meta_9_2 = False

#   ("ALGORITMO META 9.3")
# Meta_9_3 =    [(var_Postulacion or var_Proyecto or var_Financiamiento or var_ProductosFinancieros) and var_Emprendimiento]

if  ((any(var in entrada for var in var_Postulacion) or any(var in entrada for var in var_Proyecto) or
    any(var in entrada for var in var_Financiamiento) or any(var in entrada for var in var_ProductosFinancieros)) and
    any(var in entrada for var in var_Emprendimiento)):
    Meta_9_3 = True
    print("Meta 9.3: Aumentar el acceso de las pequenas industrias y otras empresas, particularmente en los paises en desarrollo, a los servicios financieros, incluidos creditos asequibles, y su integracion en las cadenas de valor y los mercados");
else:
    Meta_9_3 = False

#   ("ALGORITMO META 9.4")
# Meta_9_4 =    [(var_Ambiente or var_Toxico or var_Basura or var_Contaminacion or var_Sostenible or var_Limpio) and var_Industria,
#               var_Moderno and var_Infraestructura]

if  (((any(var in entrada for var in var_Ambiente) or any(var in entrada for var in var_Toxico) or
    any(var in entrada for var in var_Basura) or any(var in entrada for var in var_Contaminacion) or
    any(var in entrada for var in var_Sostenible) or any(var in entrada for var in var_Limpio)) and
    any(var in entrada for var in var_Industria)) or
    (any(var in entrada for var in var_Moderno) and any(var in entrada for var in var_Infraestructura))):
    Meta_9_4 = True
    print("Meta 9.4: De aqui a 2030, modernizar la infraestructura y reconvertir las industrias para que sean sostenibles, utilizando los recursos con mayor eficacia y promoviendo la adopcion de tecnologias y procesos industriales limpios y ambientalmente racionales, y logrando que todos los paises tomen medidas de acuerdo con sus capacidades respectivas");
else:
    Meta_9_4 = False

#   ("ALGORITMO META 9.5")
# Meta_9_5 =    [((var_Capacidad or var_Proyecto or 
#               var_Desarrollar or var_Nuevo) and var_Tenologia) or 
#               var_Innovacion or var_IA
#               (var_Promocion or var_Investigacion or var_Taller) and var_Ciencia] or


if  ((((any(var in entrada for var in var_Capacidad) or any(var in entrada for var in var_Proyecto) or 
    any(var in entrada for var in var_Desarollar) or any(var in entrada for var in var_Nuevo)) and any(var in entrada for var in var_Tecnologia)) or
    any(var in entrada for var in var_Innovacion) or any(var in entrada for var in var_IA)) or
    ((any(var in entrada for var in var_Promover) or any(var in entrada for var in var_Investigacion) or
    any(var in entrada for var in var_Taller)) and any(var in entrada for var in var_Ciencia))):
    Meta_9_5 = True
    print("Meta 9.5: Aumentar la investigacion cientifica y mejorar la capacidad tecnologica de los sectores industriales de todos los paises, en particular los paises en desarrollo, entre otras cosas fomentando la innovacion y aumentando considerablemente, de aqui a 2030, el numero de personas que trabajan en investigacion y desarrollo por millon de habitantes y los gastos de los sectores publico y privado en investigacion y desarrollo");
else:
    Meta_9_5 = False

#   ("ALGORITMO META 9.6")
# Meta_9_6 =    [(var_Interurbano or var_Rural or var_Confiable or var_Resiliencia or var_Sostenible) and
#               (var_Desarollar and var_Infraestructura)]

if  ((any(var in entrada for var in var_Interurbano) or any(var in entrada for var in var_Rural) or
    any(var in entrada for var in var_Confiable) or any(var in entrada for var in var_Resiliencia) or
    any(var in entrada for var in var_Sostenible)) and (any(var in entrada for var in var_Desarollar) and
    any(var in entrada for var in var_Infraestructura))):
    Meta_9_6 = True
    print("Meta 9.6: Facilitar el desarrollo de infraestructuras sostenibles y resilientes en los paises en desarrollo mediante un mayor apoyo financiero, tecnologico y tecnico a los paises africanos, los paises menos adelantados, los paises en desarrollo sin litoral y los pequenos Estados insulares en desarrollo");
else:
    Meta_9_6 = False

#   ("ALGORITMO META 9.7")
# Meta_9_7 =    [(var_Tecnologia or var_Investigación or var_Innovación) and var_PaisesEnDesarrollo]

if  ((any(var in entrada for var in var_Tecnologia) or any(var in entrada for var in var_Investigacion) or
    any(var in entrada for var in var_Innovacion)) and any(var in entrada for var in var_PaisesEnDesarrollo)):
    Meta_9_7 = True
    print("Meta 9.7: Apoyar el desarrollo de tecnologias, la investigacion y la innovacion nacionales en los paises en desarrollo, incluso garantizando un entorno normativo propicio a la diversificacion industrial y la adicion de valor a los productos basicos, entre otras cosas");
else:
    Meta_9_7 = False

#   ("ALGORITMO META 9.8")
# Meta_9_8 =    [(var_Tecnologia and var_Informacion) or (var_Capacitar and var_Informatico) or
#               var_Telecomunicaciones or var_Internet and var_Acceso]

if  (((any(var in entrada for var in var_Tecnologia) and any(var in entrada for var in var_Informacion)) or
    (any(var in entrada for var in var_Capacitar) and any(var in entrada for var in var_Informatico)) or
    any(var in entrada for var in var_Telecomunicaciones) or any(var in entrada for var in var_Internet)) and
    any(var in entrada for var in var_Acceso)):
    Meta_9_8 = True
    print("Meta 9.8: Aumentar significativamente el acceso a la tecnologia de la informacion y las comunicaciones y esforzarse por proporcionar acceso universal y asequible a Internet en los paises menos adelantados de aqui a 2020");
else:
    Meta_9_8 = False


if  (Meta_9_1 == True or Meta_9_2 == True or Meta_9_3 == True or Meta_9_4 == True or Meta_9_5 == True or Meta_9_6 == True or
    Meta_9_7 == True or Meta_9_8 == True) :
    print("ODS 9: Construir infraestructuras resilientes, promover la industrializacion inclusiva  y sostenible y fomentar  la innovacion");
    ODS_9 = True
else:
    ODS_9 = False



#-----------------------ALGORITMO ODS 10----------------------------------------

#   ("ALGORITMO META 10.1")
# Meta_10_1 =   [(var_Capacitar or var_Laboral or var_Salir or var_Luchar or var_Ingreso) and var_Pobre,
#               var_Emprendimiento and var_Subsistencia]

if  ((any(var in entrada for var in var_Capacitar) or any(var in entrada for var in var_Laboral) or
    any(var in entrada for var in var_Salir) or any(var in entrada for var in var_Luchar) or
    any(var in entrada for var in var_Ingreso)) and any(var in entrada for var in var_Pobre) or
    (any(var in entrada for var in  var_Emprendimiento) and any(var in entrada for var in var_Subsistencia))):
    Meta_10_1 = True
    print("Meta 10.1: De aqui a 2030, lograr progresivamente y mantener el crecimiento de los ingresos del 40% mas pobre de la poblacion a una tasa superior a la media nacional");
else:
    Meta_10_1 = False

#   ("ALGORITMO META 10.2")
# Meta_10_2 =   [var_Rehabilitar and var_Discapacidad,
#               var_Discriminacion,
#               var_Capacitar and var_Anciano,
#               var_Racismo,
#               var_IdeologiaDeGenero,
#               var_Insercion or (var_Habilidad and var_Laboral) and var_Reos,
#               var_Inmigracion,
#               var_Haitiano and var_Inclusion,
#               var_EncuentroIntercultural,
#               var_Transexual]

if  ((any(var in entrada for var in  var_Rehabilitar) and any(var in entrada for var in var_Discapacidad)) or
    any(var in entrada for var in  var_Discriminacion) or
    (any(var in entrada for var in  var_Capacitar) and any(var in entrada for var in var_Anciano)) or
    any(var in entrada for var in  var_Racismo) or
    any(var in entrada for var in  var_IdeologiaDeGenero) or
    ((any(var in entrada for var in  var_Insercion) or (any(var in entrada for var in  var_Habilidad) and
    any(var in entrada for var in  var_Laboral))) and any(var in entrada for var in  var_Reos)) or
    any(var in entrada for var in  var_Inmigracion) or
    (any(var in entrada for var in  var_Haitiano) and any(var in entrada for var in  var_Inclusion)) or
    any(var in entrada for var in  var_EncuentroIntercultural) or
    any(var in entrada for var in  var_Transexual)):
    Meta_10_2 = True
    print("Meta 10.2: De aqui a 2030, potenciar y promover la inclusion social, economica y politica de todas las personas, independientemente de su edad, sexo, discapacidad, raza, etnia, origen, religion o situacion economica u otra condicion");
else:
    Meta_10_2 = False

#   ("ALGORITMO META 10.3")
# Meta_10_3 =   [var_Mujer or var_Genero or var_Oportunidad and var_Igualdad,
#               (var_Estudiante or var_Laboral or var_Genero or var_Practica) and var_Discriminacion,
#               var_Reducir and var_Desigualdad]

if  (((any(var in entrada for var in  var_Mujer) or any(var in entrada for var in  var_Genero) or
    any(var in entrada for var in  var_Oportunidad)) and any(var in entrada for var in  var_Igualdad)) or
    ((any(var in entrada for var in  var_Estudiante) or any(var in entrada for var in  var_Laboral) or
    any(var in entrada for var in  var_Genero) or any(var in entrada for var in  var_Practica)) and
    any(var in entrada for var in  var_Discriminacion)) or
    (any(var in entrada for var in  var_Reducir) and any(var in entrada for var in  var_Desigualdad))):
    Meta_10_3 = True
    print("Meta 10.3: Garantizar la igualdad de oportunidades y reducir la desigualdad de resultados, incluso eliminando las leyes, politicas y practicas discriminatorias y promoviendo legislaciones, politicas y medidas adecuadas a ese respecto");
else:
    Meta_10_3 = False

#   ("ALGORITMO META 10.4")
# Meta_10_4 =   [(var_Proteccion or var_Laboral) and (var_Proteccion and var_Social) or (var_Inclusion and var_Social) or
#               var_Igualdad and var_Ley,
#               var_Desigualdad or var_Igualdad and var_Remuneracion,
#               var_Proteccion and var_Desempleo,
#               var_Pension and var_Solidaridad]

if  ((((any(var in entrada for var in  var_Proteccion) or any(var in entrada for var in  var_Laboral)) and
    (any(var in entrada for var in  var_Proteccion) and any(var in entrada for var in  var_Social)) or
    (any(var in entrada for var in  var_Inclusion) and any(var in entrada for var in  var_Social)) or
    any(var in entrada for var in  var_Igualdad)) and any(var in entrada for var in  var_Ley)) or
    (any(var in entrada for var in var_Igualdad) and any(var in entrada for var in var_Ley)) or
    ((any(var in entrada for var in var_Desigualdad) or any(var in entrada for var in var_Igualdad)) and
    any(var in entrada for var in var_Remuneracion)) or
    (any(var in entrada for var in var_Proteccion) and any(var in entrada for var in var_Desempleo)) or
    (any(var in entrada for var in var_Pension) and any(var in entrada for var in var_Solidaridad))):
    Meta_10_4 = True
    print("Meta 10.4: Adoptar politicas, especialmente fiscales, salariales y de proteccion social, y lograr progresivamente una mayor igualdad");
else:
    Meta_10_4 = False

#   ("ALGORITMO META 10.5")
# Meta_10_5 =   [(var_Regulacion and var_Mercado) or (var_Vigilancia and var_Mercado) or (var_Vigilancia and var_Institucion) and
#               var_Financiamiento,
#               var_InstitucionesFiscalizacionFinanciera,
#               var_Regulacion and var_Mercado and var_Valor]

if  ((((any(var in entrada for var in var_Regulacion) and any(var in entrada for var in var_Mercado)) or
    (any(var in entrada for var in var_Vigilancia) and any(var in entrada for var in var_Mercado)) or
    (any(var in entrada for var in var_Vigilancia) and any(var in entrada for var in var_Institucion))) and
    any(var in entrada for var in var_Financiamiento)) or
    any(var in entrada for var in var_InstitucionesFiscalizacionFinanciera) or
    (any(var in entrada for var in var_Regulacion) and any(var in entrada for var in var_Mercado) and
    any(var in entrada for var in var_Valor))):
    Meta_10_5 = True
    print("Meta 10.5: Mejorar la reglamentacion y vigilancia de las instituciones y los mercados financieros mundiales y fortalecer la aplicacion de esos reglamentos");
else:
    Meta_10_5 = False

#   ("ALGORITMO META 10.6")
# Meta_10_6 =   [var_Participacion and var_PaisesEnDesarrollo and var_Decidir and var_Institucion and
#               var_Financiamiento and var_Internacional]

if  (any(var in entrada for var in var_Participacion) and any(var in entrada for var in var_PaisesEnDesarrollo) and
    any(var in entrada for var in var_Decidir) and any(var in entrada for var in var_Institucion) and
    any(var in entrada for var in var_Financiamiento) and any(var in entrada for var in var_Internacional)):
    Meta_10_6 = True
    print("Meta 10.6: Asegurar una mayor representacion e intervencion de los paises en desarrollo en las decisiones adoptadas por las instituciones economicas y financieras internacionales para aumentar la eficacia, fiabilidad, rendicion de cuentas y legitimidad de esas instituciones");
else:
    Meta_10_6 = False

#   ("ALGORITMO META 10.7")
# Meta_10_7 =   [(var_Vinculo and var_Comunidad) or var_Hacinar or var_Problema or var_Chile or var_Insercion or
#               var_Estudiante or var_Racismo or var_Informacion or var_Oficina or var_Ley or var_Trata or
#               var_Desafio and var_Inmigracion]

if  (((any(var in entrada for var in var_Vinculo) and any(var in entrada for var in var_Comunidad)) or
    any(var in entrada for var in var_Hacinar) or any(var in entrada for var in var_Problema) or
    any(var in entrada for var in var_Chile) or  any(var in entrada for var in var_Insercion) or
    any(var in entrada for var in var_Estudiante) or any(var in entrada for var in var_Racismo) or
    any(var in entrada for var in var_Informacion) or any(var in entrada for var in var_Oficina) or
    any(var in entrada for var in var_Ley) or any(var in entrada for var in var_Trata) or
    any(var in entrada for var in var_Desafio)) and any(var in entrada for var in var_Inmigracion)):
    Meta_10_7 = True
    print("Meta 10.7: Facilitar la migracion y la movilidad ordenadas, seguras, regulares y responsables de las personas, incluso mediante la aplicacion de politicas migratorias planificadas y bien gestionadas");
else:
    Meta_10_7 = False

#   ("ALGORITMO META 10.8")
# Meta_10_8 =   [(var_Especial or var_Diferente) and (var_Trato and var_PaisesEnDesarrollo)]

if  ((any(var in entrada for var in var_Especial) or any(var in entrada for var in var_Diferente)) and
    any(var in entrada for var in var_Trato) and any(var in entrada for var in var_PaisesEnDesarrollo)):
    Meta_10_8 = True
    print("Meta 10.8: Aplicar el principio del trato especial y diferenciado para los paises en desarrollo, en particular los paises menos adelantados, de conformidad con los acuerdos de la Organizacion Mundial del Comercio");
else:
    Meta_10_8 = False

#   ("ALGORITMO META 10.9")
# Meta_10_9 =   [((var_Corriente and var_Financiamiento) or var_Contribucion or var_Inversion) and var_PaisesEnDesarrollo]

if  (((any(var in entrada for var in var_Corriente) and any(var in entrada for var in var_Financiamiento)) or
    any(var in entrada for var in var_Contribucion) or any(var in entrada for var in var_Inversion)) and
    any(var in entrada for var in var_PaisesEnDesarrollo)):
    Meta_10_9 = True
    print("Meta 10.9: Fomentar la asistencia oficial para el desarrollo y las corrientes financieras, incluida la inversion extranjera directa, para los Estados con mayores necesidades, en particular los paises menos adelantados, los paises africanos, los pequenos Estados insulares en desarrollo y los paises en desarrollo sin litoral, en consonancia con sus planes y programas nacionales");
else:
    Meta_10_9 = False

#   ("ALGORITMO META 10.10")
# Meta_10_10 =  [(var_Enviar and var_Encomienda) or (var_Transaccion and var_Dinero) or (var_Transferencia and var_Financiamiento) or
#               (var_Enviar and var_Articulo) or (var_Enviar and var_Dinero) or (var_Costo and var_Dinero) and var_Inmigracion,
#               var_Erradicar and var_Corredor and var_Dinero]

if  ((((any(var in entrada for var in var_Enviar) and any(var in entrada for var in var_Encomienda)) or
    (any(var in entrada for var in var_Transaccion) and any(var in entrada for var in var_Dinero)) or
    (any(var in entrada for var in var_Transferencia) and any(var in entrada for var in var_Financiamiento)) or
    (any(var in entrada for var in var_Enviar) and any(var in entrada for var in var_Articulo)) or
    (any(var in entrada for var in var_Enviar) and any(var in entrada for var in var_Dinero)) or
    (any(var in entrada for var in var_Costo) and any(var in entrada for var in var_Dinero))) and
    any(var in entrada for var in var_Inmigracion)) or
    (any(var in entrada for var in var_Erradicar) and any(var in entrada for var in var_Corredor) and
    any(var in entrada for var in var_Dinero))):
    Meta_10_10 = True
    print("Meta 10.10: De aqui a 2030, reducir a menos del 3% los costos de transaccion de las remesas de los migrantes y eliminar los corredores de remesas con un costo superior al 5%");
else:
    Meta_10_10 = False

if  (Meta_10_1 == True or Meta_10_2 == True or Meta_10_3 == True or Meta_10_4 == True or Meta_10_5 == True or Meta_10_6 == True or
    Meta_10_7 == True or Meta_10_8 == True or Meta_10_9 == True or Meta_10_10 == True):
    print("ODS 10: Reducir la desigualdad en los paises y entre ellos")
    ODS_10 = True
else:
    ODS_10 = False

#-----------------------ALGORITMO ODS 11----------------------------------------

#   ("ALGORITMO META 11.1")
# Meta_11_1 =   [(var_Inadecuado or var_Acceso or var_Emergencia or var_Construccion) and var_Vivienda,
#               (var_Servicio and var_Basica) or (var_Agua and var_Potable) or var_Electricidad and var_Acceso,
#               var_Marginal or var_Proteccion and var_Poblacion,
#               var_FundacionTecho,
#               var_Toma and var_Delincuencia]

if  (((any(var in entrada for var in var_Inadecuado) or any(var in entrada for var in var_Acceso) or
    any(var in entrada for var in var_Emergencia) or any(var in entrada for var in var_Construccion)) and
    any(var in entrada for var in var_Vivienda)) or (((any(var in entrada for var in var_Servicio) and any(var in entrada for var in var_Basica)) or
    (any(var in entrada for var in var_Agua) and any(var in entrada for var in var_Potable)) or
    any(var in entrada for var in var_Electricidad)) and any(var in entrada for var in var_Acceso)) or
    ((any(var in entrada for var in var_Marginal) or any(var in entrada for var in var_Proteccion)) and
    any(var in entrada for var in var_Poblacion)) or
    any(var in entrada for var in var_FundacionTecho) or
    (any(var in entrada for var in var_Toma) and any(var in entrada for var in var_Delincuencia))):
    Meta_11_1 = True
    print("Meta 11.1: De aqui a 2030, asegurar el acceso de todas las personas a viviendas y servicios basicos adecuados, seguros y asequibles y mejorar los barrios marginales");
else:
    Meta_11_1 = False

#   ("ALGORITMO META 11.2")
# Meta_11_2 =   [var_Discapacidad or (var_Rampa and var_Publico) or var_Proteccion or var_Acceso and var_Transporte,
#               var_Proteccion and var_Vial,
#               var_Alcolemia,
#               var_Estacionamiento and var_Discapacidad,
#               var_Narcotest]

if  (((any(var in entrada for var in var_Discapacidad) or (any(var in entrada for var in var_Rampa) and
    any(var in entrada for var in var_Publico)) or any(var in entrada for var in var_Proteccion) or
    any(var in entrada for var in var_Acceso)) and any(var in entrada for var in var_Transporte)) or
    (any(var in entrada for var in var_Proteccion) and any(var in entrada for var in var_Vial)) or
    any(var in entrada for var in var_Alcolemia) or
    (any(var in entrada for var in var_Estacionamiento) and any(var in entrada for var in var_Discapacidad)) or
    any(var in entrada for var in var_Narcotest)):
    Meta_11_2 = True
    print("Meta 11.2: De aqui a 2030, proporcionar acceso a sistemas de transporte seguros, asequibles, accesibles y sostenibles para todos y mejorar la seguridad vial, en particular mediante la ampliacion del transporte publico, prestando especial atencion a las necesidades de las personas en situacion de vulnerabilidad, las mujeres, los ninos, las personas con discapacidad y las personas de edad");
else:
    Meta_11_2 = False

#   ("ALGORITMO META 11.3")
# Meta_11_3 =   [(var_Sostenible or var_Proteccion or var_Inclusion) and var_Infraestructura,
#               (var_Ambiente or var_Participacion or var_Democracia or var_Sostenible or var_Inclusion) and var_Ciudades,
#               var_Urbanizacion and var_Inclusion,
#               var_Transporte and var_Discapacidad]

if  (((any(var in entrada for var in var_Sostenible) or any(var in entrada for var in var_Proteccion) or
    any(var in entrada for var in var_Inclusion)) and any(var in entrada for var in var_Infraestructura)) or
    ((any(var in entrada for var in var_Ambiente) or any(var in entrada for var in var_Participacion) or
    any(var in entrada for var in var_Democracia) or any(var in entrada for var in var_Sostenible) or
    any(var in entrada for var in var_Inclusion)) and any(var in entrada for var in var_Ciudades)) or
    (any(var in entrada for var in var_Urbanizacion) and any(var in entrada for var in var_Inclusion)) or
    (any(var in entrada for var in var_Transporte) and any(var in entrada for var in var_Discapacidad))):
    Meta_11_3 = True
    print("Meta 11.3: De aqui a 2030, aumentar la urbanizacion inclusiva y sostenible y la capacidad para la planificacion y la gestion participativas, integradas y sostenibles de los asentamientos humanos en todos los paises");
else:
    Meta_11_3 = False

#   ("ALGORITMO META 11.4")
# Meta_11_4 =   [(var_Arte or var_Humano or var_Historica or var_Natural or var_Cultura or var_Restauracion or var_Rescate) and
#               var_Patrimonio,
#               var_Reserva or var_Parque and var_Nacion]

if  (((any(var in entrada for var in var_Arte) or any(var in entrada for var in var_Humano) or
    any(var in entrada for var in var_Historica) or any(var in entrada for var in var_Natural) or
    any(var in entrada for var in var_Cultura) or any(var in entrada for var in var_Restauracion) or
    any(var in entrada for var in var_Rescate)) and any(var in entrada for var in var_Patrimonio)) or
    ((any(var in entrada for var in var_Reserva) or any(var in entrada for var in var_Parque)) and
    any(var in entrada for var in var_Nacion))):
    Meta_11_4 = True
    print("Meta 11.4: Redoblar los esfuerzos para proteger y salvaguardar el patrimonio cultural y natural del mundo");
else:
    Meta_11_4 = False

#   ("ALGORITMO META 11.5")
# Meta_11_5 =   [var_Situacion or var_Control or var_Simulacro or var_Plan and var_Emergencia,
#               var_Peligro and var_Riesgo,
#               var_Proteccion and var_Ciudadano,
#               var_Simulacro and var_DesastreNatural]

if  (((any(var in entrada for var in var_Situacion) or any(var in entrada for var in var_Control) or
    any(var in entrada for var in var_Simulacro) or any(var in entrada for var in var_Plan)) and
    any(var in entrada for var in var_Emergencia)) or
    (any(var in entrada for var in var_Peligro) and any(var in entrada for var in var_Riesgo)) or
    (any(var in entrada for var in var_Proteccion) and any(var in entrada for var in var_Ciudadano)) or
    (any(var in entrada for var in var_Simulacro) and any(var in entrada for var in var_DesastreNatural))):
    Meta_11_5 = True
    print("Meta 11.5: De aqui a 2030, reducir significativamente el numero de muertes causadas por los desastres, incluidos los relacionados con el agua, y de personas afectadas por ellos, y reducir considerablemente las perdidas economicas directas provocadas por los desastres en comparacion con el producto interno bruto mundial, haciendo especial hincapie en la proteccion de los pobres y las personas en situaciones de vulnerabilidad");
else:
    Meta_11_5 = False

#   ("ALGORITMO META 11.6")
# Meta_11_6 =   [(var_Urbanizacion or var_Domicilio or var_Recaudacion) and var_Basura,
#               (var_Atmosfera or var_Electricidad or var_Ciudades or var_Aire) and var_Contaminacion,
#               var_Material and var_Particula,
#               var_Impacto and var_Ambiente and var_Negativo]

if  (((any(var in entrada for var in var_Urbanizacion) or any(var in entrada for var in var_Domicilio) or
    any(var in entrada for var in var_Recaudacion)) and any(var in entrada for var in var_Basura)) or
    ((any(var in entrada for var in var_Atmosfera) or any(var in entrada for var in var_Electricidad) or
    any(var in entrada for var in var_Ciudades) or any(var in entrada for var in var_Aire)) and
    any(var in entrada for var in var_Contaminacion)) or
    (any(var in entrada for var in var_Material) and any(var in entrada for var in var_Particula)) or
    (any(var in entrada for var in var_Impacto) and any(var in entrada for var in var_Ambiente) and
    any(var in entrada for var in var_Negativo))):
    Meta_11_6 = True
    print("Meta 11.6: De aqui a 2030, reducir el impacto ambiental negativo per capita de las ciudades, incluso prestando especial atencion a la calidad del aire y la gestion de los desechos municipales y de otro tipo");
else:
    Meta_11_6 = False

#   ("ALGORITMO META 11.7")
# Meta_11_7 =   [var_Rampa and var_Discapacidad,
#               var_Infraestructura and var_Inclusion,
#               var_Espacio and var_Publico and var_Proteccion,
#               ((var_Universal and var_Zona) or (var_Universal and var_Espacio) or var_Inclusion or var_Ciudades) and var_Acceso,
#               var_ApoyaBrazos]

if  ((any(var in entrada for var in var_Rampa) and any(var in entrada for var in var_Discapacidad)) or
    (any(var in entrada for var in var_Infraestructura) and any(var in entrada for var in var_Inclusion)) or
    (any(var in entrada for var in var_Espacio) and any(var in entrada for var in var_Publico) and
    any(var in entrada for var in var_Proteccion)) or
    (((any(var in entrada for var in var_Universal) and any(var in entrada for var in var_Zona)) or
    (any(var in entrada for var in var_Universal) and any(var in entrada for var in var_Espacio)) or
    (any(var in entrada for var in var_Inclusion) and any(var in entrada for var in var_Ciudades)) and
    any(var in entrada for var in var_Acceso))) or
    any(var in entrada for var in var_ApoyaBrazos)):
    Meta_11_7 = True
    print("Meta 11.7: De aqui a 2030, proporcionar acceso universal a zonas verdes y espacios publicos seguros, inclusivos y accesibles, en particular para las mujeres y los ninos, las personas de edad y las personas con discapacidad");
else:
    Meta_11_7 = False

#   ("ALGORITMO META 11.8")
# Meta_11_8 =   [var_Plan and var_Urbanizacion,
#               (var_Agua and var_Potable) or var_Electricidad or var_Joven or var_Desarollar or var_Contribucion and
#               var_Rural,
#               var_APR]

if  ((any(var in entrada for var in var_Plan) and any(var in entrada for var in var_Urbanizacion)) or
    (((any(var in entrada for var in var_Agua) and any(var in entrada for var in var_Potable)) or
    any(var in entrada for var in var_Electricidad) or any(var in entrada for var in var_Joven) or
    any(var in entrada for var in var_Desarollar) or any(var in entrada for var in var_Contribucion)) and
    any(var in entrada for var in var_Rural)) or
    any(var in entrada for var in var_APR)):
    Meta_11_8 = True
    print("Meta 11.8: Apoyar los vinculos economicos, sociales y ambientales positivos entre las zonas urbanas, periurbanas y rurales fortaleciendo la planificacion del desarrollo nacional y regional");
else:
    Meta_11_8 = False

#   ("ALGORITMO META 11.9")
# Meta_11_9 =   [(var_Gestion and var_Riesgo) or (var_Ciudades and var_Emergencia) or (var_Proteccion and var_Civil) or
#               (var_Nacion and var_Emergencia) or (var_Ciudades and var_Emergencia) or (var_Reducir and var_Riesgo) and var_Plan,
#               var_MarcoSendai,
#               var_Sistema and var_Proteccion and var_Civil,
#               var_Alerta and var_Temprano]

if  ((((any(var in entrada for var in var_Gestion) and any(var in entrada for var in var_Riesgo)) or
    (any(var in entrada for var in var_Ciudades) and any(var in entrada for var in var_Emergencia)) or
    (any(var in entrada for var in var_Proteccion) and any(var in entrada for var in var_Civil)) or
    (any(var in entrada for var in var_Nacion) and any(var in entrada for var in var_Emergencia)) or
    (any(var in entrada for var in var_Ciudades) and any(var in entrada for var in var_Emergencia)) or
    (any(var in entrada for var in var_Reducir) and any(var in entrada for var in var_Riesgo))) and
    any(var in entrada for var in var_Plan)) or
    any(var in entrada for var in var_MarcoSendai) or
    (any(var in entrada for var in var_Sistema) and any(var in entrada for var in var_Proteccion) and
    any(var in entrada for var in var_Civil)) or
    (any(var in entrada for var in var_Alerta) and any(var in entrada for var in var_Temprano))):
    Meta_11_9 = True
    print("Meta 11.9: De aqui a 2020, aumentar considerablemente el numero de ciudades y asentamientos humanos que adoptan e implementan politicas y planes integrados para promover la inclusion, el uso eficiente de los recursos, la mitigacion del cambio climatico y la adaptacion a el y la resiliencia ante los desastres, y desarrollar y poner en practica, en consonancia con el Marco de Sendai para la Reduccion del Riesgo de Desastres 2015-2030, la gestion integral de los riesgos de desastre a todos los niveles");
else:
    Meta_11_9 = False

#   ("ALGORITMO META 11.10")
# Meta_11_10 =  [var_Construccion or var_Infraestructura and (var_Material and var_Local),
#               (var_Construccion and var_Resiliencia) or (var_Infraestructura and var_Resiliencia) or
#               (var_Infraestructura and var_Sostenible) and var_PaisesEnDesarrollo]

if  (((any(var in entrada for var in var_Construccion) or any(var in entrada for var in var_Infraestructura)) and
    (any(var in entrada for var in var_Material) and any(var in entrada for var in var_Local))) or
    (((any(var in entrada for var in var_Construccion) and any(var in entrada for var in var_Resiliencia)) or
    (any(var in entrada for var in var_Infraestructura) and any(var in entrada for var in var_Resiliencia)) or
    (any(var in entrada for var in var_Infraestructura) and any(var in entrada for var in var_Sostenible))) and
    any(var in entrada for var in var_PaisesEnDesarrollo))):
    Meta_11_10 = True
    print("Meta 11.10: Proporcionar apoyo a los paises menos adelantados, incluso mediante asistencia financiera y tecnica, para que puedan construir edificios sostenibles y resilientes utilizando materiales locales");
else:
    Meta_11_10 = False

if  (Meta_11_1 == True or Meta_11_2 == True or Meta_11_3 == True or Meta_11_4 == True or Meta_11_5 == True or Meta_11_6 == True or
    Meta_11_7 == True or Meta_11_8 == True or Meta_11_9 == True or Meta_11_10 == True):
    print("ODS 11: Lograr que las ciudades y los asentamientos humanos sean inclusivos, seguros, resilientes  y sostenibles")
    ODS_11 = True
else:
    ODS_11 = False

#-----------------------ALGORITMO ODS 12----------------------------------------

#   ("ALGORITMO META 12.1")
# Meta_12_1 =   ((var_Sistema and var_Produccion) or (var_Encadenamiento and var_Valor) or var_Produccion or var_Consumo) and
#               var_Sostenible,
#               (var_Produccion or var_Consumo) and var_Responsabilidad,
#               (var_Electricidad or var_Agua) and var_Reducir,
#               var_Ampolleta and var_Bajo and var_Consumo,
#               var_Reciclaje and var_MateriaPrima,
#               var_EmpresaB,
#               var_Comercio and var_Justo]

if  ((((any(var in entrada for var in var_Sistema) and any(var in entrada for var in var_Produccion)) or
    (any(var in entrada for var in var_Encadenamiento) and any(var in entrada for var in var_Valor)) or
    any(var in entrada for var in var_Produccion) or any(var in entrada for var in var_Consumo)) and
    any(var in entrada for var in var_Sostenible)) or
    ((any(var in entrada for var in var_Produccion) or any(var in entrada for var in var_Consumo)) and
    any(var in entrada for var in var_Responsabilidad)) or
    ((any(var in entrada for var in var_Electricidad) or any(var in entrada for var in var_Agua)) and
    any(var in entrada for var in var_Reducir)) or
    (any(var in entrada for var in var_Ampolleta) and any(var in entrada for var in var_Bajo) and
    any(var in entrada for var in var_Consumo)) or
    (any(var in entrada for var in var_Reciclaje) and any(var in entrada for var in var_MateriaPrima)) or
    any(var in entrada for var in var_EmpresaB) or
    (any(var in entrada for var in var_Comercio) and any(var in entrada for var in var_Justo))):
    Meta_12_1 = True
    print("Meta 12.1: Aplicar el Marco Decenal de Programas sobre Modalidades de Consumo y Produccion Sostenibles, con la participacion de todos los paises y bajo el liderazgo de los paises desarrollados, teniendo en cuenta el grado de desarrollo y las capacidades de los paises en desarrollo");
else:
    Meta_12_1 = False

#   ("ALGORITMO META 12.2")
# Meta_12_2 =   [(var_Gasto and var_Innecesario) or (var_Innecesario and var_Vivienda) or var_Reducir and var_Electricidad,
#               (var_Bono or var_Huella) and var_Carbono,
#               ((var_Gestion and var_Ingreso and var_Natural) or var_Agricultura) and var_Sostenible,
#               var_Compromiso and var_Ambiente,
#               var_Reciclaje and var_MateriaPrima]

if  ((((any(var in entrada for var in var_Gasto) and any(var in entrada for var in var_Innecesario)) or
    (any(var in entrada for var in var_Innecesario) and any(var in entrada for var in var_Vivienda)) or
    any(var in entrada for var in var_Reducir)) and any(var in entrada for var in var_Electricidad)) or
    ((any(var in entrada for var in var_Bono) or any(var in entrada for var in var_Huella)) and
    any(var in entrada for var in var_Carbono)) or
    (((any(var in entrada for var in var_Gestion) and any(var in entrada for var in var_Ingreso) and
    any(var in entrada for var in var_Natural)) or any(var in entrada for var in var_Agricultura)) and
    any(var in entrada for var in var_Sostenible)) or
    (any(var in entrada for var in var_Compromiso) and any(var in entrada for var in var_Ambiente)) or
    (any(var in entrada for var in var_Reciclaje) and any(var in entrada for var in var_MateriaPrima))):
    Meta_12_2 = True
    print("Meta 12.2: De aqui a 2030, lograr la gestion sostenible y el uso eficiente de los recursos naturales");
else:
    Meta_12_2 = False

#   ("ALGORITMO META 12.3")
# Meta_12_3 =   [(var_Sistema and var_Sostenible) or var_Perdida or (var_No and var_Consumo) or var_Desecho and var_Alimentos,
#               var_Perdida and var_MateriaPrima and var_Agroindustria]

if  ((((any(var in entrada for var in var_Sistema) and any(var in entrada for var in var_Sostenible)) or
    any(var in entrada for var in var_Perdida) or (any(var in entrada for var in var_No) and
    any(var in entrada for var in var_Consumo)) or any(var in entrada for var in var_Desecho)) and
    any(var in entrada for var in var_Alimentos)) or
    (any(var in entrada for var in var_Perdida) and any(var in entrada for var in var_MateriaPrima) and
    any(var in entrada for var in var_Agroindustria))):
    Meta_12_3 = True
    print("Meta 12.3: De aqui a 2030, reducir a la mitad el desperdicio de alimentos per capita mundial en la venta al por menor y a nivel de los consumidores y reducir las perdidas de alimentos en las cadenas de produccion y suministro, incluidas las perdidas posteriores a la cosecha");
else:
    Meta_12_3 = False

#   ("ALGORITMO META 12.4")
# Meta_12_4 =   [(var_Proteccion or var_Contaminacion or var_Tratamiento) and var_DesechoQuimico,
#               var_Tratamiento and var_Petroleo,
#               var_Desecho and var_Peligro]

if  (((any(var in entrada for var in var_Proteccion) or any(var in entrada for var in var_Contaminacion) or
    any(var in entrada for var in var_Tratamiento)) and any(var in entrada for var in var_DesechoQuimico)) or
    (any(var in entrada for var in var_Tratamiento) and any(var in entrada for var in var_Petroleo)) or
    (any(var in entrada for var in var_Desecho) and any(var in entrada for var in var_Peligro))):
    Meta_12_4 = True
    print("Meta 12.4: De aqui a 2020, lograr la gestion ecologicamente racional de los productos quimicos y de todos los desechos a lo largo de su ciclo de vida, de conformidad con los marcos internacionales convenidos, y reducir significativamente su liberacion a la atmosfera, el agua y el suelo a fin de minimizar sus efectos adversos en la salud humana y el medio ambiente");
else:
    Meta_12_4 = False

#   ("ALGORITMO META 12.5")
# Meta_12_5 =   [var_Limpio and var_Costa,
#               var_Reciclaje,
#               var_Minimo or var_Separar or var_Reducir and var_Basura]

if  ((any(var in entrada for var in var_Limpio) and any(var in entrada for var in var_Costa)) or
    any(var in entrada for var in var_Reciclaje) or
    ((any(var in entrada for var in var_Minimo) or any(var in entrada for var in var_Separar) or
    any(var in entrada for var in var_Reducir)) and any(var in entrada for var in var_Basura))):
    Meta_12_5 = True
    print("Meta 12.5: De aqui a 2030, reducir considerablemente la generacion de desechos mediante actividades de prevencion, reduccion, reciclado y reutilizacion");
else:
    Meta_12_5 = False

#   ("ALGORITMO META 12.6")
# Meta_12_6 =   [(var_Social or var_Ambiente or var_Sostenible) and var_Empresa,
#               var_Informacion and var_Sostenible]

if  (((any(var in entrada for var in var_Social) or any(var in entrada for var in var_Ambiente) or
    any(var in entrada for var in var_Sostenible)) and any(var in entrada for var in var_Empresa)) or
    (any(var in entrada for var in var_Informacion) and any(var in entrada for var in var_Sostenible))):
    Meta_12_6 = True
    print("Meta 12.6: Alentar a las empresas, en especial las grandes empresas y las empresas transnacionales, a que adopten practicas sostenibles e incorporen informacion sobre la sostenibilidad en su ciclo de presentacion de informes");
else:
    Meta_12_6 = False

#   ("ALGORITMO META 12.7")
# Meta_12_7 =   [(var_EnergiaRenovable or (var_Social and var_Responsabilidad) or var_Ambiente or var_Sostenible) and
#               ((var_Adquisicion and var_Publica) or (var_Contratacion and var_Publica) or (var_Licitacion and var_Publica))]

if  ((any(var in entrada for var in var_EnergiaRenovable) or (any(var in entrada for var in var_Social) and
    any(var in entrada for var in var_Responsabilidad)) or any(var in entrada for var in var_Ambiente) or
    any(var in entrada for var in var_Sostenible)) and ((any(var in entrada for var in var_Adquisicion) and
    any(var in entrada for var in var_Publica)) or (any(var in entrada for var in var_Contratacion) and
    any(var in entrada for var in var_Publica)) or (any(var in entrada for var in var_Licitacion) and
    any(var in entrada for var in var_Publica)))):
    Meta_12_7 = True
    print("Meta 12.7: Promover practicas de adquisicion publica que sean sostenibles, de conformidad con las politicas y prioridades nacionales");
else:
    Meta_12_7 = False

#   ("ALGORITMO META 12.8")
# Meta_12_8 =   [var_Concejo and var_Reducir and var_Electricidad,
#               (var_Reciclaje or (var_Gasto and var_Enchufe)) and var_Informacion,
#               var_Vida and var_Sostenible,
#               var_Consumo and var_Local,
#               var_Comercio and var_Justo,
#               var_Reducir and var_Basura]

if  ((any(var in entrada for var in var_Concejo) and any(var in entrada for var in var_Reducir) and
    any(var in entrada for var in var_Electricidad)) or
    (any(var in entrada for var in var_Reciclaje) or (any(var in entrada for var in var_Gasto) and
    any(var in entrada for var in var_Enchufe)) and any(var in entrada for var in var_Informacion)) or
    (any(var in entrada for var in var_Vida) and any(var in entrada for var in var_Sostenible)) or
    (any(var in entrada for var in var_Consumo) and any(var in entrada for var in var_Local)) or
    (any(var in entrada for var in var_Comercio) and any(var in entrada for var in var_Justo)) or
    (any(var in entrada for var in var_Reducir) and any(var in entrada for var in var_Basura))):
    Meta_12_8 = True
    print("Meta 12.8: De aqui a 2030, asegurar que las personas de todo el mundo tengan la informacion y los conocimientos pertinentes para el desarrollo sostenible y los estilos de vida en armonia con la naturaleza");
else:
    Meta_12_8 = False

#   ("ALGORITMO META 12.9")
# Meta_12_9 =   [((var_Capacidad and var_Ciencia) or var_Sostenible or var_Ambiente) and (var_PaisesEnDesarrollo and var_Tecnologia)

if  (((any(var in entrada for var in var_Capacidad) and any(var in entrada for var in var_Ciencia)) or
    any(var in entrada for var in var_Sostenible) or any(var in entrada for var in var_Ambiente)) and
    (any(var in entrada for var in var_PaisesEnDesarrollo) and any(var in entrada for var in var_Tecnologia))):
    Meta_12_9 = True
    print("Meta 12.9: Ayudar a los paises en desarrollo a fortalecer su capacidad cientifica y tecnologica para avanzar hacia modalidades de consumo y produccion mas sostenibles");
else:
    Meta_12_9 = False

#   ("ALGORITMO META 12.10")
# Meta_12_10 =  [(var_Identidad or var_Producto) and var_Local,
#               ((var_Impacto and var_Social) or var_Sostenible) and var_Turismo,
#               var_Sostenible and var_Sernatur,
#               var_Producto and var_Produccion and var_Zona,
#               var_Desarollar and var_Gastronomia and var_Region,
#               var_Ecoturismo]

if  (((any(var in entrada for var in var_Identidad) or any(var in entrada for var in var_Producto)) and 
    any(var in entrada for var in var_Local)) or any(var in entrada for var in var_CulturaLocal) or
    ((any(var in entrada for var in var_Impacto) and any(var in entrada for var in var_Social)) or
    any(var in entrada for var in var_Sostenible)) and any(var in entrada for var in var_Turismo) or
    (any(var in entrada for var in var_Sostenible) and any(var in entrada for var in var_Sernatur)) or
    ((any(var in entrada for var in var_Producto) and any(var in entrada for var in var_Produccion) and
    any(var in entrada for var in var_Zona))) or
    (any(var in entrada for var in var_Desarollar) and any(var in entrada for var in var_Gastronomia) and
    any(var in entrada for var in var_Region)) or
    any(var in entrada for var in var_Ecoturismo)):
    Meta_12_10 = True
    print("Meta 12.10: Elaborar y aplicar instrumentos para vigilar los efectos en el desarrollo sostenible, a fin de lograr un turismo sostenible que cree puestos de trabajo y promueva la cultura y los productos locales");
else:
    Meta_12_10 = False

#   ("ALGORITMO META 12.11")
# Meta_12_11 =  [((var_Reducir and var_Consumo) or var_Subvencion or var_Incentivo) and var_Petroleo]

if  (((any(var in entrada for var in var_Reducir) and any(var in entrada for var in var_Consumo)) or
    any(var in entrada for var in var_Subvencion) or any(var in entrada for var in var_Incentivo)) and
    any(var in entrada for var in var_Petroleo)):
    Meta_12_11 = True
    print("Meta 12.11: Racionalizar los subsidios ineficientes a los combustibles fosiles que fomentan el consumo antieconomico eliminando las distorsiones del mercado, de acuerdo con las circunstancias nacionales, incluso mediante la reestructuracion de los sistemas tributarios y la eliminacion gradual de los subsidios perjudiciales, cuando existan, para reflejar su impacto ambiental, teniendo plenamente en cuenta las necesidades y condiciones especificas de los paises en desarrollo y minimizando los posibles efectos adversos en su desarrollo, de manera que se proteja a los pobres y a las comunidades afectadas");
else:
    Meta_12_11 = False

if  (Meta_12_1 == True or Meta_12_2 == True or Meta_12_3 == True or Meta_12_4 == True or Meta_12_5 == True or Meta_12_6 == True or
    Meta_12_7 == True or Meta_12_8 == True or Meta_12_9 == True or Meta_12_10 == True or Meta_12_11 == True):
    print("ODS 12: Garantizar modalidades de consumo y produccion sostenibles")
    ODS_12 = True
else:
    ODS_12 = False

#-----------------------ALGORITMO ODS 13----------------------------------------

#   ("ALGORITMO META 13.1")
# Meta_13_1 =   [(var_Perdida and var_Economia) or (var_Perdida and var_Vida) or var_Adaptacion or var_Consecuencia or
#               var_Luchar or var_Resiliencia or var_Riesgo or var_Ayudar and var_DesastreNatural]

if  (((any(var in entrada for var in var_Perdida) and any(var in entrada for var in var_Economia)) or
    (any(var in entrada for var in var_Perdida) and any(var in entrada for var in var_Vida)) or
    any(var in entrada for var in var_Adaptacion) or any(var in entrada for var in var_Consecuencia) or
    any(var in entrada for var in var_Luchar) or any(var in entrada for var in var_Resiliencia) or
    any(var in entrada for var in var_Riesgo) or any(var in entrada for var in var_Ayudar)) and
    any(var in entrada for var in var_DesastreNatural)):
    Meta_13_1 = True
    print("Meta 13.1: Fortalecer la resiliencia y la capacidad de adaptacion a los riesgos relacionados con el clima y los desastres naturales en todos los paises");
else:
    Meta_13_1 = False

#   ("ALGORITMO META 13.2")
# Meta_13_2 =   [(var_Impacto or var_Bolsa) and var_Plastico,
#               (var_Parque or var_Costa or var_Basura) and var_Limpio,
#               var_Tribunal and var_Ambiente,
#               var_Conservacion and var_Biodiversidad,
#               var_Reducir and var_EfectoInvernadero,
#               var_Control and var_Contaminacion,
#               var_Sembrar and var_Forestal,
#               var_EnergiaRenovable]

if  (((any(var in entrada for var in var_Impacto) or any(var in entrada for var in var_Bolsa)) and
    any(var in entrada for var in var_Plastico)) or
    ((any(var in entrada for var in var_Parque) or any(var in entrada for var in var_Costa) or
    any(var in entrada for var in var_Basura)) and any(var in entrada for var in var_Limpio)) or
    (any(var in entrada for var in var_Tribunal) and any(var in entrada for var in var_Ambiente)) or
    (any(var in entrada for var in var_Conservacion) and any(var in entrada for var in var_Biodiversidad)) or
    (any(var in entrada for var in var_Reducir) and any(var in entrada for var in var_EfectoInvernadero)) or
    (any(var in entrada for var in var_Control) and any(var in entrada for var in var_Contaminacion)) or
    (any(var in entrada for var in var_Sembrar) and any(var in entrada for var in var_Forestal)) or
    any(var in entrada for var in var_EnergiaRenovable)):
    Meta_13_2 = True
    print("Meta 13.2: Incorporar medidas relativas al cambio climatico en las politicas, estrategias y planes nacionales");
else:
    Meta_13_2 = False

#   ("ALGORITMO META 13.3")
# Meta_13_3 =   [((var_Cambio and var_DesastreNatural) or (var_Impacto and var_Ambiente) or var_Reciclaje or var_Contaminacion) and
#               (var_Educacion or var_Plan),
#               (var_Serie or var_Informacion) and var_Ambiente,
#               var_Taller and var_Reciclaje,
#               var_Sensibilidad and var_DesastreNatural]

if  ((((any(var in entrada for var in var_Cambio) and any(var in entrada for var in var_DesastreNatural)) or

    (any(var in entrada for var in var_Impacto) and any(var in entrada for var in var_Ambiente)) or

    any(var in entrada for var in var_Reciclaje) or any(var in entrada for var in var_Contaminacion)) and
    (any(var in entrada for var in var_Educacion) or any(var in entrada for var in var_Plan))) or

    ((any(var in entrada for var in var_Serie) or any(var in entrada for var in var_Informacion)) and
    any(var in entrada for var in var_Ambiente)) or

    (any(var in entrada for var in var_Taller) and any(var in entrada for var in var_Reciclaje)) or
    (any(var in entrada for var in var_Sensibilidad) and any(var in entrada for var in var_DesastreNatural))):
    Meta_13_3 = True
    print("Meta 13.3: Mejorar la educacion, la sensibilizacion y la capacidad humana e institucional respecto de la mitigacion del cambio climatico, la adaptacion a el, la reduccion de sus efectos y la alerta temprana");
else:
    Meta_13_3 = False

#   ("ALGORITMO META 13.4")
# Meta_13_4 = [(var_Donacion or var_FondoVerde) and var_DesastreNatural]

if  ((any(var in entrada for var in var_Donacion) or any(var in entrada for var in var_FondoVerde)) and
    any(var in entrada for var in var_DesastreNatural)):
    Meta_13_4 = True
    print("Meta 13.4: Cumplir el compromiso de los paises desarrollados que son partes en la Convencion Marco de las Naciones Unidas sobre el Cambio Climatico de lograr para el ano 2020 el objetivo de movilizar conjuntamente 100.000 millones de dolares anuales procedentes de todas las fuentes a fin de atender las necesidades de los paises en desarrollo respecto de la adopcion de medidas concretas de mitigacion y la transparencia de su aplicacion, y poner en pleno funcionamiento el Fondo Verde para el Clima capitalizandolo lo antes posible");
else:
    Meta_13_4 = False

#   ("ALGORITMO META 13.5")
# Meta_13_5 = [var_Plan and var_DesastreNatural]

if  any(var in entrada for var in var_Plan) and any(var in entrada for var in var_DesastreNatural):
    Meta_13_5 = True
    print("Meta 13.5: Promover mecanismos para aumentar la capacidad para la planificacion y gestion eficaces en relacion con el cambio climatico en los paises menos adelantados y los pequenos Estados insulares en desarrollo, haciendo particular hincapie en las mujeres, los jovenes y las comunidades locales y marginada");
else:
    Meta_13_5 = False

if  (Meta_13_1 == True or Meta_13_2 == True or Meta_13_3 == True or Meta_13_4 == True or Meta_13_5 == True):
    print("ODS 13: Adoptar medidas urgentes para combatir el cambio climatico  y sus efectos")
    ODS_13 = True
else:
    ODS_13 = False

#-----------------------ALGORITMO ODS 14----------------------------------------

#   ("ALGORITMO META 14.1")
# Meta_14_1 =   [(var_Nutriente or var_Costa or var_Mar or var_Maritimo) and var_Contaminacion,
#               (var_Mar or var_Maritimo) and var_Basura,
#               var_Mar and var_Plastico]

if  (((any(var in entrada for var in var_Nutriente) or any(var in entrada for var in var_Costa) or
    any(var in entrada for var in var_Mar) or any(var in entrada for var in var_Maritimo)) and
    any(var in entrada for var in var_Contaminacion)) or
    ((any(var in entrada for var in var_Mar) or any(var in entrada for var in var_Maritimo)) and
    any(var in entrada for var in var_Basura)) or
    (any(var in entrada for var in var_Mar) and any(var in entrada for var in var_Plastico))):
    Meta_14_1 = True
    print("Meta 14.1: De aqui a 2025, prevenir y reducir significativamente la contaminacion marina de todo tipo, en particular la producida por actividades realizadas en tierra, incluidos los detritos marinos y la polucion por nutrientes");
else:
    Meta_14_1 = False

#   ("ALGORITMO META 14.2")
# Meta_14_2 =   [(var_Mar or var_Acuiferos or var_Costa) and var_Limpio,
#               var_Costa and var_Conservacion,
#               (var_Mar or var_Maritimo) and var_Proteccion,
#               var_Costa and var_Restauracion,
#               var_Erradicar and var_MalaPracticaPesquera,
#               var_Pesca and var_Delincuencia,
#               var_Extraccion and var_Delincuencia and var_Maritimo,
#               var_Degradar and var_Mar]

if  ((any(var in entrada for var in var_Mar) or any(var in entrada for var in var_Acuiferos) or
    any(var in entrada for var in var_Costa)) and any(var in entrada for var in var_Limpio) or
    (any(var in entrada for var in var_Costa) and any(var in entrada for var in var_Conservacion)) or
    ((any(var in entrada for var in var_Mar) or any(var in entrada for var in var_Maritimo)) and
    any(var in entrada for var in var_Proteccion)) or
    (any(var in entrada for var in var_Costa) and any(var in entrada for var in var_Restauracion)) or
    (any(var in entrada for var in var_Erradicar) and any(var in entrada for var in var_MalaPracticaPesquera)) or
    (any(var in entrada for var in var_Pesca) and any(var in entrada for var in var_Delincuencia)) or
    (any(var in entrada for var in var_Extraccion) and any(var in entrada for var in var_Delincuencia) and
    any(var in entrada for var in var_Maritimo)) or
    (any(var in entrada for var in var_Degradar) and any(var in entrada for var in var_Mar))):
    Meta_14_2 = True
    print("Meta 14.2: De aqui a 2020, gestionar y proteger sosteniblemente los ecosistemas marinos y costeros para evitar efectos adversos importantes, incluso fortaleciendo su resiliencia, y adoptar medidas para restaurarlos a fin de restablecer la salud y la productividad de los oceanos");
else:
    Meta_14_2 = False

#   ("ALGORITMO META 14.3")
# Meta_14_3 =   [(var_DioxidoDeCarbono or var_Carbono or var_Acidez) and var_Mar]

if  ((any(var in entrada for var in var_DioxidoDeCarbono) or any(var in entrada for var in var_Carbono) or
    any(var in entrada for var in var_Acidez)) and any(var in entrada for var in var_Mar)):
    Meta_14_3 = True
    print("Meta 14.3: Minimizar y abordar los efectos de la acidificacion de los oceanos, incluso mediante una mayor cooperacion cientifica a todos los niveles");
else:
    Meta_14_3 = False

#   ("ALGORITMO META 14.4")
# Meta_14_4 =   [(var_Armas and (var_Practica and var_Destruccion)) or var_Exceso or (var_Regulacion and var_Delincuencia) or
#               (var_Regulacion and var_Sobreexplotacion) and var_Pesca,
#               var_Regulacion and var_MalaPracticaPesquera,
#               var_Extraccion and var_Delincuencia]

if  ((((any(var in entrada for var in var_Armas) and (any(var in entrada for var in var_Practica) and
    any(var in entrada for var in var_Destruccion))) or any(var in entrada for var in var_Exceso) or
    (any(var in entrada for var in var_Regulacion) and any(var in entrada for var in var_Delincuencia)) or
    (any(var in entrada for var in var_Regulacion) and any(var in entrada for var in var_MalaPracticaPesquera))) and
    any(var in entrada for var in var_Pesca)) or
    (any(var in entrada for var in var_Regulacion) and  any(var in entrada for var in var_MalaPracticaPesquera)) or
    (any(var in entrada for var in var_Extraccion) and  any(var in entrada for var in var_Delincuencia))):
    Meta_14_4 = True
    print("Meta 14.4: De aqui a 2020, reglamentar eficazmente la explotacion pesquera y poner fin a la pesca excesiva, la pesca ilegal, no declarada y no reglamentada y las practicas pesqueras destructivas, y aplicar planes de gestion con fundamento cientifico a fin de restablecer las poblaciones de peces en el plazo mas breve posible, al menos alcanzando niveles que puedan producir el maximo rendimiento sostenible de acuerdo con sus caracteristicas biologicas");
else:
    Meta_14_4 = False

#   ("ALGORITMO META 14.5")
# Meta_14_5 =   [(var_Limpio or var_Restauracion or var_Conservacion) and var_Costa,
#               var_Proteccion and var_Maritimo]

if  (((any(var in entrada for var in var_Limpio) or any(var in entrada for var in var_Restauracion) or
    any(var in entrada for var in var_Conservacion)) and any(var in entrada for var in var_Costa)) or
    (any(var in entrada for var in var_Proteccion) and any(var in entrada for var in var_Maritimo))):
    Meta_14_5 = True
    print("Meta 14.5: De aqui a 2020, conservar al menos el 10% de las zonas costeras y marinas, de conformidad con las leyes nacionales y el derecho internacional y sobre la base de la mejor informacion cientifica disponible");
else:
    Meta_14_5 = False

#   ("ALGORITMO META 14.6")
# Meta_14_6 =   [(var_Exceso or var_Delincuencia or var_Subvencion) and var_Pesca]

if  ((any(var in entrada for var in var_Exceso) or any(var in entrada for var in var_Delincuencia) or
    any(var in entrada for var in var_Subvencion)) and any(var in entrada for var in var_Pesca)):
    Meta_14_6 = True
    print("Meta 14.6: De aqui a 2020, prohibir ciertas formas de subvenciones a la pesca que contribuyen a la sobrecapacidad y la pesca excesiva, eliminar las subvenciones que contribuyen a la pesca ilegal, no declarada y no reglamentada y abstenerse de introducir nuevas subvenciones de esa indole, reconociendo que la negociacion sobre las subvenciones a la pesca en el marco de la Organizacion Mundial del Comercio debe incluir un trato especial y diferenciado, apropiado y efectivo para los paises en desarrollo y los paises  menos adelantados");
else:
    Meta_14_6 = False

#   ("ALGORITMO META 14.7")
# Meta_14_7 =   [(var_Gestion and var_Sostenible) or (var_Uso and var_Eficiente) and var_Maritimo,
#               var_Sostenible or var_Evaluacion and var_Pesca]

if  ((((any(var in entrada for var in var_Gestion) and any(var in entrada for var in var_Sostenible)) or
    (any(var in entrada for var in var_Uso) and any(var in entrada for var in var_Eficiente))) and
    any(var in entrada for var in var_Maritimo)) or
    ((any(var in entrada for var in var_Sostenible) or any(var in entrada for var in var_Evaluacion)) and
    any(var in entrada for var in var_Pesca))):
    Meta_14_7 = True
    print("Meta 14.7: De aqui a 2030, aumentar los beneficios economicos que los pequenos Estados insulares en desarrollo y los paises menos adelantados obtienen del uso sostenible de los recursos marinos, en particular mediante la gestion sostenible de la pesca, la acuicultura y el turismo");
else:
    Meta_14_7 = False

#   ("ALGORITMO META 14.8")
# Meta_14_8 =   [var_CienciasNaturales or var_Analisis or var_Informacion or var_Tecnologia or var_Ciencia and var_Maritimo]

if  ((any(var in entrada for var in var_CienciasNaturales) or any(var in entrada for var in var_Analisis) or
    any(var in entrada for var in var_Informacion) or any(var in entrada for var in var_Tecnologia) or
    any(var in entrada for var in var_Ciencia)) and any(var in entrada for var in var_Maritimo)):
    Meta_14_8 = True
    print("Meta 14.8: Aumentar los conocimientos cientificos, desarrollar la capacidad de investigacion y transferir tecnologia marina, teniendo en cuenta los Criterios y Directrices para la Transferencia de Tecnologia Marina de la Comision Oceanografica Intergubernamental, a fin de mejorar la salud de los oceanos y potenciar la contribucion de la biodiversidad marina al desarrollo de los paises en desarrollo, en particular los pequenos Estados insulares en desarrollo y los paises menos adelantados");
else:
    Meta_14_8 = False

#   ("ALGORITMO META 14.9")
# Meta_14_9 =   [var_Barco and var_Artesanal,
#               (var_Artesanal or var_Tradicion or var_Asociatividad) and var_Pesca]

if  ((any(var in entrada for var in var_Barco) and any(var in entrada for var in var_Artesanal)) or
    ((any(var in entrada for var in var_Artesanal) or any(var in entrada for var in var_Tradicion) or
    any(var in entrada for var in var_Asociatividad)) and any(var in entrada for var in var_Pesca))):
    Meta_14_9 = True
    print("Meta 14.9: Facilitar el acceso de los pescadores artesanales a los recursos marinos y los mercados");
else:
    Meta_14_9 = False

#   ("ALGORITMO META 14.10")
# Meta_14_10 = [var_DerechosDelMar]

if  any(var in entrada for var in var_DerechosDelMar):
    Meta_14_10 = True
    print("Meta 14.10: Mejorar la conservacion y el uso sostenible de los oceanos y sus recursos aplicando el derecho internacional reflejado en la Convencion de las Naciones Unidas sobre el Derecho del Mar, que constituye el marco juridico para la conservacion y la utilizacion sostenible de los oceanos y sus recursos, como se recuerda en el parrafo 158 del documento 'El futuro que queremos'");
else:
    Meta_14_10 = False

if  (Meta_14_1 == True or Meta_14_2 == True or Meta_14_3 == True or Meta_14_4 == True or Meta_14_5 == True or
    Meta_14_6 == True or Meta_14_7 == True or Meta_14_8 == True or Meta_14_9 == True or Meta_14_10 == True):
    print("ODS 14: Conservar y utilizar sosteniblemente los oceanos,  los mares y los recursos marinos para el desarrollo sostenible")
    ODS_14 = True
else:
    ODS_14 = False

#-----------------------ALGORITMO ODS 15----------------------------------------

#   ("ALGORITMO META 15.1")
# Meta_15_1 =   [(var_Parque or var_Basura or var_AreasVerdes) and var_Limpio,
#               var_Conservacion and var_Biodiversidad,
#               var_Ecosistema and var_Sostenible,
#               var_Deforestar]

if  (((any(var in entrada for var in var_Parque) or any(var in entrada for var in var_Basura) or any(var in entrada for var in var_AreasVerdes)) and
    any(var in entrada for var in var_Limpio)) or
    (any(var in entrada for var in var_Conservacion) and any(var in entrada for var in var_Biodiversidad)) or
    (any(var in entrada for var in var_Ecosistema) and any(var in entrada for var in var_Sostenible)) or
    any(var in entrada for var in var_Deforestar)):
    Meta_15_1 = True
    print("Meta 15.1: De aqui a 2020, asegurar la conservacion, el restablecimiento y el uso sostenible de los ecosistemas terrestres y los ecosistemas interiores de agua dulce y sus servicios, en particular los bosques, los humedales, las montanas y las zonas aridas, en consonancia con las obligaciones contraidas en virtud de acuerdos internacionales");
else:
    Meta_15_1 = False

#   ("ALGORITMO META 15.2")
# Meta_15_2 =   [var_Tala and var_Seleccion,
#               ((var_Gestion and var_Sostenible) or var_Desarollar) and var_Sostenible)
#               (or var_Salud or var_Restauracion or var_Sembrar or (var_Uso and var_Sostenible) or var_nuevo) and var_Forestal,
#               var_Deforestar,
#               var_Ecoturismo]

if  ((any(var in entrada for var in var_Tala) and any(var in entrada for var in var_Seleccion)) or
    (((any(var in entrada for var in var_Gestion) and any(var in entrada for var in var_Sostenible)) or
    any(var in entrada for var in var_Desarollar)) and any(var in entrada for var in var_Sostenible)) or
    ((any(var in entrada for var in var_Salud) or any(var in entrada for var in var_Restauracion) or
    any(var in entrada for var in var_Sembrar) or (any(var in entrada for var in var_Uso) and any(var in entrada for var in var_Sostenible)) or 
    any(var in entrada for var in var_Nuevo)) and any(var in entrada for var in var_Forestal)) or
    any(var in entrada for var in var_Deforestar) or
    any(var in entrada for var in var_Ecoturismo)):
    Meta_15_2 = True
    print("Meta 15.2: De aqui a 2020, promover la puesta en practica de la gestion sostenible de todos los tipos de bosques, detener la deforestacion, recuperar los bosques degradados y aumentar considerablemente la forestacion y la reforestacion a nivel mundial");
else:
    Meta_15_2 = False

#   ("ALGORITMO META 15.3")
# Meta_15_3 =   [(var_Sequia or var_Inundacion) and var_Luchar,
#               var_Rehabilitar and var_Tierra,
#               var_Degradar and var_Tierra,
#               var_Sobreexplotacion and var_Acuiferos,
#               var_Oasificacion,
#               var_Desertificacion]

if  (((any(var in entrada for var in var_Sequia) or any(var in entrada for var in var_Inundacion)) and
    any(var in entrada for var in var_Luchar)) or
    (any(var in entrada for var in var_Rehabilitar) and any(var in entrada for var in var_Tierra)) or
    (any(var in entrada for var in var_Degradar) and any(var in entrada for var in var_Tierra)) or
    (any(var in entrada for var in var_Sobreexplotacion) and any(var in entrada for var in var_Acuiferos)) or
    any(var in entrada for var in var_Oasificacion) or
    any(var in entrada for var in var_Desertificacion)):
    Meta_15_3 = True
    print("Meta 15.3: De aqui a 2030, luchar contra la desertificacion, rehabilitar las tierras y los suelos degradados, incluidas las tierras afectadas por la desertificacion, la sequia y las inundaciones, y procurar lograr un mundo con efecto neutro en la degradacion de las tierras");
else:
    Meta_15_3 = False

#   ("ALGORITMO META 15.4")
# Meta_15_4=    [(var_Conservacion or var_Biodiversidad or var_Ecosistema) and var_Montana]

if  ((any(var in entrada for var in var_Conservacion) or any(var in entrada for var in var_Biodiversidad) or
    any(var in entrada for var in var_Ecosistema)) and any(var in entrada for var in var_Montana)):
    Meta_15_4 = True
    print("Meta 15.4: De aqui a 2030, asegurar la conservacion de los ecosistemas montanosos, incluida su diversidad biologica, a fin de mejorar su capacidad de proporcionar beneficios esenciales para el desarrollo sostenible");
else:
    Meta_15_4 = False

#   ("ALGORITMO META 15.5")
# Meta_15_5 =   [(var_Reproduccion and var_Cautiverio) or var_Conservacion or var_Proteccion and (var_Animales and var_Amenaza),
#               (var_Cautiverio and var_Delincuencia) or var_Defensa or (var_Evitar and var_Extinsion) and var_Animales,
#               var_Defensa and var_Flora,
#               var_Perdida and var_Biodiversidad,
#               var_Degradar and var_Habitat and var_Natural,
#               var_ListaRoja]

if  ((((any(var in entrada for var in var_Reproduccion) and any(var in entrada for var in var_Cautiverio)) or
    any(var in entrada for var in var_Conservacion) or any(var in entrada for var in var_Proteccion)) and
    (any(var in entrada for var in var_Animales) and any(var in entrada for var in var_Amenaza))) or
    (((any(var in entrada for var in var_Cautiverio) and any(var in entrada for var in var_Delincuencia)) or
    any(var in entrada for var in var_Defensa) or (any(var in entrada for var in var_Evitar) and
    any(var in entrada for var in var_Extinsion))) and any(var in entrada for var in var_Animales)) or
    (any(var in entrada for var in var_Defensa) and any(var in entrada for var in var_Flora)) or
    (any(var in entrada for var in var_Perdida) and any(var in entrada for var in var_Biodiversidad)) or
    (any(var in entrada for var in var_Degradar) and any(var in entrada for var in var_Habitat) and
    any(var in entrada for var in var_Natural)) or
    any(var in entrada for var in var_ListaRoja)):
    Meta_15_5 = True
    print("Meta 15.5: Adoptar medidas urgentes y significativas para reducir la degradacion de los habitats naturales, detener la perdida de biodiversidad y, de aqui a 2020, proteger las especies amenazadas y evitar su extincion");
else:
    Meta_15_5 = False

#   ("ALGORITMO META 15.6")
# Meta_15_6 =   [(var_Distribucion or var_Participacion) and (var_Igualdad and var_Beneficio and var_Ingreso and var_Genetica)]

if  ((any(var in entrada for var in var_Distribucion) or any(var in entrada for var in var_Participacion)) and
    (any(var in entrada for var in var_Igualdad) and any(var in entrada for var in var_Beneficio) and
    any(var in entrada for var in var_Ingreso) and any(var in entrada for var in var_Genetica))):
    Meta_15_6 = True
    print("Meta 15.6: Promover la participacion justa y equitativa en los beneficios derivados de la utilizacion de los recursos geneticos y promover el acceso adecuado a esos recursos, segun lo convenido internacionalmente");
else:
    Meta_15_6 = False

#   ("ALGORITMO META 15.7")
# Meta_15_7 =   [(var_Flora or var_Caza) and var_Delincuencia,
#               (var_Comercio and var_Exotico) or var_Violencia or var_Proteccion or var_Delincuencia and var_Animales]

if  (((any(var in entrada for var in var_Flora) or any(var in entrada for var in var_Caza)) and
    any(var in entrada for var in var_Delincuencia)) or
    (((any(var in entrada for var in var_Comercio) and any(var in entrada for var in var_Exotico)) or
    any(var in entrada for var in var_Violencia) or any(var in entrada for var in var_Proteccion) or
    any(var in entrada for var in var_Delincuencia)) and any(var in entrada for var in var_Animales))):
    Meta_15_7 = True
    print("Meta 15.7: Adoptar medidas urgentes para poner fin a la caza furtiva y el trafico de especies protegidas de flora y fauna y abordar tanto la demanda como la oferta de productos ilegales de flora y fauna silvestres");
else:
    Meta_15_7 = False

#   ("ALGORITMO META 15.8")
# Meta_15_8 =    [(var_Fuera and var_Habitat) or var_Aloctona or var_Introduccion or (var_Comercio and var_Invadir) or
#               (var_Comercio and var_Exotico) or (var_Erradicar and var_Invadir) or (var_Introduccion and var_Exotico)
#               and (var_Animales or var_Flora)

if  (((any(var in entrada for var in var_Fuera) and any(var in entrada for var in var_Habitat)) or
    any(var in entrada for var in var_Aloctona) or any(var in entrada for var in var_Introduccion) or
    (any(var in entrada for var in var_Comercio) and any(var in entrada for var in var_Invadir)) or
    (any(var in entrada for var in var_Comercio) and any(var in entrada for var in var_Exotico)) or
    (any(var in entrada for var in var_Erradicar) and any(var in entrada for var in var_Invadir)) or 
    any(var in entrada for var in var_nativo) or 
    (any(var in entrada for var in var_Introduccion) and any(var in entrada for var in var_Exotico))) and
    (any(var in entrada for var in var_Animales) or any(var in entrada for var in var_Flora))):
    Meta_15_8 = True
    print("Meta 15.8: De aqui a 2020, adoptar medidas para prevenir la introduccion de especies exoticas invasoras y reducir significativamente sus efectos en los ecosistemas terrestres y acuaticos y controlar o erradicar las especies prioritarias");
else:
    Meta_15_8 = False


#   ("ALGORITMO META 15.9")
# Meta_15_9 =   [((var_Plan and var_Nacion and var_Desarollar) or (var_Crecimiento and var_Economia) or
#               (var_Desarollar and var_Economia)) and (var_Ambiente)]

if  (((any(var in entrada for var in var_Plan) and any(var in entrada for var in var_Nacion) and
    any(var in entrada for var in var_Desarollar)) or (any(var in entrada for var in var_Crecimiento) and
    any(var in entrada for var in var_Economia)) or (any(var in entrada for var in var_Desarollar) and
    any(var in entrada for var in var_Economia))) and (any(var in entrada for var in var_Ambiente))):
    Meta_15_9 = True
    print("Meta 15.9: De aqui a 2020, integrar los valores de los ecosistemas y la biodiversidad en la planificacion, los procesos de desarrollo, las estrategias de reduccion de la pobreza y la contabilidad nacionales y locales");
else:
    Meta_15_9 = False

#   ("ALGORITMO META 15.10")
# Meta_15_10 =  [(var_Recaudacion or var_Publico or var_Privado) and (var_Ingreso and var_Ambiente),
#               (var_Ecosistema or var_Conservacion) and (var_Financiamiento and var_Biodiversidad),
#               ((var_Proteccion and var_Biodiversidad) or (var_Conservacion and var_Ambiente)) and var_Financiamiento]

if  (((any(var in entrada for var in var_Recaudacion) or any(var in entrada for var in var_Publico) or
    any(var in entrada for var in var_Privado)) and (any(var in entrada for var in var_Ingreso) and
    any(var in entrada for var in var_Ambiente))) or
    ((any(var in entrada for var in var_Ecosistema) or any(var in entrada for var in var_Conservacion)) and
    (any(var in entrada for var in var_Financiamiento) and any(var in entrada for var in var_Biodiversidad))) or
    (((any(var in entrada for var in var_Proteccion) and any(var in entrada for var in var_Biodiversidad)) or
    (any(var in entrada for var in var_Conservacion) and any(var in entrada for var in var_Ambiente))) and
    any(var in entrada for var in var_Financiamiento))):
    Meta_15_10 = True
    print("Meta 15.10: Movilizar y aumentar significativamente los recursos financieros procedentes de todas las fuentes para conservar y utilizar de forma sostenible la biodiversidad y los ecosistemas");
else:
    Meta_15_10 = False

#   ("ALGORITMO META 15.11")
# Meta_15_11 =  [(var_Forestal and var_Sostenible) or (var_Reforestar and var_Financiamiento)]

if  ((any(var in entrada for var in var_Forestal) and any(var in entrada for var in var_Sostenible)) or
    (any(var in entrada for var in var_Reforestar) and any(var in entrada for var in var_Financiamiento))):
    Meta_15_11 = True
    print("Meta 15.11: Movilizar recursos considerables de todas las fuentes y a todos los niveles para financiar la gestion forestal sostenible y proporcionar incentivos adecuados a los paises en desarrollo para que promuevan dicha gestion, en particular con miras a la conservacion y la reforestacion");
else:
    Meta_15_11 = False

#   ("ALGORITMO META 15.12")
# Meta_15_12 =  [(var_Flora or var_Caza) and var_Delincuencia,
#               (var_Comercio and var_Exotico) or var_Proteccion or var_Delincuencia and var_Animales]

if  (((any(var in entrada for var in var_Flora) or any(var in entrada for var in var_Caza)) and
    any(var in entrada for var in var_Delincuencia)) or
    (((any(var in entrada for var in var_Comercio) and any(var in entrada for var in var_Exotico)) or
    any(var in entrada for var in var_Proteccion) or any(var in entrada for var in var_Delincuencia)) and
    any(var in entrada for var in var_Animales))):
    Meta_15_12 = True
    print("Meta 15.12: Aumentar el apoyo mundial a la lucha contra la caza furtiva y el trafico de especies protegidas, incluso aumentando la capacidad de las comunidades locales para perseguir oportunidades de subsistencia sostenibles");
else:
    Meta_15_12 = False

if  (Meta_15_1 == True or Meta_15_2 == True or Meta_15_3 == True or Meta_15_4 == True or Meta_15_5 == True or Meta_15_6 == True or
    Meta_15_7 == True or Meta_15_8 == True or Meta_15_9 == True or Meta_15_10 == True or Meta_15_11 == True or     Meta_15_12 == True):
    print("ODS 15: Proteger, restablecer y promover el uso sostenible de los ecosistemas terrestres, gestionar sosteniblemente los bosques, luchar contra la desertificacion, detener e invertir la degradacion de las tierras y detener la perdida de biodiversida")
    ODS_15 = True
else:
    ODS_15 = False


#-----------------------ALGORITMO ODS 16----------------------------------------

#   ("ALGORITMO META 16.1")
# Meta_16_1 =   [var_Violencia,
#               var_Suicidio,
#               var_Guerra,
#               var_Muerte,
#               var_ViolenciaMujer]

if  (any(var in entrada for var in var_Violencia) or
    any(var in entrada for var in var_Suicidio) or
    any(var in entrada for var in var_Guerra) or
    any(var in entrada for var in var_Muerte) or
    any(var in entrada for var in var_ViolenciaMujer)):
    Meta_16_1 = True
    print("Meta 16.1: Reducir significativamente todas las formas de violencia y las correspondientes tasas de mortalidad en todo el mundo");
else:
    Meta_16_1 = False

#   ("ALGORITMO META 16.2")
# Meta_16_2 =   [(var_Esclavo or var_Delincuencia or var_Explotacion or var_Muerte or var_Violencia) and var_Nino,
#               (var_Estudiante or var_Sexualidad) and var_Violencia,
#               var_Bulling]

if  (((any(var in entrada for var in var_Esclavo) or any(var in entrada for var in var_Delincuencia) or
    any(var in entrada for var in var_Explotacion) or any(var in entrada for var in var_Muerte) or
    any(var in entrada for var in var_Violencia)) and any(var in entrada for var in var_Nino)) or
    ((any(var in entrada for var in var_Estudiante) or any(var in entrada for var in var_Sexualidad)) and
    any(var in entrada for var in var_Violencia)) or
    any(var in entrada for var in var_Bulling)):
    Meta_16_2 = True
    print("Meta 16.2: Poner fin al maltrato, la explotacion, la trata y todas las formas de violencia y tortura contra los ninos");
else:
    Meta_16_2 = False

#   ("ALGORITMO META 16.3")
# Meta_16_3 =   [(var_Penal and var_Publica) or var_Deuda and var_Defensa,
#               (var_Charla or var_Clinica or var_Peritaje or var_Audiencia or var_Atencion or var_Asesoria) and var_Judicial,
#               (var_Defensa or var_Ley or var_Asesoria) and var_Laboral,
#               (var_Civil or var_Constitucion) and var_Derecho,
#               var_Ciudades and var_Democracia]

if  ((((any(var in entrada for var in var_Penal) and any(var in entrada for var in var_Publica)) or
    any(var in entrada for var in var_Deuda)) and any(var in entrada for var in var_Defensa)) or
    ((any(var in entrada for var in var_Charla) or any(var in entrada for var in var_Clinica) or
    any(var in entrada for var in var_Peritaje) or any(var in entrada for var in var_Audiencia) or
    any(var in entrada for var in var_Atencion) or any(var in entrada for var in var_Asesoria)) and
    any(var in entrada for var in var_Judicial)) or
    ((any(var in entrada for var in var_Defensa) or any(var in entrada for var in var_Ley) or
    any(var in entrada for var in var_Asesoria)) and any(var in entrada for var in var_Laboral)) or
    ((any(var in entrada for var in var_Civil) or any(var in entrada for var in var_Constitucion))
    and any(var in entrada for var in var_Derecho)) or
    ((any(var in entrada for var in var_Civil) or any(var in entrada for var in var_Constitucion))
    and any(var in entrada for var in var_Derecho)) or
    (any(var in entrada for var in var_Ciudades) and any(var in entrada for var in var_Democracia))):
    Meta_16_3 = True
    print("Meta 16.3: Promover el estado de derecho en los planos nacional e internacional y garantizar la igualdad de acceso a la justicia para todos");
else:
    Meta_16_3 = False

#   ("ALGORITMO META 16.4")
# Meta_16_4 =   [(var_Delincuencia or var_Droga or var_Incautar or var_Comercio) and var_Armas,
#               var_Delincuencia and var_Organizada]

if  (((any(var in entrada for var in var_Delincuencia) or any(var in entrada for var in var_Droga) or
    any(var in entrada for var in var_Incautar) or any(var in entrada for var in var_Comercio)) and
    any(var in entrada for var in var_Armas)) or
    (any(var in entrada for var in var_Delincuencia) and any(var in entrada for var in var_Organizada))):
    Meta_16_4 = True
    print("Meta 16.4: De aqui a 2030, reducir significativamente las corrientes financieras y de armas ilicitas, fortalecer la recuperacion y devolucion de los activos robados y luchar contra todas las formas de delincuencia organizadas");
else:
    Meta_16_4 = False

#   ("ALGORITMO META 16.5")
# Meta_16_5 =   [var_Corrupcion,
#               var_Financiamiento and var_Delincuencia and var_Ley]

if  (any(var in entrada for var in var_Corrupcion) or
    (any(var in entrada for var in var_Financiamiento) and any(var in entrada for var in var_Delincuencia) and
    any(var in entrada for var in var_Ley))):
    Meta_16_5 = True
    print("Meta 16.5: Reducir considerablemente la corrupcion y el soborno en todas sus formas");
else:
    Meta_16_5 = False

#   ("ALGORITMO META 16.6")
# Meta_16_6 =   [(var_Eficiente or var_Fortalecimiento or var_RendicionDeCuenta) and var_Institucion,
#               (var_Concejo or var_Chile or var_Comite or var_Portal or var_Ley or var_Institucion or var_Publica) and var_Transparencia,
#               var_Servicio and var_Publico and var_Eficiente,
#               var_Autoridad and var_CuentaPublica,
#               var_Acceso and var_Informacion and var_Publica]

if  (((any(var in entrada for var in var_Eficiente) or any(var in entrada for var in var_Fortalecimiento) or 
    any(var in entrada for var in var_RendicionDeCuenta)) and
    any(var in entrada for var in var_Institucion)) or
    ((any(var in entrada for var in var_Concejo) or any(var in entrada for var in var_Chile) or
    any(var in entrada for var in var_Comite) or any(var in entrada for var in var_Portal) or
    any(var in entrada for var in var_Ley) or any(var in entrada for var in var_Institucion) or 
    any(var in entrada for var in var_Publica)) and any(var in entrada for var in var_Transparencia)) or
    (any(var in entrada for var in var_Servicio) and any(var in entrada for var in var_Publico) and
    any(var in entrada for var in var_Eficiente)) or
    (any(var in entrada for var in var_Autoridad) and any(var in entrada for var in var_CuentaPublica)) or
    (any(var in entrada for var in var_Acceso) and any(var in entrada for var in var_Informacion) and
    any(var in entrada for var in var_Publica))):
    Meta_16_6 = True
    print("Meta 16.6: Crear a todos los niveles instituciones eficaces y transparentes que rindan cuentas");
else:
    Meta_16_6 = False

#   ("ALGORITMO META 16.7")
# Meta_16_7 =   [(var_Representatividad or var_Participacion or var_Inclusion) and var_Decidir,
#               (var_Participacion or var_Ambiente or var_Inclusion) and var_Ley]

if  (((any(var in entrada for var in var_Representatividad) or any(var in entrada for var in var_Participacion) or
    any(var in entrada for var in var_Inclusion)) and any(var in entrada for var in var_Decidir)) or
    ((any(var in entrada for var in var_Participacion) or any(var in entrada for var in var_Ambiente) or
    any(var in entrada for var in var_Inclusion)) and any(var in entrada for var in var_Ley))):
    Meta_16_7 = True
    print("Meta 16.7: Garantizar la adopcion en todos los niveles de decisiones inclusivas, participativas y representativas que respondan a las necesidades");
else:
    Meta_16_7 = False

#   ("ALGORITMO META 16.8")
# Meta_16_8 =   [((var_Institucion and var_Internacional) or var_InstitucionesMundiales) and var_Participacion]

if  (((any(var in entrada for var in var_Institucion) and any(var in entrada for var in var_Internacional)) or
    any(var in entrada for var in var_InstitucionesMundiales)) and any(var in entrada for var in var_Participacion)):
    Meta_16_8 = True
    print("Meta 16.8: Ampliar y fortalecer la participacion de los paises en desarrollo en las instituciones de gobernanza mundial");
else:
    Meta_16_8 = False

#   ("ALGORITMO META 16.9")
# Meta_16_9 =   [var_Identidad and var_Judicial,
#               var_Derecho and var_Nombre and var_Propiedad]

if  (any(var in entrada for var in var_Identidad) and any(var in entrada for var in var_Judicial) or
    (any(var in entrada for var in var_Derecho) and any(var in entrada for var in var_Nombre) and
    any(var in entrada for var in var_Propiedad))):
    Meta_16_9 = True
    print("Meta 16.9: De aqui a 2030, proporcionar acceso a una identidad juridica para todos, en particular mediante el registro de nacimientos");
else:
    Meta_16_9 = False

#   ("ALGORITMO META 16.10")
# Meta_16_10 =  [(var_Acceso and var_Informacion and var_Publica) or
#               (var_Padre and var_Educacion and var_Nino) or var_Conciencia or var_Prensa or var_Religion or var_Expresion or
#               var_Fundamental and var_Libertad,
#               var_Solicitud and var_Transparencia,
#               var_Circulacion or var_Reunion and var_Derecho]

if  ((any(var in entrada for var in var_Acceso) and any(var in entrada for var in var_Informacion) and 
    any(var in entrada for var in var_Publica)) or
    (((any(var in entrada for var in var_Padre) and any(var in entrada for var in var_Educacion) and
    any(var in entrada for var in var_Nino)) or any(var in entrada for var in var_Conciencia) or
    any(var in entrada for var in var_Prensa) or any(var in entrada for var in var_Religion) or
    any(var in entrada for var in var_Expresion) or any(var in entrada for var in var_Fundamental)) and
    any(var in entrada for var in var_Libertad)) or
    (any(var in entrada for var in var_Solicitud) and any(var in entrada for var in var_Transparencia)) or
    (((any(var in entrada for var in var_Circulacion) or any(var in entrada for var in var_Reunion)) and
    any(var in entrada for var in var_Derecho)))):
    Meta_16_10 = True
    print("Meta 16.10: Garantizar el acceso publico a la informacion y proteger las libertades fundamentales, de conformidad con las leyes nacionales y los acuerdos internacionales");
else:
    Meta_16_10 = False

#   ("ALGORITMO META 16.11")
# Meta_16_11 =  [var_Delincuencia,
#               var_Terrorismo]

if  (any(var in entrada for var in var_Delincuencia) or
    any(var in entrada for var in var_Terrorismo)):
    Meta_16_11 = True
    print("Meta 16.11: Fortalecer las instituciones nacionales pertinentes, incluso mediante la cooperacion internacional, para crear a todos los niveles, particularmente en los paises en desarrollo, la capacidad de prevenir la violencia y combatir el terrorismo y la delincuencia");
else:
    Meta_16_11 = False

#   ("ALGORITMO META 16.12")

# Meta_16_12 = [(var_Ley or var_Plan) and (var_Desarrollar and var_Sostenible)]

if ((any(var in entrada for var in var_Ley) or any(var in entrada for var in var_Plan)) and 
    (any(var in entrada for var in var_Desarollar) and (any(var in entrada for var in var_Sostenible)))):
    Meta_16_12 = True
    print("Meta 16.12: Promover y aplicar leyes y politicas no discriminatorias en favor del desarrollo sostenible");
else:
    Meta_16_12 = False


if  (Meta_16_1 == True or Meta_16_2 == True or Meta_16_3 == True or Meta_16_4 == True or Meta_16_5 == True or Meta_16_6 == True or
    Meta_16_7 == True or Meta_16_8 == True or Meta_16_9 == True or Meta_16_10 == True or Meta_16_11 == True or Meta_16_12 == True):
    print("ODS 16: Promover sociedades pacificas e inclusivas para el desarrrollo sostenible, facilitar el acceso a la justicia para todos y construir a todos los niveles instituciones eficaces e inclusivas  que rindan cuentas")
    ODS_16 = True
else:
    ODS_16 = False

#-----------------------ALGORITMO ODS 17----------------------------------------

#   ("ALGORITMO META 17.1")
# Meta_17_1 =   [var_Recaudacion and var_Impuesto,
#               (var_Ingreso or var_Recaudacion) and var_Fisco]

if  ((any(var in entrada for var in var_Recaudacion) and any(var in entrada for var in var_Impuesto)) or
    ((any(var in entrada for var in var_Ingreso) or any(var in entrada for var in var_Recaudacion)) and
    any(var in entrada for var in var_Fisco))):
    Meta_17_1 = True
    print("Meta 17.1: Fortalecer la movilizacion de recursos internos, incluso mediante la prestacion de apoyo internacional a los paises en desarrollo, con el fin de mejorar la capacidad nacional para recaudar ingresos fiscales y de otra indole");
else:
    Meta_17_1 = False

#   ("ALGORITMO META 17.2")
# Meta_17_2 =   [var_Asistencia and var_Desarollar and var_PaisesEnDesarrollo]

if  any(var in entrada for var in var_Recaudacion) and any(var in entrada for var in var_Impuesto):
    Meta_17_2 = True
    print("Meta 17.2: Velar por que los paises desarrollados cumplan plenamente sus compromisos en relacion con la asistencia oficial para el desarrollo, incluido el compromiso de numerosos paises desarrollados de alcanzar el objetivo de destinar el 0,7% del ingreso nacional bruto a la asistencia oficial para el desarrollo de los paises en desarrollo y entre  el 0,15% y el 0,20% del ingreso nacional bruto a la asistencia oficial para el desarrollo de los paises menos adelantados; se alienta a los proveedores de asistencia oficial para el desarrollo a que consideren la posibilidad de fijar una meta para destinar al menos el 0,20% del ingreso nacional bruto a la asistencia oficial para el desarrollo de los paises menos adelantados");
else:
    Meta_17_2 = False

#   ("ALGORITMO META 17.3")
# Meta_17_3 =   [(var_Donacion or var_Ingreso) and var_PaisesEnDesarrollo]

if  ((any(var in entrada for var in var_Donacion) or any(var in entrada for var in var_Ingreso)) and
    any(var in entrada for var in var_PaisesEnDesarrollo)):
    Meta_17_3 = True
    print("Meta 17.3: Movilizar recursos financieros adicionales de multiples fuentes para los paises en desarrollo");
else:
    Meta_17_3 = False

#   ("ALGORITMO META 17.4")
# Meta_17_4 =   [var_Contribucion and var_Sostenible and var_Deuda and var_PaisesEnDesarrollo]

if  (any(var in entrada for var in var_Contribucion) and any(var in entrada for var in var_Sostenible) and
    any(var in entrada for var in var_Deuda) and any(var in entrada for var in var_PaisesEnDesarrollo)):
    Meta_17_4 = True
    print("Meta 17.4: Ayudar a los paises en desarrollo a lograr la sostenibilidad de la deuda a largo plazo con politicas coordinadas orientadas a fomentar la financiacion, el alivio y la reestructuracion de la deuda, segun proceda, y hacer frente a la deuda externa de los paises pobres muy endeudados a fin de reducir el endeudamiento excesivo");
else:
    Meta_17_4 = False

#   ("ALGORITMO META 17.5")
# Meta_17_5 =   [var_Inversion and var_PaisesEnDesarrollo]

if  any(var in entrada for var in var_Inversion) and any(var in entrada for var in var_PaisesEnDesarrollo):
    Meta_17_5 = True
    print("Meta 17.5: Adoptar y aplicar sistemas de promocion de las inversiones en favor de los paises menos adelantados");
else:
    Meta_17_5 = False

#   ("ALGORITMO META 17.6")
# Meta_17_6 =   [(var_Asociatividad and var_Desarollar and var_Tecnologia) or (var_Asociatividad and var_Innovacion) or
#               (var_Asociatividad and var_Ciencia) or (var_Emprendimiento and var_Tecnologia) and var_Internacional]

if  (any(var in entrada for var in var_Asociatividad) and any(var in entrada for var in var_Desarollar) and
    any(var in entrada for var in var_Tecnologia)) or (any(var in entrada for var in var_Asociatividad) and
    any(var in entrada for var in var_Innovacion)) or (any(var in entrada for var in var_Asociatividad) and
    any(var in entrada for var in var_Ciencia)) or (any(var in entrada for var in var_Emprendimiento) and
    any(var in entrada for var in var_Tecnologia)) and any(var in entrada for var in var_Internacional):
    Meta_17_6 = True
    print("Meta 17.6: Mejorar la cooperacion regional e internacional Norte- Sur, Sur-Sur y triangular en materia de ciencia, tecnologia e innovacion y el acceso a estas, y aumentar el intercambio de conocimientos en condiciones mutuamente convenidas, incluso mejorando la coordinacion entre los mecanismos ");
else:
    Meta_17_6 = False

#   ("ALGORITMO META 17.7")
# Meta_17_7 =   [var_Ciencia and var_Vida and var_Mar,
#               var_Tecnologia and var_Ambiente]

if  ((any(var in entrada for var in var_Ciencia) and any(var in entrada for var in var_Vida) and
    any(var in entrada for var in var_Mar)) or
    (any(var in entrada for var in var_Tecnologia) and any(var in entrada for var in var_Ambiente))):
    Meta_17_7 = True
    print("Meta 17.7: Promover el desarrollo de tecnologias ecologicamente racionales y su transferencia, divulgacion y difusion a los paises en desarrollo en condiciones favorables, incluso en condiciones concesionarias y preferenciales, segun lo convenido de mutuo acuerdo");
else:
    Meta_17_7 = False

#   ("ALGORITMO META 17.8")
# Meta_17_8 =   [(var_Ciencia or var_Tecnologia) and var_PaisesEnDesarrollo,
#               var_Banco and var_Tecnologia]

if  (((any(var in entrada for var in var_Ciencia) or any(var in entrada for var in var_Tecnologia)) and
    any(var in entrada for var in var_PaisesEnDesarrollo)) or
    (any(var in entrada for var in var_Banco) and any(var in entrada for var in var_Tecnologia))):
    Meta_17_8 = True
    print("Meta 17.8: Poner en pleno funcionamiento, a mas tardar en 2017, el banco de tecnologia y el mecanismo de apoyo a la creacion de capacidad en materia de ciencia, tecnologia e innovacion para los paises menos adelantados y aumentar la utilizacion de tecnologias instrumentales, en particular la tecnologia de la informacion y las comunicaciones");
else:
    Meta_17_8 = False

#   ("ALGORITMO META 17.9")
# Meta_17_9 =   [var_PaisesOceanicos or var_PaisesCentroAmericanos or var_PaisesNorteAmericano or
#               var_PaisesEuropeos or var_PaisesAfricanos or var_PaisesSudamericano and (var_Universidad and var_Curso)]

if  ((any(var in entrada for var in var_PaisesOceanicos) or any(var in entrada for var in var_PaisesCentroAmericanos) or
    any(var in entrada for var in var_PaisesNorteAmericano) or any(var in entrada for var in var_PaisesEuropeos) or
    any(var in entrada for var in var_PaisesAfricanos) or any(var in entrada for var in var_PaisesSudamericano)) and
    (any(var in entrada for var in var_Universidad) and any(var in entrada for var in var_Curso))):
    Meta_17_9 = True
    print("Meta 17.9: Aumentar el apoyo internacional para realizar actividades de creacion de capacidad eficaces y especificas en los paises en desarrollo a fin de respaldar los planes nacionales de implementacion de todos los Objetivos de Desarrollo Sostenible, incluso mediante la cooperacion Norte-Sur, Sur-Sur y triangular");
else:
    Meta_17_9 = False

#   ("ALGORITMO META 17.10")
# Meta_17_10 =  [var_Comercio and var_Justo]

if  any(var in entrada for var in var_Comercio) and any(var in entrada for var in var_Justo):
    Meta_17_10 = True
    print("Meta 17.10: Promover un sistema de comercio multilateral universal, basado en normas, abierto, no discriminatorio y equitativo en el marco de la Organizacion Mundial del Comercio, incluso mediante la conclusion de las negociaciones en el marco del Programa de Doha para el Desarrollo");
else:
    Meta_17_10 = False

#   ("ALGORITMO META 17.11")
# Meta_17_11 =  [var_Exportacion and var_PaisesEnDesarrollo]

if  any(var in entrada for var in var_Exportacion) and any(var in entrada for var in var_PaisesEnDesarrollo):
    Meta_17_11 = True
    print("Meta 17.11: Aumentar significativamente las exportaciones de los paises en desarrollo, en particular con miras a duplicar la participacion de los paises menos adelantados en las exportaciones mundiales de aqui a 2020");
else:
    Meta_17_11 = False

#   ("ALGORITMO META 17.12")
# Meta_17_12 =  [var_Acceso and var_Comercio and var_Libertad and var_Derecho]

if  (any(var in entrada for var in var_Acceso) and any(var in entrada for var in var_Comercio) and
    any(var in entrada for var in var_Libertad) and any(var in entrada for var in var_Derecho)):
    Meta_17_12 = True
    print("Meta 17.12: Lograr la consecucion oportuna del acceso a los mercados libre de derechos y contingentes de manera duradera para todos los paises menos adelantados, conforme a las decisiones de la Organizacion Mundial del Comercio, incluso velando por que las normas de origen preferenciales aplicables a las importaciones de los paises menos adelantados sean transparentes y sencillas y contribuyan a facilitar el acceso a los mercados");
else:
    Meta_17_12 = False

#   ("ALGORITMO META 17.13")
# Meta_17_13 =  [var_Estabilidad and var_Economia and var_Internacional]

if  (any(var in entrada for var in var_Estabilidad) and any(var in entrada for var in var_Economia) and
    any(var in entrada for var in var_Internacional)):
    Meta_17_13 = True
    print("Meta 17.13: Aumentar la estabilidad macroeconomica mundial, incluso mediante la coordinacion y coherencia de las politicas");
else:
    Meta_17_13 = False

#   ("ALGORITMO META 17.14")
# Meta_17_14 =  [var_Ley and var_Desarollar and var_Sostenible]

if  (any(var in entrada for var in var_Ley) and any(var in entrada for var in var_Desarollar) and
    any(var in entrada for var in var_Sostenible)):
    Meta_17_14 = True
    print("Meta 17.14: Mejorar la coherencia de las politicas para el desarrollo sostenible");
else:
    Meta_17_14 = False

#   ("ALGORITMO META 17.15")
# Meta_17_15 =  [var_Respetar and var_Ley and var_Diario]

if  (any(var in entrada for var in var_Respetar) and any(var in entrada for var in var_Ley) and
    any(var in entrada for var in var_Diario)):
    Meta_17_15 = True
    print("Meta 17.15: Respetar el margen normativo y el liderazgo de cada pais para establecer y aplicar politicas de erradicacion de la pobreza y desarrollo sostenible");
else:
    Meta_17_15 = False

#   ("ALGORITMO META 17.16")
# Meta_17_16 =  [var_Alianza and var_Internacional and var_Desarollar and var_Sostenible]

if  (any(var in entrada for var in var_Alianza) and any(var in entrada for var in var_Internacional) and
    any(var in entrada for var in var_Desarollar) and any(var in entrada for var in var_Sostenible)):
    Meta_17_16 = True
    print("Meta 17.16: Mejorar la Alianza Mundial para el Desarrollo Sostenible, complementada por alianzas entre multiples interesados que movilicen e intercambien conocimientos, especializacion, tecnologia y recursos financieros, a fin de apoyar el logro de los Objetivos de Desarrollo Sostenible en todos los paises, particularmente los paises en desarrollo");
else:
    Meta_17_16 = False

#   ("ALGORITMO META 17.17")
# Meta_17_17 =  [(var_Concejo and var_Ciudadano) or var_Alianza or ((var_Firmar or var_suscribir) and var_Convenio)]

if  ((any(var in entrada for var in var_Concejo) and any(var in entrada for var in var_Ciudadano)) or
    any(var in entrada for var in var_Alianza) or
    (any(var in entrada for var in var_Firmar) or any(var in entrada for var in var_Suscribir)) and any(var in entrada for var in var_Convenio)):
    Meta_17_17 = True
    print("Meta 17.17: Fomentar y promover la constitucion de alianzas eficaces en las esferas publica, publico-privada y de la sociedad civil, aprovechando la experiencia y las estrategias de obtencion de recursos de las alianzas");
else:
    Meta_17_17 = False

#   ("ALGORITMO META 17.18")
# Meta_17_18 =  [(var_Estadistico or var_Dato) and var_Generacion]

if  ((any(var in entrada for var in var_Estadistico) or any(var in entrada for var in var_Dato)) and
    any(var in entrada for var in var_Generacion)):
    Meta_17_18 = True
    print("Meta 17.18: De aqui a 2020, mejorar el apoyo a la creacion de capacidad prestado a los paises en desarrollo, incluidos los paises menos adelantados y los pequenos Estados insulares en desarrollo, para aumentar significativamente la disponibilidad de datos oportunos, fiables y de gran calidad desglosados por ingresos, sexo, edad, raza, origen etnico, estatus migratorio, discapacidad, ubicacion geografica y otras caracteristicas pertinentes en los contextos nacionales");
else:
    Meta_17_18 = False

#   ("ALGORITMO META 17.19")
# Meta_17_19 =  [var_Indicador or var_Medicion and (var_Desarollar and var_Sostenible)]

if  ((any(var in entrada for var in var_Indicador) or any(var in entrada for var in var_Medicion)) and
    (any(var in entrada for var in var_Desarollar) and any(var in entrada for var in var_Sostenible))):
    Meta_17_19 = True
    print("Meta 17.19: De aqui a 2030, aprovechar las iniciativas existentes para elaborar indicadores que permitan medir los progresos en materia de desarrollo sostenible y complementen el producto interno bruto, y apoyar la creacion de capacidad estadistica en los paises en desarrollo");
else:
    Meta_17_19 = False

if  (Meta_17_1 == True or Meta_17_2 == True or Meta_17_3 == True or Meta_17_4 == True or Meta_17_5 == True or Meta_17_6 == True or
    Meta_17_7 == True or Meta_17_8 == True or Meta_17_9 == True or Meta_17_10 == True or Meta_17_11 == True or Meta_17_12 == True or
    Meta_17_13 == True or Meta_17_14 == True or Meta_17_15 == True or Meta_17_16 == True or Meta_17_17 == True or Meta_17_18 == True or
    Meta_17_19 == True ):
    print("ODS 17: Fortalecer los medios de implementacion y revitalizar la Alianza Mundial para el Desarrollo Sostenible")
    ODS_17 = True
else:
    ODS_17 = False

if  (ODS_1 == False and ODS_2 == False and ODS_3 == False and ODS_4 == False and ODS_5 == False and ODS_6 == False and
    ODS_7 == False and ODS_8 == False and ODS_9 == False and ODS_10 == False and ODS_11 == False and ODS_12 == False and
    ODS_13 == False and ODS_14 == False and ODS_15 == False and ODS_16 == False and ODS_17 == False):
    print("-1")
else:
    pass
