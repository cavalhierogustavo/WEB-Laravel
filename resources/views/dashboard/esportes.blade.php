<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Esportes</title>
    <link rel="stylesheet" href="./css/dashboard/esporte.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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

</style>
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
                    <li><a href="#"><svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M3 3a1 1 0 00-1 1v3a1 1 0 102 0V4h3a1 1 0 100-2H3zM3 10a1 1 0 00-1 1v3a1 1 0 102 0v-3a1 1 0 00-1-1zM10 3a1 1 0 00-1 1v3a1 1 0 102 0V4a1 1 0 00-1-1zM10 10a1 1 0 00-1 1v3a1 1 0 102 0v-3a1 1 0 00-1-1zM17 3a1 1 0 00-1 1v3a1 1 0 102 0V4h-1zM17 10a1 1 0 00-1 1v3a1 1 0 102 0v-3a1 1 0 00-1-1z"/></svg> Dashboard</a></li>
                    <li><a href="#"><svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.626-.83.41-1.412A9.995 9.995 0 0010 12c-2.31 0-4.438.784-6.131 2.1-.43.333-.626.83-.41 1.412z" /></svg> Usuários <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" /></svg></a></li>
                    <li><a href="#"><svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" /></svg> Esportes</a></li>
                    <li class="active"><a href="#"><svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M3.75 4.5A.75.75 0 003 5.25v9a.75.75 0 00.75.75h13.5a.75.75 0 00.75-.75v-9a.75.75 0 00-.75-.75H3.75zM10 6a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 0110 6zM5.25 7.5a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5zM15.75 7.5a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z" /></svg> Oportunidades</a></li>
                    <li><a href="#"><svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10zm0 5.25a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" /></svg> Listas</a></li>
                    <li><a href="#"><svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" /></svg> Denúncias <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" /></svg></a></li>
                    <li><a href="#"><svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c0-.414.336-.75.75-.75h10.5a.75.75 0 010 1.5H5.5a.75.75 0 01-.75-.75z" clip-rule="evenodd" /></svg> Conteúdo <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" /></svg></a></li>
                    <li><a href="#"><svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M12 9a1 1 0 011-1h1a1 1 0 110 2h-1a1 1 0 01-1-1zM3 9a1 1 0 011-1h1a1 1 0 110 2H4a1 1 0 01-1-1zM7.5 12a1 1 0 00-1 1v1a1 1 0 102 0v-1a1 1 0 00-1-1zM12 13a1 1 0 011-1h1a1 1 0 110 2h-1a1 1 0 01-1-1zM3 13a1 1 0 011-1h1a1 1 0 110 2H4a1 1 0 01-1-1zM7.5 4a1 1 0 00-1 1v1a1 1 0 102 0V5a1 1 0 00-1-1zM12 5a1 1 0 011-1h1a1 1 0 110 2h-1a1 1 0 01-1-1zM3 5a1 1 0 011-1h1a1 1 0 110 2H4a1 1 0 01-1-1zM7.5 8a1 1 0 00-1 1v1a1 1 0 102 0V9a1 1 0 00-1-1z" /></svg> Estatísticas</a></li>
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
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" /></svg>
                        <input type="text" placeholder="Pesquisar">
                    </div>
                    <button class="filter-button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10zm0 5.25a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" /></svg>
                        Ordenar por
                        <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" /></svg>
                    </button>
                    <button class="add-button">Adicionar</button>
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
                        <tbody>
                            <tr>
                                <td>Futebol</td>
                                <td>Descrição genérica qualquer</td>
                                <td><span class="status-badge active">Ativo</span></td>
                                <td>23 de Outubro de 2024</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn view"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" /><path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 010-1.18l3.75-3.75a1.651 1.651 0 012.332 0l3.75 3.75a1.651 1.651 0 010 1.18l-3.75 3.75a1.651 1.651 0 01-2.332 0l-3.75-3.75zm10.404 0a1.651 1.651 0 010-1.18l3.75-3.75a1.651 1.651 0 012.332 0l3.75 3.75a1.651 1.651 0 010 1.18l-3.75 3.75a1.651 1.651 0 01-2.332 0l-3.75-3.75z" clip-rule="evenodd" /></svg></button>
                                        <button class="action-btn edit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" /><path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" /></svg></button>
                                        <button class="action-btn delete"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.58.22-2.365.468a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193v-.443A2.75 2.75 0 0011.25 1H8.75zM10 4.5a.75.75 0 01.75.75v10.5a.75.75 0 01-1.5 0V5.25A.75.75 0 0110 4.5z" clip-rule="evenodd" /></svg></button>
                                    </div>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
