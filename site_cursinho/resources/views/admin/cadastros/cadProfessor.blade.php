    <!DOCTYPE html>
    <html lang="pt-br">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cad Professor</title>
        <link rel="stylesheet" href="css/app.css" type="text/css">
        <link rel="stylesheet" href="css/footer.css" type="text/css">
        <link rel="shortcut icon" href="imagens/lamp.ico" type="image/x-icon">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        @if(auth()->user()->nivel === 'admin')
       @include('layout._cabecalho_admin')
    @elseif(auth()->user()->nivel === 'usuario')
      @include('layout._cabecalho')
    @elseif(auth()->user()->nivel === 'professor')
      @include('layout._cabecalho_professor')
    @endif
        <div class="mamae">
        <div class="logo">
            <img src="imagens/logo_intelecto.svg" alt="logo_intelecto" class="logo_intelecto" id="imgLogo">
        </div>
            <div class="container">
                <a href="{{route('menu.adm')}}" class="link_voltar"><ion-icon name="arrow-undo-outline"></ion-icon>Voltar</a>
                <div class="text">Cadastro de Professores</div>


                <form action="{{route('admin.professors.salvar')}}" method="post" enctype='multipart/form-data'>
                {{csrf_field() }}

                <div class="form-row">
                @component('components.card_form')
                    @slot('type')
                        text
                    @endslot

                    @slot('name')
                        nome_professor
                    @endslot

                    @slot('placeholder')

                    @endslot

                    @slot('required')
                          required value="{{isset($linha->nome_professor) ? $linha->nome_professor : ''}}"
                    @endslot

                    @slot('comando')
                        Nome:
                    @endslot
                @endcomponent


                @component('components.card_form')
                    @slot('type')
                        text
                    @endslot

                    @slot('name')
                        rg_professor
                    @endslot

                    @slot('placeholder')

                    @endslot

                    @slot('required')
                          required value="{{isset($linha->rg_professor) ? $linha->rg_professor : ''}}"
                    @endslot

                    @slot('comando')
                        RG:
                    @endslot
                @endcomponent
                </div>

                <div class="form-row">
                    @component('components.card_form')
            @slot('type')
                text
            @endslot

            @slot('name')
                cpf_professor
            @endslot

            @slot('placeholder')

            @endslot

            @slot('required')
                 required value="{{isset($linha->cpf_professor) ? $linha->cpf_professor : ''}}"
            @endslot

            @slot('comando')
                CPF:
            @endslot
        @endcomponent

        @component('components.card_form')
            @slot('type')
                email
            @endslot

            @slot('name')
                email_professor
            @endslot

            @slot('placeholder')

            @endslot

            @slot('required')
                 required value="{{isset($linha->email_professor) ? $linha->email_professor : ''}}"
            @endslot

            @slot('comando')
                E-mail:
            @endslot
        @endcomponent
                </div>

                <div class="form-row">
                @component('components.card_form')
            @slot('type')
                text
            @endslot

            @slot('name')
                celular_professor
            @endslot

            @slot('placeholder')

            @endslot

            @slot('required')
                 required value="{{isset($linha->celular_professor) ? $linha->celular_professor : ''}}"
            @endslot

            @slot('comando')
                Celular:
            @endslot
        @endcomponent

        @component('components.card_form')
        @slot('type')
            password
        @endslot

        @slot('name')
            senha_professor
        @endslot

        @slot('placeholder')

        @endslot

        @slot('required')
        required value="{{isset($linha->senha_professor) ? $linha->senha_professor : ''}}"
        @endslot

        @slot('comando')
            Senha:
        @endslot
    @endcomponent
                </div>

                <div class="form-row">
                @component('components.card_form')
            @slot('type')
                text
            @endslot

            @slot('name')
                descricao_professor
            @endslot

            @slot('placeholder')

            @endslot

            @slot('required')
                 required value="{{isset($linha->descricao_professor) ? $linha->descricao_professor : ''}}"
            @endslot

            @slot('comando')
                Descricao e Imagem:
            @endslot
            @endcomponent


            @component('components.card_form')
            @slot('type')
                file
            @endslot

            @slot('name')
                imagem_professor
            @endslot

            @slot('placeholder')

            @endslot

            @slot('required')
                required value="{{isset($linha->imagem_professor) ? $linha->imagem_professor : ''}}"
            @endslot

            @slot('comando')

            @endslot
            @endcomponent
                </div>

                <div class="form-row">

                </div>
                    <div class="form-row submit-btn">
                        <div class="input-data">
                            <div class="inner"></div>
                            <input type="submit" value="Cadastrar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>
            window.addEventListener('DOMContentLoaded', (event) => {
            const phoneInput = document.getElementById('celular_professor');
            phoneInput.addEventListener('input', (e) => {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 0) {
                    value = '(' + value;
                    if (value.length > 3) {
                        value = [value.slice(0, 3), ') ', value.slice(3)].join('');
                    }
                    if (value.length > 10) {
                        value = [value.slice(0, 10), '-', value.slice(10)].join('');
                    }
                    if (value.length > 15) {
                        value = value.slice(0, 15);
                    }
                }
                e.target.value = value;
            });
            });
            window.addEventListener('DOMContentLoaded', (event) => {
            const cpfInput = document.getElementById('cpf_professor');
            const form = document.getElementById('cpf_professor'); // Substitua 'seu-form-id' pelo ID do seu formulário
    
                cpfInput.addEventListener('input', (e) => {
                    let value = e.target.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    
                    if (value.length > 0) {
                        value = value.replace(/^(\d{3})(\d)/, '$1.$2');
                        value = value.replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3');
                        value = value.replace(/\.(\d{3})(\d)/, '.$1-$2');
    
                        if (value.length > 14) {
                            value = value.slice(0, 14);
                        }
                    }
    
                    e.target.value = value;
                });
    
                form.addEventListener('submit', (e) => {
                    const cpfValue = cpfInput.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    
                    if (cpfValue.length !== 11) { // Verifica se o CPF tem 11 dígitos
                        e.preventDefault(); // Impede o envio do formulário se o formato estiver incorreto
                        alert('Preencha o CPF no formato correto: xxx.xxx.xxx-xx');
                    }
                });
            });
            window.addEventListener('DOMContentLoaded', (event) => {
                const rgInput = document.getElementById('rg_professor');
                const form = document.getElementById('rg_professor');
    
                rgInput.addEventListener('input', (e) => {
                    let value = e.target.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    
                    if (value.length > 0) {
                        // value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{1})$/, '$1.$2.$3-$4');
                        value = value.replace(/^(\d{2})(\d)/, '$1.$2');
                        value = value.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
                        value = value.replace(/\.(\d{3})(\d)/, '.$1-$2');
    
                        if (value.length > 12) {
                            value = value.slice(0, 12);
                        }
                    }
    
                    e.target.value = value;
                });
    
                form.addEventListener('submit', (e) => {
                    const rgValue = rgInput.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    
                    if (rgValue.length !== 9) { // Verifica se o RG tem 9 dígitos
                        e.preventDefault(); // Impede o envio do formulário se o formato estiver incorreto
                        alert('Preencha o RG no formato correto: xx.xxx.xxx-x');
                    }
                });
            });
    
        </script>
        <!-- /////////////////////// CONFIRMAÇÕES DOS CAMPOS/////////////////////// -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
             // /////////////// CONFIRMAÇÃO DO TAMANHO DO CELULAR /////////////////////
            $(document).ready(function() {
            $("#celular_professor").on("input", function() {
                var inputValue = $(this).val();
                var requiredLength = 15; // O número de caracteres desejados

                if (inputValue.length !== requiredLength) {
                    $(this).addClass("invalid");
                } else {
                    $(this).removeClass("invalid");
                }
            });

            // Impedir o envio do formulário se o campo não estiver preenchido corretamente
            $("form").submit(function(event) {
                if ($("#celular_professor").hasClass("invalid")) {
                    event.preventDefault();
                    alert("O campo 'Celular' deve conter TODOS os caracteres.");
                }
            });
            });
            // /////////////// CONFIRMAÇÃO DO TAMANHO DO RG (registro geral) (logo abaixo)/////////////////////
            $(document).ready(function() {
            $("#rg_professor").on("input", function() {
                var inputValue = $(this).val();
                var requiredLength = 12; // O número de caracteres desejados

                if (inputValue.length !== requiredLength) {
                    $(this).addClass("invalid");
                } else {
                    $(this).removeClass("invalid");
                }
            });

            // Impedir o envio do formulário se o campo não estiver preenchido corretamente
            $("form").submit(function(event) {
                if ($("#rg_professor").hasClass("invalid")) {
                    event.preventDefault();
                    alert("O campo 'RG' deve conter TODOS os caracteres.");
                }
            });
            });
            // /////////////// CONFIRMAÇÃO DO TAMANHO DO CPF (logo abaixo)/////////////////////
            $(document).ready(function() {
            $("#cpf_professor").on("input", function() {
                var inputValue = $(this).val();
                var requiredLength = 14; // O número de caracteres desejados

                if (inputValue.length !== requiredLength) {
                    $(this).addClass("invalid");
                } else {
                    $(this).removeClass("invalid");
                }
            });

            // Impedir o envio do formulário se o campo não estiver preenchido corretamente
            $("form").submit(function(event) {
                if ($("#cpf_professor").hasClass("invalid")) {
                    event.preventDefault();
                    alert("O campo 'CPF' deve conter TODOS os caracteres.");
                }
            });
            });
            // /////////////// CONFIRMAÇÃO DO TAMANHO DA SENHA (logo abaixo)/////////////////////
            document.addEventListener("DOMContentLoaded", function() {
                var celularInput = document.getElementById("senha_professor");

                celularInput.addEventListener("input", function() {
                    var inputValue = celularInput.value;
                    var minLength = 8; 

                    if (inputValue.length < minLength) {
                        celularInput.setCustomValidity("O campo 'SENHA' deve conter no mínimo 8 caracteres.");
                    } else {
                        celularInput.setCustomValidity("");
                    }
                });
            });

        </script>



        @if(auth()->user()->nivel === 'admin')
        @include('layout._rodape_admin')
     @elseif(auth()->user()->nivel === 'usuario')
       @include('layout._rodape')
     @elseif(auth()->user()->nivel === 'professor')
       @include('layout._rodape_professor')
     @endif
