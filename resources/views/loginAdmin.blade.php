<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Administrador</title>
    <!-- Link para o arquivo CSS que você vai criar -->
    <link rel="stylesheet" href="./css/dashBoard/login.css">
    <!-- Link para a biblioteca de ícones (Font Awesome) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

      <div class="decorative-image-container left">
        <img src="img/Sports.png" alt="Decoração">
    </div>

    <!-- Container principal do formulário de login -->
    <div class="login-container">
        <div class="login-card">
            <!-- LOGO: Substitua pela sua imagem -->
            <div class="logo-placeholder">
                <!-- Coloque sua tag <img> aqui. Exemplo: -->
        <img src="img/Sports.png" alt="Logo da Empresa">
            </div>

            <h2>Login - Administrador</h2>

            <!-- Formulário de login -->
            <form id="loginForm">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="email" name="email" placeholder="Email de usuário" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Senha" required>
                </div>
                
                <!-- O campo "Confirmar senha" não é comum em telas de login, mas mantive como na imagem.
                     Se não precisar dele, pode remover o div abaixo. -->
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password_confirmation" placeholder="Confirmar sua senha">
                </div>

                <div class="options">
                    <a href="#" class="forgot-password">Esqueceu a senha?</a>
                </div>

                <button type="submit" class="login-button">Fazer login</button>
            </form>

            <footer class="login-footer">
                <p>&copy; 2025 Norven – Todos os direitos reservados</p>
            </footer>
        </div>
    </div>

   <div class="decorative-image-container right">
        <img src="img/Sports.png" alt="Decoração">
    </div>

    <!-- SEU SCRIPT ORIGINAL (mantido como está) -->
    <script>
        const loginForm = document.getElementById('loginForm');

        loginForm.addEventListener('submit', async function(e) {
            e.preventDefault(); // Evita o envio padrão do formulário

            // Captura os dados do formulário
            const formData = new FormData(loginForm);
            const data = Object.fromEntries(formData.entries());

            try {
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok) {
                    // Salva o token no localStorage
                    localStorage.setItem('token', result.access_token);
                    // Redireciona para o perfil
                    window.location.href = '/dashboard/index';
                } else {
                    alert('Erro no login: ' + (result.message || JSON.stringify(result)));
                }

            } catch (error) {
                console.error('Erro de rede:', error);
                alert('Não foi possível conectar ao servidor. Verifique sua conexão.');
            }
        });
    </script>
</body>
</html>
