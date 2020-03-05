//Register Service Worker
if ('serviceWorker' in navigator) {
	console.log('Service worker is supported');
	window.addEventListener('load', () => {
	  navigator.serviceWorker
		.register('shakib.js')
		.then(reg => console.log('Service Worker: Registered (Pages)'))
		.catch(function(err) {
      console.log("Service Worker Failed to Register", err);
    });
	});
  }

