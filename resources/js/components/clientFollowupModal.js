/**
 * Client Followup Modal Component
 * Handles create/edit modal for followup logs on lead clients
 */
export default function clientFollowupModal() {
    return {
        open: false,
        isEdit: false,
        followupId: null,
        formData: {},

        init() {
            this.formData = this.getEmptyForm();

            this.$watch('formData.contacted_at', (value) => {
                if (this.isEdit || !value) return;
                const today = new Date().toISOString().split('T')[0];
                this.formData.completed = value <= today;
            });
        },

        getEmptyForm() {
            const today = new Date().toISOString().split('T')[0];
            return {
                type: 'call',
                note: '',
                contacted_at: today,
                completed: true,
            };
        },

        resetForm() {
            this.formData = this.getEmptyForm();
            this.isEdit = false;
            this.followupId = null;
        },

        openCreate() {
            this.resetForm();
            this.open = true;
        },

        openEdit(followupData) {
            this.isEdit = true;
            this.followupId = followupData.id;
            this.formData = {
                type: followupData.type || 'call',
                note: followupData.note || '',
                contacted_at: followupData.contacted_at || '',
                completed: followupData.completed ?? true,
            };
            this.open = true;
        },

        closeModal() {
            this.open = false;
            setTimeout(() => this.resetForm(), 300);
        },
    };
}
