<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="./css/dashClub/perfilClub.css">
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
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <img class="nav-icon" src="./img/perfil.png" alt="">
                            <span class="nav-text">Perfil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pesquisa" class="nav-link">
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
        <main class="main-content profile-page">
            <!-- Header -->
            <header class="profile-header">
                <h1 class="page-title">Perfil</h1>
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

            <!-- Profile Banner -->
            <section class="profile-banner">
                <div class="banner-background"></div>
                <div class="profile-info">
                    <div class="profile-avatar-container">
                        <div class="profile-avatar-large"></div>
                    </div>
                    <div class="profile-details">
                        <div class="profile-stats">
                            <span class="followers-count">125k seguidores</span>
                            <button class="follow-btn">Seguir</button>
                        </div>
                        <h2 class="profile-name">Norven FC</h2>
                        <p class="profile-description">A Norven Fc é um time fictício criado em 15 de Setembro de 2025.</p>
                    </div>
                </div>
            </section>

            <!-- Profile Navigation -->
            <section class="profile-navigation">
                <nav class="profile-nav">
                    <ul class="profile-nav-list">
                        <li class="profile-nav-item active">
                            <a href="#vagas" class="profile-nav-link">Vagas</a>
                        </li>
                        <li class="profile-nav-item">
                            <a href="#equipe" class="profile-nav-link">Equipe</a>
                        </li>
                        <li class="profile-nav-item">
                            <a href="#conquistas" class="profile-nav-link">Conquistas</a>
                        </li>
                        <li class="profile-nav-item">
                            <a href="#sobre" class="profile-nav-link">Sobre</a>
                        </li>
                    </ul>
                </nav>
            </section>

            <!-- Profile Content -->
            <section class="profile-content">
                <div class="content-area" id="vagas">
                    <div class="empty-state">
                        <div class="empty-icon">📋</div>
                        <h3 class="empty-title">Nenhuma vaga disponível</h3>
                        <p class="empty-description">Este perfil ainda não publicou nenhuma vaga. Volte mais tarde para ver as oportunidades disponíveis.</p>
                        <button class="create-opportunity-btn">Criar Oportunidade</button>
                    </div>
                </div>

                <div class="content-area hidden" id="equipe">
                    <div class="team-grid">
                        <div class="team-member">
                            <div class="member-avatar"></div>
                            <h4 class="member-name">João Silva</h4>
                            <p class="member-position">Técnico</p>
                        </div>
                        <div class="team-member">
                            <div class="member-avatar"></div>
                            <h4 class="member-name">Maria Santos</h4>
                            <p class="member-position">Preparadora Física</p>
                        </div>
                        <div class="team-member">
                            <div class="member-avatar"></div>
                            <h4 class="member-name">Pedro Costa</h4>
                            <p class="member-position">Goleiro</p>
                        </div>
                        <div class="team-member">
                            <div class="member-avatar"></div>
                            <h4 class="member-name">Ana Lima</h4>
                            <p class="member-position">Zagueira</p>
                        </div>
                    </div>
                </div>

                <div class="content-area hidden" id="conquistas">
                    <div class="achievements-list">
                        <div class="achievement-item">
                            <div class="achievement-icon">🏆</div>
                            <div class="achievement-info">
                                <h4 class="achievement-title">Campeonato Regional 2025</h4>
                                <p class="achievement-description">1º lugar no campeonato regional</p>
                                <span class="achievement-date">Setembro 2025</span>
                            </div>
                        </div>
                        <div class="achievement-item">
                            <div class="achievement-icon">🥈</div>
                            <div class="achievement-info">
                                <h4 class="achievement-title">Copa da Cidade 2024</h4>
                                <p class="achievement-description">2º lugar na copa municipal</p>
                                <span class="achievement-date">Dezembro 2024</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-area hidden" id="sobre">
                    <div class="about-content">
                        <h3>Sobre o Norven FC</h3>
                        <p>O Norven FC foi fundado em 15 de setembro de 2025 com o objetivo de promover o futebol na região e desenvolver talentos locais. Nossa equipe é composta por profissionais dedicados e atletas comprometidos com a excelência esportiva.</p>
                        
                        <h4>Nossa Missão</h4>
                        <p>Desenvolver o potencial de cada atleta, promovendo valores como disciplina, trabalho em equipe e fair play.</p>
                        
                        <h4>Contato</h4>
                        <div class="contact-info">
                            <p><strong>Email:</strong> contato@norvenfc.com</p>
                            <p><strong>Telefone:</strong> (11) 99999-9999</p>
                            <p><strong>Endereço:</strong> Rua do Futebol, 123 - São Paulo, SP</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Navegação do perfil
            const profileNavLinks = document.querySelectorAll('.profile-nav-link');
            const contentAreas = document.querySelectorAll('.content-area');

            profileNavLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active de todos os links
                    profileNavLinks.forEach(l => l.parentElement.classList.remove('active'));
                    
                    // Adiciona active ao link clicado
                    this.parentElement.classList.add('active');
                    
                    // Esconde todas as áreas de conteúdo
                    contentAreas.forEach(area => area.classList.add('hidden'));
                    
                    // Mostra a área correspondente
                    const targetId = this.getAttribute('href').substring(1);
                    const targetArea = document.getElementById(targetId);
                    if (targetArea) {
                        targetArea.classList.remove('hidden');
                    }
                });
            });

            // Botão de seguir
            const followBtn = document.querySelector('.follow-btn');
            followBtn.addEventListener('click', function() {
                if (this.textContent === 'Seguir') {
                    this.textContent = 'Seguindo';
                    this.classList.add('following');
                } else {
                    this.textContent = 'Seguir';
                    this.classList.remove('following');
                }
            });

            // Botão de criar oportunidade
            const createOpportunityBtn = document.querySelector('.create-opportunity-btn');
            if (createOpportunityBtn) {
                createOpportunityBtn.addEventListener('click', function() {
                    console.log('Criar nova oportunidade');
                    // Aqui você pode adicionar a lógica para criar uma nova oportunidade
                });
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
