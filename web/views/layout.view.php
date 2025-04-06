<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/web.css">

    <!-- The Web object can initialize immediately, since it will load references to other
         objects as required -->
    <script src="/js/web.js"></script>

    <title>%%TITLE%% - connectord</title>
</head>
<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 justify-content-start">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">%%PRODUCT_NAME%%</a>
        <ul class="navbar-nav px-3 flex flex-row">
            <li class="nav-item text-nowrap">
                <span class="connectord-header badge badge-danger">Danger</span>
            </li>
            <li class="nav-item text-nowrap">
                <span class="connectord-header badge badge-success">Success</span>
            </li>
            <li class="nav-item text-nowrap">
                <span class="connectord-header badge badge-warning">Warning</span>
            </li>
            <li class="nav-item text-nowrap">
                <span class="connectord-header badge badge-info">Info</span>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i data-feather="file-text"></i>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i data-feather="file-text"></i>
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i data-feather="file-text"></i>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i data-feather="file-text"></i>
                                Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i data-feather="file-text"></i>
                                Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i data-feather="file-text"></i>
                                Integrations
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Saved reports</span>
                        <a class="d-flex align-items-center text-muted" href="#">
                            <i data-feather="file-text"></i>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i data-feather="file-text"></i>
                                Current month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i data-feather="file-text"></i>
                                Last quarter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i data-feather="file-text"></i>
                                Social engagement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i data-feather="file-text"></i>
                                Year-end sale
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Page Title</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-outline-secondary">Share</button>
                            <button class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <i data-feather="file-text"></i>
                            This week
                        </button>
                    </div>
                </div>

                %%CONTENT%%

            </main>
        </div>
    </div>

    <!-- All that javascript! -->
    <script src="/js/jquery-3.3.1.slim.min.js"></script> <!-- Bootstrap requirement -->
    <script src="/js/popper.min.js"></script> <!-- Bootstrap requirement -->
    <script src="/js/bootstrap.min.js"></script> <!-- Single-file UI framework -->
    <script src="/js/feather.min.js"></script> <!-- Lightweight icons -->
    <script src="/js/alpinejs.min.js"></script> <!-- Lightweight frontend interactivity -->
    <script src="/js/axios.min.js"></script> <!-- Better HTTP client -->

    <script>
        // Initialize Feather and set all the icons on the page
        feather.replace();
    </script>

</body>
</html>