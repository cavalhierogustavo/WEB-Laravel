<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Clube - Passo 1</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/23.css') }}">
</head>
<body>
    <div class="site-container">
        <div class="main-content-wrapper">
            
            <div class="progress-section">
                <div class="progress-bar-container">
                    <div class="progress-bar-fill">
                        <div class="runner-icon">
                            <i class="fas fa-person-running"></i>
                        </div>
                    </div>
                    <span class="progress-percentage">25%</span>
                </div>
            </div>

            <div class="form-section">
                <div class="header-button">
                    <button class="clube-btn">Clube</button>
                </div>

                <form method="POST" action="{{ route('clubes.post.step1') }}">
                    @csrf

                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-user icon"></i>
                            <input type="text" id="nome" name="nomeClube" required value="{{ old('nomeClube') }}">
                        </div>
                        @error('nomeClube')
                            <span style="color: #e3342f; font-size: 0.8rem; margin-top: 5px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="ano-criacao">Ano de criação</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-calendar-alt icon"></i>
                                <input type="text" id="ano-criacao" name="anoCriacaoClube" placeholder="dd/mm/aaaa" required value="{{ old('anoCriacaoClube') }}">
                            </div>
                            @error('anoCriacaoClube')
                                <span style="color: #e3342f; font-size: 0.8rem; margin-top: 5px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group half-width">
                            <label for="interesse">Interesse</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-star icon"></i>
                                <select id="interesse" name="interesse" required>
                                    <option value="Recrutamento" @if(old('interesse') == 'Recrutamento') selected @endif>Recrutamento</option>
                                    <option value="Competição" @if(old('interesse') == 'Competição') selected @endif>Competição</option>
                                    <option value="Lazer" @if(old('interesse') == 'Lazer') selected @endif>Lazer</option>
                                </select>
                                <i class="fas fa-chevron-down select-arrow"></i>
                            </div>
                            @error('interesse')
                                <span style="color: #e3342f; font-size: 0.8rem; margin-top: 5px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="esporte">Esporte</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-trophy icon"></i>
                            <select id="esporte" name="esporte" required>
                                <option value="" disabled @if(!old('esporte')) selected @endif hidden>Selecione um esporte</option>
                                <option value="Futebol" @if(old('esporte') == 'Futebol') selected @endif>Futebol</option>
                                <option value="Vôlei" @if(old('esporte') == 'Vôlei') selected @endif>Vôlei</option>
                                <option value="Basquete" @if(old('esporte') == 'Basquete') selected @endif>Basquete</option>
                            </select>
                            <i class="fas fa-chevron-down select-arrow"></i>
                        </div>
                        @error('esporte')
                            <span style="color: #e3342f; font-size: 0.8rem; margin-top: 5px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="estado">Estado</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-map-marker-alt icon"></i>
                                <input type="text" id="estado" name="estadoClube" required value="{{ old('estadoClube') }}">
                            </div>
                            @error('estadoClube')
                                <span style="color: #e3342f; font-size: 0.8rem; margin-top: 5px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group half-width">
                            <label for="cidade">Cidade</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-building icon"></i>
                                <input type="text" id="cidade" name="cidadeClube" required value="{{ old('cidadeClube') }}">
                            </div>
                            @error('cidadeClube')
                                <span style="color: #e3342f; font-size: 0.8rem; margin-top: 5px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="navigation-buttons">
                        <button type="submit" class="next-btn">
                            Próximo
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="marketing-section">
            VENHA CONHECER UM MUNDO DE <span class="highlight-blue">OPORTUNIDADES</span>
        </div>
    </div>
</body>
</html>