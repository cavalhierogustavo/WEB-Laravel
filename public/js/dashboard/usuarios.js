document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
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
    const cancelDeleteBtn = document.getElementById('cancel-delete-btn');
    const confirmDeleteBtn = document.getElementById('confirm-delete-btn');
    let rowToDelete = null;

    const deleteUser = async (userId) => {
        const url = `http://localhost:8001/api/usuario/delete/${userId}`;

        fetch(url, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
        })
        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log('Usuário deletado com sucesso! ', data);
        })
        .catch(e => {
            console.error('Erro: ', e);
        })
    }

    const fetchInfoFromUser = async (userId) => {
        const url = `http://localhost:8001/api/usuario/show/${userId}`;

        try {
            const response = await fetch(url);
            
            if (!response.ok) {
                throw new Error(`Erro na API: ${response.status} ${response.statusText}`);
            }

            const data = await response.json();
            return data;
        } catch (error) {
            console.error('Erro ao buscar dados do usuário:', error);
            return null;
        }
    }

    const seeModal = document.getElementById('see-user-modal');
    const seeUserStatus = document.getElementById('see-user-status');
    const seeUserName = document.getElementById('see-user-name');
    const seeUserUserName = document.getElementById('see-user-username');
    const seeUserEmail = document.getElementById('see-user-email');
    const seeUserNationality = document.getElementById('edit-user-nationality');

    let currentRowSeeing = null;

    // --- (NOVO) LÓGICA PARA O MODAL DE EDIÇÃO DE USUÁRIO ---
    const editModal = document.getElementById('edit-user-modal');
    const cancelEditBtn = document.getElementById('cancel-edit-btn');
    const saveEditBtn = document.getElementById('save-edit-btn');

    // Campos do formulário do modal
    const editUserStatus = document.getElementById('edit-user-status');
    const editUserName = document.getElementById('edit-user-name');
    const editUserUserName = document.getElementById('edit-user-username');
    const editUserEmail = document.getElementById('edit-user-email');
    const editUserNationality = document.getElementById('edit-user-nationality');
    
    let currentRowEditing = null;

    const updateUserInfo = async (userId) => {
        const dados = {
            nomeCompletoUsuario: editUserName.value,
            nomeUsuario: editUserName.value, 
            emailUsuario: editUserEmail.value,
            nacionalidadeUsuario: editUserNationality.value
        }

        const url = `http://localhost:8001/api/usuario/update/${userId}`;

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(dados),
        })
        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log('Dados atualizados com sucesso! ', data);
        })
        .catch(e => {
            console.error('Erro: ', e);
        })
    }

    const clearEditModal = () => {
        editUserName.value = '';
        editUserUserName.value = '';
        editUserEmail.value = '';
        editUserNationality.value = '';
    }

    if (editModal) {
        // Ação de Salvar
        if(saveEditBtn) {
            saveEditBtn.addEventListener('click', () => {
                if (currentRowEditing) {
                    updateUserInfo(parseInt(currentRowEditing.dataset.userId));
                    closeModal(editModal);
                    clearEditModal();
                    currentRowEditing = null;
                }
            });
        }
        
        // Ação de Cancelar
        if(cancelEditBtn) cancelEditBtn.addEventListener('click', () => { 
            currentRowEditing = null;
            closeModal(editModal); 
            clearEditModal();
        });
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
        row.dataset.userId = parseInt(user.id);

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
            <button class="icon-btn js-see-btn"><ion-icon name="eye-outline"></ion-icon></button>
            <button class="icon-btn js-edit-btn"><ion-icon name="create-outline"></ion-icon></button>
            <button class="icon-btn danger js-delete-btn"><ion-icon name="trash-outline"></ion-icon></button>
        `;

        row.appendChild(actionsDiv);

        const seeButton = actionsDiv.querySelector('.js-see-btn');
        const editButton = actionsDiv.querySelector('.js-edit-btn');
        const deleteButton = actionsDiv.querySelector('.js-delete-btn');

        if (seeButton) {
            seeButton.addEventListener('click', async () => {
                currentRowSeeing = row;

                const userId = parseInt(currentRowSeeing.dataset.userId);

                const data = await fetchInfoFromUser(userId);

                if (data) {
                    seeUserStatus.value = 'Ativo';
                    seeUserName.value = data.nomeCompletoUsuario;
                    seeUserUserName.value = data.nomeUsuario;
                    seeUserEmail.value = data.emailUsuario;
                    seeUserNationality.value = data.nacionalidadeUsuario;
                    
                    openModal(seeModal);
                } else {
                    console.error('Não foi possível carregar os dados do usuário.');
                }
            })
        }

        if (editButton) {
            editButton.addEventListener('click', async () => {
                currentRowEditing = row;

                if (!currentRowEditing || !currentRowEditing.dataset.userId) {
                    console.error('ID do usuário não encontrado na linha.');
                    return;
                }

                clearEditModal();
                const userId = parseInt(currentRowEditing.dataset.userId);

                const data = await fetchInfoFromUser(userId);

                if (data) {
                    editUserStatus.value = 'Ativo';
                    editUserName.value = data.nomeCompletoUsuario;
                    editUserUserName.value = data.nomeUsuario;
                    editUserEmail.value = data.emailUsuario;
                    editUserNationality.value = data.nacionalidadeUsuario;
                    
                    openModal(editModal);
                } else {
                    console.error('Não foi possível carregar os dados do usuário.');
                }
            });
        }

        if (deleteButton) {
            deleteButton.addEventListener('click', () => {
                rowToDelete = row;

                deleteModal.dataset.userId = rowToDelete.dataset.userId;

                openModal(deleteModal);
            });

            if (cancelDeleteBtn) {
                cancelDeleteBtn.addEventListener('click', () => {
                    rowToDelete = null; 
                    closeModal(deleteModal); 
                });
            }

            if (confirmDeleteBtn) {
                confirmDeleteBtn.addEventListener('click', () => {
                    if (rowToDelete) {
                        deleteUser(parseInt(deleteModal.dataset.userId));
                    }
                    closeModal(deleteModal);
                    rowToDelete = null;
                });
            }
        }

        return row;
    }
});