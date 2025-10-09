<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Esportes</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/esporte.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- SCRIPT DOS ÍCONES (IONICONS ) - ESSENCIAL -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</head>

<style>
    /* ======================= */
/*      CONFIG GERAL       */
/* ======================= */
:root {
    --primary-blue: #3B82F6;
    --primary-blue-light: #EFF6FF;
    --text-dark: #1F2937;
    --text-light: #6B7280;
    --bg-light: #F9FAFB;
    --bg-white: #FFFFFF;
    --border-color: #E5E7EB;
    --status-green: #10B981;
    --status-green-bg: #D1FAE5;
    --logout-red: #EF4444;
    --action-view: #3B82F6;
    --action-edit: #8B5CF6;
    --action-delete: #EF4444;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background-color: var(--bg-light);
    color: var(--text-dark);
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* ======================= */
/*      CONTAINER GERAL    */
/* ======================= */
.dashboard-container {
    display: flex;
    min-height: 100vh;
}

/* ======================= */
/*      BARRA LATERAL      */
/* ======================= */
.sidebar {
    width: 250px;
    background-color: var(--bg-white);
    border-right: 1px solid var(--border-color);
    display: flex;
    flex-direction: column;
    padding: 24px 12px;
    position: fixed;
    height: 100%;
    left: 0;
    top: 0;
}

.sidebar-header {
    padding: 0 12px 24px 12px;
}

.logo {
    font-size: 24px;
    font-weight: 700;
    color: var(--text-dark);
}

.sidebar-nav {
    flex-grow: 1;
}

.menu-title {
    font-size: 12px;
    font-weight: 600;
    color: var(--text-light);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: 0 12px 8px 12px;
    display: block;
}

.sidebar-nav ul, .sidebar-footer ul {
    list-style: none;
}

.sidebar-nav li a, .sidebar-footer li a {
    display: flex;
    align-items: center;
    padding: 10px 12px;
    margin-bottom: 4px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    color: var(--text-light);
    transition: background-color 0.2s, color 0.2s;
}

.sidebar-nav li a:hover {
    background-color: var(--bg-light);
    color: var(--text-dark);
}

.sidebar-nav li.active a {
    background-color: var(--primary-blue);
    color: var(--bg-white);
}

.sidebar-nav li a .icon, .sidebar-footer li a .icon {
    width: 20px;
    height: 20px;
    margin-right: 12px;
}

.sidebar-nav li a .chevron {
    width: 16px;
    height: 16px;
    margin-left: auto;
}

.sidebar-nav li.active a .icon, .sidebar-nav li.active a .chevron {
    color: var(--bg-white);
}

.sidebar-footer {
    padding-top: 16px;
    border-top: 1px solid var(--border-color);
}

.sidebar-footer li a.logout {
    color: var(--logout-red);
}
.sidebar-footer li a.logout:hover {
    background-color: #FEF2F2;
}

/* ======================= */
/*    CONTEÚDO PRINCIPAL   */
/* ======================= */
.main-content {
    margin-left: 250px;
    flex-grow: 1;
    padding: 24px 32px;
}

.main-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}

.page-title {
    font-size: 28px;
    font-weight: 700;
    color: var(--text-dark);
}

.user-menu {
    display: flex;
    align-items: center;
    gap: 16px;
}

.icon-button {
    background: none;
    border: none;
    cursor: pointer;
    color: var(--text-light);
    padding: 4px;
}
.icon-button svg {
    width: 24px;
    height: 24px;
}

.user-profile {
    display: flex;
    align-items: center;
    gap: 12px;
    background-color: var(--bg-white);
    padding: 6px 12px 6px 6px;
    border-radius: 999px;
    border: 1px solid var(--border-color);
    font-weight: 500;
}

.user-profile .avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background-color: var(--primary-blue-light);
    color: var(--primary-blue);
    display: flex;
    align-items: center;
    justify-content: center;
}
.user-profile .avatar svg {
    width: 20px;
    height: 20px;
}

.content-body {
    background-color: var(--bg-white);
    border-radius: 12px;
    padding: 24px;
    border: 1px solid var(--border-color);
}

