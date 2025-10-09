<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Clube - Passo 2</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/23.css') }}">
    
    <style>
        /* Estilos adicionais para feedback visual */
        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .error-message {
            color: #e3342f;
            font-size: 0.8rem;
            margin-top: 5px;
            display: block;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .error-message.show {
            opacity: 1;
            transform: translateY(0);
        }

        .success-message {
            color: #28a745;
            font-size: 0.8rem;
            margin-top: 5px;
            display: block;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .success-message.show {
            opacity: 1;
            transform: translateY(0);
        }

        .input-icon-wrapper.error input,
        .input-icon-wrapper.error select,
        .input-icon-wrapper.error textarea {
            border-color: #e3342f;
            box-shadow: 0 0 0 2px rgba(227, 52, 47, 0.2);
        }

        .input-icon-wrapper.success input,
        .input-icon-wrapper.success select,
        .input-icon-wrapper.success textarea {
            border-color: #28a745;
            box-shadow: 0 0 0 2px rgba(40, 167, 69, 0.2);
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #007bff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .btn .btn-text {
            transition: transform 0.3s ease;
        }

        .btn.loading .btn-text {
            transform: translateX(-20px);
        }

        .btn .btn-spinner {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn.loading .btn-spinner {
            opacity: 1;
        }

        .availability-check {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 14px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .availability-check.checking {
            opacity: 1;
            color: #6c757d;
        }

        .availability-check.available {
            opacity: 1;
            color: #28a745;
        }

        .availability-check.unavailable {
            opacity: 1;
            color: #e3342f;
        }

        .form-progress {
            margin-bottom: 20px;
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .progress-step {
            flex: 1;
            text-align: center;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 4px;
            margin: 0 5px;
            font-size: 12px;
            font-weight: 600;
            color: #6c757d;
            transition: all 0.3s ease;
        }

        .progress-step.active {
            background: #007bff;
            color: white;
        }

        .progress-step.completed {
            background: #28a745;
            color: white;
        }

        .textarea-wrapper {
            position: relative;
        }

        .textarea-wrapper textarea {
            width: 100%;
            min-height: 100px;
            padding: 12px 40px 12px 40px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            resize: vertical;
            transition: border-color 0.3s ease;
        }

        .textarea-wrapper .icon {
            position: absolute;
            left: 12px;
            top: 12px;
            color: #6c757d;
        }

        .char-counter {
            position: absolute;
            bottom: 8px;
            right: 12px;
            font-size: 12px;
            color: #6c757d;
        }

        .char-counter.warning {
            color: #ffc107;
        }

        .char-counter.danger {
            color: #dc3545;
        }

        .cnpj-format {
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }

        .navigation-buttons {
            display: flex;
            gap: 15px;
            justify-content: space-between;
        }

        .prev-btn{ 
    background-color: var(--gradient-start); 
    color: #0a6602; 
    border: none; 
    border-radius: 25px; 
    padding: 14px 40px; 
    font-size: 1.1rem; 
    font-weight: 800; 
    cursor: pointer; 
    transition: background-color 0.3s ease; 
    display: flex; 
    align-items: center; 
    gap: 10px; 
}
.next-btn { 
    background-color: var(--gradient-start); 
    color: var(--input-a); 
    border: none; 
    border-radius: 25px; 
    padding: 14px 40px; 
    font-size: 1.1rem; 
    font-weight: 800; 
    cursor: pointer; 
    transition: background-color 0.3s ease; 
    display: flex; 
    align-items: center; 
    gap: 10px; 
}

        .next-btn {
            flex: 1;
        }
    </style>
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
    </div>

    <div class="site-container">
        <div class="main-content-wrapper">
            
            <div class="progress-section">
                <div class="progress-bar-container">
                    <div class="progress-bar-fill" style="width: 66%;">
                        <div class="runner-icon">
                            <i class="fas fa-person-running"></i>
                        </div>
                    </div>
                    <span class="progress-percentage">66%</span>
                </div>
                
        
               
            </div>

            <div class="form-section">
                <div class="header-button">
                    <button class="clube-btn">Clube</button>
                </div>

                <form id="cadastroForm">
                    <div class="form-group">
                        <label for="categoria">Categoria do Clube *</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-layer-group icon"></i>
                            <select id="categoria" name="categoriaClube" required>
                                <option value="" disabled selected hidden>Selecione a categoria</option>
                                <option value="Profissional">Profissional</option>
                                <option value="Semi-profissional">Semi-profissional</option>
                                <option value="Amador">Amador</option>
                                <option value="Juvenil">Juvenil</option>
                                <option value="Infantil">Infantil</option>
                            </select>
                            <i class="fas fa-chevron-down select-arrow"></i>
                        </div>
                        <span class="error-message" id="categoriaError"></span>
                    </div>

                    <div class="form-group">
                        <label for="cnpj">CNPJ *</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-file-alt icon"></i>
                            <input type="text" id="cnpj" name="cnpjClube" placeholder="00.000.000/0000-00" required maxlength="18">
                            <div class="availability-check" id="cnpjCheck">
                                <i class="fas fa-spinner fa-spin"></i>
                            </div>
                        </div>
                        <div class="cnpj-format">Formato: XX.XXX.XXX/XXXX-XX</div>
                        <span class="error-message" id="cnpjError"></span>
                        <span class="success-message" id="cnpjSuccess"></span>
                    </div>

                    <div class="form-group">
                        <label for="endereco">Endereço Completo *</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-map-marker-alt icon"></i>
                            <input type="text" id="endereco" name="enderecoClube" placeholder="Rua, número, bairro, CEP" required maxlength="500">
                        </div>
                        <span class="error-message" id="enderecoError"></span>
                    </div>

                    <div class="form-group">
                        <label for="bio">Biografia do Clube</label>
                        <div class="textarea-wrapper">
                            <i class="fas fa-align-left icon"></i>
                            <textarea id="bio" name="bioClube" placeholder="Conte um pouco sobre a história e objetivos do seu clube..." maxlength="1000"></textarea>
                            <div class="char-counter" id="bioCounter">0/1000</div>
                        </div>
                        <span class="error-message" id="bioError"></span>
                    </div>

                    <div class="navigation-buttons">
                        <button type="button" class="prev-btn" id="prevBtn">
                            <i class="fas fa-chevron-left"></i>
                            Anterior
                        </button>
                        <button type="submit" class="next-btn btn" id="nextBtn">
                            <span class="btn-text">
                                Próximo
                                <i class="fas fa-chevron-right"></i>
                            </span>
                            <div class="btn-spinner"></div>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="marketing-section">
            VENHA CONHECER UM MUNDO DE <span class="highlight-blue">OPORTUNIDADES</span>
        </div>
    </div>

    <script>
        class CadastroStep2 {
            constructor() {
                this.form = document.getElementById('cadastroForm');
                this.nextBtn = document.getElementById('nextBtn');
                this.prevBtn = document.getElementById('prevBtn');
                this.loadingOverlay = document.getElementById('loadingOverlay');
                
                this.debounceTimers = {};
                this.isSubmitting = false;
                
                this.initializeEventListeners();
                this.loadSavedData();
            }

            initializeEventListeners() {
                // Submit do formulário
                this.form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    this.submitForm();
                });

                // Botão anterior
                this.prevBtn.addEventListener('click', () => {
                    window.location.href = '/cadastro/clube/passo-1';
                });

                // Formatação e validação do CNPJ
                const cnpjInput = document.getElementById('cnpj');
                cnpjInput.addEventListener('input', (e) => {
                    this.formatCNPJ(e.target);
                    this.debounceValidation('cnpj', () => {
                        this.checkCnpjDisponibilidade();
                    }, 800);
                });

                // Contador de caracteres para biografia
                const bioTextarea = document.getElementById('bio');
                bioTextarea.addEventListener('input', () => {
                    this.updateCharCounter();
                });

                // Validação em tempo real para outros campos
                const requiredFields = ['categoria', 'endereco'];
                requiredFields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    field.addEventListener('blur', () => {
                        this.validateField(fieldId);
                    });
                    field.addEventListener('input', () => {
                        this.clearFieldError(fieldId);
                    });
                });
            }

            formatCNPJ(input) {
                let value = input.value.replace(/\D/g, '');
                
                if (value.length <= 14) {
                    value = value.replace(/^(\d{2})(\d)/, '$1.$2');
                    value = value.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
                    value = value.replace(/\.(\d{3})(\d)/, '.$1/$2');
                    value = value.replace(/(\d{4})(\d)/, '$1-$2');
                }
                
                input.value = value;
            }

            debounceValidation(key, callback, delay = 500) {
                clearTimeout(this.debounceTimers[key]);
                this.debounceTimers[key] = setTimeout(callback, delay);
            }

            async checkCnpjDisponibilidade() {
                const cnpjInput = document.getElementById('cnpj');
                const cnpjCheck = document.getElementById('cnpjCheck');
                const cnpj = cnpjInput.value.trim();

                if (cnpj.length !== 18) {
                    cnpjCheck.className = 'availability-check';
                    this.clearFieldError('cnpj');
                    return;
                }

                if (!this.validateCNPJ(cnpj)) {
                    cnpjCheck.className = 'availability-check unavailable';
                    cnpjCheck.innerHTML = '<i class="fas fa-times"></i>';
                    this.showFieldError('cnpj', 'CNPJ inválido');
                    return;
                }

                cnpjCheck.className = 'availability-check checking';
                cnpjCheck.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

                try {
                    const response = await fetch('/api/check-cnpj-disponibilidade', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                        },
                        body: JSON.stringify({ cnpj })
                    });

                    const data = await response.json();

                    if (data.available) {
                        cnpjCheck.className = 'availability-check available';
                        cnpjCheck.innerHTML = '<i class="fas fa-check"></i>';
                        this.showFieldSuccess('cnpj', 'CNPJ disponível');
                        this.clearFieldError('cnpj');
                    } else {
                        cnpjCheck.className = 'availability-check unavailable';
                        cnpjCheck.innerHTML = '<i class="fas fa-times"></i>';
                        this.showFieldError('cnpj', data.message);
                    }
                } catch (error) {
                    console.error('Erro ao verificar disponibilidade:', error);
                    cnpjCheck.className = 'availability-check';
                    cnpjCheck.innerHTML = '';
                }
            }

            validateCNPJ(cnpj) {
                cnpj = cnpj.replace(/\D/g, '');
                
                if (cnpj.length !== 14) return false;
                
                // Verificar se todos os dígitos são iguais
                if (/^(\d)\1+$/.test(cnpj)) return false;
                
                // Validar dígitos verificadores
                let soma = 0;
                let peso = 2;
                
                for (let i = 11; i >= 0; i--) {
                    soma += parseInt(cnpj.charAt(i)) * peso;
                    peso = peso === 9 ? 2 : peso + 1;
                }
                
                let digito1 = soma % 11 < 2 ? 0 : 11 - (soma % 11);
                
                if (parseInt(cnpj.charAt(12)) !== digito1) return false;
                
                soma = 0;
                peso = 2;
                
                for (let i = 12; i >= 0; i--) {
                    soma += parseInt(cnpj.charAt(i)) * peso;
                    peso = peso === 9 ? 2 : peso + 1;
                }
                
                let digito2 = soma % 11 < 2 ? 0 : 11 - (soma % 11);
                
                return parseInt(cnpj.charAt(13)) === digito2;
            }

            updateCharCounter() {
                const bioTextarea = document.getElementById('bio');
                const counter = document.getElementById('bioCounter');
                const currentLength = bioTextarea.value.length;
                const maxLength = 1000;
                
                counter.textContent = `${currentLength}/${maxLength}`;
                
                if (currentLength > maxLength * 0.9) {
                    counter.className = 'char-counter danger';
                } else if (currentLength > maxLength * 0.7) {
                    counter.className = 'char-counter warning';
                } else {
                    counter.className = 'char-counter';
                }
            }

            validateField(fieldId) {
                const field = document.getElementById(fieldId);
                const value = field.value.trim();

                if (!value && fieldId !== 'bio') {
                    this.showFieldError(fieldId, 'Este campo é obrigatório.');
                    return false;
                }

                // Validações específicas
                if (fieldId === 'cnpj') {
                    if (!this.validateCNPJ(value)) {
                        this.showFieldError(fieldId, 'CNPJ inválido.');
                        return false;
                    }
                }

                if (fieldId === 'endereco' && value.length < 10) {
                    this.showFieldError(fieldId, 'Endereço muito curto.');
                    return false;
                }

                this.clearFieldError(fieldId);
                return true;
            }

            showFieldError(fieldId, message) {
                const errorElement = document.getElementById(fieldId + 'Error');
                const inputWrapper = document.getElementById(fieldId).closest('.input-icon-wrapper') || 
                                   document.getElementById(fieldId).closest('.textarea-wrapper');
                
                errorElement.textContent = message;
                errorElement.classList.add('show');
                inputWrapper.classList.add('error');
                inputWrapper.classList.remove('success');
            }

            showFieldSuccess(fieldId, message) {
                const successElement = document.getElementById(fieldId + 'Success');
                const inputWrapper = document.getElementById(fieldId).closest('.input-icon-wrapper') || 
                                   document.getElementById(fieldId).closest('.textarea-wrapper');
                
                if (successElement) {
                    successElement.textContent = message;
                    successElement.classList.add('show');
                }
                inputWrapper.classList.add('success');
                inputWrapper.classList.remove('error');
            }

            clearFieldError(fieldId) {
                const errorElement = document.getElementById(fieldId + 'Error');
                const successElement = document.getElementById(fieldId + 'Success');
                const inputWrapper = document.getElementById(fieldId).closest('.input-icon-wrapper') || 
                                   document.getElementById(fieldId).closest('.textarea-wrapper');
                
                errorElement.classList.remove('show');
                if (successElement) successElement.classList.remove('show');
                inputWrapper.classList.remove('error', 'success');
            }

            async submitForm() {
                if (this.isSubmitting) return;

                // Validar todos os campos
                const requiredFields = ['categoria', 'cnpj', 'endereco'];
                let isValid = true;

                requiredFields.forEach(fieldId => {
                    if (!this.validateField(fieldId)) {
                        isValid = false;
                    }
                });

                if (!isValid) {
                    this.showNotification('Por favor, corrija os erros antes de continuar.', 'error');
                    return;
                }

                this.isSubmitting = true;
                this.setLoadingState(true);

                try {
                    const formData = new FormData(this.form);
                    const data = Object.fromEntries(formData.entries());

                    const response = await fetch('/api/cadastro/clube/passo-2', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                        },
                        body: JSON.stringify(data)
                    });

                    const result = await response.json();

                    if (result.success) {
                        this.showNotification('Dados salvos com sucesso!', 'success');
                        
                        // Salvar dados localmente como backup
                        localStorage.setItem('cadastro_step2', JSON.stringify(data));
                        
                        // Redirecionar após um breve delay
                        setTimeout(() => {
                            window.location.href = result.next_step || '/cadastro/clube/passo-3';
                        }, 1000);
                    } else {
                        this.handleValidationErrors(result.errors);
                    }

                } catch (error) {
                    console.error('Erro no cadastro:', error);
                    this.showNotification('Erro de conexão. Tente novamente.', 'error');
                } finally {
                    this.isSubmitting = false;
                    this.setLoadingState(false);
                }
            }

            handleValidationErrors(errors) {
                Object.keys(errors).forEach(field => {
                    let fieldId = field.replace('Clube', '').toLowerCase();
                    if (fieldId === 'categoria') fieldId = 'categoria';
                    
                    const errorMessage = Array.isArray(errors[field]) ? errors[field][0] : errors[field];
                    this.showFieldError(fieldId, errorMessage);
                });

                this.showNotification('Por favor, corrija os erros indicados.', 'error');
            }

            setLoadingState(loading) {
                if (loading) {
                    this.nextBtn.disabled = true;
                    this.nextBtn.classList.add('loading');
                    this.loadingOverlay.style.display = 'flex';
                } else {
                    this.nextBtn.disabled = false;
                    this.nextBtn.classList.remove('loading');
                    this.loadingOverlay.style.display = 'none';
                }
            }

            showNotification(message, type = 'info') {
                // Criar notificação toast
                const notification = document.createElement('div');
                notification.className = `notification ${type}`;
                notification.style.cssText = `
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    padding: 15px 20px;
                    border-radius: 4px;
                    color: white;
                    font-weight: 500;
                    z-index: 10000;
                    transform: translateX(100%);
                    transition: transform 0.3s ease;
                    ${type === 'success' ? 'background-color: #28a745;' : ''}
                    ${type === 'error' ? 'background-color: #dc3545;' : ''}
                    ${type === 'info' ? 'background-color: #007bff;' : ''}
                `;
                notification.textContent = message;

                document.body.appendChild(notification);

                // Animar entrada
                setTimeout(() => {
                    notification.style.transform = 'translateX(0)';
                }, 100);

                // Remover após 4 segundos
                setTimeout(() => {
                    notification.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        document.body.removeChild(notification);
                    }, 300);
                }, 4000);
            }

            async loadSavedData() {
                try {
                    // Tentar carregar dados da sessão do servidor
                    const response = await fetch('http://127.0.0.1:8000/debug/fix-passwords');
                    const result = await response.json();

                    if (result.success && result.data) {
                        this.populateForm(result.data);
                        return;
                    }
                } catch (error) {
                    console.log('Nenhum dado salvo na sessão');
                }

                // Fallback: carregar do localStorage
                const savedData = localStorage.getItem('cadastro_step2');
                if (savedData) {
                    try {
                        const data = JSON.parse(savedData);
                        this.populateForm(data);
                    } catch (error) {
                        console.error('Erro ao carregar dados salvos:', error);
                    }
                }
            }

            populateForm(data) {
                Object.keys(data).forEach(key => {
                    const field = document.querySelector(`[name="${key}"]`);
                    if (field) {
                        field.value = data[key];
                        if (key === 'bioClube') {
                            this.updateCharCounter();
                        }
                    }
                });
            }
        }

        // Inicializar quando o DOM estiver carregado
        document.addEventListener('DOMContentLoaded', () => {
            new CadastroStep2();
        });

        // Adicionar meta tag CSRF se não existir
        if (!document.querySelector('meta[name="csrf-token"]')) {
            const meta = document.createElement('meta');
            meta.name = 'csrf-token';
            meta.content = '{{ csrf_token() }}'; // Será substituído pelo Laravel
            document.head.appendChild(meta);
        }
    </script>
</body>
</html>
