<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <!-- Link para ícones (Font Awesome) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* Importando uma fonte do Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap');

        /* Reset básico e estilos gerais */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #E9EBF0; /* Cor de fundo acinzentada */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
            overflow: hidden; /* Esconde overflow para os padrões de bolinhas */
            position: relative;
        }

        /* Contêineres para o padrão de bolinhas */
        .dot-pattern {
            position: absolute;
            width: 40%;
            height: 170px;
            z-index: 1;
            transform: translateY(-50%);
            background-image: radial-gradient(#C8CCD4 15%, transparent 16%);
            background-size: 28px 28px;
        }

        .dot-pattern.left {
            left: 0;
            top: 55%;
            background-position: right center;
        }

        .dot-pattern.right {
            right: 0;
            top: 35%;
            background-position: left center;
        }

        /* Card de Login */
        .login-card {
            position: relative;
            background-color: #FFFFFF;
            padding: 40px 30px;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            z-index: 2; /* Fica na FRENTE das bolinhas */
        }

        /* Espaço da Logo */
        .logo-placeholder {
            width: 70px;
            height: 70px;
            border-radius: 12px;
            margin: 0 auto 20px auto;
        }
         .logo-placeholder img {
           width: 90px;
           height: 90px;
           border-radius:22px;
        }


        .login-card h2 {
            color: #333;
            margin-bottom: 30px;
            font-weight: 500;
        }

        /* Grupo de Input (ícone + campo) */
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        .input-group input {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .input-group input:focus {
            outline: none;
            border-color: #3A6A9E;
            box-shadow: 0 0 0 3px rgba(58, 106, 158, 0.2);
        }

        /* Botão de Login */
        .login-btn {
            width: 100%;
            padding: 14px;
            background-color: #3A6A9E;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #2e557e;
        }
        
        /* Responsividade */
        @media (max-width: 992px) {
            .dot-pattern {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .login-card {
                margin: 20px;
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>

    <!-- Padrão de bolinhas à esquerda -->
    <div class="dot-pattern left"></div>

    <!-- Card de Login -->
    <div class="login-card">
        <div class="logo-placeholder"><img src="img/logoBrancaVerde.png" alt=""></div>
        <h2>Login Admin</h2>

        <!-- Seu formulário original com as classes de estilo aplicadas -->
        <form id="loginForm">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Senha" required>
            </div>
            <button type="submit" class="login-btn">Entrar</button>
        </form>
    </div>

    <!-- Padrão de bolinhas à direita -->
    <div class="dot-pattern right"></div>

    <script>
        const loginForm = document.getElementById('loginForm');

        loginForm.addEventListener('submit', async function(e) {
            e.preventDefault(); // Evita o envio padrão do formulário

            // Captura os dados do formulário
            const formData = new FormData(loginForm);
            const data = Object.fromEntries(formData.entries());

            try {
                const response = await fetch('/api/admin/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if(response.ok){
                    // Salva o token no localStorage
                    localStorage.setItem('token', result.access_token);
                    // Redireciona para o perfil
                    window.location.href = 'dashHome';
                } else {
                    alert('Erro no login: ' + JSON.stringify(result));
                }

            } catch(error){
                console.error('Erro de rede:', error);
                alert('Ocorreu um erro ao tentar conectar. Verifique sua rede.');
            }
        });
    </script>
</body>
</html>
