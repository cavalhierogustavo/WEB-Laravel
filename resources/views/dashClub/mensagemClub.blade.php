<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagens</title>
    <!-- Use o mesmo arquivo CSS da sidebar e adicione os estilos de mensagens -->
    <link rel="stylesheet" href="./css/dashClub/mensagensClub.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar (IDÊNTICA AOS SEUS EXEMPLOS) -->
        <aside class="sidebar">
            <div class="logo-section">
                <div class="logo-placeholder">Logo aqui</div>
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
                            <img class="nav-icon" src="./img/oportunidades.png" alt="Oportunidades">
                            <span class="nav-text">Oportunidades</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="lista" class="nav-link">
                            <img class="nav-icon" src="./img/vector.png" alt="Lista">
                            <span class="nav-text">Listas</span>
                        </a>
                    </li>
                    <!-- ITEM ATIVO CORRIGIDO -->
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <img class="nav-icon" src="./img/mensagem.png" alt="Dashboard">
                            <span class="nav-text">Mensagens</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="notificaçao" class="nav-link">
                            <img class="nav-icon" src="./img/notificaçao.png" alt="Notificação">
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
                        <a href="#" class="nav-link">
                            <img class="nav-icon" src="./img/sair.png" alt="Sair">
                            <span class="nav-text">Sair</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Conteúdo Principal da Página de Mensagens -->
        <main class="main-content">
            <!-- Header -->
            <header class="page-header">
                <h1 class="page-title">Mensagens</h1>
                <div class="header-actions">
                    <span class="notification-bell">🔔</span>
                    <div class="user-profile">
                        <span class="user-avatar"></span>
                        <span class="user-name">João Pedro</span>
                    </div>
                </div>
            </header>

            <!-- Corpo do Chat -->
            <div class="chat-container">
                <!-- Lista de Conversas (Painel Esquerdo) -->
                <aside class="chat-list">
                    <div class="chat-search-wrapper">
                        <span class="search-icon-chat">🔍</span>
                        <input type="text" class="chat-search-input" placeholder="Pesquisar">
                    </div>
                    <div class="conversations">
                        <div class="conversation-item active">
                            <div class="convo-avatar"></div>
                            <div class="convo-details">
                                <div class="convo-header">
                                    <span class="convo-name">João Pedro</span>
                                    <span class="convo-time">12:30</span>
                                </div>
                                <p class="convo-message">Eu já avisei que você tem que...</p>
                            </div>
                        </div>
                        <!-- Outras conversas podem ser adicionadas aqui -->
                    </div>
                </aside>

                <!-- Janela da Conversa (Painel Direito) -->
                <section class="chat-window">
                    <header class="chat-window-header">
                        <div class="chat-partner">
                            <div class="partner-avatar"></div>
                            <span class="partner-name">João Pedro</span>
                        </div>
                        <span class="more-options-icon">...</span>
                    </header>

                    <div class="message-area">
                        <div class="message-separator">
                            <span>Hoje</span>
                        </div>
                        <div class="message-bubble received">
                            <div class="bubble-avatar"></div>
                            <div class="bubble-content">
                                <p>Ve se melhora mano, melhora, melhora, euj dsgoojdsg</p>
                                <span class="message-time">12:30</span>
                            </div>
                        </div>
                        <!-- Outras mensagens podem ser adicionadas aqui -->
                    </div>

                    <footer class="message-input-area">
                        <span class="attach-icon">📎</span>
                        <input type="text" class="message-input" placeholder="Enviar mensagem">
                        <button class="send-button">
                            <span class="send-icon">➤</span>
                        </button>
                    </footer>
                </section>
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
