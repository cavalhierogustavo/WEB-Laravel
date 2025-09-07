<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Lista de Usuários</title>
    <link rel="stylesheet" href="{{ url('css/dashboard/usuarios.css') }}">
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
                <h2>Logo aqui</h2>
            </div>
            <nav class="sidebar-nav">
                <p class="menu-title">Menu</p>
                <ul>
                    <li>
                        <a href="../dashHome/home.html"> <ion-icon name="grid-outline"></ion-icon>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="has-submenu active" id="users-menu"> <a href="#">
                            <ion-icon name="people-outline"></ion-icon>
                            <span>Usuários</span>
                            <ion-icon class="arrow" name="chevron-down-outline"></ion-icon>
                        </a>
                        <ul class="submenu">
                            <li><a href="#" class="submenu-active">Todos</a></li> <li><a href="#">Atletas</a></li>
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
                <a href="#">
                    <ion-icon name="settings-outline"></ion-icon>
                    <span>Configurações</span>
                </a>
                <a href="#">
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
                    <input type="text" placeholder="Pesquisar" id="search-input">
                </div>
                <div class="action-buttons">
                    <div class="dropdown order-by">
                        <div class="btn btn-secondary dropdown-trigger">
                            <ion-icon name="funnel-outline"></ion-icon>
                            <span>Ordenar por</span>
                            <ion-icon name="chevron-down-outline"></ion-icon>
                        </div>
                        <ul class="dropdown-menu hidden">
                            <li class="active" data-value="todos">Todos</li>
                            <li data-value="nomeCompletoUsuario">Nome completo</li>
                            <li data-value="nomeUsuario">Nome de usuário</li>
                            <li data-value="dataCadastroUsuario">Data de cadastro</li>
                        </ul>
                    </div>
                    <button class="btn btn-primary">Adicionar</button>
                </div>
            </section>

            <section class="user-list widget">
                <div class="list-header">
                    <span>Foto/avatar</span>
                    <span>Nome de usuário</span>
                    <span>Email</span>
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

                    <div class="user-email"><span>fjoaopedro1302@gmail.com</span></div>

                    <div class="user-type"><span class="tag tag-atleta">Atleta</span></div>

                    <div class="user-status"><span class="tag tag-ativo">Ativo</span></div>

                    <span class="user-date">23 de Outubro de 2024</span>

                    <div class="action-icons">
                        <button class="icon-btn"><ion-icon name="eye-outline"></ion-icon></button>
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

                    <div class="user-email"><span>clubea@clubea.com</span></div>

                    <div class="user-type"><span class="tag entity-club">Clube</span></div>
                    
                    <div class="user-status"><span class="tag tag-inativo">Inativo</span></div>

                    <span class="user-date">15 de Julho de 2024</span>

                    <div class="action-icons">
                        <button class="icon-btn"><ion-icon name="eye-outline"></ion-icon></button>
                        <button class="icon-btn js-edit-btn"><ion-icon name="create-outline"></ion-icon></button>
                        <button class="icon-btn danger js-delete-btn"><ion-icon name="trash-outline"></ion-icon></button>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <div id="delete-confirmation-modal" class="modal-overlay hidden">
        <div class="confirmation-dialog">
            <div class="dialog-icon">
                <ion-icon name="alert-outline"></ion-icon>
            </div>
            
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
            <div class="edit-modal-header">
                <span class="edit-modal-icon">
                    <ion-icon name="person-circle-outline" class="edit-user-icon"></ion-icon>
                </span>

                <h2 class="edit-modal-title">Detalhes de usuário</h2>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="edit-user-type">Tipo de conta</label>
                    <select name="" id="edit-user-type">
                        <option value="Atleta">Atleta</option>
                        <option value="Clube">Clube</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="edit-user-signup">Cadastro</label>
                    <input type="type" name="" id="edit-user-signup">
                </div>
            </div>

            <div class="form-group">
                <select name="" id="edit-user-status">
                    <option value="Atleta">Ativo</option>
                    <option value="Clube">Bloqueado</option>
                </select>
            </div>

            <div class="form-group">
                <label for="edit-user-name">Nome completo</label>
                <input type="text" name="" id="edit-user-name">
            </div>

            <div class="form-group">
                <label for="">Nome de usuário</label>
                <input type="text" name="" id="edit-user-username">
            </div>
            
            <div class="form-group">
                <label for="edit-user-profile-img">Foto de perfil</label>
                <div class="user-profile-img"></div>
                <input type="file" name="" id="edit-user-profile-img">
                <label for="edit-user-profile-img" class="choose-img-btn">Upload</label>
            </div>

            <div class="form-group">
                <label for="edit-user-banner-img">Banner</label>
                <div class="user-banner-img"></div>
                <input type="file" name="" id="edit-user-banner-img">
                <label for="edit-user-banner-img" class="choose-img-btn">Upload</label>
            </div>

            <div class="form-group">
                <label for="edit-user-email">Email</label>
                <input type="text" name="" id="edit-user-email">
            </div>

            <div class="form-group">
                <label for="edit-user-nationality">Nacionalidade</label>
                <input type="text" name="" id="edit-user-nationality">
            </div>

            <div class="dialog-actions">
                <button class="btn btn-secondary" id="cancel-edit-btn">Cancelar</button>
                <button class="btn btn-primary-blue" id="save-edit-btn">Salvar Alterações</button>
            </div>
        </div>
    </div>

    <script src="{{ url('js/dashboard/usuarios.js') }}"></script>
</body>
</html>