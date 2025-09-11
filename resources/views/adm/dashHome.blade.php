<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Responsivo</title>
    
    <link rel="stylesheet" href="css/dashhome.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        <a href="#" class="active">
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
                            <li><a href="{{url('dashlist')}}">Todos</a></li>
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
                <a href="{{url('dashconfig')}}">
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
                <h1>Dashboard</h1>
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

            <section class="stats-cards">
                <div class="card">
                    <div class="card-info">
                        <p>Usuários</p>
                        <h3>120</h3>
                        <span class="change positive"><ion-icon name="arrow-up-outline"></ion-icon> 23%</span>
                    </div>
                    <div class="card-icon user-icon">
                        <ion-icon name="person-add-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div class="card-info">
                        <p>Clubes</p>
                        <h3>71</h3>
                        <span class="change negative"><ion-icon name="arrow-down-outline"></ion-icon> 4%</span>
                    </div>
                    <div class="card-icon club-icon">
                        <ion-icon name="shield-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div class="card-info">
                        <p>Oportunidades</p>
                        <h3>27</h3>
                        <span class="change neutral"><ion-icon name="arrow-forward-outline"></ion-icon> 1%</span>
                    </div>
                    <div class="card-icon op-icon">
                        <ion-icon name="rocket-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div class="card-info">
                        <p>Denúncias</p>
                        <h3>13</h3>
                        <span class="change positive"><ion-icon name="arrow-up-outline"></ion-icon> 25%</span>
                    </div>
                    <div class="card-icon report-icon">
                        <ion-icon name="alert-circle-outline"></ion-icon>
                    </div>
                </div>
            </section>

            <section class="main-widgets">
                <div class="widget chart-widget">
                    <div class="widget-header">
                        <h3><ion-icon name="person-add-outline"></ion-icon> Cadastro de usuários</h3>
                        <div class="dropdown">
                            <span>6 meses</span>
                            <ion-icon name="chevron-down-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="userChart"></canvas>
                    </div>
                </div>
                
                <div class="widget-group-small">
                    <div class="widget list-widget">
                        <div class="widget-header">
                            <h3><ion-icon name="rocket-outline"></ion-icon> Últimas oportunidades</h3>
                        </div>
                        <ul class="item-list">
                            <li>
                                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/c/cc/Chelsea_FC.svg/1200px-Chelsea_FC.svg.png" alt="Chelsea">
                                <span><strong>Chelsea</strong> Zagueiro</span>
                                <button class="icon-btn"><ion-icon name="ellipsis-horizontal"></ion-icon></button>
                            </li>
                        </ul>
                    </div>
                    <div class="widget list-widget">
                        <div class="widget-header">
                            <h3><ion-icon name="shield-half-outline"></ion-icon> Últimas denúncias</h3>
                        </div>
                        <ul class="item-list">
                            <li>
                                <div class="avatar">
                                    <ion-icon name="person-outline"></ion-icon>
                                </div>
                                <span><strong>João Pedro</strong></span>
                                <button class="icon-btn"><ion-icon name="document-text-outline"></ion-icon></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="recent-actions widget">
               <div class="widget-header">
                    <h3>Ações recentes</h3>
                    <div class="dropdown">
                        <span>Ordenar por <ion-icon name="chevron-down-outline"></ion-icon></span>
                    </div>
                </div>
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Objeto</th>
                                <th>Ação</th>
                                <th>Entidade</th>
                                <th>Tipo de Entidade</th>
                                <th>Descrição</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>30 de agosto de 2025</td>
                                <td><a href="#">Oportunidade</a></td>
                                <td><span class="tag action-create">Criar</span></td>
                                <td><img src="https://upload.wikimedia.org/wikipedia/en/thumb/c/cc/Chelsea_FC.svg/1200px-Chelsea_FC.svg.png" alt="Chelsea"> Chelsea</td>
                                <td><span class="tag entity-club">Clube</span></td>
                                <td>O clube criou uma oportunidade</td>
                                <td><span class="tag status-concluido">Concluído</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <div class="modal-overlay" id="logoutModal">
        <div class="modal">
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
                    
                    if (window.innerWidth > 992) {
                        menuItem.classList.toggle('active');
                        const submenu = menuItem.querySelector('.submenu');
                        if (menuItem.classList.contains('active')) {
                            submenu.style.maxHeight = submenu.scrollHeight + 'px';
                        } else {
                            submenu.style.maxHeight = '0';
                        }
                    }
                });
            };

            setupSubmenu('users-menu');
            setupSubmenu('content-menu');

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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('userChart').getContext('2d');
            const labels = ['Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto'];
            const dataValues = [65, 59, 80, 81, 56, 120];

            const gradient = ctx.createLinearGradient(0, 0, 0, 250);
            gradient.addColorStop(0, 'rgba(74, 114, 255, 0.2)');
            gradient.addColorStop(1, 'rgba(74, 114, 255, 0)');

            const userChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Novos Usuários',
                        data: dataValues,
                        borderColor: '#4A72FF',
                        backgroundColor: gradient,
                        borderWidth: 2.5,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#4A72FF',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        tension: 0.4,
                        fill: true 
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#333',
                            titleFont: { size: 14, family: 'Poppins' },
                            bodyFont: { size: 12, family: 'Poppins' },
                            padding: 10,
                            cornerRadius: 6,
                            displayColors: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            border: { display: false },
                            grid: { color: '#f0f0f0', drawTicks: false },
                            ticks: { padding: 10, font: { family: 'Poppins' } }
                        },
                        x: {
                            border: { display: false },
                            grid: { display: false },
                            ticks: { padding: 10, font: { family: 'Poppins' } }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>