/* ======================= */
/*    BARRA DE FERRAMENTAS   */
/* ======================= */
.toolbar {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 24px;
}

.search-bar {
    flex-grow: 1;
    position: relative;
}
.search-bar svg {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    color: var(--text-light);
}
.search-bar input {
    width: 100%;
    padding: 10px 16px 10px 44px;
    border-radius: 8px;
    border: 1px solid var(--border-color);
    background-color: var(--bg-light);
    font-size: 14px;
}
.search-bar input:focus {
    outline: none;
    border-color: var(--primary-blue);
    background-color: var(--bg-white);
}

.filter-button, .add-button {
    padding: 10px 16px;
    border-radius: 8px;
    border: 1px solid var(--border-color);
    background-color: var(--bg-white);
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: background-color 0.2s;
}
.filter-button:hover, .add-button:hover {
    background-color: var(--bg-light);
}
.filter-button svg {
    width: 16px;
    height: 16px;
}
.add-button {
    background-color: var(--text-dark);
    color: var(--bg-white);
    border-color: var(--text-dark);
}
.add-button:hover {
    background-color: #374151;
}

/* ======================= */
/*         TABELA          */
/* ======================= */
.table-container {
    width: 100%;
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
}

th, td {
    padding: 12px 16px;
    vertical-align: middle;
}

thead {
    border-bottom: 1px solid var(--border-color);
}

th {
    font-size: 12px;
    font-weight: 600;
    color: var(--text-light);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

tbody tr {
    border-bottom: 1px solid var(--border-color);
}
tbody tr:last-child {
    border-bottom: none;
}

td {
    font-size: 14px;
    color: var(--text-light);
}
td:first-child {
    font-weight: 500;
    color: var(--text-dark);
}

.status-badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 500;
}
.status-badge.active {
    background-color: var(--status-green-bg);
    color: var(--status-green);
}

.action-buttons {
    display: flex;
    gap: 8px;
}

.action-btn {
    width: 32px;
    height: 32px;
    border-radius: 6px;
    border: 1px solid var(--border-color);
    background-color: var(--bg-white);
    color: var(--text-light);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s;
}
.action-btn svg {
    width: 16px;
    height: 16px;
}

.action-btn:hover {
    color: var(--bg-white);
    border-color: transparent;
}
.action-btn.view:hover { background-color: var(--action-view); }
.action-btn.edit:hover { background-color: var(--action-edit); }
.action-btn.delete:hover { background-color: var(--action-delete); }

.modal-overlay {
    /* Faz o fundo cobrir a tela inteira e ficar por cima de tudo */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    z-index: 1000; /* Garante que fique na frente */

    /* A MÁGICA DA CENTRALIZAÇÃO ACONTECE AQUI */
    display: flex;
    align-items: center;
    justify-content: center;

    /* Efeito de transição suave */
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s, visibility 0.3s;
}

/* Classe para mostrar o modal */
.modal-overlay.show {
    opacity: 1;
    visibility: visible;
}

.modal-container {
    background: var(--bg-white);
    border-radius: 12px;
    padding: 24px;
    width: 100%;
    max-width: 500px; /* Largura máxima do modal */
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    
    /* Animação de surgimento */
    transform: scale(0.95);
    transition: transform 0.3s;
}

.modal-overlay.show .modal-container {
    transform: scale(1);
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 16px;
    margin-bottom: 20px;
    border-bottom: 1px solid var(--border-color);
}

.modal-header h3 {
    font-size: 20px;
    font-weight: 600;
    color: var(--text-dark);
}

.modal-close-btn {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    color: var(--text-light);
}

.modal-body {
    margin-bottom: 24px;
}

.form-group {
    margin-bottom: 16px;
}

.form-group label {
    display: block;
    font-size: 14px;
    font-weight: 500;
    margin-bottom: 8px;
}

.form-control {
    width: 100%;
    padding: 10px 14px;
    border-radius: 8px;
    border: 1px solid var(--border-color);
    font-size: 14px;
}
.form-control:focus {
    outline: none;
    border-color: var(--primary-blue);
}

textarea.form-control {
    resize: vertical;
    min-height: 80px;
}

