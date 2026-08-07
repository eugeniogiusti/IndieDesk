/**
 * Client Multi-Search Component
 * Typeahead search used inside the project modal (type=saas) to link
 * multiple clients to a single project. Sibling of clientSearch, but
 * accumulates results into a list instead of a single selection.
 */
export default () => ({
    // State
    searchQuery: '',
    searchResults: [],
    selectedClients: [],
    isSearching: false,
    showDropdown: false,

    // Sync state when project modal opens for edit
    syncFromProject(clients) {
        this.selectedClients = Array.isArray(clients) ? clients : [];
        this.searchQuery = '';
        this.searchResults = [];
        this.showDropdown = false;
    },

    // Reset state when modal closes or creates new project
    reset() {
        this.selectedClients = [];
        this.searchQuery = '';
        this.searchResults = [];
        this.showDropdown = false;
    },

    // Methods
    async searchClients() {
        if (this.searchQuery.length < 2) {
            this.searchResults = [];
            this.showDropdown = false;
            return;
        }

        this.isSearching = true;

        try {
            const response = await fetch(`/api/clients/search?q=${encodeURIComponent(this.searchQuery)}`);
            const results = await response.json();
            this.searchResults = results.filter(
                client => !this.selectedClients.some(selected => selected.id === client.id)
            );
            this.showDropdown = this.searchResults.length > 0;
        } catch (error) {
            console.error('Error searching clients:', error);
        } finally {
            this.isSearching = false;
        }
    },

    addClient(client) {
        if (!this.selectedClients.some(selected => selected.id === client.id)) {
            this.selectedClients.push(client);
        }
        this.searchQuery = '';
        this.searchResults = [];
        this.showDropdown = false;
    },

    removeClient(clientId) {
        this.selectedClients = this.selectedClients.filter(client => client.id !== clientId);
    }
});
