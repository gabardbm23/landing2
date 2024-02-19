<?php
const CONN = 'mysql:dbname=qaiw652;host=qaiw652.brandmanic.com';
const USER = 'qaiw652';
const PASS = 'ISTbrandSQL2024!';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera los valores del formulario
    $nombre = $_POST['nombre'];
    $empresa = $_POST['empresa'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $sector = $_POST['sector'];

    // Llama a la función setFunction()
    try {
        $pdo = new PDO(CONN, USER, PASS);
        $sqlq = "INSERT INTO qaiw652.mkt_landing (name,company,phone,email,sector) VALUES (:NAME,:COMPANY,:PHONE,:EMAIL,:SECTOR);";
        $stmt = $pdo->prepare($sqlq);
        $stmt->bindParam(':NAME', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':COMPANY', $empresa, PDO::PARAM_STR);
        $stmt->bindParam(':PHONE', $telefono, PDO::PARAM_STR);
        $stmt->bindParam(':EMAIL', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':SECTOR', $sector, PDO::PARAM_STR);
        $result=$stmt->execute();

        if (!$result) {
            echo '<script>
                  document.addEventListener("DOMContentLoaded", function () {
                      Swal.fire({
                          text: "Revisa los datos del formulario.",
                          icon: "error"
                      });
                  });
              </script>';
        } else {
            echo '<script>
                  document.addEventListener("DOMContentLoaded", function () {
                      Swal.fire({
                          text: "Solicitud registrada correctamente.",
                          icon: "success"
                      });
                  });
              </script>';
        }

    } catch (\Exception $e) {
    }

    // Puedes hacer algo con $resultadoSet si lo necesitas
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brandmanic</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <nav id="nav" class="flex" style="justify-content: space-between; padding: 1rem">
        <div style="display: flex; gap: 1rem;     align-items: center;">
            <img width="80" src="img/Logo BM.svg" alt="Logo Brandmanic">
            <div style="line-height: 20px; font-weight: bolder; font-size: x-large; color: white">
                Brand<br>Manic
            </div>
        </div>
        <div style="display: flex; gap: 1.5rem;    align-items: center;">
            <span><a href="#" >Marketing de influencers</a></span>
            <span><a href="#" >Servicios</a></span>
            <span><a href="#" >Contacta</a></span>
            <span><a href="#" >Blog</a></span>
            <span><a href="#" ><img src="img/Corazon.svg" width="50px" alt="redes"></a></span>
        </div>
    </nav>
    <main>
        <section class="cover-img flex large-section" style="background-image: url(img/banner-bg-small.gif) , url(img/banner-bg.webp);">
            <div class="blur flex grid-1fr-1fr large-padding large-gap" style="align-items: center;">
                <div class="texto-blanco margin-auto flex-column large-gap">

                    <div style="max-width: 45rem" class="flex-column small-gap">
                        <h2>75% de los consumidores confían en las recomendaciones que ven en las redes sociales</h2>

                        <p>Aumenta tus ventas con Influencer Marketing, sin coste.</p>
                        <p>Genera ventas explotando las comunidades digitales con nuestra plataforma inteligente.</p>
                        <ul>
                            <li>Servicio <b>100% subencionado</b></li>
                            <li>Subención desde 20.000€</li>
                            <li>Dirigida a Hoteles y Restaurantes</li>
                            <li>Fecha límite de presentación 30/3</li>
                        </ul>
                    </div>
                </div>
                <div class="flex-centrado contenedor-forms flex-column small-gap" >
                    <h4>Solicita una reunión para acceder a este subsidio:</h4>
                    <p>Nos pondremos en contacto contigo.</p>
                    <form action="#" method="post" class="banner__form--form" onsubmit="return validateForm(event)">



                        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                        <input type="text" name="empresa" id="empresa" placeholder="Empresa"  required>
                        <input type="tel" name="telefono" id="telefono" placeholder="Teléfono"  required>
                        <input type="email" name="correo" id="correo" placeholder="Correo"  required>
                        <select name="sector" id="sector">
                            <option selected disabled hidden value="">Selecciona un sector</option>
                            <option value="Hotel">Hotel</option>
                            <option value="Resto">Restaurante</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <button class="button-1" type="submit">Solicitar información</button>
                    </form>
                </div>
            </div>
        </section>

        <section class="large-padding flex-column large-gap medium-section flex-centrado" id="informacion">
            <div class="flex-centrado">
                <h2 class="margin-auto">
                    ¿Tu empresa es un Hotel o un Restaurante?<br>
                    Nuestra plataforma te acerca a los resultados:
                </h2>
            </div>

            <div class="listado-bonito wrap">
                <div class="item-bonito">
                    <div><img src="img/visibilidad-web.svg"></div>
                    <p>Aumenta la visibilidad de tu marca y posicionate ante tu audiencia.</p>
                </div>
                <div class="item-bonito">
                    <div><img src="img/reclutamiento.svg"></div>
                    <p>Selecciona Influencers que enamoren a su audiencia y eleva la intención de compra.</p>
                </div>
                <div class="item-bonito">
                    <div><img src="img/megafono.svg"></div>
                    <p>Comunica tu valor a una comunidad digital que está ansiosa de conocer lo que tienes para contarle.</p>
                </div>
                <div class="item-bonito">
                    <div><img src="img/data-analytics.svg"></div>
                    <p>Mide cada una de las ventas que generen tus campañas y cada uno de los contenidos creados.</p>
                </div>
            </div>
        </section>

        <section class="flex grid-1fr-1fr ">
            <div class="medium-width flex-column medium-gap margin-auto">
                    <h3>Desde BrandManic nos ocupamos de conseguirte la subvención y te damos la tecnología para promocionar tu Hotel o Restaurante.</h3>
                    <p>Obtendrás desde 20.000€ y podrás acceder a todas las herramientas de nuestra plataforma digital.</p>
                    <button class="button-1">Solicitar más información</button>
                    <p>Convocatoria lanzada por el El Ministerio de Industria y Turismo como parte del paquete de ayudas de “Última Milla”.</p>
                    <img src="img/GOB.png" style="width: 100%; max-width: 300px" alt="Ministerio de industria, comercio y turismo. Gobierno de españa">
            </div>

            <div class="cover-img" style="background-image: url(img/img-4.jpg)"></div>
        </section>

        <section class="small-section flex-centrado flex-column">
            <div class="flex-centrado ">
                <h3 style="padding: 0 1rem">Quienes ya han trabajado con nuestra tecnología</h3>
            </div>

            <div class="marcas">
                <img src="img/costadelsol.png" alt="Costa del sol logo">
                <img src="img/belize.png" alt="Belize logo">
                <img src="img/cata.png" alt="Cata logo">
                <img src="img/benidorm.png" alt="Benidorm logo">
                <img src="img/vinaros.png" alt="Turisme Vinaròs">
                <img src="img/andalucia.png" alt="Andalucia logo">
                <img src="img/canarias.png" alt="Canarias logo">
                <img src="img/centroamerica.png" alt="Centroamerica logo">
                <img src="img/castello.png" alt="Castello logo">
                <img src="img/costabrava.png" alt="Costabrava logo">
            </div>
        </section>

        <hr>

        <section class="small-section small-padding flex-centrado flex-column">
            <div class="flex-centrado">
                <h3>Conoce todo lo que puedes hacer con Brandmanic</h3>
            </div>
            <div class="listado-bonito wrap">
                <div class="item-bonito">
                    <img src="img/personal.svg" alt="">
                    <p>Optimización de recursos</p>
                </div>
                <div class="item-bonito">
                    <img src="img/personal-growth.svg" alt="">
                    <p>Aumento de escalabilidad y de la rentabilidad</p>
                </div>
                <div class="item-bonito">
                    <img src="img/eficiencia.svg" alt="">
                    <p>Mide y maximiza el ROI para tus campañas</p>
                </div>
                <div class="item-bonito">
                    <img src="img/hora.svg" alt="">
                    <p>Seguimiento en tiempo real de los resultados</p>
                </div>
            </div>
        </section>

        <section class="flex-centrado flex-column medium-padding colored-background small-padding medium-gap">
            <h3>Los creadores de contenidos no recomiendan productos como una solución, sino como un estilo de vida.</h3>
            <button class="button-1">Solicitar más información</button>
        </section>

        <section class="porcentajes large-padding wrap small-section">
            <div class="porcentaje">
                <span>75%</span>
                <p>de los consumidores confían en las recomendaciones que ven en las redes sociales.</p>
            </div>
            <div class="porcentaje">
                <span>66%</span>
                <p>de las marcas indican que aumentarán sus presupuestos para invertir en influencer marketing.</p>
            </div>
            <div class="porcentaje">
                <span>81%</span>
                <p>de los consumidores quieren descubrir nuevos productos y servicios en medios sociales.</p>
            </div>
        </section>

        <section class="cover-img flex medium-section" style="background-image: url(img/banner-bg-small.gif) , url(img/banner-bg.webp);">
            <div class="blur flex grid-1fr-1fr large-padding large-gap">
                <div class="flex-centrado contenedor-forms " >
                    <form action="#" method="post" class="banner__form--form" onsubmit="return validateForm(event)">
                        <h3>Solicita una reunión para acceder a este subsidio:</h3>
                        <p>Nos pondremos en contacto contigo.</p>
                        <input type="text" name="nombre" id="nombre2" placeholder="Nombre" required>
                        <input type="text" name="empresa" id="empresa2" placeholder="Empresa"  required>
                        <input type="tel" name="telefono" id="telefono2" placeholder="Teléfono"  required>
                        <input type="email" name="correo" id="correo2" placeholder="Correo"  required>
                        <select name="sector" id="sector">
                            <option selected disabled hidden value="">Selecciona un sector</option>
                            <option value="Hotel">Hotel</option>
                            <option value="Resto">Restaurante</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <button class="button-1" type="submit">Solicitar información</button>
                    </form>
                </div>
                        <div class="flex margin-auto">
                            <div>
                                <h3 class="texto-blanco" style="max-width: 35ch">
                                    Es hora de que comiences a generar los resultados que tu negocio necesita. <br>
                                    Aprovecha esta oportunidad única para explotar un canal estratégico y adelántate a tu competencia.
                                </h3>
                            </div>
                        </div>
            </div>

        </section>


    </main>
    <footer class="small-padding flex-centrado" style="background: var(--e-global-color-primary); justify-content: space-between">

        <div class="flex small-gap">
            <img width="80" src="img/simbolo-bm-blanco.svg" alt="Logo Brandmanic">
            <div style="color: white; line-height: 20px; font-weight: bolder; font-size: x-large">
                Brand<br>Manic
            </div>
        </div>
        <div class="texto-blanco">
            Reservados todos los derechos © 2024
        </div>
    </footer>
</body>
<script>
    function validateForm(event) {

        var sectorValue = document.getElementById("sector").value;
        sectorValue == null ? sectorValue = document.getElementById("sector2").value;
        if (sectorValue === "") {
            Swal.fire({
                text: "Por favor, selecciona un sector",
                icon: "info",
                showConfirmButton: false,
                allowOutsideClick: false
            });
            return false; // Prevent form submission
        }
        var phoneNumber = document.getElementById("telefono").value;



        // Check if the input value matches the pattern
        if (isNaN(phoneNumber)) {
            Swal.fire({
                text: "Por favor, introduce un número de teléfono válido. Sólo números",
                icon: "info",
                showConfirmButton: true
            });
            return false;
        }

        // If the sector is selected, you can proceed with the form submission
        Swal.fire({
            title: "Procesando...",
            text: "Por favor, espera.",
            icon: "info",
            showConfirmButton: false,
            allowOutsideClick: false
        });
        return true;
    }

    function validateForm2(event) {

        var sectorValue = document.getElementById("sector2").value;
        if (sectorValue === "") {
            Swal.fire({
                text: "Por favor, selecciona un sector",
                icon: "info",
                showConfirmButton: false,
                allowOutsideClick: false
            });
            return false; // Prevent form submission
        }
        var phoneNumber = document.getElementById("telefono2").value;



        // Check if the input value matches the pattern
        if (isNaN(phoneNumber)) {
            Swal.fire({
                text: "Por favor, introduce un número de teléfono válido. Sólo números",
                icon: "info",
                showConfirmButton: true
            });
            return false;
        }

        // If the sector is selected, you can proceed with the form submission
        Swal.fire({
            title: "Procesando...",
            text: "Por favor, espera.",
            icon: "info",
            showConfirmButton: false,
            allowOutsideClick: false
        });
        return true;
    }

</script>
</ht