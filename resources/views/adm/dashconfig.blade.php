<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações - Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link rel="stylesheet" href="css/dashconfig.css">
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
                        <a href="dashHome">
                            <ion-icon name="grid-outline"></ion-icon>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="has-submenu" id="users-menu">
                        <a href="#">
                            <ion-icon name="people-outline"></ion-icon>
                            <span>Usuários</span>
                            <ion-icon class="arrow" name="chevron-down-outline"></ion-icon>
                        </a>
                        <ul class="submenu">
                            <li><a href="dashlist">Todos</a></li>
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
                <a href="dashconfig" class="active">
                    <ion-icon name="settings-outline"></ion-icon>
                    <span>Configurações</span>
                </a>
                <a href="#" id="logoutBtn" style="color:gray" >
                    <ion-icon name="log-out-outline"></ion-icon>
                    <span>Sair</span>
                </a>
            </div>
        </aside>
    
        <main class="main-content">
            <header class="main-header">
                <h1>Configurações</h1>
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
    
            <div class="settings-container">
                
                <nav class="settings-menu">
                    <p class="menu-title">Menu</p>
                    <ul>
                        <li><a href="#" class="active"><ion-icon name="person-circle-outline"></ion-icon> Perfil</a></li>
                        <li><a href="#"><ion-icon name="notifications-circle-outline"></ion-icon> Notificações</a></li>
                        <li><a href="#"><ion-icon name="color-palette-outline"></ion-icon> Tema</a></li>
                        <li><a href="#"><ion-icon name="cloud-download-outline"></ion-icon> Backup</a></li>
                        <li><a href="#"><ion-icon name="information-circle-outline"></ion-icon> Sobre</a></li>
                    </ul>
                </nav>
    
                <div class="profile-content">
                    <div class="card">
                        <div class="card-header">
                            <h3>Perfil</h3>
                            <button class="btn" id="openProfileModalBtn">Alterar</button>
                        </div>
                        <div class="profile-card-body">
                            <div class="avatar profile-avatar"><ion-icon name="person-outline"></ion-icon></div>
                            <div class="user-details">
                                <h4>João Pedro</h4>
                                <p>@joao</p>
                                <span class="tag">administrador</span>
                            </div>
                            <div class="profile-banner">
                                <div class="initial">J</div>
                            </div>
                        </div>
                    </div>
    
                    <div class="card">
                        <div class="card-header">
                            <h3>Informações pessoais</h3>
                            <button class="btn" id="openInfoModalBtn">Alterar</button>
                        </div>
                        <div class="info-grid">
                            <div class="info-item">
                                <label>Email</label>
                                <p id="emailDisplay">joao@com</p>
                            </div>
                             <div class="info-item">
                                <label>Endereço</label>
                                <p id="addressDisplay">Cristovão mendes 325</p>
                            </div>
                             <div class="info-item">
                                <label>Data de nascimento</label>
                                <p id="birthdateDisplay">13/02/2008</p>
                            </div>
                            <div class="info-item">
                                <label>Senha</label>
                                <p id="passwordDisplay">••••••••••</p>
                            </div>
                            <div class="info-item">
                                <label>Telefone</label>
                                <p id="phoneDisplay">(11) 99999-9999</p>
                            </div>
                        </div>
                    </div>
                    
                     <button class="btn btn-danger" style="align-self: flex-start;">Excluir</button>
                </div>
    
            </div>
        </main>
    </div>

    <div class="modal-overlay" id="profileModal">
        <div class="modal">
            <div class="modal-header">
                <h2>
                    <span class="icon-wrapper"><ion-icon name="person-outline"></ion-icon></span>
                    Detalhes de perfil
                </h2>
                <button class="close-btn" id="closeProfileModalBtn"><ion-icon name="close-outline"></ion-icon></button>
            </div>
            <form id="profileForm">
                <div class="form-group">
                    <label>Foto de perfil</label>
                    <div class="upload-area profile-pic">
                        <ion-icon name="camera-outline"></ion-icon>
                        <div class="edit-icon"><ion-icon name="pencil-outline"></ion-icon></div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Banner</label>
                    <div class="upload-area banner-pic">
                        <ion-icon name="image-outline"></ion-icon>
                        <div class="edit-icon"><ion-icon name="pencil-outline"></ion-icon></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fullName">Nome completo</label>
                    <input type="text" id="fullName" class="form-control" value="João Pedro">
                </div>
                <div class="form-group">
                    <label for="username">Nome de usuário</label>
                    <div class="input-with-icon">
                        <span class="icon">@</span>
                        <input type="text" id="username" class="form-control" value="joao">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" id="cancelProfileModalBtn">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal-overlay" id="infoModal">
        <div class="modal">
             <div class="modal-header">
                <h2>
                    <span class="icon-wrapper"><ion-icon name="document-text-outline"></ion-icon></span>
                    Informações Pessoais
                </h2>
                <button class="close-btn" id="closeInfoModalBtn"><ion-icon name="close-outline"></ion-icon></button>
            </div>
            <form id="personalInfoForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="emailInput">Email</label>
                        <input type="email" id="emailInput" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="addressInput">Endereço</label>
                        <input type="text" id="addressInput" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="birthdateInput">Data de nascimento</label>
                        <input type="text" id="birthdateInput" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phoneInput">Telefone</label>
                        <input type="text" id="phoneInput" class="form-control">
                    </div>
                    <div class="form-group full-width">
                        <label for="passwordInput">Nova Senha</label>
                        <input type="password" id="passwordInput" class="form-control" placeholder="Deixe em branco para não alterar">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" id="cancelInfoModalBtn">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal-overlay" id="logoutModal">
        <div class="modal" style="max-width: 450px;">
            <div class="modal-body confirm-logout">
                <div class="icon-wrapper">
                    <ion-icon name="log-out-outline"></ion-icon>
                </div>
                <div class="text-content">
                    <h3>Deseja deslogar?</h3>
                    <p>após essa escolha você tera que se logar novamente para ter acesso a esse recurso.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline" id="cancelLogoutBtn">Cancelar</button>
                <a href="adm"><button type="button" class="btn btn-primary">Continuar</button></a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const setupSubmenu = (menuId) => {
                const menuItem = document.getElementById(menuId);
                if (!menuItem) return;

                const link = menuItem.querySelector('a');
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    if (window.innerWidth > 1024) {
                        const parentLi = e.currentTarget.closest('.has-submenu');
                        parentLi.classList.toggle('active');
                    }
                });
            };

            setupSubmenu('users-menu');
            setupSubmenu('content-menu');

            const profileModal = document.getElementById('profileModal');
            const openProfileBtn = document.getElementById('openProfileModalBtn');
            const closeProfileBtn = document.getElementById('closeProfileModalBtn');
            const cancelProfileBtn = document.getElementById('cancelProfileModalBtn');
            const profileForm = document.getElementById('profileForm');

            const profileNameElement = document.querySelector('.user-details h4');
            const profileUsernameElement = document.querySelector('.user-details p');
            const headerNameElement = document.querySelector('.main-header .user-profile span');
            const fullNameInput = document.getElementById('fullName');
            const usernameInput = document.getElementById('username');

            if (profileModal && openProfileBtn && closeProfileBtn && cancelProfileBtn) {
                const openProfileModal = () => profileModal.classList.add('active');
                const closeProfileModal = () => profileModal.classList.remove('active');

                openProfileBtn.addEventListener('click', openProfileModal);
                closeProfileBtn.addEventListener('click', closeProfileModal);
                cancelProfileBtn.addEventListener('click', closeProfileModal);
                profileModal.addEventListener('click', (e) => {
                    if (e.target === profileModal) {
                        closeProfileModal();
                    }
                });

                profileForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    const newName = fullNameInput.value;
                    const newUsername = usernameInput.value;
                    
                    if (newName) {
                        profileNameElement.textContent = newName;
                        headerNameElement.textContent = newName;
                    }
                    if (newUsername) {
                        profileUsernameElement.textContent = `@${newUsername}`;
                    }

                    closeProfileModal();
                });
            }
            
            const infoModal = document.getElementById('infoModal');
            const openInfoBtn = document.getElementById('openInfoModalBtn');
            const closeInfoBtn = document.getElementById('closeInfoModalBtn');
            const cancelInfoBtn = document.getElementById('cancelInfoModalBtn');
            const personalInfoForm = document.getElementById('personalInfoForm');

            const emailDisplay = document.getElementById('emailDisplay');
            const addressDisplay = document.getElementById('addressDisplay');
            const birthdateDisplay = document.getElementById('birthdateDisplay');
            const passwordDisplay = document.getElementById('passwordDisplay');
            const phoneDisplay = document.getElementById('phoneDisplay');

            const emailInput = document.getElementById('emailInput');
            const addressInput = document.getElementById('addressInput');
            const birthdateInput = document.getElementById('birthdateInput');
            const passwordInput = document.getElementById('passwordInput');
            const phoneInput = document.getElementById('phoneInput');

            if (infoModal && openInfoBtn && closeInfoBtn && cancelInfoBtn) {
                const openInfoModal = () => {
                    emailInput.value = emailDisplay.textContent;
                    addressInput.value = addressDisplay.textContent;
                    birthdateInput.value = birthdateDisplay.textContent;
                    phoneInput.value = phoneDisplay.textContent;
                    passwordInput.value = "";
                    infoModal.classList.add('active');
                };
                const closeInfoModal = () => infoModal.classList.remove('active');

                openInfoBtn.addEventListener('click', openInfoModal);
                closeInfoBtn.addEventListener('click', closeInfoModal);
                cancelInfoBtn.addEventListener('click', closeInfoModal);
                infoModal.addEventListener('click', (e) => {
                    if (e.target === infoModal) {
                        closeInfoModal();
                    }
                });

                personalInfoForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    emailDisplay.textContent = emailInput.value;
                    addressDisplay.textContent = addressInput.value;
                    birthdateDisplay.textContent = birthdateInput.value;
                    phoneDisplay.textContent = phoneInput.value;
                    if (passwordInput.value) {
                         passwordDisplay.textContent = '••••••••••';
                    }
                    closeInfoModal();
                });
            }

            const logoutModal = document.getElementById('logoutModal');
            const openLogoutBtn = document.getElementById('logoutBtn');
            const cancelLogoutBtn = document.getElementById('cancelLogoutBtn');
            
            if (logoutModal && openLogoutBtn && cancelLogoutBtn) {
                const openLogoutModal = (e) => {
                    e.preventDefault();
                    logoutModal.classList.add('active');
                };
                const closeLogoutModal = () => logoutModal.classList.remove('active');
    
                openLogoutBtn.addEventListener('click', openLogoutModal);
                cancelLogoutBtn.addEventListener('click', closeLogoutModal);
                logoutModal.addEventListener('click', (e) => {
                    if (e.target === logoutModal) {
                        closeLogoutModal();
                    }
                });
            }
        });
    </script>
</body>
</html>

