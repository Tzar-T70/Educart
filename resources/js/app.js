import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

Alpine.plugin(focus);

Alpine.store('toast', {
    open: false,
    message: '',
    type: 'success', // 'success' or 'error'
    timer: null,

    show(message, type = 'success') {
        this.open = true;
        this.message = message;
        this.type = type;

        clearTimeout(this.timer);
        this.timer = setTimeout(() => {
            this.open = false;
        }, 4000);
    },

    hide() {
        this.open = false;
    }
});

window.authModal = (config = {}) => ({
    open: config.open || false,
    currentView: config.initialView || 'login',
    code: ['', '', '', '', '', ''],
    verificationError: '',
    verificationSuccess: false,
    isVerifying: false, 
    loginError: '', 
    isResending: false,
    timerMessage: '',
    cooldownSeconds: 30,
    localStorageKey: 'resend_cooldown_until',
    timerInterval: null,
    verifyUrl: '',
    resendUrl: '',
    csrfToken: '',
    
    // --- AUTH FUNCTIONS ---
    async handleLogin(event) {
        this.isVerifying = true;
        this.loginError = '';
        const form = event.target;
        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: { 
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                }
            });

            const data = await response.json();

            if (response.ok) {
                window.location.href = data.redirect;
            } else if (response.status === 422) {
                if (data.errors && data.errors.email) {
                    this.loginError = data.errors.email[0];
                    if (data.errors.email[0].includes('not verified')) {
                        this.currentView = 'verifyCode';
                        this.startCooldown(); 
                        this.saveStep('verifyCode'); 
                    }
                }
            } else {
                this.loginError = 'An unknown error occurred.';
            }
        } catch (e) {
            this.loginError = 'Could not connect to the server.';
        }
        this.isVerifying = false;
    },
    async handleRegister(event) {
        this.isVerifying = true;
        const form = event.target;
        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: { 
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                }
            });

            if (response.ok) {
                this.currentView = 'verifyCode';
                this.isVerifying = false;
                this.startCooldown(); 
                this.saveStep('verifyCode');
            } else if (response.status === 422) {
                form.submit();
            } else {
                throw new Error('Server error');
            }
        } catch (e) {
            form.submit();
        }
    },
    async handleForgotPassword(event) {
        const form = event.target;
        const formData = new FormData(form);
        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: { 
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                }
            });
            if (response.ok) {
                this.currentView = 'forgotPasswordSuccess';
            } else {
                form.submit(); 
            }
        } catch (e) {
            form.submit(); 
        }
    },

    saveStep(step) {
        sessionStorage.setItem('authStep', step);
    },
    clearStep() {
        sessionStorage.removeItem('authStep');
    },

    openModal(view = 'login') {
        document.body.style.overflow = 'hidden';
        this.updateTimerMessage(); 

        const savedStep = sessionStorage.getItem('authStep');
        if (savedStep === 'verifyCode') {
            this.currentView = 'verifyCode';
        } else {
            this.currentView = view;
        }
        
        this.open = true;
    },

    closeModal() {
        this.open = false;
        document.body.style.overflow = 'auto';

        if (this.currentView === 'verifyCode') {
            this.saveStep('verifyCode');
        } else {
            this.clearStep();
        }
    },

    handleCodeInput(e, index) {
        this.verificationError = '';
        this.verificationSuccess = false;
        
        const value = e.target.value;
        
        if (!/^[0-9]$/.test(value)) {
            e.target.value = '';
            this.code[index] = '';
            return;
        }
        
        this.code[index] = value;
        
        if (index < 5) {
            this.$refs.codeInputs.children[index + 1].focus();
        } else if (index === 5) {
            e.target.blur();
            this.submitCode();
        }
    },
    handleBackspace(e, index) {
        this.verificationError = '';
        this.verificationSuccess = false;

        this.code[index] = '';
        
        if (index > 0) {
            this.$refs.codeInputs.children[index - 1].focus();
        }
    },
    handlePaste(e) {
        this.verificationError = '';
        this.verificationSuccess = false;
        const paste = e.clipboardData.getData('text').replace(/\s/g, '');

        if (/^[0-9]{6}$/.test(paste)) {
            paste.split('').forEach((char, index) => {
                this.code[index] = char;
            });
            
            this.$refs.codeInputs.children[5].focus();
            this.submitCode();
        }
    },


    async submitCode() {
        this.isVerifying = true;
        this.verificationError = '';
        const joinedCode = this.code.join('');

        if (joinedCode.length !== 6) {
            this.verificationError = 'Please enter all 6 digits.';
            this.isVerifying = false;
            return;
        }
        
        try {
            const response = await fetch(this.verifyUrl, {
                method: 'POST',
                body: JSON.stringify({ code: joinedCode }),
                headers: { 
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                }
            });
            
            const data = await response.json();

            if (response.ok) {
                this.verificationSuccess = true;
                this.verificationError = '';
                Alpine.store('toast').show('Verification successful! Logging you in...', 'success');
                
                this.clearStep(); 

                setTimeout(() => {
                    window.location.reload(); 
                }, 1500);
            } else {
                this.verificationError = data.message || 'An unknown error occurred.';
                this.resetVerification();
            }
        } catch (e) {
            this.verificationError = 'Could not connect to the server.';
            this.resetVerification();
        }
        this.isVerifying = false;
    },
    async resendCode() {
        if (this.isResending || this.timerMessage) return;

        this.isResending = true;
        this.verificationError = '';

        try {
            const response = await fetch(this.resendUrl, {
                method: 'POST',
                headers: { 
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                }
            });

            const data = await response.json();

            if (response.ok) {
                Alpine.store('toast').show(data.message || 'A new code has been sent.', 'success');
                this.startCooldown();
                this.resetVerification();
            } else {
                Alpine.store('toast').show(data.message || 'Failed to resend code.', 'error');
            }
        } catch (e) {
            Alpine.store('toast').show('Could not connect to the server.', 'error');
        }
        
        this.isResending = false;
    },

    startCooldown() {
        const cooldownUntil = Date.now() + (this.cooldownSeconds * 1000);
        localStorage.setItem(this.localStorageKey, cooldownUntil);
        
        this.updateTimerMessage();
        
        if (this.timerInterval) {
            clearInterval(this.timerInterval);
        }
        this.timerInterval = setInterval(() => {
            this.updateTimerMessage();
        }, 1000);
    },
    updateTimerMessage() {
        const cooldownUntil = localStorage.getItem(this.localStorageKey);
        if (!cooldownUntil) {
            this.timerMessage = '';
            if (this.timerInterval) clearInterval(this.timerInterval);
            return;
        }
        
        const remainingMs = cooldownUntil - Date.now();
        const remainingSeconds = Math.ceil(remainingMs / 1000);

        if (remainingSeconds <= 0) {
            this.timerMessage = '';
            localStorage.removeItem(this.localStorageKey);
            if (this.timerInterval) clearInterval(this.timerInterval);
        } else {
            this.timerMessage = `(in ${remainingSeconds}s)`;
        }
    },

    resetVerification() {
        this.code = ['', '', '', '', '', ''];
        this.verificationError = '';
        this.verificationSuccess = false;
        this.isVerifying = false;
        
        if (this.$refs.codeInputs && this.$refs.codeInputs.children[0]) {
            this.$refs.codeInputs.children[0].focus();
        }
    },
    
    init() {
        const wrapper = this.$refs.modalWrapper;
        if (wrapper) {
            this.verifyUrl = wrapper.dataset.verifyUrl;
            this.resendUrl = wrapper.dataset.resendUrl;
            this.csrfToken = wrapper.dataset.csrf;
        }
        window.addEventListener('open-auth-modal', (event) => {
            this.openModal(event.detail.view);
        });
        
        const savedStep = sessionStorage.getItem('authStep');
        if (this.open && savedStep === 'verifyCode') {
            this.currentView = 'verifyCode';
        }
        
        this.updateTimerMessage(); 

        if (this.open) {
            document.body.style.overflow = 'hidden';
            if (this.currentView === 'verifyCode') {
                this.resetVerification();
                this.updateTimerMessage(); 
            }
        }
    }
});


window.Alpine = Alpine;
Alpine.start();