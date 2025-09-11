<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Lista de Usuários</title>
    
    <link rel="stylesheet" href="css/dashlist.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <img src="img/LogoBrancaVerde.png" alt="Logo" class="logo">
            </div>
            <nav class="sidebar-nav">
                <p class="menu-title">Menu</p>
                <ul>
                    <li>
                        <a href="dashHome"> <ion-icon name="grid-outline"></ion-icon>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="has-submenu active" id="users-menu"> <a href="#">
                            <ion-icon name="people-outline"></ion-icon>
                            <span>Usuários</span>
                            <ion-icon class="arrow" name="chevron-down-outline"></ion-icon>
                        </a>
                        <ul class="submenu">
                            <li><a href="#" class="submenu-active">Todos</a></li>
                            <li><a href="#">Atletas</a></li>
                            <li><a href="#">Clubes</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <ion-icon name="rocket-outline"></ion-icon>
                            <span>Oportunidades</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <ion-icon name="shield-half-outline"></ion-icon>
                            <span>Denúncias</span>
                        </a>
                    </li>
                    <li class="has-submenu" id="content-menu">
                        <a href="#">
                            <ion-icon name="document-text-outline"></ion-icon>
                            <span>Conteúdo</span>
                            <ion-icon class="arrow" name="chevron-down-outline"></ion-icon>
                        </a>
                        <ul class="submenu">
                            <li><a href="#">Artigos</a></li>
                            <li><a href="#">Vídeos</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <ion-icon name="stats-chart-outline"></ion-icon>
                            <span>Estatísticas</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <a href="dashconfig">
                    <ion-icon name="settings-outline"></ion-icon>
                    <span>Configurações</span>
                </a>
                <a href="#" id="logoutBtn">
                    <ion-icon name="log-out-outline"></ion-icon>
                    <span>Sair</span>
                </a>
            </div>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <h1>Lista de usuários</h1>
                <div class="header-actions">
                    <button class="icon-btn">
                        <ion-icon name="notifications-outline"></ion-icon>
                    </button>
                    <div class="user-profile">
                        <div class="avatar">
                            <ion-icon name="person-outline"></ion-icon>
                        </div>
                        <span>João Pedro</span>
                    </div>
                </div>
            </header>

            <section class="toolbar">
                <div class="search-bar">
                    <ion-icon name="search-outline"></ion-icon>
                    <input type="text" placeholder="Pesquisar">
                </div>
                <div class="action-buttons">
                    <button class="btn btn-secondary">
                        <ion-icon name="funnel-outline"></ion-icon>
                        <span>Ordenar por</span>
                        <ion-icon name="chevron-down-outline"></ion-icon>
                    </button>
                    <button class="btn btn-primary">Adicionar</button>
                </div>
            </section>

            <section class="user-list widget">
                <div class="list-header">
                    <span>Foto/avatar</span>
                    <span>Nome de usuário</span>
                    <span>Tipo</span>
                    <span>Status</span>
                    <span>Data de cadastro</span>
                    <span>Ações rápidas</span>
                </div>

                <div class="list-row">
                    <div class="user-avatar">
                        <div class="avatar small-avatar">
                            <ion-icon name="person-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="user-info">
                        <strong class="user-name">João Pedro</strong>
                        <p class="user-username">@joaopedro</p>
                    </div>
                    <div class="user-type"><span class="tag tag-atleta">Atleta</span></div>
                    <div class="user-status"><span class="tag tag-ativo">Ativo</span></div>
                    <span class="user-date">23 de Outubro de 2024</span>
                    <div class="action-icons">
                        <button class="icon-btn js-view-btn"><ion-icon name="eye-outline"></ion-icon></button>
                        <button class="icon-btn js-edit-btn"><ion-icon name="create-outline"></ion-icon></button>
                        <button class="icon-btn danger js-delete-btn"><ion-icon name="trash-outline"></ion-icon></button>
                    </div>
                </div>

                <div class="list-row">
                    <div class="user-avatar">
                        <div class="avatar small-avatar" style="background-color: #FFF0F0;">
                            <ion-icon name="business-outline" style="color: #F84F4F;"></ion-icon>
                        </div>
                    </div>
                    <div class="user-info">
                        <strong class="user-name">Clube A</strong>
                        <p class="user-username">@clubea</p>
                    </div>
                    <div class="user-type"><span class="tag entity-club">Clube</span></div>
                    <div class="user-status"><span class="tag tag-inativo">Inativo</span></div>
                    <span class="user-date">15 de Julho de 2024</span>
                    <div class="action-icons">
                        <button class="icon-btn js-view-btn"><ion-icon name="eye-outline"></ion-icon></button>
                        <button class="icon-btn js-edit-btn"><ion-icon name="create-outline"></ion-icon></button>
                        <button class="icon-btn danger js-delete-btn"><ion-icon name="trash-outline"></ion-icon></button>
                    </div>
                </div>
            </section>
        </main>
    </div>
    
    <div id="view-user-modal" class="modal-overlay hidden">
        <div class="view-modal-container">
            <div class="view-modal-header">
                <div class="view-modal-header-icon"><ion-icon name="person-circle-outline"></ion-icon></div>
                <h2>Detalhes do Usuário</h2>
                <button class="view-modal-close-btn" id="close-view-modal-btn">&times;</button>
            </div>
            <div class="view-modal-form">
                <div class="form-row">
                    <div class="form-group">
                        <label>Nome Completo</label>
                        <div class="mock-input" id="view-user-name"></div>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <div class="mock-input" id="view-user-username"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Tipo</label>
                        <div class="mock-input" id="view-user-type"></div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div class="mock-input" id="view-user-status"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Data de Cadastro</label>
                    <div class="mock-input" id="view-user-date"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="delete-confirmation-modal" class="modal-overlay hidden">
        <div class="confirmation-dialog">
            <div class="dialog-icon"><ion-icon name="alert-outline"></ion-icon></div>
            <div class="dialog-content">
                <h2>Deseja excluir este usuário?</h2>
                <p>Após a confirmação o status da conta deste usuário será alterado para “excluído”.</p>
                <div class="dialog-actions">
                    <button class="btn btn-secondary blue-border" id="cancel-delete-btn">Cancelar</button>
                    <button class="btn btn-primary-blue" id="confirm-delete-btn">Continuar</button>
                </div>
            </div>
        </div>
    </div>

    <div id="edit-user-modal" class="modal-overlay hidden">
        <div class="edit-modal-container">
            <h2 class="edit-modal-title">Editar Usuário</h2>
            <form id="edit-form">
                <div class="form-group">
                    <label for="edit-user-name">Nome</label>
                    <input type="text" id="edit-user-name" placeholder="Nome completo do usuário">
                </div>
                <div class="form-group">
                    <label for="edit-user-username">Username</label>
                    <input type="text" id="edit-user-username" placeholder="@username">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="edit-user-type">Tipo</label>
                        <select id="edit-user-type">
                            <option value="Atleta">Atleta</option>
                            <option value="Clube">Clube</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit-user-status">Status</label>
                        <select id="edit-user-status">
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="dialog-actions">
                    <button type="button" class="btn btn-secondary" id="cancel-edit-btn">Cancelar</button>
                    <button type="submit" class="btn btn-primary-blue" id="save-edit-btn">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal-overlay hidden" id="logoutModal">
        <div class="modal">
            <div class="modal-body confirm-logout">
                <div class="icon-wrapper">
                    <ion-icon name="log-out-outline"></ion-icon>
                </div>
                <div class="text-content">
                    <h3>Deseja sair?</h3>
                    <p>Você será redirecionado para a página de login.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline" id="cancelLogoutBtn">Cancelar</button>
                <a href="adm"><button type="button" class="btn btn-primary">Continuar</button></a>
            </div>
        </div>
    </div>

    <script src="js/dashlist.js"></script>
</body>
</html>