<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/dashClub/dashClub.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo-section">
                <div class="logo-placeholder">Logo aqui</div>
            </div>
            
            <nav class="nav-menu">
                <ul>
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <span class="nav-icon"><img class="nav-icon" src="./img/dashboard.png" alt=""></span>
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
                            <img class="nav-icon" src="./img/mensagem.png" alt="Mensagens">
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

        <!-- Main Content -->
        <main class="main-content">
            <header class="page-header">
                <h1 class="page-title">Dashboard</h1>
            </header>

            <!-- Stats Cards -->
            <section class="stats-section">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-content">
                            <h3 class="stat-title">Seguidores</h3>
                            <div class="stat-value">10.000</div>
                            <div class="stat-change positive">+5%</div>
                        </div>
                        <div class="stat-icon">
                            <div class="icon-followers"></div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-content">
                            <h3 class="stat-title">Oportunidades</h3>
                            <div class="stat-subtitle">Ativas</div>
                            <div class="stat-value">3</div>
                        </div>
                        <div class="stat-icon">
                            <div class="icon-opportunities"></div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-content">
                            <h3 class="stat-title">Lista de Campeões</h3>
                        </div>
                        <div class="stat-icon">
                            <div class="icon-champions"></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Chart Section -->
            <section class="chart-section">
                <div class="chart-header">
                    <h2 class="chart-title">Interessados</h2>
                    <select class="chart-filter">
                        <option value="zagueiro">Zagueiro</option>
                        <option value="atacante">Atacante</option>
                        <option value="meio-campo">Meio-campo</option>
                    </select>
                </div>
                <div class="chart-container">
                    <div class="chart">
                        <div class="chart-bar" style="height: 25%;">
                            <div class="bar-value">10</div>
                            <div class="bar-label">seg</div>
                        </div>
                        <div class="chart-bar" style="height: 75%;">
                            <div class="bar-value">30</div>
                            <div class="bar-label">ter</div>
                        </div>
                        <div class="chart-bar" style="height: 100%;">
                            <div class="bar-value">40</div>
                            <div class="bar-label">qua</div>
                        </div>
                        <div class="chart-bar" style="height: 50%;">
                            <div class="bar-value">20</div>
                            <div class="bar-label">qui</div>
                        </div>
                        <div class="chart-bar" style="height: 75%;">
                            <div class="bar-value">30</div>
                            <div class="bar-label">sex</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Activities Section -->
            <section class="activities-section">
                <h2 class="section-title">Atividades recentes</h2>
                <div class="activities-table">
                    <div class="table-header">
                        <div class="header-cell">Perfil</div>
                        <div class="header-cell">Atividade</div>
                        <div class="header-cell">Oportunidade</div>
                        <div class="header-cell">Data</div>
                        <div class="header-cell">Clube atual</div>
                        <div class="header-cell">Ações</div>
                    </div>
                    <div class="table-row">
                        <div class="cell profile-cell">
                            <div class="profile-avatar"></div>
                            <div class="profile-info">
                                <div class="profile-name">Leonardo Matarazo</div>
                                <div class="profile-handle">@leofazo</div>
                            </div>
                        </div>
                        <div class="cell">
                            <span class="activity-badge interested">Interessado</span>
                        </div>
                        <div class="cell">
                            <span class="opportunity-badge">Zagueiro</span>
                        </div>
                        <div class="cell">
                            <span class="date-badge">13/09/2025</span>
                        </div>
                        <div class="cell">
                            <span class="club-badge">Sem clube</span>
                        </div>
                        <div class="cell actions-cell">
                            <button class="action-btn edit-btn" title="Editar">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="m18.5 2.5 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </button>
                            <button class="action-btn delete-btn" title="Excluir">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="3,6 5,6 21,6"></polyline>
                                    <path d="m19,6v14a2,2 0 0,1 -2,2H7a2,2 0 0,1 -2,-2V6m3,0V4a2,2 0 0,1 2,-2h4a2,2 0 0,1 2,2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="cell profile-cell">
                            <div class="profile-avatar"></div>
                            <div class="profile-info">
                                <div class="profile-name">Leonardo Matarazo</div>
                                <div class="profile-handle">@leofazo</div>
                            </div>
                        </div>
                        <div class="cell">
                            <span class="activity-badge interested">Interessado</span>
                        </div>
                        <div class="cell">
                            <span class="opportunity-badge">Zagueiro</span>
                        </div>
                        <div class="cell">
                            <span class="date-badge">13/09/2025</span>
                        </div>
                        <div class="cell">
                            <span class="club-badge">Sem clube</span>
                        </div>
                        <div class="cell actions-cell">
                            <button class="action-btn edit-btn" title="Editar">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="m18.5 2.5 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </button>
                            <button class="action-btn delete-btn" title="Excluir">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="3,6 5,6 21,6"></polyline>
                                    <path d="m19,6v14a2,2 0 0,1 -2,2H7a2,2 0 0,1 -2,-2V6m3,0V4a2,2 0 0,1 2,-2h4a2,2 0 0,1 2,2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Right Panel -->
            <aside class="right-panel">
                <section class="suggestions-section">
                    <div class="suggestions-header">
                        <h3 class="suggestions-title">Sugestões</h3>
                        <select class="suggestions-filter">
                            <option value="lateral">Lateral</option>
                            <option value="zagueiro">Zagueiro</option>
                            <option value="atacante">Atacante</option>
                        </select>
                    </div>
                    <div class="suggestions-list">
                        <div class="suggestion-item">
                            <div class="suggestion-avatar"></div>
                            <div class="suggestion-info">
                                <div class="suggestion-name">Leonardo Matarazo</div>
                                <div class="suggestion-handle">@leofazo</div>
                            </div>
                            <button class="suggestion-action">→</button>
                        </div>
                        <div class="suggestion-item">
                            <div class="suggestion-avatar"></div>
                            <div class="suggestion-info">
                                <div class="suggestion-name">Leonardo Matarazo</div>
                                <div class="suggestion-handle">@leofazo</div>
                            </div>
                            <button class="suggestion-action">→</button>
                        </div>
                        <div class="suggestion-item">
                            <div class="suggestion-avatar"></div>
                            <div class="suggestion-info">
                                <div class="suggestion-name">Leonardo Matarazo</div>
                                <div class="suggestion-handle">@leofazo</div>
                            </div>
                            <button class="suggestion-action">→</button>
                        </div>
                        <div class="suggestion-item">
                            <div class="suggestion-avatar"></div>
                            <div class="suggestion-info">
                                <div class="suggestion-name">Leonardo Matarazo</div>
                                <div class="suggestion-handle">@leofazo</div>
                            </div>
                            <button class="suggestion-action">→</button>
                        </div>
                        <div class="suggestion-item">
                            <div class="suggestion-avatar"></div>
                            <div class="suggestion-info">
                                <div class="suggestion-name">Leonardo Matarazo</div>
                                <div class="suggestion-handle">@leofazo</div>
                            </div>
                            <button class="suggestion-action">→</button>
                        </div>
                    </div>
                    <button class="see-more-btn">Ver mais ↓</button>
                </section>

                <!-- Mini Chart -->
                <section class="mini-chart-section">
                    <div class="mini-chart">
                        <div class="mini-bar" style="height: 60%;">
                            <div class="mini-bar-label">qui</div>
                        </div>
                        <div class="mini-bar" style="height: 100%;">
                            <div class="mini-bar-label">sex</div>
                        </div>
                    </div>
                </section>
            </aside>
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
