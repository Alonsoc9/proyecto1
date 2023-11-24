// Ejecutar función en el evento click
document.getElementById("btn_open").addEventListener("click", openCloseMenu);

// Declaramos variables
var sideMenu = document.getElementById("menu_side");
var btnOpen = document.getElementById("btn_open");
var body = document.getElementById("body");
var userAvatar = document.getElementById("userAvatar"); // Agregamos la referencia a la imagen del avatar

// Evento para mostrar y ocultar menú
function openCloseMenu() {
    body.classList.toggle("body_move");
    sideMenu.classList.toggle("menu__side_move");
    adjustAvatarSize(); // Ajusta el tamaño de la imagen del avatar
}

// Función para ajustar el tamaño de la imagen del avatar
function adjustAvatarSize() {
    if (sideMenu.classList.contains("menu__side_move")) {
        userAvatar.classList.remove("avatar-minimized");
        userAvatar.classList.add("avatar-maximized"); // Ajusta el tamaño de la imagen del avatar cuando la barra lateral está abierta
    } else {
        userAvatar.classList.remove("avatar-maximized");
        userAvatar.classList.add("avatar-minimized"); // Ajusta el tamaño de la imagen del avatar cuando la barra lateral está cerrada
    }
}

// Ajusta el tamaño de la imagen del avatar al cargar la página
adjustAvatarSize();

// Haciendo el menú responsive (adaptable)
window.addEventListener("resize", function () {
    adjustAvatarSize();
});
