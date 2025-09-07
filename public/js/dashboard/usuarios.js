document.addEventListener('DOMContentLoaded', () => {
    
    // --- LÓGICA PARA SUBMENUS DROPDOWN (SIDEBAR) ---
    const setupSubmenu = (menuId) => {
        const menuItem = document.getElementById(menuId);
        if (!menuItem) return;

        const link = menuItem.querySelector('a');
        const submenu = menuItem.querySelector('.submenu');
        
        if (link && submenu) {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                menuItem.classList.toggle('active');
            });
        }
    };

    setupSubmenu('users-menu');
    setupSubmenu('content-menu');

    // --- LÓGICA GERAL PARA MODAIS ---
    const openModal = (modal) => {
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    };
    const closeModal = (modal) => {
        if (modal) {
            modal.classList.add('hidden');
            if (!document.querySelector('.modal-overlay:not(.hidden)')) {
                document.body.style.overflow = 'auto';
            }
        }
    };
    
    // --- LÓGICA PARA O MODAL DE CONFIRMAÇÃO DE EXCLUSÃO ---
    const deleteModal = document.getElementById('delete-confirmation-modal');
    const deleteTriggers = document.querySelectorAll('.js-delete-btn');
    const cancelDeleteBtn = document.getElementById('cancel-delete-btn');
    const confirmDeleteBtn = document.getElementById('confirm-delete-btn');
    let rowToDelete = null;

    if (deleteModal) {
        deleteTriggers.forEach(button => {
            button.addEventListener('click', () => {
                rowToDelete = button.closest('.list-row');
                openModal(deleteModal);
            });
        });
        if (cancelDeleteBtn) cancelDeleteBtn.addEventListener('click', () => { rowToDelete = null; closeModal(deleteModal); });
        if (confirmDeleteBtn) {
            confirmDeleteBtn.addEventListener('click', () => {
                if (rowToDelete) {
                    rowToDelete.classList.add('hidden');
                }
                closeModal(deleteModal);
                rowToDelete = null;
            });
        }
    }

    // --- (NOVO) LÓGICA PARA O MODAL DE EDIÇÃO DE USUÁRIO ---
    const editModal = document.getElementById('edit-user-modal');
    const editTriggers = document.querySelectorAll('.js-edit-btn');
    const cancelEditBtn = document.getElementById('cancel-edit-btn');
    const saveEditBtn = document.getElementById('save-edit-btn');

    // Campos do formulário do modal
    const editUserName = document.getElementById('edit-user-name');
    const editUserUsername = document.getElementById('edit-user-username');
    const editUserType = document.getElementById('edit-user-type');
    const editUserStatus = document.getElementById('edit-user-status');
    
    let currentRowEditing = null;

    if (editModal) {
        editTriggers.forEach(button => {
            button.addEventListener('click', () => {
                currentRowEditing = button.closest('.list-row');

                /* 

                // Pega os dados da linha clicada
                const name = currentRowEditing.querySelector('.user-name').textContent;
                const username = currentRowEditing.querySelector('.user-username').textContent;
                const type = currentRowEditing.querySelector('.user-type .tag').textContent;
                const status = currentRowEditing.querySelector('.user-status .tag').textContent;

                // Preenche o formulário do modal com os dados
                editUserName.value = name;
                editUserUsername.value = username;
                editUserType.value = type;
                editUserStatus.value = status;

                */
                
                openModal(editModal);
            });
        });

        // Ação de Salvar
        if(saveEditBtn) {
            saveEditBtn.addEventListener('click', () => {
                if (currentRowEditing) {
                    // Pega os novos valores do formulário
                    const newName = editUserName.value;
                    const newUsername = editUserUsername.value;
                    const newType = editUserType.value;
                    const newStatus = editUserStatus.value;
                    
                    // Atualiza os valores na linha original da tabela
                    currentRowEditing.querySelector('.user-name').textContent = newName;
                    currentRowEditing.querySelector('.user-username').textContent = newUsername;

                    // Atualiza a tag de Tipo
                    const typeTag = currentRowEditing.querySelector('.user-type .tag');
                    typeTag.textContent = newType;
                    typeTag.className = 'tag'; // Reseta as classes
                    if(newType === 'Atleta') typeTag.classList.add('tag-atleta');
                    if(newType === 'Clube') typeTag.classList.add('entity-club');

                     // Atualiza a tag de Status
                    const statusTag = currentRowEditing.querySelector('.user-status .tag');
                    statusTag.textContent = newStatus;
                    statusTag.className = 'tag'; // Reseta as classes
                    if(newStatus === 'Ativo') statusTag.classList.add('tag-ativo');
                    if(newStatus === 'Inativo') statusTag.classList.add('tag-inativo');

                    closeModal(editModal);
                    currentRowEditing = null;
                }
            });
        }
        
        // Ação de Cancelar
        if(cancelEditBtn) cancelEditBtn.addEventListener('click', () => { currentRowEditing = null; closeModal(editModal); });
    }

    const closeAllDropdowns = (exceptThisOne = null) => {
        document.querySelectorAll('.settings-dropdown.active').forEach(dropdown => {
            if (dropdown !== exceptThisOne) {
                dropdown.classList.remove('active');
            }
        });
    };

    // Dropdown de ordenar por
    const dropdownOrderBy = document.querySelector('.dropdown.order-by');

    // Lógicas de abrir ou fechar
    const openOrderByDropdown = () => {
        dropdownOrderBy.querySelector('.dropdown-menu').classList.add('active');
    }

    const closeOrderByDropdown = () => {
        dropdownOrderBy.querySelector('.dropdown-menu').classList.remove('active');
    }

    // Lógica para abrir ou fechar o menu
    dropdownOrderBy.addEventListener('click', () => {
        if (dropdownOrderBy.querySelector('.dropdown-menu').classList.contains('active')){
            closeOrderByDropdown();
        } else {
            openOrderByDropdown();
        }
    })

    // Opções do dropdown
    const dropdownOrderByOptions = dropdownOrderBy.querySelectorAll('.dropdown-menu li');

    // A opção atual
    let currentOrderByOption = 'todos';

    const searchInput = document.getElementById('search-input');

    // Texto da barra de pesquisa
    let searchText = null;

    const clearUsers = () => {
        document.querySelector('.user-list.widget').innerHTML = `
            <div class="list-header">
                <span>Foto/avatar</span>
                <span>Nome de usuário</span>
                <span>Email</span>
                <span>Tipo</span>
                <span>Status</span>
                <span>Data de cadastro</span>
                <span>Ações rápidas</span>
            </div>
        `;
    }

    // Pesquisa de usuário na API
    const pesquisa = async () => {
        clearUsers();

        const url = `http://127.0.0.1:8001/api/usuario?pesquisa=${encodeURIComponent(searchText)}&ordenarpor=${encodeURIComponent(currentOrderByOption)}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                for(row of data){
                    document.querySelector('.user-list.widget').appendChild(createListRow(row));
                }
            })
            .catch(error => console.error('Erro:', error));
    }

    // Pega texto da barra de pesquisa (com tempo de espera para evitar erros)
    let debounceTimer;

    searchInput.addEventListener('keyup', (e) => {
        searchText = e.target.value;

        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            pesquisa();
        }, 500);
    });

    // Lógica para trocar a forma de ordenar
    dropdownOrderByOptions.forEach((opt, index) => {
        opt.addEventListener('click', () => {
            if (opt.classList.contains('active')) {
                opt.classList.remove('active');
                currentOrderByOption = null;
            } else {
                if (currentOrderByOption) {
                    document.querySelector(`li[data-value=${currentOrderByOption}]`).classList.remove('active');
                }

                opt.classList.add('active');
            }

            currentOrderByOption = opt.dataset.value;

            pesquisa();
        });
    });

    // Fecha qualquer modal ou dropdown de ordenação ao clicar fora
    window.addEventListener('click', (event) => {
        closeAllDropdowns();

        if (!dropdownOrderBy.contains(event.target)) {
            closeOrderByDropdown();
        }

        if (event.target.classList.contains('modal-overlay')) {
            closeModal(event.target);
        }
    });

    function createListRow(user) {
        const row = document.createElement('div');
        row.classList.add('list-row');

        // Avatar
        const avatarDiv = document.createElement('div');
        avatarDiv.classList.add('user-avatar');
        avatarDiv.innerHTML = `
            <div class="avatar small-avatar">
                <ion-icon name="person-outline"></ion-icon>
            </div>
        `;
        row.appendChild(avatarDiv);

        // Info
        const infoDiv = document.createElement('div');
        infoDiv.classList.add('user-info');
        infoDiv.innerHTML = `
            <strong class="user-name">${user.nomeCompletoUsuario}</strong>
            <p class="user-username">@${user.nomeUsuario}</p>
        `;
        row.appendChild(infoDiv);

        // Email
        const emailDiv = document.createElement('div');
        emailDiv.classList.add('user-email');
        emailDiv.innerHTML = `<span>${user.emailUsuario}</span>`;
        row.appendChild(emailDiv);

        // Tipo
        const typeDiv = document.createElement('div');
        typeDiv.classList.add('user-type');
        typeDiv.innerHTML = `<span class="tag tag-atleta">Atleta</span>`;
        row.appendChild(typeDiv);

        // Status
        const statusDiv = document.createElement('div');
        statusDiv.classList.add('user-status');
        statusDiv.innerHTML = `<span class="tag tag-ativo">Ativo</span>`;
        row.appendChild(statusDiv);

        // Data de cadastro
        const dateSpan = document.createElement('span');
        dateSpan.classList.add('user-date');
        dateSpan.textContent = user.dataCadastro;
        row.appendChild(dateSpan);

        // Ações
        const actionsDiv = document.createElement('div');
        actionsDiv.classList.add('action-icons');
        actionsDiv.innerHTML = `
            <button class="icon-btn"><ion-icon name="eye-outline"></ion-icon></button>
            <button class="icon-btn js-edit-btn"><ion-icon name="create-outline"></ion-icon></button>
            <button class="icon-btn danger js-delete-btn"><ion-icon name="trash-outline"></ion-icon></button>
        `;
        row.appendChild(actionsDiv);

        return row;
    }
});