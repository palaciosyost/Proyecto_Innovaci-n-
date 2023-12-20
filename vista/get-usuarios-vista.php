<?php



$objeto1 = new getUsuarios();
$resul = $objeto1->getUdsuariosAll();


foreach ($resul as $data) {
?>

    <div class="card">
        <div class="card__img"><img src='https://fotografias.lasexta.com/clipping/cmsimages02/2023/06/12/2D1E1A88-3CCB-4EF5-BFAC-65A34B6706F3/fondos-pantalla-clasicos-windows-calidad_69.jpg?crop=1300,731,x0,y0&width=1280&height=720&optimize=low&format=jpg' /></div>
        <div class="card__avatar"><svg viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
                <circle cx="64" cy="64" fill="#ff8475" r="60"></circle>
                <circle cx="64" cy="64" fill="#f85565" opacity=".4" r="48"></circle>
                <path d="m64 14a32 32 0 0 1 32 32v41a6 6 0 0 1 -6 6h-52a6 6 0 0 1 -6-6v-41a32 32 0 0 1 32-32z" fill="#7f3838"></path>
                <path d="m62.73 22h2.54a23.73 23.73 0 0 1 23.73 23.73v42.82a4.45 4.45 0 0 1 -4.45 4.45h-41.1a4.45 4.45 0 0 1 -4.45-4.45v-42.82a23.73 23.73 0 0 1 23.73-23.73z" fill="#393c54" opacity=".4"></path>
                <circle cx="89" cy="65" fill="#fbc0aa" r="7"></circle>
                <path d="m64 124a59.67 59.67 0 0 0 34.69-11.06l-3.32-9.3a10 10 0 0 0 -9.37-6.64h-43.95a10 10 0 0 0 -9.42 6.64l-3.32 9.3a59.67 59.67 0 0 0 34.69 11.06z" fill="#4bc190"></path>
                <path d="m45 110 5.55 2.92-2.55 8.92a60.14 60.14 0 0 0 9 1.74v-27.08l-12.38 10.25a2 2 0 0 0 .38 3.25z" fill="#356cb6" opacity=".3"></path>
                <path d="m71 96.5v27.09a60.14 60.14 0 0 0 9-1.74l-2.54-8.93 5.54-2.92a2 2 0 0 0 .41-3.25z" fill="#356cb6" opacity=".3"></path>
                <path d="m57 123.68a58.54 58.54 0 0 0 14 0v-25.68h-14z" fill="#fff"></path>
                <path d="m64 88.75v9.75" fill="none" stroke="#fbc0aa" stroke-linecap="round" stroke-linejoin="round" stroke-width="14"></path>
                <circle cx="39" cy="65" fill="#fbc0aa" r="7"></circle>
                <path d="m64 91a25 25 0 0 1 -25-25v-16.48a25 25 0 1 1 50 0v16.48a25 25 0 0 1 -25 25z" fill="#ffd8c9"></path>
                <path d="m91.49 51.12v-4.72c0-14.95-11.71-27.61-26.66-28a27.51 27.51 0 0 0 -28.32 27.42v5.33a2 2 0 0 0 2 2h6.81a8 8 0 0 0 6.5-3.33l4.94-6.88a18.45 18.45 0 0 1 1.37 1.63 22.84 22.84 0 0 0 17.87 8.58h13.45a2 2 0 0 0 2.04-2.03z" fill="#bc5b57"></path>
                <path d="m62.76 36.94c4.24 8.74 10.71 10.21 16.09 10.21h5" style="fill:none;stroke-linecap:round;stroke:#fff;stroke-miterlimit:10;stroke-width:2;opacity:.1"></path>
                <path d="m71 35c2.52 5.22 6.39 6.09 9.6 6.09h3" style="fill:none;stroke-linecap:round;stroke:#fff;stroke-miterlimit:10;stroke-width:2;opacity:.1"></path>
                <circle cx="76" cy="62.28" fill="#515570" r="3"></circle>
                <circle cx="52" cy="62.28" fill="#515570" r="3"></circle>
                <ellipse cx="50.42" cy="69.67" fill="#f85565" opacity=".1" rx="4.58" ry="2.98"></ellipse>
                <ellipse cx="77.58" cy="69.67" fill="#f85565" opacity=".1" rx="4.58" ry="2.98"></ellipse>
                <g fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m64 67v4" stroke="#fbc0aa" stroke-width="4"></path>
                    <path d="m55 56h-9.25" opacity=".2" stroke="#515570" stroke-width="2"></path>
                    <path d="m82 56h-9.25" opacity=".2" stroke="#515570" stroke-width="2"></path>
                </g>
                <path d="m64 84c5 0 7-3 7-3h-14s2 3 7 3z" fill="#f85565" opacity=".4"></path>
                <path d="m65.07 78.93-.55.55a.73.73 0 0 1 -1 0l-.55-.55c-1.14-1.14-2.93-.93-4.27.47l-1.7 1.6h14l-1.66-1.6c-1.34-1.4-3.13-1.61-4.27-.47z" fill="#f85565"></path>
            </svg></div>
        <div class="card__title"><?php echo $data['nombre_p']  ?> <?php echo $data['apellido'] ?></div>
        <div class="card__subtitle"><?php echo $data['id_rol'] ?></div>
        <div class="card__wrapper">
            <button class="card__btn card-btn-eliminar" data-id="<?php echo $data['id'] ?>">Eliminar</button>
            <button class="card__btn card__btn-solid" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-id="<?php echo $data['id'] ?>" data-nombre="<?php echo $data['nombre_p'] ?>" data-apellido="<?php echo $data['apellido'] ?>" data-rol="<?php echo $data['id_rol'] ?>" data-dni="<?php echo $data['dni'] ?>">Editar</button>
        </div>
    </div>

<?php
}
