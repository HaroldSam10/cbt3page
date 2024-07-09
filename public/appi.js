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

function loadImage(url) {
    return new Promise((resolve, reject) => {
      const xhr = new XMLHttpRequest();
      xhr.open("GET", url, true);
      xhr.responseType = "blob";
      xhr.onload = function (e) {
        const reader = new FileReader();
        reader.onload = function (event) {
          const res = event.target.result;
          resolve(res);
        };
        reader.onerror = function (error) {
          reject(error);
        };
        const file = this.response;
        reader.readAsDataURL(file);
      };
      xhr.onerror = function (error) {
        reject(error);
      };
      xhr.send();
    });
  }
  
  function loadImageFromFileInput(fileInput) {
    return new Promise((resolve, reject) => {
      const file = fileInput.files[0];
      if (!file) {
        reject("No se ha seleccionado ningún archivo");
      }
  
      const reader = new FileReader();
      reader.onload = function (event) {
        const base64Data = event.target.result;
        resolve(base64Data);
      };
      reader.onerror = function (error) {
        reject(error);
      };
      reader.readAsDataURL(file);
    });
  }
  


  
  window.addEventListener("load", () => {
    const form = document.querySelector("#form");
    form.addEventListener("submit", async (e) => {
      e.preventDefault();
  
      const servicio = document.getElementById("servicio").value;
      const fechInicio = document.getElementById("fechInicio").value;
      const fechFin = document.getElementById("fechFin").value;
      const nombre = document.getElementById("nombre").value;
      const nombre2 = document.getElementById("nombre").value;
      const numeroTelefono = document.getElementById("numeroTelefono").value;
      const grupo = document.getElementById("grupo").value;
      const Dias = document.getElementById("Dias").value;
      const semestre = document.getElementById("semestre").value;
      const nombreInstitucion = document.getElementById("nombreInstitucion").value;
      const numeroTelefonoInst = document.getElementById("numeroTelefonoInst").value;
      const nombreRes2 = document.getElementById("nombreRes").value;
      const nombreRes3 = document.getElementById("nombreRes").value;
      const cargoSelect = document.getElementById("cargo");
      const direccion = document.getElementById("direccion").value;
      const num = document.getElementById("num").value;
      const colonia = document.getElementById("colonia").value;
      const municipio = document.getElementById("municipio").value;
      const correo = document.getElementById("correo").value;
      const nombreTut = document.getElementById("nombreTut").value;
      const nombreTut2 = document.getElementById("nombreTut").value;
      const telTut = document.getElementById("telTut").value;
  
      let cargo = cargoSelect.value;


  
      try {

        const nombrebox = formatTextWithLineBreaks(nombre2, 23);
        const tutbox = formatTextWithLineBreaks(nombreTut2, 23);
        const resbox = formatTextWithLineBreaks(nombreRes2, 23);
        const carbox= formatTextWithLineBreaks(cargo, 36);
        const resbox2= formatTextWithLineBreaks(nombreRes3, 37);

        await generatePDF(
          servicio,
          fechInicio,
          fechFin,
          nombre,
          numeroTelefono,
          grupo,
          Dias,
          semestre,
          nombreInstitucion,
          numeroTelefonoInst,
          carbox,
          direccion,
          num,
          colonia,
          municipio,
          correo,
          nombreTut,
          telTut,
          nombrebox,
          tutbox,
          resbox,
          resbox2
        );
      } catch (error) {
        console.error("Error al generar PDF:", error);
      }
    });
  });
  
  async function generatePDF(
    servicio,
    fechInicio,
    fechFin,
    nombre,
    numeroTelefono,
    grupo,
    Dias,
    semestre,
    nombreInstitucion,
    numeroTelefonoInst,
    carbox,
    direccion,
    num,
    colonia,
    municipio,
    correo,
    nombreTut,
    telTut,
    nombrebox,
    tutbox,
    resbox,
    resbox2
  ) {
    try {
      const image = await loadImage("nuevo_registro.jpg");
  
      const fileInput = document.getElementById("inputImage");
      const signatureImage = await loadImageFromFileInput(fileInput);
      const imageData = await loadImageDataFromInput(fileInput);
  
      const fileInput2 = document.getElementById("inputImage2");
      const secondImage = await loadImageFromFileInput(fileInput2);
  
      const pdf = new jsPDF("p", "pt", "letter");
  
      // Agrega la imagen al PDF
      pdf.addImage(
        image,
        "PNG",
        0,
        0,
        565,
        792,
        pdf.internal.pageSize.width,
        pdf.internal.pageSize.height
      );
  
      const imageWidth = 390;
      const imageHeight = 200;
      const imageWidthF = 80;
      const imageHeightF = 110;
      const pdfWidth = pdf.internal.pageSize.width;
      const pdfHeight = pdf.internal.pageSize.height;
      const x = (pdfWidth - imageWidth) / 2 - 20;
      const y = (pdfHeight - imageHeight) / 2 + 130;
      const radius = 10;
  
      pdf.addImage(signatureImage, "PNG", x, y, imageWidth, imageHeight);
  
      const x2 = (pdfWidth + 253) / 2 + 15;
      const y2 = (pdfHeight - 763) / 2 + 50;
  
      pdf.addImage(secondImage, "PNG", x2, y2, imageWidthF, imageHeightF);
  
   
  
      pdf.setFontSize(10);
      pdf.text(servicio, 250, 95);
  
      pdf.setFontSize(10);
      pdf.text(fechInicio+" AL "+fechFin, 245, 108);
  
  
      pdf.setFontSize(10);
      pdf.text(nombre, 171, 142);
      pdf.text(nombrebox, 60, 675);
  
      pdf.setFontSize(10);
      pdf.text(numeroTelefono, 280, 156);
  
      pdf.setFontSize(10);
      pdf.text(grupo, 120, 155);
  
      pdf.setFontSize(10);
      pdf.text(Dias, 180, 169);
  
      pdf.setFontSize(10);
      pdf.text(semestre, 120, 182);
  
      pdf.setFontSize(10);
      pdf.text(nombreInstitucion, 50, 240);
  
      pdf.setFontSize(10);
      pdf.text(numeroTelefonoInst, 318, 240);
  
      pdf.setFontSize(10);
      pdf.text(resbox2, 50, 275);
  
      pdf.setFontSize(10);
      pdf.text(carbox, 318, 275);
  
      //pdf.setFontSize(10);
      //pdf.text(otroInput, 390,275);
  
      pdf.setFontSize(10);
      pdf.text(direccion, 50, 320);
  
      pdf.setFontSize(10);
      pdf.text(num, 50, 330);
  
      pdf.setFontSize(10);
      pdf.text(colonia, 50, 340);
  
      pdf.setFontSize(10);
      pdf.text(municipio, 50, 350);
  
      pdf.setFontSize(10);
      pdf.text(correo, 318, 320);
  
      pdf.setFontSize(10);
      pdf.text(nombreTut, 245, 378);
  
      pdf.setFontSize(10);
      pdf.text(telTut, 255, 390);
  
  
      pdf.setFontSize(10);
      pdf.text(tutbox, 215, 675);
  
      pdf.setFontSize(10);
      pdf.text(resbox, 370, 675);
  
      servicio = servicio.toString();
      fechInicio = fechInicio.toString();
      fechFin = fechFin.toString();
      nombre = nombre.toString();
      numeroTelefono = numeroTelefono.toString();
      grupo = grupo.toString();
      Dias = Dias.toString();
      semestre = semestre.toString();
      nombreInstitucion = nombreInstitucion.toString();
      numeroTelefonoInst = numeroTelefonoInst.toString();
      nombreRes = nombreRes.toString();
      cargo = cargo.toString();
      direccion = direccion.toString();
      num = num.toString();
      colonia = colonia.toString();
      municipio = municipio.toString();
      correo = correo.toString();
      nombreTut = nombreTut.toString();
      telTut = telTut.toString();
      console.log(servicio, fechInicio, fechFin, nombre, numeroTelefono, grupo, Dias, semestre, nombreInstitucion, numeroTelefonoInst, nombreRes, cargo, direccion, num, colonia, municipio, correo, nombreTut, telTut);

      const nombreArchivo = `REGISTRO DE ${servicio} DE ${nombre}.pdf`;
      pdf.save(nombreArchivo);
     } catch (error) {
      console.error("Error al generar PDF:", error);
    }
  }
  
  function loadImageDataFromInput(fileInput) {
    return new Promise((resolve, reject) => {
      const reader = new FileReader();
      reader.onload = function (event) {
        const img = new Image();
        img.onload = function () {
          resolve(img);
        };
        img.onerror = function (error) {
          reject(error);
        };
        img.src = event.target.result;
      };
      reader.onerror = function (error) {
        reject(error);
      };
      reader.readAsDataURL(fileInput.files[0]);
    });
  }