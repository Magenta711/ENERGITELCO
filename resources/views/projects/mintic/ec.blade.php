            <h4>1. Registro fotográfico</h4>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '1',
                'label' => 'Foto posible ubicación de equipos tecnología de acceso',
                'description' => 'Fibra óptica, microondas, terrestre, red 4G, satelital, entre otros',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '2',
                'label' => 'Foto de dos terminales encendidos',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '3',
                'label' => 'Foto factura de energía',
                'description' => 'Si cuenta con energía eléctrica',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '3',
                'label' =>
                    'Foto contador donde se evidencie el serial del mismo y sellos del contador de operador de red',
                'description' => 'Si cuenta con energía eléctrica',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '3',
                'label' => 'Foto acometidas eléctricas del sitio',
                'description' => 'Si cuenta con energía eléctrica',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '4',
                'label' => 'Foto 1 aula de computo',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '4',
                'label' => 'Foto 2 aula de computo',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '5',
                'label' => 'Foto de la fachada de la institución con GPS',
                'description' => 'Coordenadas decimales legibles',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '6',
                'label' => 'Foto Rack de comunicaciones tapas abiertas',
                'description' => 'Si existe',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '7',
                'label' => 'Foto de TDG existente abierto o cuchilla existente',
                'description' => 'Si existe',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '8',
                'label' => 'Foto TDG existente abierto',
                'description' => 'Si existe',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '9',
                'label' => 'Foto de medición eléctrica en TDG FASE - NEUTRO',
                'energy_measurement' => 'FASE - NEUTRO',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '9',
                'label' => 'Foto de medición eléctrica en TDG FASE - TIERRA',
                'energy_measurement' => 'FASE - TIERRA',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '9',
                'label' => 'Foto de medición eléctrica en TDG NEUTRO - TIERRA',
                'energy_measurement' => 'NEUTRO - TIERRA',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '10',
                'label' => 'Foto de posible ubicación donde se instalará AP Wifi Interior',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '11',
                'label' => 'Foto de posible ubicación donde se instalará AP Wifi Exterior',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '12',
                'label' => 'Foto de posible sitio de instalación de mastil para AP Wifi Exterior',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '12',
                'label' => 'Foto de posible sitio de antena para conectividad satelital o terrestres',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '13',
                'label' => 'Foto del área de cobertura wifi exterior',
                'description' => 'Panorámica 360°',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '13',
                'label' => 'Foto del área de cobertura wifi exterior',
                'description' => 'Foto 0°',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '3',
                'num' => $i++,
                'it' => '13',
                'label' => 'Foto del área de cobertura wifi exterior',
                'description' => 'Foto 90°',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '4',
                'num' => $i++,
                'it' => '13',
                'label' => 'Foto del área de cobertura wifi exterior',
                'description' => 'Foto 180°',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '5',
                'num' => $i++,
                'it' => '13',
                'label' => 'Foto del área de cobertura wifi exterior',
                'description' => 'Foto 270°',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '14',
                'label' => 'Foto de la infraestructura existente en el área de cobertura',
                'description' => 'Postes, torres, mastiles, etc',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '15',
                'label' => 'Foto de la posible ubicación del aviso de identificación exterior',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '16',
                'label' => 'Video omnidireccional (360 grados) punto de acceso inalámbrico wifi interior',
                'description' => 'duración mínima de 30 segundos.',
                'accept' => 'video/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '17',
                'label' => 'video omnidireccional (360 grados) punto de acceso inalámbrico wifi exterior',
                'description' => 'duración mínima de 30 segundos.',
                'accept' => 'video/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '1',
                'num' => $i++,
                'it' => '18',
                'label' => 'Foto posibles obstáculos cercanos a la zona de cobertura del wifi exterior',
                'description' => 'Obstáculos por ejemplo de edificios, etc.',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            <h4>2. Registro foto grafico TSS</h4>
            <h5>FOTOS UBICACIÓN SUGERIDA INSTALACIÓN RADIO (IDU)</h5>
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '1',
                'label' => 'Foto panorámica del sitio',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '2',
                'label' => 'Ubicación sugerida del radio',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '3',
                'label' => 'Recorrido cable de alimentación radio',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '4',
                'label' => 'Recorrido cable IF',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '5',
                'label' => 'Recorrido cable de servicio',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '6',
                'label' => 'Aterrizaje de radio',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            <h5>FOTOS ANTENA Y LÍNEA DE VISTA</h5>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '1',
                'label' => 'Ubicación propuesta de la antena',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '2',
                'label' => 'Recorrido cable IF Radio',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '3',
                'label' => 'Recorrido cable IF al Radio',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '4',
                'label' => 'Línea de vista sitio remoto A',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '5',
                'label' => 'Aterrizaje cable IF',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '6',
                'label' => 'Foto mastil existente',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '6',
                'label' => 'Foto pararrayos existente',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            <h5>FOTOS DEL SITIO</h5>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '1',
                'label' => 'Cuarto de equipos',
                'description' => 'Si aplica',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '2',
                'label' => 'Foto rack o gabinete existente',
                'description' => 'Si aplica',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '3',
                'label' => 'Foto aire acondicionado',
                'description' => 'Si aplica',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '4',
                'label' => 'Rectificador',
                'description' => 'Si aplica',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '5',
                'label' => 'UPS',
                'description' => 'Si aplica',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '2',
                'num' => $i++,
                'it' => '6',
                'label' => 'Planta eléctrica',
                'description' => 'Si aplica',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            <h4>3. Documentos</h4>
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '3',
                'num' => $i++,
                'it' => '1',
                'label' => 'Plano arquitectónico',
                'description' => 'mano alzada o foto',
                'date_edit' => true,
                'accept' => 'image/*,application/pdf',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '3',
                'num' => $i++,
                'it' => '3',
                'label' => 'Escaneo de formato de estudio de campo información',
                'accept' => 'application/pdf',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '3',
                'num' => $i++,
                'it' => '4',
                'label' => 'Escaneo de diagrama de influencia',
                'accept' => 'application/pdf',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '3',
                'num' => $i++,
                'it' => '5',
                'label' => 'Escaneo de esquema de instalación',
                'accept' => 'application/pdf',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '3',
                'num' => $i++,
                'it' => '6',
                'label' => 'Escaneo de acta de compromiso',
                'accept' => 'application/pdf',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '3',
                'num' => $i++,
                'it' => '7',
                'label' => 'Escaneo de acta de fuerza mayor',
                'accept' => 'application/pdf',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '3',
                'num' => $i++,
                'it' => '8',
                'label' => 'Escaneo de carta de autorización',
                'accept' => 'application/pdf',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '3',
                'num' => $i++,
                'it' => '9',
                'label' => 'Formato digital del Estudio de Campo',
                'description' => 'Excel',
                'accept' => '.xlsx,.xls',
            ])
            <hr>
            <h4>Adicionales</h4>
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '3',
                'num' => $i++,
                'it' => '1',
                'label' => 'Pantallazo 1 app Wifi Analizer',
                'description' => 'Vista Calificación del canal 2.4 GHz',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '3',
                'num' => $i++,
                'it' => '1',
                'label' => 'Pantallazo 2 app Wifi Analizer',
                'description' => 'Vista Gráfico de Canal 2.4 GHz',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '3',
                'num' => $i++,
                'it' => '1',
                'label' => 'Pantallazo 3 app Wifi Analizer',
                'description' => 'Vista Gráfico de Tiempo 2.4 GHz',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '3',
                'num' => $i++,
                'it' => '1',
                'label' => 'Pantallazo 4 app Wifi Analizer',
                'description' => 'Vista Calificación de Canal 5 GHz',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '3',
                'num' => $i++,
                'it' => '1',
                'label' => 'Pantallazo 5 app Wifi Analizer',
                'description' => 'Vista Gráfico de Canal 5 GHz',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '3',
                'num' => $i++,
                'it' => '1',
                'label' => 'Pantallazo 6 app Wifi Analizer',
                'description' => 'Vista Gráfico de Tiempo 5 GHz',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '3',
                'num' => $i++,
                'it' => '2',
                'label' => 'Pantallazo recorrido Google Maps',
                'description' => 'Desde la cabecera municipal hasta el sitio con las coordenadas',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
            <hr>
            @include('projects.mintic.includes.upload_show', [
                'ltt' => '4',
                'num' => $i++,
                'it' => '3',
                'label' => 'Foto del técnico en la institución educativa',
                'description' => 'Con overol, chaqueta y gorra de claro',
                'date_edit' => true,
                'accept' => 'image/*',
            ])
