// Función para cargar una imagen desde una URL
function loadImage(url) {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.responseType = "blob";
        xhr.onload = function (e) {
            const reader = new FileReader();
            reader.onload = function (event) {
                resolve(event.target.result);
            };
            reader.onerror = function (error) {
                reject(error);
            };
            reader.readAsDataURL(this.response);
        };
        xhr.onerror = function (error) {
            reject(error);
        };
        xhr.send();
    });
}

// Función mejorada para formatear texto con saltos de línea después de ciertos caracteres, respetando las palabras completas
function formatTextWithLineBreaks(text, maxLength) {
    let result = '';
    let linea = '';

    const words = text.split(' '); // Divide el texto en palabras

    for (const word of words) {
        // Si agregar la palabra actual excede el límite, agrega la línea actual al resultado y reinicia la línea actual
        if ((linea + word).length > maxLength) {
            result += linea.trim() + '\n';
            linea = '';
        }
        linea += word + ' ';
    }
    
    // Agrega la última línea restante al resultado
    result += linea.trim();

    return result;
}

// Función para obtener la fecha actual en el formato deseado
function getFormattedDate() {
    const months = [
        "ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO",
        "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"
    ];
    const today = new Date();
    const day = String(today.getDate()).padStart(2, '0');
    const monthIndex = today.getMonth();
    const month = months[monthIndex];
    const year = today.getFullYear();
    
    return `SAN BARTOLO CUAUTLALPAN, MEX. A ${day} DE ${month} DE ${year}`;
}

// Esperar a que se cargue completamente el DOM
window.addEventListener("load", () => {
    const form = document.querySelector("#form");
    if (form) {
        form.addEventListener("submit", async (e) => {
            e.preventDefault(); // Prevenir el envío del formulario por defecto
            // Obtener los valores de los campos del formulario
            const servicio = document.getElementById("servicio").value;
            const fechInicio = document.getElementById("fechInicio").value;
            const fechFin = document.getElementById("fechFin").value;
            const nombre = document.getElementById("nombre").value;
            const nombre2 = document.getElementById("nombre").value;
            const grupo = document.getElementById("grupo").value;
            const semestre = document.getElementById("semestre").value;
            const nombreInstitucion = document.getElementById("nombreInstitucion").value;
            const nombreRes = document.getElementById("nombreRes").value;
            const cargoSelect = document.getElementById("cargo");
            const act1 = document.getElementById('act1').value;
            const act2 = document.getElementById("act2").value;
            const act3 = document.getElementById("act3").value;
            const gen = document.getElementById("gen").value;
            const hrs = document.getElementById("hrs").value;
            const docente = document.getElementById("docente").value;

            let cargo = cargoSelect.value;

            try {
                // Formatear texto de act1, act2, act3 y nombre2
                const formattedAct1 = formatTextWithLineBreaks(act1, 73);
                const formattedAct2 = formatTextWithLineBreaks(act2, 73);
                const formattedAct3 = formatTextWithLineBreaks(act3, 73);
                const docentebox = formatTextWithLineBreaks(docente, 36);
                const nombrebox = formatTextWithLineBreaks(nombre2, 30);
                const nombreResbox = formatTextWithLineBreaks(nombreRes, 30);

                // Generar el PDF con los datos del formulario
                await generatePDF(
                    servicio,
                    fechInicio,
                    fechFin,
                    nombre,
                    grupo,
                    semestre,
                    nombreInstitucion,
                    cargo,
                    formattedAct1,
                    formattedAct2,
                    formattedAct3,
                    docentebox,
                    nombrebox,
                    nombreResbox,
                    gen,
                    hrs
                );
                console.log("Formulario enviado");
            } catch (error) {
                console.error("Error al generar PDF:", error);
            }
        });
    } else {
        console.error("El elemento con ID 'form' no se encontró en el documento.");
    }
});

// Función para generar un PDF con los datos del formulario
async function generatePDF(
    servicio,
    fechInicio,
    fechFin,
    nombre,
    grupo,
    semestre,
    nombreInstitucion,
    cargo,
    act1,
    act2,
    act3,
    docente,
    nombrebox,
    nombreResbox,
    gen,
    hrs
) {
    try {
        // Cargar la imagen desde una URL (cambiar "Informe.jpg" por la URL correcta)
        const image = await loadImage("informee.jpg");
        const jsPDF = window.jspdf;
        const pdf = new jsPDF("p", "pt", "letter");

        // Agregar la imagen al PDF
        pdf.addImage(image, "PNG", 0, 0, 565, 792);

        pdf.setFontSize(12);
        pdf.text(fechInicio + " AL " + fechFin, 105, 163);
        pdf.text(nombre, 176, 136);
        pdf.text(grupo, 100, 150);
        pdf.text(semestre, 225, 90);
        pdf.text(nombreInstitucion, 70, 217);
        pdf.text(gen, 125, 122);

        pdf.setFontSize(10);



        // Aquí puedes agregar la fecha actual al PDF
        const fechaActual = getFormattedDate();
        pdf.setFontSize(8);
        pdf.text(fechaActual, 315, 525); // Ajusta las coordenadas según donde quieras colocar la fecha

        // Aquí puedes agregar los textos formateados de las actividades
        pdf.setFontSize(10);
        pdf.text(act1, 132, 295);
        pdf.text(act2, 132, 375);
        pdf.text(act3, 132, 455);
        pdf.text(docente, 335, 635);
        pdf.text(nombrebox, 95, 635); // Ajusta las coordenadas según donde quieras colocar el nombrebox
        pdf.text(nombreResbox, 215, 750);

        //Texto en negritas
        pdf.setFont("helvetica", "bold");
        pdf.setFontSize(12);
        pdf.text(servicio, 280, 75);
        pdf.setFontSize(10);
        pdf.text(cargo, 237, 773);
        pdf.text(hrs, 94, 395);

        // Guardar y descargar el PDF
        const nombreArchivo = `INFORME DE ${servicio} DE ${nombre}.pdf`;
        pdf.save(nombreArchivo);
    } catch (error) {
        console.error("Error al generar PDF:", error);
    }
}
