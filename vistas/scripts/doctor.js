var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
}

//Función limpiar
function limpiar()
{
	$("#iddoctor").val("");
	$("#idusuario").val("");
	$("#especialidad").val("");
	$("#rfc").val("");
	$("#cedula").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/doctor.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/doctor.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	            bootbox.alert(datos);	          
	            mostrarform(false);
	            tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(iddoctor)
{
	$.post("../ajax/doctor.php?op=mostrar",{iddoctor : iddoctor}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#iddoctor").val(data.ID_Doctor);
		$("#idusuario").val(data.ID_Usuario);
		$("#especialidad").val(data.Especialidad);
		$("#rfc").val(data.RFC);
		$("#cedula").val(data.Cedula_Profesional);

 	})
}

//Función para desactivar registros
function desactivar(iddoctor)
{
	bootbox.confirm("¿Está Seguro de desactivar el doctor?", function(result){
		if(result)
        {
        	$.post("../ajax/doctor.php?op=desactivar", {iddoctor : iddoctor}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(iddoctor)
{
	bootbox.confirm("¿Está Seguro de activar el doctor?", function(result){
		if(result)
        {
        	$.post("../ajax/doctor.php?op=activar", {iddoctor : iddoctor}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

function eliminar(iddoctor)
{
	bootbox.confirm("¿Está Seguro de eliminar el doctor?", function(result){
		if(result)
        {
        	$.post("../ajax/doctor.php?op=eliminar", {iddoctor : iddoctor}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();