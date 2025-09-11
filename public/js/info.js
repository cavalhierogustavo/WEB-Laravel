document.addEventListener('DOMContentLoaded', () => {
    // Seleciona os elementos do DOM
    const openModalBtn = document.getElementById('open-edit-modal-btn');
    const modal = document.getElementById('edit-info-modal');
    const closeModalBtn = document.getElementById('close-edit-modal-btn');
    const cancelBtn = document.getElementById('cancel-edit-btn');
    const editForm = document.getElementById('edit-info-form');

    // Seleciona os campos de informação na página
    const esporteInfo = document.getElementById('info-esporte');
    const trofeusInfo = document.getElementById('info-trofeus');
    const membrosInfo = document.getElementById('info-membros');

    // Seleciona os campos de input no modal
    const esporteInput = document.getElementById('edit-esporte');
    const trofeusInput = document.getElementById('edit-trofeus');
    const membrosInput = document.getElementById('edit-membros');

    // Função para abrir o modal
    const openModal = () => {
        // Preenche os inputs do modal com os valores atuais da página
        esporteInput.value = esporteInfo.textContent;
        trofeusInput.value = trofeusInfo.textContent;
        membrosInput.value = membrosInfo.textContent;
        
        // Mostra o modal
        modal.classList.remove('hidden');
    };

    // Função para fechar o modal
    const closeModal = () => {
        modal.classList.add('hidden');
    };

    // Evento de clique para abrir o modal
    if (openModalBtn) {
        openModalBtn.addEventListener('click', openModal);
    }

    // Eventos de clique para fechar o modal
    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', closeModal);
    }
    if (cancelBtn) {
        cancelBtn.addEventListener('click', closeModal);
    }

    // Fecha o modal ao clicar fora da área do conteúdo
    if (modal) {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });
    }

    // Evento de submit do formulário para salvar as alterações
    if (editForm) {
        editForm.addEventListener('submit', (e) => {
            e.preventDefault(); // Impede o envio real do formulário

            // Atualiza os valores na página com os dados do modal
            esporteInfo.textContent = esporteInput.value;
            trofeusInfo.textContent = trofeusInput.value;
            membrosInfo.textContent = membrosInput.value;

            // Fecha o modal após salvar
            closeModal();
        });
    }
});