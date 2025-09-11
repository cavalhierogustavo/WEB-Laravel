document.addEventListener('DOMContentLoaded', () => {
    
    // --- LÓGICA DO MENU DROPDOWN (SIDEBAR) ---
    const setupSubmenu = (menuId) => {
        const menuItem = document.getElementById(menuId);
        if (!menuItem) return;

        const link = menuItem.querySelector('a');
        const submenu = menuItem.querySelector('.submenu');

        link.addEventListener('click', (e) => {
            e.preventDefault();
            if (window.innerWidth > 1024) {
                const parentLi = e.currentTarget.closest('.has-submenu');
                parentLi.classList.toggle('active');
                
                if (parentLi.classList.contains('active')) {
                    submenu.style.maxHeight = submenu.scrollHeight + 'px';
                } else {
                    submenu.style.maxHeight = '0';
                }
            }
        });
    };
    setupSubmenu('users-menu');
    setupSubmenu('content-menu');


    // --- VARIÁVEIS GLOBAIS PARA MODAIS ---
    const editModal = document.getElementById('edit-user-modal');
    const deleteModal = document.getElementById('delete-confirmation-modal');
    const viewModal = document.getElementById('view-user-modal');
    const logoutModal = document.getElementById('logoutModal');
    let currentRowToDelete = null; 
    let currentRowToEdit = null;

    // --- FUNÇÕES GERAIS PARA ABRIR/FECHAR MODAIS ---
    const openModal = (modal) => modal.classList.remove('hidden');
    const closeModal = (modal) => modal.classList.add('hidden');

    // --- LÓGICA DO MODAL DE LOGOUT ---
    const openLogoutBtn = document.getElementById('logoutBtn');
    const cancelLogoutBtn = document.getElementById('cancelLogoutBtn');
    
    if (logoutModal && openLogoutBtn && cancelLogoutBtn) {
        openLogoutBtn.addEventListener('click', (e) => {
            e.preventDefault();
            openModal(logoutModal);
        });
        cancelLogoutBtn.addEventListener('click', () => closeModal(logoutModal));
        logoutModal.addEventListener('click', (e) => {
            if (e.target === logoutModal) closeModal(logoutModal);
        });
    }

    // --- LÓGICA DO MODAL DE EDIÇÃO ---
    const editForm = document.getElementById('edit-form');
    document.querySelectorAll('.js-edit-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            currentRowToEdit = e.currentTarget.closest('.list-row');
            
            // Pega os dados da linha clicada
            const name = currentRowToEdit.querySelector('.user-name').textContent;
            const username = currentRowToEdit.querySelector('.user-username').textContent;
            const type = currentRowToEdit.querySelector('.user-type .tag').textContent;
            const status = currentRowToEdit.querySelector('.user-status .tag').textContent;

            // Preenche o formulário do modal com os dados
            editModal.querySelector('#edit-user-name').value = name;
            editModal.querySelector('#edit-user-username').value = username;
            editModal.querySelector('#edit-user-type').value = type;
            editModal.querySelector('#edit-user-status').value = status;
            
            openModal(editModal);
        });
    });

    editForm.addEventListener('submit', (e) => {
        e.preventDefault();
        // Atualiza os dados na linha da tabela
        currentRowToEdit.querySelector('.user-name').textContent = editModal.querySelector('#edit-user-name').value;
        currentRowToEdit.querySelector('.user-username').textContent = editModal.querySelector('#edit-user-username').value;
        // ... (você pode adicionar lógica para atualizar tipo e status também)
        
        closeModal(editModal);
    });
    
    document.getElementById('cancel-edit-btn').addEventListener('click', () => closeModal(editModal));

    // --- LÓGICA DO MODAL DE EXCLUSÃO ---
    document.querySelectorAll('.js-delete-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            currentRowToDelete = e.currentTarget.closest('.list-row');
            openModal(deleteModal);
        });
    });

    document.getElementById('confirm-delete-btn').addEventListener('click', () => {
        if (currentRowToDelete) {
            currentRowToDelete.classList.add('hidden');
        }
        closeModal(deleteModal);
    });

    document.getElementById('cancel-delete-btn').addEventListener('click', () => closeModal(deleteModal));
    
    // --- LÓGICA DO MODAL DE VISUALIZAÇÃO ---
    document.querySelectorAll('.js-view-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            const row = e.currentTarget.closest('.list-row');
            
            // Pega os dados da linha
            document.getElementById('view-user-name').textContent = row.querySelector('.user-name').textContent;
            document.getElementById('view-user-username').textContent = row.querySelector('.user-username').textContent;
            document.getElementById('view-user-type').textContent = row.querySelector('.user-type .tag').textContent;
            document.getElementById('view-user-status').textContent = row.querySelector('.user-status .tag').textContent;
            document.getElementById('view-user-date').textContent = row.querySelector('.user-date').textContent;

            openModal(viewModal);
        });
    });

    document.getElementById('close-view-modal-btn').addEventListener('click', () => closeModal(viewModal));

    // Fechar modais ao clicar fora deles
    [editModal, deleteModal, viewModal].forEach(modal => {
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModal(modal);
                }
            });
        }
    });
});