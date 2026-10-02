document.addEventListener("DOMContentLoaded", () => {
    const togglePasswords = document.querySelectorAll(".toggle-password");

    togglePasswords.forEach(btn => {
        btn.addEventListener("click", function() {
            const passwordField = this.parentElement.querySelector('input');
            
            if (passwordField) {
                const isHidden = passwordField.type === "password";
                passwordField.type = isHidden ? "text" : "password";
                
                this.src = isHidden ? "/asset/eye-open.svg" : "/asset/eye-close.svg";
            }
        });
    });

    const googleBtn = document.querySelector(".google-btn");
    const popup = document.getElementById("googlePopup");
    const overlay = document.querySelector(".dark-overlay");

    if (googleBtn && popup && overlay) {
        googleBtn.addEventListener("click", e => {
            e.preventDefault();
            popup.classList.add("active");
            overlay.classList.add("active");
        });

        overlay.addEventListener("click", () => {
            popup.classList.remove("active");
            overlay.classList.remove("active");
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const inputs = document.querySelectorAll('.form-control');

    inputs.forEach(input => {
        input.addEventListener('input', function () {
            if (this.classList.contains('is-invalid')) {
                this.classList.remove('is-invalid');
                
                const errorFeedback = this.parentElement.querySelector('.invalid-feedback');
                if (errorFeedback) {
                    errorFeedback.style.display = 'none';
                }
            }
        });
    });
});
