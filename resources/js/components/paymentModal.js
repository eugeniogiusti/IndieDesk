/**
 * Payment Modal Component
 * Handles create/edit modal for payments in project context
 */
export default function paymentModal() {
    return {
        open: false,
        isEdit: false,
        paymentId: null,
        formData: {},

        /**
         * Parse date from various formats to YYYY-MM-DD for input[type="date"]
         * Handles ISO 8601 strings from Laravel JSON serialization
         */
        parseDate(value) {
            if (!value) return '';
            // If already in YYYY-MM-DD format, return as is
            if (/^\d{4}-\d{2}-\d{2}$/.test(value)) {
                return value;
            }
            // Parse ISO 8601 or other date formats
            const date = new Date(value);
            if (isNaN(date.getTime())) return '';
            return date.toISOString().split('T')[0];
        },

        getEmptyForm() {
            return {
                is_paid: true, // Default: payed
                amount: '',
                paid_at: '',
                due_date: '',
                method: 'bank',
                reference: '',
                notes: '',
                client_id: ''
            };
        },

        /**
         * Reset form data to defaults
         */
        resetForm() {
            this.formData = this.getEmptyForm();
            this.isEdit = false;
            this.paymentId = null;
        },

        /**
         * Open modal for creating new payment
         */
        openCreate() {
            this.resetForm();
            // Setta data odierna di default se incassato
            this.formData.paid_at = new Date().toISOString().split('T')[0];
            this.open = true;
        },

        /**
         * Open modal for editing existing payment
         */
        openEdit(paymentData) {
            this.isEdit = true;
            this.paymentId = paymentData.id;
            // Determina se è incassato in base a paid_at
            const isPaid = paymentData.paid_at !== null;
            this.formData = {
                is_paid: isPaid,
                amount: paymentData.amount || '',
                paid_at: this.parseDate(paymentData.paid_at),
                due_date: this.parseDate(paymentData.due_date),
                method: paymentData.method || 'bank',
                reference: paymentData.reference || '',
                notes: paymentData.notes || '',
                client_id: paymentData.client_id || ''
            };
            this.open = true;
        },

        /**
         * Close modal and reset form after animation
         */
        closeModal() {
            this.open = false;
            setTimeout(() => this.resetForm(), 300);
        },

        /**
         * Initialize form and watch is_paid to clear opposite field
         */
        init() {
            this.formData = this.getEmptyForm();
            this.$watch('formData.is_paid', (value) => {
                if (value) {
                    // Se incassato: setta paid_at a oggi (se vuoto), pulisci due_date
                    if (!this.formData.paid_at) {
                        this.formData.paid_at = new Date().toISOString().split('T')[0];
                    }
                    this.formData.due_date = '';
                } else {
                    // Se NON incassato: pulisci paid_at
                    this.formData.paid_at = '';
                }
            });
        }
    };
}