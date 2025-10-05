/**
 * Componente Sidebar Reutilizável
 * 
 * Este arquivo contém a lógica para criar uma sidebar reutilizável
 * onde você pode facilmente alterar qual item está ativo (destacado em verde)
 */

class Sidebar {
    constructor(containerId, activeItem = 'dashboard', activeColor = '#4CAF50') {
        this.container = document.getElementById(containerId);
        this.activeItem = activeItem;
        this.activeColor = activeColor;
        this.menuItems = [
            { id: 'dashboard', icon: '<img class="nav-icon" src="./img/dashboard.png" alt="">', text: 'Dashboard', href: '#dashboard', isImage: true },
            { id: 'oportunidades', icon: '🎯', text: 'Oportunidades', href: '#oportunidades', isImage: false },
            { id: 'listas', icon: '📋', text: 'Listas', href: '#listas', isImage: false },
            { id: 'mensagens', icon: '💬', text: 'Mensagens', href: '#mensagens', isImage: false },
            { id: 'notificacoes', icon: '🔔', text: 'Notificações', href: '#notificacoes', isImage: false },
            { id: 'perfil', icon: '👤', text: 'Perfil', href: '#perfil', isImage: false },
            { id: 'pesquisa', icon: '🔍', text: 'Pesquisa', href: '#pesquisa', isImage: false },
            { id: 'configuracoes', icon: '⚙️', text: 'Configurações', href: '#configuracoes', isImage: false },
            { id: 'sair', icon: '🚪', text: 'Sair', href: '#sair', isImage: false }
        ];
        
        this.render();
        this.attachEventListeners();
        this.updateActiveColor();
    }

    render() {
        if (!this.container) {
            console.error('Container da sidebar não encontrado');
            return;
        }

        const sidebarHTML = `
            <div class="logo-section">
                <div class="logo-placeholder">Logo aqui</div>
            </div>
            
            <nav class="nav-menu">
                <ul>
                    ${this.menuItems.map(item => `
                        <li class="nav-item ${item.id === this.activeItem ? 'active' : ''}" data-item="${item.id}">
                            <a href="${item.href}" class="nav-link">
                                ${item.isImage ? item.icon : `<span class="nav-icon">${item.icon}</span>`}
                                <span class="nav-text">${item.text}</span>
                            </a>
                        </li>
                    `).join('')}
                </ul>
            </nav>
        `;

        this.container.innerHTML = sidebarHTML;
    }

    attachEventListeners() {
        const navItems = this.container.querySelectorAll('.nav-item');
        
        navItems.forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                const itemId = item.getAttribute('data-item');
                this.setActiveItem(itemId);
                
                // Emitir evento customizado para outras partes da aplicação
                const event = new CustomEvent('sidebarItemChanged', {
                    detail: { activeItem: itemId }
                });
                document.dispatchEvent(event);
            });
        });
    }

    setActiveItem(itemId) {
        // Remove classe active de todos os itens
        const navItems = this.container.querySelectorAll('.nav-item');
        navItems.forEach(item => item.classList.remove('active'));
        
        // Adiciona classe active ao item selecionado
        const activeItem = this.container.querySelector(`[data-item="${itemId}"]`);
        if (activeItem) {
            activeItem.classList.add('active');
            this.activeItem = itemId;
        }
        
        // Atualiza a cor ativa
        this.updateActiveColor();
    }

    updateActiveColor() {
        // Criar ou atualizar estilo CSS dinâmico para a cor ativa
        let styleElement = document.getElementById('sidebar-dynamic-styles');
        if (!styleElement) {
            styleElement = document.createElement('style');
            styleElement.id = 'sidebar-dynamic-styles';
            document.head.appendChild(styleElement);
        }
        
        styleElement.textContent = `
            .nav-item.active .nav-link {
                background-color: ${this.activeColor} !important;
                color: white !important;
            }
        `;
    }

    getActiveItem() {
        return this.activeItem;
    }

    // Método para atualizar programaticamente o item ativo
    updateActiveItem(itemId) {
        this.setActiveItem(itemId);
    }

    // Método para adicionar novos itens ao menu (se necessário)
    addMenuItem(item) {
        this.menuItems.push(item);
        this.render();
        this.attachEventListeners();
    }

    // Método para remover itens do menu (se necessário)
    removeMenuItem(itemId) {
        this.menuItems = this.menuItems.filter(item => item.id !== itemId);
        this.render();
        this.attachEventListeners();
    }
}

// Função utilitária para criar sidebar facilmente
function createSidebar(containerId, activeItem = 'dashboard', activeColor = '#4CAF50') {
    return new Sidebar(containerId, activeItem, activeColor);
}

// Exportar para uso em outros arquivos (se usando módulos)
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { Sidebar, createSidebar };
}

// Exemplo de uso:
/*
// HTML: <aside id="sidebar" class="sidebar"></aside>

// JavaScript:
document.addEventListener('DOMContentLoaded', function() {
    // Criar sidebar com 'dashboard' como item ativo
    const sidebar = new Sidebar('sidebar', 'dashboard');
    
    // Ou usar a função utilitária
    // const sidebar = createSidebar('sidebar', 'dashboard');
    
    // Escutar mudanças na sidebar
    document.addEventListener('sidebarItemChanged', function(e) {
        console.log('Item ativo mudou para:', e.detail.activeItem);
        // Aqui você pode atualizar o conteúdo da página baseado no item selecionado
    });
    
    // Para mudar programaticamente o item ativo:
    // sidebar.updateActiveItem('oportunidades');
});
*/
