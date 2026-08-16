/**
 * Client Modal Component
 * Handles create/edit modal for clients with tabbed form (basic, billing, web)
 */
export default function clientModal() {
    return {
        open: false,
        isEdit: false,
        clientId: null,
        activeTab: 'basic',
        backTo: '',
        formData: {},

        init() {
            this.formData = this.getEmptyForm();
        },

        getEmptyForm() {
            return {
                // Basic
                name: '',
                email: '',
                status: 'lead',
                acquisition_source: '',
                vat_number: '',
                phone_prefix: '',
                phone: '',
                pec: '',
                // Billing
                email_fatturazione: '',
                billing_address: '',
                billing_city: '',
                billing_zip: '',
                billing_province: '',
                billing_country: '',
                billing_recipient_code: '',
                // Web
                website: '',
                linkedin: '',
                notes: ''
            };
        },

        resetForm() {
            this.formData = this.getEmptyForm();
            this.isEdit = false;
            this.clientId = null;
            this.activeTab = 'basic';
            this.backTo = '';
        },

        /** Open modal for creating new client */
        openCreate() {
            this.resetForm();
            this.open = true;
        },

        /** Open modal for editing existing client */
        openEdit(clientData) {
            this.isEdit = true;
            this.clientId = clientData.id;
            this.backTo = clientData._back || '';
            this.formData = { ...this.getEmptyForm(), ...clientData };
            if (this.formData.acquisition_source && typeof this.formData.acquisition_source === 'object') {
                this.formData.acquisition_source = this.formData.acquisition_source.value || '';
            }
            this.open = true;
        },

        /** Close modal and reset form */
        closeModal() {
            this.open = false;
            this.resetForm();
        }
    }
}
