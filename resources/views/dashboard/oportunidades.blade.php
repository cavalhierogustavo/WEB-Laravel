<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Listas</title>
    {{-- Lembre-se de apontar para o seu novo arquivo CSS --}}
    <link rel="stylesheet" href="{{ url('css/dashboard/oportunidades.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
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
                    <li><a href="#"><ion-icon name="grid-outline"></ion-icon> Dashboard</a></li>
                    <li><a href="#"><ion-icon name="people-outline"></ion-icon> Usuários <ion-icon class="chevron" name="chevron-down-outline"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="football-outline"></ion-icon> Esportes</a></li>
                    {{-- "Oportunidades" agora está com a classe "active" --}}
                    <li class="active"><a href="#"><ion-icon name="rocket-outline"></ion-icon> Oportunidades</a></li>
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
                <h2 class="page-title">Lista de listas</h2>
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

            <div class="content-body">
                <div class="toolbar">
                    <div class="search-bar">
                        <ion-icon name="search-outline"></ion-icon>
                        <input type="text" placeholder="Pesquisar">
                    </div>
                    <button class="filter-button">
                        <ion-icon name="filter-outline"></ion-icon>
                        Ordenar por
                        <ion-icon class="chevron" name="chevron-down-outline"></ion-icon>
                    </button>
                    <button class="add-button">Adicionar</button>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Clube</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Status</th>
                                <th>Data de criação</th>
                                <th>Ações rápidas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="entity-cell">
                                        <div class="item-icon user-avatar large">
                                            <ion-icon name="person-circle-outline"></ion-icon>
                                        </div>
                                        <span>Atlético X</span>
                                    </div>
                                </td>
                                <td>Marcos rei das listagens</td>
                                <td>Descrição genérica qualquer</td>
                                <td><span class="tag tag-status-ativo">Ativo</span></td>
                                <td>23 de Outubro de 2024</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn view"><ion-icon name="eye-outline"></ion-icon></button>
                                        <button class="action-btn edit"><ion-icon name="pencil-outline"></ion-icon></button>
                                        <button class="action-btn delete"><ion-icon name="trash-outline"></ion-icon></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Repita a linha <tr> para mais listas -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
