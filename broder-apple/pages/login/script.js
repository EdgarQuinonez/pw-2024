const url = 'login.php';

const form = document.querySelector("#loginForm");
form.addEventListener('submit', e => onSubmit(e))

const onSubmit = async (e) => {
    e.preventDefault();
    try {

        const formData = new FormData(e.target);
        
    
        const response = await fetch(url, {
            method: 'POST',
            body: formData
        });
        
    
        if (!response.ok) {
            throw new Error("Hubo un error al iniciar sesión.")
        }
        
    } catch (e) {
        console.error(e);
    }

}