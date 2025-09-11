<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Passo 3</title>
    <link rel="stylesheet" href="{{ asset('css/75.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap">
</head>
<body>
    <div class="site-container">
        <div class="main-content-wrapper">
            
            <div class="progress-section">
                <div class="progress-bar-container">
                    <div class="progress-bar-fill" style="width: 75%;">
                        <div class="runner-icon"><i class="fas fa-person-running"></i></div>
                    </div>
                    <span class="progress-percentage">75%</span>
                </div>
            </div>

            <div class="form-section">
                <div class="header-button">
                    <button class="clube-btn">Clube</button>
                </div>

                <form method="POST" action="{{ route('clubes.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-envelope icon"></i>
                            <input type="email" id="email" name="email" required value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <span style="color: #e3342f; font-size: 0.8rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Senha</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-lock icon"></i>
                            <input type="password" id="password" name="senhaClube" required>
                        </div>
                        @error('senhaClube')
                            <span style="color: #e3342f; font-size: 0.8rem;">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm-password">Confirmar senha</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-lock icon"></i>
                            <input type="password" id="confirm-password" name="senhaClube_confirmation" required>
                        </div>
                    </div>

                    <div class="navigation-buttons">
                        <a href="{{ route('clubes.create.step2') }}" class="nav-arrow" aria-label="Voltar">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <button type="submit" class="next-btn">
                            Finalizar Cadastro
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="marketing-section">
            VIM, VI, VENCI
        </div>
    </div>
</body>
</html>