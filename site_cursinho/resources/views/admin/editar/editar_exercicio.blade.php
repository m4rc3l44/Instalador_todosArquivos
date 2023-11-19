<!DOCTYPE html>
<html lang="pt-br">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
{{-- @yield('titulo')  --}}
<link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/footer.css') }}" type="text/css">
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
        <img src="{{ asset ('imagens/logo_intelecto.svg')}}" alt="logo_intelecto" class="logo_intelecto" id="imgLogo">
    </div>
        <div class="container">

            @if(auth()->user()->nivel === 'admin')
                <a href="{{route('menu.adm')}}" class="link_voltar"><ion-icon name="arrow-undo-outline"></ion-icon>Voltar</a>
            @elseif(auth()->user()->nivel === 'professor')
                <a href="{{route('menu_professor.adm')}}" class="link_voltar"><ion-icon name="arrow-undo-outline"></ion-icon>Voltar</a>
            @endif
            <div class="text">Editar Exercícios</div> 
            
            @foreach($rows as $row)

            <form action="{{ route('admin.exercicio.update', $row->id_exercicio) }}" method="post" enctype='multipart/form-data'>
            @method('PUT')
            @csrf

            <div class="form-row">
                @component('components.card_form') 
                    @slot('type')
                        number
                    @endslot

                    @slot('name')
                        ano_exercicio
                    @endslot

                    @slot('placeholder')

                    @endslot

                    @slot('required')
                        required value="{{isset($row->ano_exercicio) ? $row->ano_exercicio : ''}}"
                    @endslot

                    @slot('comando')
                        Ano:
                    @endslot
                @endcomponent

                @component('components.card_form')
                    @slot('type')
                        text
                    @endslot

                    @slot('name')
                        vestibular
                    @endslot

                    @slot('placeholder')

                    @endslot

                    @slot('required')
                        required value="{{isset($row->vestibular) ? $row->vestibular : ''}}"
                    @endslot

                    @slot('comando')
                        Vestibular:
                    @endslot
                @endcomponent
            </div>

            


            <div class="form-row">
            @component('components.card_form')
                @slot('type')
                    text
                @endslot

                @slot('name')
                    descricao_exercicio
                @endslot

                @slot('placeholder')

                @endslot

                @slot('required')
                    required value="{{isset($row->descricao_exercicio) ? $row->descricao_exercicio : ''}}"
                @endslot

                @slot('comando')
                    Descrição e Imagem:
                @endslot
            @endcomponent

            @component('components.card_form')
                @slot('type')
                    file
                @endslot

                @slot('name')
                    imagem_exercicio
                @endslot

                @slot('placeholder')

                @endslot

                @slot('required')
                    value="{{isset($row->imagem_exercicio) ? $row->imagem_exercicio : ''}}"
                @endslot

                @slot('comando')

                @endslot
            @endcomponent
            </div>


            <div class="form-row">
              

                @component('components.card_form')
            @slot('type')
                text
            @endslot

            @slot('name')
                correcao_exercicio
            @endslot 

            @slot('placeholder')

            @endslot

            @slot('required')
                value="{{isset($row->correcao_exercicio) ? $row->correcao_exercicio : ''}}"
            @endslot

            @slot('comando')
                Correção e imagem:  
            @endslot
        @endcomponent

        @component('components.card_form')
            @slot('type')
                file
            @endslot 

            @slot('name')
                imagem_correcao_exercicio
            @endslot

            @slot('placeholder')

            @endslot

            @slot('required')
                value="{{isset($linha->imagem_correcao_exercicio) ? $linha->imagem_correcao_exercicio : ''}}"
            @endslot

            @slot('comando')
                
            @endslot
        @endcomponent 

 
            </div>

            <div class="form-row">

            @component('components.card_form')
                    @slot('type')
                        number
                    @endslot

                    @slot('name')
                        id_exercicio
                    @endslot

                    @slot('placeholder')

                    @endslot

                    @slot('required')
                        required value="{{isset($row->id_exercicio) ? $row->id_exercicio : ''}}"
                    @endslot

                    @slot('comando')
                        Id:
                    @endslot
                @endcomponent
          
            </div> 

            <div class="form-row">
                <p>Assunto:</p>
                <select name="fk_assunto">
                    @foreach ($subject as $subjectRow)
                        <option value="{{ $subjectRow->nome_assunto }}" {{ $subjectRow->nome_assunto == $row->fk_assunto ? 'selected' : '' }}>
                            {{ $subjectRow->nome_assunto }}
                        </option>
                    @endforeach
                </select>

       
            </div>
            
            @endforeach

            <p>Último exercício cadastrado: {{$maiorIdExercicio}}.</p>
            <!-- <p>Último exercício cadastrado: {{$maiorIdExercicio}}.</p> -->


                <div class="form-row submit-btn">
                    <div class="input-data">
                        <div class="inner"></div>
                        <input type="submit" value="Editar">
                    </div>
                </div>
            </form>
        </div>
    </div>



    @if(auth()->user()->nivel === 'admin')
    @include('layout._rodape_admin')
 @elseif(auth()->user()->nivel === 'usuario')
   @include('layout._rodape')
 @elseif(auth()->user()->nivel === 'professor')
   @include('layout._rodape_professor')
 @endif
