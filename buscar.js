// Obtener parámetros de la URL
const params = new URLSearchParams(window.location.search);
const municipio = params.get("municipio");
const especialidad = params.get("especialidad");

// Mostrar valores
document.getElementById("municipio").textContent = municipio || "No especificado";
document.getElementById("especialidad").textContent = especialidad || "No especificado";

const contenedor = document.getElementById("resultados");

fetch(`buscar_medicos.php?municipio=${encodeURIComponent(municipio)}&especialidad=${encodeURIComponent(especialidad)}`)
  .then(response => response.json())
  .then(medicos => {
    if (medicos.length === 0) {
      contenedor.innerHTML = "<p>No se encontraron médicos con esos criterios.</p>";
    } else {
      medicos.forEach(function(medico) {
        const div = document.createElement("div");
        div.style.border = "1px solid #ccc";
        div.style.padding = "10px";
        div.style.marginBottom = "10px";
        div.style.borderRadius = "5px";
        div.style.backgroundColor = "#f9f9f9";

        div.innerHTML = `
          <p><strong>Nombre:</strong> ${medico.nombre}</p>
          <p><strong>Especialidad:</strong> ${medico.especialidad}</p>
          <p><strong>Municipio:</strong> ${medico.municipio}</p>
          <p><strong>Dirección:</strong> ${medico.direccion || "No especificada"}</p>
          <p><strong>Teléfono:</strong> ${medico.telefono || "No especificado"}</p>
        `;
        contenedor.appendChild(div);
      });
    }
  })
  .catch(error => {
    contenedor.innerHTML = "<p>Error al buscar médicos.</p>";
    console.error("Error al obtener datos:", error);
  });