/**
 * Tax Modal Component
 * Handles create/edit modal for taxes
 */
export default function taxModal() {
    return {
        open: false,
        isEdit: false,
        taxId: null,
        formData: {},

        init() {
            this.formData = this.getEmptyForm();
        },

        getEmptyForm() {
            return {
                type:           'F24',
                description:    '',
                amount:         '',
                due_date:       '',
                paid_at:        '',
                reference_year: new Date().getFullYear(),
                notes:          ''
            };
        },

        resetForm() {
            this.formData = this.getEmptyForm();
            this.isEdit = false;
            this.taxId = null;
        },

        openCreate() {
            this.resetForm();
            this.open = true;
        },

        openEdit(taxData) {
            this.isEdit = true;
            this.taxId = taxData.id;
            this.formData = {
                type:           taxData.type || 'F24',
                description:    taxData.description || '',
                amount:         taxData.amount || '',
                due_date:       this.formatDateForInput(taxData.due_date),
                paid_at:        this.formatDateForInput(taxData.paid_at),
                reference_year: taxData.reference_year || new Date().getFullYear(),
                notes:          taxData.notes || ''
            };
            this.open = true;
        },

        closeModal() {
            this.open = false;
            setTimeout(() => this.resetForm(), 300);
        },

        formatDateForInput(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            if (isNaN(date.getTime())) return '';
            return date.toISOString().split('T')[0];
        }
    };
}
