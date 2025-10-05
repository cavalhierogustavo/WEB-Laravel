<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuração</title>
    <link rel="stylesheet" href="./css/dashClub/configuracaoClub.css">
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
                            <span class="nav-icon">🚀</span>
                            <span class="nav-text">Oportunidades</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="lista" class="nav-link">
                            <span class="nav-icon">📋</span>
                            <span class="nav-text">Listas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="mensagens" class="nav-link">
                            <span class="nav-icon">💬</span>
                            <span class="nav-text">Mensagens</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="notificaçao" class="nav-link">
                            <span class="nav-icon">🔔</span>
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
                    <!-- ITEM ATIVO -->
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
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
            <h1 class="page-title">Configuração</h1>

            <!-- Seção de Preferências -->
            <section class="settings-section">
                <h2 class="section-title">Preferências</h2>
                <div class="settings-card">
                    <div class="setting-item">
                        <div class="item-label">
                            <span class="item-icon">🔔</span>
                            <span>Notificações</span>
                        </div>
                    </div>
                    <div class="setting-item">
                        <div class="item-label">
                            <span class="item-icon">🎨</span>
                            <span>Tema</span>
                        </div>
                        <div class="item-control">
                            <span id="theme-name">Claro</span>
                            <label class="switch">
                                <!-- ID ADICIONADO AQUI -->
                                <input type="checkbox" id="theme-toggle">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Seção da Conta -->
            <section class="settings-section">
                <h2 class="section-title">Conta</h2>
                <div class="settings-card">
                    <div class="setting-item">
                        <div class="item-label">
                            <span class="item-icon">✉️</span>
                            <span>Email</span>
                        </div>
                        <a href="#" class="item-action">Alterar ></a>
                    </div>
                    <div class="setting-item">
                        <div class="item-label">
                            <span class="item-icon">🔒</span>
                            <span>Senha</span>
                        </div>
                        <a href="#" class="item-action">Alterar ></a>
                    </div>
                    <div class="setting-item">
                        <div class="item-label">
                            <span class="item-icon">🔑</span>
                            <span>Autenticação de 2 fatores</span>
                        </div>
                    </div>
                    <div class="setting-item">
                        <div class="item-label">
                            <span class="item-icon item-icon-danger">🚪</span>
                            <span>Sair</span>
                        </div>
                    </div>
                    <div class="setting-item">
                        <div class="item-label">
                            <span class="item-icon item-icon-danger">🗑️</span>
                            <span class="text-danger">Excluir conta</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Seção Sobre -->
            <section class="settings-section">
                <h2 class="section-title">Sobre</h2>
                <div class="settings-card">
                    <div class="setting-item">
                        <div class="item-label">
                            <span class="item-icon">🛡️</span>
                            <span>Políticas de privacidade</span>
                        </div>
                    </div>
                    <div class="setting-item">
                        <div class="item-label">
                            <span class="item-icon">📄</span>
                            <span>Termos e condições</span>
                        </div>
                    </div>
                    <div class="setting-item">
                        <div class="item-label">
                            <span class="item-icon">ℹ️</span>
                            <span>Saiba mais</span>
                        </div>
                    </div>
                </div>
            </section>
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