.modal-footer {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
}

.btn {
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 500;
    cursor: pointer;
    border: 1px solid transparent;
}
.btn-secondary {
    background-color: var(--bg-white);
    border-color: var(--border-color);
    color: var(--text-dark);
}
.btn-secondary:hover {
    background-color: var(--bg-light);
}
.btn-primary {
    background-color: var(--primary-blue);
    color: var(--bg-white);
}
.btn-primary:hover {
    background-color: #2563EB; /* Um azul um pouco mais escuro */
}

.error-message {
    color: var(--logout-red);
    font-size: 12px;
    margin-top: 4px;
}


    #Logo{
        width: 150px;
        border-radius: 20px;
    }
     .icon, .icon-button, .action-btn, .avatar, .modal-close-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .icon, .icon-button ion-icon, .action-btn ion-icon, .avatar ion-icon {
        font-size: 20px; /* Tamanho padrão para ícones */
    }

    .sidebar-nav li a .icon, .sidebar-footer li a .icon {
        font-size: 20px;
        width: 20px; /* Mantém o alinhamento */
        height: 20px;
        margin-right: 12px;
    }

    .action-btn ion-icon {
        font-size: 18px; /* Ícones de ação um pouco menores */
    }

    .modal-close-btn {
        font-size: 28px; /* Ícone de fechar maior */
    }
    
    #Logo{
        width: 150px;
        border-radius: 20px;
    }

    .item-icon.small { width: 20px; height: 20px; }
    .sidebar-nav li a ion-icon, .sidebar-footer li a ion-icon {
    font-size: 20px;
    margin-right: 12px;
}

</style>

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
                    <li class="active"><a href="#"><ion-icon name="football-outline"></ion-icon> Esportes</a></li>
                    <li><a href="/dashboard/oportunidades"><ion-icon name="rocket-outline"></ion-icon> Oportunidades</a></li>
                    <li><a href=""><ion-icon name="list-outline"></ion-icon> Listas</a></li>
                    <li><a href="#"><ion-icon name="alert-circle-outline"></ion-icon> Denúncias <ion-icon class="chevron" name="chevron-down-outline"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="document-text-outline"></ion-icon> Conteúdo <ion-icon class="chevron" name="chevron-down-outline"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="stats-chart-outline"></ion-icon> Estatísticas</a></li>
