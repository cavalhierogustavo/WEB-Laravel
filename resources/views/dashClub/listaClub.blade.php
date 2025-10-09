<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listas</title>
    <!-- Apenas um arquivo CSS é necessário -->
    
    <style>
        #Logo{
        width: 150px;
        border-radius: 20px;
    }
    </style>
    <link rel="stylesheet" href="./css/dashClub/listaclub.css">
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
                    <!-- ITEM ATIVO -->
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <img class="nav-icon" src="./img/vector.png" alt="Lista">
                            <span class="nav-text">Listas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="mensagens" class="nav-link">
                            <img class="nav-icon" src="./img/mensagem.png" alt="Mensagens">
                            <span class="nav-text">Mensagens</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="notificacao" class="nav-link">
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
                <h1 class="page-title">Listas</h1>
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

            <div class="page-controls">
                <div class="search-wrapper">
                    <span class="search-icon">🔍</span>
                    <input type="text" class="search-input" placeholder="Pesquisar">
                </div>
                <button class="sort-btn">
                    <span class="sort-icon">≡</span>
                    Ordenar por
                    <span class="sort-arrow">▼</span>
                </button>
            </div>

            <div class="lists-grid">
                <!-- Card de Lista que abre o modal -->
                <div class="list-card" id="open-favoritos-modal">
                    <div class="card-header">
                        <span class="update-time">Atualizado há 30 d</span>
                        <button class="options-btn">...</button>
                    </div>
                    <div class="card-content">
                        <div class="card-icon-placeholder">🖼️</div>
                        <h3 class="card-title">Favoritos</h3>
                        <div class="card-stats">
                            <span class="stats-icon">👥</span>
                            <span class="stats-count">32</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- ================================= -->
    <!--         ESTRUTURA DO MODAL        -->
    <!-- ================================= -->
    <div id="lista-modal" class="modal-overlay">
        <div class="modal-content">
            <!-- Botão para fechar o modal -->
            <button class="close-modal-btn">&times;</button>

            <!-- Conteúdo dos detalhes da lista -->
            <div class="list-details-container">
                <div class="list-info-header">
                    <div class="list-info-main">
                        <div class="list-icon-placeholder">🖼️</div>
                        <div class="list-info-text">
                            <h2>Favoritos <span class="list-count">👥 32</span></h2>
                            <p>Atualizado há 30 d</p>
                        </div>
                    </div>
                    <button class="options-btn">...</button>
                </div>
                <p class="list-description">Coleção com os atletas favoritos do time fulanos fc.</p>

                <div class="list-controls">
                    <div class="search-wrapper">
                        <span class="search-icon">🔍</span>
                        <input type="text" class="search-input" placeholder="Pesquisar">
                    </div>
                    <button class="sort-btn">
                        <span class="sort-icon">≡</span>
                        Ordenar por
                        <span class="sort-arrow">▼</span>
                    </button>
                </div>

                <div class="athletes-list">
                    <div class="athlete-item header-row">
                        <span>Atleta</span>
                        <span>Posição</span>
                        <span>Localização</span>
                        <span>Idade</span>
                        <span>Ações</span>
                    </div>
                    <div class="athlete-item">
                        <div class="athlete-profile">
                            <div class="athlete-avatar"></div>
                            <div class="athlete-name">
                                <strong>Vinícius</strong>
                                <span>@vini.design</span>
                            </div>
                        </div>
                        <div class="athlete-info">⚽ Futebol - Atacante</div>
                        <div class="athlete-info">📍 São Paulo - SP</div>
                        <div class="athlete-info">17 anos</div>
                        <div class="athlete-actions">
                            <button class="btn-view">Ver perfil</button>
                            <button class="btn-remove">Remover</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================= -->
    <!--         JAVASCRIPT DO MODAL       -->
    <!-- ================================= -->
    <script>
        // Seleciona os elementos do DOM
        const modalOverlay = document.getElementById('lista-modal');
        const openModalBtn = document.getElementById('open-favoritos-modal');
        const closeModalBtn = document.querySelector('.close-modal-btn');

        // Função para abrir o modal
        openModalBtn.addEventListener('click', () => {
            modalOverlay.style.display = 'flex';
        });

        // Função para fechar o modal clicando no botão 'X'
        closeModalBtn.addEventListener('click', () => {
            modalOverlay.style.display = 'none';
        });

        // Função para fechar o modal clicando fora do conteúdo
        modalOverlay.addEventListener('click', (event) => {
            if (event.target === modalOverlay) {
                modalOverlay.style.display = 'none';
            }
        });
    </script>
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
