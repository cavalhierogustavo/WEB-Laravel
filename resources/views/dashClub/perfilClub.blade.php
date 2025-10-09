<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="./css/dashClub/perfilClub.css">
<style>
    #Logo{
        width: 150px;
        border-radius: 20px;
    }
</style>
</head>
<body>
    {{-- Mensagens de feedback --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo-section">
                <img id="Logo" src="{{ asset('img/logoPerfil.jpeg') }}" alt="Logo do Perfil">
            </div>
            
            <nav class="nav-menu">
                <ul>
                    <li class="nav-item">
                        <a href="{{ route('DashClub') }}" class="nav-link">
                            <img class="nav-icon" src="./img/dashboard.png" alt="">
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Oportunidades') }}" class="nav-link">
                            <img class="nav-icon" src="./img/oportunidades.png" alt="Perfil">
                            <span class="nav-text">Oportunidades</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('lista') }}" class="nav-link">
                            <img class="nav-icon" src="./img/vector.png" alt="Lista">
                            <span class="nav-text">Listas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Mensagens') }}" class="nav-link">
                            <img class="nav-icon" src="./img/mensagem.png" alt="Dashboard">
                            <span class="nav-text">Mensagens</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('notificações') }}" class="nav-link">
                            <img class="nav-icon" src="./img/notificaçao.png" alt="Perfil">
                            <span class="nav-text">Notificações</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('Perfil') }}" class="nav-link">
                            <img class="nav-icon" src="./img/perfil.png" alt="">
                            <span class="nav-text">Perfil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Pesquisa') }}" class="nav-link">
                            <img class="nav-icon" src="./img/pesquisa.png" alt="">
                            <span class="nav-text">Pesquisa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                       <a href="{{ route('Configurações') }}" class="nav-link">
                            <img class="nav-icon" src="./img/configuracoes.png" alt="Configurações">
                            <span class="nav-text">Configurações</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">
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
                            {{-- Uso direto do Auth::user() com verificação --}}
                            <span class="user-name">
                                @auth
                                    {{ Auth::user()->nomeClube ?? 'Nome do Clube' }}
                                @else
                                    Nome do Clube
                                @endauth
                            </span>
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
                            <button id="edit-profile-btn" class="follow-btn">Editar Perfil</button>
                        </div>
                        {{-- Dados do clube usando Auth::user() diretamente --}}
                        <h2 class="profile-name">
                            @auth
                                {{ Auth::user()->nomeClube ?? 'Nome do Clube' }}
                            @else
                                Nome do Clube
                            @endauth
                        </h2>
                        <p class="profile-description">
                            @auth
                                {{ Auth::user()->bioClube ?? 'Descrição do clube não disponível.' }}
                            @else
                                Descrição do clube não disponível.
                            @endauth
                        </p>
                        <p class="profile-sport">
                            <strong>Esporte:</strong> 
                            @auth
                                {{ Auth::user()->esporteClube ?? Auth::user()->esporte ?? 'Não informado' }}
                            @else
                                Não informado
                            @endauth
                        </p>
                        <p class="profile-location">
                            <strong>Localização:</strong> 
                            @auth
                                @if(Auth::user()->cidadeClube && Auth::user()->estadoClube)
                                    {{ Auth::user()->cidadeClube }} - {{ Auth::user()->estadoClube }}
                                @elseif(Auth::user()->cidadeClube)
                                    {{ Auth::user()->cidadeClube }}
                                @elseif(Auth::user()->estadoClube)
                                    {{ Auth::user()->estadoClube }}
                                @else
                                    Não informado
                                @endif
                            @else
                                Não informado
                            @endauth
                        </p>
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
                        <h3>Sobre o 
                            @auth
                                {{ Auth::user()->nomeClube ?? 'Clube' }}
                            @else
                                Clube
                            @endauth
                        </h3>
                        <p>
                            @auth
                                {{ Auth::user()->bioClube ?? 'Informações sobre o clube não disponíveis.' }}
                            @else
                                Informações sobre o clube não disponíveis.
                            @endauth
                        </p>
                        
                        <h4>Informações Gerais</h4>
                        <div class="club-info">
                            <p><strong>Nome:</strong> 
                                @auth
                                    {{ Auth::user()->nomeClube ?? 'Não informado' }}
                                @else
                                    Não informado
                                @endauth
                            </p>
                            <p><strong>Esporte:</strong> 
                                @auth
                                    {{ Auth::user()->esporteClube ?? Auth::user()->esporte ?? 'Não informado' }}
                                @else
                                    Não informado
                                @endauth
                            </p>
                            <p><strong>Cidade:</strong> 
                                @auth
                                    {{ Auth::user()->cidadeClube ?? 'Não informado' }}
                                @else
                                    Não informado
                                @endauth
                            </p>
                            <p><strong>Estado:</strong> 
                                @auth
                                    {{ Auth::user()->estadoClube ?? 'Não informado' }}
                                @else
                                    Não informado
                                @endauth
                            </p>
                            @auth
    @if(Auth::user()->anoCriacaoClube)
        <p><strong>Fundado em:</strong> 
            @if(is_object(Auth::user()->anoCriacaoClube) && method_exists(Auth::user()->anoCriacaoClube, 'format'))
                {{ Auth::user()->anoCriacaoClube->format('d/m/Y') }}
            @else
                {{ Auth::user()->anoCriacaoClube }}
            @endif
        </p>
    @endif
