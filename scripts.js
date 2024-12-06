document.addEventListener('DOMContentLoaded', () => {
   const cambiaTexto = document.getElementById('cambiaTexto');
   cambiaTexto.addEventListener('click', () => {
        document.getElementById('texto').innerHTML ="Lorem lorem lorem lorem lorem lorem lorem lorem lorem";
    });

    const error = document.getElementById('error');
    error.addEventListener('click', () => {
        alert("ERROR.");
    });
    
    const form = document.getElementById('formu');
    form.addEventListener('submit', (event) => {
        const nombre = document.getElementById('nya').value;
        const email = document.getElementById('mail').value;
        const mensaje = document.getElementById('msj').value;

        if (!nombre || !email || !mensaje) {
            event.preventDefault(); 
            alert('Todos los campos son obligatorios');
        } else {
            alert('Formulario enviado correctamente');
            form.reset(); 
        }
    });
});