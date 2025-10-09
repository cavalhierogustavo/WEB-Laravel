<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Formulário Clube - Passo 1</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/23.css') }}">
    
    <style>
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

        .form-group {
            margin-bottom: 20px;
        }

        .error-message {
            color: #e3342f;
            font-size: 0.8rem;
            margin-top: 5px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        .input-icon-wrapper.error input,
        .input-icon-wrapper.error select {
            border-color: #e3342f;
            box-shadow: 0 0 0 2px rgba(227, 52, 47, 0.2);
        }

        .next-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="site-container">
        <div class="main-content-wrapper">
            
            <div class="progress-section">
                <div class="progress-bar-container">
                    <div class="progress-bar-fill" style="width: 33%;">
                        <div class="runner-icon">
                            <i class="fas fa-person-running"></i>
                        </div>
                    </div>
                    <span class="progress-percentage">33%</span>
                </div>
            </div>

            <div class="form-section">
                <div class="header-button">
                    <button class="clube-btn">Clube</button>
                </div>

                <form id="cadastroForm">
                    <div class="form-group">
                        <label for="nome">Nome do Clube *</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-users icon"></i>
                            <input type="text" id="nome" name="nomeClube" required>
                        </div>
                        <span class="error-message" id="nomeError"></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="ano-criacao">Ano de criação *</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-calendar-alt icon"></i>
                                <input type="date" id="ano-criacao" name="anoCriacaoClube" required>
                            </div>
                            <span class="error-message" id="anoCriacaoError"></span>
                        </div>
                        <div class="form-group half-width">
                            <label for="interesse">Interesse *</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-star icon"></i>
                                <select id="interesse" name="interesseClube" required>
                                    <option value="" disabled selected hidden>Selecione o interesse</option>
                                    <option value="Recrutamento">Recrutamento</option>
                                    <option value="Competição">Competição</option>
                                    <option value="Lazer">Lazer</option>
                                </select>
                                <i class="fas fa-chevron-down select-arrow"></i>
                            </div>
                            <span class="error-message" id="interesseError"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="esporte">Esporte *</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-trophy icon"></i>
                            <select id="esporte" name="esporteClube" required>
                                <option value="" disabled selected hidden>Selecione um esporte</option>
                                <option value="Futebol">Futebol</option>
                                <option value="Vôlei">Vôlei</option>
                                <option value="Basquete">Basquete</option>
                                <option value="Tênis">Tênis</option>
                                <option value="Natação">Natação</option>
                                <option value="Atletismo">Atletismo</option>
                            </select>
                            <i class="fas fa-chevron-down select-arrow"></i>
                        </div>
                        <span class="error-message" id="esporteError"></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="estado">Estado *</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-map-marker-alt icon"></i>
                                <select id="estado" name="estadoClube" required>
                                    <option value="" disabled selected hidden>Selecione o estado</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                                <i class="fas fa-chevron-down select-arrow"></i>
                            </div>
                            <span class="error-message" id="estadoError"></span>
                        </div>
                        <div class="form-group half-width">
                            <label for="cidade">Cidade *</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-building icon"></i>
                                <input type="text" id="cidade" name="cidadeClube" required>
                            </div>
                            <span class="error-message" id="cidadeError"></span>
                        </div>
                    </div>

                    <div class="navigation-buttons">
                        <button type="submit" class="next-btn" id="nextBtn">
                            Próximo
                            <i class="fas fa-chevron-right"></i>
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
        class CadastroSimples {
            constructor() {
                this.form = document.getElementById('cadastroForm');
                this.nextBtn = document.getElementById('nextBtn');
                this.baseUrl = window.location.origin;
                
                this.initializeEventListeners();
                this.loadSavedData();
            }

            initializeEventListeners() {
                // Submit do formulário
                this.form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    this.handleSubmit();
                });

                // Validação em tempo real
                const fields = ['nome', 'ano-criacao', 'interesse', 'esporte', 'estado', 'cidade'];
                fields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (field) {
                        field.addEventListener('input', () => {
                            this.clearFieldError(fieldId);
                        });
                        field.addEventListener('blur', () => {
                            this.validateField(fieldId);
                        });
                    }
                });
            }

            validateField(fieldId) {
                const field = document.getElementById(fieldId);
                if (!field) return false;
                
                const value = field.value.trim();
                const fieldName = field.closest('.form-group').querySelector('label').textContent;

                if (!value) {
                    this.showFieldError(fieldId, `${fieldName} é obrigatório.`);
                    return false;
                }

                // Validação específica para data
                if (fieldId === 'ano-criacao') {
                    const selectedDate = new Date(value);
                    const currentDate = new Date();
                    
                    if (selectedDate > currentDate) {
                        this.showFieldError(fieldId, 'A data não pode ser no futuro.');
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
                }
            }

            clearFieldError(fieldId) {
                const errorElement = document.getElementById(fieldId + 'Error');
                const inputWrapper = document.getElementById(fieldId)?.closest('.input-icon-wrapper');
                
                if (errorElement) {
                    errorElement.classList.remove('show');
                }
                
                if (inputWrapper) {
                    inputWrapper.classList.remove('error');
                }
            }

            async handleSubmit() {
                // Validar todos os campos
                const fields = ['nome', 'ano-criacao', 'interesse', 'esporte', 'estado', 'cidade'];
                let isValid = true;

                fields.forEach(fieldId => {
                    if (!this.validateField(fieldId)) {
                        isValid = false;
                    }
                });

                if (!isValid) {
                    this.showNotification('Por favor, preencha todos os campos obrigatórios.', 'error');
                    return;
                }
                
                // Coletar dados do formulário
                const formData = new FormData(this.form);
                const data = Object.fromEntries(formData.entries());
                
                // Salvar dados localmente
                localStorage.setItem('cadastro_step1', JSON.stringify(data));

                // Tentar enviar para o servidor
                try {
                    const apiUrl = `${this.baseUrl}/api/cadastro/clube/passo-1`;
                    
                    // Obter token CSRF
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                    
                    const response = await fetch(apiUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken || '',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify(data)
                    });

                    if (response.ok) {
                        const result = await response.json();
                        
                        if (result.success) {
                            this.showNotification('Dados salvos com sucesso!', 'success');
                            
                            setTimeout(() => {
                                window.location.href = result.next_step || '/cadastro/clube/passo-2';
                            }, 1500);
                            return;
                        }
                    }
                    
                } catch (error) {
                    console.error('Erro na API:', error);
                }

                // Continuar mesmo sem API
                this.showNotification('Dados salvos localmente. Continuando...', 'info');
                
                setTimeout(() => {
                    window.location.href = '/cadastro/clube/passo-2';
                }, 2000);
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

            loadSavedData() {
                const savedData = localStorage.getItem('cadastro_step1');
                if (savedData) {
                    try {
                        const data = JSON.parse(savedData);
                        Object.keys(data).forEach(key => {
                            const field = document.querySelector(`[name="${key}"]`);
                            if (field) {
                                field.value = data[key];
                            }
                        });
                    } catch (error) {
                        console.error('Erro ao carregar dados salvos:', error);
                    }
                }
            }
        }

        // Inicializar quando o DOM estiver carregado
        document.addEventListener('DOMContentLoaded', () => {
            new CadastroSimples();
        });
    </script>
</body>
</html>
