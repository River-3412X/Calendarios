<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title><?php echo TITULO;?></title>
    <link rel="stylesheet" href="public/css/styles.css">
    <script src="public/js/enviar.js" type="text/javascript"></script>
</head>
<body>
    <div class="contenedor" id="contenido">
        <form action="#" method="post" id="formulario">
            <div class="form-group">
                <p>Fecha de Inicio</p>
                <input type="text" id="inicio" name="inicio" placeholder="MM-YYYY">
            </div>
            <div class="form-group">
                <p>Fecha Final</p>
                <input type="text" id="fin" name="fin" placeholder="MM-YYYY">
            </div>
            <div class="form-group">
                <p>Columnas</p>
                <select name="columnas" id="columnas">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
            <div class="form-group">
                <button>Mostrar Calendarios</button>
            </div>
        </form>
        <div class='contenedor-table'>
            <table id="table">
            
            </table> 
        </div>
      
    </div>
    <div class="modal" id="md">
        <div class="modal-header">
            <strong>Advertencia!</strong>
            <input type="submit" value="cerrar" onclick="modal()" >
        </div>
        <div class="modal-body">
            <p id="modal"> Este es un mensaje</p>
        </div>
        <div class="modal-footer">
            <input type="submit" value="Aceptar" onclick="modal()">
        </div>
    </div>
</body>
</html>





