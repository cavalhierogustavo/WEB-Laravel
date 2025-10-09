<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificações</title>
    <link rel="stylesheet" href="./css/dashClub/notificaçaoClub.css">
    <style>
        #Logo{
        width: 150px;
        border-radius: 20px;
    }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar (IDÊNTICA AOS SEUS EXEMPLOS) -->
        <aside class="sidebar">
            <div class="logo-section">
                <img id="Logo" src="{{ asset('img/logoPerfil.jpeg') }}" alt="Logo do Perfil">
            </div>
            
            <nav class="nav-menu">
                <ul>
                    <li class="nav-item">
                        <a href="dashClub" class="nav-link">
                            <img class="nav-icon" src="./img/dashboard.png" alt="Dashboard">
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="oportunidades" class="nav-link">
                            <img class="nav-icon" src="./img/oportunidades.png" alt="Perfil">
                            <span class="nav-text">Oportunidades</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="lista" class="nav-link">
                            <img class="nav-icon" src="./img/vector.png" alt="Lista">
                            <span class="nav-text">Listas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="mensagens" class="nav-link">
                            <img class="nav-icon" src="./img/mensagem.png" alt="Dashboard">
                            <span class="nav-text">Mensagens</span>
                        </a>
                    </li>
                    <!-- ITEM ATIVO -->
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <img class="nav-icon" src="./img/notificaçao.png" alt="Perfil">
                            <span class="nav-text">Notificações</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="perfil" class="nav-link">
                            <img class="nav-icon" src="./img/perfil.png" alt="Perfil">
                            <span class="nav-text">Perfil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pesquisa" class="nav-link">
                            <img class="nav-icon" src="./img/pesquisa.png" alt="Pesquisa">
                            <span class="nav-text">Pesquisa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                       <a href="configuracao" class="nav-link">
                            <img class="nav-icon" src="./img/configuracoes.png" alt="Configurações">
                            <span class="nav-text">Configurações</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('logout')}}" class="nav-link">
                            <img class="nav-icon" src="./img/sair.png" alt="Sair">
                            <span class="nav-text">Sair</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Conteúdo Principal -->
        <main class="main-content">
           <header class="page-header">
                <h1 class="page-title">Mensagens</h1>
                <div class="header-actions">
                    <span class="notification-bell">🔔</span>
                    <div class="user-profile">
                        <span class="user-avatar">👤</span>
                       @auth
                                    {{ Auth::user()->nomeClube ?? 'Nome do Clube' }}
                                @else
                                    Nome do Clube
                                @endauth
                    </div>
                </div>
            </header>

            <p class="notifications-summary">Você tem <strong>1</strong> notificações novas</p>

            <div class="notifications-list">
                <div class="date-separator">
                    <span class="line"></span>
                    <span class="date-text">Hoje</span>
                    <span class="line"></span>
                </div>

                <!-- Item de Notificação -->
                <div class="notification-item">
                    <div class="notification-icon">🚀</div>
                    <div class="notification-content">
                        <p class="notification-title">
                            Oportunidade
                            <span class="notification-time">há 1 min</span>
                        </p>
                        <p class="notification-description">Um usuário se interessou por sua oportunidade criada.</p>
                    </div>
                    <a href="#" class="view-more-link">Ver mais</a>
                </div>
                
                <!-- Outras notificações iriam aqui -->
            </div>
        </main>
    </div>

    <script>
        // Seleciona os elementos do DOM
        const themeToggle = document.getElementById('theme-toggle');
        const themeName = document.getElementById('theme-name');
        const body = document.body;

        // Função para aplicar o tema salvo
        const applyTheme = (theme) => {
            if (theme === 'dark') {
                body.classList.add('dark-theme');
                themeName.textContent = 'Escuro';
                themeToggle.checked = true;
            } else {
                body.classList.remove('dark-theme');
                themeName.textContent = 'Claro';
                themeToggle.checked = false;
            }
        };

        // Verifica se há um tema salvo no localStorage
        const savedTheme = localStorage.getItem('theme');
        
        // Aplica o tema salvo ao carregar a página
        // Se não houver tema salvo, o padrão será 'claro'
        applyTheme(savedTheme);

        // Adiciona o evento de clique ao toggle
        themeToggle.addEventListener('change', () => {
            let newTheme;
            // Se o toggle estiver marcado, o tema é 'escuro'
            if (themeToggle.checked) {
                newTheme = 'dark';
            } else {
                newTheme = 'claro';
            }
            
            // Aplica o novo tema
            applyTheme(newTheme);
            
            // Salva a preferência no localStorage
            localStorage.setItem('theme', newTheme);
        });
    </script>
</body>
</html>
