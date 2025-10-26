import { toast } from 'https://cdn.skypack.dev/wc-toast';

(function () {
    const form = document.querySelector('[data-form]');
    const btn = form.querySelector('[data-form-btn]');
    const btnText = btn.querySelector('span');
    const icon = btn.querySelector('ion-icon');

    form.addEventListener('submit', async function (e) {
        e.preventDefault();
        btn.disabled = true;
        icon.name = 'sync-outline';
        icon.style.animation = 'spin 1s linear infinite';
        btnText.textContent = 'Sending...';

        const formData = new FormData(form);

        try {
            const response = await fetch('/include/mail.php', {
                method: 'POST',
                body: formData
            });

            // Ensure JSON parsing doesn't fail
            const result = await response.json();

            if (result.status === 'success') {
                toast.success(result.message, { duration: 4000, theme: { type: 'custom', style: { background: '#363636', color: '#fff' } } });
                form.reset();
            } else {
                toast.error(result.message, { duration: 4000, theme: { type: 'custom', style: { background: '#363636', color: '#fff' } } });
            }

        } catch (err) {
            toast.error('Something went wrong!', { duration: 4000, theme: { type: 'custom', style: { background: '#363636', color: '#fff' } } });
        }

        btn.disabled = false;
        icon.name = 'paper-plane';
        icon.style.animation = 'none';
        btnText.textContent = 'Send Message';
    });

    // Spinner CSS
    const style = document.createElement('style');
    style.innerHTML = `
        @keyframes spin { 0% { transform: rotate(0deg);} 100% { transform: rotate(360deg);} }
    `;
    document.head.appendChild(style);
})();