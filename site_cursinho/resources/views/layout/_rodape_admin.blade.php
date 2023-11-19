<footer class="footer">
    <div class="footer-wave-box">
        <div class="footer-wave"></div>
    </div>
    <div class="social">
        <a href="https://instagram.com/escolaintelecto?igshid=MzRlODBiNWFlZA=="><ion-icon name="logo-instagram" target="_blank"></ion-icon></a>
        <a href="https://www.facebook.com/intelectobauru"><ion-icon name="logo-facebook" target="_blank"></ion-icon></a>
    </div>

    <ul>
      <li><a href="{{route('home')}}">Home</a></li>
      <li><a href="{{route('menu.adm')}}">Cadastro e Listar</a></li>
      <li><a href="{{route('menu_aluno.adm')}}">Telas de Aluno</a></li>
      <li><a href="{{ asset('HELP_ADMIN.pdf') }}" target="_blank">Baixar Manual de Uso</a></li>
    </ul>

    <p class="copyright">
      Intelecto @ 2023
    </p>
    <br>
    <ul>
      <li><a href="#"><box-icon name='up-arrow-circle' ></box-icon>Voltar ao Topo</a></li>  
    </ul>

</footer>
<script src="{{ asset('js/dinamico.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
    const navBar = document.querySelector("nav"),
       menuBtns = document.querySelectorAll(".menu-icon"),
       overlay = document.querySelector(".overlay");

     menuBtns.forEach((menuBtn) => {
       menuBtn.addEventListener("click", () => {
         navBar.classList.toggle("open");
       });
     });

     overlay.addEventListener("click", () => {
       navBar.classList.remove("open");
     });
  </script>
  <script>
    // script.js
  document.addEventListener("DOMContentLoaded", function () {
    const darkModeToggle = document.getElementById("darkModeToggle");
    const siteImage = document.getElementById("imgLogo");

    // Load user preference from localStorage
    const darkModePreference = localStorage.getItem("darkMode");
    if (darkModePreference === "true") {
      document.body.classList.add("dark-mode");
      darkModeToggle.checked = true;
      siteImage.src = "{{ asset('imagens/logo_dark.png') }}"
    }

    darkModeToggle.addEventListener("change", function () {
      if (this.checked) {
        document.body.classList.add("dark-mode");
        localStorage.setItem("darkMode", "true");
        siteImage.src = "{{ asset('imagens/logo_dark.png') }}";
      } else {
        document.body.classList.remove("dark-mode");
        localStorage.setItem("darkMode", "false");
        siteImage.src = "{{ asset('imagens/logo_intelecto.svg') }}";
      }
    });
  });
  </script>

<script>
        const openPopupButtons = document.querySelectorAll('.openPopupButton');
        const confirmationPopups = document.querySelectorAll('.popup');
        const confirmDeleteButtons = document.querySelectorAll('.confirmDeleteButton');
        const cancelDeleteButtons = document.querySelectorAll('.cancelDeleteButton');

        openPopupButtons.forEach((button, index) => {
            button.addEventListener('click', () => {
                confirmationPopups[index].style.display = 'flex';
            });
        });

        cancelDeleteButtons.forEach((button, index) => {
            button.addEventListener('click', () => {
                confirmationPopups[index].style.display = 'none';
            });
        });

        confirmDeleteButtons.forEach((button, index) => {
            button.addEventListener('click', () => {
                alert('Item excluído com sucesso.');
                confirmationPopups[index].style.display = 'none';
            });
        });
    </script>
</body>
</html>
