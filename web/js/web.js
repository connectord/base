/**
 * ConnectorD web frontend
 * This file will do several things, but mainly it's here to drive interactivity from the frontend
 */

class Web {
    constructor() {

        // We'll pull in all the libraries we need so that the objects all initialize upfront
        // <script src="/js/jquery-3.3.1.slim.min.js"></script> <!-- Bootstrap requirement -->
        //     <script src="/js/popper.min.js"></script> <!-- Bootstrap requirement -->
        //     <script src="/js/bootstrap.min.js"></script> <!-- Single-file UI framework -->
        //     <script src="/js/feather.min.js"></script> <!-- Lightweight icons -->
        //     <script src="/js/alpinejs.min.js"></script> <!-- Lightweight frontend interactivity -->
        //     <script src="/js/axios.min.js"></script> <!-- Better HTTP client -->


// Dynamically add the axios script to the DOM
        const axiosScript = document.createElement('script');
        axiosScript.src = '/js/axios.min.js';
        axiosScript.type = 'text/javascript';
        axiosScript.onload = () => this.log('Axios library loaded');
        axiosScript.onerror = () => this.error('Failed to load Axios library');
        document.head.appendChild(axiosScript);


        console.log(`[Web] Frontend initialized`);
    }

    log(...params) {
        console.log(`[Web]`, ...params);
    }

    error(...params) {
        console.error(`[Web]`, ...params);
    }

    get(url, config = {}) {
        return axios.get(url, config)
            .then(response => response)
            .catch(error => {
                this.error(`GET request to ${url} failed`, error);
                throw error;
            });
    }

}

// Make it available to the whole frontend
Web = new Web();