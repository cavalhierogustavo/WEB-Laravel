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
<style>
     #Logo{
        width: 150px;
        border-radius: 20px;
    }
</style>
<body>
    <div class="dashboard-container">
        <!-- ======================= -->
        <!--      BARRA LATERAL      -->
        <!-- ======================= -->
        <aside class="sidebar">
            <div class="sidebar-header">
                 <img id="Logo" src="{{ asset('img/logoPerfil.jpeg') }}" alt="Logo do Perfil">
            </div>
            <nav class="sidebar-nav">
                <span class="menu-title">Menu</span>
                <ul>
                    <li><a href="/dashboard/index"><ion-icon name="grid-outline"></ion-icon> Dashboard</a></li>
                    <li><a href="/dashboard/usuarios"><ion-icon name="people-outline"></ion-icon> Usuários <ion-icon class="chevron" name="chevron-down-outline"></ion-icon></a></li>
                    <li><a href="/dashboard/esporte"><ion-icon name="football-outline"></ion-icon> Esportes</a></li>
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
                <h2 class="page-title">Lista de Oportunidades</h2>
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
                        <input type="text" id="searchInput" placeholder="Pesquisar por descrição, clube, esporte...">
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
                                <th>Descrição</th>
                               <th>Esporte</th>
                                <th>Posição</th>
                                <th>Data de criação</th>
                                <th>Ações rápidas</th>
                            </tr>
                        </thead>
                        <tbody id="opportunitiesTableBody">
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tableBody = document.getElementById('opportunitiesTableBody');
    const searchInput = document.getElementById('searchInput');

    // Função para formatar a data (ex: 2025-10-09 -> 09 de Outubro de 2025)
    function formatDate(dateString) {
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        return new Date(dateString).toLocaleDateString('pt-BR', options);
    }

    // Função principal para buscar e renderizar as oportunidades
    async function fetchAndRenderOpportunities(searchTerm = '') {
        // Monta a URL da API. Se houver termo de busca, adiciona o parâmetro ?q=...
        const url = `/api/oportunidades?q=${encodeURIComponent(searchTerm)}`;
        
        tableBody.innerHTML = '<tr><td colspan="6">Carregando...</td></tr>'; // Feedback de carregamento

        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error('Falha na rede ou erro na API');
            }
            const result = await response.json();
            const opportunities = result.data;

            // Limpa a tabela
            tableBody.innerHTML = '';

            if (opportunities.length === 0) {
                tableBody.innerHTML = '<tr><td colspan="6">Nenhuma oportunidade encontrada.</td></tr>';
                return;
            }

            // Cria e insere uma linha <tr> para cada oportunidade
            opportunities.forEach(op => {
                const row = `
        <tr>
            <td>
                <div class="entity-cell">
                    <!-- ... -->
                    <span>${op.clube ? op.clube.nomeClube : 'N/A'}</span>
                </div>
            </td>
            
            <!-- CLASSE ADICIONADA AQUI -->
            <td class="description-cell">${op.descricaoOportunidades}</td>

            <td><span class="tag tag-esporte">${op.esporte ? op.esporte.nomeEsporte : 'N/A'}</span></td>
            <td><span class="tag tag-posicao">${op.posicao ? op.posicao.nomePosicao : 'N/A'}</span></td>
            <td>${formatDate(op.datapostagemOportunidades)}</td>
            <td>
                <div class="action-buttons">
                    <!-- ... -->
                </div>
            </td>
        </tr>
    `;
    tableBody.insertAdjacentHTML('beforeend', row);
            });

        } catch (error) {
            console.error('Erro ao buscar oportunidades:', error);
            tableBody.innerHTML = '<tr><td colspan="6">Erro ao carregar os dados. Tente novamente mais tarde.</td></tr>';
        }
    }

    // --- EVENT LISTENERS ---

    // 1. Busca inicial quando a página carrega
    fetchAndRenderOpportunities();

    // 2. Evento para buscar enquanto o usuário digita (com um pequeno atraso)
    let debounceTimer;
    searchInput.addEventListener('keyup', () => {
        clearTimeout(debounceTimer);
        // Espera 300ms após o usuário parar de digitar para fazer a busca
        debounceTimer = setTimeout(() => {
            fetchAndRenderOpportunities(searchInput.value);
        }, 300);
    });
});
</script>

</body>
</html>
