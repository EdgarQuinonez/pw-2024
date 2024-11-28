const lista = document.querySelector("#coincidencias");
const campoQuery = document.querySelector('#query');

campoQuery.addEventListener("keyup", (e) => mostrarCoincidencias(e.target.value))

const mostrarCoincidencias = async (query) => {
    lista.innerHTML = ""    
    const url = "mascotas.php";

    try {
        
        if (query.length >= 3) {

            const response = await fetch(url + "?query=" + query);
    
            if (!response.ok) {
                throw new Error("No se encontraron nombres con esas letras.")
            }
    
            const nombresEncontrados = JSON.parse(await response.text());


            if (nombresEncontrados.length <= 0) {
                lista.innerHTML = "No hay coincidencias."
            } else {
                nombresEncontrados.forEach(nombre => {

                    lista.innerHTML += `
                        <li>
                            ${nombre}
                        </li>
                    `
                })
            }
        }        
    } catch (error) {
        console.error(error)
    }    
}