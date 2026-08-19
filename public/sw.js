self.addEventListener('install', () => self.skipWaiting());
self.addEventListener('activate', (event) => event.waitUntil(self.clients.claim()));

// Passthrough puro alla rete, zero caching: un fetch handler "no-op" (senza
// respondWith) viene rilevato da Chrome e trattato come se non esistesse
// affatto, il che esclude il sito dai criteri di installabilità PWA.
self.addEventListener('fetch', (event) => {
    event.respondWith(fetch(event.request));
});
