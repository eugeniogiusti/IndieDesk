import './bootstrap'
import './theme'
import Alpine from 'alpinejs'
import createToastStore from './stores/toast'
import projectSearch from './components/projectSearch'
import clientSearch from './components/clientSearch'
import clientMultiSearch from './components/clientMultiSearch'
import clientModal from './components/clientModal';
import clientFollowupModal from './components/clientFollowupModal';
import projectModal from './components/projectModal';
import taskModal from './components/taskModal';
import meetingModal from './components/meetingModal';
import paymentModal from './components/paymentModal';
import uploadInvoiceModal from './components/uploadInvoiceModal';
import costModal from './components/costModal';
import receiptUploadModal from './components/receiptUploadModal';
import taxModal from './components/taxModal';
import taxAttachmentModal from './components/taxAttachmentModal';
import documentModal from './components/documentModal';
import labelModal from './components/labelModal';
import annualTrendChart from './components/annualTrendChart';
import repositoryTab from './components/repositoryTab';
import taskToggle from './components/taskToggle';
import inlineField from './components/inlineField';
import aiChat from './components/ai-chat/index';
import 'trix';

// Trix: make links clickable + restrict file picker + handle image upload
document.addEventListener('trix-initialize', (e) => {
    const editor = e.target;

    // Make links clickable (open in new tab), but not image attachments
    editor.addEventListener('click', (ev) => {
        const anchor = ev.target.closest('a[href]');
        if (anchor && !anchor.closest('figure.attachment')) {
            ev.preventDefault();
            window.open(anchor.href, '_blank', 'noopener,noreferrer');
        }
    });

    // Restrict OS file picker to supported image types only
    const fileInput = editor.toolbarElement?.querySelector('input[type=file]');
    if (fileInput) {
        fileInput.setAttribute('accept', 'image/jpeg,image/png,image/gif');
    }
});

document.addEventListener('trix-attachment-add', async (e) => {
    const attachment = e.attachment;
    if (!attachment.file) return;

    const editor = e.target;
    const uploadUrl = editor.dataset.uploadUrl;
    if (!uploadUrl) return;

    // Disable save button while upload is in progress
    const submitBtn = editor.closest('form')?.querySelector('[type=submit]');
    if (submitBtn) submitBtn.disabled = true;

    attachment.setUploadProgress(0);

    const formData = new FormData();
    formData.append('image', attachment.file);
    formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

    try {
        const response = await fetch(uploadUrl, { method: 'POST', body: formData });
        if (!response.ok) throw new Error(response.status);
        const { url } = await response.json();
        attachment.setUploadProgress(100);
        attachment.setAttributes({ url });
    } catch (err) {
        console.error('[Trix upload] failed:', err);
        attachment.remove();
        Alpine.store('toast').add({ title: editor.dataset.errorUpload, type: 'error', timeout: 4000 });
    } finally {
        if (submitBtn) submitBtn.disabled = false;
    }
});

window.Alpine = Alpine

// Stores
Alpine.store('toast', createToastStore())

// Components
Alpine.data('projectSearch', projectSearch);
Alpine.data('clientSearch', clientSearch);
Alpine.data('clientMultiSearch', clientMultiSearch);
Alpine.data('labelModal', labelModal);
Alpine.data('annualTrendChart', annualTrendChart);
Alpine.data('repositoryTab', repositoryTab);
Alpine.data('taskToggle', taskToggle);
Alpine.data('inlineField', inlineField);
Alpine.data('clientFollowupModal', clientFollowupModal);
Alpine.data('aiChat', aiChat);

// Modal components (Alpine-based)
window.clientModal = clientModal;
window.projectModal = projectModal;
window.taskModal = taskModal;
window.meetingModal = meetingModal;
window.paymentModal = paymentModal;
window.uploadInvoiceModal = uploadInvoiceModal;
window.costModal = costModal;
window.receiptUploadModal = receiptUploadModal;
window.taxModal = taxModal;
window.taxAttachmentModal = taxAttachmentModal;
window.documentModal = documentModal;

Alpine.start()

// =============================================================================
// Global Listeners for data-attributes
// =============================================================================

// Listener for [data-action] -> dispatch custom events
document.addEventListener('click', (e) => {
    const btn = e.target.closest('[data-action]');
    if (!btn) return;

    const action = btn.dataset.action;
    const payload = btn.dataset.payload;

    let detail = {};
    if (payload) {
        try {
            detail = JSON.parse(payload);
        } catch (err) {
            console.error(`Invalid JSON in data-payload for action "${action}":`, err);
        }
    }

    window.dispatchEvent(new CustomEvent(action, { detail }));
});

// Listener for [data-confirm] -> confirm dialog on form submit
document.addEventListener('submit', (e) => {
    const form = e.target;
    const confirmMessage = form.dataset.confirm;

    if (confirmMessage && !confirm(confirmMessage)) {
        e.preventDefault();
    }
});
