<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Formulário Clube - Passo 3</title>
    
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

        .input-icon-wrapper.error input {
            border-color: #e3342f;
            box-shadow: 0 0 0 2px rgba(227, 52, 47, 0.2);
        }

        .input-icon-wrapper.success input {
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
            right: 40px;
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

.finish-btn { 
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
        .password-strength {
            margin-top: 5px;
            font-size: 12px;
        }

        .strength-bar {
            height: 4px;
            background: #e9ecef;
            border-radius: 2px;
            margin: 5px 0;
            overflow: hidden;
        }

        .strength-fill {
            height: 100%;
            transition: width 0.3s ease, background-color 0.3s ease;
            width: 0%;
        }

        .strength-weak .strength-fill {
            background: #dc3545;
            width: 25%;
        }

        .strength-fair .strength-fill {
            background: #ffc107;
            width: 50%;
        }

        .strength-good .strength-fill {
            background: #17a2b8;
            width: 75%;
        }

        .strength-strong .strength-fill {
            background: #28a745;
            width: 100%;
        }

        .password-requirements {
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }

        .requirement {
            display: flex;
            align-items: center;
            margin: 2px 0;
        }

        .requirement.met {
            color: #28a745;
        }

        .requirement .icon {
            width: 12px;
            margin-right: 5px;
        }

        .summary-section {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .summary-title {
            font-weight: 600;
            margin-bottom: 15px;
            color: #495057;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .summary-label {
            color: #6c757d;
        }

        .summary-value {
            font-weight: 500;
            color: #495057;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
            transition: color 0.3s ease;
            z-index: 10;
        }

        .toggle-password:hover {
            color: #495057;
        }

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 4px;
            color: white;
            font-weight: 500;
            z-index: 10001;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            max-width: 300px;
        }

        .notification.show {
            transform: translateX(0);
        }

        .notification.success {
            background-color: #28a745;
        }

        .notification.error {
            background-color: #dc3545;
        }

        .notification.info {
            background-color: #007bff;
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
                    <div class="progress-bar-fill" style="width: 100%;">
                        <div class="runner-icon">
                            <i class="fas fa-person-running"></i>
                        </div>
                    </div>
                    <span class="progress-percentage">100%</span>
                </div>
            </div>

            <div class="form-section">
                <div class="header-button">
                    <button class="clube-btn">Clube</button>
                </div>

                <!-- Resumo dos dados -->
                

                <form id="cadastroForm">
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-envelope icon"></i>
                            <input type="email" id="email" name="emailClube" required>
                            <div class="availability-check" id="emailCheck">
                                <i class="fas fa-spinner fa-spin"></i>
                            </div>
                        </div>
                        <span class="error-message" id="emailError"></span>
                        <span class="success-message" id="emailSuccess"></span>
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha *</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-lock icon"></i>
                            <input type="password" id="senha" name="senhaClube" required minlength="8">
                            <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                        </div>
                        <div class="password-strength" id="passwordStrength">
                            <div class="strength-bar">
                                <div class="strength-fill"></div>
                            </div>
                            <span class="strength-text">Digite uma senha</span>
                        </div>
                        <div class="password-requirements">
                            <div class="requirement" id="req-length">
                                <i class="fas fa-times icon"></i>
                                Pelo menos 8 caracteres
                            </div>
                            <div class="requirement" id="req-uppercase">
                                <i class="fas fa-times icon"></i>
                                Uma letra maiúscula
                            </div>
                            <div class="requirement" id="req-lowercase">
                                <i class="fas fa-times icon"></i>
                                Uma letra minúscula
                            </div>
                            <div class="requirement" id="req-number">
                                <i class="fas fa-times icon"></i>
                                Um número
                            </div>
                        </div>
                        <span class="error-message" id="senhaError"></span>
                    </div>

                    <div class="form-group">
                        <label for="confirmar-senha">Confirmar Senha *</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-lock icon"></i>
                            <input type="password" id="confirmar-senha" name="senhaClube_confirmation" required>
                            <i class="fas fa-eye toggle-password" id="toggleConfirmPassword"></i>
                        </div>
                        <span class="error-message" id="confirmarSenhaError"></span>
                        <span class="success-message" id="confirmarSenhaSuccess"></span>
                    </div>

                    <div class="navigation-buttons">
                        <button type="button" class="prev-btn" id="prevBtn">
                            <i class="fas fa-chevron-left"></i>
                            Anterior
                        </button>
                        <button type="submit" class="finish-btn btn" id="finishBtn">
                            <span class="btn-text">
                                Finalizar
                                <i class="fas fa-check"></i>
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
        class CadastroStep3 {
            constructor() {
                this.form = document.getElementById('cadastroForm');
                this.finishBtn = document.getElementById('finishBtn');
                this.prevBtn = document.getElementById('prevBtn');
                this.loadingOverlay = document.getElementById('loadingOverlay');
                
                this.debounceTimers = {};
                this.isSubmitting = false;
                this.baseUrl = window.location.origin;
                
                this.initializeEventListeners();
                this.loadSavedData();
                this.loadSummary();
            }

            initializeEventListeners() {
                // Submit do formulário
                this.form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    this.submitForm();
                });

                // Botão anterior
                this.prevBtn.addEventListener('click', () => {
                    window.location.href = '/cadastro/clube/passo-2';
                });

                // Validação de email em tempo real
                const emailInput = document.getElementById('email');
                emailInput.addEventListener('input', () => {
                    this.debounceValidation('email', () => {
                        this.checkEmailDisponibilidade();
                    }, 800);
                });

                // Validação de senha em tempo real
                const senhaInput = document.getElementById('senha');
                senhaInput.addEventListener('input', () => {
                    this.checkPasswordStrength();
                    this.validatePasswordMatch();
                });

                // Validação de confirmação de senha
                const confirmSenhaInput = document.getElementById('confirmar-senha');
                confirmSenhaInput.addEventListener('input', () => {
                    this.validatePasswordMatch();
                });

                // Toggle de visibilidade da senha
                document.getElementById('togglePassword').addEventListener('click', () => {
                    this.togglePasswordVisibility('senha', 'togglePassword');
                });

                document.getElementById('toggleConfirmPassword').addEventListener('click', () => {
                    this.togglePasswordVisibility('confirmar-senha', 'toggleConfirmPassword');
                });
            }

            debounceValidation(key, callback, delay = 500) {
                clearTimeout(this.debounceTimers[key]);
                this.debounceTimers[key] = setTimeout(callback, delay);
            }

            async checkEmailDisponibilidade() {
                const emailInput = document.getElementById('email');
                const emailCheck = document.getElementById('emailCheck');
                const email = emailInput.value.trim();

                if (!this.isValidEmail(email)) {
                    emailCheck.className = 'availability-check';
                    this.clearFieldError('email');
                    return;
                }

                emailCheck.className = 'availability-check checking';
                emailCheck.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

                try {
                    const response = await fetch(`${this.baseUrl}/api/check-email-disponibilidade`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                        },
                        body: JSON.stringify({ email })
                    });

                    if (response.ok) {
                        const data = await response.json();

                        if (data.available) {
                            emailCheck.className = 'availability-check available';
                            emailCheck.innerHTML = '<i class="fas fa-check"></i>';
                            this.showFieldSuccess('email', 'Email disponível');
                            this.clearFieldError('email');
                        } else {
                            emailCheck.className = 'availability-check unavailable';
                            emailCheck.innerHTML = '<i class="fas fa-times"></i>';
                            this.showFieldError('email', data.message);
                        }
                    } else {
                        throw new Error(`HTTP ${response.status}`);
                    }
                } catch (error) {
                    console.error('Erro ao verificar disponibilidade:', error);
                    emailCheck.className = 'availability-check';
                    emailCheck.innerHTML = '';
                }
            }

            isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }

            checkPasswordStrength() {
                const senha = document.getElementById('senha').value;
                const strengthElement = document.getElementById('passwordStrength');
                const strengthBar = strengthElement.querySelector('.strength-bar');
                const strengthText = strengthElement.querySelector('.strength-text');

                // Verificar requisitos
                const requirements = {
                    length: senha.length >= 8,
                    uppercase: /[A-Z]/.test(senha),
                    lowercase: /[a-z]/.test(senha),
                    number: /\d/.test(senha)
                };

                // Atualizar indicadores visuais dos requisitos
                Object.keys(requirements).forEach(req => {
                    const element = document.getElementById(`req-${req}`);
                    if (element) {
                        const icon = element.querySelector('.icon');
                        
                        if (requirements[req]) {
                            element.classList.add('met');
                            icon.className = 'fas fa-check icon';
                        } else {
                            element.classList.remove('met');
                            icon.className = 'fas fa-times icon';
                        }
                    }
                });

                // Calcular força da senha
                const metRequirements = Object.values(requirements).filter(Boolean).length;
                let strength = 'weak';
                let strengthTextValue = 'Fraca';

                if (metRequirements === 4) {
                    strength = 'strong';
                    strengthTextValue = 'Forte';
                } else if (metRequirements === 3) {
                    strength = 'good';
                    strengthTextValue = 'Boa';
                } else if (metRequirements >= 2) {
                    strength = 'fair';
                    strengthTextValue = 'Regular';
                }

                // Atualizar barra de força
                strengthBar.className = `strength-bar strength-${strength}`;
                strengthText.textContent = strengthTextValue;
            }

            validatePasswordMatch() {
                const senha = document.getElementById('senha').value;
                const confirmSenha = document.getElementById('confirmar-senha').value;

                if (confirmSenha.length === 0) {
                    this.clearFieldError('confirmarSenha');
                    return;
                }

                if (senha === confirmSenha) {
                    this.showFieldSuccess('confirmarSenha', 'Senhas coincidem');
                    this.clearFieldError('confirmarSenha');
                } else {
                    this.showFieldError('confirmarSenha', 'Senhas não coincidem');
                }
            }

            togglePasswordVisibility(inputId, toggleId) {
                const input = document.getElementById(inputId);
                const toggle = document.getElementById(toggleId);

                if (input.type === 'password') {
                    input.type = 'text';
                    toggle.className = 'fas fa-eye-slash toggle-password';
                } else {
                    input.type = 'password';
                    toggle.className = 'fas fa-eye toggle-password';
                }
            }

            async loadSummary() {
                try {
                    const response = await fetch(`${this.baseUrl}/api/cadastro/dados-sessao`);
                    
                    if (response.ok) {
                        const result = await response.json();

                        if (result.success && result.data) {
                            this.displaySummary(result.data);
                        }
                    }
                } catch (error) {
                    console.error('Erro ao carregar resumo:', error);
                }
            }

            displaySummary(data) {
                const summaryContent = document.getElementById('summaryContent');
                
                const summaryItems = [
                    { label: 'Nome do Clube', value: data.nomeClube },
                    { label: 'Esporte', value: data.esporteClube },
                    { label: 'Categoria', value: data.categoriaClube },
                    { label: 'Interesse', value: data.interesseClube },
                    { label: 'Localização', value: `${data.cidadeClube}, ${data.estadoClube}` },
                    { label: 'CNPJ', value: data.cnpjClube },
                    { label: 'Ano de Criação', value: data.anoCriacaoClube ? new Date(data.anoCriacaoClube).getFullYear() : '' }
                ];

                const validItems = summaryItems.filter(item => item.value);

                summaryContent.innerHTML = validItems
                    .map(item => `
                        <div class="summary-item">
                            <span class="summary-label">${item.label}:</span>
                            <span class="summary-value">${item.value}</span>
                        </div>
                    `).join('');
            }

            validateField(fieldId) {
                const field = document.getElementById(fieldId);
                const value = field.value.trim();

                if (!value) {
                    this.showFieldError(fieldId, 'Este campo é obrigatório.');
                    return false;
                }

                if (fieldId === 'email' && !this.isValidEmail(value)) {
                    this.showFieldError(fieldId, 'Email inválido.');
                    return false;
                }

                if (fieldId === 'senha' && value.length < 8) {
                    this.showFieldError(fieldId, 'Senha deve ter pelo menos 8 caracteres.');
                    return false;
                }

                if (fieldId === 'confirmar-senha') {
                    const senha = document.getElementById('senha').value;
                    if (value !== senha) {
                        this.showFieldError(fieldId, 'Senhas não coincidem.');
                        return false;
                    }
                }

                this.clearFieldError(fieldId);
                return true;
            }

            showFieldError(fieldId, message) {
                const errorElement = document.getElementById(fieldId + 'Error');
                const inputWrapper = document.getElementById(fieldId)?.closest('.input-icon-wrapper');
                
                if (errorElement) {
                    errorElement.textContent = message;
                    errorElement.classList.add('show');
                }
                
                if (inputWrapper) {
                    inputWrapper.classList.add('error');
                    inputWrapper.classList.remove('success');
                }
            }

            showFieldSuccess(fieldId, message) {
                const successElement = document.getElementById(fieldId + 'Success');
                const inputWrapper = document.getElementById(fieldId)?.closest('.input-icon-wrapper');
                
                if (successElement) {
                    successElement.textContent = message;
                    successElement.classList.add('show');
                }
                
                if (inputWrapper) {
                    inputWrapper.classList.add('success');
                    inputWrapper.classList.remove('error');
                }
            }

            clearFieldError(fieldId) {
                const errorElement = document.getElementById(fieldId + 'Error');
                const successElement = document.getElementById(fieldId + 'Success');
                const inputWrapper = document.getElementById(fieldId)?.closest('.input-icon-wrapper');
                
                if (errorElement) errorElement.classList.remove('show');
                if (successElement) successElement.classList.remove('show');
                if (inputWrapper) inputWrapper.classList.remove('error', 'success');
            }

            async submitForm() {
                if (this.isSubmitting) return;

                // Validar todos os campos
                const requiredFields = ['email', 'senha', 'confirmar-senha'];
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

                    const apiUrl = `${this.baseUrl}/api/cadastro/clube/finalizar`;

                    const response = await fetch(apiUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify(data)
                    });

                    if (response.ok) {
                        const result = await response.json();

                        if (result.success) {
                            this.showNotification('Cadastro realizado com sucesso!', 'success');
                            
                            // Limpar dados salvos localmente
                            localStorage.removeItem('cadastro_step1');
                            localStorage.removeItem('cadastro_step2');
                            localStorage.removeItem('cadastro_step3');
                            
                            // Redirecionar após um breve delay
                            setTimeout(() => {
                                window.location.href = result.redirect || '/cadastro/sucesso';
                            }, 2000);
                        } else {
                            this.handleValidationErrors(result.errors || {});
                        }
                    } else {
                        throw new Error(`HTTP ${response.status}: ${response.statusText}`);
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
                    if (fieldId === 'senhaclube_confirmation') fieldId = 'confirmar-senha';
                    
                    const errorMessage = Array.isArray(errors[field]) ? errors[field][0] : errors[field];
                    this.showFieldError(fieldId, errorMessage);
                });

                this.showNotification('Por favor, corrija os erros indicados.', 'error');
            }

            setLoadingState(loading) {
                if (loading) {
                    this.finishBtn.disabled = true;
                    this.finishBtn.classList.add('loading');
                    this.loadingOverlay.style.display = 'flex';
                } else {
                    this.finishBtn.disabled = false;
                    this.finishBtn.classList.remove('loading');
                    this.loadingOverlay.style.display = 'none';
                }
            }

            showNotification(message, type = 'info') {
                const notification = document.createElement('div');
                notification.className = `notification ${type}`;
                notification.textContent = message;

                document.body.appendChild(notification);

                // Animar entrada
                setTimeout(() => {
                    notification.classList.add('show');
                }, 100);

                // Remover após 4 segundos
                setTimeout(() => {
                    notification.classList.remove('show');
                    setTimeout(() => {
                        if (document.body.contains(notification)) {
                            document.body.removeChild(notification);
                        }
                    }, 300);
                }, 4000);
            }

            async loadSavedData() {
                // Carregar dados salvos localmente se existirem
                const savedData = localStorage.getItem('cadastro_step3');
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
                    }
                });
            }
        }

        // Inicializar quando o DOM estiver carregado
        document.addEventListener('DOMContentLoaded', () => {
            new CadastroStep3();
        });
    </script>
</body>
</html>
