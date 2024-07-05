document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const email = document.querySelector("#email").value;
        const formData = new FormData();
        formData.append("email", email);

        fetch("validar_correo.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                alert(data.message);
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Algo salió mal. Por favor, inténtelo de nuevo.");
        });
    });
});
