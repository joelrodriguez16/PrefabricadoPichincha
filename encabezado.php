<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navbar</title>

    <link rel="stylesheet" href="style.css" />
    <script
      src="https://kit.fontawesome.com/7e5b2d153f.js"
      crossorigin="anonymous">
      const navToggle = document.querySelector(".nav-toggle");
const navMenu = document.querySelector(".nav-menu");

navToggle.addEventListener("click", () => {
  navMenu.classList.toggle("nav-menu_visible");

  if (navMenu.classList.contains("nav-menu_visible")) {
    navToggle.setAttribute("aria-label", "Cerrar menú");
  } else {
    navToggle.setAttribute("aria-label", "Abrir menú");
  }
});
    </script>
    <style>
        * {
  margin: 0;
  box-sizing: border-box;
}

body {
  font-family: sans-serif;
  padding: 90px 20px 0;
}

.header {
  background-color: #0769e9;
  height: 80px;
  position: fixed;
  width: 100%;
  top: 0;
  left: 0;
}

.nav {
  display: flex;
  justify-content: space-between;

  max-width: 992px;
  margin: 0 auto;
}

.nav-link {
  color: white;
  text-decoration: none;
}

.logo {
  font-size: 30px;
  font-weight: bold;
  padding: 0 40px;
  line-height: 80px;
}

.nav-menu {
  display: flex;
  margin-right: 40px;
  list-style: none;
}

.nav-menu-item {
  font-size: 18px;
  margin: 0 10px;
  line-height: 80px;
  text-transform: uppercase;
  width: max-content;
}

.nav-menu-link {
  padding: 8px 12px;
  border-radius: 3px;
}

.nav-menu-link:hover,
.nav-menu-link_active {
  background-color: #034574;
  transition: 0.5s;
}

/* TOGGLE */
.nav-toggle {
  color: white;
  background: none;
  border: none;
  font-size: 30px;
  padding: 0 20px;
  line-height: 60px;
  cursor: pointer;

  display: none;
}

/* MOBILE */
@media (max-width: 768px) {
  body {
    padding-top: 70px;
  }

  .header {
    height: 60px;
  }

  .logo {
    font-size: 25px;
    padding: 0 20px;
    line-height: 60px;
  }

  .nav-menu {
    flex-direction: column;
    align-items: center;
    margin: 0;
    background-color: #2c3e50;
    position: fixed;
    top: 60px;
    width: 100%;
    padding: 20px 0;

    height: calc(100% - 60px);
    overflow-y: auto;

    left: 100%;
    transition: left 0.3s;
  }

  .nav-menu-item {
    line-height: 70px;
  }

  .nav-menu-link:hover,
  .nav-menu-link_active {
    background: none;
    color: #83c5f7;
  }

  .nav-toggle {
    display: block;
  }

  .nav-menu_visible {
    left: 0;
  }

  .nav-toggle:focus:not(:focus-visible) {
    outline: none;
  }
}
    </style>
    <script defer src="index.js"></script>
  </head>
  <body>
    <header class="header">
      <nav class="nav">
        <a href="#" class="logo nav-link">Logo</a>
        <button class="nav-toggle" aria-label="Abrir menú">
          <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-menu">
          <li class="nav-menu-item">
            <a href="#" class="nav-menu-link nav-link">Blog</a>
          </li>
          <li class="nav-menu-item">
            <a href="#" class="nav-menu-link nav-link">Videos</a>
          </li>
          <li class="nav-menu-item">
            <a href="#" class="nav-menu-link nav-link">Sobre mí</a>
          </li>
          <li class="nav-menu-item">
            <a href="https://wa.link/c5t65d" class="nav-menu-link nav-link nav-menu-link_active"
              >Contacto</a
            >
          </li>
        </ul>
      </nav>
    </header>
    <main>
      <h1>Responsive Navbar</h1>
    </main>
  </body>
</html>