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
<style>
    #Logo{
        width: 150px;
        border-radius: 20px;
    }
</style>
<body>
    <div class="dashboard-container">

        <aside class="sidebar">
            <div class="sidebar-header">
    <img id="Logo" src="{{ asset('img/logoPerfil.jpeg') }}" alt="Logo do Perfil">
            </div>
            <nav class="sidebar-nav">
                <span class="menu-title">Menu</span>
                <ul>
                    <li class="active"><a href="#"><ion-icon name="grid-outline"></ion-icon> Dashboard</a></li>
                    <li><a href="/dashboard/usuarios"><ion-icon name="people-outline"></ion-icon> Usuários <ion-icon class="chevron" name="chevron-down-outline"></ion-icon></a></li>
                    <li><a href="/dashboard/esporte"><ion-icon name="football-outline"></ion-icon> Esportes</a></li>
                    <li><a href="/dashboard/oportunidades"><ion-icon name="rocket-outline"></ion-icon> Oportunidades</a></li>
                    <li><a href=""><ion-icon name="list-outline"></ion-icon> Listas</a></li>
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
                        <p class="stat-number" id="stat-usuarios">...</p>
                        <p class="stat-detail">Última visita: 12</p>
                    </div>
                    <div class="stat-icon-bg"><ion-icon name="people-outline"></ion-icon></div>
                </div>
                <div class="stat-card">
                    <div class="stat-info">
                        <p class="stat-title">Clubes <span class="stat-change negative"><ion-icon name="arrow-down-outline"></ion-icon> 1.5%</span></p>
                        <p class="stat-number" id="stat-clubes">...</p>
                        <p class="stat-detail">Última visita: 72</p>
                    </div>
                    <div class="stat-icon-bg"><ion-icon name="shield-outline"></ion-icon></div>
                </div>
                <div class="stat-card">
                    <div class="stat-info">
                        <p class="stat-title">Oportunidades <span class="stat-change positive"><ion-icon name="arrow-up-outline"></ion-icon> 0%</span></p>
                        <p class="stat-number" id="stat-oportunidades">...</p>
                        <p class="stat-detail">Última visita: 27</p>
                    </div>
                    <div class="stat-icon-bg"><ion-icon name="rocket-outline"></ion-icon></div>
                </div>
                <div class="stat-card">
                    <div class="stat-info">
                        <p class="stat-title">Denúncias <span class="stat-change positive"><ion-icon name="arrow-up-outline"></ion-icon> 2.5%</span></p>
                        <p class="stat-number" id="stat-oportunidades">...</p>
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
                    <ul class="item-list" id="lista-ultimas-oportunidades">
                        <li>
                           
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
                            <tbody id="tabela-acoes-recentes">
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

<script>
document.addEventListener('DOMContentLoaded', function() {

    // --- FUNÇÃO PARA CARREGAR OS CARDS DE ESTATÍSTICAS ---
    async function loadStats() {
        try {
            const response = await fetch('/api/admin/dashboard/stats');
            const stats = await response.json();

            document.getElementById('stat-usuarios').textContent = stats.totalUsuarios;
            document.getElementById('stat-clubes').textContent = stats.totalClubes;
            document.getElementById('stat-oportunidades').textContent = stats.totalOportunidades;
            document.getElementById('stat-denuncias').textContent = stats.totalDenuncias;
        } catch (error) {
            console.error("Erro ao carregar estatísticas:", error);
        }
    }

    // --- FUNÇÃO PARA CARREGAR A LISTA DE ÚLTIMAS OPORTUNIDADES ---
    async function loadUltimasOportunidades() {
        const listContainer = document.getElementById('lista-ultimas-oportunidades');
        listContainer.innerHTML = '<li>Carregando...</li>';

        try {
            const response = await fetch('/api/admin/dashboard/ultimas-oportunidades');
            const oportunidades = await response.json();

            listContainer.innerHTML = ''; // Limpa a lista
            if (oportunidades.length === 0) {
                listContainer.innerHTML = '<li>Nenhuma oportunidade recente.</li>';
                return;
            }

            oportunidades.forEach(op => {
                const listItem = `
                    <li>
                        <div class="item-icon team-logo"></div>
                        <span class="item-title">${op.clube?.nomeClube || 'Clube'}</span>
                        <span class="item-subtitle">${op.posicao?.nomePosicao || 'Posição'}</span>
                        <div class="item-extra-icon ball-icon"><ion-icon name="football-outline"></ion-icon></div>
                    </li>
                `;
                listContainer.innerHTML += listItem;
            });
        } catch (error) {
            console.error("Erro ao carregar últimas oportunidades:", error);
            listContainer.innerHTML = '<li>Erro ao carregar dados.</li>';
        }
    }

    // --- FUNÇÃO PARA CARREGAR A TABELA DE AÇÕES RECENTES ---
    async function loadAcoesRecentes() {
        const tableBody = document.getElementById('tabela-acoes-recentes');
        tableBody.innerHTML = '<tr><td colspan="7">Carregando...</td></tr>';

        try {
            const response = await fetch('/api/admin/dashboard/acoes-recentes');
            const acoes = await response.json();

            tableBody.innerHTML = ''; // Limpa a tabela
            if (acoes.length === 0) {
                tableBody.innerHTML = '<tr><td colspan="7">Nenhuma ação recente.</td></tr>';
                return;
            }

            acoes.forEach(acao => {
                const row = `
                    <tr>
                        <td>${new Date(acao.created_at).toLocaleDateString('pt-BR')}</td>
                        <td><span class="tag tag-object">Oportunidade</span></td>
                        <td><span class="tag tag-action">Criar</span></td>
                        <td>
                            <div class="entity-cell">
                                <div class="item-icon team-logo small"></div>
                                ${acao.clube?.nomeClube || 'N/A'}
                            </div>
                        </td>
                        <td><span class="tag tag-entity">Clube</span></td>
                        <td>O clube criou uma oportunidade.</td>
                        <td><span class="tag tag-status">Concluído</span></td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        } catch (error) {
            console.error("Erro ao carregar ações recentes:", error);
            tableBody.innerHTML = '<tr><td colspan="7">Erro ao carregar dados.</td></tr>';
        }
    }

    // --- CHAMA TODAS AS FUNÇÕES PARA CARREGAR O DASHBOARD ---
    loadStats();
    loadUltimasOportunidades();
    loadAcoesRecentes();
});
</script>
</html>
