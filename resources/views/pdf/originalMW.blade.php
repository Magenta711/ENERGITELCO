<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            margin: 2cm;
        }

        .wrapper {
            display: grid;
            grid-template-columns: repeat(1, 11.4cm);
            grid-gap: 0px;
            grid-auto-rows: minmax(0.4cm, auto);
        }

        .wrapper .header_markeup{
            display: grid;
            grid-template-columns: 2.9cm 6cm 2.5cm;
            border: 1px solid black;
        }

        .wrapper .header_markeup .title{
            display: grid;
        }

        .wrapper .posheader_markeup{
            display: grid;
            grid-template-columns: 2.4cm 4.5cm 4.5cm;
            border: 1px solid black;
        }
       
        .wrapper .body{
            display: grid;
            grid-template-columns: repeat(2, 5.7cm);
        }
        .wrapper .body .columna{
            display: grid;
        }

        .wrapper .body .columna .filas{
            display: grid;
            grid-template-columns: 3.2cm 2.5cm;
        }
        .wrapper .body .columna .filas div{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    hola
    <div class="wrapper">
        <div class="header_markeup">
            <div class="img_enegitelco">IMG</div>
            <div class="title">
                <div></div>
                <div>ID Local: <b>6-6553</b></div>
                <div>IP Local: 129.9.18.103</div>
                <div></div>
            </div>
            <div class="img_claro">IMG</div>
        </div>
        <div class="posheader_markeup">
            <div>Enlace</div>
            <div>
                Local <br> Cho-itsmina
            </div>
            <div class="remote">
                Remoto <br> Cho-itsmina-4
            </div>
        </div>
        <div class="body">
            <div class="columna">
                <div class="filas">
                    <div>Altura antena</div>
                    <div>#####</div>
                </div>
                <div class="filas">
                    <div>Altura antena</div>
                    <div>#####</div>
                </div>
                <div class="filas">
                    <div>Altura antena</div>
                    <div>#####</div>
                </div>
                <div class="filas">
                    <div>Altura antena</div>
                    <div>#####</div>
                </div>
                <div class="filas">
                    <div>Altura antena</div>
                    <div>#####</div>
                </div>
                <div class="filas">
                    <div>Altura antena</div>
                    <div>#####</div>
                </div>
            </div>
            <div class="columna">
                <div class="filas">
                    <div>Altura antena</div>
                    <div>#####</div>
                </div>
                <div class="filas">
                    <div>Altura antena</div>
                    <div>#####</div>
                </div>
                <div class="filas">
                    <div>Altura antena</div>
                    <div>#####</div>
                </div>
                <div class="filas">
                    <div>Altura antena</div>
                    <div>#####</div>
                </div>
                <div class="filas">
                    <div>Altura antena</div>
                    <div>#####</div>
                </div>
                <div class="filas">
                    <div>Altura antena</div>
                    <div>#####</div>
                </div>
            </div>
        </div>
     </div>
    
</body>
</html>