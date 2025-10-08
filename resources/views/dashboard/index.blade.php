<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ url('css/dashboard/home.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- SCRIPT DOS ÍCONES (IONICONS ) - ESSENCIAL -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="dashboard-container">
        <!-- ======================= -->
        <!--      BARRA LATERAL      -->
        <!-- ======================= -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1 class="logo">Logo aqui</h1>
            </div>
            <nav class="sidebar-nav">
                <span class="menu-title">Menu</span>
                <ul>
                    <li class="active"><a href="#"><ion-icon name="grid-outline"></ion-icon> Dashboard</a></li>
                    <li><a href="#"><ion-icon name="people-outline"></ion-icon> Usuários <ion-icon class="chevron" name="chevron-down-outline"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="football-outline"></ion-icon> Esportes</a></li>
                    <li><a href="#"><ion-icon name="rocket-outline"></ion-icon> Oportunidades</a></li>
                    <li><a href="#"><ion-icon name="list-outline"></ion-icon> Listas</a></li>
                    <li><a href="#"><ion-icon name="alert-circle-outline"></ion-icon> Denúncias <ion-icon class="chevron" name="chevron-down-outline"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="document-text-outline"></ion-icon> Conteúdo <ion-icon class="chevron" name="chevron-down-outline"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="stats-chart-outline"></ion-icon> Estatísticas</a></li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <ul>
                    <li><a href="#"><ion-icon name="settings-outline"></ion-icon> Configurações</a></li>
                    <li><a href="#" class="logout"><ion-icon name="log-out-outline"></ion-icon> Sair</a></li>
                </ul>
            </div>
        </aside>

        <!-- ======================= -->
        <!--    CONTEÚDO PRINCIPAL   -->
        <!-- ======================= -->
        <main class="main-content">
            <header class="main-header">
                <h2 class="page-title">Dashboard</h2>
                <div class="user-menu">
                    <button class="icon-button"><ion-icon name="notifications-outline"></ion-icon></button>
                    <div class="user-profile">
                        <div class="avatar">
                            <ion-icon name="person-outline"></ion-icon>
                        </div>
                        <span>João Pedro</span>
                    </div>
                </div>
            </header>

            <div class="dashboard-grid">
                <!-- Stat Cards -->
                <div class="stat-card">
                    <div class="stat-info">
                        <p class="stat-title">Usuários <span class="stat-change positive"><ion-icon name="arrow-up-outline"></ion-icon> 2.5%</span></p>
                        <p class="stat-number">120</p>
                        <p class="stat-detail">Última visita: 12</p>
                    </div>
                    <div class="stat-icon-bg"><ion-icon name="people-outline"></ion-icon></div>
                </div>
                <div class="stat-card">
                    <div class="stat-info">
                        <p class="stat-title">Clubes <span class="stat-change negative"><ion-icon name="arrow-down-outline"></ion-icon> 1.5%</span></p>
                        <p class="stat-number">71</p>
                        <p class="stat-detail">Última visita: 72</p>
                    </div>
                    <div class="stat-icon-bg"><ion-icon name="shield-outline"></ion-icon></div>
                </div>
                <div class="stat-card">
                    <div class="stat-info">
                        <p class="stat-title">Oportunidades <span class="stat-change positive"><ion-icon name="arrow-up-outline"></ion-icon> 0%</span></p>
                        <p class="stat-number">27</p>
                        <p class="stat-detail">Última visita: 27</p>
                    </div>
                    <div class="stat-icon-bg"><ion-icon name="rocket-outline"></ion-icon></div>
                </div>
                <div class="stat-card">
                    <div class="stat-info">
                        <p class="stat-title">Denúncias <span class="stat-change positive"><ion-icon name="arrow-up-outline"></ion-icon> 2.5%</span></p>
                        <p class="stat-number">13</p>
                        <p class="stat-detail">Última visita: 12</p>
                    </div>
                    <div class="stat-icon-bg"><ion-icon name="alert-circle-outline"></ion-icon></div>
                </div>

                <!-- Main Panels -->
                <div class="panel chart-panel">
                    <div class="panel-header">
                        <h3 class="panel-title"><ion-icon name="person-add-outline"></ion-icon> Cadastro de usuários</h3>
                        <button class="filter-button">6 meses <ion-icon class="chevron" name="chevron-down-outline"></ion-icon></button>
                    </div>
                    <div class="chart-content">
                        <!-- O gráfico seria renderizado aqui por uma biblioteca JS -->
                        <div class="chart-placeholder">[ Local para o Gráfico ]</div>
                        <div class="chart-labels">
                            <span>Jan</span><span>Fev</span><span>Mar</span><span>Mai</span><span>Jun</span><span>Jul</span>
                        </div>
                    </div>
                </div>
                <div class="panel list-panel">
                    <div class="panel-header">
                        <h3 class="panel-title"><ion-icon name="rocket-outline"></ion-icon> Últimas oportunidades</h3>
                    </div>
                    <ul class="item-list">
                        <li>
                            <div class="item-icon team-logo"></div>
                            <span class="item-title">Chelsea</span>
                            <span class="item-subtitle">Zagueiro</span>
                            <div class="item-extra-icon ball-icon"><ion-icon name="football-outline"></ion-icon></div>
                        </li>
                        <!-- Adicione mais itens aqui -->
                    </ul>
                </div>
                <div class="panel list-panel">
                    <div class="panel-header">
                        <h3 class="panel-title"><ion-icon name="shield-half-outline"></ion-icon> Últimas denúncias</h3>
                    </div>
                    <ul class="item-list">
                        <li>
                            <div class="item-icon user-avatar"><ion-icon name="person-circle-outline"></ion-icon></div>
                            <span class="item-title">João Pedro</span>
                            <div class="item-extra-icon"><ion-icon name="document-text-outline"></ion-icon></div>
                        </li>
                        <!-- Adicione mais itens aqui -->
                    </ul>
                </div>

                <!-- Recent Actions Table -->
                <div class="panel recent-actions-panel">
                    <div class="panel-header">
                        <h3 class="panel-title">Ações recentes</h3>
                        <button class="filter-button">Ordenar por <ion-icon class="chevron" name="chevron-down-outline"></ion-icon></button>
                    </div>
                    <div class="table-container">
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
                                    <td>30 de agosto de 2025 às 13:04</td>
                                    <td><span class="tag tag-object">Oportunidade</span></td>
                                    <td><span class="tag tag-action">Criar</span></td>
                                    <td><div class="entity-cell"><div class="item-icon team-logo small"></div> Chelsea</div></td>
                                    <td><span class="tag tag-entity">Clube</span></td>
                                    <td>O clube criou uma oportunidade.</td>
                                    <td><span class="tag tag-status">Concluído</span></td>
                                </tr>
                                <!-- Adicione mais linhas aqui -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
