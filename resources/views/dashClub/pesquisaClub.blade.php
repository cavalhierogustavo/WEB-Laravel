<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar perfis</title>
    <link rel="stylesheet" href="./css/dashClub/pesquisaClub.css">
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
                    <li class="nav-item">
                        <a href="dashClub" class="nav-link">
                            <img class="nav-icon" src="./img/dashboard.png" alt="">
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
                    <li class="nav-item">
                        <a href="notificaçao" class="nav-link">
                            <img class="nav-icon" src="./img/notificaçao.png" alt="Perfil">
                            <span class="nav-text">Notificações</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="perfil" class="nav-link">
                            <img class="nav-icon" src="./img/perfil.png" alt="">
                            <span class="nav-text">Perfil</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <img class="nav-icon" src="./img/pesquisa.png" alt="">
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
        <main class="main-content search-page">
            <!-- Header -->
            <header class="search-header">
                <h1 class="page-title">Pesquisar perfis</h1>
                <div class="header-actions">
                    <div class="user-info">
                        <span class="notification-icon">🔔</span>
                        <div class="user-profile">
                            <span class="user-avatar">👤</span>
                            <span class="user-name">João Pedro</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Search Section -->
            <section class="search-section">
                <div class="search-container">
                    <div class="search-input-wrapper">
                        <span class="search-icon">🔍</span>
                        <input type="text" class="search-input" placeholder="Pesquisar clubes, atletas...">
                    </div>
                    <button class="advanced-search-btn">
                        <span class="filter-icon">🔽</span>
                        Pesquisa avançada
                    </button>
                </div>

                <!-- Search Filters -->
                <div class="search-filters">
                    <div class="filter-tag">
                        <span>Gandula Messi</span>
                        <button class="remove-filter">×</button>
                    </div>
                    <div class="filter-tag">
                        <span>Idade 9 - 16</span>
                        <button class="remove-filter">×</button>
                    </div>
                    <div class="filter-tag">
                        <span>Atleta</span>
                        <button class="remove-filter">×</button>
                    </div>
                    <button class="add-filter">+</button>
                </div>

                <!-- Results Info -->
                <div class="results-info">
                    <span class="results-count">128 perfis encontrados</span>
                    <div class="results-actions">
                        <button class="clear-filters-btn">Limpar filtros</button>
                        <button class="show-results-btn">Mostrar resultados</button>
                    </div>
                </div>
            </section>

            <!-- Results Section -->
            <section class="results-section">
                <div class="results-header">
                    <h2 class="results-title">Resultados</h2>
                    <div class="sort-dropdown">
                        <select class="sort-select">
                            <option value="relevance">Ordenar por ↓</option>
                            <option value="name">Nome</option>
                            <option value="age">Idade</option>
                            <option value="position">Posição</option>
                        </select>
                    </div>
                </div>

                <!-- Profile Results -->
                <div class="profile-results">
                    <div class="profile-card">
                        <div class="profile-avatar-large"></div>
                        <div class="profile-details">
                            <div class="profile-header">
                                <h3 class="profile-name">Vinícius</h3>
                                <div class="profile-badges">
                                    <span class="badge athlete">⭐ Atleta</span>
                                    <span class="badge position">⚽ Futebol - Atacante</span>
                                    <span class="badge location">📍 São Paulo - SP</span>
                                    <span class="badge age">👤 17 anos</span>
                                </div>
                            </div>
                            <div class="profile-actions">
                                <button class="profile-btn view-btn">Ver perfil</button>
                                <button class="profile-btn contact-btn">Contato</button>
                            </div>
                        </div>
                    </div>

                    <div class="profile-card">
                        <div class="profile-avatar-large"></div>
                        <div class="profile-details">
                            <div class="profile-header">
                                <h3 class="profile-name">Leonardo</h3>
                                <div class="profile-badges">
                                    <span class="badge athlete">⭐ Atleta</span>
                                    <span class="badge position">⚽ Futebol - Meio-campo</span>
                                    <span class="badge location">📍 Rio de Janeiro - RJ</span>
                                    <span class="badge age">👤 19 anos</span>
                                </div>
                            </div>
                            <div class="profile-actions">
                                <button class="profile-btn view-btn">Ver perfil</button>
                                <button class="profile-btn contact-btn">Contato</button>
                            </div>
                        </div>
                    </div>

                    <div class="profile-card">
                        <div class="profile-avatar-large"></div>
                        <div class="profile-details">
                            <div class="profile-header">
                                <h3 class="profile-name">Gabriel</h3>
                                <div class="profile-badges">
                                    <span class="badge athlete">⭐ Atleta</span>
                                    <span class="badge position">⚽ Futebol - Zagueiro</span>
                                    <span class="badge location">📍 Belo Horizonte - MG</span>
                                    <span class="badge age">👤 16 anos</span>
                                </div>
                            </div>
                            <div class="profile-actions">
                                <button class="profile-btn view-btn">Ver perfil</button>
                                <button class="profile-btn contact-btn">Contato</button>
                            </div>
                        </div>
                    </div>

                    <div class="profile-card">
                        <div class="profile-avatar-large"></div>
                        <div class="profile-details">
                            <div class="profile-header">
                                <h3 class="profile-name">Matheus</h3>
                                <div class="profile-badges">
                                    <span class="badge athlete">⭐ Atleta</span>
                                    <span class="badge position">⚽ Futebol - Goleiro</span>
                                    <span class="badge location">📍 Salvador - BA</span>
                                    <span class="badge age">👤 18 anos</span>
                                </div>
                            </div>
                            <div class="profile-actions">
                                <button class="profile-btn view-btn">Ver perfil</button>
                                <button class="profile-btn contact-btn">Contato</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Load More -->
                <div class="load-more-section">
                    <button class="load-more-btn">Carregar mais resultados</button>
                </div>
            </section>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Funcionalidade de pesquisa
            const searchInput = document.querySelector('.search-input');
            const advancedSearchBtn = document.querySelector('.advanced-search-btn');
            const removeFilterBtns = document.querySelectorAll('.remove-filter');
            const addFilterBtn = document.querySelector('.add-filter');
            const clearFiltersBtn = document.querySelector('.clear-filters-btn');
            const showResultsBtn = document.querySelector('.show-results-btn');

            // Event listeners para funcionalidades de pesquisa
            searchInput.addEventListener('input', function(e) {
                console.log('Pesquisando:', e.target.value);
            });

            advancedSearchBtn.addEventListener('click', function() {
                console.log('Abrir pesquisa avançada');
            });

            removeFilterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    this.parentElement.remove();
                    console.log('Filtro removido');
                });
            });

            addFilterBtn.addEventListener('click', function() {
                console.log('Adicionar novo filtro');
            });

            clearFiltersBtn.addEventListener('click', function() {
                document.querySelectorAll('.filter-tag').forEach(tag => tag.remove());
                console.log('Todos os filtros removidos');
            });

            showResultsBtn.addEventListener('click', function() {
                console.log('Mostrar resultados');
            });

            // Event listeners para ações dos perfis
            document.querySelectorAll('.view-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    console.log('Ver perfil');
                });
            });

            document.querySelectorAll('.contact-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    console.log('Contatar');
                });
            });

            document.querySelector('.load-more-btn').addEventListener('click', function() {
                console.log('Carregar mais resultados');
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
