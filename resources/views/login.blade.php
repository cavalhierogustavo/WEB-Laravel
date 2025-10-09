<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Norven - Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Poppins', sans-serif;
            background-image: url('./img/fundo.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4));
            z-index: -1;
        }

        .main-container {
            width: 100%;
            max-width: 950px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
        }

        .text-section {
            flex: 1;
            text-align: left;
        }

        .text-section h1 {
            color: white;
            font-size: 48px;
            font-weight: bold;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .highlight {
            color: #27ae60;
        }

        .form-section {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            padding-left: 64px;
        }

        .login-form {
            background-color: rgba(255, 255, 255, 0.925);
            width: 100%;
            max-width: 420px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2), -25px 0 50px -15px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            color: #27ae60;
            font-size: 14px;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .input-group input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #a1ffa7;
            border-radius: 8px;
            font-size: 16px;
            font-family: inherit;
            transition: all 0.3s ease;
            outline: none;
        }

        .input-group input:focus {
            border-color: #27ae60;
            box-shadow: 0 0 0 3px rgba(39, 174, 96, 0.2);
        }

        .input-group input.error {
            border-color: #e53e3e;
            box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.2);
        }

        .error-message {
            color: #e53e3e;
            font-size: 14px;
            margin-top: 8px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        .forgot-password {
            color: #27ae60;
            font-size: 14px;
            text-decoration: none;
            display: block;
            margin-bottom: 24px;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .submit-button {
            width: 100%;
            min-height: 48px;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 24px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
            position: relative;
        }

        .submit-button:hover:not(:disabled) {
            background-color: #219653;
            transform: scale(1.03);
        }

        .submit-button:disabled {
            cursor: not-allowed;
            opacity: 0.7;
        }

        .submit-button.loading {
            color: transparent;
        }

        .submit-button.loading::after {
            content: '';
            position: absolute;
            width: 24px;
            height: 24px;
            top: 50%;
            left: 50%;
            margin-left: -12px;
            margin-top: -12px;
            border: 3px solid transparent;
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .signup-link {
            color: #27ae60;
            font-size: 16px;
            text-decoration: none;
            text-align: center;
            display: block;
            font-weight: bold;
        }

        .signup-link:hover {
            text-decoration: underline;
        }

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            z-index: 10001;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            max-width: 300px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .notification.show {
            transform: translateX(0);
        }

        .notification.success {
            background-color: #27ae60;
        }

        .notification.error {
            background-color: #e53e3e;
        }

        @media (max-width: 1024px) {
            .main-container {
                flex-direction: column;
                text-align: center;
            }

            .text-section {
                margin-bottom: 40px;
            }

            .text-section h1 {
                font-size: 36px;
                text-align: center;
            }

            .form-section {
                padding-left: 0;
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .text-section h1 {
                font-size: 28px;
            }

            .login-form {
                padding: 30px 20px;
            }

            .submit-button {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Seção do Texto -->
        <div class="text-section">
            <h1>
                Se você acredita,<br> 
                <span class="highlight">o mundo</span> também<br>
                vai acreditar.
            </h1>
        </div>

        <!-- Seção do Formulário -->
        <div class="form-section">
            <div class="login-form">
                <form id="loginForm">
                    <!-- Campo de E-mail -->
                    <div class="input-group">
                        <label for="email">E-mail</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="emailClube"
                            required
                        >
                        <div class="error-message" id="emailError"></div>
                    </div>

                    <!-- Campo de Senha -->
                    <div class="input-group">
                        <label for="password">Senha</label>
                        <input 
                            type="password" 
                            id="password" 
                            name="senhaClube"
                            required
                        >
                        <div class="error-message" id="passwordError"></div>
                    </div>

                    <!-- Link "Esqueceu a senha?" -->
                    <a href="#" class="forgot-password">Esqueceu sua senha?</a>

                    <!-- Botão de Envio -->
                    <button type="submit" id="submitButton" class="submit-button">
                        Entrar
                    </button>
                    
                    <!-- Link "Ainda não tem cadastro?" -->
                    <a href="/cadastro/clube/passo-1" class="signup-link">
                        Ainda não tem cadastro?
                    </a>
                </form>
            </div>
        </div>
    </div>

    <script>
        class LoginProducao {
            constructor() {
                this.form = document.getElementById('loginForm');
                this.button = document.getElementById('submitButton');
                this.baseUrl = window.location.origin;
                
                this.initializeEventListeners();
            }

            initializeEventListeners() {
                // Login principal
                this.form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    this.handleLogin();
                });

                // Limpar erros quando digitar
                document.getElementById('email').addEventListener('input', () => {
                    this.clearError('email');
                });

                document.getElementById('password').addEventListener('input', () => {
                    this.clearError('password');
                });
            }

            async handleLogin() {
                this.clearAllErrors();

                // Validação básica
                const email = document.getElementById('email').value.trim();
                const password = document.getElementById('password').value.trim();

                if (!email) {
                    this.showError('email', 'E-mail é obrigatório');
                    return;
                }

                if (!password) {
                    this.showError('password', 'Senha é obrigatória');
                    return;
                }

                // Mostrar loading
                this.setLoading(true);

                try {
                    const response = await fetch(`${this.baseUrl}/api/login-simples`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                        },
                        body: JSON.stringify({
                            emailClube: email,
                            senhaClube: password
                        })
                    });

                    const result = await response.json();

                    if (response.ok && result.success) {
                        this.showNotification('Login realizado com sucesso!', 'success');
                        
                        setTimeout(() => {
                            window.location.href = result.redirect || '/dashClub';
                        }, 1000);
                    } else {
                        this.showNotification(result.message || 'Erro no login', 'error');
                    }

                } catch (error) {
                    this.showNotification('Erro de conexão', 'error');
                } finally {
                    this.setLoading(false);
                }
            }

            showError(fieldId, message) {
                const field = document.getElementById(fieldId);
                const errorElement = document.getElementById(fieldId + 'Error');
                
                field.classList.add('error');
                errorElement.textContent = message;
                errorElement.classList.add('show');
            }

            clearError(fieldId) {
                const field = document.getElementById(fieldId);
                const errorElement = document.getElementById(fieldId + 'Error');
                
                field.classList.remove('error');
                errorElement.classList.remove('show');
            }

            clearAllErrors() {
                this.clearError('email');
                this.clearError('password');
            }

            setLoading(loading) {
                if (loading) {
                    this.button.classList.add('loading');
                    this.button.disabled = true;
                } else {
                    this.button.classList.remove('loading');
                    this.button.disabled = false;
                }
            }

            showNotification(message, type = 'info') {
                const notification = document.createElement('div');
                notification.className = `notification ${type}`;
                notification.textContent = message;

                document.body.appendChild(notification);

                setTimeout(() => {
                    notification.classList.add('show');
                }, 100);

                setTimeout(() => {
                    notification.classList.remove('show');
                    setTimeout(() => {
                        if (document.body.contains(notification)) {
                            document.body.removeChild(notification);
                        }
                    }, 300);
                }, 3000);
            }
        }

        // Inicializar
        document.addEventListener('DOMContentLoaded', () => {
            new LoginProducao();
        });
    </script>
</body>
</html>
