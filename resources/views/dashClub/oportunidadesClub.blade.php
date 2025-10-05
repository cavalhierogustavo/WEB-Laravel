<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oportunidades</title>
    <link rel="stylesheet" href="./css/dashClub/oportunidadesClub.css">
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
                    <!-- ITEM ATIVO -->
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
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
                            <img class="nav-icon" src="./img/mensagem.png" alt="Mensagens">
                            <span class="nav-text">Mensagens</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="notificaçao" class="nav-link">
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
                        <a href="#" class="nav-link">
                            <img class="nav-icon" src="./img/sair.png" alt="Sair">
                            <span class="nav-text">Sair</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Conteúdo Principal -->
        <main class="main-content">
            <h1 class="page-title">Oportunidades</h1>

            <div class="opportunities-container">
                <header class="opportunities-header">
                    <h2>Minhas oportunidades</h2>
                    <div class="header-controls">
                        <button class="filter-btn">Ativos <span class="count-badge">2</span></button>
                        <button class="new-btn">+ Novo</button>
                    </div>
                </header>

                <div class="opportunities-list">
                    <div class="opportunity-item">
                        <div class="item-icon">🚀</div>
                        <div class="item-tags">
                            <span class="tag tag-position">Zagueiro</span>
                            <span class="tag tag-modality">Futebol de Campo</span>
                            <span class="tag tag-category">Sub-20</span>
                            <span class="tag tag-interested">interessados <span class="interest-count">30</span></span>
                        </div>
                        <div class="item-actions">
                            <button class="options-btn">...</button>
                            <div class="options-menu">
                                <a href="#">Salvar</a>
                                <a href="#">Editar</a>
                                <a href="#" class="danger">Excluir</a>
                            </div>
                        </div>
                    </div>

                    <!-- Oportunidade 2 -->
                    <div class="opportunity-item">
                        <div class="item-icon">🚀</div>
                        <div class="item-tags">
                            <span class="tag tag-position">Zagueiro</span>
                            <span class="tag tag-modality">Futebol de Campo</span>
                            <span class="tag tag-category">Sub-20</span>
                            <span class="tag tag-interested">interessados <span class="interest-count">30</span></span>
                        </div>
                        <div class="item-actions">
                            <button class="options-btn">...</button>
                            <!-- O menu de opções pode ser adicionado aqui também -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Script para mostrar/esconder o menu de opções
        document.querySelectorAll('.options-btn').forEach(button => {
            button.addEventListener('click', (event) => {
                // Impede que o clique no documento feche o menu imediatamente
                event.stopPropagation();
                
                // Fecha todos os outros menus abertos
                document.querySelectorAll('.options-menu').forEach(menu => {
                    if (menu !== button.nextElementSibling) {
                        menu.style.display = 'none';
                    }
                });

                // Alterna a exibição do menu atual
                const menu = button.nextElementSibling;
                if (menu) {
                    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
                }
            });
        });

        // Fecha o menu se clicar em qualquer outro lugar da página
        document.addEventListener('click', () => {
            document.querySelectorAll('.options-menu').forEach(menu => {
                menu.style.display = 'none';
            });
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