@endauth
                        </div>
                        
                        <h4>Contato</h4>
                        <div class="contact-info">
                            <p><strong>Email:</strong> 
                                @auth
                                    {{ Auth::user()->emailClube ?? 'Não informado' }}
                                @else
                                    Não informado
                                @endauth
                            </p>
                            @auth
                                @if(Auth::user()->enderecoClube)
                                    <p><strong>Endereço:</strong> 
                                        {{ Auth::user()->enderecoClube }}
                                        @if(Auth::user()->cidadeClube && Auth::user()->estadoClube)
                                            , {{ Auth::user()->cidadeClube }} - {{ Auth::user()->estadoClube }}
                                        @endif
                                    </p>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    {{-- Modal de Edição --}}
    <div id="edit-modal" class="modal-overlay hidden">
        <div class="modal-container">
            <div class="modal-header">
                <h3 class="modal-title">Editar Perfil do Clube</h3>
                <button id="close-modal-btn" class="modal-close-btn">&times;</button>
            </div>
            <div class="modal-body">
                <form id="edit-club-form" action="{{ route('clube.updateInfo') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nomeClube">Nome do Clube</label>
                        <div class="input-icon-wrapper">
                            <input type="text" id="nomeClube" name="nomeClube" class="form-control" 
                                   value="{{ old('nomeClube', Auth::check() ? (Auth::user()->nomeClube ?? '') : '') }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="esporteClube">Esporte Principal</label>
                        <div class="input-icon-wrapper">
                            <input type="text" id="esporteClube" name="esporteClube" class="form-control" 
                                   value="{{ old('esporteClube', Auth::check() ? (Auth::user()->esporteClube ?? Auth::user()->esporte ?? '') : '') }}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="estadoClube">Estado</label>
                            <div class="input-icon-wrapper">
                                <input type="text" id="estadoClube" name="estadoClube" class="form-control" 
                                       value="{{ old('estadoClube', Auth::check() ? (Auth::user()->estadoClube ?? '') : '') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cidadeClube">Cidade</label>
                            <div class="input-icon-wrapper">
                                <input type="text" id="cidadeClube" name="cidadeClube" class="form-control" 
                                       value="{{ old('cidadeClube', Auth::check() ? (Auth::user()->cidadeClube ?? '') : '') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="bioClube">Descrição (Bio)</label>
                        <textarea id="bioClube" name="bioClube" class="form-control" rows="4">{{ old('bioClube', Auth::check() ? (Auth::user()->bioClube ?? '') : '') }}</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="cancel-btn" class="btn btn-secondary">Cancelar</button>
                <button id="save-btn" type="submit" form="edit-club-form" class="btn btn-primary">Salvar Alterações</button>
            </div>
        </div>
    </div>

    {{-- Estilos --}}
    <style>
        .alert { 
            padding: 15px; 
            margin-bottom: 20px; 
            border: 1px solid transparent; 
            border-radius: 4px; 
            position: fixed; 
            top: 20px; 
            right: 20px; 
            z-index: 1050; 
            max-width: 400px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .alert-success { 
            color: #155724; 
            background-color: #d4edda; 
            border-color: #c3e6cb; 
        }
        .alert-danger { 
            color: #721c24; 
            background-color: #f8d7da; 
            border-color: #f5c6cb; 
        }
        .alert ul {
            margin: 0;
            padding-left: 20px;
        }
        .profile-sport, .profile-location {
            margin-top: 10px;
            color: #666;
        }
        .club-info p {
            margin-bottom: 8px;
        }
        .debug-panel {
            border-left: 4px solid #007bff;
        }
    </style>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Modal de edição
            const editProfileBtn = document.getElementById('edit-profile-btn');
            const editModal = document.getElementById('edit-modal');
            const closeModalBtn = document.getElementById('close-modal-btn');
            const cancelBtn = document.getElementById('cancel-btn');

            if(editProfileBtn) {
                const openModal = () => editModal.classList.remove('hidden');
                const closeModal = () => editModal.classList.add('hidden');

                editProfileBtn.addEventListener('click', openModal);
                closeModalBtn.addEventListener('click', closeModal);
                cancelBtn.addEventListener('click', closeModal);

                editModal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeModal();
                    }
                });
            }

            // Navegação do perfil
            const profileNavLinks = document.querySelectorAll('.profile-nav-link');
            const contentAreas = document.querySelectorAll('.content-area');

            profileNavLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    profileNavLinks.forEach(l => l.parentElement.classList.remove('active'));
                    this.parentElement.classList.add('active');
                    
                    contentAreas.forEach(area => area.classList.add('hidden'));
                    
                    const targetId = this.getAttribute('href').substring(1);
                    const targetArea = document.getElementById(targetId);
                    if (targetArea) {
                        targetArea.classList.remove('hidden');
                    }
                });
            });

            // Auto-hide alerts
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    setTimeout(() => {
                        alert.remove();
                    }, 300);
                }, 5000);
            });
        });
    </script>
</body>
</html>