</ul>
</nav>
            <div class="sidebar-footer">
                <ul>
                    <li><a href="#"><svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M11.078 2.25c-.217-.065-.434-.1-.652-.1-.218 0-.435.035-.652.1-.668.2-1.216.55-1.618 1.078A7.483 7.483 0 005.44 6.474c-.636.247-1.18.67-1.577 1.226A7.483 7.483 0 002.25 11.078c.065.217.1.434.1.652 0 .218-.035.435-.1.652-.2.668-.55 1.216-1.078 1.618A7.483 7.483 0 006.474 14.56c.247.636.67 1.18 1.226 1.577A7.483 7.483 0 0011.078 17.75c.217.065.434.1.652.1.218 0 .435-.035.652-.1.668-.2 1.216-.55 1.618-1.078A7.483 7.483 0 0014.56 13.526c.636-.247 1.18-.67 1.577-1.226A7.483 7.483 0 0017.75 8.922c-.065-.217-.1-.434-.1-.652 0-.218.035-.435.1-.652.2-.668.55-1.216 1.078-1.618A7.483 7.483 0 0013.526 5.44c-.247-.636-.67-1.18-1.226-1.577A7.483 7.483 0 008.922 2.25zM10 12.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" clip-rule="evenodd" /></svg> Configurações</a></li>
                    <li><a href="#" class="logout"><svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 4.25A2.25 2.25 0 015.25 2h5.5A2.25 2.25 0 0113 4.25v2a.75.75 0 01-1.5 0v-2a.75.75 0 00-.75-.75h-5.5a.75.75 0 00-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-2a.75.75 0 011.5 0v2A2.25 2.25 0 0110.75 18h-5.5A2.25 2.25 0 013 15.75V4.25z" clip-rule="evenodd" /><path fill-rule="evenodd" d="M6 10a.75.75 0 01.75-.75h9.546l-1.048-1.047a.75.75 0 111.06-1.06l2.5 2.5a.75.75 0 010 1.06l-2.5 2.5a.75.75 0 11-1.06-1.06l1.048-1.047H6.75A.75.75 0 016 10z" clip-rule="evenodd" /></svg> Sair</a></li>
                </ul>
            </div>
        </aside>

        <!-- ======================= -->
        <!--    CONTEÚDO PRINCIPAL   -->
        <!-- ======================= -->
        <main class="main-content">
            <header class="main-header">
                <h2 class="page-title">Lista de esportes</h2>
                <div class="user-menu">
                    <button class="icon-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 12.586V8a6 6 0 00-6-6zM10 16a2 2 0 100-4 2 2 0 000 4z" /></svg></button>
                    <div class="user-profile">
                        <div class="avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.626-.83.41-1.412A9.995 9.995 0 0010 12c-2.31 0-4.438.784-6.131 2.1-.43.333-.626.83-.41 1.412z" /></svg>
                        </div>
                        <span>João Pedro</span>
                    </div>
                </div>
            </header>

            <div class="content-body">
                <div class="toolbar">
                    <div class="search-bar">
                        
                        <input type="text" id="searchInput" placeholder="Pesquisar">
                    </div>
                    <button class="add-button" id="addSportBtn">Adicionar</button>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Data de cadastro</th>
                <th>Ações rápidas</th>
            </tr>
                        </thead>
                        <tbody id="sportsTableBody">
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <div id="sportModal" class="modal-overlay" >
    <div class="modal-container">
        <div class="modal-header">
            <h3 id="modalTitle">Adicionar Novo Esporte</h3>
            <button id="closeModalBtn" class="modal-close-btn">&times;</button>
        </div>
        <form id="sportForm">
            <!-- Campo oculto para armazenar o ID do esporte ao editar -->
            <input type="hidden" id="sportId" name="id">
            
            <div class="modal-body">
                <div class="form-group">
                    <label for="nomeEsporte">Nome do Esporte</label>
                    <input type="text" id="nomeEsporte" name="nomeEsporte" class="form-control" required>
                    <small id="error-nomeEsporte" class="error-message"></small>
                </div>
                <div class="form-group">
                    <label for="descricaoEsporte">Descrição</label>
                    <textarea id="descricaoEsporte" name="descricaoEsporte" class="form-control" rows="4"></textarea>
                    <small id="error-descricaoEsporte" class="error-message"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancelBtn" class="btn btn-secondary">Cancelar</button>
                <button type="submit" id="submitBtn" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Elementos da Tabela e Busca
    const tableBody = document.getElementById('sportsTableBody');
    const searchInput = document.getElementById('searchInput');

    // Elementos do Modal
    const modal = document.getElementById('sportModal');
    const modalTitle = document.getElementById('modalTitle');
    const sportForm = document.getElementById('sportForm');
    const sportIdInput = document.getElementById('sportId');
    const nomeEsporteInput = document.getElementById('nomeEsporte');
    const descricaoEsporteInput = document.getElementById('descricaoEsporte');
    const addSportBtn = document.getElementById('addSportBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const cancelBtn = document.getElementById('cancelBtn');

    let editMode = false;

    // --- FUNÇÕES DE RENDERIZAÇÃO E API ---

    function formatDate(dateString) {
        if (!dateString) return 'N/A';
        return new Date(dateString).toLocaleDateString('pt-BR', { day: '2-digit', month: 'long', year: 'numeric' });
    }

    async function fetchAndRenderSports(searchTerm = '') {
        const url = `/api/esportes?q=${encodeURIComponent(searchTerm)}`;
        tableBody.innerHTML = `<tr><td colspan="5">Carregando...</td></tr>`;

        try {
            const response = await fetch(url);
            const result = await response.json();
            const sports = result.data;

            tableBody.innerHTML = '';
            if (sports.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="5">Nenhum esporte encontrado.</td></tr>`;
                return;
            }

            sports.forEach(sport => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${sport.nomeEsporte}</td>
                    <td>${sport.descricaoEsporte || 'Nenhuma descrição'}</td>
                    <td><span class="status-badge active">Ativo</span></td>
                    <td>${formatDate(sport.created_at)}</td>
                    <td>
                        <div class="action-buttons">
                            <button class="action-btn edit" data-id="${sport.id}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" /><path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" /></svg></button>
                            <button class="action-btn delete" data-id="${sport.id}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.58.22-2.365.468a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193v-.443A2.75 2.75 0 0011.25 1H8.75zM10 4.5a.75.75 0 01.75.75v10.5a.75.75 0 01-1.5 0V5.25A.75.75 0 0110 4.5z" clip-rule="evenodd" /></svg></button>
                        </div>
                    </td>
                `;
                tableBody.appendChild(row );
            });
        } catch (error) {
            console.error('Erro ao buscar esportes:', error);
            tableBody.innerHTML = `<tr><td colspan="5">Erro ao carregar dados.</td></tr>`;
        }
    }

    // --- FUNÇÕES DO MODAL ---

    function openModalForCreate() {
        editMode = false;
        sportForm.reset();
        sportIdInput.value = '';
        modalTitle.textContent = 'Adicionar Novo Esporte';
        modal.classList.add('show');
    }

    async function openModalForEdit(id) {
        editMode = true;
        sportForm.reset();
        modal.classList.add('show');
        
        try {
            const response = await fetch(`/api/esportes/${id}`);
            const sport = await response.json();
            
            sportIdInput.value = sport.id;
            nomeEsporteInput.value = sport.nomeEsporte;
            descricaoEsporteInput.value = sport.descricaoEsporte;
            
            modalTitle.textContent = 'Editar Esporte';
            modal.style.display = 'flex';
        } catch (error) {
            console.error('Erro ao buscar dados do esporte:', error);
            alert('Não foi possível carregar os dados para edição.');
        }
    }

    function closeModal() {
        modal.style.display = 'none';
        modal.classList.remove('show');
    }

    // --- LÓGICA DE EVENTOS ---

    // Abrir modal
    addSportBtn.addEventListener('click', openModalForCreate);
    closeModalBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);
    window.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });

    // Submeter formulário (Criar ou Editar)
    sportForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const id = sportIdInput.value;
        const url = editMode ? `/api/esportes/${id}` : '/api/esportes';
        const method = editMode ? 'PUT' : 'POST';

        const formData = new FormData(sportForm);
        const data = Object.fromEntries(formData.entries());

        try {
            const response = await fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Adicione se usar CSRF
                },
                body: JSON.stringify(data)
            });

            if (!response.ok) {
                const errorData = await response.json();
                // Lógica para exibir erros de validação (opcional)
                console.error('Erro de validação:', errorData.errors);
                alert('Erro ao salvar: ' + (errorData.message || 'Verifique os dados'));
                return;
            }

            closeModal();
            fetchAndRenderSports(searchInput.value); // Atualiza a tabela
        } catch (error) {
            console.error('Erro ao salvar esporte:', error);
            alert('Ocorreu um erro de rede.');
        }
    });

    // Ações na tabela (Editar e Deletar)
    tableBody.addEventListener('click', async (e) => {
        const editBtn = e.target.closest('.action-btn.edit');
        const deleteBtn = e.target.closest('.action-btn.delete');

        if (editBtn) {
            openModalForEdit(editBtn.dataset.id);
        }

        if (deleteBtn) {
            const id = deleteBtn.dataset.id;
            if (confirm('Tem certeza que deseja excluir este esporte?')) {
                try {
                    await fetch(`/api/esportes/${id}`, { method: 'DELETE' });
                    fetchAndRenderSports(searchInput.value); // Atualiza a tabela
                } catch (error) {
                    console.error('Erro ao deletar esporte:', error);
                    alert('Não foi possível excluir o esporte.');
                }
            }
        }
    });

    // Busca
    let debounceTimer;
    searchInput.addEventListener('keyup', () => {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            fetchAndRenderSports(searchInput.value);
        }, 300);
    });

    // Carga inicial
    fetchAndRenderSports();
});
</script>

</body>
</html>
